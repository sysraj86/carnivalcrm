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

require_once("modules/AppendixContract/AppendixContract.php");
require_once('modules/Currencies/ListCurrency.php'); 

    
global $app_strings;
global $timedate;
global $app_list_strings;
global $mod_strings;
global $current_user;
global $sugar_version, $sugar_config;
global $theme; 



$focus = new AppendixContract();
$ss = new Sugar_Smarty();
$ss->assign("MOD", $mod_strings);
$ss->assign("APP", $app_strings);


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
if(isset($_REQUEST['record']) && $_REQUEST['record'] != '') {
    $focus->retrieve($_REQUEST['record']);
    
    if($focus->type == '')  {
        $focus->type == 'AppendixContract';//gan gia tri mac dinh neu type = null
    }
    //xu ly du lieu khoi tao ban dau cho chiet tinh
    
    //...
    
    
    //hien thi
    
    $ss->display("modules/AppendixContract/tpls/{$focus->type}.tpl"); 
   
    
}else{//new record
    
    $type = $_REQUEST['type'];
    if($type == '')
        $type = 'home';
        
    $ss->display("modules/AppendixContract/tpls/{$type}.tpl");
}


?>
