<?php
// created: 2011-09-27 09:30:40
$dictionary["transports_contacts"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'transports_contacts' => 
    array (
      'lhs_module' => 'Transports',
      'lhs_table' => 'transports',
      'lhs_key' => 'id',
      'rhs_module' => 'Contacts',
      'rhs_table' => 'contacts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'transports_contacts_c',
      'join_key_lhs' => 'transportsb673nsports_ida',
      'join_key_rhs' => 'transports3ed6ontacts_idb',
    ),
  ),
  'table' => 'transports_contacts_c',
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
      'name' => 'transportsb673nsports_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'transports3ed6ontacts_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'transports_contactsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'transports_contacts_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'transportsb673nsports_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'transports_contacts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'transports3ed6ontacts_idb',
      ),
    ),
  ),
);
?>
