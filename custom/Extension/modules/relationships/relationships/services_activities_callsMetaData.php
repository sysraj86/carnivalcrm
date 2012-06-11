<?php
// created: 2011-11-01 09:21:00
$dictionary["services_activities_calls"] = array (
  'relationships' => 
  array (
    'services_activities_calls' => 
    array (
      'lhs_module' => 'Services',
      'lhs_table' => 'services',
      'lhs_key' => 'id',
      'rhs_module' => 'Calls',
      'rhs_table' => 'calls',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Services',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);
?>
