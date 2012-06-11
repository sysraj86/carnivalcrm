<?php
// created: 2011-10-18 18:17:09
$dictionary["countries_restaurants"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'countries_restaurants' => 
    array (
      'lhs_module' => 'Countries',
      'lhs_table' => 'countries',
      'lhs_key' => 'id',
      'rhs_module' => 'Restaurants',
      'rhs_table' => 'restaurants',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'countries_restaurants_c',
      'join_key_lhs' => 'countries_8307untries_ida',
      'join_key_rhs' => 'countries_024aaurants_idb',
    ),
  ),
  'table' => 'countries_restaurants_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'countries_8307untries_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'countries_024aaurants_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'countries_restaurantsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'countries_restaurants_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'countries_8307untries_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'countries_restaurants_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'countries_024aaurants_idb',
      ),
    ),
  ),
);
?>
