<?php
// created: 2011-10-26 00:36:45
$dictionary["accounts_oders"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'accounts_oders' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'Oders',
      'rhs_table' => 'oders',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'accounts_oders_c',
      'join_key_lhs' => 'accounts_o20ceccounts_ida',
      'join_key_rhs' => 'accounts_occ01rsoders_idb',
    ),
  ),
  'table' => 'accounts_oders_c',
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
      'name' => 'accounts_o20ceccounts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'accounts_occ01rsoders_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'accounts_odersspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'accounts_oders_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'accounts_o20ceccounts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'accounts_oders_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'accounts_occ01rsoders_idb',
      ),
    ),
  ),
);
?>
