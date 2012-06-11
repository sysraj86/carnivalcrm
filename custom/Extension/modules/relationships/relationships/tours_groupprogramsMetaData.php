<?php
// created: 2011-08-05 11:51:56
$dictionary["tours_groupprograms"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'tours_groupprograms' => 
    array (
      'lhs_module' => 'Tours',
      'lhs_table' => 'tours',
      'lhs_key' => 'id',
      'rhs_module' => 'GroupPrograms',
      'rhs_table' => 'groupprograms',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'tours_groupprograms_c',
      'join_key_lhs' => 'tours_groufc45mstours_ida',
      'join_key_rhs' => 'tours_grouf44crograms_idb',
    ),
  ),
  'table' => 'tours_groupprograms_c',
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
      'name' => 'tours_groufc45mstours_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'tours_grouf44crograms_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'tours_groupprogramsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'tours_groupprograms_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'tours_groufc45mstours_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'tours_groupprograms_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'tours_grouf44crograms_idb',
      ),
    ),
  ),
);
?>
