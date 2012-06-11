<?php
// created: 2011-12-12 15:39:14
$dictionary["tours_destinations"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'tours_destinations' => 
    array (
      'lhs_module' => 'Tours',
      'lhs_table' => 'tours',
      'lhs_key' => 'id',
      'rhs_module' => 'Destinations',
      'rhs_table' => 'destinations',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'tours_destinations_c',
      'join_key_lhs' => 'tours_dest10d5nstours_ida',
      'join_key_rhs' => 'tours_destecacnations_idb',
    ),
  ),
  'table' => 'tours_destinations_c',
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
      'name' => 'tours_dest10d5nstours_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'tours_destecacnations_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'tours_destinationsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'tours_destinations_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'tours_dest10d5nstours_ida',
        1 => 'tours_destecacnations_idb',
      ),
    ),
  ),
);
?>
