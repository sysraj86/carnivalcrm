<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');    
     require_once('modules/TransportBookings/TransportBookings.php');
    // require_once('modules/TransportBookings/Forms.php');
     require_once('modules/Releases/Release.php');  
     
     global $db;
     global $app_strings;
     global $mod_strings;
     global $current_user;
     global $sugar_version, $sugar_config;

     $focus       = new TransportBookings();
     $seedRelease = new Release();
     $json = getJSONobj();
     
     $ss = new Sugar_Smarty();
     
    if(isset($_REQUEST['record'])) {
     $focus->retrieve($_REQUEST['record']);
    }
   if(isset($_REQUEST['isDuplicate']) && $_REQUEST['isDuplicate'] == 'true') {
       $focus->id = "";
       $focus->number = "";
   }
   
   
    // BUILD MODULE TITLE LINE  
       echo "\n<p>\n";
       echo get_module_title($mod_strings['LBL_MODULE_ID'], $mod_strings['LBL_MODULE_NAME'].": ".$focus->name, true);
       echo "\n</p>\n";

       global $theme;
       $theme_path = "themes/".$theme."/";
       $image_path = $theme_path."images/";
       require_once ($theme_path.'layout_utils.php');
       
       $GLOBALS['log']->info("TransportBookings edit view");
       

    if (isset($_REQUEST['return_module'])) $ss->assign("RETURN_MODULE", $_REQUEST['return_module']);
    if (isset($_REQUEST['return_action'])) $ss->assign("RETURN_ACTION", $_REQUEST['return_action']);
    if (isset($_REQUEST['return_id']))     $ss->assign("RETURN_ID",     $_REQUEST['return_id']);

    if (empty($_REQUEST['return_id'])) {
        $ss->assign("RETURN_ACTION", 'index');
    }

    $ss->assign("THEME",             $theme);
    $ss->assign("IMAGE_PATH",        $image_path);$ss->assign("PRINT_URL", "index.php?".$GLOBALS['request_string']);


    $ss->assign("MOD", $mod_strings);
    $ss->assign("APP", $app_strings);



    $ss->assign("ID",                $focus->id);
    if (isset($focus->name)) 
        $ss->assign("NAME",         $focus->name);
    else $ss->assign("NAME",         "");
    $ss->assign("DATE_ENTERED",      $focus->date_entered);
    $ss->assign("DATE_MODIFIED",     $focus->date_modified);
    $ss->assign("CREATED_BY",        $focus->created_by_name);
    $ss->assign("MODIFIED_BY",       $focus->modified_by_name);

    if (empty($focus->assigned_user_id) && empty($focus->id))  $focus->assigned_user_id   = $current_user->id;
    if (empty($focus->assigned_name)    && empty($focus->id))  $focus->assigned_user_name = $current_user->user_name;
    $ss->assign("ASSIGNED_USER_OPTIONS",    get_select_options_with_id(get_user_array(TRUE, "Active", $focus->assigned_user_id), $focus->assigned_user_id));
    $ss->assign("ASSIGNED_USER_NAME",       $focus->operator);
    $ss->assign("ASSIGNED_USER_ID",         $focus->assigned_user_id );
    $ss->assign('CALENDAR_DATEFORMAT', $timedate->get_cal_date_format());
    $ss->assign('USER_DATEFORMAT', $timedate->get_user_date_format());
    // custom /////////////////////////////////>>>>>>>>>>>>>>>>
    
    $ss->assign('TRANSPORTS_ID', $focus->transports6e65nsports_ida);
    $ss->assign('TRANSPORTS', $focus->transports_tbookings_name);
    $ss->assign('ADDRESS', $focus->address);
    $ss->assign('ATTN_TO_NAME_ID', $focus->attn_to_name_id);
    $ss->assign('ATTN_TO_NAME', $focus->attn_to_name);
    $ss->assign('ATTN_TO_PHONE', $focus->attn_to_phone);
    $ss->assign('TEL_TO', $focus->tel_to);
    $ss->assign('FAX_TO', $focus->fax_to);
    $ss->assign('FROM_CO', $focus->from_co);
    $ss->assign('ATTN_FROM_NAME_ID', $focus->attn_from_name_id);
    $ss->assign('ATTN_FROM_NAME', $focus->attn_from_name);
    $ss->assign('ATTN_FROM_PHONE', $focus->attn_from_phone);
    $ss->assign('EMAIL', $focus->email);
    $ss->assign('TEL_FROM', $focus->tel_from);
    $ss->assign('FAX_FROM', $focus->fax_from);
    $ss->assign('VAT', $focus->vat);
    $ss->assign('REQUIRE', $focus->require_transports);
     if($focus->confirm == 0){
        $ss->assign('NO', "checked= 'true'");
    }
    else{
         $ss->assign('YES', "checked= 'true'");
    }
    $ss->assign('DATE', $focus->date);
    $ss->assign('OPERATOR', $focus->operator); 
    $ss->assign('MADETOUR', $focus->groupprogratbookings_name); 
    $ss->assign('MADETOUR_ID', $focus->groupprogrd5earograms_ida); 
    $ss->assign('TRANSPORTSBOOKING_LINE', $focus->get_transportBookings_editview());
    $ss->assign('TRANSPORTSBOOKING_LINE_COUNT', $focus->transportBookings_line_count());
    $ss->assign('DEADLINE', $focus->deadline);
    $ss->assign('GIA', $focus->gia);

   
   $view_chang_log_data = array(
         "call_back_function" => "set_return",
         "form_name" => "EditView",
         "field_to_name_array" => '[]',
         );
         
         $view_chang_log = $json->encode($view_chang_log_data);
         $ss->assign('view_change_log',$json->encode($view_chang_log_data)); 

   $ss->display('modules/TransportBookings/tpls/EditView.tpl');
   
   $str = "<script>
     YAHOO.util.Event.addListener(window, 'load', SUGAR.util.fillShortcuts, $savedSearchSelects);
   </script>";
    echo $str;
?>
