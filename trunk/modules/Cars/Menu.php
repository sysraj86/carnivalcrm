<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('Cars', 'edit', true))$module_menu[]=Array("index.php?module=Cars&action=EditView&return_module=Cars&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateCars", 'Cars');
if(ACLController::checkAccess('Cars', 'list', true))$module_menu[]=Array("index.php?module=Cars&action=index&return_module=Cars&return_action=DetailView", $mod_strings['LNK_LIST'],"Cars", 'Cars');
if(ACLController::checkAccess('Cars', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=Cars&return_module=Cars&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'Cars');
?>
