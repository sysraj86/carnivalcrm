<?php
// created: 2011-08-19 10:40:18
$dictionary["tours_activities_emails"] = array (
  'relationships' => 
  array (
    'tours_activities_emails' => 
    array (
      'lhs_module' => 'Tours',
      'lhs_table' => 'tours',
      'lhs_key' => 'id',
      'rhs_module' => 'Emails',
      'rhs_table' => 'emails',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Tours',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);
?>
