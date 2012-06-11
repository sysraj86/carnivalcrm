<?php
// created: 2011-12-21 08:48:30
$dictionary["tours_cars"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'tours_cars' => 
    array (
      'lhs_module' => 'Tours',
      'lhs_table' => 'tours',
      'lhs_key' => 'id',
      'rhs_module' => 'Cars',
      'rhs_table' => 'cars',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'tours_cars_c',
      'join_key_lhs' => 'tours_cars571brstours_ida',
      'join_key_rhs' => 'tours_carsc2eearscars_idb',
    ),
  ),
  'table' => 'tours_cars_c',
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
      'name' => 'tours_cars571brstours_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'tours_carsc2eearscars_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'tours_carsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'tours_cars_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'tours_cars571brstours_ida',
        1 => 'tours_carsc2eearscars_idb',
      ),
    ),
  ),
);
?>
