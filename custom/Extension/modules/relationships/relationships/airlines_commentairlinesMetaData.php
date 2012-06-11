<?php
// created: 2011-11-21 16:47:46
$dictionary["airlines_commentairlines"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'airlines_commentairlines' => 
    array (
      'lhs_module' => 'Airlines',
      'lhs_table' => 'airlines',
      'lhs_key' => 'id',
      'rhs_module' => 'CommentAirlines',
      'rhs_table' => 'commentairlines',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'airlines_comentairlines_c',
      'join_key_lhs' => 'airlines_ce40dirlines_ida',
      'join_key_rhs' => 'airlines_ce20cirlines_idb',
    ),
  ),
  'table' => 'airlines_comentairlines_c',
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
      'name' => 'airlines_ce40dirlines_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'airlines_ce20cirlines_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'airlines_commentairlinesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'airlines_commentairlines_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'airlines_ce40dirlines_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'airlines_commentairlines_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'airlines_ce20cirlines_idb',
      ),
    ),
  ),
);
?>
