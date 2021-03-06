<?php
    require_once('XTemplate/xtpl.php');
    require_once('data/Tracker.php');
    require_once('modules/RoomBookings/RoomBookings.php');
    require_once('modules/RoomBookings/Forms.php');
    require_once('include/DetailView/DetailView.php');
    
    global $mod_strings;
    global $app_strings;
    global $app_list_strings;
    global $gridline;
    
    
    $focus = new RoomBookings();
    $detailView = new DetailView();
    $offset     = 0;

// ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
// A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR
   if (isset($_REQUEST['offset']) or isset($_REQUEST['record'])) {
       $result = $detailView->processSugarBean("ROOMBOOKINGS", $focus, $offset);
       if($result == null) {
        sugar_die($app_strings['ERROR_NO_RECORD']);
       }
       $focus = $result;
   }else{
       header("Location: index.php?module=RoomBookings&action=index");
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

    $GLOBALS['log']->info("RoomBookings detail view");

    $xtpl=new XTemplate ('modules/RoomBookings/DetailView.html');
    
    $xtpl->assign("MOD",          $mod_strings);
    $xtpl->assign("APP",          $app_strings);
    $xtpl->assign("THEME",        $theme);
    $xtpl->assign("GRIDLINE",     ($gridline) ? $gridline : 0);
    $xtpl->assign("IMAGE_PATH",   $image_path);
    $xtpl->assign("PRINT_URL",   "index.php?".$GLOBALS['request_string']);
    $xtpl->assign("ID",           $focus->id);
    $xtpl->assign("ASSIGNED_TO",  $focus->assigned_user_name);
    if(!empty($focus->name)){
        $xtpl->assign("NAME",  $focus->name); 
    }
     else{
            $xtpl->assign("NAME",'');
     }
    $xtpl->assign('CODE', $focus->code);
    $xtpl->assign('HOTEL', $focus->hotels_roombookings_name);
    $xtpl->assign('HOTEL_ID', $focus->hotels_rooc622shotels_ida);
    $xtpl->assign('ADDRESS', $focus->hotel_address);
    $xtpl->assign('ATTN_HOTEL_NAME', $focus->attn_hotel_name);
    $xtpl->assign('ATTN_HOTEL_PHONE', $focus->attn_hotel_phone);
    $xtpl->assign('ATTN_HOTEL_NAME_ID', $focus->attn_hotel_name_id);
    $xtpl->assign('HOTEL_TEL', $focus->hotel_tel);
    $xtpl->assign('HOTEL_FAX', $focus->hotel_fax);
    $xtpl->assign('HOTEL_FAX', $focus->hotel_fax);
    $xtpl->assign('FROM', $focus->company);
    //$xtpl->assign('ATTN_NAME', $focus->attn_name);
    $xtpl->assign('ATTN_NAME', $focus->assigned_user_name);
    $xtpl->assign('ATTN_PHONE', $focus->attn_phone);
    //$xtpl->assign('ATTN_ID', $focus->attn_id);
    $xtpl->assign('ATTN_ID', $focus->assigned_user_id);
    $xtpl->assign('ATTN_EMAIL', $focus->attn_email);
    $xtpl->assign('TEL', $focus->attn_tel);
    $xtpl->assign('FAX', $focus->attn_fax);
    $xtpl->assign('MADETOUR', $focus->groupprogrambookings_name);
    $xtpl->assign('MADETOUR_ID', $focus->groupprogra66erograms_ida);
    $xtpl->assign('DEADLINE', $focus->deadline);
    if(!empty($focus->nationlity)){
       $xtpl->assign('NATIONLITY',translate('countries_dom','', $focus->nationlity));  
    }
    else{
        $xtpl->assign('NATIONLITY','');
    }
    $xtpl->assign('BOOKINGLINE', $focus->get_bookingroom_detailview($focus->id));
    $xtpl->assign('SERVICE', $focus->get_service_detail($focus->id));
    $xtpl->assign('CONVENTION', html_entity_decode(nl2br($focus->convention)));
    $xtpl->assign('COST', $focus->cost);
    $xtpl->assign('INCLUDE', html_entity_decode(nl2br($focus->include))); 
    $xtpl->assign('DINING_PLAN', html_entity_decode(nl2br($focus->dining_plan))); 
    if($focus->confirm == 0){
        $xtpl->assign('CONFIRM', 'No');
    }
    else{
         $xtpl->assign('CONFIRM', "Yes");
    }
    $xtpl->assign('DATE',$focus->date);
    $xtpl->assign('DEPARMENT',$focus->deparment);
    $xtpl->assign('GIA',$focus->gia);
    $xtpl->assign('DATE_ENTERED',$focus->date_entered. ' ('.$focus->created_by_name.')');
    $xtpl->assign('DATE_MODIFIED',$focus->date_modified. ' ('.$focus->modified_by_name.')');     
     
    /*$xtpl->assign("TOURCODE",  $focus->tour_code);  
    $xtpl->assign("FROM",  $focus->from_place);  
    $xtpl->assign("LOCATION_TO_ID",  $focus->location_to_id);  
    $xtpl->assign("TO",  $focus->to_place); 
    $xtpl->assign("LOCATION_ID",  $focus->location_id); 
    $xtpl->assign("START_DATE",  $focus->start_date); 
    $xtpl->assign("END_DATE",  $focus->end_date); 
    $xtpl->assign("DURATION",  $focus->duration); 
    $xtpl->assign("ACCOUNT_NAME",        $focus->accounts_tours_name)  ; 
    $xtpl->assign("ACCOUNT_ID",        $focus->accounts_t4d21ccounts_ida)  ; 
    if(!empty($focus->transport)){
      $xtpl->assign("TRANSPORT",  translate('transport_dom','',$focus->transport));  
    }
    else{$xtpl->assign("TRANSPORT", ''); }
    
    if(!empty($focus->picture)){
      $xtpl->assign('PICTURE',"<img src='".$sugar_config['site_url']."/modules/images/".$focus->picture."' width='350' height='200'/>") ; 
    }
    else {$xtpl->assign('PICTURE','');}
    
    
    $xtpl->assign("VALUE",  $focus->contract_value); 
    if(!empty($focus->currency)) {
        $xtpl->assign("CURRENCY",   translate('currency_dom','',$focus->currency));  
    }
    else{$xtpl->assign("CURRENCY",  '');  }
    
    if(!empty($focus->division)){
     $xtpl->assign("DIVISION",   translate('division_dom','',$focus->division));     
    }  
    else{$xtpl->assign("DIVISION",  '');  }
    
    if(!empty($focus->tour_type)){
        $xtpl->assign('TYPE', translate('tour_type_dom','',$focus->tour_type));
    }
    else{
        $xtpl->assign('TYPE', translate('tour_type_dom','',''));
    }
    
    $xtpl->assign("OPERATOR",  $focus->operator);  
    $xtpl->assign("DESCRIPTION", html_entity_decode(nl2br( $focus->description)));  
    $xtpl->assign("TOUR_PROGRAM_LINE_DETAIL", $focus->get_tour_program_detail_view($focus->id));   */
   // $xtpl->assign("TOUR_PROGRAM_LINE_DETAIL", '');  
    
    $xtpl->parse("main");
    $xtpl->out("main");
    
    require_once('include/SubPanel/SubPanelTiles.php');
   $subpanel = new SubPanelTiles($focus, 'Tours');
   echo $subpanel->display();
     
    $str = "<script>
    YAHOO.util.Event.addListener(window, 'load', SUGAR.util.fillShortcuts, $savedSearchSelects);
   </script>";
   
    echo $str;
?>
