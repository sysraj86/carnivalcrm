<?php
// created: 2011-09-06 14:37:07
$dictionary["AirlinesTickets"]["fields"]["airlines_ailinestickets_1"] = array (
  'name' => 'airlines_ailinestickets_1',
  'type' => 'link',
  'relationship' => 'airlines_airlinestickets_1',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINES_AIRLINESTICKETS_1_FROM_AIRLINES_TITLE',
);
$dictionary["AirlinesTickets"]["fields"]["airlines_aitickets_1_name"] = array (
  'name' => 'airlines_aitickets_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINES_AIRLINESTICKETS_1_FROM_AIRLINES_TITLE',
  'save' => true,
  'id_name' => 'airlines_a60edirlines_ida',
  'link' => 'airlines_ailinestickets_1',
  'table' => 'airlines',
  'module' => 'Airlines',
  'rname' => 'name',
);
$dictionary["AirlinesTickets"]["fields"]["airlines_a60edirlines_ida"] = array (
  'name' => 'airlines_a60edirlines_ida',
  'type' => 'link',
  'relationship' => 'airlines_airlinestickets_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AIRLINES_AIRLINESTICKETS_1_FROM_AIRLINESTICKETS_TITLE',
);
