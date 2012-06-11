<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('Billing', 'edit', true))$module_menu[]=Array("index.php?module=Billing&action=EditView&return_module=Billing&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateBilling", 'Billing');
if(ACLController::checkAccess('Billing', 'list', true))$module_menu[]=Array("index.php?module=Billing&action=index&return_module=Billing&return_action=DetailView", $mod_strings['LNK_LIST'],"Billing", 'Billing');
if(ACLController::checkAccess('Billing', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=Billing&return_module=Billing&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'Billing');
?>
