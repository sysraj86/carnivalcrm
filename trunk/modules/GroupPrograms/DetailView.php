<?php
    require_once('XTemplate/xtpl.php');
    require_once('data/Tracker.php');
    require_once('modules/GroupPrograms/GroupProgram.php');
    require_once('modules/GroupPrograms/Forms.php');
    require_once('include/DetailView/DetailView.php');
    
    
    global $mod_strings;
    global $app_strings;
    global $app_list_strings;
    global $gridline;
    
    
    $focus =new GroupProgram();

    $detailView = new DetailView();
    $offset     = 0;
    $ss = new Sugar_Smarty();
    $json = getJSONobj();


// ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
// A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR
   if (isset($_REQUEST['offset']) or isset($_REQUEST['record'])) {
       $result = $detailView->processSugarBean("GROUPPROGRAMS", $focus, $offset);
       if($result == null) {
        sugar_die($app_strings['ERROR_NO_RECORD']);
       }
       $focus = $result;
   }else{
       header("Location: index.php?module=GroupPrograms&action=index");
   }
   
   if(isset($_REQUEST['isDuplicate']) && $_REQUEST['isDuplicate'] == 'true') {
       $focus->id = "";
   }
   
    echo "\n<p>\n";
    echo get_module_title($mod_strings['LBL_MODULE_ID'], $mod_strings['LBL_MODULE_NAME'].": ".$focus->name, true);
    echo "\n</p>\n";
    global $theme;
    $theme_path = "themes/".$theme."/";
    $image_path = $theme_path."images/";
    require_once($theme_path.'layout_utils.php');

    $GLOBALS['log']->info("Group programs detail view");
    
    $ss->assign("MOD",          $mod_strings);
    $ss->assign("APP",          $app_strings);
    $ss->assign("THEME",        $theme);
    $ss->assign("GRIDLINE",     ($gridline) ? $gridline : 0);
    $ss->assign("IMAGE_PATH",   $image_path);
    $ss->assign("PRINT_URL",   "index.php?".$GLOBALS['request_string']);
    $ss->assign("ID",           $focus->id);
   /* if(!empty($focus->status)){
        $ss->assign('STATUS' ,translate('groupprogram_status_dom','',$focus->status));
    }
    else{$ss->assign('STATUS' ,translate('groupprogram_status_dom','',''));}   */
    $ss->assign('NOTES', $focus->notes);
    $ss->assign("NAME",  $focus->name); 
    $ss->assign("CODE",  $focus->groupprogram_code);
    $ss->assign("ASSIGNED_USER_ID",$focus->assigned_user_id );  
    $ss->assign("GROUP_ID",  $focus->grouplists87eduplists_ida); 
    $ss->assign("GROUP",  $focus->grouplists_pprograms_name); 
    $ss->assign("GIT_ID",  $focus->accounts_g640eccounts_ida); 
    $ss->assign("GITS",  $focus->accounts_grpprograms_name); 
    $ss->assign('NUM_OF_DATE', $focus->numofdate);
    $ss->assign('NUM_OF_NIGHT', $focus->numofnight);
    $ss->assign("TOUR_NAME",  $focus->tour_name);
    $ss->assign("TOUR_CODE",  $focus->tour_code); 
    $ss->assign("TOUR_ID",  $focus->tour_id); 
    $ss->assign("START_DATE",  $focus->start_date_group); 
    $ss->assign("END_DATE",  $focus->end_date_group);  
    $ss->assign("PICK_UP_AIRPORT",  $focus->guide_pick_up_at_airport); 
    $ss->assign("AIRPORT_PHONE",  $focus->pick_up_phone); 
    $ss->assign("GUIDE_PICK_UP_AT_AIRPORT_ID",  $focus->guide_pick_up_at_airport_id); 
    $ss->assign("OPERATOR",  $focus->operator);
    $ss->assign("OPERATOR_PHONE",  $focus->operator_phone);
    $ss->assign('ACCOUNT_NAME', $focus->accounts_grpprograms_name);
    $ss->assign('ACCOUNT_ID', $focus->accounts_g640eccounts_ida);
    $ss->assign('FITS_NAME', $focus->fits_groupprograms_name);
    $ss->assign('FITS_ID', $focus->fits_group33fdamsfits_ida); 
    $ss->assign("OPERATOR_ID",  $focus->operator_id); 
    $ss->assign("LEADER",  $focus->get_leader_detailview());
    $ss->assign("GUIDE",  $focus->get_guide_detailview());
    $ss->assign("PICK_UP_CAR",  $focus->pick_up_car_detailview()); 
    $ss->assign("SIGHTSEEING_CAR",  $focus-> sightseeing_car_detailview()); 
    $ss->assign('GROUP_PROGRAM_LINE',$focus->get_group_program_detailview($focus->id));
    $ss->assign('GROUPPROGRAM_LINE_COUNT', $focus->groupProgram_line_count());
    $ss->assign('WORKSHEET', $focus->groupprograorksheets_name);
    $ss->assign('WORKSHEET_ID', $focus->groupprogr53b5ksheets_idb);
    $ss->assign('INSURANCE', $focus->groupprogransurances_name);
    $ss->assign('INSURANCE_ID', $focus->groupprogr5003urances_idb);
    $ss->assign('PASSPORT', $focus->groupprograsportlist_name);
    $ss->assign('PASSPORT_ID', $focus->groupprogrc66dortlist_idb);
    $ss->assign('TICKET', $focus->groupprograketslists_name);
    $ss->assign('TICKET_ID', $focus->groupprogr60cctslists_idb);
    $ss->assign('DATE_ENTERED', $focus->date_entered);
    $ss->assign('CREATED_BY', $focus->created_by_name);
    $ss->assign('DATE_MODIFIED', $focus->date_modified);
    $ss->assign('MODIFIED_BY', $focus->modified_by_name);
    
    // view change log
    
     $view_chang_log_data = array(
         "call_back_function" => "set_return",
         "form_name" => "EditView",
         "field_to_name_array" => '[]',
 );
 
 $ss->assign('view_change_log',$json->encode($view_chang_log_data));
    
    $ss->display('modules/GroupPrograms/DetailView.tpl');
    
    require_once('include/SubPanel/SubPanelTiles.php');
   $subpanel = new SubPanelTiles($focus, 'GroupPrograms');
   echo $subpanel->display();
    
     $str = "<script>
     YAHOO.util.Event.addListener(window, 'load', SUGAR.util.fillShortcuts, $savedSearchSelects);
   </script>";
   
    echo $str;
   
?>
