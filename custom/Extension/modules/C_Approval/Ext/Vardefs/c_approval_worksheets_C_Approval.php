<?php
// created: 2011-10-04 10:29:08
$dictionary["C_Approval"]["fields"]["c_approval_worksheets"] = array (
  'name' => 'c_approval_worksheets',
  'type' => 'link',
  'relationship' => 'c_approval_worksheets',
  'source' => 'non-db',
  'vname' => 'LBL_C_APPROVAL_WORKSHEETS_FROM_WORKSHEETS_TITLE',
);
$dictionary["C_Approval"]["fields"]["c_approval_orksheets_name"] = array (
  'name' => 'c_approval_orksheets_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_APPROVAL_WORKSHEETS_FROM_WORKSHEETS_TITLE',
  'save' => true,
  'id_name' => 'c_approvalf31cksheets_ida',
  'link' => 'c_approval_worksheets',
  'table' => 'worksheets',
  'module' => 'Worksheets',
  'rname' => 'name',
);
$dictionary["C_Approval"]["fields"]["c_approvalf31cksheets_ida"] = array (
  'name' => 'c_approvalf31cksheets_ida',
  'type' => 'link',
  'relationship' => 'c_approval_worksheets',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_C_APPROVAL_WORKSHEETS_FROM_C_APPROVAL_TITLE',
);
