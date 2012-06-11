<?php
// created: 2011-12-14 17:44:23
$dictionary["billing_transports"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'billing_transports' => 
    array (
      'lhs_module' => 'Billing',
      'lhs_table' => 'billing',
      'lhs_key' => 'id',
      'rhs_module' => 'Transports',
      'rhs_table' => 'transports',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'billing_transports_c',
      'join_key_lhs' => 'billing_trdb38billing_ida',
      'join_key_rhs' => 'billing_tre6bensports_idb',
    ),
  ),
  'table' => 'billing_transports_c',
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
      'name' => 'billing_trdb38billing_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'billing_tre6bensports_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'billing_transportsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'billing_transports_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'billing_trdb38billing_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'billing_transports_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'billing_tre6bensports_idb',
      ),
    ),
  ),
);
?>
