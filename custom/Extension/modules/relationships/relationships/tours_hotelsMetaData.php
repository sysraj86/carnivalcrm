<?php
// created: 2011-12-21 08:44:32
$dictionary["tours_hotels"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'tours_hotels' => 
    array (
      'lhs_module' => 'Tours',
      'lhs_table' => 'tours',
      'lhs_key' => 'id',
      'rhs_module' => 'Hotels',
      'rhs_table' => 'hotels',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'tours_hotels_c',
      'join_key_lhs' => 'tours_hote943flstours_ida',
      'join_key_rhs' => 'tours_hote9da4shotels_idb',
    ),
  ),
  'table' => 'tours_hotels_c',
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
      'name' => 'tours_hote943flstours_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'tours_hote9da4shotels_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'tours_hotelsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'tours_hotels_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'tours_hote943flstours_ida',
        1 => 'tours_hote9da4shotels_idb',
      ),
    ),
  ),
);
?>
