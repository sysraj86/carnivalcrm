<?php
// created: 2011-10-04 09:50:44
$dictionary["c_approval_roombookings"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'c_approval_roombookings' => 
    array (
      'lhs_module' => 'RoomBookings',
      'lhs_table' => 'roombookings',
      'lhs_key' => 'id',
      'rhs_module' => 'C_Approval',
      'rhs_table' => 'c_approval',
      'rhs_key' => 'parent_id',
       'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'RoomBookings',
    ),
  ),
  'table' => 'c_approval_roombookings_c',
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
      'name' => 'c_approvalb659ookings_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'c_approval8d13pproval_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'c_approval_roombookingsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'c_approval_roombookings_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'c_approvalb659ookings_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'c_approval_roombookings_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'c_approval8d13pproval_idb',
      ),
    ),
  ),
);
?>
