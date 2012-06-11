<?php
// created: 2011-12-14 18:10:08
$dictionary["transports_billing_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'transports_billing_1' => 
    array (
      'lhs_module' => 'Transports',
      'lhs_table' => 'transports',
      'lhs_key' => 'id',
      'rhs_module' => 'Billing',
      'rhs_table' => 'billing',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'transports_billing_1_c',
      'join_key_lhs' => 'transports3b29nsports_ida',
      'join_key_rhs' => 'transports20ffbilling_idb',
    ),
  ),
  'table' => 'transports_billing_1_c',
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
      'name' => 'transports3b29nsports_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'transports20ffbilling_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'transports_billing_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'transports_billing_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'transports3b29nsports_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'transports_billing_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'transports20ffbilling_idb',
      ),
    ),
  ),
);
?>
