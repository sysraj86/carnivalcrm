<?php
// created: 2011-11-01 09:19:33
$dictionary["services_contacts"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'services_contacts' => 
    array (
      'lhs_module' => 'Services',
      'lhs_table' => 'services',
      'lhs_key' => 'id',
      'rhs_module' => 'Contacts',
      'rhs_table' => 'contacts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'services_contacts_c',
      'join_key_lhs' => 'services_c22c5ervices_ida',
      'join_key_rhs' => 'services_c2bcaontacts_idb',
    ),
  ),
  'table' => 'services_contacts_c',
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
      'name' => 'services_c22c5ervices_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'services_c2bcaontacts_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'services_contactsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'services_contacts_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'services_c22c5ervices_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'services_contacts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'services_c2bcaontacts_idb',
      ),
    ),
  ),
);
?>
