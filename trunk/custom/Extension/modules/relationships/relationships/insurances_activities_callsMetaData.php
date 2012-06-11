<?php
// created: 2011-11-25 10:11:55
$dictionary["insurances_activities_calls"] = array (
  'relationships' => 
  array (
    'insurances_activities_calls' => 
    array (
      'lhs_module' => 'Insurances',
      'lhs_table' => 'insurances',
      'lhs_key' => 'id',
      'rhs_module' => 'Calls',
      'rhs_table' => 'calls',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Insurances',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);
?>
