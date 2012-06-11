<?php
// created: 2011-09-05 09:11:50
$dictionary["GroupProgram"]["fields"]["groupprograms_worksheets"] = array (
  'name' => 'groupprograms_worksheets',
  'type' => 'link',
  'relationship' => 'groupprograms_worksheets',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_WORKSHEETS_FROM_WORKSHEETS_TITLE',
);
$dictionary["GroupProgram"]["fields"]["groupprograorksheets_name"] = array (
  'name' => 'groupprograorksheets_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_WORKSHEETS_FROM_WORKSHEETS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr53b5ksheets_idb',
  'link' => 'groupprograms_worksheets',
  'table' => 'worksheets',
  'module' => 'Worksheets',
  'rname' => 'name',
);
$dictionary["GroupProgram"]["fields"]["groupprogr53b5ksheets_idb"] = array (
  'name' => 'groupprogr53b5ksheets_idb',
  'type' => 'link',
  'relationship' => 'groupprograms_worksheets',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_GROUPPROGRAMS_WORKSHEETS_FROM_WORKSHEETS_TITLE',
);
