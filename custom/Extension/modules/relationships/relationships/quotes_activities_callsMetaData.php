<?php
// created: 2011-11-11 12:07:20
$dictionary["quotes_activities_calls"] = array (
  'relationships' => 
  array (
    'quotes_activities_calls' => 
    array (
      'lhs_module' => 'Quotes',
      'lhs_table' => 'quotes',
      'lhs_key' => 'id',
      'rhs_module' => 'Calls',
      'rhs_table' => 'calls',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Quotes',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);
?>
