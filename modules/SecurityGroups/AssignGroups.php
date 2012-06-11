<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


class AssignGroups {

function popup_select(&$bean, $event, $arguments)
{
	global $sugar_config;

	//only process if action is Save (meaning a user has triggered this event and not the portal or automated process)
	if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'Save' 
		&& isset($sugar_config['securitysuite_popup_select']) && $sugar_config['securitysuite_popup_select'] == true
		&& empty($bean->fetched_row['id']) && $bean->module_dir != "Users") {
		
		require_once('modules/SecurityGroups/SecurityGroup.php');
		$groupFocus = new SecurityGroup();
		$security_modules = $groupFocus->getSecurityModules();
		//if(in_array($bean->module_dir,$security_modules)) {
		if(in_array($bean->module_dir,array_keys($security_modules))) {
	
			//check if user is in more than 1 group. If so then set the session var otherwise inherit it's only group
			global $current_user;

			$memberships = $groupFocus->getMembershipCount($current_user->id);
			if($memberships > 1) {
				$_REQUEST['return_module'] = $bean->module_dir;
				$_REQUEST['return_action'] = "DetailView";
				$_REQUEST['return_id'] = $bean->id;

				$_SESSION['securitygroups_popup_'.$bean->module_dir] = $bean->id;
			} else if($memberships == 1) {
				$groupFocus->inheritOne($current_user->id, $bean->id, $bean->module_dir);
			}

		}

	}
	
	if(isset($sugar_config['securitysuite_user_popup']) && $sugar_config['securitysuite_user_popup'] == true
		&& empty($bean->fetched_row['id']) && $bean->module_dir == "Users"
		&& $_REQUEST['action'] != 'SaveSignature' ) { //Bug: 589

		$_REQUEST['return_module'] = $bean->module_dir;
		$_REQUEST['return_action'] = "DetailView";
		$_REQUEST['return_id'] = $bean->id;
		
		$_SESSION['securitygroups_popup_'.$bean->module_dir] = $bean->id;
	}
} 


function popup_onload($event, $arguments)
{
	global $sugar_config;

	$module = $_REQUEST['module'];
	$action = $_REQUEST['action'];
	
	if(isset($action) && ($action == "Save" || $action == "SetTimezone")) return;  


	if( ((isset($sugar_config['securitysuite_popup_select']) && $sugar_config['securitysuite_popup_select'] == true)
			|| ($module == "Users" && isset($sugar_config['securitysuite_user_popup']) && $sugar_config['securitysuite_user_popup'] == true)
		)
	
		&& isset($_SESSION['securitygroups_popup_'.$module]) && !empty($_SESSION['securitygroups_popup_'.$module])
	) {
		$record_id = $_SESSION['securitygroups_popup_'.$module];
 		unset($_SESSION['securitygroups_popup_'.$module]);
		//$record_id = $_REQUEST['record'];

		require_once('modules/SecurityGroups/SecurityGroup.php');
		$groupFocus = new SecurityGroup();
		if($module == 'Users') {
			$rel_name = "SecurityGroups";
		} else {
			$rel_name = $groupFocus->getLinkName($module,"SecurityGroups");
		}

	$auto_popup = <<<EOQ
<script type="text/javascript" language="javascript">
	open_popup("SecurityGroups",600,400,"",true,true,{"call_back_function":"set_return_and_save_background","form_name":"DetailView","field_to_name_array":{"id":"subpanel_id"},"passthru_data":{"child_field":"$rel_name","return_url":"index.php%3Fmodule%3D$module%26action%3DSubPanelViewer%26subpanel%3D$rel_name%26record%3D$record_id%26sugar_body_only%3D1","link_field_name":"$rel_name","module_name":"$rel_name","refresh_page":"1"}},"MultiSelect",true);
</script>
EOQ;
    
		echo $auto_popup;
	}

}

function mass_assign($event, $arguments)
{
    $action = $_REQUEST['action'];
    $module = $_REQUEST['module'];
  
  	$no_mass_assign_list = array("Emails"=>"Emails","ACLRoles"=>"ACLRoles"); //,"Users"=>"Users");
    //check if security suite enabled
    $action = strtolower($action);
    if(isset($module) && ($action == "list" || $action == "index" || $action == "listview") 
    	&& (!isset($_REQUEST['search_form_only']) || $_REQUEST['search_form_only'] != true)
    	&& !array_key_exists($module,$no_mass_assign_list)
    	) {
   		global $current_user;
   		if(is_admin($current_user) || ACLAction::getUserAccessLevel($current_user->id,"SecurityGroups", 'access') == ACL_ALLOW_ENABLED) {

			require_once('modules/SecurityGroups/SecurityGroup.php');
			$groupFocus = new SecurityGroup();
			$security_modules = $groupFocus->getSecurityModules();
			//if(in_array($module,$security_modules)) {
			if(in_array($module,array_keys($security_modules))) {

				global $app_strings;

				global $current_language;
				$current_module_strings = return_module_language($current_language, 'SecurityGroups');

				$form_header = get_form_header($current_module_strings['LBL_MASS_ASSIGN'], '', false);

				$groups = $groupFocus->get_list("name","",0,-99,-99);
				$options = array(""=>"");
				foreach($groups['list'] as $group) {
					$options[$group->id] = $group->name;
				}
				$group_options =  get_select_options_with_id($options, "");

				$mass_assign = <<<EOQ

<script type="text/javascript" language="javascript">
function confirm_massassign(del,start_string, end_string) {
	if (del == 1) {
		return confirm( start_string + sugarListView.get_num_selected()  + end_string);
	}
	else {
		return confirm( start_string + sugarListView.get_num_selected()  + end_string);
	}
}

function send_massassign(mode, no_record_txt, start_string, end_string, del) {

	if(!sugarListView.confirm_action(del, start_string, end_string))
		return false;

	if(document.MassAssign_SecurityGroups.massassign_group.selectedIndex == 0) {
		alert("Please select a group and try again.");
		return false;	
	}
	 
	if (document.MassUpdate.select_entire_list &&
		document.MassUpdate.select_entire_list.value == 1)
		mode = 'entire';
	else if (document.MassUpdate.massall.checked == true)
		mode = 'page';
	else
		mode = 'selected';

	var ar = new Array();
	if(del == 1) {
		var deleteInput = document.createElement('input');
		deleteInput.name = 'Delete';
		deleteInput.type = 'hidden';
		deleteInput.value = true;
		document.MassAssign_SecurityGroups.appendChild(deleteInput);
	}

	switch(mode) {
		case 'page':
			document.MassAssign_SecurityGroups.uid.value = '';
			for(wp = 0; wp < document.MassUpdate.elements.length; wp++) {
				if(typeof document.MassUpdate.elements[wp].name != 'undefined'
					&& document.MassUpdate.elements[wp].name == 'mass[]' && document.MassUpdate.elements[wp].checked) {
							ar.push(document.MassUpdate.elements[wp].value);
				}
			}
			document.MassAssign_SecurityGroups.uid.value = ar.join(',');
			if(document.MassAssign_SecurityGroups.uid.value == '') {
				alert(no_record_txt);
				return false;
			}
			break;
		case 'selected':
			for(wp = 0; wp < document.MassUpdate.elements.length; wp++) {
				if(typeof document.MassUpdate.elements[wp].name != 'undefined'
					&& document.MassUpdate.elements[wp].name == 'mass[]'
						&& document.MassUpdate.elements[wp].checked) {
							ar.push(document.MassUpdate.elements[wp].value);
				}
			}
			if(document.MassAssign_SecurityGroups.uid.value != '') document.MassAssign_SecurityGroups.uid.value += ',';
			document.MassAssign_SecurityGroups.uid.value += ar.join(',');
			if(document.MassAssign_SecurityGroups.uid.value == '') {
				alert(no_record_txt);
				return false;
			}
			break;
		case 'entire':
			var entireInput = document.createElement('input');
			entireInput.name = 'entire';
			entireInput.type = 'hidden';
			entireInput.value = 'index';
			document.MassAssign_SecurityGroups.appendChild(entireInput);
			//confirm(no_record_txt);
			break;
	}

	document.MassAssign_SecurityGroups.submit();
	return false;
}

</script>

		<form action='index.php' method='post' name='MassAssign_SecurityGroups'  id='MassAssign_SecurityGroups'>
			<input type='hidden' name='action' value='MassAssign' />
			<input type='hidden' name='module' value='SecurityGroups' />
			<input type='hidden' name='return_action' value='${action}' />
			<input type='hidden' name='return_module' value='${module}' />
			<textarea style='display: none' name='uid'></textarea>


		<div id='massassign_form'>$form_header
		<table cellpadding='0' cellspacing='0' border='0' width='100%'>
		<tr>
		<td style='padding-bottom: 2px;' class='listViewButtons'>
		<input type='submit' name='Assign' value='${current_module_strings['LBL_ASSIGN']}' onclick="return send_massassign('selected', '{$app_strings['LBL_LISTVIEW_NO_SELECTED']}','${current_module_strings['LBL_ASSIGN_CONFIRM']}','${current_module_strings['LBL_CONFIRM_END']}',0);" class='button'>
		<input type='submit' name='Remove' value='${current_module_strings['LBL_REMOVE']}' onclick="return send_massassign('selected', '{$app_strings['LBL_LISTVIEW_NO_SELECTED']}','${current_module_strings['LBL_REMOVE_CONFIRM']}','${current_module_strings['LBL_CONFIRM_END']}',1);" class='button'>


		</td></tr></table>
		<table cellpadding='0' cellspacing='0' border='0' width='100%' class='tabForm' id='mass_update_table'>
		<tr><td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
		<tr>
		<td>${current_module_strings['LBL_GROUP']}</td>
		<td><select name='massassign_group' id="massassign_group" tabindex='1'>${group_options}</select></td>
		</tr>
		</table></td></tr></table></div>			
		</form>		
EOQ;


				echo $mass_assign;
			}
		}
    }

}

}
?>