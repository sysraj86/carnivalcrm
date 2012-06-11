<?php
// created: 2011-09-27 18:23:47
$dictionary["travelguides_activities_notes"] = array (
  'relationships' => 
  array (
    'travelguides_activities_notes' => 
    array (
      'lhs_module' => 'TravelGuides',
      'lhs_table' => 'travelguides',
      'lhs_key' => 'id',
      'rhs_module' => 'Notes',
      'rhs_table' => 'notes',
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
