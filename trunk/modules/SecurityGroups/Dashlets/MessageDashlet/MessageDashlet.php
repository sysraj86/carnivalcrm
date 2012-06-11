<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/Dashlets/DashletGeneric.php');
require_once('modules/SecurityGroups/SecurityGroupMessage.php');

class MessageDashlet extends DashletGeneric { 
var $displayRows = 5;


    function MessageDashlet($id, $def = null) {
		global $current_user, $app_strings, $app_list_strings;
		require('modules/SecurityGroups/Dashlets/MessageDashlet/MessageDashlet.data.php');
		$this->myItemsOnly = false;
        parent::DashletGeneric($id, $def);
		$this->myItemsOnly = false;
		$this->isConfigurable = true;
		$this->hasScript = true;

        if(empty($def['title'])) $this->title = translate('LBL_HOMEPAGE_TITLE', 'SecurityGroups');
		if(!empty($def['rows']))$this->displayRows = $def['rows'];
		
        $this->searchFields = $dashletData['MessageDashlet']['searchFields'];
        $this->columns = $dashletData['MessageDashlet']['columns'];

        $this->seedBean = new SecurityGroupMessage();
    }
	
	function process($lvsParams = array()) {
        global $current_user;

        $currentSearchFields = array();
        $configureView = true; // configure view or regular view
        $query = false;
        $whereArray = array();
        $lvsParams['massupdate'] = false;		
		
        // apply filters
        if(isset($this->filters) || $this->myItemsOnly) {
            $whereArray = $this->buildWhere();
        }

        $this->lvs->export = false;
        $this->lvs->multiSelect = false;
		$this->lvs->quickViewLinks = false;
        // columns
		foreach($this->columns as $name => $val) {
                if(!empty($val['default']) && $val['default']) {
                    $displayColumns[strtoupper($name)] = $val;
                    $displayColumns[strtoupper($name)]['label'] = trim($displayColumns[strtoupper($name)]['label'], ':');
                }
        }

        $this->lvs->displayColumns = $displayColumns;

        $this->lvs->lvd->setVariableName($this->seedBean->object_name, array());
   
        $lvsParams['overrideOrder'] = true;
        $lvsParams['orderBy'] = 'date_entered';
        $lvsParams['sortOrder'] = 'DESC';
              
        if(!empty($this->displayTpl))
        {
       
			$where = ' (securitygroups_message.securitygroup_id is null';
			require_once('modules/SecurityGroups/SecurityGroup.php');
			$securitygroups = SecurityGroup::getUserSecurityGroups($current_user->id);
			if(sizeof($securitygroups) > 0) {
				$where .= ' OR (securitygroups_message.securitygroup_id in (';
				$first_group = true;
				foreach($securitygroups as $group) {
					if(!$first_group) {
						$where .= ' , ';
						$first_group = false;
					}
					$where .= "'".$group['id']."'";
				}
				$where .= '))';
			}
			
			
            $where .= ') ';
		
            $this->lvs->setup($this->seedBean, $this->displayTpl, $where , $lvsParams, 0, $this->displayRows, 
                              array('name', 
                                    'description', 
                                    'date_entered', 
                                    'created_by',
                                    'securitygroup_id',
                                    'created_by_name',
                                    ));

            foreach($this->lvs->data['data'] as $row => $data) {
                $this->lvs->data['data'][$row]['CREATED_BY'] = get_assigned_user_name($data['CREATED_BY']);
                $this->lvs->data['data'][$row]['NAME'] = str_replace("{this.CREATED_BY}",$this->lvs->data['data'][$row]['CREATED_BY'],$data['NAME']);
            }

            // assign a baseURL w/ the action set as DisplayDashlet
            foreach($this->lvs->data['pageData']['urls'] as $type => $url) {
            	// awu Replacing action=DisplayDashlet with action=DynamicAction&DynamicAction=DisplayDashlet
                if($type == 'orderBy')
                    $this->lvs->data['pageData']['urls'][$type] = preg_replace('/(action=.*&)/Ui', 'action=DynamicAction&DynamicAction=displayDashlet&', $url);
                else
                    $this->lvs->data['pageData']['urls'][$type] = preg_replace('/(action=.*&)/Ui', 'action=DynamicAction&DynamicAction=displayDashlet&', $url) . '&sugar_body_only=1&id=' . $this->id;
            }
            
            $this->lvs->ss->assign('dashletId', $this->id);

        }
      
    }
	
	function deleteMessage() {
    	if(!empty($_REQUEST['record'])) {
			$message = new SecurityGroupMessage();
			$message->retrieve($_REQUEST['record']);

			$group_owner = false;
			if(!empty($message->securitygroup_id)) {
				require_once('modules/SecurityGroups/SecurityGroup.php');
				$securitygroup = new SecurityGroup();
				$securitygroup->retrieve($data['SECURITYGROUP_ID']);

				if($securitygroup->assigned_user_id == $GLOBALS['current_user']->id) {
					$group_owner = true;
				}
			}
		
			//change all logic like below to check if assigned user to security group as well...
			if(is_admin($GLOBALS['current_user']) || $message->created_by == $GLOBALS['current_user']->id || $group_owner){ 
            	$message->mark_deleted($_REQUEST['record']);

			}
        }
    }
	
	function saveMessage() {
	 	//admins should be able to set a global message to All otherwise any other message must be attached to a group
	
    	if(!empty($_REQUEST['description'])) {
			$text = htmlspecialchars($_REQUEST['description']);
			$securitygroup_id = htmlspecialchars($_REQUEST['securitygroup_id']);
			//allow for bold and italic user tags
			//$text = preg_replace('/&amp;lt;(\/*[bi])&amp;gt;/i','<$1>', $text);
            SecurityGroupMessage::saveMessage($text,$securitygroup_id);
        }
      
       
    }
	
	function displayOptions() {
        global $app_strings;
        $ss = new Sugar_Smarty();
        $ss->assign('titleLBL', translate('LBL_TITLE', 'SecurityGroups'));
        $ss->assign('rowsLBL', translate('LBL_ROWS', 'SecurityGroups'));
        $ss->assign('saveLBL', $app_strings['LBL_SAVE_BUTTON_LABEL']);
        $ss->assign('title', $this->title);
        $ss->assign('rows', $this->displayRows);
        $ss->assign('id', $this->id);

        return  $ss->fetch('modules/SecurityGroups/Dashlets/MessageDashlet/Options.tpl');
    }  
	
	/**
	 * creats the values
	 * @return 
	 * @param $req Object
	 */
	function saveOptions($req) {
        global $sugar_config, $timedate, $current_user, $theme;
        $options = array();
        $options['title'] = $_REQUEST['title'];
		$rows = intval($_REQUEST['rows']);
        if($rows <= 0) {
            $rows = 5;         
        }
		if($rows > 100){
			$rows = 100;
		}
        $options['rows'] = $rows;

        return $options;
    }

      
	/**
	 * 
	 * @return javascript including QuickSearch for Messages
	 */
	function displayScript() {
	 	require_once('include/QuickSearchDefaults.php');

        $ss = new Sugar_Smarty();
        $ss->assign('saving', translate('LBL_SAVING', 'SecurityGroups'));
        $ss->assign('saved', translate('LBL_SAVED', 'SecurityGroups'));
        $ss->assign('id', $this->id);
        
        $str = $ss->fetch('modules/SecurityGroups/Dashlets/MessageDashlet/MessageScript.tpl');
        return $str; // return parent::display for title and such
    }
	
	/**
	 * 
	 * @return the fully rendered dashlet
	 */
	function display(){
		
		$listview = parent::display();
		$GLOBALS['current_groupmessage'] = $this;
		$listview = preg_replace_callback('/\{([^\}]+)\.([^\}]+)\}/', create_function(
            '$matches',
            'if($matches[1] == "this"){$var = $matches[2]; return $GLOBALS[\'current_groupmessage\']->$var;}else{return translate($matches[2], $matches[1]);}'
        ),$listview);
		$listview = preg_replace('/\[(\w+)\:([\w\-\d]*)\:([^\]]*)\]/', '<a href="index.php?module=$1&action=DetailView&record=$2"><img src="themes/default/images/$1.gif" border=0>$3</a>', $listview);
        // Make this dashlet scroll if it gets too large
        $listview = '<div class="sugarFeedDashlet">'.$listview.'</div>';
		return $listview;
	}
	
	
	
	/**
	 * 
	 * @return the title and the user post form
	 * @param $text Object
	 */
	function getTitle($text) {
		return parent::getTitle($text);	
	}
	
	

    function getHeader($text = '') {
    	return parent::getHeader($text) . $this->getPostForm();
    }
    

	/**
	 * 
	 * @return the form for users posting group messages
	 */
	function getPostForm(){	
		global $current_user;
		require_once('modules/SecurityGroups/SecurityGroup.php');
		$securitygroups = SecurityGroup::getUserSecurityGroups($current_user->id);
		if(!is_admin($GLOBALS['current_user']) && sizeof($securitygroups) == 0) {
			return;
		}
		//$options = array(""=>"");
		$options = array();
		if(is_admin($GLOBALS['current_user'])) {
			$options = array(""=>"All");
		}
		foreach($securitygroups as $group) {
			$options[$group['id']] = $group['name'];
		}	
			
        global $current_user;

		$user_name = ucfirst($GLOBALS['current_user']->user_name);
		$moreimg = get_image($GLOBALS['image_path'] . '/advanced_search',''); // , 'onclick="toggleDisplay(\'more_' . $this->id . '\'); toggleDisplay(\'more_img_'.$this->id.'\'); toggleDisplay(\'less_img_'.$this->id.'\');"');
		$lessimg = get_image($GLOBALS['image_path'] . '/basic_search',''); // , 'onclick="toggleDisplay(\'more_' . $this->id . '\'); toggleDisplay(\'more_img_'.$this->id.'\'); toggleDisplay(\'less_img_'.$this->id.'\');"');
		$ss = new Sugar_Smarty();
		$ss->assign('LBL_MAKE_POST', translate('LBL_MAKE_POST', 'SecurityGroups'));
		$ss->assign('LBL_POST', translate('LBL_POST', 'SecurityGroups'));
		$ss->assign('LBL_SELECT_GROUP', translate('LBL_SELECT_GROUP', 'SecurityGroups'));	
  		$ss->assign('GROUP_OPTIONS',get_select_options_with_id($options, ""));      
		$ss->assign('id', $this->id);
		$ss->assign('more_img', $moreimg);
		$ss->assign('less_img', $lessimg);


		return $ss->fetch('modules/SecurityGroups/Dashlets/MessageDashlet/UserPostForm.tpl');
	
	}
	
    static function shouldDisplay() {
        //could potential make this a SecuritySuite setting
        return true;

    }    
}
?>