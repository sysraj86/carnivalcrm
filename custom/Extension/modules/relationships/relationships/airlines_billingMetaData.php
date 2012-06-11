<?php
// created: 2011-08-19 11:21:27
$dictionary["airlines_billing"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'airlines_billing' => 
    array (
      'lhs_module' => 'Airlines',
      'lhs_table' => 'airlines',
      'lhs_key' => 'id',
      'rhs_module' => 'Billing',
      'rhs_table' => 'billing',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'airlines_billing_c',
      'join_key_lhs' => 'airlines_be4f5irlines_ida',
      'join_key_rhs' => 'airlines_bb713billing_idb',
    ),
  ),
  'table' => 'airlines_billing_c',
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
      'name' => 'airlines_be4f5irlines_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'airlines_bb713billing_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'airlines_billingspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'airlines_billing_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'airlines_be4f5irlines_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'airlines_billing_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'airlines_bb713billing_idb',
      ),
    ),
  ),
);
?>
