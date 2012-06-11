<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('RoomLists', 'edit', true))$module_menu[]=Array("index.php?module=RoomLists&action=EditView&return_module=RoomLists&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateRoomLists", 'RoomLists');
if(ACLController::checkAccess('RoomLists', 'list', true))$module_menu[]=Array("index.php?module=RoomLists&action=index&return_module=RoomLists&return_action=DetailView", $mod_strings['LNK_LIST'],"RoomLists", 'RoomLists');
if(ACLController::checkAccess('RoomLists', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=RoomLists&return_module=RoomLists&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'RoomLists');
?>
