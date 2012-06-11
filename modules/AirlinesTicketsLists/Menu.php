<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('AirlinesTicketsLists', 'edit', true))$module_menu[]=Array("index.php?module=AirlinesTicketsLists&action=EditView&return_module=AirlinesTicketsLists&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateAirlinesTicketsLists", 'AirlinesTicketsLists');
if(ACLController::checkAccess('AirlinesTicketsLists', 'list', true))$module_menu[]=Array("index.php?module=AirlinesTicketsLists&action=index&return_module=AirlinesTicketsLists&return_action=DetailView", $mod_strings['LNK_LIST'],"AirlinesTicketsLists", 'AirlinesTicketsLists');
if(ACLController::checkAccess('AirlinesTicketsLists', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=AirlinesTicketsLists&return_module=AirlinesTicketsLists&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'AirlinesTicketsLists');
?>
