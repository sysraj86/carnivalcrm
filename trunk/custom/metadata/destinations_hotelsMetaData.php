<?php
// created: 2011-10-18 18:10:42
$dictionary["destinations_hotels"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'destinations_hotels' => 
    array (
      'lhs_module' => 'Destinations',
      'lhs_table' => 'destinations',
      'lhs_key' => 'id',
      'rhs_module' => 'Hotels',
      'rhs_table' => 'hotels',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'destinations_hotels_c',
      'join_key_lhs' => 'destinatio6fe0nations_ida',
      'join_key_rhs' => 'destinatiocbebshotels_idb',
    ),
  ),
  'table' => 'destinations_hotels_c',
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
      'name' => 'destinatio6fe0nations_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'destinatiocbebshotels_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'destinations_hotelsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'destinations_hotels_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'destinatio6fe0nations_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'destinations_hotels_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'destinatiocbebshotels_idb',
      ),
    ),
  ),
);
?>
