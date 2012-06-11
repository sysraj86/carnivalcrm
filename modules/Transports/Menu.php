<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('Transports', 'edit', true))$module_menu[]=Array("index.php?module=Transports&action=EditView&return_module=Transports&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateTransports", 'Transports');
if(ACLController::checkAccess('Transports', 'list', true))$module_menu[]=Array("index.php?module=Transports&action=index&return_module=Transports&return_action=DetailView", $mod_strings['LNK_LIST'],"Transports", 'Transports');
if(ACLController::checkAccess('Transports', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=Transports&return_module=Transports&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'Transports');
?>
