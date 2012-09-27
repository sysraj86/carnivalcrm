<?php
// created: 2011-08-31 11:29:59
$dictionary["groupprograms_airlinestickets"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'groupprograms_airlinestickets' => 
    array (
      'lhs_module' => 'GroupPrograms',
      'lhs_table' => 'groupprograms',
      'lhs_key' => 'id',
      'rhs_module' => 'AirlinesTickets',
      'rhs_table' => 'airlinestickets',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'groupprogralinestickets_c',
      'join_key_lhs' => 'groupprogr0fd9rograms_ida',
      'join_key_rhs' => 'groupprogr8400tickets_idb',
    ),
  ),
  'table' => 'groupprogralinestickets_c',
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
      'name' => 'groupprogr0fd9rograms_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'groupprogr8400tickets_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'groupprograirlinesticketsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'groupprograirlinestickets_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'groupprogr0fd9rograms_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'groupprograirlinestickets_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'groupprogr8400tickets_idb',
      ),
    ),
  ),
);
?>
