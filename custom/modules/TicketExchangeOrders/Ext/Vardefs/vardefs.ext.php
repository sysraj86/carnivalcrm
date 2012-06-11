<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-09-06 12:32:50
$dictionary["TicketExchangeOrders"]["fields"]["airlines_tiexchangeorders"] = array (
  'name' => 'airlines_tiexchangeorders',
  'type' => 'link',
  'relationship' => 'airlines_ticketexchangeorders',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINES_TICKETEXCHANGEORDERS_FROM_AIRLINES_TITLE',
);
$dictionary["TicketExchangeOrders"]["fields"]["airlines_tingeorders_name"] = array (
  'name' => 'airlines_tingeorders_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINES_TICKETEXCHANGEORDERS_FROM_AIRLINES_TITLE',
  'save' => true,
  'id_name' => 'airlines_t04e7irlines_ida',
  'link' => 'airlines_tiexchangeorders',
  'table' => 'airlines',
  'module' => 'Airlines',
  'rname' => 'name',
);
$dictionary["TicketExchangeOrders"]["fields"]["airlines_t04e7irlines_ida"] = array (
  'name' => 'airlines_t04e7irlines_ida',
  'type' => 'link',
  'relationship' => 'airlines_ticketexchangeorders',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AIRLINES_TICKETEXCHANGEORDERS_FROM_TICKETEXCHANGEORDERS_TITLE',
);


// created: 2011-09-06 12:14:34
$dictionary["TicketExchangeOrders"]["fields"]["ticketexchars_ticketorder"] = array (
  'name' => 'ticketexchars_ticketorder',
  'type' => 'link',
  'relationship' => 'ticketexchangeorders_ticketorder',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_TICKETEXCHANGEORDERS_TICKETORDER_FROM_TICKETORDER_TITLE',
);

?>