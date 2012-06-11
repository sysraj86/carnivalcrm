<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-09-09 10:08:10
$dictionary["TicketOrder"]["fields"]["airlines_ticketorder"] = array (
  'name' => 'airlines_ticketorder',
  'type' => 'link',
  'relationship' => 'airlines_ticketorder',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINES_TICKETORDER_FROM_AIRLINES_TITLE',
);
$dictionary["TicketOrder"]["fields"]["airlines_ticketorder_name"] = array (
  'name' => 'airlines_ticketorder_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINES_TICKETORDER_FROM_AIRLINES_TITLE',
  'save' => true,
  'id_name' => 'airlines_t5154irlines_ida',
  'link' => 'airlines_ticketorder',
  'table' => 'airlines',
  'module' => 'Airlines',
  'rname' => 'name',
);
$dictionary["TicketOrder"]["fields"]["airlines_t5154irlines_ida"] = array (
  'name' => 'airlines_t5154irlines_ida',
  'type' => 'link',
  'relationship' => 'airlines_ticketorder',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AIRLINES_TICKETORDER_FROM_TICKETORDER_TITLE',
);


// created: 2011-09-06 12:14:34
$dictionary["TicketOrder"]["fields"]["ticketexchars_ticketorder"] = array (
  'name' => 'ticketexchars_ticketorder',
  'type' => 'link',
  'relationship' => 'ticketexchangeorders_ticketorder',
  'source' => 'non-db',
  'vname' => 'LBL_TICKETEXCHANGEORDERS_TICKETORDER_FROM_TICKETEXCHANGEORDERS_TITLE',
);
$dictionary["TicketOrder"]["fields"]["ticketexchacketorder_name"] = array (
  'name' => 'ticketexchacketorder_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TICKETEXCHANGEORDERS_TICKETORDER_FROM_TICKETEXCHANGEORDERS_TITLE',
  'save' => true,
  'id_name' => 'ticketexch469deorders_ida',
  'link' => 'ticketexchars_ticketorder',
  'table' => 'TicketExchangeOrders',
  'module' => 'TicketExchangeOrders',
  'rname' => 'name',
);
$dictionary["TicketOrder"]["fields"]["ticketexch469deorders_ida"] = array (
  'name' => 'ticketexch469deorders_ida',
  'type' => 'link',
  'relationship' => 'ticketexchangeorders_ticketorder',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TICKETEXCHANGEORDERS_TICKETORDER_FROM_TICKETORDER_TITLE',
);


// created: 2011-09-09 10:33:00
$dictionary["TicketOrder"]["fields"]["ticketorder_accounts"] = array (
  'name' => 'ticketorder_accounts',
  'type' => 'link',
  'relationship' => 'ticketorder_accounts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_TICKETORDER_ACCOUNTS_FROM_ACCOUNTS_TITLE',
);

?>