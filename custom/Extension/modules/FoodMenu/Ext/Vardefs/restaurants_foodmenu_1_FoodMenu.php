<?php
// created: 2011-09-07 20:30:37
$dictionary["FoodMenu"]["fields"]["restaurants_foodmenu_1"] = array (
  'name' => 'restaurants_foodmenu_1',
  'type' => 'link',
  'relationship' => 'restaurants_foodmenu_1',
  'source' => 'non-db',
  'vname' => 'LBL_RESTAURANTS_FOODMENU_1_FROM_RESTAURANTS_TITLE',
);
$dictionary["FoodMenu"]["fields"]["restaurantsoodmenu_1_name"] = array (
  'name' => 'restaurantsoodmenu_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_RESTAURANTS_FOODMENU_1_FROM_RESTAURANTS_TITLE',
  'save' => true,
  'id_name' => 'restaurantf3afaurants_ida',
  'link' => 'restaurants_foodmenu_1',
  'table' => 'restaurants',
  'module' => 'Restaurants',
  'rname' => 'name',
);
$dictionary["FoodMenu"]["fields"]["restaurantf3afaurants_ida"] = array (
  'name' => 'restaurantf3afaurants_ida',
  'type' => 'link',
  'relationship' => 'restaurants_foodmenu_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_RESTAURANTS_FOODMENU_1_FROM_FOODMENU_TITLE',
);
