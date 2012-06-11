<?php
// created: 2011-08-19 10:08:46
$dictionary["accounts_groupprograms"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'accounts_groupprograms' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'GroupPrograms',
      'rhs_table' => 'groupprograms',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'accounts_groupprograms_c',
      'join_key_lhs' => 'accounts_g640eccounts_ida',
      'join_key_rhs' => 'accounts_g7deerograms_idb',
    ),
  ),
  'table' => 'accounts_groupprograms_c',
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
      'name' => 'accounts_g640eccounts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'accounts_g7deerograms_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'accounts_groupprogramsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'accounts_groupprograms_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'accounts_g640eccounts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'accounts_groupprograms_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'accounts_g7deerograms_idb',
      ),
    ),
  ),
);
?>
