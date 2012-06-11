<?php
// created: 2012-02-20 17:18:12
$dictionary["airlinesticketslists_airlinestickets"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'airlinesticketslists_airlinestickets' => 
    array (
      'lhs_module' => 'AirlinesTicketsLists',
      'lhs_table' => 'AirlinesTicketsLists',
      'lhs_key' => 'id',
      'rhs_module' => 'AirlinesTickets',
      'rhs_table' => 'AirlinesTickets',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'airlinesticlinestickets_c',
      'join_key_lhs' => 'airlinesti7e28tslists_ida',
      'join_key_rhs' => 'airlinestibcd8tickets_idb',
    ),
  ),
  'table' => 'airlinesticlinestickets_c',
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
      'name' => 'airlinesti7e28tslists_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'airlinestibcd8tickets_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'airlinesticirlinesticketsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'airlinesticirlinestickets_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'airlinesti7e28tslists_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'airlinesticirlinestickets_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'airlinestibcd8tickets_idb',
      ),
    ),
  ),
);
?>
