<?php
// created: 2011-10-26 11:39:34
$dictionary["hotels_groupprograms"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'hotels_groupprograms' => 
    array (
      'lhs_module' => 'Hotels',
      'lhs_table' => 'hotels',
      'lhs_key' => 'id',
      'rhs_module' => 'GroupPrograms',
      'rhs_table' => 'groupprograms',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'hotels_groupprograms_c',
      'join_key_lhs' => 'hotels_gro0d05shotels_ida',
      'join_key_rhs' => 'hotels_gro0886rograms_idb',
    ),
  ),
  'table' => 'hotels_groupprograms_c',
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
      'name' => 'hotels_gro0d05shotels_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'hotels_gro0886rograms_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'hotels_groupprogramsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'hotels_groupprograms_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'hotels_gro0d05shotels_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'hotels_groupprograms_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'hotels_gro0886rograms_idb',
      ),
    ),
  ),
);
?>
