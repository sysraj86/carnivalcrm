<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('AppendixContract', 'edit', true))$module_menu[]=Array("index.php?module=AppendixContract&action=EditView&return_module=AppendixContract&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateAppendixContract", 'AppendixContract');
if(ACLController::checkAccess('AppendixContract', 'list', true))$module_menu[]=Array("index.php?module=AppendixContract&action=index&return_module=AppendixContract&return_action=DetailView", $mod_strings['LNK_LIST'],"AppendixContract", 'AppendixContract');
if(ACLController::checkAccess('AppendixContract', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=AppendixContract&return_module=AppendixContract&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'AppendixContract');
?>
