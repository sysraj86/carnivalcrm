<?php
// created: 2011-08-19 10:30:15
$dictionary["fits_billing"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'fits_billing' => 
    array (
      'lhs_module' => 'FITs',
      'lhs_table' => 'fits',
      'lhs_key' => 'id',
      'rhs_module' => 'Billing',
      'rhs_table' => 'billing',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'fits_billing_c',
      'join_key_lhs' => 'fits_billie73aingfits_ida',
      'join_key_rhs' => 'fits_billi7cd5billing_idb',
    ),
  ),
  'table' => 'fits_billing_c',
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
      'name' => 'fits_billie73aingfits_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'fits_billi7cd5billing_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'fits_billingspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'fits_billing_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'fits_billie73aingfits_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'fits_billing_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'fits_billi7cd5billing_idb',
      ),
    ),
  ),
);
?>
