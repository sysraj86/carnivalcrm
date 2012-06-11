<?php
// created: 2011-10-26 10:52:09
$dictionary["destinations_transports"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'destinations_transports' => 
    array (
      'lhs_module' => 'Destinations',
      'lhs_table' => 'destinations',
      'lhs_key' => 'id',
      'rhs_module' => 'Transports',
      'rhs_table' => 'transports',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'destinations_transports_c',
      'join_key_lhs' => 'destinatio458bnations_ida',
      'join_key_rhs' => 'destinatio9d10nsports_idb',
    ),
  ),
  'table' => 'destinations_transports_c',
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
      'name' => 'destinatio458bnations_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'destinatio9d10nsports_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'destinations_transportsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'destinations_transports_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'destinatio458bnations_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'destinations_transports_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'destinatio9d10nsports_idb',
      ),
    ),
  ),
);
?>
