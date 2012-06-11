<?php
// created: 2011-08-22 10:23:00
$dictionary["accounts_fits"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'accounts_fits' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'FITs',
      'rhs_table' => 'fits',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'accounts_fits_c',
      'join_key_lhs' => 'accounts_fd483ccounts_ida',
      'join_key_rhs' => 'accounts_f7035itsfits_idb',
    ),
  ),
  'table' => 'accounts_fits_c',
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
      'name' => 'accounts_fd483ccounts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'accounts_f7035itsfits_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'accounts_fitsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'accounts_fits_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'accounts_fd483ccounts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'accounts_fits_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'accounts_f7035itsfits_idb',
      ),
    ),
  ),
);
?>
