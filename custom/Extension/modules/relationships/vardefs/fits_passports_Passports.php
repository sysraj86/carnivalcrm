<?php
// created: 2011-08-19 15:05:02
$dictionary["Passports"]["fields"]["fits_passports"] = array (
  'name' => 'fits_passports',
  'type' => 'link',
  'relationship' => 'fits_passports',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_PASSPORTS_FROM_FITS_TITLE',
);
$dictionary["Passports"]["fields"]["fits_passports_name"] = array (
  'name' => 'fits_passports_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_PASSPORTS_FROM_FITS_TITLE',
  'save' => true,
  'id_name' => 'fits_passpf308rtsfits_ida',
  'link' => 'fits_passports',
  'table' => 'fits',
  'module' => 'FITs',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Passports"]["fields"]["fits_passpf308rtsfits_ida"] = array (
  'name' => 'fits_passpf308rtsfits_ida',
  'type' => 'link',
  'relationship' => 'fits_passports',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FITS_PASSPORTS_FROM_PASSPORTS_TITLE',
);
