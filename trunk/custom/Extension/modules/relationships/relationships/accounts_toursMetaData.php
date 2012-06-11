<?php
// created: 2011-10-21 10:42:19
$dictionary["accounts_tours"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'accounts_tours' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'Tours',
      'rhs_table' => 'tours',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'accounts_tours_c',
      'join_key_lhs' => 'accounts_t4d21ccounts_ida',
      'join_key_rhs' => 'accounts_t1e8brstours_idb',
    ),
  ),
  'table' => 'accounts_tours_c',
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
      'name' => 'accounts_t4d21ccounts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'accounts_t1e8brstours_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'accounts_toursspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'accounts_tours_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'accounts_t4d21ccounts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'accounts_tours_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'accounts_t1e8brstours_idb',
      ),
    ),
  ),
);
?>
