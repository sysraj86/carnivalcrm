<?php
// created: 2012-06-15 16:58:50
$dictionary["c_areas_countries"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'c_areas_countries' => 
    array (
      'lhs_module' => 'Countries',
      'lhs_table' => 'countries',
      'lhs_key' => 'id',
      'rhs_module' => 'C_Areas',
      'rhs_table' => 'c_areas',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'c_areas_countries_c',
      'join_key_lhs' => 'c_areas_cobbabuntries_ida',
      'join_key_rhs' => 'c_areas_co30d8c_areas_idb',
    ),
  ),
  'table' => 'c_areas_countries_c',
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
      'name' => 'c_areas_cobbabuntries_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'c_areas_co30d8c_areas_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'c_areas_countriesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'c_areas_countries_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'c_areas_cobbabuntries_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'c_areas_countries_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'c_areas_co30d8c_areas_idb',
      ),
    ),
  ),
);
?>
