<?php
// created: 2011-11-01 09:21:24
$dictionary["services_activities_tasks"] = array (
  'relationships' => 
  array (
    'services_activities_tasks' => 
    array (
      'lhs_module' => 'Services',
      'lhs_table' => 'services',
      'lhs_key' => 'id',
      'rhs_module' => 'Tasks',
      'rhs_table' => 'tasks',
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
