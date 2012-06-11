<?php
// created: 2011-09-06 14:37:07
$dictionary["airlines_airlinestickets_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'airlines_airlinestickets_1' => 
    array (
      'lhs_module' => 'Airlines',
      'lhs_table' => 'airlines',
      'lhs_key' => 'id',
      'rhs_module' => 'AirlinesTickets',
      'rhs_table' => 'AirlinesTickets',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'airlines_ainestickets_1_c',
      'join_key_lhs' => 'airlines_a60edirlines_ida',
      'join_key_rhs' => 'airlines_a9934tickets_idb',
    ),
  ),
  'table' => 'airlines_ainestickets_1_c',
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
      'name' => 'airlines_a60edirlines_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'airlines_a9934tickets_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'airlines_ailinestickets_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'airlines_ailinestickets_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'airlines_a60edirlines_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'airlines_ailinestickets_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'airlines_a9934tickets_idb',
      ),
    ),
  ),
);
?>
