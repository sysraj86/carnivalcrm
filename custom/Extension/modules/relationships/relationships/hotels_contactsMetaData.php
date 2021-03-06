<?php
// created: 2011-08-19 11:15:42
$dictionary["hotels_contacts"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'hotels_contacts' => 
    array (
      'lhs_module' => 'Hotels',
      'lhs_table' => 'hotels',
      'lhs_key' => 'id',
      'rhs_module' => 'Contacts',
      'rhs_table' => 'contacts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'hotels_contacts_c',
      'join_key_lhs' => 'hotels_con6414shotels_ida',
      'join_key_rhs' => 'hotels_cona617ontacts_idb',
    ),
  ),
  'table' => 'hotels_contacts_c',
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
      'name' => 'hotels_con6414shotels_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'hotels_cona617ontacts_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'hotels_contactsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'hotels_contacts_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'hotels_con6414shotels_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'hotels_contacts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'hotels_cona617ontacts_idb',
      ),
    ),
  ),
);
?>
