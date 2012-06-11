<?php
// created: 2011-08-24 10:56:49
$dictionary["groupprograms_roombookings"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'groupprograms_roombookings' => 
    array (
      'lhs_module' => 'GroupPrograms',
      'lhs_table' => 'groupprograms',
      'lhs_key' => 'id',
      'rhs_module' => 'RoomBookings',
      'rhs_table' => 'roombookings',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'groupprograroombookings_c',
      'join_key_lhs' => 'groupprogra66erograms_ida',
      'join_key_rhs' => 'groupprogr952fookings_idb',
    ),
  ),
  'table' => 'groupprograroombookings_c',
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
      'name' => 'groupprogra66erograms_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'groupprogr952fookings_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'groupprogras_roombookingsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'groupprogras_roombookings_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'groupprogra66erograms_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'groupprogras_roombookings_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'groupprogr952fookings_idb',
      ),
    ),
  ),
);
?>
