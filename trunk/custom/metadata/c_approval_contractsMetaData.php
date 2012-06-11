<?php
// created: 2011-10-04 09:50:45
$dictionary["c_approval_contracts"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'c_approval_contracts' => 
    array (
      'lhs_module' => 'Contracts',
      'lhs_table' => 'contracts',
      'lhs_key' => 'id',
      'rhs_module' => 'C_Approval',
      'rhs_table' => 'c_approval',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Contracts',
    ),
  ),
  'table' => 'c_approval_contracts_c',
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
      'name' => 'c_approval8695ntracts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'c_approval34c8pproval_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'c_approval_contractsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'c_approval_contracts_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'c_approval8695ntracts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'c_approval_contracts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'c_approval34c8pproval_idb',
      ),
    ),
  ),
);
?>
