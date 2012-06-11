<?php
// created: 2011-09-05 10:45:41
$dictionary["GroupProgram"]["fields"]["fits_groupprograms"] = array (
  'name' => 'fits_groupprograms',
  'type' => 'link',
  'relationship' => 'fits_groupprograms',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_GROUPPROGRAMS_FROM_FITS_TITLE',
);
$dictionary["GroupProgram"]["fields"]["fits_groupprograms_name"] = array (
  'name' => 'fits_groupprograms_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_GROUPPROGRAMS_FROM_FITS_TITLE',
  'save' => true,
  'id_name' => 'fits_group33fdamsfits_ida',
  'link' => 'fits_groupprograms',
  'table' => 'fits',
  'module' => 'FITs',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["GroupProgram"]["fields"]["fits_group33fdamsfits_ida"] = array (
  'name' => 'fits_group33fdamsfits_ida',
  'type' => 'link',
  'relationship' => 'fits_groupprograms',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FITS_GROUPPROGRAMS_FROM_GROUPPROGRAMS_TITLE',
);
