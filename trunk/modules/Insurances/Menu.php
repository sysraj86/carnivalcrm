<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('Insurances', 'edit', true))$module_menu[]=Array("index.php?module=Insurances&action=EditView&return_module=Insurances&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateInsurances", 'Insurances');
if(ACLController::checkAccess('Insurances', 'list', true))$module_menu[]=Array("index.php?module=Insurances&action=index&return_module=Insurances&return_action=DetailView", $mod_strings['LNK_LIST'],"Insurances", 'Insurances');
if(ACLController::checkAccess('Insurances', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=Insurances&return_module=Insurances&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'Insurances');
?>
