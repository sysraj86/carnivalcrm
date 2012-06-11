<?php
// created: 2011-10-26 10:56:10
$dictionary["countries_transports"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'countries_transports' => 
    array (
      'lhs_module' => 'Countries',
      'lhs_table' => 'countries',
      'lhs_key' => 'id',
      'rhs_module' => 'Transports',
      'rhs_table' => 'transports',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'countries_transports_c',
      'join_key_lhs' => 'countries_f24buntries_ida',
      'join_key_rhs' => 'countries_0579nsports_idb',
    ),
  ),
  'table' => 'countries_transports_c',
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
      'name' => 'countries_f24buntries_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'countries_0579nsports_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'countries_transportsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'countries_transports_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'countries_f24buntries_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'countries_transports_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'countries_0579nsports_idb',
      ),
    ),
  ),
);
?>
