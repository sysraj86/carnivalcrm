<?php
// created: 2011-08-16 14:20:45
$dictionary["visa_passports_activities_meetings"] = array (
  'relationships' => 
  array (
    'visa_passports_activities_meetings' => 
    array (
      'lhs_module' => 'visa_Passports',
      'lhs_table' => 'visa_passports',
      'lhs_key' => 'id',
      'rhs_module' => 'Meetings',
      'rhs_table' => 'meetings',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'visa_Passports',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);
?>
