<?php
// created: 2011-08-18 11:16:42
$dictionary["passportlist_activities_calls"] = array (
  'relationships' => 
  array (
    'passportlist_activities_calls' => 
    array (
      'lhs_module' => 'PassportList',
      'lhs_table' => 'passportlist',
      'lhs_key' => 'id',
      'rhs_module' => 'Calls',
      'rhs_table' => 'calls',
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
