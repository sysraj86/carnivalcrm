<?php
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
