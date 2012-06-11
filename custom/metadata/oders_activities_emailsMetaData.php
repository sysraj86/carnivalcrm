<?php
// created: 2011-10-25 19:18:53
$dictionary["oders_activities_emails"] = array (
  'relationships' => 
  array (
    'oders_activities_emails' => 
    array (
      'lhs_module' => 'Oders',
      'lhs_table' => 'oders',
      'lhs_key' => 'id',
      'rhs_module' => 'Emails',
      'rhs_table' => 'emails',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Oders',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);
?>
