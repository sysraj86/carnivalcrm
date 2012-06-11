<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('FoodMenu', 'edit', true))$module_menu[]=Array("index.php?module=FoodMenu&action=EditView&return_module=FoodMenu&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateFoodMenu", 'FoodMenu');
if(ACLController::checkAccess('FoodMenu', 'list', true))$module_menu[]=Array("index.php?module=FoodMenu&action=index&return_module=FoodMenu&return_action=DetailView", $mod_strings['LNK_LIST'],"FoodMenu", 'FoodMenu');
if(ACLController::checkAccess('FoodMenu', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=FoodMenu&return_module=FoodMenu&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'FoodMenu');
?>
