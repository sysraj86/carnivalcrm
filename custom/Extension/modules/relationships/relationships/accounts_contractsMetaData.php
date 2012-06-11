<?php
// created: 2011-08-19 10:10:18
$dictionary["accounts_contracts"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'accounts_contracts' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'Contracts',
      'rhs_table' => 'contracts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'accounts_contracts_c',
      'join_key_lhs' => 'accounts_c71f9ccounts_ida',
      'join_key_rhs' => 'accounts_cafa9ntracts_idb',
    ),
  ),
  'table' => 'accounts_contracts_c',
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
      'name' => 'accounts_c71f9ccounts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'accounts_cafa9ntracts_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'accounts_contractsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'accounts_contracts_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'accounts_c71f9ccounts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'accounts_contracts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'accounts_cafa9ntracts_idb',
      ),
    ),
  ),
);
?>
