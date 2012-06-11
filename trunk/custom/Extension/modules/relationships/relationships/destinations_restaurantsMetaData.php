<?php
// created: 2011-10-18 18:13:25
$dictionary["destinations_restaurants"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'destinations_restaurants' => 
    array (
      'lhs_module' => 'Destinations',
      'lhs_table' => 'destinations',
      'lhs_key' => 'id',
      'rhs_module' => 'Restaurants',
      'rhs_table' => 'restaurants',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'destination_restaurants_c',
      'join_key_lhs' => 'destinatio9a61nations_ida',
      'join_key_rhs' => 'destinatio712aaurants_idb',
    ),
  ),
  'table' => 'destination_restaurants_c',
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
      'name' => 'destinatio9a61nations_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'destinatio712aaurants_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'destinations_restaurantsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'destinations_restaurants_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'destinatio9a61nations_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'destinations_restaurants_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'destinatio712aaurants_idb',
      ),
    ),
  ),
);
?>
