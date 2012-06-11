<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('Locations', 'edit', true))$module_menu[]=Array("index.php?module=Locations&action=EditView&return_module=Locations&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateLocations", 'Locations');
if(ACLController::checkAccess('Locations', 'list', true))$module_menu[]=Array("index.php?module=Locations&action=index&return_module=Locations&return_action=DetailView", $mod_strings['LNK_LIST'],"Locations", 'Locations');
if(ACLController::checkAccess('Locations', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=Locations&return_module=Locations&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'Locations');
?>
