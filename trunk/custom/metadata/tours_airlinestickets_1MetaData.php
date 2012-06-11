<?php
// created: 2012-03-14 15:47:46
$dictionary["tours_airlinestickets_1"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'tours_airlinestickets_1' => 
    array (
      'lhs_module' => 'Tours',
      'lhs_table' => 'tours',
      'lhs_key' => 'id',
      'rhs_module' => 'AirlinesTickets',
      'rhs_table' => 'AirlinesTickets',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'tours_airlinestickets_1_c',
      'join_key_lhs' => 'tours_airlaf74_1tours_ida',
      'join_key_rhs' => 'tours_airlefbatickets_idb',
    ),
  ),
  'table' => 'tours_airlinestickets_1_c',
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
      'name' => 'tours_airlaf74_1tours_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'tours_airlefbatickets_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'tours_airlinestickets_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'tours_airlinestickets_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'tours_airlaf74_1tours_ida',
        1 => 'tours_airlefbatickets_idb',
      ),
    ),
  ),
);
?>
