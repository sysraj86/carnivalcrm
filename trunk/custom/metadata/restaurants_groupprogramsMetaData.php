<?php
// created: 2011-10-18 18:00:33
$dictionary["restaurants_groupprograms"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'restaurants_groupprograms' => 
    array (
      'lhs_module' => 'Restaurants',
      'lhs_table' => 'restaurants',
      'lhs_key' => 'id',
      'rhs_module' => 'GroupPrograms',
      'rhs_table' => 'groupprograms',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'restaurantsroupprograms_c',
      'join_key_lhs' => 'restaurant7162aurants_ida',
      'join_key_rhs' => 'restaurantccbbrograms_idb',
    ),
  ),
  'table' => 'restaurantsroupprograms_c',
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
      'name' => 'restaurant7162aurants_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'restaurantccbbrograms_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'restaurants_groupprogramsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'restaurants_groupprograms_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'restaurant7162aurants_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'restaurants_groupprograms_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'restaurantccbbrograms_idb',
      ),
    ),
  ),
);
?>
