<?php
    require_once('XTemplate/xtpl.php');
    require_once('data/Tracker.php');
    require_once('modules/GuideContracts/GuideContracts.php');
    require_once('modules/GuideContracts/Forms.php');
    require_once('include/DetailView/DetailView.php');
    
    global $mod_strings;
    global $app_strings;
    global $app_list_strings;
    global $gridline;
    
    
    $focus =new GuideContracts();
    $detailView = new DetailView();
    $offset     = 0;

// ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
// A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR
   if (isset($_REQUEST['offset']) or isset($_REQUEST['record'])) {
       $result = $detailView->processSugarBean("GuideContracts", $focus, $offset);
       if($result == null) {
        sugar_die($app_strings['ERROR_NO_RECORD']);
       }
       $focus = $result;
   }else{
       header("Location: index.php?module=GuideContracts&action=index");
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

    $GLOBALS['log']->info("GuideContracts detail view");

    $xtpl=new XTemplate ('modules/GuideContracts/DetailView.html');
    
    $xtpl->assign("MOD",          $mod_strings);
    $xtpl->assign("APP",          $app_strings);
    $xtpl->assign("THEME",        $theme);
    $xtpl->assign("GRIDLINE",     ($gridline) ? $gridline : 0);
    $xtpl->assign("IMAGE_PATH",   $image_path);
    $xtpl->assign("PRINT_URL",   "index.php?".$GLOBALS['request_string']);
    $xtpl->assign("ID",           $focus->id);
    $xtpl->assign("ASSIGNED_TO",  $focus->assigned_user_name);
    $xtpl->assign("NAME",  $focus->name);
    $xtpl->assign("NUMBER",  $focus->number);
    $xtpl->assign("DATE",  $focus->date);  
    $xtpl->assign("THANG",  $focus->months);  
    $xtpl->assign("YEAR",  $focus->year);  
    
    if(!empty($focus->salutation))   {
      $xtpl->assign("SALUTATION", translate('xung_ho_dom','', $focus->salutation))  ;  
    }
    else{
         $xtpl->assign("SALUTATION",'');
    }
   $xtpl->assign("NUMBER", $focus->number);
   $xtpl->assign("DATE", $focus->date);
   $xtpl->assign("MONTH", $focus->month);
   $xtpl->assign("YEAR", $focus->year);
   
   $xtpl->assign("COMPANY_NAME", $focus->company_name);
   $xtpl->assign("ADDRESS_A", $focus->address_a);
   $xtpl->assign("PHONE_A", $focus->phone_a);
   $xtpl->assign("ADDRESS_A", $focus->address_a);
   $xtpl->assign("PHONE_A", $focus->phone_a);
   $xtpl->assign("FAX_A", $focus->fax_a);
   $xtpl->assign("REPRESENTING_A", $focus->representing_a);
   $xtpl->assign("REPRESENTING_B", $focus->travelguidecontracts_name);
   $xtpl->assign("TRAVELGUIDE_ID", $focus->travelguidead0lguides_ida);
   $xtpl->assign("BIRTHDAY", $focus->birthday);
   $xtpl->assign("PASSPORT", $focus->account_name);
   $xtpl->assign("DATE_ISSUED", $focus->account_vnd);
   $xtpl->assign("PHONE_B", $focus->phone_b);
   $xtpl->assign("ADDRESS_B", $focus->address_b);
   $xtpl->assign("TOUR_NAME", $focus->tour_name);
   $xtpl->assign("TOUR_ID", $focus->tour_id);
   $xtpl->assign("DATE_START", $focus->date_start);
   $xtpl->assign("DATE_END", $focus->date_end);
   $xtpl->assign("JOURNEY", $focus->journey);
   $xtpl->assign("BONUS", $focus->bonus);
   if(!empty($focus->currency)){   
        $xtpl->assign("CURRENCY",   translate('currency_dom','', $focus->currency)); 
   }
   else{
       $xtpl->assign("CURRENCY",   translate('currency_dom','', '')); 
   }
   if(!empty($focus->partner)){ 
      $xtpl->assign("PARTNER",   translate('partner_dom','', $focus->partner));  
   }
   else{
       $xtpl->assign("PARTNER",   translate('partner_dom','', '')); 
   }
   $xtpl->assign("NUM_OF_DATE", $focus->num_of_date);
   $xtpl->assign("TOTAL_BONUS", $focus->total_bonus);
   $xtpl->assign("INWORD", $focus->inword);
   $xtpl->assign("EXPIRATION_DATE", $focus->expiration_date);
   $xtpl->assign("REPRESENTATIVE_B", $focus->representative_b);
   $xtpl->assign("REPRESENTATIVE_A", $focus->representative_a);
    
    
    $xtpl->parse("main");
    $xtpl->out("main");
    
     /*$str = "<script>
     YAHOO.util.Event.addListener(window, 'load', SUGAR.util.fillShortcuts, $savedSearchSelects);
   </script>";
   
    echo $str;*/
   
?>
