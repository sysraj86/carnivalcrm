<?php
// created: 2011-09-06 11:38:05
$dictionary["contacts_quotes"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'contacts_quotes' => 
    array (
      'lhs_module' => 'Contacts',
      'lhs_table' => 'contacts',
      'lhs_key' => 'id',
      'rhs_module' => 'Quotes',
      'rhs_table' => 'quotes',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'contacts_quotes_c',
      'join_key_lhs' => 'contacts_q33a7ontacts_ida',
      'join_key_rhs' => 'contacts_q8dd9squotes_idb',
    ),
  ),
  'table' => 'contacts_quotes_c',
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
      'name' => 'contacts_q33a7ontacts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'contacts_q8dd9squotes_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'contacts_quotesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'contacts_quotes_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'contacts_q33a7ontacts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'contacts_quotes_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'contacts_q8dd9squotes_idb',
      ),
    ),
  ),
);
?>
