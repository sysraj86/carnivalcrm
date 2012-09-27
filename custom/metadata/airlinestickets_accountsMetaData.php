<?php
// created: 2011-10-01 10:06:20
$dictionary["airlinestickets_accounts"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'airlinestickets_accounts' => 
    array (
      'lhs_module' => 'AirlinesTickets',
      'lhs_table' => 'airlinestickets',
      'lhs_key' => 'id',
      'rhs_module' => 'Accounts',
      'rhs_table' => 'accounts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'airlinesticets_accounts_c',
      'join_key_lhs' => 'airlinestiec2atickets_ida',
      'join_key_rhs' => 'airlinesti3969ccounts_idb',
    ),
  ),
  'table' => 'airlinesticets_accounts_c',
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
      'name' => 'airlinestiec2atickets_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'airlinesti3969ccounts_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'airlinestickets_accountsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'airlinestickets_accounts_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'airlinestiec2atickets_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'airlinestickets_accounts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'airlinesti3969ccounts_idb',
      ),
    ),
  ),
);
?>
