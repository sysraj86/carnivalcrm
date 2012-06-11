<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('PromotionSetting', 'edit', true))$module_menu[]=Array("index.php?module=PromotionSetting&action=EditView&return_module=PromotionSetting&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreatePromotionSetting", 'PromotionSetting');
if(ACLController::checkAccess('PromotionSetting', 'list', true))$module_menu[]=Array("index.php?module=PromotionSetting&action=index&return_module=PromotionSetting&return_action=DetailView", $mod_strings['LNK_LIST'],"PromotionSetting", 'PromotionSetting');
if(ACLController::checkAccess('PromotionSetting', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=PromotionSetting&return_module=PromotionSetting&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'PromotionSetting');
?>
