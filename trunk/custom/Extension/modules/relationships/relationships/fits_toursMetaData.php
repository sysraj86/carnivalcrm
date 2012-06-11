<?php
// created: 2011-08-19 10:28:21
$dictionary["fits_tours"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'fits_tours' => 
    array (
      'lhs_module' => 'FITs',
      'lhs_table' => 'fits',
      'lhs_key' => 'id',
      'rhs_module' => 'Tours',
      'rhs_table' => 'tours',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'fits_tours_c',
      'join_key_lhs' => 'fits_tours3769ursfits_ida',
      'join_key_rhs' => 'fits_tours75c1rstours_idb',
    ),
  ),
  'table' => 'fits_tours_c',
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
      'name' => 'fits_tours3769ursfits_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'fits_tours75c1rstours_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'fits_toursspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'fits_tours_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'fits_tours3769ursfits_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'fits_tours_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'fits_tours75c1rstours_idb',
      ),
    ),
  ),
);
?>
