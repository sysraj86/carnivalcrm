<?php
    require_once('XTemplate/xtpl.php');
    require_once('data/Tracker.php');
    require_once('modules/ContractAppendixs/ContractAppendixs.php');
    require_once('modules/ContractAppendixs/Forms.php');
    require_once('include/DetailView/DetailView.php');
    
    global $mod_strings;
    global $app_strings;
    global $app_list_strings;
    global $gridline;
    
    
    $focus =new ContractAppendixs();
    $detailView = new DetailView();
    $offset     = 0;

// ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
// A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR
   if (isset($_REQUEST['offset']) or isset($_REQUEST['record'])) {
       $result = $detailView->processSugarBean("CONTRACTAPPENDIXS", $focus, $offset);
       if($result == null) {
        sugar_die($app_strings['ERROR_NO_RECORD']);
       }
       $focus = $result;
   }else{
       header("Location: index.php?module=ContractAppendixs&action=index");
   }
   
   if(isset($_REQUEST['isDuplicate']) && $_REQUEST['isDuplicate'] == 'true') {
       $focus->id = "";
   }
   
   // echo "\n<p>\n";
   // echo get_module_title($mod_strings['LBL_MODULE_ID'], $mod_strings['LBL_MODULE_NAME'].": ".$focus->name, true);
   // echo "\n</p>\n";
    global $theme;
    $theme_path = "themes/".$theme."/";
    $image_path = $theme_path."images/";
    require_once($theme_path.'layout_utils.php');

    $GLOBALS['log']->info("Contracts detail view");

    $xtpl=new XTemplate ('modules/ContractAppendixs/DetailView.html');
    
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
    $xtpl->assign("CONTRACT_NUMBER",  $focus->contract);
    $xtpl->assign("TOUR",  $focus->tour);
    $xtpl->assign("TOUR_ID",$focus->tour_id);  
    
    if(!empty($focus->salutation_a))   {
      $xtpl->assign("SALUTATION", translate('xung_ho_dom','', $focus->salutation_a))  ;  
    }
    else{
         $xtpl->assign("SALUTATION",'');
    }
    
    
    $xtpl->assign("DAIDIENBENA", $focus->daidienbena);
    $xtpl->assign("DAIDIENBENB", $focus->daidienbenb);
    $xtpl->assign("POSITION_A", translate('position_dom','',$focus->position_a));
    $xtpl->assign("ADDRESS_A", $focus->address_a);
    $xtpl->assign("PHONE_A", $focus->phone_a);
    $xtpl->assign("PHONE_A", $focus->phone_a);
    $xtpl->assign("FAX", $focus->fax);
    $xtpl->assign("MST_BENA", $focus->mst_bena);
    $xtpl->assign("BANK_NAME", $focus->bank_name);
    $xtpl->assign("ACCOUNT_NAME", $focus->account_name);
    $xtpl->assign("ACCOUNT_VND", $focus->account_vnd);
    $xtpl->assign("ACCOUNT_USD", $focus->account_usd);
    $xtpl->assign("SWIFT_CODE", $focus->account_usd);
    $xtpl->assign("BANK_ADDRESS", $focus->bank_address);
    $xtpl->assign("DAIDIENBENB_NAME", $focus->daidienbenb_name);
    if (!empty($focus->salutation_b)){
      $xtpl->assign("SALUTATION_B", translate('xung_ho_dom','', $focus->salutation_b));  
    }
    else{
        $xtpl->assign("SALUTATION_B", "" );
    }
    if(!empty($focus->position_b))  {
      $xtpl->assign("POSITION_B", translate('position_dom','', $focus->position_b));     
    }
    else{
       $xtpl->assign("POSITION_B","" );
    }
    
    $xtpl->assign("ADDRESS_B",  $focus->address_b);   
    $xtpl->assign("MST_BENB",  $focus->mst_benb);   
    $xtpl->assign("PHONE_B",  $focus->phone_b);   
    $xtpl->assign("TOUR_NAME",  $focus->tour_name);   
    $xtpl->assign("TOUR_ID",  $focus->tour_id);   
    $xtpl->assign("PURPOSE",  $focus->purpose);   
    $xtpl->assign("KETHOP",  $focus->associate);   
    $xtpl->assign("START_DATE",  $focus->start_date_contract);   
    $xtpl->assign("END_DATE",  $focus->end_date_contract);
    $xtpl->assign("TREPERCENT",  $focus->trepercent);   
    $xtpl->assign("TREPERCENT_1",  $focus->trepercent_1);   
    $xtpl->assign("NUM_OF_NIGHT",  $focus->num_of_night);
    $xtpl->assign("NUM_OF_DATE",  $focus->num_of_date);
    $xtpl->assign("PARENT_NAME", $focus->parent_name);
    $xtpl->assign("PARENT_ID", $focus->parent_id);
    $xtpl->assign("BIRTHDAY", $focus->birthday);
    $xtpl->assign("PASSPORT", $focus->passport);
    $xtpl->assign("DATE_ISSUED", $focus->date_issued);
       
    $xtpl->assign("SL_KHACH",  $focus->sl_khach);   
    /*$xtpl->assign("DOTUOI",  $focus->dotuoi);   
    $xtpl->assign("TONG_SL_KHACH",  $focus->tong_sl_khach);   
    $xtpl->assign("GIA_TOUR",  $focus->gia_tour);   
    $xtpl->assign("THUE",  $focus->thue);   
    $xtpl->assign("THANHTIEN",  $focus->thanhtien);*/   
    $xtpl->assign("CONTRACT_VALUE",  $focus->get_contract_values_detailview($focus->id));
    
    $xtpl->assign("TONGTIEN",  number_format($focus->tongtien,'2',',','.'));   
    $xtpl->assign("BANGCHU",  $focus->bangchu);   
    $xtpl->assign("SL_KHACH_1",  $focus->sl_khach_1);   
    $xtpl->assign("GIA_TOUR_1",  number_format($focus->gia_tour_1,'2',',','.'));   
    $xtpl->assign("TIENTE",    translate('currency_dom','', $focus->tiente)); 
    $xtpl->assign("TIENTE_USD",    translate('currency_dom','', $focus->tiente_usd));
    $xtpl->assign("TIENTE_VND",    translate('currency_dom','', $focus->tiente_vnd));
    $xtpl->assign("TEN_NGANHANG",    $focus->ten_nganhang);
    $xtpl->assign("BAOGOM",   html_entity_decode(nl2br($focus->baogom)));
    $xtpl->assign("KHONGBAOGOM", html_entity_decode(nl2br($focus->khongbaogom)));
    $xtpl->assign("DOTTHANHTOAN", $focus->dotthanhtoan);
    /*$xtpl->assign("SUKIEN", $focus->sukien);
    $xtpl->assign("PHANTRAM", $focus->phantram);
    $xtpl->assign("TIENTHANHTOAN", $focus->tienthanhtoan);
    $xtpl->assign("BANGCHU1", $focus->bangchu1);*/
    $xtpl->assign("CONTRACT_CONDITION", $focus->get_contract_condition_detailview($focus->id));
    $xtpl->assign("SOLANTHANHTOAN", $focus->solanthanhtoan);
    $xtpl->assign("NGUOIDAIDIENBENB", $focus->nguoidaidienbenb);
    $xtpl->assign("NGUOIDAIDIENBENA", $focus->nguoidaidienbena);
    $xtpl->assign("TENSANBAY", $focus->tensanbay);
    
    
    
    
    
    $xtpl->parse("main");
    $xtpl->out("main");
    
     $str = "<script>
     YAHOO.util.Event.addListener(window, 'load', SUGAR.util.fillShortcuts, $savedSearchSelects);
   </script>";
   
    echo $str;
   
?>
