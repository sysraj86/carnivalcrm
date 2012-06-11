<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('ContractAppendixs', 'edit', true))$module_menu[]=Array("index.php?module=ContractAppendixs&action=EditView&return_module=ContractAppendixs&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateContractAppendixs", 'ContractAppendixs');
if(ACLController::checkAccess('ContractAppendixs', 'list', true))$module_menu[]=Array("index.php?module=ContractAppendixs&action=index&return_module=ContractAppendixs&return_action=DetailView", $mod_strings['LNK_LIST'],"ContractAppendixs", 'ContractAppendixs');
if(ACLController::checkAccess('ContractAppendixs', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=ContractAppendixs&return_module=ContractAppendixs&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'ContractAppendixs');
?>
