<?php
// created: 2011-10-04 09:50:44
$dictionary["c_approval_transportbookings"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'c_approval_transportbookings' => 
    array (
      'lhs_module' => 'TransportBookings',
      'lhs_table' => 'TransportBookings',
      'lhs_key' => 'id',
      'rhs_module' => 'C_Approval',
      'rhs_table' => 'c_approval',
      'rhs_key' => 'parent_id',
         'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'TransportBookings',
    ),
  ),
  'table' => 'c_approval_portbookings_c',
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
      'name' => 'c_approval991dookings_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'c_approval246cpproval_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'c_approval_nsportbookingsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'c_approval_nsportbookings_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'c_approval991dookings_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'c_approval_nsportbookings_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'c_approval246cpproval_idb',
      ),
    ),
  ),
);
?>
