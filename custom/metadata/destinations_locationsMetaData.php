<?php
// created: 2011-08-19 16:15:29
$dictionary["destinations_locations"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'destinations_locations' => 
    array (
      'lhs_module' => 'Destinations',
      'lhs_table' => 'destinations',
      'lhs_key' => 'id',
      'rhs_module' => 'Locations',
      'rhs_table' => 'locations',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'destinations_locations_c',
      'join_key_lhs' => 'destinatio010enations_ida',
      'join_key_rhs' => 'destinatio2a7dcations_idb',
    ),
  ),
  'table' => 'destinations_locations_c',
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
      'name' => 'destinatio010enations_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'destinatio2a7dcations_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'destinations_locationsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'destinations_locations_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'destinatio010enations_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'destinations_locations_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'destinatio2a7dcations_idb',
      ),
    ),
  ),
);
?>
