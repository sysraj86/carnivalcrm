<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('TicketExchangeOrders', 'edit', true))$module_menu[]=Array("index.php?module=TicketExchangeOrders&action=EditView&return_module=TicketExchangeOrders&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateTicketExchangeOrders", 'TicketExchangeOrders');
if(ACLController::checkAccess('TicketExchangeOrders', 'list', true))$module_menu[]=Array("index.php?module=TicketExchangeOrders&action=index&return_module=TicketExchangeOrders&return_action=DetailView", $mod_strings['LNK_LIST'],"TicketExchangeOrders", 'TicketExchangeOrders');
if(ACLController::checkAccess('TicketExchangeOrders', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=TicketExchangeOrders&return_module=TicketExchangeOrders&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'TicketExchangeOrders');
?>
