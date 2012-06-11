<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('Countries', 'edit', true))$module_menu[]=Array("index.php?module=Countries&action=EditView&return_module=Countries&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateCountries", 'Countries');
if(ACLController::checkAccess('Countries', 'list', true))$module_menu[]=Array("index.php?module=Countries&action=index&return_module=Countries&return_action=DetailView", $mod_strings['LNK_LIST'],"Countries", 'Countries');
if(ACLController::checkAccess('Countries', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=Countries&return_module=Countries&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'Countries');
?>
