<?php
// created: 2011-09-10 08:42:47
$dictionary["groupprograms_transportbookings"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'groupprograms_transportbookings' => 
    array (
      'lhs_module' => 'GroupPrograms',
      'lhs_table' => 'groupprograms',
      'lhs_key' => 'id',
      'rhs_module' => 'TransportBookings',
      'rhs_table' => 'transportbookings',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'groupprograportbookings_c',
      'join_key_lhs' => 'groupprogrd5earograms_ida',
      'join_key_rhs' => 'groupprogrdcceookings_idb',
    ),
  ),
  'table' => 'groupprograportbookings_c',
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
      'name' => 'groupprogrd5earograms_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'groupprogrdcceookings_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'groupprogransportbookingsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'groupprogransportbookings_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'groupprogrd5earograms_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'groupprogransportbookings_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'groupprogrdcceookings_idb',
      ),
    ),
  ),
);
?>
