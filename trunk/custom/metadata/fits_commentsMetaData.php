<?php
// created: 2011-10-18 14:57:37
$dictionary["fits_comments"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'fits_comments' => 
    array (
      'lhs_module' => 'FITs',
      'lhs_table' => 'fits',
      'lhs_key' => 'id',
      'rhs_module' => 'Comments',
      'rhs_table' => 'Comments',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'fits_comments_c',
      'join_key_lhs' => 'fits_comme2b2fntsfits_ida',
      'join_key_rhs' => 'fits_comme6b10omments_idb',
    ),
  ),
  'table' => 'fits_comments_c',
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
      'name' => 'fits_comme2b2fntsfits_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'fits_comme6b10omments_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'fits_commentsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'fits_comments_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'fits_comme2b2fntsfits_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'fits_comments_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'fits_comme6b10omments_idb',
      ),
    ),
  ),
);
?>
