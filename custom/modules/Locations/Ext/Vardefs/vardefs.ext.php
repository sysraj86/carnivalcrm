<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-08-19 16:15:29
$dictionary["Location"]["fields"]["destinations_locations"] = array (
  'name' => 'destinations_locations',
  'type' => 'link',
  'relationship' => 'destinations_locations',
  'source' => 'non-db',
  'vname' => 'LBL_DESTINATIONS_LOCATIONS_FROM_DESTINATIONS_TITLE',
);
$dictionary["Location"]["fields"]["destinationlocations_name"] = array (
  'name' => 'destinationlocations_name',
    'required'=>true,
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_DESTINATIONS_LOCATIONS_FROM_DESTINATIONS_TITLE',
  'save' => true,
  'id_name' => 'destinatio010enations_ida',
  'link' => 'destinations_locations',
  'table' => 'destinations',
  'module' => 'Destinations',
  'rname' => 'name',
);
$dictionary["Location"]["fields"]["destinatio010enations_ida"] = array (
  'name' => 'destinatio010enations_ida',
  'type' => 'link',
  'relationship' => 'destinations_locations',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_DESTINATIONS_LOCATIONS_FROM_LOCATIONS_TITLE',
);


// created: 2011-12-12 15:42:52
$dictionary["Location"]["fields"]["tours_locations"] = array (
  'name' => 'tours_locations',
  'type' => 'link',
  'relationship' => 'tours_locations',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_LOCATIONS_FROM_TOURS_TITLE',
);

?>