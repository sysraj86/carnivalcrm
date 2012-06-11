<?php
// created: 2011-12-20 09:20:57
$dictionary["AirlinesTickets"]["fields"]["tours_airlinestickets"] = array (
  'name' => 'tours_airlinestickets',
  'type' => 'link',
  'relationship' => 'tours_airlinestickets',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_AIRLINESTICKETS_FROM_TOURS_TITLE',
);
$dictionary["AirlinesTickets"]["fields"]["tours_airliestickets_name"] = array (
  'name' => 'tours_airliestickets_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_AIRLINESTICKETS_FROM_TOURS_TITLE',
  'save' => true,
  'id_name' => 'tours_airl9600tstours_ida',
  'link' => 'tours_airlinestickets',
  'table' => 'tours',
  'module' => 'Tours',
  'rname' => 'name',
);
$dictionary["AirlinesTickets"]["fields"]["tours_airl9600tstours_ida"] = array (
  'name' => 'tours_airl9600tstours_ida',
  'type' => 'link',
  'relationship' => 'tours_airlinestickets',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TOURS_AIRLINESTICKETS_FROM_AIRLINESTICKETS_TITLE',
);
