<?php
// created: 2011-09-13 11:54:59
$dictionary["groupprograms_grouplists"] = array (
  'true_relationship_type' => 'one-to-one',
  'from_studio' => true,
  'relationships' => 
  array (
    'groupprograms_grouplists' => 
    array (
      'lhs_module' => 'GroupPrograms',
      'lhs_table' => 'groupprograms',
      'lhs_key' => 'id',
      'rhs_module' => 'GroupLists',
      'rhs_table' => 'grouplists',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'groupprogras_grouplists_c',
      'join_key_lhs' => 'groupprogr019frograms_ida',
      'join_key_rhs' => 'groupprogr9ea5uplists_idb',
    ),
  ),
  'table' => 'groupprogras_grouplists_c',
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
      'name' => 'groupprogr019frograms_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'groupprogr9ea5uplists_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'groupprograms_grouplistsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'groupprograms_grouplists_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'groupprogr019frograms_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'groupprograms_grouplists_idb2',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'groupprogr9ea5uplists_idb',
      ),
    ),
  ),
);
?>
