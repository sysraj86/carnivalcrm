<?php
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
