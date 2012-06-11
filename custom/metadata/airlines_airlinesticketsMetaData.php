<?php
// created: 2011-09-06 15:05:38
$dictionary["airlines_airlinestickets"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'airlines_airlinestickets' => 
    array (
      'lhs_module' => 'Airlines',
      'lhs_table' => 'airlines',
      'lhs_key' => 'id',
      'rhs_module' => 'AirlinesTickets',
      'rhs_table' => 'AirlinesTickets',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'airlines_ailinestickets_c',
      'join_key_lhs' => 'airlines_a476cirlines_ida',
      'join_key_rhs' => 'airlines_a1d09tickets_idb',
    ),
  ),
  'table' => 'airlines_ailinestickets_c',
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
      'name' => 'airlines_a476cirlines_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'airlines_a1d09tickets_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'airlines_airlinesticketsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'airlines_airlinestickets_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'airlines_a476cirlines_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'airlines_airlinestickets_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'airlines_a1d09tickets_idb',
      ),
    ),
  ),
);
?>
