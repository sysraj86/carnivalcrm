<?php
// created: 2011-08-22 10:23:01
$dictionary["FITs"]["fields"]["accounts_fits"] = array (
  'name' => 'accounts_fits',
  'type' => 'link',
  'relationship' => 'accounts_fits',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_FITS_FROM_ACCOUNTS_TITLE',
);
$dictionary["FITs"]["fields"]["accounts_fits_name"] = array (
  'name' => 'accounts_fits_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_FITS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_fd483ccounts_ida',
  'link' => 'accounts_fits',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["FITs"]["fields"]["accounts_fd483ccounts_ida"] = array (
  'name' => 'accounts_fd483ccounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_fits',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_FITS_FROM_FITS_TITLE',
);
