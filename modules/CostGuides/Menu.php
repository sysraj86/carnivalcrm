<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('CostGuides', 'edit', true))$module_menu[]=Array("index.php?module=CostGuides&action=EditView&return_module=CostGuides&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateCostGuides", 'CostGuides');
if(ACLController::checkAccess('CostGuides', 'list', true))$module_menu[]=Array("index.php?module=CostGuides&action=index&return_module=CostGuides&return_action=DetailView", $mod_strings['LNK_LIST'],"CostGuides", 'CostGuides');
if(ACLController::checkAccess('CostGuides', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=CostGuides&return_module=Tours&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'CostGuides');
?>
