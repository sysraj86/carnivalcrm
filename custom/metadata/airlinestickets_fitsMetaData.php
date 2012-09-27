<?php
// created: 2011-10-01 09:52:14
$dictionary["airlinestickets_fits"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'airlinestickets_fits' => 
    array (
      'lhs_module' => 'AirlinesTickets',
      'lhs_table' => 'airlinestickets',
      'lhs_key' => 'id',
      'rhs_module' => 'FITs',
      'rhs_table' => 'fits',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'airlinestickets_fits_c',
      'join_key_lhs' => 'airlinestia31ctickets_ida',
      'join_key_rhs' => 'airlinestib0dfitsfits_idb',
    ),
  ),
  'table' => 'airlinestickets_fits_c',
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
      'name' => 'airlinestia31ctickets_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'airlinestib0dfitsfits_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'airlinestickets_fitsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'airlinestickets_fits_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'airlinestia31ctickets_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'airlinestickets_fits_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'airlinestib0dfitsfits_idb',
      ),
    ),
  ),
);
?>
