<?php
// created: 2011-09-01 14:51:34
$dictionary["AirlinesTickets"]["fields"]["airlinesticirlinestickets"] = array (
  'name' => 'airlinesticirlinestickets',
  'type' => 'link',
  'relationship' => 'airlinestickets_airlinestickets',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINESTICKETS_AIRLINESTICKETS_FROM_AIRLINESTICKETS_L_TITLE',
);
$dictionary["AirlinesTickets"]["fields"]["airlinesticestickets_name"] = array (
  'name' => 'airlinesticestickets_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINESTICKETS_AIRLINESTICKETS_FROM_AIRLINESTICKETS_L_TITLE',
  'save' => true,
  'id_name' => 'airlinesti1265tickets_ida',
  'link' => 'airlinesticirlinestickets',
  'table' => 'airlines_tickets',
  'module' => 'AirlinesTickets',
  'rname' => 'name',
);
$dictionary["AirlinesTickets"]["fields"]["airlinesti1265tickets_ida"] = array (
  'name' => 'airlinesti1265tickets_ida',
  'type' => 'link',
  'relationship' => 'airlinestickets_airlinestickets',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AIRLINESTICKETS_AIRLINESTICKETS_FROM_AIRLINESTICKETS_R_TITLE',
);
