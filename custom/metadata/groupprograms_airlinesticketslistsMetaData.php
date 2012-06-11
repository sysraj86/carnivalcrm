<?php
// created: 2011-09-05 08:49:54
$dictionary["groupprograms_airlinesticketslists"] = array (
  'true_relationship_type' => 'one-to-one',
  'from_studio' => true,
  'relationships' => 
  array (
    'groupprograms_airlinesticketslists' => 
    array (
      'lhs_module' => 'GroupPrograms',
      'lhs_table' => 'groupprograms',
      'lhs_key' => 'id',
      'rhs_module' => 'AirlinesTicketsLists',
      'rhs_table' => 'AirlinesTicketsLists',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'groupprograticketslists_c',
      'join_key_lhs' => 'groupprogredb7rograms_ida',
      'join_key_rhs' => 'groupprogr60cctslists_idb',
    ),
  ),
  'table' => 'groupprograticketslists_c',
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
      'name' => 'groupprogredb7rograms_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'groupprogr60cctslists_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'groupprograesticketslistsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'groupprograesticketslists_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'groupprogredb7rograms_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'groupprograesticketslists_idb2',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'groupprogr60cctslists_idb',
      ),
    ),
  ),
);
?>
