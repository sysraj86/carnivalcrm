<?php
// created: 2011-10-03 18:05:07
$dictionary["c_approval_worksheets"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'c_approval_worksheets' => 
    array (
      'lhs_module' => 'Worksheets',
      'lhs_table' => 'worksheets',
      'lhs_key' => 'id',
      'rhs_module' => 'C_Approval',
      'rhs_table' => 'c_approval',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Worksheets',
    ),
  ),
  'table' => 'c_approval_worksheets_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'c_approvalf31cksheets_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'c_approval2337pproval_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'c_approval_worksheetsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'c_approval_worksheets_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'c_approvalf31cksheets_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'c_approval_worksheets_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'c_approval2337pproval_idb',
      ),
    ),
  ),
);
?>
