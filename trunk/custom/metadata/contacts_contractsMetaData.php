<?php
// created: 2012-11-12 16:42:17
$dictionary["contacts_contracts"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'contacts_contracts' => 
    array (
      'lhs_module' => 'Contacts',
      'lhs_table' => 'contacts',
      'lhs_key' => 'id',
      'rhs_module' => 'Contracts',
      'rhs_table' => 'contracts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'contacts_contracts_c',
      'join_key_lhs' => 'contacts_c3245ontacts_ida',
      'join_key_rhs' => 'contacts_c2125ntracts_idb',
    ),
  ),
  'table' => 'contacts_contracts_c',
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
      'name' => 'contacts_c3245ontacts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'contacts_c2125ntracts_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'contacts_contractsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'contacts_contracts_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'contacts_c3245ontacts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'contacts_contracts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'contacts_c2125ntracts_idb',
      ),
    ),
  ),
);
?>
