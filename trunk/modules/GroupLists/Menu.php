<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('GroupLists', 'edit', true))$module_menu[]=Array("index.php?module=GroupLists&action=EditView&return_module=GroupLists&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateGroupLists", 'GroupLists');
if(ACLController::checkAccess('GroupLists', 'list', true))$module_menu[]=Array("index.php?module=GroupLists&action=index&return_module=GroupLists&return_action=DetailView", $mod_strings['LNK_LIST'],"GroupLists", 'GroupLists');
if(ACLController::checkAccess('GroupLists', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=GroupLists&return_module=GroupLists&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'GroupLists');
?>
