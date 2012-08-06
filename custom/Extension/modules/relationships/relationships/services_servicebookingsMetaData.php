<?php
// created: 2012-08-06 15:50:49
$dictionary["services_servicebookings"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'services_servicebookings' => 
    array (
      'lhs_module' => 'Services',
      'lhs_table' => 'services',
      'lhs_key' => 'id',
      'rhs_module' => 'ServiceBookings',
      'rhs_table' => 'servicebookings',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'services_sevicebookings_c',
      'join_key_lhs' => 'services_sde2fervices_ida',
      'join_key_rhs' => 'services_sb358ookings_idb',
    ),
  ),
  'table' => 'services_sevicebookings_c',
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
      'name' => 'services_sde2fervices_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'services_sb358ookings_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'services_servicebookingsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'services_servicebookings_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'services_sde2fervices_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'services_servicebookings_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'services_sb358ookings_idb',
      ),
    ),
  ),
);
?>
