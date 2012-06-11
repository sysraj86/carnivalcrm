<?php
// created: 2011-08-19 10:34:31
$dictionary["visa_Passports"]["fields"]["fits_visa_passports"] = array (
  'name' => 'fits_visa_passports',
  'type' => 'link',
  'relationship' => 'fits_visa_passports',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_VISA_PASSPORTS_FROM_FITS_TITLE',
);
$dictionary["visa_Passports"]["fields"]["fits_visa_passports_name"] = array (
  'name' => 'fits_visa_passports_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_VISA_PASSPORTS_FROM_FITS_TITLE',
  'save' => true,
  'id_name' => 'fits_visa_59bdrtsfits_ida',
  'link' => 'fits_visa_passports',
  'table' => 'fits',
  'module' => 'FITs',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["visa_Passports"]["fields"]["fits_visa_59bdrtsfits_ida"] = array (
  'name' => 'fits_visa_59bdrtsfits_ida',
  'type' => 'link',
  'relationship' => 'fits_visa_passports',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FITS_VISA_PASSPORTS_FROM_VISA_PASSPORTS_TITLE',
);
