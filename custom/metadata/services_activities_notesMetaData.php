<?php
// created: 2011-11-01 09:21:16
$dictionary["services_activities_notes"] = array (
  'relationships' => 
  array (
    'services_activities_notes' => 
    array (
      'lhs_module' => 'Services',
      'lhs_table' => 'services',
      'lhs_key' => 'id',
      'rhs_module' => 'Notes',
      'rhs_table' => 'notes',
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
