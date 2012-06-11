<?php
  if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
     require_once('modules/GuideContracts/GuideContracts.php');
     require_once('modules/GuideContracts/Forms.php');     
     global $db;
     global $app_strings;
     global $mod_strings;
     global $mod_strings;
     global $current_user;
     global $sugar_version, $sugar_config;


     $focus       = new GuideContracts();
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
   
   $GLOBALS['log']->info("GuideContracts detail view");   

    if (empty($_REQUEST['return_id'])) {
        $ss->assign("RETURN_ACTION", 'index');  
    }
    
    require_once('include/QuickSearchDefaults.php');
    $qsd = new QuickSearchDefaults();
    $sqs_objects = array(
    'assigned_user_name' => $qsd->getQSUser(),
    );
    $quicksearch_js  = $qsd->getQSScripts();
    $quicksearch_js .= '<script type="text/javascript" language="javascript">sqs_objects = ' . $json->encode($sqs_objects) . '</script>';


    $ss->assign("MOD", $mod_strings);
    $ss->assign("APP", $app_strings);

    if (isset($_REQUEST['return_module'])) $ss->assign("RETURN_MODULE", $_REQUEST['return_module']);
    if (isset($_REQUEST['return_action'])) $ss->assign("RETURN_ACTION", $_REQUEST['return_action']);
    if (isset($_REQUEST['return_id']))     $ss->assign("RETURN_ID",     $_REQUEST['return_id']);

    if (empty($_REQUEST['return_id'])) {
        $ss->assign("RETURN_ACTION", 'index');
    }

    $ss->assign("THEME",             $theme);
    $ss->assign("IMAGE_PATH",        $image_path);$ss->assign("PRINT_URL", "index.php?".$GLOBALS['request_string']);
    $ss->assign("JAVASCRIPT",        get_set_focus_js().get_validate_record_js(). $quicksearch_js);


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
    $ss->assign("ASSIGNED_USER_NAME",       $focus->assigned_user_name);
    $ss->assign("ASSIGNED_USER_ID",         $focus->assigned_user_id );
    $ss->assign('CALENDAR_DATEFORMAT', $timedate->get_cal_date_format());
    $ss->assign('USER_DATEFORMAT', $timedate->get_user_date_format());
   
   $ss->assign("NUMBER", $focus->number);
   $ss->assign("DATE", $focus->date);
   $ss->assign("MONTH", $focus->month);
   $ss->assign("YEAR", $focus->year);
   
   $ss->assign("SALUTATION", get_select_options_with_id($app_list_strings['xung_ho_dom'], $focus->salutation_a))  ;
   $ss->assign("COMPANY_NAME", $focus->company_name);
   $ss->assign("ADDRESS_A", $focus->address_a);
   $ss->assign("PHONE_A", $focus->phone_a);
   $ss->assign("ADDRESS_A", $focus->address_a);
   $ss->assign("PHONE_A", $focus->phone_a);
   $ss->assign("FAX_A", $focus->fax_a);
   $ss->assign("REPRESENTING_A", $focus->representing_a);
   $ss->assign("REPRESENTING_B", $focus->travelguidecontracts_name);
   $ss->assign("TRAVELGUIDE_ID", $focus->travelguidead0lguides_ida);
   $ss->assign("BIRTHDAY", $focus->birthday);
   $ss->assign("PASSPORT", $focus->account_name);
   $ss->assign("DATE_ISSUED", $focus->account_vnd);
   $ss->assign("PHONE_B", $focus->phone_b);
   $ss->assign("ADDRESS_B", $focus->address_b);
   $ss->assign("TOUR_NAME", $focus->tour_name);
   $ss->assign("TOUR_ID", $focus->tour_id);
   $ss->assign("DATE_START", $focus->date_start);
   $ss->assign("DATE_END", $focus->date_end);
   $ss->assign("JOURNEY", $focus->journey);
   $ss->assign("BONUS", $focus->bonus);
   if(!empty($focus->currency)){
    $ss->assign("CURRENCY",   get_select_options_with_id($app_list_strings['currency_dom'], $focus->currency));     
   }
   else{
       $ss->assign("CURRENCY",   get_select_options_with_id($app_list_strings['currency_dom'],'')); 
   }
   if(!empty($focus->partner)){
    $ss->assign("PARTNER",   get_select_options_with_id($app_list_strings['partner_dom'], $focus->partner));    
   }
   else{
       $ss->assign("PARTNER",   get_select_options_with_id($app_list_strings['partner_dom'], '')); 
   }
   $ss->assign("NUM_OF_DATE", $focus->num_of_date);
   $ss->assign("TOTAL_BONUS", $focus->total_bonus);
   $ss->assign("INWORD", $focus->inword);
   $ss->assign("EXPIRATION_DATE", $focus->expiration_date);
   $ss->assign("REPRESENTATIVE_B", $focus->representative_b);
   $ss->assign("REPRESENTATIVE_A", $focus->representative_a);
   
   $popup_request_data = array(
        'call_back_function' => 'set_return',
        'form_name' => 'EditView',
        'field_to_name_array' => array(
            'id' => 'assigned_user_id',
            'user_name' => 'assigned_user_name',
        ),
);
$encoded_users_popup_request_data = $json->encode($popup_request_data);
$ss->assign('encoded_users_popup_request_data' , $json->encode($popup_request_data));
 
 $view_chang_log_data = array(
         "call_back_function" => "set_return",
         "form_name" => "EditView",
         "field_to_name_array" => '[]',
 );
 
 $view_chang_log = $json->encode($view_chang_log_data);
 $ss->assign('view_change_log',$json->encode($view_chang_log_data));
 
 // tour popup
 $popup_request_data = array(
        'call_back_function'    => 'set_return',
        'form_name'                => 'EditView',
        'field_to_name_array'    => array(
               'id'      => 'tour_id',
               'name'    => 'tour_name',
           ),
       );
 $ss->assign('encoded_tour_popup_request_data',$json->encode($popup_request_data));
  
  $travelguide_popup_request_data = array(
     'call_back_function'    => 'set_return',
        'form_name'                => 'EditView',
        'field_to_name_array'    => array(
               'id'      => 'travelguidead0lguides_ida',
               'name'    => 'travelguidecontracts_name',
               'address' => 'address_b',
               'phone'   => 'phone_b',
           ),
  );
  
  $ss->assign('travelguide_popup_request_data',$json->encode($travelguide_popup_request_data));
  
  require_once('include/javascript/javascript.php');
   $javascript = new javascript();
   $javascript->setFormName('EditView');
   $javascript->setSugarBean($focus);
   $javascript->addAllFields('');  
   
   echo $javascript->getScript();     
  $ss->display('modules/GuideContracts/EditView.tpl') ;
 /*  $str = "<script>
     YAHOO.util.Event.addListener(window, 'load', SUGAR.util.fillShortcuts, $savedSearchSelects);
   </script>";
   
    echo $str;  */
    
   
   
   
?>
