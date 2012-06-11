<?php
// created: 2011-09-06 15:05:38
$dictionary["AirlinesTickets"]["fields"]["airlines_airlinestickets"] = array (
  'name' => 'airlines_airlinestickets',
  'type' => 'link',
  'relationship' => 'airlines_airlinestickets',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINES_AIRLINESTICKETS_FROM_AIRLINES_TITLE',
);
$dictionary["AirlinesTickets"]["fields"]["airlines_aiestickets_name"] = array (
  'name' => 'airlines_aiestickets_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINES_AIRLINESTICKETS_FROM_AIRLINES_TITLE',
  'save' => true,
  'id_name' => 'airlines_a476cirlines_ida',
  'link' => 'airlines_airlinestickets',
  'table' => 'airlines',
  'module' => 'Airlines',
  'rname' => 'name',
);
$dictionary["AirlinesTickets"]["fields"]["airlines_a476cirlines_ida"] = array (
  'name' => 'airlines_a476cirlines_ida',
  'type' => 'link',
  'relationship' => 'airlines_airlinestickets',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AIRLINES_AIRLINESTICKETS_FROM_AIRLINESTICKETS_TITLE',
);
