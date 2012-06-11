<?php
// created: 2011-10-01 10:06:20
$dictionary["Account"]["fields"]["airlinestickets_accounts"] = array (
  'name' => 'airlinestickets_accounts',
  'type' => 'link',
  'relationship' => 'airlinestickets_accounts',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINESTICKETS_ACCOUNTS_FROM_AIRLINESTICKETS_TITLE',
);
$dictionary["Account"]["fields"]["airlinestic_accounts_name"] = array (
  'name' => 'airlinestic_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINESTICKETS_ACCOUNTS_FROM_AIRLINESTICKETS_TITLE',
  'save' => true,
  'id_name' => 'airlinestiec2atickets_ida',
  'link' => 'airlinestickets_accounts',
  'table' => 'AirlinesTickets',
  'module' => 'AirlinesTickets',
  'rname' => 'name',
);
$dictionary["Account"]["fields"]["airlinestiec2atickets_ida"] = array (
  'name' => 'airlinestiec2atickets_ida',
  'type' => 'link',
  'relationship' => 'airlinestickets_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AIRLINESTICKETS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
);
