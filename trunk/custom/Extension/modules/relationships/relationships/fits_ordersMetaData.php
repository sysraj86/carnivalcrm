<?php
// created: 2011-11-15 12:48:00
$dictionary["fits_orders"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'fits_orders' => 
    array (
      'lhs_module' => 'FITs',
      'lhs_table' => 'fits',
      'lhs_key' => 'id',
      'rhs_module' => 'Orders',
      'rhs_table' => 'orders',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'fits_orders_c',
      'join_key_lhs' => 'fits_order6297ersfits_ida',
      'join_key_rhs' => 'fits_order39b7sorders_idb',
    ),
  ),
  'table' => 'fits_orders_c',
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
      'name' => 'fits_order6297ersfits_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'fits_order39b7sorders_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'fits_ordersspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'fits_orders_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'fits_order6297ersfits_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'fits_orders_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'fits_order39b7sorders_idb',
      ),
    ),
  ),
);
?>
