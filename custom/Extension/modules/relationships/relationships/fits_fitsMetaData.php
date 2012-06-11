<?php
// created: 2011-08-22 10:36:35
$dictionary["fits_fits"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'fits_fits' => 
    array (
      'lhs_module' => 'FITs',
      'lhs_table' => 'fits',
      'lhs_key' => 'id',
      'rhs_module' => 'FITs',
      'rhs_table' => 'fits',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'fits_fits_c',
      'join_key_lhs' => 'fits_fitsfbaacitsfits_ida',
      'join_key_rhs' => 'fits_fitsf64f3itsfits_idb',
    ),
  ),
  'table' => 'fits_fits_c',
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
      'name' => 'fits_fitsfbaacitsfits_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'fits_fitsf64f3itsfits_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'fits_fitsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'fits_fits_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'fits_fitsfbaacitsfits_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'fits_fits_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'fits_fitsf64f3itsfits_idb',
      ),
    ),
  ),
);
?>
