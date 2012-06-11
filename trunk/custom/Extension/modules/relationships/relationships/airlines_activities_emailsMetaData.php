<?php
// created: 2011-08-19 11:20:06
$dictionary["airlines_activities_emails"] = array (
  'relationships' => 
  array (
    'airlines_activities_emails' => 
    array (
      'lhs_module' => 'Airlines',
      'lhs_table' => 'airlines',
      'lhs_key' => 'id',
      'rhs_module' => 'Emails',
      'rhs_table' => 'emails',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Airlines',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);
?>
