<?php
// created: 2011-09-06 11:24:37
$dictionary["accounts_accounts"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'accounts_accounts' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'Accounts',
      'rhs_table' => 'accounts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'accounts_accounts_c',
      'join_key_lhs' => 'accounts_a0647ccounts_ida',
      'join_key_rhs' => 'accounts_afff8ccounts_idb',
    ),
  ),
  'table' => 'accounts_accounts_c',
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
      'name' => 'accounts_a0647ccounts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'accounts_afff8ccounts_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'accounts_accountsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'accounts_accounts_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'accounts_a0647ccounts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'accounts_accounts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'accounts_afff8ccounts_idb',
      ),
    ),
  ),
);
?>
