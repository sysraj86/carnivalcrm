<?php
// created: 2011-08-18 11:16:46
$dictionary["passportlist_activities_tasks"] = array (
  'relationships' => 
  array (
    'passportlist_activities_tasks' => 
    array (
      'lhs_module' => 'PassportList',
      'lhs_table' => 'PassportList',
      'lhs_key' => 'id',
      'rhs_module' => 'Tasks',
      'rhs_table' => 'tasks',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'PassportList',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);
?>
