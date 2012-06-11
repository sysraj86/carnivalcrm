<?php
// created: 2011-08-19 10:47:02
$dictionary["tours_billing"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'tours_billing' => 
    array (
      'lhs_module' => 'Tours',
      'lhs_table' => 'tours',
      'lhs_key' => 'id',
      'rhs_module' => 'Billing',
      'rhs_table' => 'billing',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'tours_billing_c',
      'join_key_lhs' => 'tours_bill7148ngtours_ida',
      'join_key_rhs' => 'tours_bill805cbilling_idb',
    ),
  ),
  'table' => 'tours_billing_c',
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
      'name' => 'tours_bill7148ngtours_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'tours_bill805cbilling_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'tours_billingspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'tours_billing_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'tours_bill7148ngtours_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'tours_billing_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'tours_bill805cbilling_idb',
      ),
    ),
  ),
);
?>
