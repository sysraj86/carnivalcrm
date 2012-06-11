<?php
// created: 2011-08-24 10:11:50
$dictionary["restaurants_servicebookings"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'restaurants_servicebookings' => 
    array (
      'lhs_module' => 'Restaurants',
      'lhs_table' => 'restaurants',
      'lhs_key' => 'id',
      'rhs_module' => 'ServiceBookings',
      'rhs_table' => 'servicebookings',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'restaurantsvicebookings_c',
      'join_key_lhs' => 'restaurant96e9aurants_ida',
      'join_key_rhs' => 'restaurant71f9ookings_idb',
    ),
  ),
  'table' => 'restaurantsvicebookings_c',
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
      'name' => 'restaurant96e9aurants_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'restaurant71f9ookings_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'restaurantservicebookingsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'restaurantservicebookings_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'restaurant96e9aurants_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'restaurantservicebookings_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'restaurant71f9ookings_idb',
      ),
    ),
  ),
);
?>
