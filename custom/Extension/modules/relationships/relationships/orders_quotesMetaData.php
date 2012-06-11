<?php
// created: 2011-11-28 08:47:49
$dictionary["orders_quotes"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'orders_quotes' => 
    array (
      'lhs_module' => 'Orders',
      'lhs_table' => 'orders',
      'lhs_key' => 'id',
      'rhs_module' => 'Quotes',
      'rhs_table' => 'quotes',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'orders_quotes_c',
      'join_key_lhs' => 'orders_quo2e0asorders_ida',
      'join_key_rhs' => 'orders_quoe6desquotes_idb',
    ),
  ),
  'table' => 'orders_quotes_c',
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
      'name' => 'orders_quo2e0asorders_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'orders_quoe6desquotes_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'orders_quotesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'orders_quotes_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'orders_quo2e0asorders_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'orders_quotes_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'orders_quoe6desquotes_idb',
      ),
    ),
  ),
);
?>
