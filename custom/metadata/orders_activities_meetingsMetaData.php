<?php
// created: 2011-11-29 14:33:27
$dictionary["orders_activities_meetings"] = array (
  'relationships' => 
  array (
    'orders_activities_meetings' => 
    array (
      'lhs_module' => 'Orders',
      'lhs_table' => 'orders',
      'lhs_key' => 'id',
      'rhs_module' => 'Meetings',
      'rhs_table' => 'meetings',
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
