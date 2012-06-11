<?php 
 //WARNING: The contents of this file are auto-generated


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


// created: 2011-09-07 20:29:53
$dictionary["FoodMenu"]["fields"]["restaurants_foodmenu"] = array (
  'name' => 'restaurants_foodmenu',
  'type' => 'link',
  'relationship' => 'restaurants_foodmenu',
  'source' => 'non-db',
  'vname' => 'LBL_RESTAURANTS_FOODMENU_FROM_RESTAURANTS_TITLE',
);
$dictionary["FoodMenu"]["fields"]["restaurants_foodmenu_name"] = array (
  'name' => 'restaurants_foodmenu_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_RESTAURANTS_FOODMENU_FROM_RESTAURANTS_TITLE',
  'save' => true,
  'id_name' => 'restaurant3385aurants_ida',
  'link' => 'restaurants_foodmenu',
  'table' => 'restaurants',
  'module' => 'Restaurants',
  'rname' => 'name',
);
$dictionary["FoodMenu"]["fields"]["restaurant3385aurants_ida"] = array (
  'name' => 'restaurant3385aurants_ida',
  'type' => 'link',
  'relationship' => 'restaurants_foodmenu',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_RESTAURANTS_FOODMENU_FROM_FOODMENU_TITLE',
);

?>