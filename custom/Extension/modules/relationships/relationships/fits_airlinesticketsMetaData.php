<?php
// created: 2011-08-31 11:31:09
$dictionary["fits_airlinestickets"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'fits_airlinestickets' => 
    array (
      'lhs_module' => 'FITs',
      'lhs_table' => 'fits',
      'lhs_key' => 'id',
      'rhs_module' => 'AirlinesTickets',
      'rhs_table' => 'AirlinesTickets',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'fits_airlinestickets_c',
      'join_key_lhs' => 'fits_airli3e39etsfits_ida',
      'join_key_rhs' => 'fits_airli790ctickets_idb',
    ),
  ),
  'table' => 'fits_airlinestickets_c',
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
      'name' => 'fits_airli3e39etsfits_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'fits_airli790ctickets_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'fits_airlinesticketsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'fits_airlinestickets_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'fits_airli3e39etsfits_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'fits_airlinestickets_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'fits_airli790ctickets_idb',
      ),
    ),
  ),
);
?>
