<?php
// created: 2011-11-11 12:07:24
$dictionary["quotes_activities_emails"] = array (
  'relationships' => 
  array (
    'quotes_activities_emails' => 
    array (
      'lhs_module' => 'Quotes',
      'lhs_table' => 'quotes',
      'lhs_key' => 'id',
      'rhs_module' => 'Emails',
      'rhs_table' => 'emails',
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
