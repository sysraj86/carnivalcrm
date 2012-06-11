<?php
// created: 2011-09-20 09:12:33
$dictionary["Quotes"]["fields"]["fits_quotes"] = array (
  'name' => 'fits_quotes',
  'type' => 'link',
  'relationship' => 'fits_quotes',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_QUOTES_FROM_FITS_TITLE',
);
$dictionary["Quotes"]["fields"]["fits_quotes_name"] = array (
  'name' => 'fits_quotes_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_QUOTES_FROM_FITS_TITLE',
  'save' => true,
  'id_name' => 'fits_quotedcbetesfits_ida',
  'link' => 'fits_quotes',
  'table' => 'fits',
  'module' => 'FITs',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Quotes"]["fields"]["fits_quotedcbetesfits_ida"] = array (
  'name' => 'fits_quotedcbetesfits_ida',
  'type' => 'link',
  'relationship' => 'fits_quotes',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FITS_QUOTES_FROM_QUOTES_TITLE',
);
