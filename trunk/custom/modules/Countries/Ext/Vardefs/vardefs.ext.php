<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2012-08-22 10:31:18
$dictionary["Country"]["fields"]["countries_c_areas"] = array (
  'name' => 'countries_c_areas',
  'type' => 'link',
  'relationship' => 'countries_c_areas',
  'source' => 'non-db',
  'vname' => 'LBL_COUNTRIES_C_AREAS_FROM_C_AREAS_TITLE',
);

// created: 2011-08-19 16:16:42
$dictionary["Country"]["fields"]["countries_destinations"] = array (
  'name' => 'countries_destinations',
  'type' => 'link',
  'relationship' => 'countries_destinations',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_COUNTRIES_DESTINATIONS_FROM_DESTINATIONS_TITLE',
);


// created: 2011-10-18 18:15:44
$dictionary["Country"]["fields"]["countries_hotels"] = array (
  'name' => 'countries_hotels',
  'type' => 'link',
  'relationship' => 'countries_hotels',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_COUNTRIES_HOTELS_FROM_HOTELS_TITLE',
);


// created: 2011-10-18 18:17:09
$dictionary["Country"]["fields"]["countries_restaurants"] = array (
  'name' => 'countries_restaurants',
  'type' => 'link',
  'relationship' => 'countries_restaurants',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_COUNTRIES_RESTAURANTS_FROM_RESTAURANTS_TITLE',
);


// created: 2012-02-18 11:07:24
$dictionary["Country"]["fields"]["countries_services"] = array (
  'name' => 'countries_services',
  'type' => 'link',
  'relationship' => 'countries_services',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_COUNTRIES_SERVICES_FROM_SERVICES_TITLE',
);


// created: 2011-10-26 10:56:10
$dictionary["Country"]["fields"]["countries_transports"] = array (
  'name' => 'countries_transports',
  'type' => 'link',
  'relationship' => 'countries_transports',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_COUNTRIES_TRANSPORTS_FROM_TRANSPORTS_TITLE',
);


// created: 2011-10-26 10:56:10
$dictionary['Country']['indices'][] = array(
    'name' =>'idx_countries_name', 
    'type' =>'index', 
    'fields'=>array('name')
);

$dictionary["Country"]["fields"]["department"] = array (
    'name' => 'department',
    'type' => 'enum',
    'options' => 'deparment_dom',
    'vname' => 'LBL_DEPARTMENT',
);

?>