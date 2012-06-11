<?php
// created: 2011-11-25 10:12:11
$dictionary["insurances_activities_emails"] = array (
  'relationships' => 
  array (
    'insurances_activities_emails' => 
    array (
      'lhs_module' => 'Insurances',
      'lhs_table' => 'insurances',
      'lhs_key' => 'id',
      'rhs_module' => 'Emails',
      'rhs_table' => 'emails',
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
