<?php 
 //WARNING: The contents of this file are auto-generated



$admin_option_defs=array();
$admin_option_defs['Administration']['PromotionSetting_Manager']= array('PromotionSetting','LBL_PROMOTIONSETTING','LBL_MANAGE_PROMOTIONSETTING','./index.php?module=PromotionSetting&action=index');
$admin_option_defs['Administration']['PromotionSetting_Config']= array('PromotionSetting','LBL_CONFIG_PROMOTIONSETTING_TITLE','LBL_CONFIG_PROMOTIONSETTING','./index.php?module=PromotionSetting&action=EditView&record=fd500b77-981a-01bf-d8e2-4eb2317fc380');
$admin_group_header[]= array('LBL_PROMOTIONSETTING','',false,$admin_option_defs, '');





$admin_option_defs=array();
$admin_option_defs['Administration']['securitygroup_management']= array('SecurityGroups','LBL_MANAGE_SECURITYGROUPS_TITLE','LBL_MANAGE_SECURITYGROUPS','./index.php?module=SecurityGroups&action=index');
$admin_option_defs['Administration']['securitygroup_config']= array('SecurityGroups','LBL_CONFIG_SECURITYGROUPS_TITLE','LBL_CONFIG_SECURITYGROUPS','./index.php?module=SecurityGroups&action=config');
$admin_group_header[]= array('LBL_SECURITYGROUPS','',false,$admin_option_defs, '');



 
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$synolia_plugins_installed = 0;
foreach($admin_group_header as $k => $v){
    if(!empty($v) && is_array($v)){
        if($v[0] == 'LBL_SYNOLIA'){
            $synolia_plugins_installed = $k;
        }
    }
}
if( empty($synolia_plugins_installed) ){
    $admin_option_defs = array ();
    $admin_option_defs[] = array (
       'synolia',
      'LBL_SYNOFIELDPHOTO_TITLE',
      'LBL_SYNOFIELDPHOTO_INFOS',
      './index.php?module=Administration&action=synofieldphoto_manage'
    );    
    $admin_group_header[] = array (
        'LBL_SYNOLIA',
        '',
        false,
        array("Administration" => $admin_option_defs),
        'LBL_SYNOLIA_ADMIN_DESC'
    );
}
else{
    $admin_group_header[$synolia_plugins_installed][3]['Administration'][] = array (
        'synolia',
        'LBL_SYNOFIELDPHOTO_TITLE',
        'LBL_SYNOFIELDPHOTO_INFOS',
        './index.php?module=Administration&action=synofieldphoto_manage'
    );
}

?>