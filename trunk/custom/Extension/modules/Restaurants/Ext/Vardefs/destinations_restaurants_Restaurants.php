<?php
// created: 2011-10-18 18:13:25
$dictionary["Restaurants"]["fields"]["destinations_restaurants"] = array (
  'name' => 'destinations_restaurants',
  'type' => 'link',
  'relationship' => 'destinations_restaurants',
  'source' => 'non-db',
  'vname' => 'LBL_DESTINATIONS_RESTAURANTS_FROM_DESTINATIONS_TITLE',
);
$dictionary["Restaurants"]["fields"]["destinationstaurants_name"] = array (
  'name' => 'destinationstaurants_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_DESTINATIONS_RESTAURANTS_FROM_DESTINATIONS_TITLE',
  'save' => true,
  'id_name' => 'destinatio9a61nations_ida',
  'link' => 'destinations_restaurants',
  'table' => 'destinations',
  'module' => 'Destinations',
  'rname' => 'name',
);
$dictionary["Restaurants"]["fields"]["destinatio9a61nations_ida"] = array (
  'name' => 'destinatio9a61nations_ida',
  'type' => 'link',
  'relationship' => 'destinations_restaurants',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_DESTINATIONS_RESTAURANTS_FROM_RESTAURANTS_TITLE',
);
