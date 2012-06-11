<?php
// created: 2011-09-06 11:46:30
$dictionary["quotes_oders"] = array (
  'true_relationship_type' => 'one-to-one',
  'from_studio' => true,
  'relationships' => 
  array (
    'quotes_oders' => 
    array (
      'lhs_module' => 'Quotes',
      'lhs_table' => 'quotes',
      'lhs_key' => 'id',
      'rhs_module' => 'Oders',
      'rhs_table' => 'oders',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'quotes_oders_c',
      'join_key_lhs' => 'quotes_oded7c9squotes_ida',
      'join_key_rhs' => 'quotes_odec393rsoders_idb',
    ),
  ),
  'table' => 'quotes_oders_c',
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
      'name' => 'quotes_oded7c9squotes_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'quotes_odec393rsoders_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'quotes_odersspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'quotes_oders_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'quotes_oded7c9squotes_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'quotes_oders_idb2',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'quotes_odec393rsoders_idb',
      ),
    ),
  ),
);
?>
