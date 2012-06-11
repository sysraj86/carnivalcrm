<?php
// created: 2011-11-11 22:50:07
$dictionary["fits_cases"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'fits_cases' => 
    array (
      'lhs_module' => 'FITs',
      'lhs_table' => 'fits',
      'lhs_key' => 'id',
      'rhs_module' => 'Cases',
      'rhs_table' => 'cases',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'fits_cases_c',
      'join_key_lhs' => 'fits_cases9412sesfits_ida',
      'join_key_rhs' => 'fits_casescdebescases_idb',
    ),
  ),
  'table' => 'fits_cases_c',
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
      'name' => 'fits_cases9412sesfits_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'fits_casescdebescases_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'fits_casesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'fits_cases_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'fits_cases9412sesfits_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'fits_cases_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'fits_casescdebescases_idb',
      ),
    ),
  ),
);
?>
