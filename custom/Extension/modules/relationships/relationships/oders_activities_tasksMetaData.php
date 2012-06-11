<?php
// created: 2011-10-25 19:18:48
$dictionary["oders_activities_tasks"] = array (
  'relationships' => 
  array (
    'oders_activities_tasks' => 
    array (
      'lhs_module' => 'Oders',
      'lhs_table' => 'oders',
      'lhs_key' => 'id',
      'rhs_module' => 'Tasks',
      'rhs_table' => 'tasks',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Oders',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);
?>
