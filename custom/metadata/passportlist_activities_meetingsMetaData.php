<?php
// created: 2011-08-18 11:16:43
$dictionary["passportlist_activities_meetings"] = array (
  'relationships' => 
  array (
    'passportlist_activities_meetings' => 
    array (
      'lhs_module' => 'PassportList',
      'lhs_table' => 'passportlist',
      'lhs_key' => 'id',
      'rhs_module' => 'Meetings',
      'rhs_table' => 'meetings',
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
