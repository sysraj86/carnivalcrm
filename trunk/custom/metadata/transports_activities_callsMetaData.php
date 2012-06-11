<?php
// created: 2011-08-23 12:43:27
$dictionary["transports_activities_calls"] = array (
  'relationships' => 
  array (
    'transports_activities_calls' => 
    array (
      'lhs_module' => 'Transports',
      'lhs_table' => 'transports',
      'lhs_key' => 'id',
      'rhs_module' => 'Calls',
      'rhs_table' => 'calls',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Transports',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);
?>
