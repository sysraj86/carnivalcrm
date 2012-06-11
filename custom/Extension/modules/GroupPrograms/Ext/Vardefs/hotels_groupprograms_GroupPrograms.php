<?php
// created: 2011-10-26 11:39:34
$dictionary["GroupProgram"]["fields"]["hotels_groupprograms"] = array (
  'name' => 'hotels_groupprograms',
  'type' => 'link',
  'relationship' => 'hotels_groupprograms',
  'source' => 'non-db',
  'vname' => 'LBL_HOTELS_GROUPPROGRAMS_FROM_HOTELS_TITLE',
);
$dictionary["GroupProgram"]["fields"]["hotels_groupprograms_name"] = array (
  'name' => 'hotels_groupprograms_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HOTELS_GROUPPROGRAMS_FROM_HOTELS_TITLE',
  'save' => true,
  'id_name' => 'hotels_gro0d05shotels_ida',
  'link' => 'hotels_groupprograms',
  'table' => 'hotels',
  'module' => 'Hotels',
  'rname' => 'name',
);
$dictionary["GroupProgram"]["fields"]["hotels_gro0d05shotels_ida"] = array (
  'name' => 'hotels_gro0d05shotels_ida',
  'type' => 'link',
  'relationship' => 'hotels_groupprograms',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HOTELS_GROUPPROGRAMS_FROM_GROUPPROGRAMS_TITLE',
);
