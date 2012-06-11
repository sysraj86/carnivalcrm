<?php
// created: 2011-10-17 11:39:26
$dictionary["groupprograms_fits"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'groupprograms_fits' => 
    array (
      'lhs_module' => 'GroupPrograms',
      'lhs_table' => 'groupprograms',
      'lhs_key' => 'id',
      'rhs_module' => 'FITs',
      'rhs_table' => 'fits',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'groupprograms_fits_c',
      'join_key_lhs' => 'groupprogr52d0rograms_ida',
      'join_key_rhs' => 'groupprogr6551itsfits_idb',
    ),
  ),
  'table' => 'groupprograms_fits_c',
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
      'name' => 'groupprogr52d0rograms_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'groupprogr6551itsfits_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'groupprograms_fitsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'groupprograms_fits_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'groupprogr52d0rograms_ida',
        1 => 'groupprogr6551itsfits_idb',
      ),
    ),
  ),
);
?>
