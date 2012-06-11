<?php
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
