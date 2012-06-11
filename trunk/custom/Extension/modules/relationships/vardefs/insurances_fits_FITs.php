<?php
// created: 2011-08-23 11:27:26
$dictionary["FITs"]["fields"]["insurances_fits"] = array (
  'name' => 'insurances_fits',
  'type' => 'link',
  'relationship' => 'insurances_fits',
  'source' => 'non-db',
  'vname' => 'LBL_INSURANCES_FITS_FROM_INSURANCES_TITLE',
);
$dictionary["FITs"]["fields"]["insurances_fits_name"] = array (
  'name' => 'insurances_fits_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_INSURANCES_FITS_FROM_INSURANCES_TITLE',
  'save' => true,
  'id_name' => 'insurances87aeurances_ida',
  'link' => 'insurances_fits',
  'table' => 'insurances',
  'module' => 'Insurances',
  'rname' => 'name',
);
$dictionary["FITs"]["fields"]["insurances87aeurances_ida"] = array (
  'name' => 'insurances87aeurances_ida',
  'type' => 'link',
  'relationship' => 'insurances_fits',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_INSURANCES_FITS_FROM_FITS_TITLE',
);
