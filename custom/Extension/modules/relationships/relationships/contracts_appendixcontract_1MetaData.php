<?php
// created: 2011-11-23 15:54:30
$dictionary["contracts_appendixcontract_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'contracts_appendixcontract_1' => 
    array (
      'lhs_module' => 'Contracts',
      'lhs_table' => 'contracts',
      'lhs_key' => 'id',
      'rhs_module' => 'AppendixContract',
      'rhs_table' => 'appendixcontract',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'contracts_aixcontract_1_c',
      'join_key_lhs' => 'contracts_b286ntracts_ida',
      'join_key_rhs' => 'contracts_b1a5ontract_idb',
    ),
  ),
  'table' => 'contracts_aixcontract_1_c',
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
      'name' => 'contracts_b286ntracts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'contracts_b1a5ontract_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'contracts_andixcontract_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'contracts_andixcontract_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'contracts_b286ntracts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'contracts_andixcontract_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'contracts_b1a5ontract_idb',
      ),
    ),
  ),
);
?>
