<?php
// created: 2012-02-20 11:40:16
$dictionary["accounts_prospects"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'accounts_prospects' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'Prospects',
      'rhs_table' => 'prospects',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'accounts_prospects_c',
      'join_key_lhs' => 'accounts_p4bcbccounts_ida',
      'join_key_rhs' => 'accounts_pd121ospects_idb',
    ),
  ),
  'table' => 'accounts_prospects_c',
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
      'name' => 'accounts_p4bcbccounts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'accounts_pd121ospects_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'accounts_prospectsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'accounts_prospects_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'accounts_p4bcbccounts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'accounts_prospects_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'accounts_pd121ospects_idb',
      ),
    ),
  ),
);
?>
