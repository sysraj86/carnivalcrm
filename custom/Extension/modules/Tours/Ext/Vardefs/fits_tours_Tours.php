<?php
// created: 2011-08-19 10:28:21
$dictionary["Tour"]["fields"]["fits_tours"] = array (
  'name' => 'fits_tours',
  'type' => 'link',
  'relationship' => 'fits_tours',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_TOURS_FROM_FITS_TITLE',
);
$dictionary["Tour"]["fields"]["fits_tours_name"] = array (
  'name' => 'fits_tours_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_TOURS_FROM_FITS_TITLE',
  'save' => true,
  'id_name' => 'fits_tours3769ursfits_ida',
  'link' => 'fits_tours',
  'table' => 'fits',
  'module' => 'FITs',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Tour"]["fields"]["fits_tours3769ursfits_ida"] = array (
  'name' => 'fits_tours3769ursfits_ida',
  'type' => 'link',
  'relationship' => 'fits_tours',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FITS_TOURS_FROM_TOURS_TITLE',
);
