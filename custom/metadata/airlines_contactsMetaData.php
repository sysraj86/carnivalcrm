<?php
// created: 2011-08-19 11:22:38

$dictionary["airlines_contacts"] = array (
  'relationships' => 
  array (
    'airlines_contacts' => 
    array (
      'lhs_module' => 'Airlines',
      'lhs_table' => 'airlines',
      'lhs_key' => 'id',
      'rhs_module' => 'Contacts',
      'rhs_table' => 'contacts',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Airlines',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);

/*
$dictionary["airlines_contacts"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'airlines_contacts' => 
    array (
      'lhs_module' => 'Airlines',
      'lhs_table' => 'airlines',
      'lhs_key' => 'id',
      'rhs_module' => 'Contacts',
      'rhs_table' => 'contacts',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Contacts',
    ),
  ),
  'table' => 'airlines_contacts_c',
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
      'name' => 'airlines_c7d68irlines_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'airlines_c6901ontacts_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'airlines_contactsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'airlines_contacts_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'airlines_c7d68irlines_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'airlines_contacts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'airlines_c6901ontacts_idb',
      ),
    ),
  ),
);

*/
?>
