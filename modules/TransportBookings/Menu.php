<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('TransportBookings', 'edit', true))$module_menu[]=Array("index.php?module=TransportBookings&action=EditView&return_module=TransportBookings&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateTransportBookings", 'TransportBookings');
if(ACLController::checkAccess('TransportBookings', 'list', true))$module_menu[]=Array("index.php?module=TransportBookings&action=index&return_module=TransportBookings&return_action=DetailView", $mod_strings['LNK_LIST'],"TransportBookings", 'TransportBookings');
if(ACLController::checkAccess('TransportBookings', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=TransportBookings&return_module=TransportBookings&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'TransportBookings');
?>
