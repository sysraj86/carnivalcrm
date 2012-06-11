<?php
// created: 2011-08-24 10:11:51
$dictionary["ServiceBookings"]["fields"]["restaurantservicebookings"] = array (
  'name' => 'restaurantservicebookings',
  'type' => 'link',
  'relationship' => 'restaurants_servicebookings',
  'source' => 'non-db',
  'vname' => 'LBL_RESTAURANTS_SERVICEBOOKINGS_FROM_RESTAURANTS_TITLE',
);
$dictionary["ServiceBookings"]["fields"]["restaurantsebookings_name"] = array (
  'name' => 'restaurantsebookings_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_RESTAURANTS_SERVICEBOOKINGS_FROM_RESTAURANTS_TITLE',
  'save' => true,
  'id_name' => 'restaurant96e9aurants_ida',
  'link' => 'restaurantservicebookings',
  'table' => 'restaurants',
  'module' => 'Restaurants',
  'rname' => 'name',
);
$dictionary["ServiceBookings"]["fields"]["restaurant96e9aurants_ida"] = array (
  'name' => 'restaurant96e9aurants_ida',
  'type' => 'link',
  'relationship' => 'restaurants_servicebookings',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_RESTAURANTS_SERVICEBOOKINGS_FROM_SERVICEBOOKINGS_TITLE',
);
