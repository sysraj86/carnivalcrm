<?php
// created: 2011-08-24 10:58:19
$dictionary["groupprograms_servicebookings"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'groupprograms_servicebookings' => 
    array (
      'lhs_module' => 'GroupPrograms',
      'lhs_table' => 'groupprograms',
      'lhs_key' => 'id',
      'rhs_module' => 'ServiceBookings',
      'rhs_table' => 'servicebookings',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'groupprogravicebookings_c',
      'join_key_lhs' => 'groupprogr0d2frograms_ida',
      'join_key_rhs' => 'groupprogrf47aookings_idb',
    ),
  ),
  'table' => 'groupprogravicebookings_c',
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
      'name' => 'groupprogr0d2frograms_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'groupprogrf47aookings_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'groupprograervicebookingsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'groupprograervicebookings_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'groupprogr0d2frograms_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'groupprograervicebookings_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'groupprogrf47aookings_idb',
      ),
    ),
  ),
);
?>
