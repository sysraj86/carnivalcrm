<?php
// created: 2011-08-19 11:13:31
$dictionary["hotels_activities_calls"] = array (
  'relationships' => 
  array (
    'hotels_activities_calls' => 
    array (
      'lhs_module' => 'Hotels',
      'lhs_table' => 'hotels',
      'lhs_key' => 'id',
      'rhs_module' => 'Calls',
      'rhs_table' => 'calls',
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
