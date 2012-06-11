<?php
// created: 2011-08-17 18:13:33
$dictionary["groupprograms_cases_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'groupprograms_cases_1' => 
    array (
      'lhs_module' => 'GroupPrograms',
      'lhs_table' => 'groupprograms',
      'lhs_key' => 'id',
      'rhs_module' => 'Cases',
      'rhs_table' => 'cases',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'groupprograms_cases_1_c',
      'join_key_lhs' => 'groupprogr9b03rograms_ida',
      'join_key_rhs' => 'groupprogrdf46_1cases_idb',
    ),
  ),
  'table' => 'groupprograms_cases_1_c',
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
      'name' => 'groupprogr9b03rograms_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'groupprogrdf46_1cases_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'groupprograms_cases_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'groupprograms_cases_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'groupprogr9b03rograms_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'groupprograms_cases_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'groupprogrdf46_1cases_idb',
      ),
    ),
  ),
);
?>
