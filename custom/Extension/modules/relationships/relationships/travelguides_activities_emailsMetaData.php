<?php
// created: 2011-09-27 18:23:55
$dictionary["travelguides_activities_emails"] = array (
  'relationships' => 
  array (
    'travelguides_activities_emails' => 
    array (
      'lhs_module' => 'TravelGuides',
      'lhs_table' => 'travelguides',
      'lhs_key' => 'id',
      'rhs_module' => 'Emails',
      'rhs_table' => 'emails',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'TravelGuides',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);
?>
