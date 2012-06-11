<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('AirlinesTickets', 'edit', true))$module_menu[]=Array("index.php?module=AirlinesTickets&action=EditView&return_module=AirlinesTickets&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateAirlinesTickets", 'AirlinesTickets');
if(ACLController::checkAccess('AirlinesTickets', 'list', true))$module_menu[]=Array("index.php?module=AirlinesTickets&action=index&return_module=AirlinesTickets&return_action=DetailView", $mod_strings['LNK_LIST'],"AirlinesTickets", 'AirlinesTickets');
if(ACLController::checkAccess('AirlinesTickets', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=AirlinesTickets&return_module=AirlinesTickets&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'AirlinesTickets');
?> 
 