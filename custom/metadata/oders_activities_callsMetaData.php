<?php
// created: 2011-10-25 19:18:32
$dictionary["oders_activities_calls"] = array (
  'relationships' => 
  array (
    'oders_activities_calls' => 
    array (
      'lhs_module' => 'Oders',
      'lhs_table' => 'oders',
      'lhs_key' => 'id',
      'rhs_module' => 'Calls',
      'rhs_table' => 'calls',
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
