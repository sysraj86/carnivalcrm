<?php
// created: 2011-08-05 11:50:06
$dictionary["tours_contracts"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'tours_contracts' => 
    array (
      'lhs_module' => 'Tours',
      'lhs_table' => 'tours',
      'lhs_key' => 'id',
      'rhs_module' => 'Contracts',
      'rhs_table' => 'contracts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'tours_contracts_c',
      'join_key_lhs' => 'tours_contec87tstours_ida',
      'join_key_rhs' => 'tours_contb65dntracts_idb',
    ),
  ),
  'table' => 'tours_contracts_c',
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
      'name' => 'tours_contec87tstours_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'tours_contb65dntracts_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'tours_contractsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'tours_contracts_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'tours_contec87tstours_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'tours_contracts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'tours_contb65dntracts_idb',
      ),
    ),
  ),
);
?>
