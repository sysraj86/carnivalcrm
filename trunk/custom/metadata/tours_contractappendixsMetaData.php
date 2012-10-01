<?php
// created: 2012-09-28 12:06:16
$dictionary["tours_contractappendixs"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'tours_contractappendixs' => 
    array (
      'lhs_module' => 'Tours',
      'lhs_table' => 'tours',
      'lhs_key' => 'id',
      'rhs_module' => 'ContractAppendixs',
      'rhs_table' => 'contractappendixs',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'tours_contractappendixs_c',
      'join_key_lhs' => 'tours_cont48c1xstours_ida',
      'join_key_rhs' => 'tours_cont62fapendixs_idb',
    ),
  ),
  'table' => 'tours_contractappendixs_c',
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
      'name' => 'tours_cont48c1xstours_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'tours_cont62fapendixs_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'tours_contractappendixsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'tours_contractappendixs_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'tours_cont48c1xstours_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'tours_contractappendixs_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'tours_cont62fapendixs_idb',
      ),
    ),
  ),
);
?>
