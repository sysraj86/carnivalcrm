<?php
  if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
     require_once('modules/RoomBookings/RoomBookings.php');
     require_once('modules/RoomBookings/Forms.php');
     require_once('data/Tracker.php');
     require_once('modules/Releases/Release.php');  
     
     global $db;
     global $app_strings;
     global $mod_strings;
     global $mod_strings;
     global $current_user;
     global $sugar_version, $sugar_config,$app_list_strings;


     $focus       = new RoomBookings();
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
       
       $GLOBALS['log']->info("RoomBookings edit view");
       
    if (isset($_REQUEST['return_module'])) $ss->assign("RETURN_MODULE", $_REQUEST['return_module']);
    if (isset($_REQUEST['return_action'])) $ss->assign("RETURN_ACTION", $_REQUEST['return_action']);
    if (isset($_REQUEST['return_id']))     $ss->assign("RETURN_ID",     $_REQUEST['return_id']);

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
    if (empty($focus->assigned_name)    && empty($focus->id))  $focus->assigned_user_name = $current_user->full_name;
    $ss->assign("ASSIGNED_USER_OPTIONS",    get_select_options_with_id(get_user_array(TRUE, "Active", $focus->assigned_user_id), $focus->assigned_user_id));
    $ss->assign("ASSIGNED_USER_NAME",       $focus->assigned_user_name);
    $ss->assign("ASSIGNED_USER_ID",         $focus->assigned_user_id );
    $ss->assign('CALENDAR_DATEFORMAT', $timedate->get_cal_date_format());
    $ss->assign('USER_DATEFORMAT', $timedate->get_user_date_format());
    
    // custom
    $ss->assign('HOTEL', $focus->hotels_roombookings_name);
    $ss->assign('HOTEL_ID', $focus->hotels_rooc622shotels_ida);
    $ss->assign('HOTEL_ADDRESS', $focus->hotel_address);
    $ss->assign('ATTN_HOTEL_NAME', $focus->attn_hotel_name);
    $ss->assign('ATTN_HOTEL_PHONE', $focus->attn_hotel_phone);
    $ss->assign('ATTN_HOTEL_NAME_ID', $focus->attn_hotel_name_id);
    $ss->assign('HOTEL_TEL', $focus->hotel_tel);
    $ss->assign('HOTEL_FAX', $focus->hotel_fax);
    $ss->assign('HOTEL_FAX', $focus->hotel_fax);
    $ss->assign('FROM', $focus->company);
    $ss->assign('ATTN_NAME', $focus->attn_name);
    $ss->assign('ATTN_PHONE', $focus->attn_phone);
    $ss->assign('ATTN_ID', $focus->attn_id);
    $ss->assign('ATTN_EMAIL', $focus->attn_email);
    $ss->assign('TEL', $focus->attn_tel);
    $ss->assign('FAX', $focus->attn_fax);
    $ss->assign('MADETOUR', $focus->groupprogrambookings_name);
    $ss->assign('MADETOUR_ID', $focus->groupprogra66erograms_ida);
    $ss->assign('ROOMBOOKING_COUNT', $focus->get_bookingroom_count());
    $ss->assign('SERVICE_COUNT', $focus->get_service_count());
    $ss->assign('DEADLINE', $focus->deadline);
    if(!empty($focus->nationlity)){
       $ss->assign('NATIONLITY',get_select_options_with_id($app_list_strings['countries_dom'], $focus->nationlity));  
    }
    else{
        $ss->assign('NATIONLITY',get_select_options_with_id($app_list_strings['countries_dom'],''));
    }
    $ss->assign('BOOKINGLINE', $focus->get_bookingroom_editview());
    $ss->assign('SERVICE', $focus->get_service_editview());
    $ss->assign('CONVENTION', $focus->convention);
    $ss->assign('COST', $focus->cost);
    $ss->assign('INCLUDE', $focus->include); 
    $ss->assign('DINING_PLAN', $focus->dining_plan); 
    if($focus->confirm == 0){
        $ss->assign('NO', "checked= 'true'");
    }
    else{
         $ss->assign('YES', "checked= 'true'");
    }
    $ss->assign('DATE',$focus->date);
    $ss->assign('DEPARMENT',$focus->deparment);
    $ss->assign('GIA',$focus->gia);
    
    $hotel_popup_request_data = array(
    'call_back_function'   => 'set_return',
     'form_name'    => 'EditView',
     'field_to_name_array'  => array(
       'id' =>'hotels_rooc622shotels_ida',
       'name'   => 'hotels_roombookings_name',
       'address'    => 'hotel_address',
       'tel'        => 'hotel_tel',
       'fax'        => 'hotel_fax',
     ),
    );
    $ss->assign('hotel_popup_request_data',json_encode($hotel_popup_request_data));
    
  // hotel contact
  
  $contact_popup_request_data = array(
      'call_back_function'   => 'set_return',
     'form_name'    => 'EditView',
     'field_to_name_array'  => array(
        'id'    => 'attn_hotel_name_id',
        'name'  => 'attn_hotel_name',
        'phone_mobile'  => 'attn_hotel_phone' ,
     ),
  );
  
  $ss->assign('contact_popup_request_data',json_encode($contact_popup_request_data));
  
  // contact company
  
  $user_popup_request_data = array(
       'call_back_function' => 'set_return',
        'form_name' => 'EditView',
        'field_to_name_array' => array(
            'id' => 'attn_id',
            'user_name' => 'attn_name',
            'phone_work' => 'attn_phone',
            'email1'    => 'attn_email' 
        ),
  );
  $ss->assign('user_popup_request_data',json_encode($user_popup_request_data));
  
  // made tour code
  
  $madetour_popup_request_data = array(
      'call_back_function' => 'set_return',
        'form_name' => 'EditView',
        'field_to_name_array' => array(
            'id' => 'groupprogra66erograms_ida',
            'groupprogram_code' => 'groupprogrambookings_name',
        ),
  );
  
  $ss->assign('madetour_popup_request_data',json_encode($madetour_popup_request_data));
    
    // view chang log
  $view_chang_log_data = array(
         "call_back_function" => "set_return",
         "form_name" => "EditView",
         "field_to_name_array" => '[]',
 );
 
 $view_chang_log = $json->encode($view_chang_log_data);
 $ss->assign('view_change_log',$json->encode($view_chang_log_data));
    
   require_once('include/javascript/javascript.php');
   $javascript = new javascript();
   $javascript->setFormName('EditView');
   $javascript->setSugarBean($focus);
   $javascript->addAllFields('');  
   
   echo $javascript->getScript();  
    $ss->display('modules/RoomBookings/EditView.tpl');

?>
