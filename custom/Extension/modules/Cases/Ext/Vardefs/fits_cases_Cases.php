<?php
// created: 2011-11-11 22:50:07
$dictionary["Case"]["fields"]["fits_cases"] = array (
  'name' => 'fits_cases',
  'type' => 'link',
  'relationship' => 'fits_cases',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_CASES_FROM_FITS_TITLE',
);
$dictionary["Case"]["fields"]["fits_cases_name"] = array (
  'name' => 'fits_cases_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_CASES_FROM_FITS_TITLE',
  'save' => true,
  'id_name' => 'fits_cases9412sesfits_ida',
  'link' => 'fits_cases',
  'table' => 'fits',
  'module' => 'FITs',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Case"]["fields"]["fits_cases9412sesfits_ida"] = array (
  'name' => 'fits_cases9412sesfits_ida',
  'type' => 'link',
  'relationship' => 'fits_cases',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FITS_CASES_FROM_CASES_TITLE',
);
