<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('ServiceBookings', 'edit', true))$module_menu[]=Array("index.php?module=ServiceBookings&action=EditView&return_module=ServiceBookings&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateServiceBookings", 'ServiceBookings');
if(ACLController::checkAccess('ServiceBookings', 'list', true))$module_menu[]=Array("index.php?module=ServiceBookings&action=index&return_module=ServiceBookings&return_action=DetailView", $mod_strings['LNK_LIST'],"ServiceBookings", 'ServiceBookings');
//if(ACLController::checkAccess('ServiceBookings', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=ServiceBookings&return_module=ServiceBookings&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'ServiceBookings');
?>
