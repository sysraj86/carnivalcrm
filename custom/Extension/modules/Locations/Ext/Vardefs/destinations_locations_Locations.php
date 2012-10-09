<?php
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
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_DESTINATIONS_LOCATIONS_FROM_DESTINATIONS_TITLE',
  'save' => true,
  'id_name' => 'destinatio010enations_ida',
  'link' => 'destinations_locations',
  'table' => 'destinations',
  'module' => 'Destinations',
  'rname' => 'name',
  'required' => true,
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
