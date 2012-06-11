<?php
// created: 2011-11-29 14:33:21
$dictionary["orders_activities_calls"] = array (
  'relationships' => 
  array (
    'orders_activities_calls' => 
    array (
      'lhs_module' => 'Orders',
      'lhs_table' => 'orders',
      'lhs_key' => 'id',
      'rhs_module' => 'Calls',
      'rhs_table' => 'calls',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Orders',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);
?>
