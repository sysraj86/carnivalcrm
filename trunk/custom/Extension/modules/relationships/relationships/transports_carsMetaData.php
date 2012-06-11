<?php
// created: 2011-11-09 10:14:26
$dictionary["transports_cars"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'transports_cars' => 
    array (
      'lhs_module' => 'Transports',
      'lhs_table' => 'transports',
      'lhs_key' => 'id',
      'rhs_module' => 'Cars',
      'rhs_table' => 'cars',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'transports_cars_c',
      'join_key_lhs' => 'transportsedf7nsports_ida',
      'join_key_rhs' => 'transports6b8darscars_idb',
    ),
  ),
  'table' => 'transports_cars_c',
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
      'name' => 'transportsedf7nsports_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'transports6b8darscars_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'transports_carsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'transports_cars_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'transportsedf7nsports_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'transports_cars_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'transports6b8darscars_idb',
      ),
    ),
  ),
);
?>
