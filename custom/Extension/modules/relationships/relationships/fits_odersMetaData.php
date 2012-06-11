<?php
// created: 2011-10-26 00:43:22
$dictionary["fits_oders"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'fits_oders' => 
    array (
      'lhs_module' => 'FITs',
      'lhs_table' => 'fits',
      'lhs_key' => 'id',
      'rhs_module' => 'Oders',
      'rhs_table' => 'oders',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'fits_oders_c',
      'join_key_lhs' => 'fits_oders2a96ersfits_ida',
      'join_key_rhs' => 'fits_oders32e6rsoders_idb',
    ),
  ),
  'table' => 'fits_oders_c',
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
      'name' => 'fits_oders2a96ersfits_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'fits_oders32e6rsoders_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'fits_odersspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'fits_oders_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'fits_oders2a96ersfits_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'fits_oders_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'fits_oders32e6rsoders_idb',
      ),
    ),
  ),
);
?>
