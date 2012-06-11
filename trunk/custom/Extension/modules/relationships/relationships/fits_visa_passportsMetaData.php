<?php
// created: 2011-08-19 10:34:31
$dictionary["fits_visa_passports"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'fits_visa_passports' => 
    array (
      'lhs_module' => 'FITs',
      'lhs_table' => 'fits',
      'lhs_key' => 'id',
      'rhs_module' => 'visa_Passports',
      'rhs_table' => 'visa_passports',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'fits_visa_passports_c',
      'join_key_lhs' => 'fits_visa_59bdrtsfits_ida',
      'join_key_rhs' => 'fits_visa_089bssports_idb',
    ),
  ),
  'table' => 'fits_visa_passports_c',
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
      'name' => 'fits_visa_59bdrtsfits_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'fits_visa_089bssports_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'fits_visa_passportsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'fits_visa_passports_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'fits_visa_59bdrtsfits_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'fits_visa_passports_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'fits_visa_089bssports_idb',
      ),
    ),
  ),
);
?>
