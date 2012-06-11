<?php
// created: 2011-08-23 11:27:26
$dictionary["insurances_fits"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'insurances_fits' => 
    array (
      'lhs_module' => 'Insurances',
      'lhs_table' => 'insurances',
      'lhs_key' => 'id',
      'rhs_module' => 'FITs',
      'rhs_table' => 'fits',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'insurances_fits_c',
      'join_key_lhs' => 'insurances87aeurances_ida',
      'join_key_rhs' => 'insurancese657itsfits_idb',
    ),
  ),
  'table' => 'insurances_fits_c',
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
      'name' => 'insurances87aeurances_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'insurancese657itsfits_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'insurances_fitsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'insurances_fits_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'insurances87aeurances_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'insurances_fits_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'insurancese657itsfits_idb',
      ),
    ),
  ),
);
?>
