<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('Tours', 'edit', true))$module_menu[]=Array("index.php?module=Tours&action=EditView&return_module=Tours&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateTours", 'Tours');
if(ACLController::checkAccess('Tours', 'list', true))$module_menu[]=Array("index.php?module=Tours&action=index&return_module=Tours&return_action=DetailView", $mod_strings['LNK_LIST'],"Tours", 'Tours');
if(ACLController::checkAccess('Tours', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=Tours&return_module=Tours&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'Tours');
?>
