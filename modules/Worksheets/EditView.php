<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    /*********************************************************************************
    * Description:  Worksheet process - EditView
    * Portions created by  Copyright (C) SugarCRM VN
    * All Rights Reserved.
    * Created date: 07/09/2011  
    * Created by (s): Hoc Bui
    * Updated date: 07/09/2011
    * Update by (s): Hoc Bui
    * Notes: draft version
    ********************************************************************************/

    /******** THIET LAP CAN THIET ***********/

    require_once("modules/Worksheets/Worksheets.php");
    require_once('modules/Currencies/ListCurrency.php'); 


    global $app_strings;
    global $timedate;
    global $app_list_strings;
    global $mod_strings;
    global $current_user;
    global $sugar_version, $sugar_config;
    global $theme; 
    $focus = new Worksheets();
    $ss = new Sugar_Smarty();

    if(empty($_REQUEST['return_id'])){
        if(isset($_SESSION['record'])){
            $_REQUEST['record'] = $_SESSION['record'];
            $_REQUEST['return_id'] = $_SESSION['return_id'];
        }
    }
    $ss->assign("MOD", $mod_strings);
    $ss->assign("APP", $app_strings);
    if (isset($_REQUEST['return_module'])) $ss->assign("RETURN_MODULE", $_REQUEST['return_module']);
    if (isset($_REQUEST['return_action'])) $ss->assign("RETURN_ACTION", $_REQUEST['return_action']);
    if (isset($_REQUEST['return_id']))     $ss->assign("RETURN_ID",     $_REQUEST['return_id']); 
    if (empty($focus->assigned_user_id) && empty($focus->id))  $focus->assigned_user_id   = $current_user->id;
    if (empty($focus->assigned_name)    && empty($focus->id))  $focus->assigned_user_name = $current_user->full_name;
    $ss->assign("ASSIGNED_USER_OPTIONS",    get_select_options_with_id(get_user_array(TRUE, "Active", $focus->assigned_user_id), $focus->assigned_user_id));
    $ss->assign("ASSIGNED_USER_NAME",       $focus->assigned_user_name);
    $ss->assign("ASSIGNED_USER_ID",         $focus->assigned_user_id );
    $ss->assign('CALENDAR_DATEFORMAT', $timedate->get_cal_date_format());
    $ss->assign('USER_DATEFORMAT', $timedate->get_user_date_format());

    if (empty($_REQUEST['return_id'])) {
        $ss->assign("RETURN_ACTION", 'index');
    }

    //thiet lap hien thi tien te      
    $currency = new ListCurrency(); 
    $params["currency_symbol"] = false;
    $params["round"] = 0;//ko lam tron
    $params["decimals"] = 0;//khong phan thap phan


    if(isset($focus->currency_id) && !empty($focus->currency_id)){
        $selectCurrency = $currency->getSelectOptions($focus->currency_id);
        $ss->assign("CURRENCY", $selectCurrency);
    }
    else if($current_user->getPreference('currency') && !isset($focus->id))
        {
            $selectCurrency = $currency->getSelectOptions($current_user->getPreference('currency'));
            $ss->assign("CURRENCY", $selectCurrency);
        }else{

            $selectCurrency = $currency->getSelectOptions();
            $ss->assign("CURRENCY", $selectCurrency);

    }   
    echo $currency->getJavascript();

    $seps = get_number_seperators();
    $ss->assign("NUM_GRP_SEP", $seps[0]);
    $ss->assign("DEC_SEP", $seps[1]);

    //Edit record
    //if(isset($_POST['record']) && $_POST['record'] != '') {
    //    if($focus->retrieve($_REQUEST['record'])){
    if($focus->retrieve($_REQUEST['record'])){
        $ss->assign('TYPE',$focus->type);
        require_once("modules/Worksheets/{$focus->type}.php");
    }else{//new record

        $type = $_REQUEST['type'];
        if($type == '')
            $type = 'home';
        $ss->assign('TYPE',$type);
        require_once("modules/Worksheets/{$type}.php");
    }


?>
