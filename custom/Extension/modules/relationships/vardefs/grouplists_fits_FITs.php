<?php
// created: 2011-08-22 10:53:04
$dictionary["FITs"]["fields"]["grouplists_fits"] = array (
  'name' => 'grouplists_fits',
  'type' => 'link',
  'relationship' => 'grouplists_fits',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPLISTS_FITS_FROM_GROUPLISTS_TITLE',
);
$dictionary["FITs"]["fields"]["grouplists_fits_name"] = array (
  'name' => 'grouplists_fits_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPLISTS_FITS_FROM_GROUPLISTS_TITLE',
  'save' => true,
  'id_name' => 'grouplistsd262uplists_ida',
  'link' => 'grouplists_fits',
  'table' => 'grouplists',
  'module' => 'GroupLists',
  'rname' => 'name',
);
$dictionary["FITs"]["fields"]["grouplistsd262uplists_ida"] = array (
  'name' => 'grouplistsd262uplists_ida',
  'type' => 'link',
  'relationship' => 'grouplists_fits',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GROUPLISTS_FITS_FROM_FITS_TITLE',
);
