<?php
// created: 2011-11-21 16:43:46
$dictionary["fits_commentairlines"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'fits_commentairlines' => 
    array (
      'lhs_module' => 'FITs',
      'lhs_table' => 'fits',
      'lhs_key' => 'id',
      'rhs_module' => 'CommentAirlines',
      'rhs_table' => 'commentairlines',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'fits_commentairlines_c',
      'join_key_lhs' => 'fits_comme89bfnesfits_ida',
      'join_key_rhs' => 'fits_comme5bf5irlines_idb',
    ),
  ),
  'table' => 'fits_commentairlines_c',
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
      'name' => 'fits_comme89bfnesfits_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'fits_comme5bf5irlines_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'fits_commentairlinesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'fits_commentairlines_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'fits_comme89bfnesfits_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'fits_commentairlines_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'fits_comme5bf5irlines_idb',
      ),
    ),
  ),
);
?>
