<?php
// created: 2011-08-19 11:09:42
$dictionary["restaurants_activities_calls"] = array (
  'relationships' => 
  array (
    'restaurants_activities_calls' => 
    array (
      'lhs_module' => 'Restaurants',
      'lhs_table' => 'restaurants',
      'lhs_key' => 'id',
      'rhs_module' => 'Calls',
      'rhs_table' => 'calls',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Restaurants',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);
?>
