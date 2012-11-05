<?php
// created: 2012-11-01 15:45:39
$dictionary["fits_opportunities"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'fits_opportunities' => 
    array (
      'lhs_module' => 'FITs',
      'lhs_table' => 'fits',
      'lhs_key' => 'id',
      'rhs_module' => 'Opportunities',
      'rhs_table' => 'opportunities',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'fits_opportunities_c',
      'join_key_lhs' => 'fits_oppor18f3iesfits_ida',
      'join_key_rhs' => 'fits_opporae03unities_idb',
    ),
  ),
  'table' => 'fits_opportunities_c',
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
      'name' => 'fits_oppor18f3iesfits_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'fits_opporae03unities_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'fits_opportunitiesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'fits_opportunities_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'fits_oppor18f3iesfits_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'fits_opportunities_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'fits_opporae03unities_idb',
      ),
    ),
  ),
);
?>
