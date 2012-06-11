<?php
// created: 2011-08-19 11:09:48
$dictionary["restaurants_activities_emails"] = array (
  'relationships' => 
  array (
    'restaurants_activities_emails' => 
    array (
      'lhs_module' => 'Restaurants',
      'lhs_table' => 'restaurants',
      'lhs_key' => 'id',
      'rhs_module' => 'Emails',
      'rhs_table' => 'emails',
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
