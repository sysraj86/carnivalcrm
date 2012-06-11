<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-11-21 16:47:46
$dictionary["CommentAirlines"]["fields"]["airlines_commentairlines"] = array (
  'name' => 'airlines_commentairlines',
  'type' => 'link',
  'relationship' => 'airlines_commentairlines',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINES_COMMENTAIRLINES_FROM_AIRLINES_TITLE',
);
$dictionary["CommentAirlines"]["fields"]["airlines_cotairlines_name"] = array (
  'name' => 'airlines_cotairlines_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINES_COMMENTAIRLINES_FROM_AIRLINES_TITLE',
  'save' => true,
  'id_name' => 'airlines_ce40dirlines_ida',
  'link' => 'airlines_commentairlines',
  'table' => 'airlines',
  'module' => 'Airlines',
  'rname' => 'name',
);
$dictionary["CommentAirlines"]["fields"]["airlines_ce40dirlines_ida"] = array (
  'name' => 'airlines_ce40dirlines_ida',
  'type' => 'link',
  'relationship' => 'airlines_commentairlines',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AIRLINES_COMMENTAIRLINES_FROM_COMMENTAIRLINES_TITLE',
);


// created: 2011-11-21 16:43:47
$dictionary["CommentAirlines"]["fields"]["fits_commentairlines"] = array (
  'name' => 'fits_commentairlines',
  'type' => 'link',
  'relationship' => 'fits_commentairlines',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_COMMENTAIRLINES_FROM_FITS_TITLE',
);
$dictionary["CommentAirlines"]["fields"]["fits_commentairlines_name"] = array (
  'name' => 'fits_commentairlines_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_COMMENTAIRLINES_FROM_FITS_TITLE',
  'save' => true,
  'id_name' => 'fits_comme89bfnesfits_ida',
  'link' => 'fits_commentairlines',
  'table' => 'fits',
  'module' => 'FITs',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["CommentAirlines"]["fields"]["fits_comme89bfnesfits_ida"] = array (
  'name' => 'fits_comme89bfnesfits_ida',
  'type' => 'link',
  'relationship' => 'fits_commentairlines',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FITS_COMMENTAIRLINES_FROM_COMMENTAIRLINES_TITLE',
);

?>