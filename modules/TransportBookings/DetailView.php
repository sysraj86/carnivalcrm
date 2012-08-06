<?php
    require_once('XTemplate/xtpl.php');
    require_once('data/Tracker.php');
    require_once('modules/TransportBookings/TransportBookings.php');
    //require_once('modules/GroupPrograms/Forms.php');
    require_once('include/DetailView/DetailView.php');
    
    global $mod_strings;
    global $app_strings;
    global $app_list_strings;
    global $gridline;
    
    
    $focus =new TransportBookings();
    $detailView = new DetailView();
    $offset     = 0;
    $ss = new Sugar_Smarty();
    $json = getJSONobj();

// ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
// A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR
   if (isset($_REQUEST['offset']) or isset($_REQUEST['record'])) {
       $result = $detailView->processSugarBean("TRANSPORTBOOKINGS", $focus, $offset);
       if($result == null) {
        sugar_die($app_strings['ERROR_NO_RECORD']);
       }
       $focus = $result;
   }else{
       header("Location: index.php?module=TransportBookings&action=index");
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

    $GLOBALS['log']->info("TransportBookings detail view");
    
    $ss->assign("MOD",          $mod_strings);
    $ss->assign("APP",          $app_strings);
    $ss->assign("THEME",        $theme);
    $ss->assign("GRIDLINE",     ($gridline) ? $gridline : 0);
    $ss->assign("IMAGE_PATH",   $image_path);
    $ss->assign("PRINT_URL",   "index.php?".$GLOBALS['request_string']);
    $ss->assign("ID",           $focus->id);
    
    $ss->assign('CODE', $focus->code); 
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
    $ss->assign('REQUIRE', html_entity_decode(nl2br($focus->require_transports)));
    if($focus->confirm == 0){
        $ss->assign('CONFIRM', 'No');
    }
    else{
         $ss->assign('CONFIRM', "Yes");
    }
    $ss->assign('DATE', $focus->date);
    $ss->assign('OPERATOR', $focus->operator);
    $ss->assign('MADETOUR', $focus->groupprogratbookings_name); 
    $ss->assign('MADETOUR_ID', $focus->groupprogrd5earograms_ida); 
    $ss->assign('TRANSPORTSBOOKING_LINE', $focus->get_transportBookings_detailview());
    $ss->assign('DEADLINE', $focus->deadline);
    $ss->assign('GIA', $focus->gia);
    $ss->assign('DATE_ENTERED',$focus->date_entered. ' ('.$focus->created_by_name.')');
    $ss->assign('DATE_MODIFIED',$focus->date_modified. ' ('.$focus->modified_by_name.')');    
    // view change log
    
     $view_chang_log_data = array(
         "call_back_function" => "set_return",
         "form_name" => "EditView",
         "field_to_name_array" => '[]',
 );
 
 $ss->assign('view_change_log',$json->encode($view_chang_log_data));
    
    $ss->display('modules/TransportBookings/tpls/DetailView.tpl');
    
    require_once('include/SubPanel/SubPanelTiles.php');
   $subpanel = new SubPanelTiles($focus, 'TransportBookings');
   echo $subpanel->display();
    
     $str = "<script>
     YAHOO.util.Event.addListener(window, 'load', SUGAR.util.fillShortcuts, $savedSearchSelects);
   </script>";
   
    echo $str;
   
?>
