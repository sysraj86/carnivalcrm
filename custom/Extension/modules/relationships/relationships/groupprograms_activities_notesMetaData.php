<?php
// created: 2011-08-19 10:57:14
$dictionary["groupprograms_activities_notes"] = array (
  'relationships' => 
  array (
    'groupprograms_activities_notes' => 
    array (
      'lhs_module' => 'GroupPrograms',
      'lhs_table' => 'groupprograms',
      'lhs_key' => 'id',
      'rhs_module' => 'Notes',
      'rhs_table' => 'notes',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'GroupPrograms',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);
?>
