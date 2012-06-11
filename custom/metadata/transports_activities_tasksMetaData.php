<?php
// created: 2011-08-23 12:43:34
$dictionary["transports_activities_tasks"] = array (
  'relationships' => 
  array (
    'transports_activities_tasks' => 
    array (
      'lhs_module' => 'Transports',
      'lhs_table' => 'transports',
      'lhs_key' => 'id',
      'rhs_module' => 'Tasks',
      'rhs_table' => 'tasks',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Transports',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);
?>
