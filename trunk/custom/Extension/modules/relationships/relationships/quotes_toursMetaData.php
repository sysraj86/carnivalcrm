<?php
// created: 2011-09-06 11:44:45
$dictionary["quotes_tours"] = array (
  'true_relationship_type' => 'one-to-one',
  'from_studio' => true,
  'relationships' => 
  array (
    'quotes_tours' => 
    array (
      'lhs_module' => 'Quotes',
      'lhs_table' => 'quotes',
      'lhs_key' => 'id',
      'rhs_module' => 'Tours',
      'rhs_table' => 'tours',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'quotes_tours_c',
      'join_key_lhs' => 'quotes_toue0b3squotes_ida',
      'join_key_rhs' => 'quotes_toufa8brstours_idb',
    ),
  ),
  'table' => 'quotes_tours_c',
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
      'name' => 'quotes_toue0b3squotes_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'quotes_toufa8brstours_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'quotes_toursspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'quotes_tours_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'quotes_toue0b3squotes_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'quotes_tours_idb2',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'quotes_toufa8brstours_idb',
      ),
    ),
  ),
);
?>
