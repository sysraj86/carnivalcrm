<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');    
     require_once('modules/GroupPrograms/GroupProgram.php');
     require_once('modules/GroupPrograms/Forms.php');
     require_once('modules/Releases/Release.php');  
     
     global $db;
     global $app_strings;
     global $mod_strings;
     global $mod_strings;
     global $current_user;
     global $sugar_version, $sugar_config;

     $focus       = new GroupProgram();
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
       
       $GLOBALS['log']->info("GroupProgram edit view");
       

    if (isset($_REQUEST['return_module'])) $ss->assign("RETURN_MODULE", $_REQUEST['return_module']);
    if (isset($_REQUEST['return_action'])) $ss->assign("RETURN_ACTION", $_REQUEST['return_action']);
    if (isset($_REQUEST['return_id']))     $ss->assign("RETURN_ID",     $_REQUEST['return_id']);

    if (empty($_REQUEST['return_id'])) {
        $ss->assign("RETURN_ACTION", 'index');
    }

    $ss->assign("THEME",             $theme);
    $ss->assign("IMAGE_PATH",        $image_path);$ss->assign("PRINT_URL", "index.php?".$GLOBALS['request_string']);
    $ss->assign("JAVASCRIPT",        get_set_focus_js().get_validate_record_js(). $quicksearch_js);


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
    $ss->assign("ASSIGNED_USER_NAME",       $focus->operator);
    $ss->assign("ASSIGNED_USER_ID",         $focus->assigned_user_id );
    $ss->assign('CALENDAR_DATEFORMAT', $timedate->get_cal_date_format());
    $ss->assign('USER_DATEFORMAT', $timedate->get_user_date_format());
    // custom
/*    if(!empty($focus->status)){
        $ss->assign('STATUS_DOM', get_select_options($app_list_strings['groupprogram_status_dom'],$focus->status));
    }
    else {$ss->assign('STATUS_DOM', get_select_options($app_list_strings['groupprogram_status_dom'],''));} */
    $ss->assign('CODE', $focus->groupprogram_code);
    $ss->assign('GITS', $focus->grouplists_pprograms_name);
    $ss->assign('GIT_ID', $focus->grouplists87eduplists_ida);
    $ss->assign('NUM_OF_DATE', $focus->numofdate);
    $ss->assign('NUM_OF_NIGHT', $focus->numofnight);
    $ss->assign('TOUR_NAME', $focus->tour_name);
    $ss->assign('TOUR_CODE', $focus->tour_code);
    $ss->assign('TOUR_ID', $focus->tour_id);
    $ss->assign('START_DATE_GROUP', $focus->start_date_group);
    $ss->assign('END_DATE_GROUP', $focus->end_date_group);
    $ss->assign('DURATION', $focus->duration);
    $ss->assign('TEAM_LEADER', $focus->team_leader);
    $ss->assign('LEADER_PHONE', $focus->leader_phone);
    $ss->assign('LEADER_ID', $focus->leader_id);
    $ss->assign('GUIDE_PICK_UP_AIRPORT', $focus->guide_pick_up_at_airport);
    $ss->assign('GUIDE_PICK_UP_AIRPORT_ID', $focus->guide_pick_up_at_airport_id);
    $ss->assign('PICK_UP_PHONE', $focus->pick_up_phone);
    
    
    $ss->assign('GUIDE_PHONE', $focus->guide_phone);
    $ss->assign('OPERATOR', $focus->operator);
    $ss->assign('OPERATOR_PHONE', $focus->operator_phone);
    $ss->assign('PICKUP_CAR', $focus->get_pickup_car_editview($app_strings,$mod_strings));
    $ss->assign('PICK_UP_CAR_COUNT', $focus->pick_up_car_line_count());
    $ss->assign('GUIDE', $focus->get_guide_editview($app_strings,$mod_strings));
    $ss->assign('GUIDE_COUNT', $focus->guide_count());
    $ss->assign('LEADER', $focus->get_leader_editview($app_strings,$mod_strings));
    $ss->assign('LEADER_COUNT', $focus->leader_count());
    
    $ss->assign('SIGHTSEEING_CAR', $focus->sightseeing_car_editview($app_strings,$mod_strings));
    $ss->assign('SIGHTSEEING_CAR_COUNT', $focus->sightseeing_car_line_count());
    $ss->assign('GROUP_PROGRAM_LINE', $focus->get_groupProgram_editview($app_strings,$mod_strings));
    $ss->assign('GROUPPROGRAM_LINE_COUNT', $focus->groupProgram_line_count());
    $ss->assign('WORKSHEET', $focus->groupprograorksheets_name);
    $ss->assign('WORKSHEET_ID', $focus->groupprogr53b5ksheets_idb);
    $ss->assign('INSURANCE', $focus->groupprogransurances_name);
    $ss->assign('INSURANCE_ID', $focus->groupprogr5003urances_idb);
    $ss->assign('PASSPORT', $focus->groupprograsportlist_name);
    $ss->assign('PASSPORT_ID', $focus->groupprogrc66dortlist_idb);
    $ss->assign('TICKET', $focus->groupprograketslists_name);
    $ss->assign('TICKET_ID', $focus->groupprogr60cctslists_idb);
    

    // git popup request data
    $git_popup_request_data = array(
      'call_back_function'  => 'set_return',
      'form_name'       => 'EditView',
      'field_to_name_array' => array(
        'id'   => 'grouplists87eduplists_ida',
        'name'  => 'grouplists_pprograms_name',
      ),
    );
    
    $ss->assign('gits_popup_request_data', json_encode($git_popup_request_data));
    
    
    // worksheet popup request data
    
    $worksheet_popup_request_data = array(
        'call_back_function'    => 'set_return',
        'form_name'     => 'EditView',
        'field_to_name_array'   => array(
          'id'  => 'groupprogr53b5ksheets_idb' ,
          'name' => 'groupprograorksheets_name',
        ),
    );
    
    $ss->assign('worksheet_popup_request_data', json_encode($worksheet_popup_request_data));
    
    // pick up airport guide
    $popup_request_data = array(
        'call_back_function' => 'set_return',
        'form_name' => 'EditView',
        'field_to_name_array' => array(
            'id' => 'guide_pick_up_at_airport_id',
            'name' => 'guide_pick_up_at_airport',
            'phone' => 'pick_up_phone',
        ),
    );
    $ss->assign('pick_up_airport', json_encode($popup_request_data));
    
    // insurance_popup_request_data
    
    $insurance_popup_request_data =array(
      'call_back_function'  => 'set_return',
      'form_name'       => 'EditView',
      'field_to_name_array' => array(
        'id'    => 'groupprogr5003urances_idb',
        'name'  => 'groupprogransurances_name',
      ),
    );
    
   $ss->assign('insurance_popup_request_data',json_encode($insurance_popup_request_data));
   
   // airlines_tickets_popup_request_data 
   
   $airlines_tickets_popup_request_data = array(
     'call_back_function'   => 'set_return',
     'form_name'    => 'EditView',
     'field_to_name_array'  => array(
       'id' =>'groupprogr60cctslists_idb',
       'name'   => 'groupprograketslists_name',
     ),
   );
   
   $ss->assign('airlines_tickets_popup_request_data',json_encode($airlines_tickets_popup_request_data));
    
    // operator
    $popup_operator_request_data = array(
        'call_back_function' => 'set_return',
        'form_name' => 'EditView',
        'field_to_name_array' => array(
            'id' => 'assigned_user_id',
            'user_name' => 'operator',
            'phone_mobile' => 'operator_phone',
        ),
    );
   $ss->assign('operator_users',json_encode($popup_operator_request_data));
    
    $popup_giude_request_data = array(
        'call_back_function' => 'set_return',
        'form_name' => 'EditView',
        'field_to_name_array' => array(
            'id' => 'guide_id',
            'name' => 'guide',
            'phone' => 'guide_phone',
        ),
    );
    
    $ss->assign('guide_users',json_encode($popup_giude_request_data));
      
    // leader popup request data
    
    $leader_popup_data_request = array(
        "call_back_function" => "set_return",
         "form_name" => "EditView",
         'field_to_name_array' => array(
            'id' => 'leader_id',
            'name' => 'team_leader',
            'phone' => 'leader_phone',
          )
    );
    $ss->assign('leader_popup_request_data',json_encode($leader_popup_data_request));

 $view_chang_log_data = array(
         "call_back_function" => "set_return",
         "form_name" => "EditView",
         "field_to_name_array" => '[]',
 );
 
 $view_chang_log = $json->encode($view_chang_log_data);
 $ss->assign('view_change_log',$json->encode($view_chang_log_data));
 
 // tour popup
 $tour_popup_request_data = array(
        'call_back_function'    => 'set_return',
        'form_name'                => 'EditView',
        'field_to_name_array'    => array(
               'id'      => 'tour_id',
               'name'    => 'tour_name',
               'tour_code'   => 'tour_code',
               'start_date' => 'start_date_group',
               'end_date'   => 'end_date_group',
               'duration'   => 'duration',
           ),
       );
 $ss->assign('tour_popup_request_data',$json->encode($tour_popup_request_data));
 
 
 // GIT popup 
 
 $account_made_tour_popup = array(
    'call_back_function'    => 'set_return',
        'form_name'         => 'EditView',
        'field_to_name_array'    => array(
               'id'      => 'accounts_g640eccounts_ida',
               'name'    => 'accounts_grpprograms_name' ,
               ),
 );
 
$ss->assign('account_made_tour_popup', $json->encode($account_made_tour_popup));


// FIT popup

$fit_made_tour_popup = array(
   'call_back_function'    => 'set_return',
        'form_name'         => 'EditView',
        'field_to_name_array'    => array(
               'id'      => 'fits_group33fdamsfits_ida',
               'name'    => 'fits_groupprograms_name' ,
               ),
);

 $ss->assign('fit_made_tour_popup', $json->encode($fit_made_tour_popup));
// passportlist
$passport_popup_request_data = array(
     'call_back_function'    => 'set_return',
        'form_name'         => 'EditView',
        'field_to_name_array'    => array(
               'id'      => 'groupprogrc66dortlist_idb',
               'name'    => 'groupprograsportlist_name' ,
               ),
);
$ss->assign('passport_popup_request_data',$json->encode($passport_popup_request_data));   




require_once('include/javascript/javascript.php');
   $javascript = new javascript();
   $javascript->setFormName('EditView');
   $javascript->setSugarBean($focus);
   $javascript->addAllFields('');  
   
   echo $javascript->getScript(); 

   $ss->display('modules/GroupPrograms/EditView.tpl');
   
   $str = "<script>
     YAHOO.util.Event.addListener(window, 'load', SUGAR.util.fillShortcuts);
   </script>";
    echo $str;
?>
