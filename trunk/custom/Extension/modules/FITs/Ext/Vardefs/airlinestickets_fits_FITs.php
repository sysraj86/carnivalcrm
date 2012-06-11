<?php
// created: 2011-10-01 09:52:14
$dictionary["FITs"]["fields"]["airlinestickets_fits"] = array (
  'name' => 'airlinestickets_fits',
  'type' => 'link',
  'relationship' => 'airlinestickets_fits',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINESTICKETS_FITS_FROM_AIRLINESTICKETS_TITLE',
);
$dictionary["FITs"]["fields"]["airlinestickets_fits_name"] = array (
  'name' => 'airlinestickets_fits_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINESTICKETS_FITS_FROM_AIRLINESTICKETS_TITLE',
  'save' => true,
  'id_name' => 'airlinestia31ctickets_ida',
  'link' => 'airlinestickets_fits',
  'table' => 'AirlinesTickets',
  'module' => 'AirlinesTickets',
  'rname' => 'name',
);
$dictionary["FITs"]["fields"]["airlinestia31ctickets_ida"] = array (
  'name' => 'airlinestia31ctickets_ida',
  'type' => 'link',
  'relationship' => 'airlinestickets_fits',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AIRLINESTICKETS_FITS_FROM_FITS_TITLE',
);
