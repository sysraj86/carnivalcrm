<?php

$admin_option_defs=array();
$admin_option_defs['Administration']['PromotionSetting_Manager']= array('PromotionSetting','LBL_PROMOTIONSETTING','LBL_MANAGE_PROMOTIONSETTING','./index.php?module=PromotionSetting&action=index');
$admin_option_defs['Administration']['PromotionSetting_Config']= array('PromotionSetting','LBL_CONFIG_PROMOTIONSETTING_TITLE','LBL_CONFIG_PROMOTIONSETTING','./index.php?module=PromotionSetting&action=EditView&record=fd500b77-981a-01bf-d8e2-4eb2317fc380');
$admin_group_header[]= array('LBL_PROMOTIONSETTING','',false,$admin_option_defs, '');


?>