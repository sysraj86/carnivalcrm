<?php
// created: 2012-10-26 19:00:56
$dictionary["prospectlists_fits"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'prospectlists_fits' => 
    array (
      'lhs_module' => 'ProspectLists',
      'lhs_table' => 'prospect_lists',
      'lhs_key' => 'id',
      'rhs_module' => 'FITs',
      'rhs_table' => 'fits',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'prospectlists_fits_c',
      'join_key_lhs' => 'prospectli3a05ctlists_ida',
      'join_key_rhs' => 'prospectlif349itsfits_idb',
    ),
  ),
  'table' => 'prospectlists_fits_c',
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
      'name' => 'prospectli3a05ctlists_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'prospectlif349itsfits_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'prospectlists_fitsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'prospectlists_fits_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'prospectli3a05ctlists_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'prospectlists_fits_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'prospectlif349itsfits_idb',
      ),
    ),
  ),
);
?>
