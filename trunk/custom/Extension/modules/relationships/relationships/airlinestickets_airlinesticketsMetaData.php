<?php
// created: 2012-09-25 18:15:46
$dictionary["airlinestickets_airlinestickets"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'airlinestickets_airlinestickets' => 
    array (
      'lhs_module' => 'AirlinesTickets',
      'lhs_table' => 'AirlinesTickets',
      'lhs_key' => 'id',
      'rhs_module' => 'AirlinesTickets',
      'rhs_table' => 'AirlinesTickets',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'airlinesticlinestickets_c',
      'join_key_lhs' => 'airlinesti1265tickets_ida',
      'join_key_rhs' => 'airlinesti185ftickets_idb',
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
      'name' => 'airlinesti1265tickets_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'airlinesti185ftickets_idb',
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
      'name' => 'airlinesticirlinestickets_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'airlinesti1265tickets_ida',
        1 => 'airlinesti185ftickets_idb',
      ),
    ),
  ),
);
?>
