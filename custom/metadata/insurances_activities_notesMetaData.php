<?php
// created: 2011-11-25 10:12:03
$dictionary["insurances_activities_notes"] = array (
  'relationships' => 
  array (
    'insurances_activities_notes' => 
    array (
      'lhs_module' => 'Insurances',
      'lhs_table' => 'insurances',
      'lhs_key' => 'id',
      'rhs_module' => 'Notes',
      'rhs_table' => 'notes',
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
