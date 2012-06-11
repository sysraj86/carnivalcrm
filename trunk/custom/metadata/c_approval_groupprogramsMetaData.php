<?php
// created: 2011-10-03 18:05:07
$dictionary["c_approval_groupprograms"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'c_approval_groupprograms' => 
    array (
      'lhs_module' => 'GroupPrograms',
      'lhs_table' => 'groupprograms',
      'lhs_key' => 'id',
      'rhs_module' => 'C_Approval',
      'rhs_table' => 'c_approval',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'GroupPrograms',
      
      
    ),
  ),
  'table' => 'c_approval_roupprograms_c',
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
      'name' => 'c_approval851drograms_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'c_approval54a5pproval_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'c_approval_groupprogramsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'c_approval_groupprograms_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'c_approval851drograms_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'c_approval_groupprograms_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'c_approval54a5pproval_idb',
      ),
    ),
  ),
);
?>
