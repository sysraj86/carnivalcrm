<?php
// created: 2011-12-20 09:20:56
$dictionary["tours_airlinestickets"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'tours_airlinestickets' => 
    array (
      'lhs_module' => 'Tours',
      'lhs_table' => 'tours',
      'lhs_key' => 'id',
      'rhs_module' => 'AirlinesTickets',
      'rhs_table' => 'AirlinesTickets',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'tours_airlinestickets_c',
      'join_key_lhs' => 'tours_airl9600tstours_ida',
      'join_key_rhs' => 'tours_airl00e8tickets_idb',
    ),
  ),
  'table' => 'tours_airlinestickets_c',
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
      'name' => 'tours_airl9600tstours_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'tours_airl00e8tickets_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'tours_airlinesticketsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'tours_airlinestickets_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'tours_airl9600tstours_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'tours_airlinestickets_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'tours_airl00e8tickets_idb',
      ),
    ),
  ),
);
?>
