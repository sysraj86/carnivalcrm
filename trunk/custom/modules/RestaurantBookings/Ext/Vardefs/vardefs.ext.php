<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2012-07-24 15:29:15
$dictionary["RestaurantBookings"]["fields"]["groupprograaurantbookings"] = array (
  'name' => 'groupprograaurantbookings',
  'type' => 'link',
  'relationship' => 'groupprograms_restaurantbookings',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_RESTAURANTBOOKINGS_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["RestaurantBookings"]["fields"]["groupprogratbookings_name"] = array (
  'name' => 'groupprogratbookings_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_RESTAURANTBOOKINGS_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr880erograms_ida',
  'link' => 'groupprograaurantbookings',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'rname' => 'name',
  'required' => true,
);
$dictionary["RestaurantBookings"]["fields"]["groupprogr880erograms_ida"] = array (
  'name' => 'groupprogr880erograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_restaurantbookings',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_RESTAURANTBOOKINGS_FROM_RESTAURANTBOOKINGS_TITLE',
);


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
  'required' => true,
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

?>