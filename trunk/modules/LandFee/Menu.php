<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('LandFee', 'edit', true))$module_menu[]=Array("index.php?module=LandFee&action=EditView&return_module=LandFee&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateLandFee", 'LandFee');
if(ACLController::checkAccess('LandFee', 'list', true))$module_menu[]=Array("index.php?module=LandFee&action=index&return_module=LandFee&return_action=DetailView", $mod_strings['LNK_LIST'],"LandFee", 'LandFee');
if(ACLController::checkAccess('LandFee', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=LandFee&return_module=LandFee&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'LandFee');
?>
