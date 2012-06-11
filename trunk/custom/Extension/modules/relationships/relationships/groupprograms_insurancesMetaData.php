<?php
// created: 2011-08-23 11:28:48
$dictionary["groupprograms_insurances"] = array (
  'true_relationship_type' => 'one-to-one',
  'from_studio' => true,
  'relationships' => 
  array (
    'groupprograms_insurances' => 
    array (
      'lhs_module' => 'GroupPrograms',
      'lhs_table' => 'groupprograms',
      'lhs_key' => 'id',
      'rhs_module' => 'Insurances',
      'rhs_table' => 'insurances',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'groupprogras_insurances_c',
      'join_key_lhs' => 'groupprogr3b48rograms_ida',
      'join_key_rhs' => 'groupprogr5003urances_idb',
    ),
  ),
  'table' => 'groupprogras_insurances_c',
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
      'name' => 'groupprogr3b48rograms_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'groupprogr5003urances_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'groupprograms_insurancesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'groupprograms_insurances_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'groupprogr3b48rograms_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'groupprograms_insurances_idb2',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'groupprogr5003urances_idb',
      ),
    ),
  ),
);
?>
