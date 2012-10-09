<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('Quotes', 'edit', true))$module_menu[]=Array("index.php?module=Quotes&action=EditView&return_module=Quotes&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateQuotes", 'Quotes');
if(ACLController::checkAccess('Quotes', 'list', true))$module_menu[]=Array("index.php?module=Quotes&action=index&return_module=Quotes&return_action=DetailView", $mod_strings['LNK_LIST'],"Quotes", 'Quotes');
//if(ACLController::checkAccess('Quotes', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=Quotes&return_module=Quotes&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'Quotes');
?>
