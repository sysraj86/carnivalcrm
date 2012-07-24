<?php
// created: 2012-07-24 15:40:55
$dictionary["RestaurantBookings"]["fields"]["restaurantsaurantbookings"] = array (
  'name' => 'restaurantsaurantbookings',
  'type' => 'link',
  'relationship' => 'restaurants_restaurantbookings',
  'source' => 'non-db',
  'vname' => 'LBL_RESTAURANTS_RESTAURANTBOOKINGS_FROM_RESTAURANTS_TITLE',
);
$dictionary["RestaurantBookings"]["fields"]["restaurantstbookings_name"] = array (
  'name' => 'restaurantstbookings_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_RESTAURANTS_RESTAURANTBOOKINGS_FROM_RESTAURANTS_TITLE',
  'save' => true,
  'id_name' => 'restaurant437baurants_ida',
  'link' => 'restaurantsaurantbookings',
  'table' => 'restaurants',
  'module' => 'Restaurants',
  'rname' => 'name',
);
$dictionary["RestaurantBookings"]["fields"]["restaurant437baurants_ida"] = array (
  'name' => 'restaurant437baurants_ida',
  'type' => 'link',
  'relationship' => 'restaurants_restaurantbookings',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_RESTAURANTS_RESTAURANTBOOKINGS_FROM_RESTAURANTBOOKINGS_TITLE',
);
