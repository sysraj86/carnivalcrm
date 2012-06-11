<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('TicketOrder', 'edit', true))$module_menu[]=Array("index.php?module=TicketOrder&action=EditView&return_module=TicketOrder&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateTicketOrder", 'TicketOrder');
if(ACLController::checkAccess('TicketOrder', 'list', true))$module_menu[]=Array("index.php?module=TicketOrder&action=index&return_module=TicketOrder&return_action=DetailView", $mod_strings['LNK_LIST'],"TicketOrder", 'TicketOrder');
if(ACLController::checkAccess('TicketOrder', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=TicketOrder&return_module=TicketOrder&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'TicketOrder');
?>
