<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('GroupPrograms', 'edit', true))$module_menu[]=Array("index.php?module=GroupPrograms&action=EditView&return_module=GroupPrograms&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateGroupPrograms", 'GroupPrograms');
if(ACLController::checkAccess('GroupPrograms', 'list', true))$module_menu[]=Array("index.php?module=GroupPrograms&action=index&return_module=GroupPrograms&return_action=DetailView", $mod_strings['LNK_LIST'],"GroupPrograms", 'GroupPrograms');
//if(ACLController::checkAccess('GroupPrograms', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=GroupPrograms&return_module=GroupPrograms&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'GroupPrograms');
?>
