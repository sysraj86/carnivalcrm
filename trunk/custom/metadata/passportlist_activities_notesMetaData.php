<?php
// created: 2011-08-18 11:16:45
$dictionary["passportlist_activities_notes"] = array (
  'relationships' => 
  array (
    'passportlist_activities_notes' => 
    array (
      'lhs_module' => 'PassportList',
      'lhs_table' => 'PassportList',
      'lhs_key' => 'id',
      'rhs_module' => 'Notes',
      'rhs_table' => 'notes',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'PassportList',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);
?>
