<?php
// created: 2012-09-28 11:39:58
$dictionary["contracts_contractappendixs"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'contracts_contractappendixs' => 
    array (
      'lhs_module' => 'Contracts',
      'lhs_table' => 'contracts',
      'lhs_key' => 'id',
      'rhs_module' => 'ContractAppendixs',
      'rhs_table' => 'contractappendixs',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'contracts_cactappendixs_c',
      'join_key_lhs' => 'contracts_2225ntracts_ida',
      'join_key_rhs' => 'contracts_4745pendixs_idb',
    ),
  ),
  'table' => 'contracts_cactappendixs_c',
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
      'name' => 'contracts_2225ntracts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'contracts_4745pendixs_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'contracts_ctractappendixsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'contracts_ctractappendixs_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'contracts_2225ntracts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'contracts_ctractappendixs_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'contracts_4745pendixs_idb',
      ),
    ),
  ),
);
?>
