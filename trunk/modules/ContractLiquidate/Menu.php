<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('ContractLiquidate', 'edit', true))$module_menu[]=Array("index.php?module=ContractLiquidate&action=EditView&return_module=ContractLiquidate&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateContractLiquidate", 'ContractLiquidate');
if(ACLController::checkAccess('ContractLiquidate', 'list', true))$module_menu[]=Array("index.php?module=ContractLiquidate&action=index&return_module=ContractLiquidate&return_action=DetailView", $mod_strings['LNK_LIST'],"ContractLiquidate", 'ContractLiquidate');
if(ACLController::checkAccess('ContractLiquidate', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=ContractLiquidate&return_module=ContractLiquidate&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'ContractLiquidate');
?>
