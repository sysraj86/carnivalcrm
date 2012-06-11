<?php
// created: 2011-11-01 12:41:34
$dictionary["Contract"]["fields"]["fits_contracts"] = array (
  'name' => 'fits_contracts',
  'type' => 'link',
  'relationship' => 'fits_contracts',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_CONTRACTS_FROM_FITS_TITLE',
);
$dictionary["Contract"]["fields"]["fits_contracts_name"] = array (
  'name' => 'fits_contracts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_CONTRACTS_FROM_FITS_TITLE',
  'save' => true,
  'id_name' => 'fits_contr29f3ctsfits_ida',
  'link' => 'fits_contracts',
  'table' => 'fits',
  'module' => 'FITs',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Contract"]["fields"]["fits_contr29f3ctsfits_ida"] = array (
  'name' => 'fits_contr29f3ctsfits_ida',
  'type' => 'link',
  'relationship' => 'fits_contracts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FITS_CONTRACTS_FROM_CONTRACTS_TITLE',
);
