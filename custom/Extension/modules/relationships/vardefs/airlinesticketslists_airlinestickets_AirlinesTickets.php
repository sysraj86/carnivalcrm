<?php
// created: 2012-02-20 17:18:12
$dictionary["AirlinesTickets"]["fields"]["airlinesticirlinestickets"] = array (
  'name' => 'airlinesticirlinestickets',
  'type' => 'link',
  'relationship' => 'airlinesticketslists_airlinestickets',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINESTICKETSLISTS_AIRLINESTICKETS_FROM_AIRLINESTICKETSLISTS_TITLE',
);
$dictionary["AirlinesTickets"]["fields"]["airlinesticestickets_name"] = array (
  'name' => 'airlinesticestickets_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINESTICKETSLISTS_AIRLINESTICKETS_FROM_AIRLINESTICKETSLISTS_TITLE',
  'save' => true,
  'id_name' => 'airlinesti7e28tslists_ida',
  'link' => 'airlinesticirlinestickets',
  'table' => 'AirlinesTicketsLists',
  'module' => 'AirlinesTicketsLists',
  'rname' => 'name',
);
$dictionary["AirlinesTickets"]["fields"]["airlinesti7e28tslists_ida"] = array (
  'name' => 'airlinesti7e28tslists_ida',
  'type' => 'link',
  'relationship' => 'airlinesticketslists_airlinestickets',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AIRLINESTICKETSLISTS_AIRLINESTICKETS_FROM_AIRLINESTICKETS_TITLE',
);
