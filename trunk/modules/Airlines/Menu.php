<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('Airlines', 'edit', true))$module_menu[]=Array("index.php?module=Airlines&action=EditView&return_module=Airlines&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateAirlines", 'Airlines');
if(ACLController::checkAccess('Airlines', 'list', true))$module_menu[]=Array("index.php?module=Airlines&action=index&return_module=Airlines&return_action=DetailView", $mod_strings['LNK_LIST'],"Airlines", 'Airlines');
if(ACLController::checkAccess('Airlines', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=Airlines&return_module=Airlines&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'Airlines');
?>
