<?php
// created: 2011-08-22 10:36:35
$dictionary["FITs"]["fields"]["fits_fits"] = array (
  'name' => 'fits_fits',
  'type' => 'link',
  'relationship' => 'fits_fits',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_FITS_FROM_FITS_L_TITLE',
);
$dictionary["FITs"]["fields"]["fits_fits_name"] = array (
  'name' => 'fits_fits_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_FITS_FROM_FITS_L_TITLE',
  'save' => true,
  'id_name' => 'fits_fitsfbaacitsfits_ida',
  'link' => 'fits_fits',
  'table' => 'fits',
  'module' => 'FITs',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["FITs"]["fields"]["fits_fitsfbaacitsfits_ida"] = array (
  'name' => 'fits_fitsfbaacitsfits_ida',
  'type' => 'link',
  'relationship' => 'fits_fits',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FITS_FITS_FROM_FITS_R_TITLE',
);
