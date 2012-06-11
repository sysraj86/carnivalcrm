<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('Destinations', 'edit', true))$module_menu[]=Array("index.php?module=Destinations&action=EditView&return_module=Destinations&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateDestinations", 'Destinations');
if(ACLController::checkAccess('Destinations', 'list', true))$module_menu[]=Array("index.php?module=Destinations&action=index&return_module=Destinations&return_action=DetailView", $mod_strings['LNK_LIST'],"Destinations", 'Destinations');
if(ACLController::checkAccess('Destinations', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=Destinations&return_module=Destinations&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'Destinations');
?>
