<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-10-04 10:29:08
$dictionary["Worksheets"]["fields"]["c_approval_worksheets"] = array (
  'name' => 'c_approval_worksheets',
  'type' => 'link',
  'relationship' => 'c_approval_worksheets',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_C_APPROVAL_WORKSHEETS_FROM_C_APPROVAL_TITLE',
);


// created: 2011-09-05 09:11:50
$dictionary["Worksheets"]["fields"]["groupprograms_worksheets"] = array (
  'name' => 'groupprograms_worksheets',
  'type' => 'link',
  'relationship' => 'groupprograms_worksheets',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_WORKSHEETS_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["Worksheets"]["fields"]["groupprograorksheets_name"] = array (
  'name' => 'groupprograorksheets_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_WORKSHEETS_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogrd737rograms_ida',
  'link' => 'groupprograms_worksheets',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'rname' => 'groupprogram_code',
);
$dictionary["Worksheets"]["fields"]["groupprogrd737rograms_ida"] = array (
  'name' => 'groupprogrd737rograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_worksheets',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_GROUPPROGRAMS_WORKSHEETS_FROM_GROUPPROGRAMS_TITLE',
);

?>