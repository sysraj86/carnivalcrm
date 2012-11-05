<?php
// created: 2012-11-01 15:54:49
$dictionary["contacts_opportunities"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'contacts_opportunities' => 
    array (
      'lhs_module' => 'Contacts',
      'lhs_table' => 'contacts',
      'lhs_key' => 'id',
      'rhs_module' => 'Opportunities',
      'rhs_table' => 'opportunities',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'contacts_opportunities_c',
      'join_key_lhs' => 'contacts_ob501ontacts_ida',
      'join_key_rhs' => 'contacts_o8d6cunities_idb',
    ),
  ),
  'table' => 'contacts_opportunities_c',
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
      'name' => 'contacts_ob501ontacts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'contacts_o8d6cunities_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'contacts_opportunitiesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'contacts_opportunities_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'contacts_ob501ontacts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'contacts_opportunities_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'contacts_o8d6cunities_idb',
      ),
    ),
  ),
);
?>
