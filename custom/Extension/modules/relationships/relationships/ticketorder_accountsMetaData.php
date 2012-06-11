<?php
// created: 2011-09-09 10:33:00
$dictionary["ticketorder_accounts"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'ticketorder_accounts' => 
    array (
      'lhs_module' => 'TicketOrder',
      'lhs_table' => 'TicketOrder',
      'lhs_key' => 'id',
      'rhs_module' => 'Accounts',
      'rhs_table' => 'accounts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'ticketorder_accounts_c',
      'join_key_lhs' => 'ticketordeeb77etorder_ida',
      'join_key_rhs' => 'ticketorde9945ccounts_idb',
    ),
  ),
  'table' => 'ticketorder_accounts_c',
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
      'name' => 'ticketordeeb77etorder_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'ticketorde9945ccounts_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'ticketorder_accountsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'ticketorder_accounts_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'ticketordeeb77etorder_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'ticketorder_accounts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'ticketorde9945ccounts_idb',
      ),
    ),
  ),
);
?>
