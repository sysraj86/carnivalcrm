<?php
// created: 2012-07-24 15:29:14
$dictionary["groupprograms_restaurantbookings"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'groupprograms_restaurantbookings' => 
    array (
      'lhs_module' => 'GroupPrograms',
      'lhs_table' => 'groupprograms',
      'lhs_key' => 'id',
      'rhs_module' => 'RestaurantBookings',
      'rhs_table' => 'restaurantbookings',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'groupprograrantbookings_c',
      'join_key_lhs' => 'groupprogr880erograms_ida',
      'join_key_rhs' => 'groupprogre72bookings_idb',
    ),
  ),
  'table' => 'groupprograrantbookings_c',
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
      'name' => 'groupprogr880erograms_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'groupprogre72bookings_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'groupprograaurantbookingsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'groupprograaurantbookings_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'groupprogr880erograms_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'groupprograaurantbookings_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'groupprogre72bookings_idb',
      ),
    ),
  ),
);
?>
