<?php
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
