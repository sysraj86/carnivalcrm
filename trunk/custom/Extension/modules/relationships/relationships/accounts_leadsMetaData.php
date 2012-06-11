<?php
// created: 2012-02-20 11:43:35
$dictionary["accounts_leads"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'accounts_leads' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'Leads',
      'rhs_table' => 'leads',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'accounts_leads_c',
      'join_key_lhs' => 'accounts_l777cccounts_ida',
      'join_key_rhs' => 'accounts_l1b81dsleads_idb',
    ),
  ),
  'table' => 'accounts_leads_c',
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
      'name' => 'accounts_l777cccounts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'accounts_l1b81dsleads_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'accounts_leadsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'accounts_leads_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'accounts_l777cccounts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'accounts_leads_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'accounts_l1b81dsleads_idb',
      ),
    ),
  ),
);
?>
