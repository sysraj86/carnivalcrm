<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
    require_once('modules/ContractAppendixs/ContractAppendixs.php');
    require_once('modules/ContractAppendixs/Forms.php');
    require_once('modules/Releases/Release.php');  

    global $db;
    global $app_strings;
    global $mod_strings;
    global $mod_strings;
    global $current_user;
    global $sugar_version, $sugar_config;
    $focus       = new ContractAppendixs();
    $contract_condition = new ContractCondition();
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

        $GLOBALS['log']->info("ContractAppendixs detail view");   

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
        if (empty($focus->assigned_name)    && empty($focus->id))  $focus->assigned_user_name = $current_user->full_name;
        $ss->assign("ASSIGNED_USER_OPTIONS",    get_select_options_with_id(get_user_array(TRUE, "Active", $focus->assigned_user_id), $focus->assigned_user_id));
        $ss->assign("ASSIGNED_USER_NAME",       $focus->assigned_user_name);
        $ss->assign("ASSIGNED_USER_ID",         $focus->assigned_user_id );
        $ss->assign('CALENDAR_DATEFORMAT', $timedate->get_cal_date_format());
        $ss->assign('USER_DATEFORMAT', $timedate->get_user_date_format()); 
        $ss->assign('TYPE',$focus->type);
        $ss->assign("NUMBER", $focus->number);
        $ss->assign("DATE", $focus->date);
        $ss->assign("CONTRACT", $focus->contract);
        $ss->assign("DATE_CONTRACT", $focus->date_contract);
        $ss->assign("NUMBER_CONTRACT", $focus->number_contract);

        $ss->assign("SALUTATION_A", get_select_options_with_id($app_list_strings['xung_ho_dom'], $focus->salutation_a))  ;
        $ss->assign("DAIDIENBENA", $focus->daidienbena);
        $ss->assign("DAIDIENBENB", $focus->daidienbenb);
        $ss->assign("POSITION_A", get_select_options_with_id($app_list_strings['position_dom'],$focus->position_a));
        $ss->assign("ADDRESS_A", $focus->address_a);
        $ss->assign("PHONE_A", $focus->phone_a);
        $ss->assign("PHONE_A", $focus->phone_a);
        $ss->assign("FAX", $focus->fax);
        $ss->assign("MST_BENA", $focus->mst_bena);
        $ss->assign("BANK_NAME", $focus->bank_name);
        $ss->assign("ACCOUNT_NAME", $focus->account_name);
        $ss->assign("ACCOUNT_VND", $focus->account_vnd);
        $ss->assign("ACCOUNT_USD", $focus->account_usd);
        $ss->assign("SWIFT_CODE", $focus->account_usd);
        $ss->assign("BANK_ADDRESS", $focus->bank_address);
        $ss->assign("DAIDIENBENB", $focus->daidienbenb);
        $ss->assign("DAIDIENBENB_NAME", $focus->daidienbenb_name);
        $ss->assign("SALUTATION_B", get_select_options_with_id($app_list_strings['xung_ho_dom'], $focus->salutation_b));   
        $ss->assign("POSITION_B", get_select_options_with_id($app_list_strings['position_dom'], $focus->position_b));   
        $ss->assign("ADDRESS_B",  $focus->address_b);   
        $ss->assign("MST_BENB",  $focus->mst_benb);   
        $ss->assign("PHONE_B",  $focus->phone_b);   
        $ss->assign("TOUR",  $focus->tour);   
        $ss->assign("TOUR_ID",  $focus->tour_id);   
        $ss->assign("PURPOSE",  $focus->purpose); 
        $ss->assign("KETHOP",  $focus->associate); 
        $ss->assign("START_DATE",  $focus->start_date_contract); 
        $ss->assign("END_DATE",  $focus->end_date_contract);      
        $ss->assign("NUM_OF_DATE",  $focus->num_of_date);      
        $ss->assign("NUM_OF_NIGHT",  $focus->num_of_night);      
        $ss->assign("TREPERCENT",  $focus->trepercent);      
        $ss->assign("TREPERCENT_1",  $focus->trepercent_1);   

        $ss->assign("SL_KHACH",  $focus->sl_khach);   
          
        $ss->assign("CONTRACT_VALUES",  $focus->get_contract_values_editview_line());  
        $ss->assign("CONTRACT_VALUE_COUNT",  $focus->contract_values_line_count());  

        $ss->assign("TONGTIEN",  number_format($focus->tongtien,'2','.',''));  
        $ss->assign("BANGCHU",  $focus->bangchu);   
        $ss->assign("TIGIA",  $focus->tigia);   
        $ss->assign("SL_KHACH_1",  $focus->sl_khach_1);   
        $ss->assign("GIA_TOUR_1",  number_format($focus->gia_tour_1,'2','.',''));      
        $ss->assign("TIENTE",   get_select_options_with_id($app_list_strings['currency_dom'], $focus->tiente)); 
        $ss->assign("TIENTE2",   get_select_options_with_id($app_list_strings['currency_dom'],'usd')); 
        $ss->assign("TIENTE_USD",   get_select_options_with_id($app_list_strings['currency_dom'],$focus->tiente_usd));
        $ss->assign("TIENTE_VND",   get_select_options_with_id($app_list_strings['currency_dom'], $focus->tiente_vnd));
        $ss->assign("TEN_NGANHANG",   $focus->ten_nganhang);
        $ss->assign("BAOGOM",   $focus->baogom);
        $ss->assign("KHONGBAOGOM", $focus->khongbaogom);
        $ss->assign("DOTTHANHTOAN", $focus->dotthanhtoan);
        $ss->assign("BIRTHDAY", $focus->birthday);
        $ss->assign("GUIDER_TYPE", $focus->guider_type);
        $ss->assign("GUIDE_CARD_NO", $focus->guide_card_no);
        $ss->assign("SOTAIKHOANBENB", $focus->sotaikhoanbenb);
        $ss->assign("BANK_NAME_B", $focus->bank_name_b);
        $ss->assign("ACCOUNT_NAME_B", $focus->account_name_b);
        $ss->assign("PASSPORT", $focus->passport_no_guide);
        $ss->assign("DATE_ISSUED", $focus->date_issued_guide);
        $ss->assign("GIATRIHOPDONGXE", $focus->giatrihopdongxe);
        $ss->assign("HOPDONGTHUEXE_PERCENT", $focus->hopdongthuexe_percent);
        $ss->assign("HOPDONGTHUEXE_INWORD", $focus->hopdongthuexe_inword);
        $ss->assign("NUM_OF_CUS_GUIDE", $focus->num_of_cus_guide);
        $ss->assign("CONTRACT_GUIDE_COST", $focus->contract_guide_cost);
        $ss->assign("GUIDE_INWORD", $focus->guide_inword);
        $ss->assign("BONUS", $focus->guide_bonus);
        $ss->assign("TOTAL_BONUS", $focus->total_bonus);
        $ss->assign("GUIDE_NUM_OF_DATE", $focus->guide_num_of_date);
        $ss->assign("EXPIRATION_DATE", $focus->expiration_date);
        $ss->assign("JOURNEY", $focus->journey);
        $ss->assign("PARENT_NAME", $focus->parent_name);
        $ss->assign("PARENT_ID", $focus->parent_id);
        $ss->assign("GUIDE_CURRENCY", get_select_options($app_list_strings['currency_dom'],$focus->guide_currency));
        $ss->assign("CONTRACT_CONDITIONS", $focus->get_contract_condition_editview_line($mod_strings));
        $ss->assign("CONTRACT_CONDITION_LINE_COUNT", $focus->contract_condition_line_count());
        $ss->assign("TRANSPORTCONTRACT_LINE", $focus->get_transportcontract_editview());
        $ss->assign("TRANSPORTCOUNT", $focus->get_transportcontract_line_count());
        $ss->assign("SOLANTHANHTOAN", $focus->solanthanhtoan);
        $ss->assign("NGUOIDAIDIENBENB", $focus->nguoidaidienbenb);
        $ss->assign("NGUOIDAIDIENBENA", $focus->nguoidaidienbena);
        $ss->assign("TENSANBAY", $focus->tensanbay);
        $ss->assign('TEMPLATE',get_select_options($app_list_strings['template_ddown_c_list'],$focus->template_ddown_c)) ;  
        $ss->assign('PARENT_TYPE',get_select_options($app_list_strings['contract_parent_type_display'],$focus->parent_type)) ;  
        
        $popup_request_data = array(
        'call_back_function' => 'set_return',
        'form_name' => 'EditView',
        'field_to_name_array' => 
            array(
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

        require_once('include/javascript/javascript.php');
        $javascript = new javascript();
        $javascript->setFormName('EditView');
        $javascript->setSugarBean($focus);
        $javascript->addAllFields('');  

        echo $javascript->getScript();
        if($_REQUEST['record'] != ''){
            if($focus->type == ''){
                 $focus->type = 'Outbound';              
             }
             $ss->assign('TYPE',$focus->type);
             $ss->assign('PARENT',$focus->parent_type);
             $ss->display("modules/ContractAppendixs/tpls/EditView/{$focus->type}.tpl") ; 
        }else{
            $type = $_REQUEST['type'];
            if($type == '')
                $type = 'home';
            $ss->assign('TYPE',$type);
            $ss->display("modules/ContractAppendixs/tpls/EditView/{$type}.tpl");
        }    
    
        $str = "<script>
        YAHOO.util.Event.addListener(window, 'load', SUGAR.util.fillShortcuts);
        </script>";

        echo $str;
?>
