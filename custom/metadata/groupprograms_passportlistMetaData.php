<?php
// created: 2011-08-22 17:06:06
$dictionary["groupprograms_passportlist"] = array (
  'true_relationship_type' => 'one-to-one',
  'from_studio' => true,
  'relationships' => 
  array (
    'groupprograms_passportlist' => 
    array (
      'lhs_module' => 'GroupPrograms',
      'lhs_table' => 'groupprograms',
      'lhs_key' => 'id',
      'rhs_module' => 'PassportList',
      'rhs_table' => 'PassportList',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'groupprograpassportlist_c',
      'join_key_lhs' => 'groupprogr20c9rograms_ida',
      'join_key_rhs' => 'groupprogrc66dortlist_idb',
    ),
  ),
  'table' => 'groupprograpassportlist_c',
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
      'name' => 'groupprogr20c9rograms_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'groupprogrc66dortlist_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'groupprogras_passportlistspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'groupprogras_passportlist_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'groupprogr20c9rograms_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'groupprogras_passportlist_idb2',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'groupprogrc66dortlist_idb',
      ),
    ),
  ),
);
?>
