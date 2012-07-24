<?php
// created: 2012-07-24 15:40:54
$dictionary["restaurants_restaurantbookings"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'restaurants_restaurantbookings' => 
    array (
      'lhs_module' => 'Restaurants',
      'lhs_table' => 'restaurants',
      'lhs_key' => 'id',
      'rhs_module' => 'RestaurantBookings',
      'rhs_table' => 'restaurantbookings',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'restaurantsrantbookings_c',
      'join_key_lhs' => 'restaurant437baurants_ida',
      'join_key_rhs' => 'restaurantd663ookings_idb',
    ),
  ),
  'table' => 'restaurantsrantbookings_c',
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
      'name' => 'restaurant437baurants_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'restaurantd663ookings_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'restaurantsaurantbookingsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'restaurantsaurantbookings_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'restaurant437baurants_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'restaurantsaurantbookings_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'restaurantd663ookings_idb',
      ),
    ),
  ),
);
?>
