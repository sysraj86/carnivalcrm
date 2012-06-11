<?php
  if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 
 // require_once('include/EditView/EditView.php');
  require_once('include/MVC/View/views/view.edit.php');
  require_once('modules/Releases/Release.php');
  require_once('modules/Contracts/Forms.php');   
  class ContractsViewEdit extends ViewEdit{
      function ContractsViewEdit(){
          parent::ViewEdit();
      }
        function display(){

            global $app_list_strings; 
            global $app_strings;
            global $mod_strings;
            global $mod_strings;
            global $current_user;
            global $sugar_version, $sugar_config;
            $seedRelease = new Release();
            $json = getJSONobj();
            $this->populateTemplates();
            // BUILD MODULE TITLE LINE  
            echo "\n<p>\n";
            echo get_module_title($mod_strings['LBL_MODULE_ID'], $mod_strings['LBL_MODULE_NAME'].": ".$this->bean->name, true);
            echo "\n</p>\n";

            global $theme;
            $theme_path = "themes/".$theme."/";
            $image_path = $theme_path."images/";
            require_once ($theme_path.'layout_utils.php');

            $GLOBALS['log']->info("Contract Edit view");   

            $this->ev->ss->assign("MOD", $mod_strings);
            $this->ev->ss->assign("APP", $app_strings);

            if (isset($_REQUEST['return_module'])) $this->ev->ss->assign("RETURN_MODULE", $_REQUEST['return_module']);
            if (isset($_REQUEST['return_action'])) $this->ev->ss->assign("RETURN_ACTION", $_REQUEST['return_action']);
            if (isset($_REQUEST['return_id']))     $this->ev->ss->assign("RETURN_ID",     $_REQUEST['return_id']);

            if (empty($_REQUEST['return_id'])) {
                $this->ev->ss->assign("RETURN_ACTION", 'index');
            }

            $this->ev->ss->assign("THEME",             $theme);
            $this->ev->ss->assign("IMAGE_PATH",        $image_path);$this->ev->ss->assign("PRINT_URL", "index.php?".$GLOBALS['request_string']);
            $this->ev->ss->assign("JAVASCRIPT",        get_set_focus_js().get_validate_record_js(). $quicksearch_js); 

            $this->ev->ss->assign("ID",                $this->bean->id);
            if (isset($this->bean->name)) 
                $this->ev->ss->assign("NAME",         $this->bean->name);
            else $this->ev->ss->assign("NAME",         "");
            $this->ev->ss->assign("DATE_ENTERED",      $this->bean->date_entered);
            $this->ev->ss->assign("DATE_MODIFIED",     $this->bean->date_modified);
            $this->ev->ss->assign("CREATED_BY",        $this->bean->created_by_name);
            $this->ev->ss->assign("MODIFIED_BY",       $this->bean->modified_by_name);

            if (empty($this->bean->assigned_user_id) && empty($this->bean->id))  $this->bean->assigned_user_id   = $current_user->id;
            if (empty($this->bean->assigned_name)    && empty($this->bean->id))  $this->bean->assigned_user_name = $current_user->user_name;
            $this->ev->ss->assign("ASSIGNED_USER_OPTIONS",    get_select_options_with_id(get_user_array(TRUE, "Active", $this->bean->assigned_user_id), $this->bean->assigned_user_id));
            $this->ev->ss->assign("ASSIGNED_USER_NAME",       $this->bean->assigned_user_name);
            $this->ev->ss->assign("ASSIGNED_USER_ID",         $this->bean->assigned_user_id ); 

            $this->ev->ss->assign("NUMBER", $this->bean->number);
            $this->ev->ss->assign("DATE", $this->bean->date);
            $this->ev->ss->assign("MONTH", $this->bean->month);
            $this->ev->ss->assign("YEAR", $this->bean->year);

            $this->ev->ss->assign("SALUTATION_A", get_select_options_with_id($app_list_strings['xung_ho_dom'], $this->bean->salutation_a))  ;
            $this->ev->ss->assign("DAIDIENBENA", $this->bean->daidienbena);
            $this->ev->ss->assign("DAIDIENBENB", $this->bean->daidienbenb);
            $this->ev->ss->assign("POSITION_A", get_select_options_with_id($app_list_strings['position_dom'],$this->bean->position_a));
            $this->ev->ss->assign("POSITION_B", get_select_options_with_id($app_list_strings['position_dom'],$this->bean->position_b));
            $this->ev->ss->assign("ADDRESS_A", $this->bean->address_a);
            $this->ev->ss->assign("PHONE_A", $this->bean->phone_a);
            $this->ev->ss->assign("PHONE_A", $this->bean->phone_a);
            $this->ev->ss->assign("FAX", $this->bean->fax);
            $this->ev->ss->assign("MST_BENA", $this->bean->mst_bena);
            $this->ev->ss->assign("BANK_NAME", $this->bean->bank_name);
            $this->ev->ss->assign("ACCOUNT_NAME", $this->bean->account_name);
            $this->ev->ss->assign("ACCOUNT_VND", $this->bean->account_vnd);
            $this->ev->ss->assign("ACCOUNT_USD", $this->bean->account_usd);
            $this->ev->ss->assign("SWIFT_CODE", $this->bean->account_usd);
            $this->ev->ss->assign("BANK_ADDRESS", $this->bean->bank_address);
            $this->ev->ss->assign("DAIDIENBENB", $this->bean->daidienbenb);
            $this->ev->ss->assign("DAIDIENBENB_NAME", $this->bean->daidienbenb_name);
            $this->ev->ss->assign("SALUTATION_B", get_select_options($app_list_strings['xung_ho_dom'], $this->bean->salutation_b));    
            $this->ev->ss->assign("ADDRESS_B",  $this->bean->address_b);   
            $this->ev->ss->assign("MST_BENB",  $this->bean->mst_benb);   
            $this->ev->ss->assign("PHONE_B",  $this->bean->phone_b);   
            $this->ev->ss->assign("TOUR_NAME",  $this->bean->tour_name);   
            $this->ev->ss->assign("TOUR_ID",  $this->bean->tour_id);   
            $this->ev->ss->assign("PURPOSE",  $this->bean->purpose); 
            $this->ev->ss->assign("KETHOP",  $this->bean->associate); 
            $this->ev->ss->assign("START_DATE",  $this->bean->start_date_contract); 
            $this->ev->ss->assign("END_DATE",  $this->bean->end_date_contract);      
            $this->ev->ss->assign("NUM_OF_DATE",  $this->bean->num_of_date);      
            $this->ev->ss->assign("NUM_OF_NIGHT",  $this->bean->num_of_night);      
            $this->ev->ss->assign("TREPERCENT",  $this->bean->trepercent);      
            $this->ev->ss->assign("TREPERCENT_1",  $this->bean->trepercent_1);   

            $this->ev->ss->assign("SL_KHACH",  $this->bean->sl_khach);   
            $this->ev->ss->assign("CONTRACT_VALUES",  $this->bean->get_contract_values_editview_line());  
            $this->ev->ss->assign("CONTRACT_VALUE_COUNT",  $this->bean->contract_values_line_count());  

            $this->ev->ss->assign("TONGTIEN",  number_format($this->bean->tongtien,'2','.',''));   
            $this->ev->ss->assign("BANGCHU",  $this->bean->bangchu);   
            $this->ev->ss->assign("SL_KHACH_1",  $this->bean->sl_khach_1);   
            $this->ev->ss->assign("GIA_TOUR_1",  number_format($this->bean->gia_tour_1,'2','.',''));      
            $this->ev->ss->assign("TIENTE",   get_select_options($app_list_strings['currency_dom'], $this->bean->tiente)); 
            $this->ev->ss->assign("TIENTE_USD",   get_select_options($app_list_strings['currency_dom'],$this->bean->tiente_usd));
            $this->ev->ss->assign("TIENTE_VND",   get_select_options($app_list_strings['currency_dom'], $this->bean->tiente_vnd));
            $this->ev->ss->assign("TEN_NGANHANG",   $this->bean->ten_nganhang);
            $this->ev->ss->assign("BAOGOM",   $this->bean->baogom);
            $this->ev->ss->assign("KHONGBAOGOM", $this->bean->khongbaogom);
            $this->ev->ss->assign("DOTTHANHTOAN", $this->bean->dotthanhtoan);
            $this->ev->ss->assign("CONTRACT_CONDITIONS", $this->bean->get_contract_condition_editview_line());
            $this->ev->ss->assign("CONTRACT_CONDITION_LINE_COUNT", $this->bean->contract_condition_line_count());
            $this->ev->ss->assign("SOLANTHANHTOAN", $this->bean->solanthanhtoan);
            $this->ev->ss->assign("NGUOIDAIDIENBENB", $this->bean->nguoidaidienbenb);
            $this->ev->ss->assign("NGUOIDAIDIENBENA", $this->bean->nguoidaidienbena);
            $this->ev->ss->assign("TENSANBAY", $this->bean->tensanbay);
            $template = explode('^,^', $this->bean->template_ddown_c); 
            $this->ev->ss->assign('TEMPLATE',get_select_options($app_list_strings['template_ddown_c_list'],$template)) ;

            $popup_request_data = array(
                'call_back_function' => 'set_return',
                'form_name' => 'EditView',
                'field_to_name_array' => array(
                'id' => 'assigned_user_id',
                'user_name' => 'assigned_user_name',
            ),
            );
            $encoded_users_popup_request_data = $json->encode($popup_request_data);
            $this->ev->ss->assign('encoded_users_popup_request_data' , $json->encode($popup_request_data));

            $view_chang_log_data = array(
                "call_back_function" => "set_return",
                "form_name" => "EditView",
                "field_to_name_array" => '[]',
            );

            $view_chang_log = $json->encode($view_chang_log_data);
            $this->ev->ss->assign('view_change_log',$json->encode($view_chang_log_data));

            // tour popup
            $popup_request_data = array(
                'call_back_function'    => 'set_return',
                'form_name'                => 'EditView',
                'field_to_name_array'    => array(
                'id'      => 'tour_id',
                'name'    => 'tour_name',
                'start_date' => 'start_date_contract',
                'end_date'   => 'end_date_contract',
            ),
            );
            $this->ev->ss->assign('encoded_tour_popup_request_data',$json->encodeReal($popup_request_data));

            /*require_once('include/javascript/javascript.php');
            $javascript = new javascript();
            $javascript->setFormName('EditView');
            $javascript->setSugarBean($focus);
            $javascript->addAllFields('');  

            echo $javascript->getScript();*/     


            parent::display();
        }
      
      
      function preDisplay(){
         /* BEGIN - SECURITY GROUPS */ 
         $metadataFile = null;
         $foundViewDefs = false;
        if(empty($_SESSION['groupLayout'])) {
            //get group ids of current user and check to see if a layout exists for that group
            global $current_user;
            require_once('modules/SecurityGroups/SecurityGroup.php');
            $groupFocus = new SecurityGroup();
            $groupList = $groupFocus->getUserSecurityGroups($current_user->id);
            //reorder by precedence....
        
            foreach($groupList as $groupItem) {
                $GLOBALS['log']->debug("Looking for: ".'custom/modules/' . $this->module . '/metadata/'.$groupItem['id'].'/editviewdefs.php');
                if(file_exists('custom/modules/' . $this->module . '/metadata/'.$groupItem['id'].'/editviewdefs.php')){
                    $_SESSION['groupLayout'] = $groupItem['id'];
                    $metadataFile = 'custom/modules/' . $this->module . '/metadata/'.$groupItem['id'].'/editviewdefs.php';
                    break;
                }            
            }
        } else {
            if(file_exists('custom/modules/' . $this->module . '/metadata/'.$_SESSION['groupLayout'].'/editviewdefs.php')){
                $metadataFile = 'custom/modules/' . $this->module . '/metadata/'.$_SESSION['groupLayout'].'/editviewdefs.php';
            }        
        }
        
         if(isset($metadataFile)){
             $foundViewDefs = true;
         }
         else {        
         $metadataFile = $this->getMetaDataFile();
         }
         /* END - SECURITY GROUPS */  
         $this->ev = new EditView();
         $this->ev->ss =& $this->ss;
         if( $this->bean->id != '') {
                $this->bean->retrieve($this->bean->id);

                if($this->bean->type == '')  {
                    $this->bean->type = 'EditView';//gan gia tri mac dinh neu type = null
                    $this->ev->setup($this->module, $this->bean, $metadataFile, 'modules/Contracts/tpls/'.$this->bean->type.'.tpl');  
                }


               
         } 
         else{//new record
    
                $type = $this->bean->type;
                if($type == ''){
                   $type = 'home';
                   $this->ev->setup($this->module, $this->bean, $metadataFile, 'modules/Contracts/tpls/'.$type.'.tpl'); 
                }
                    
            } 

     }
      function populateTemplates(){
        global $app_list_strings, $current_user;
        
        $sql = "SELECT id, name FROM aos_pdf_templates WHERE deleted='0' AND type='Contracts'";        
        $res = $this->bean->db->query($sql);
        while($row = $this->bean->db->fetchByAssoc($res)){
            $app_list_strings['template_ddown_c_list'][$row['id']] = $row['name'];
        }
    }
  }
?>
