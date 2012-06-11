<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('RestaurantBookings', 'edit', true))$module_menu[]=Array("index.php?module=RestaurantBookings&action=EditView&return_module=RestaurantBookings&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateRestaurantBookings", 'RestaurantBookings');
if(ACLController::checkAccess('RestaurantBookings', 'list', true))$module_menu[]=Array("index.php?module=RestaurantBookings&action=index&return_module=RestaurantBookings&return_action=DetailView", $mod_strings['LNK_LIST'],"RestaurantBookings", 'RestaurantBookings');
if(ACLController::checkAccess('RestaurantBookings', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=RestaurantBookings&return_module=RestaurantBookings&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'RestaurantBookings');
?>
