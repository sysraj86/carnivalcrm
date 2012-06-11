<?php
// created: 2011-08-31 11:31:09
$dictionary["AirlinesTickets"]["fields"]["fits_airlinestickets"] = array (
  'name' => 'fits_airlinestickets',
  'type' => 'link',
  'relationship' => 'fits_airlinestickets',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_AIRLINESTICKETS_FROM_FITS_TITLE',
);
$dictionary["AirlinesTickets"]["fields"]["fits_airlinestickets_name"] = array (
  'name' => 'fits_airlinestickets_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_AIRLINESTICKETS_FROM_FITS_TITLE',
  'save' => true,
  'id_name' => 'fits_airli3e39etsfits_ida',
  'link' => 'fits_airlinestickets',
  'table' => 'fits',
  'module' => 'FITs',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["AirlinesTickets"]["fields"]["fits_airli3e39etsfits_ida"] = array (
  'name' => 'fits_airli3e39etsfits_ida',
  'type' => 'link',
  'relationship' => 'fits_airlinestickets',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FITS_AIRLINESTICKETS_FROM_AIRLINESTICKETS_TITLE',
);
