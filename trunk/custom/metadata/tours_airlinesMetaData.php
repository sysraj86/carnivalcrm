<?php
// created: 2011-08-19 10:46:04
$dictionary["tours_airlines"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'tours_airlines' => 
    array (
      'lhs_module' => 'Tours',
      'lhs_table' => 'tours',
      'lhs_key' => 'id',
      'rhs_module' => 'Airlines',
      'rhs_table' => 'airlines',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'tours_airlines_c',
      'join_key_lhs' => 'tours_airl69b4estours_ida',
      'join_key_rhs' => 'tours_airl6d54irlines_idb',
    ),
  ),
  'table' => 'tours_airlines_c',
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
      'name' => 'tours_airl69b4estours_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'tours_airl6d54irlines_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'tours_airlinesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'tours_airlines_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'tours_airl69b4estours_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'tours_airlines_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'tours_airl6d54irlines_idb',
      ),
    ),
  ),
);
?>
