<?php
// created: 2012-02-18 11:07:24
$dictionary["countries_services"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'countries_services' => 
    array (
      'lhs_module' => 'Countries',
      'lhs_table' => 'countries',
      'lhs_key' => 'id',
      'rhs_module' => 'Services',
      'rhs_table' => 'services',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'countries_services_c',
      'join_key_lhs' => 'countries_22abuntries_ida',
      'join_key_rhs' => 'countries_6accervices_idb',
    ),
  ),
  'table' => 'countries_services_c',
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
      'name' => 'countries_22abuntries_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'countries_6accervices_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'countries_servicesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'countries_services_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'countries_22abuntries_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'countries_services_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'countries_6accervices_idb',
      ),
    ),
  ),
);
?>
