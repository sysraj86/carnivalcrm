<?php 
 //WARNING: The contents of this file are auto-generated


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


// created: 2011-10-18 14:28:40
$dictionary["Comments"]["fields"]["groupprograms_comments"] = array (
  'name' => 'groupprograms_comments',
  'type' => 'link',
  'relationship' => 'groupprograms_comments',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_COMMENTS_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["Comments"]["fields"]["groupprogra_comments_name"] = array (
  'name' => 'groupprogra_comments_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_COMMENTS_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogrcc65rograms_ida',
  'link' => 'groupprograms_comments',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'rname' => 'name',
);
$dictionary["Comments"]["fields"]["groupprogrcc65rograms_ida"] = array (
  'name' => 'groupprogrcc65rograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_comments',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_COMMENTS_FROM_COMMENTS_TITLE',
);

?>