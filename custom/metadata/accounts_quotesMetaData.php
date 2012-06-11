<?php
// created: 2011-09-06 11:29:51
$dictionary["accounts_quotes"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'accounts_quotes' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'Quotes',
      'rhs_table' => 'quotes',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'accounts_quotes_c',
      'join_key_lhs' => 'accounts_qd96cccounts_ida',
      'join_key_rhs' => 'accounts_q5e58squotes_idb',
    ),
  ),
  'table' => 'accounts_quotes_c',
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
      'name' => 'accounts_qd96cccounts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'accounts_q5e58squotes_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'accounts_quotesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'accounts_quotes_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'accounts_qd96cccounts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'accounts_quotes_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'accounts_q5e58squotes_idb',
      ),
    ),
  ),
);
?>
