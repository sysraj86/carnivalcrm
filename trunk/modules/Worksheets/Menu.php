<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('Worksheets', 'edit', true))$module_menu[]=Array("index.php?module=Worksheets&action=EditView&return_module=Worksheets&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateWorksheets", 'Worksheets');
if(ACLController::checkAccess('Worksheets', 'list', true))$module_menu[]=Array("index.php?module=Worksheets&action=index&return_module=Worksheets&return_action=DetailView", $mod_strings['LNK_LIST'],"Worksheets", 'Worksheets');
//if(ACLController::checkAccess('Worksheets', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=Worksheets&return_module=Worksheets&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'Worksheets');
?>
