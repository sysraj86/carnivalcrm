<?php
// created: 2011-09-06 12:32:50
$dictionary["airlines_ticketexchangeorders"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'airlines_ticketexchangeorders' => 
    array (
      'lhs_module' => 'Airlines',
      'lhs_table' => 'airlines',
      'lhs_key' => 'id',
      'rhs_module' => 'TicketExchangeOrders',
      'rhs_table' => 'TicketExchangeOrders',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'airlines_tichangeorders_c',
      'join_key_lhs' => 'airlines_t04e7irlines_ida',
      'join_key_rhs' => 'airlines_tc7ddeorders_idb',
    ),
  ),
  'table' => 'airlines_tichangeorders_c',
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
      'name' => 'airlines_t04e7irlines_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'airlines_tc7ddeorders_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'airlines_tiexchangeordersspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'airlines_tiexchangeorders_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'airlines_t04e7irlines_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'airlines_tiexchangeorders_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'airlines_tc7ddeorders_idb',
      ),
    ),
  ),
);
?>
