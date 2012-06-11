<?php
// created: 2011-10-18 18:17:09
$dictionary["Restaurants"]["fields"]["countries_restaurants"] = array (
  'name' => 'countries_restaurants',
  'type' => 'link',
  'relationship' => 'countries_restaurants',
  'source' => 'non-db',
  'vname' => 'LBL_COUNTRIES_RESTAURANTS_FROM_COUNTRIES_TITLE',
);
$dictionary["Restaurants"]["fields"]["countries_rstaurants_name"] = array (
  'name' => 'countries_rstaurants_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_COUNTRIES_RESTAURANTS_FROM_COUNTRIES_TITLE',
  'save' => true,
  'id_name' => 'countries_8307untries_ida',
  'link' => 'countries_restaurants',
  'table' => 'countries',
  'module' => 'Countries',
  'rname' => 'name',
);
$dictionary["Restaurants"]["fields"]["countries_8307untries_ida"] = array (
  'name' => 'countries_8307untries_ida',
  'type' => 'link',
  'relationship' => 'countries_restaurants',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_COUNTRIES_RESTAURANTS_FROM_RESTAURANTS_TITLE',
);
