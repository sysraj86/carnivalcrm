<?php
// created: 2011-08-19 10:29:05
$dictionary["fits_activities_tasks"] = array (
  'relationships' => 
  array (
    'fits_activities_tasks' => 
    array (
      'lhs_module' => 'FITs',
      'lhs_table' => 'fits',
      'lhs_key' => 'id',
      'rhs_module' => 'Tasks',
      'rhs_table' => 'tasks',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'FITs',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);
?>
