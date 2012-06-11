<?php
// created: 2011-08-22 11:02:04
$dictionary["grouplists_accounts"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'grouplists_accounts' => 
    array (
      'lhs_module' => 'GroupLists',
      'lhs_table' => 'grouplists',
      'lhs_key' => 'id',
      'rhs_module' => 'Accounts',
      'rhs_table' => 'accounts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'grouplists_accounts_c',
      'join_key_lhs' => 'grouplists228auplists_ida',
      'join_key_rhs' => 'grouplistsa472ccounts_idb',
    ),
  ),
  'table' => 'grouplists_accounts_c',
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
      'name' => 'grouplists228auplists_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'grouplistsa472ccounts_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'grouplists_accountsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'grouplists_accounts_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'grouplists228auplists_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'grouplists_accounts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'grouplistsa472ccounts_idb',
      ),
    ),
  ),
);
?>
