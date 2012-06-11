<?php
// created: 2011-08-19 11:06:05
$dictionary["restaurants_billing"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'restaurants_billing' => 
    array (
      'lhs_module' => 'Restaurants',
      'lhs_table' => 'restaurants',
      'lhs_key' => 'id',
      'rhs_module' => 'Billing',
      'rhs_table' => 'billing',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'restaurants_billing_c',
      'join_key_lhs' => 'restaurantcc72aurants_ida',
      'join_key_rhs' => 'restaurante100billing_idb',
    ),
  ),
  'table' => 'restaurants_billing_c',
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
      'name' => 'restaurantcc72aurants_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'restaurante100billing_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'restaurants_billingspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'restaurants_billing_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'restaurantcc72aurants_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'restaurants_billing_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'restaurante100billing_idb',
      ),
    ),
  ),
);
?>
