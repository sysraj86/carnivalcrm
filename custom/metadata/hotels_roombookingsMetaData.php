<?php
// created: 2011-08-24 10:09:40
$dictionary["hotels_roombookings"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'hotels_roombookings' => 
    array (
      'lhs_module' => 'Hotels',
      'lhs_table' => 'hotels',
      'lhs_key' => 'id',
      'rhs_module' => 'RoomBookings',
      'rhs_table' => 'roombookings',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'hotels_roombookings_c',
      'join_key_lhs' => 'hotels_rooc622shotels_ida',
      'join_key_rhs' => 'hotels_rooc1a7ookings_idb',
    ),
  ),
  'table' => 'hotels_roombookings_c',
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
      'name' => 'hotels_rooc622shotels_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'hotels_rooc1a7ookings_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'hotels_roombookingsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'hotels_roombookings_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'hotels_rooc622shotels_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'hotels_roombookings_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'hotels_rooc1a7ookings_idb',
      ),
    ),
  ),
);
?>
