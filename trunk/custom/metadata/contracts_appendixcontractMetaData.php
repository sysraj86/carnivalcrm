<?php
// created: 2011-09-21 10:55:25
$dictionary["contracts_appendixcontract"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'contracts_appendixcontract' => 
    array (
      'lhs_module' => 'Contracts',
      'lhs_table' => 'contracts',
      'lhs_key' => 'id',
      'rhs_module' => 'AppendixContract',
      'rhs_table' => 'appendixcontract',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'contracts_andixcontract_c',
      'join_key_lhs' => 'contracts_2fafntracts_ida',
      'join_key_rhs' => 'contracts_18e4ontract_idb',
    ),
  ),
  'table' => 'contracts_andixcontract_c',
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
      'name' => 'contracts_2fafntracts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'contracts_18e4ontract_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'contracts_apendixcontractspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'contracts_apendixcontract_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'contracts_2fafntracts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'contracts_apendixcontract_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'contracts_18e4ontract_idb',
      ),
    ),
  ),
);
?>
