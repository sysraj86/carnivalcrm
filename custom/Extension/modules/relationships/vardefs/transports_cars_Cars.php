<?php
// created: 2011-11-09 10:14:26
$dictionary["Car"]["fields"]["transports_cars"] = array (
  'name' => 'transports_cars',
  'type' => 'link',
  'relationship' => 'transports_cars',
  'source' => 'non-db',
  'vname' => 'LBL_TRANSPORTS_CARS_FROM_TRANSPORTS_TITLE',
);
$dictionary["Car"]["fields"]["transports_cars_name"] = array (
  'name' => 'transports_cars_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TRANSPORTS_CARS_FROM_TRANSPORTS_TITLE',
  'save' => true,
  'id_name' => 'transportsedf7nsports_ida',
  'link' => 'transports_cars',
  'table' => 'transports',
  'module' => 'Transports',
  'rname' => 'name',
);
$dictionary["Car"]["fields"]["transportsedf7nsports_ida"] = array (
  'name' => 'transportsedf7nsports_ida',
  'type' => 'link',
  'relationship' => 'transports_cars',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TRANSPORTS_CARS_FROM_CARS_TITLE',
);
