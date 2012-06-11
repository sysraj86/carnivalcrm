<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('GuideContracts', 'edit', true))$module_menu[]=Array("index.php?module=GuideContracts&action=EditView&return_module=GuideContracts&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateGuideContracts", 'GuideContracts');
if(ACLController::checkAccess('GuideContracts', 'list', true))$module_menu[]=Array("index.php?module=GuideContracts&action=index&return_module=GuideContracts&return_action=DetailView", $mod_strings['LNK_LIST'],"GuideContracts", 'GuideContracts');
if(ACLController::checkAccess('GuideContracts', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=GuideContracts&return_module=GuideContracts&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'GuideContracts');
?>
