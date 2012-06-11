<?php
// created: 2011-10-26 00:43:22
$dictionary["Oder"]["fields"]["fits_oders"] = array (
  'name' => 'fits_oders',
  'type' => 'link',
  'relationship' => 'fits_oders',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_ODERS_FROM_FITS_TITLE',
);
$dictionary["Oder"]["fields"]["fits_oders_name"] = array (
  'name' => 'fits_oders_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_ODERS_FROM_FITS_TITLE',
  'save' => true,
  'id_name' => 'fits_oders2a96ersfits_ida',
  'link' => 'fits_oders',
  'table' => 'fits',
  'module' => 'FITs',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Oder"]["fields"]["fits_oders2a96ersfits_ida"] = array (
  'name' => 'fits_oders2a96ersfits_ida',
  'type' => 'link',
  'relationship' => 'fits_oders',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FITS_ODERS_FROM_ODERS_TITLE',
);
