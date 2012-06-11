<?php
// created: 2011-09-06 12:14:34
$dictionary["ticketexchangeorders_ticketorder"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'ticketexchangeorders_ticketorder' => 
    array (
      'lhs_module' => 'TicketExchangeOrders',
      'lhs_table' => 'TicketExchangeOrders',
      'lhs_key' => 'id',
      'rhs_module' => 'TicketOrder',
      'rhs_table' => 'TicketOrder',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'ticketexcha_ticketorder_c',
      'join_key_lhs' => 'ticketexch469deorders_ida',
      'join_key_rhs' => 'ticketexch703aetorder_idb',
    ),
  ),
  'table' => 'ticketexcha_ticketorder_c',
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
      'name' => 'ticketexch469deorders_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'ticketexch703aetorder_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'ticketexchars_ticketorderspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'ticketexchars_ticketorder_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'ticketexch469deorders_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'ticketexchars_ticketorder_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'ticketexch703aetorder_idb',
      ),
    ),
  ),
);
?>
