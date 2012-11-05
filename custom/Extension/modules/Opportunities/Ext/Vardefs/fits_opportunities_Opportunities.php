<?php
// created: 2012-11-01 15:45:39
$dictionary["Opportunity"]["fields"]["fits_opportunities"] = array (
  'name' => 'fits_opportunities',
  'type' => 'link',
  'relationship' => 'fits_opportunities',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_OPPORTUNITIES_FROM_FITS_TITLE',
);
$dictionary["Opportunity"]["fields"]["fits_opportunities_name"] = array (
  'name' => 'fits_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_OPPORTUNITIES_FROM_FITS_TITLE',
  'save' => true,
  'id_name' => 'fits_oppor18f3iesfits_ida',
  'link' => 'fits_opportunities',
  'table' => 'fits',
  'module' => 'FITs',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Opportunity"]["fields"]["fits_oppor18f3iesfits_ida"] = array (
  'name' => 'fits_oppor18f3iesfits_ida',
  'type' => 'link',
  'relationship' => 'fits_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FITS_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
);
