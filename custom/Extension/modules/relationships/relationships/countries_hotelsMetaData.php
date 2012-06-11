<?php
// created: 2011-10-18 18:15:44
$dictionary["countries_hotels"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'countries_hotels' => 
    array (
      'lhs_module' => 'Countries',
      'lhs_table' => 'countries',
      'lhs_key' => 'id',
      'rhs_module' => 'Hotels',
      'rhs_table' => 'hotels',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'countries_hotels_c',
      'join_key_lhs' => 'countries_d511untries_ida',
      'join_key_rhs' => 'countries_97f9shotels_idb',
    ),
  ),
  'table' => 'countries_hotels_c',
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
      'name' => 'countries_d511untries_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'countries_97f9shotels_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'countries_hotelsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'countries_hotels_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'countries_d511untries_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'countries_hotels_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'countries_97f9shotels_idb',
      ),
    ),
  ),
);
?>
