<?php
// created: 2011-08-19 16:16:42
$dictionary["countries_destinations"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'countries_destinations' => 
    array (
      'lhs_module' => 'Countries',
      'lhs_table' => 'countries',
      'lhs_key' => 'id',
      'rhs_module' => 'Destinations',
      'rhs_table' => 'destinations',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'countries_destinations_c',
      'join_key_lhs' => 'countries_5a12untries_ida',
      'join_key_rhs' => 'countries_bc13nations_idb',
    ),
  ),
  'table' => 'countries_destinations_c',
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
      'name' => 'countries_5a12untries_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'countries_bc13nations_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'countries_destinationsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'countries_destinations_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'countries_5a12untries_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'countries_destinations_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'countries_bc13nations_idb',
      ),
    ),
  ),
);
?>
