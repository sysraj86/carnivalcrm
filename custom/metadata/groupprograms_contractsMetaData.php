<?php
// created: 2011-09-29 13:50:17
$dictionary["groupprograms_contracts"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'groupprograms_contracts' => 
    array (
      'lhs_module' => 'GroupPrograms',
      'lhs_table' => 'groupprograms',
      'lhs_key' => 'id',
      'rhs_module' => 'Contracts',
      'rhs_table' => 'contracts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'groupprograms_contracts_c',
      'join_key_lhs' => 'groupprogr4251rograms_ida',
      'join_key_rhs' => 'groupprogr6232ntracts_idb',
    ),
  ),
  'table' => 'groupprograms_contracts_c',
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
      'name' => 'groupprogr4251rograms_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'groupprogr6232ntracts_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'groupprograms_contractsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'groupprograms_contracts_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'groupprogr4251rograms_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'groupprograms_contracts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'groupprogr6232ntracts_idb',
      ),
    ),
  ),
);
?>
