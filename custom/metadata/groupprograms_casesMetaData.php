<?php
// created: 2011-08-19 10:58:01
$dictionary["groupprograms_cases"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'groupprograms_cases' => 
    array (
      'lhs_module' => 'GroupPrograms',
      'lhs_table' => 'groupprograms',
      'lhs_key' => 'id',
      'rhs_module' => 'Cases',
      'rhs_table' => 'cases',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'groupprograms_cases_c',
      'join_key_lhs' => 'groupprogr446brograms_ida',
      'join_key_rhs' => 'groupprogrfbcdescases_idb',
    ),
  ),
  'table' => 'groupprograms_cases_c',
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
      'name' => 'groupprogr446brograms_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'groupprogrfbcdescases_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'groupprograms_casesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'groupprograms_cases_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'groupprogr446brograms_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'groupprograms_cases_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'groupprogrfbcdescases_idb',
      ),
    ),
  ),
);
?>
