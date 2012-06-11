<?php
// created: 2011-10-18 14:28:40
$dictionary["groupprograms_comments"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'groupprograms_comments' => 
    array (
      'lhs_module' => 'GroupPrograms',
      'lhs_table' => 'groupprograms',
      'lhs_key' => 'id',
      'rhs_module' => 'Comments',
      'rhs_table' => 'Comments',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'groupprograms_comments_c',
      'join_key_lhs' => 'groupprogrcc65rograms_ida',
      'join_key_rhs' => 'groupprogr9957omments_idb',
    ),
  ),
  'table' => 'groupprograms_comments_c',
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
      'name' => 'groupprogrcc65rograms_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'groupprogr9957omments_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'groupprograms_commentsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'groupprograms_comments_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'groupprogrcc65rograms_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'groupprograms_comments_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'groupprogr9957omments_idb',
      ),
    ),
  ),
);
?>
