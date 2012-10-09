<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('Contracts', 'edit', true))$module_menu[]=Array("index.php?module=Contracts&action=EditView&return_module=Contracts&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateContracts", 'Contracts');
if(ACLController::checkAccess('Contracts', 'list', true))$module_menu[]=Array("index.php?module=Contracts&action=index&return_module=Contracts&return_action=DetailView", $mod_strings['LNK_LIST'],"Contracts", 'Contracts');
//if(ACLController::checkAccess('Contracts', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=Contracts&return_module=Contracts&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'Contracts');
?>
