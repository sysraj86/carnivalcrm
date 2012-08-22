<?php
// created: 2012-08-22 10:31:18
$dictionary["countries_c_areas"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'countries_c_areas' => 
    array (
      'lhs_module' => 'Countries',
      'lhs_table' => 'countries',
      'lhs_key' => 'id',
      'rhs_module' => 'C_Areas',
      'rhs_table' => 'c_areas',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'countries_c_areas_c',
      'join_key_lhs' => 'countries_f060untries_ida',
      'join_key_rhs' => 'countries_92a9c_areas_idb',
    ),
  ),
  'table' => 'countries_c_areas_c',
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
      'name' => 'countries_f060untries_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'countries_92a9c_areas_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'countries_c_areasspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'countries_c_areas_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'countries_f060untries_ida',
        1 => 'countries_92a9c_areas_idb',
      ),
    ),
  ),
);
?>
