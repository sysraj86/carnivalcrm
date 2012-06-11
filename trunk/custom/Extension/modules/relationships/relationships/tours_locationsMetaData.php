<?php
// created: 2011-12-12 15:42:52
$dictionary["tours_locations"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'tours_locations' => 
    array (
      'lhs_module' => 'Tours',
      'lhs_table' => 'tours',
      'lhs_key' => 'id',
      'rhs_module' => 'Locations',
      'rhs_table' => 'locations',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'tours_locations_c',
      'join_key_lhs' => 'tours_loca3506nstours_ida',
      'join_key_rhs' => 'tours_loca4b3bcations_idb',
    ),
  ),
  'table' => 'tours_locations_c',
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
      'name' => 'tours_loca3506nstours_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'tours_loca4b3bcations_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'tours_locationsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'tours_locations_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'tours_loca3506nstours_ida',
        1 => 'tours_loca4b3bcations_idb',
      ),
    ),
  ),
);
?>
