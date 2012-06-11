<?php
// created: 2011-08-22 10:53:04
$dictionary["grouplists_fits"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'grouplists_fits' => 
    array (
      'lhs_module' => 'GroupLists',
      'lhs_table' => 'grouplists',
      'lhs_key' => 'id',
      'rhs_module' => 'FITs',
      'rhs_table' => 'fits',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'grouplists_fits_c',
      'join_key_lhs' => 'grouplistsd262uplists_ida',
      'join_key_rhs' => 'grouplists4843itsfits_idb',
    ),
  ),
  'table' => 'grouplists_fits_c',
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
      'name' => 'grouplistsd262uplists_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'grouplists4843itsfits_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'grouplists_fitsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'grouplists_fits_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'grouplistsd262uplists_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'grouplists_fits_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'grouplists4843itsfits_idb',
      ),
    ),
  ),
);
?>
