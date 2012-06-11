<?php
// created: 2011-10-18 18:10:42
$dictionary["Hotels"]["fields"]["destinations_hotels"] = array (
  'name' => 'destinations_hotels',
  'type' => 'link',
  'relationship' => 'destinations_hotels',
  'source' => 'non-db',
  'vname' => 'LBL_DESTINATIONS_HOTELS_FROM_DESTINATIONS_TITLE',
);
$dictionary["Hotels"]["fields"]["destinations_hotels_name"] = array (
  'name' => 'destinations_hotels_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_DESTINATIONS_HOTELS_FROM_DESTINATIONS_TITLE',
  'save' => true,
  'id_name' => 'destinatio6fe0nations_ida',
  'link' => 'destinations_hotels',
  'table' => 'destinations',
  'module' => 'Destinations',
  'rname' => 'name',
);
$dictionary["Hotels"]["fields"]["destinatio6fe0nations_ida"] = array (
  'name' => 'destinatio6fe0nations_ida',
  'type' => 'link',
  'relationship' => 'destinations_hotels',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_DESTINATIONS_HOTELS_FROM_HOTELS_TITLE',
);
