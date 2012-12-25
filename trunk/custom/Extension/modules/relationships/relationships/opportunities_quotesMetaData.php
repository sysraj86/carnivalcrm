<?php
// created: 2012-12-22 12:23:37
$dictionary["opportunities_quotes"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'opportunities_quotes' => 
    array (
      'lhs_module' => 'Opportunities',
      'lhs_table' => 'opportunities',
      'lhs_key' => 'id',
      'rhs_module' => 'Quotes',
      'rhs_table' => 'quotes',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'opportunities_quotes_c',
      'join_key_lhs' => 'opportunit9b76unities_ida',
      'join_key_rhs' => 'opportunit84e4squotes_idb',
    ),
  ),
  'table' => 'opportunities_quotes_c',
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
      'name' => 'opportunit9b76unities_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'opportunit84e4squotes_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'opportunities_quotesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'opportunities_quotes_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'opportunit9b76unities_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'opportunities_quotes_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'opportunit84e4squotes_idb',
      ),
    ),
  ),
);
?>
