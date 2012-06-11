<?php
// created: 2011-08-16 14:20:47
$dictionary["visa_passports_activities_tasks"] = array (
  'relationships' => 
  array (
    'visa_passports_activities_tasks' => 
    array (
      'lhs_module' => 'visa_Passports',
      'lhs_table' => 'visa_passports',
      'lhs_key' => 'id',
      'rhs_module' => 'Tasks',
      'rhs_table' => 'tasks',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'visa_Passports',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);
?>
