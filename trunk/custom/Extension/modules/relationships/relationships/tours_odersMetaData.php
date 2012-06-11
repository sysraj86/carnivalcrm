<?php
// created: 2011-08-19 10:41:51
$dictionary["tours_oders"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'tours_oders' => 
    array (
      'lhs_module' => 'Tours',
      'lhs_table' => 'tours',
      'lhs_key' => 'id',
      'rhs_module' => 'Oders',
      'rhs_table' => 'oders',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'tours_oders_c',
      'join_key_lhs' => 'tours_odere23crstours_ida',
      'join_key_rhs' => 'tours_oder61c7rsoders_idb',
    ),
  ),
  'table' => 'tours_oders_c',
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
      'name' => 'tours_odere23crstours_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'tours_oder61c7rsoders_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'tours_odersspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'tours_oders_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'tours_odere23crstours_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'tours_oders_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'tours_oder61c7rsoders_idb',
      ),
    ),
  ),
);
?>
