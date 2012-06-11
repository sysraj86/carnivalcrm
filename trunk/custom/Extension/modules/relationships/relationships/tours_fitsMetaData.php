<?php
// created: 2011-08-08 11:54:02
$dictionary["tours_fits"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'tours_fits' => 
    array (
      'lhs_module' => 'Tours',
      'lhs_table' => 'tours',
      'lhs_key' => 'id',
      'rhs_module' => 'FITs',
      'rhs_table' => 'fits',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'tours_fits_c',
      'join_key_lhs' => 'tours_fits1efctstours_ida',
      'join_key_rhs' => 'tours_fits51f1itsfits_idb',
    ),
  ),
  'table' => 'tours_fits_c',
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
      'name' => 'tours_fits1efctstours_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'tours_fits51f1itsfits_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'tours_fitsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'tours_fits_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'tours_fits1efctstours_ida',
        1 => 'tours_fits51f1itsfits_idb',
      ),
    ),
  ),
);
?>
