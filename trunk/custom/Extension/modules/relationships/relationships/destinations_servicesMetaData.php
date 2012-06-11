<?php
// created: 2011-11-01 14:20:09
$dictionary["destinations_services"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'destinations_services' => 
    array (
      'lhs_module' => 'Destinations',
      'lhs_table' => 'destinations',
      'lhs_key' => 'id',
      'rhs_module' => 'Services',
      'rhs_table' => 'services',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'destinations_services_c',
      'join_key_lhs' => 'destinatioe07anations_ida',
      'join_key_rhs' => 'destinatio5cc6ervices_idb',
    ),
  ),
  'table' => 'destinations_services_c',
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
      'name' => 'destinatioe07anations_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'destinatio5cc6ervices_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'destinations_servicesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'destinations_services_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'destinatioe07anations_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'destinations_services_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'destinatio5cc6ervices_idb',
      ),
    ),
  ),
);
?>
