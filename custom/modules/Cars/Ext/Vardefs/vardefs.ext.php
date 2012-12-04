<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2012-03-14 11:19:18
$dictionary['Car']['fields']['area']['default']='mienbac';
$dictionary['Car']['fields']['area']['massupdate']='1';

 

// created: 2011-12-21 08:48:30
$dictionary["Car"]["fields"]["tours_cars"] = array (
  'name' => 'tours_cars',
  'type' => 'link',
  'relationship' => 'tours_cars',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_CARS_FROM_TOURS_TITLE',
);


// created: 2012-11-16 17:43:14
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

?>