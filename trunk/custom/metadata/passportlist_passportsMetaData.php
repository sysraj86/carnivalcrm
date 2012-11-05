<?php
// created: 2011-08-18 00:14:33
$dictionary["passportlist_passports"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'passportlist_passports' => 
    array (
      'lhs_module' => 'PassportList',
      'lhs_table' => 'passportlist',
      'lhs_key' => 'id',
      'rhs_module' => 'Passports',
      'rhs_table' => 'passports',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'passportlist_passports_c',
      'join_key_lhs' => 'passportli5f6cortlist_ida',
      'join_key_rhs' => 'passportli3ee5ssports_idb',
    ),
  ),
  'table' => 'passportlist_passports_c',
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
      'name' => 'passportli5f6cortlist_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'passportli3ee5ssports_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'passportlist_passportsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'passportlist_passports_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'passportli5f6cortlist_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'passportlist_passports_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'passportli3ee5ssports_idb',
      ),
    ),
  ),
);
?>
