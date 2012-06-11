<?php
// created: 2011-09-01 14:59:03
$dictionary["AirlinesTickets"]["fields"]["airlinesticlinestickets_2"] = array (
  'name' => 'airlinesticlinestickets_2',
  'type' => 'link',
  'relationship' => 'airlinestickets_airlinestickets_2',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINESTICKETS_AIRLINESTICKETS_2_FROM_AIRLINESTICKETS_L_TITLE',
);
$dictionary["AirlinesTickets"]["fields"]["airlinestictickets_2_name"] = array (
  'name' => 'airlinestictickets_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINESTICKETS_AIRLINESTICKETS_2_FROM_AIRLINESTICKETS_L_TITLE',
  'save' => true,
  'id_name' => 'airlinestib3f4tickets_ida',
  'link' => 'airlinesticlinestickets_2',
  'table' => 'airlines_tickets',
  'module' => 'AirlinesTickets',
  'rname' => 'name',
);
$dictionary["AirlinesTickets"]["fields"]["airlinestib3f4tickets_ida"] = array (
  'name' => 'airlinestib3f4tickets_ida',
  'type' => 'link',
  'relationship' => 'airlinestickets_airlinestickets_2',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AIRLINESTICKETS_AIRLINESTICKETS_2_FROM_AIRLINESTICKETS_R_TITLE',
);
