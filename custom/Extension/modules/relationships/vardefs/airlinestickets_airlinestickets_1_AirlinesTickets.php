<?php
// created: 2011-09-01 14:52:59
$dictionary["AirlinesTickets"]["fields"]["airlinesticlinestickets_1"] = array (
  'name' => 'airlinesticlinestickets_1',
  'type' => 'link',
  'relationship' => 'airlinestickets_airlinestickets_1',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINESTICKETS_AIRLINESTICKETS_1_FROM_AIRLINESTICKETS_L_TITLE',
);
$dictionary["AirlinesTickets"]["fields"]["airlinestictickets_1_name"] = array (
  'name' => 'airlinestictickets_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINESTICKETS_AIRLINESTICKETS_1_FROM_AIRLINESTICKETS_L_TITLE',
  'save' => true,
  'id_name' => 'airlinesti765dtickets_ida',
  'link' => 'airlinesticlinestickets_1',
  'table' => 'airlines_tickets',
  'module' => 'AirlinesTickets',
  'rname' => 'name',
);
$dictionary["AirlinesTickets"]["fields"]["airlinesti765dtickets_ida"] = array (
  'name' => 'airlinesti765dtickets_ida',
  'type' => 'link',
  'relationship' => 'airlinestickets_airlinestickets_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AIRLINESTICKETS_AIRLINESTICKETS_1_FROM_AIRLINESTICKETS_R_TITLE',
);
