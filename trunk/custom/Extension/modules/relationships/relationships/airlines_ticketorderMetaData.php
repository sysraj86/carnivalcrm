<?php
// created: 2011-09-09 10:08:10
$dictionary["airlines_ticketorder"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'airlines_ticketorder' => 
    array (
      'lhs_module' => 'Airlines',
      'lhs_table' => 'airlines',
      'lhs_key' => 'id',
      'rhs_module' => 'TicketOrder',
      'rhs_table' => 'TicketOrder',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'airlines_ticketorder_c',
      'join_key_lhs' => 'airlines_t5154irlines_ida',
      'join_key_rhs' => 'airlines_t58f8etorder_idb',
    ),
  ),
  'table' => 'airlines_ticketorder_c',
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
      'name' => 'airlines_t5154irlines_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'airlines_t58f8etorder_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'airlines_ticketorderspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'airlines_ticketorder_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'airlines_t5154irlines_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'airlines_ticketorder_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'airlines_t58f8etorder_idb',
      ),
    ),
  ),
);
?>
