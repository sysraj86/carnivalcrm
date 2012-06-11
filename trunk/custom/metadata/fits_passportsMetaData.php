<?php
// created: 2011-08-19 15:05:02
$dictionary["fits_passports"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'fits_passports' => 
    array (
      'lhs_module' => 'FITs',
      'lhs_table' => 'fits',
      'lhs_key' => 'id',
      'rhs_module' => 'Passports',
      'rhs_table' => 'passports',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'fits_passports_c',
      'join_key_lhs' => 'fits_passpf308rtsfits_ida',
      'join_key_rhs' => 'fits_passp3611ssports_idb',
    ),
  ),
  'table' => 'fits_passports_c',
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
      'name' => 'fits_passpf308rtsfits_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'fits_passp3611ssports_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'fits_passportsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'fits_passports_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'fits_passpf308rtsfits_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'fits_passports_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'fits_passp3611ssports_idb',
      ),
    ),
  ),
);
?>
