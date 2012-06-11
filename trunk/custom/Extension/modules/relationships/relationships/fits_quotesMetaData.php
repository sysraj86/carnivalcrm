<?php
// created: 2011-09-20 09:12:33
$dictionary["fits_quotes"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'fits_quotes' => 
    array (
      'lhs_module' => 'FITs',
      'lhs_table' => 'fits',
      'lhs_key' => 'id',
      'rhs_module' => 'Quotes',
      'rhs_table' => 'quotes',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'fits_quotes_c',
      'join_key_lhs' => 'fits_quotedcbetesfits_ida',
      'join_key_rhs' => 'fits_quote8d28squotes_idb',
    ),
  ),
  'table' => 'fits_quotes_c',
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
      'name' => 'fits_quotedcbetesfits_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'fits_quote8d28squotes_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'fits_quotesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'fits_quotes_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'fits_quotedcbetesfits_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'fits_quotes_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'fits_quote8d28squotes_idb',
      ),
    ),
  ),
);
?>
