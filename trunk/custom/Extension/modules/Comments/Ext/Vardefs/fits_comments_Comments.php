<?php
// created: 2011-10-18 14:57:37
$dictionary["Comments"]["fields"]["fits_comments"] = array (
  'name' => 'fits_comments',
  'type' => 'link',
  'relationship' => 'fits_comments',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_COMMENTS_FROM_FITS_TITLE',
);
$dictionary["Comments"]["fields"]["fits_comments_name"] = array (
  'name' => 'fits_comments_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_COMMENTS_FROM_FITS_TITLE',
  'save' => true,
  'id_name' => 'fits_comme2b2fntsfits_ida',
  'link' => 'fits_comments',
  'table' => 'fits',
  'module' => 'FITs',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Comments"]["fields"]["fits_comme2b2fntsfits_ida"] = array (
  'name' => 'fits_comme2b2fntsfits_ida',
  'type' => 'link',
  'relationship' => 'fits_comments',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FITS_COMMENTS_FROM_COMMENTS_TITLE',
);
