<?php
// created: 2011-09-13 14:15:20
$dictionary["grouplists_groupprograms"] = array (
  'true_relationship_type' => 'one-to-one',
  'from_studio' => true,
  'relationships' => 
  array (
    'grouplists_groupprograms' => 
    array (
      'lhs_module' => 'GroupLists',
      'lhs_table' => 'grouplists',
      'lhs_key' => 'id',
      'rhs_module' => 'GroupPrograms',
      'rhs_table' => 'groupprograms',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'grouplists_roupprograms_c',
      'join_key_lhs' => 'grouplists87eduplists_ida',
      'join_key_rhs' => 'grouplistsf242rograms_idb',
    ),
  ),
  'table' => 'grouplists_roupprograms_c',
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
      'name' => 'grouplists87eduplists_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'grouplistsf242rograms_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'grouplists_groupprogramsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'grouplists_groupprograms_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'grouplists87eduplists_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'grouplists_groupprograms_idb2',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'grouplistsf242rograms_idb',
      ),
    ),
  ),
);
?>
