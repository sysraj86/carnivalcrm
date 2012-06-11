<?php
// created: 2011-12-14 18:08:58
$dictionary["transports_billing"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'transports_billing' => 
    array (
      'lhs_module' => 'Transports',
      'lhs_table' => 'transports',
      'lhs_key' => 'id',
      'rhs_module' => 'Billing',
      'rhs_table' => 'billing',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'transports_billing_c',
      'join_key_lhs' => 'transports7779nsports_ida',
      'join_key_rhs' => 'transports4794billing_idb',
    ),
  ),
  'table' => 'transports_billing_c',
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
      'name' => 'transports7779nsports_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'transports4794billing_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'transports_billingspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'transports_billing_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'transports7779nsports_ida',
        1 => 'transports4794billing_idb',
      ),
    ),
  ),
);
?>
