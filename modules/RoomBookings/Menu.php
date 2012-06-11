<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('RoomBookings', 'edit', true))$module_menu[]=Array("index.php?module=RoomBookings&action=EditView&return_module=RoomBookings&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateRoomBookings", 'RoomBookings');
if(ACLController::checkAccess('RoomBookings', 'list', true))$module_menu[]=Array("index.php?module=RoomBookings&action=index&return_module=RoomBookings&return_action=DetailView", $mod_strings['LNK_LIST'],"RoomBookings", 'RoomBookings');
if(ACLController::checkAccess('RoomBookings', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=RoomBookings&return_module=RoomBookings&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'RoomBookings');
?>
