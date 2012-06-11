<?php
// created: 2011-09-05 09:11:50
$dictionary["groupprograms_worksheets"] = array (
  'true_relationship_type' => 'one-to-one',
  'from_studio' => true,
  'relationships' => 
  array (
    'groupprograms_worksheets' => 
    array (
      'lhs_module' => 'GroupPrograms',
      'lhs_table' => 'groupprograms',
      'lhs_key' => 'id',
      'rhs_module' => 'Worksheets',
      'rhs_table' => 'worksheets',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'groupprogras_worksheets_c',
      'join_key_lhs' => 'groupprogrd737rograms_ida',
      'join_key_rhs' => 'groupprogr53b5ksheets_idb',
    ),
  ),
  'table' => 'groupprogras_worksheets_c',
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
      'name' => 'groupprogrd737rograms_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'groupprogr53b5ksheets_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'groupprograms_worksheetsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'groupprograms_worksheets_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'groupprogrd737rograms_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'groupprograms_worksheets_idb2',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'groupprogr53b5ksheets_idb',
      ),
    ),
  ),
);
?>
