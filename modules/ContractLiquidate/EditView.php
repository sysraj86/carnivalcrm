<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
    require_once('modules/ContractLiquidate/ContractLiquidate.php');
    require_once('modules/Releases/Release.php');  

    global $db;
    global $app_strings;
    global $mod_strings;
    global $mod_strings;
    global $current_user;
    global $sugar_version, $sugar_config;
    $focus       = new ContractLiquidate();
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

        $GLOBALS['log']->info("ContractLiquidate detail view");   

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
        $ss->assign("ASSIGNED_USER_NAME",       $focus->assigned_user_name);
        $ss->assign("ASSIGNED_USER_ID",         $focus->assigned_user_id );
        $ss->assign('CALENDAR_DATEFORMAT', $timedate->get_cal_date_format());
        $ss->assign('USER_DATEFORMAT', $timedate->get_user_date_format()); 

        
        $ss->assign("NUMBER", $focus->number);
        $ss->assign("DATE", $focus->date);      
        $ss->assign("CONTRACT_ID", $focus->contract_id);
        $ss->assign("CONTRACT", $focus->contract);
        $ss->assign("TONGCONG_CONTRACT_KEHOACH",  number_format($focus->tongcong_contract_kehoach,'1','.','')); 
        $ss->assign("TONGCONG_CONTRACT_THUCTE",  number_format($focus->tongcong_contract_thucte,'1','.','')); 
        $ss->assign("TONGCONG_TANG_KEHOACH",  number_format($focus->tongcong_tang_kehoach,'1','.','')); 
        $ss->assign("TONGCONG_TANG_THUCTE",  number_format($focus->tongcong_tang_thucte,'1','.','')); 
        $ss->assign("TONGCONG_GIAM_KEHOACH",  number_format($focus->tongcong_giam_kehoach,'1','.','')); 
        $ss->assign("TONGCONG_GIAM_THUCTE",  number_format($focus->tongcong_giam_thucte,'1','.','')); 
        $ss->assign("TONGTIEN_KEHOACH",  number_format($focus->tongtien_kehoach,'1','.','')); 
        $ss->assign("TONGTIEN_THUCTE",  number_format($focus->tongtien_thucte,'1','.',''));
        $ss->assign("TIENTHANHTOAN",  number_format($focus->tienthanhtoan,'1','.',''));
        $ss->assign("TIENCONLAI",  number_format($focus->tienconlai,'1','.',''));
        $ss->assign("TIENTRALAI",  number_format($focus->tientralai,'1','.',''));
        $ss->assign("GIATRIHOPDONG_COUNT", $focus->giatrihopdong_count());
        $ss->assign("GIATRIHOPDONG", $focus->giatrihopdong_edit());
        $ss->assign("PHATSINHTANG_COUNT", $focus->phatsinhtang_count()); 
        $ss->assign("PHATSINHTANG", $focus->phatsinhtang_edit()); 
        $ss->assign("PHATSINHGIAM_COUNT", $focus->phatsinhgiam_count()); 
        $ss->assign("PHATSINHGIAM", $focus->phatsinhgiam_edit());   
        $ss->assign("BANGCHU",  $focus->bangchu);
        $ss->assign('TEMPLATE',get_select_options($app_list_strings['template_ddown_c_list'],$focus->template_ddown_c)) ;      

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
             $ss->display("modules/ContractLiquidate/tpls/EditView/{$focus->type}.tpl") ; 
        }
             
        else{
            $type = $_REQUEST['type'];
            if($type == '')
                $type = 'home';
            $ss->assign('TYPE',$type);
            $ss->display("modules/ContractLiquidate/tpls/EditView/{$type}.tpl");
        }    
    
        $str = "<script>
        YAHOO.util.Event.addListener(window, 'load', SUGAR.util.fillShortcuts);
        </script>";

        echo $str;
?>
