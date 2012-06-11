<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('CarBookings', 'edit', true))$module_menu[]=Array("index.php?module=CarBookings&action=EditView&return_module=CarBookings&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateCarBookings", 'CarBookings');
if(ACLController::checkAccess('CarBookings', 'list', true))$module_menu[]=Array("index.php?module=CarBookings&action=index&return_module=CarBookings&return_action=DetailView", $mod_strings['LNK_LIST'],"CarBookings", 'CarBookings');
if(ACLController::checkAccess('CarBookings', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=CarBookings&return_module=CarBookings&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'CarBookings');
?>
