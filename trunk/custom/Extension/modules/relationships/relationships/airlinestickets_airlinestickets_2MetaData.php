<?php
// created: 2011-09-01 14:59:03
$dictionary["airlinestickets_airlinestickets_2"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'airlinestickets_airlinestickets_2' => 
    array (
      'lhs_module' => 'AirlinesTickets',
      'lhs_table' => 'airlines_tickets',
      'lhs_key' => 'id',
      'rhs_module' => 'AirlinesTickets',
      'rhs_table' => 'airlines_tickets',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'airlinesticnestickets_2_c',
      'join_key_lhs' => 'airlinestib3f4tickets_ida',
      'join_key_rhs' => 'airlinesti7bebtickets_idb',
    ),
  ),
  'table' => 'airlinesticnestickets_2_c',
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
      'name' => 'airlinestib3f4tickets_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'airlinesti7bebtickets_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'airlinesticlinestickets_2spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'airlinesticlinestickets_2_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'airlinestib3f4tickets_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'airlinesticlinestickets_2_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'airlinesti7bebtickets_idb',
      ),
    ),
  ),
);
?>
