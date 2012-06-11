<?php
// created: 2011-12-21 08:46:59
$dictionary["tours_restaurants"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'tours_restaurants' => 
    array (
      'lhs_module' => 'Tours',
      'lhs_table' => 'tours',
      'lhs_key' => 'id',
      'rhs_module' => 'Restaurants',
      'rhs_table' => 'restaurants',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'tours_restaurants_c',
      'join_key_lhs' => 'tours_rest8203tstours_ida',
      'join_key_rhs' => 'tours_rest15fcaurants_idb',
    ),
  ),
  'table' => 'tours_restaurants_c',
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
      'name' => 'tours_rest8203tstours_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'tours_rest15fcaurants_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'tours_restaurantsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'tours_restaurants_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'tours_rest8203tstours_ida',
        1 => 'tours_rest15fcaurants_idb',
      ),
    ),
  ),
);
?>
