<?php
// created: 2011-09-05 10:45:41
$dictionary["fits_groupprograms"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'fits_groupprograms' => 
    array (
      'lhs_module' => 'FITs',
      'lhs_table' => 'fits',
      'lhs_key' => 'id',
      'rhs_module' => 'GroupPrograms',
      'rhs_table' => 'groupprograms',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'fits_groupprograms_c',
      'join_key_lhs' => 'fits_group33fdamsfits_ida',
      'join_key_rhs' => 'fits_group2efarograms_idb',
    ),
  ),
  'table' => 'fits_groupprograms_c',
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
      'name' => 'fits_group33fdamsfits_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'fits_group2efarograms_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'fits_groupprogramsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'fits_groupprograms_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'fits_group33fdamsfits_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'fits_groupprograms_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'fits_group2efarograms_idb',
      ),
    ),
  ),
);
?>
