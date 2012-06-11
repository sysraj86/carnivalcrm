<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('Services', 'edit', true))$module_menu[]=Array("index.php?module=Services&action=EditView&return_module=Services&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateServices", 'Services');
if(ACLController::checkAccess('Services', 'list', true))$module_menu[]=Array("index.php?module=Services&action=index&return_module=Services&return_action=DetailView", $mod_strings['LNK_LIST'],"Services", 'Services');
if(ACLController::checkAccess('Services', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=Services&return_module=Services&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'Services');
?>
