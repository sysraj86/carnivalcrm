<?php
// created: 2011-08-19 11:13:35
$dictionary["hotels_activities_tasks"] = array (
  'relationships' => 
  array (
    'hotels_activities_tasks' => 
    array (
      'lhs_module' => 'Hotels',
      'lhs_table' => 'hotels',
      'lhs_key' => 'id',
      'rhs_module' => 'Tasks',
      'rhs_table' => 'tasks',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Hotels',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);
?>
