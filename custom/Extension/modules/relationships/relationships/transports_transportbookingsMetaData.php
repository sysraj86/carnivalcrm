<?php
// created: 2011-09-10 08:39:23
$dictionary["transports_transportbookings"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'transports_transportbookings' => 
    array (
      'lhs_module' => 'Transports',
      'lhs_table' => 'transports',
      'lhs_key' => 'id',
      'rhs_module' => 'TransportBookings',
      'rhs_table' => 'TransportBookings',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'transports_portbookings_c',
      'join_key_lhs' => 'transports6e65nsports_ida',
      'join_key_rhs' => 'transportsc2aeookings_idb',
    ),
  ),
  'table' => 'transports_portbookings_c',
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
      'name' => 'transports6e65nsports_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'transportsc2aeookings_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'transports_nsportbookingsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'transports_nsportbookings_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'transports6e65nsports_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'transports_nsportbookings_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'transportsc2aeookings_idb',
      ),
    ),
  ),
);
?>
