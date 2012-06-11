<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('Orders', 'edit', true))$module_menu[]=Array("index.php?module=Orders&action=EditView&return_module=Orders&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateOrders", 'Orders');
if(ACLController::checkAccess('Orders', 'list', true))$module_menu[]=Array("index.php?module=Orders&action=index&return_module=Orders&return_action=DetailView", $mod_strings['LNK_LIST'],"Orders", 'Orders');
if(ACLController::checkAccess('Orders', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=Orders&return_module=Orders&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'Orders');
?>
