<?php
// created: 2011-11-01 12:41:34
$dictionary["fits_contracts"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'fits_contracts' => 
    array (
      'lhs_module' => 'FITs',
      'lhs_table' => 'fits',
      'lhs_key' => 'id',
      'rhs_module' => 'Contracts',
      'rhs_table' => 'contracts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'fits_contracts_c',
      'join_key_lhs' => 'fits_contr29f3ctsfits_ida',
      'join_key_rhs' => 'fits_contrfbb6ntracts_idb',
    ),
  ),
  'table' => 'fits_contracts_c',
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
      'name' => 'fits_contr29f3ctsfits_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'fits_contrfbb6ntracts_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'fits_contractsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'fits_contracts_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'fits_contr29f3ctsfits_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'fits_contracts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'fits_contrfbb6ntracts_idb',
      ),
    ),
  ),
);
?>
