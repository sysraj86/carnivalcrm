<?php
// created: 2011-12-14 18:12:44

$dictionary["travelguides_billing"] = array (
  'relationships' => 
  array (
    'travelguides_billing' => 
    array (
      'lhs_module' => 'TravelGuides',
      'lhs_table' => 'travelguides',
      'lhs_key' => 'id',
      'rhs_module' => 'Billing',
      'rhs_table' => 'billing',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'TravelGuides',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);

/*
$dictionary["travelguides_billing"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'travelguides_billing' => 
    array (
      'lhs_module' => 'TravelGuides',
      'lhs_table' => 'travelguides',
      'lhs_key' => 'id',
      'rhs_module' => 'Billing',
      'rhs_table' => 'billing',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'TravelGuides',
    ),
  ),
  'table' => 'travelguides_billing_c',
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
      'name' => 'travelguidac2dlguides_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'travelguid4e19billing_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'travelguides_billingspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'travelguides_billing_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'travelguidac2dlguides_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'travelguides_billing_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'travelguid4e19billing_idb',
      ),
    ),
  ),
);

*/
?>
