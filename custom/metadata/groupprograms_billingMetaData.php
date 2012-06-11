<?php
// created: 2011-08-19 11:00:50

$dictionary["groupprograms_billing"] = array (
  'relationships' => 
  array (
    'groupprograms_billing' => 
    array (
      'lhs_module' => 'GroupPrograms',
      'lhs_table' => 'groupprograms',
      'lhs_key' => 'id',
      'rhs_module' => 'Billing',
      'rhs_table' => 'billing',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'GroupPrograms',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);
/*
$dictionary["groupprograms_billing"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'groupprograms_billing' => 
    array (
      'lhs_module' => 'GroupPrograms',
      'lhs_table' => 'groupprograms',
      'lhs_key' => 'id',
      'rhs_module' => 'Billing',
      'rhs_table' => 'billing',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'GroupPrograms',
    ),
  ),
  'table' => 'groupprograms_billing_c',
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
      'name' => 'groupprogr28ddrograms_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'groupprogrff05billing_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'groupprograms_billingspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'groupprograms_billing_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'groupprogr28ddrograms_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'groupprograms_billing_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'groupprogrff05billing_idb',
      ),
    ),
  ),
);

*/
?>
