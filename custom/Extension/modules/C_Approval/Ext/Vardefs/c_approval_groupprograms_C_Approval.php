<?php
// created: 2011-10-04 10:29:08
$dictionary["C_Approval"]["fields"]["c_approval_groupprograms"] = array (
  'name' => 'c_approval_groupprograms',
  'type' => 'link',
  'relationship' => 'c_approval_groupprograms',
  'source' => 'non-db',
  'vname' => 'LBL_C_APPROVAL_GROUPPROGRAMS_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["C_Approval"]["fields"]["c_approval_pprograms_name"] = array (
  'name' => 'c_approval_pprograms_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_APPROVAL_GROUPPROGRAMS_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'c_approval851drograms_ida',
  'link' => 'c_approval_groupprograms',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'rname' => 'name',
);
$dictionary["C_Approval"]["fields"]["c_approval851drograms_ida"] = array (
  'name' => 'c_approval851drograms_ida',
  'type' => 'link',
  'relationship' => 'c_approval_groupprograms',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_C_APPROVAL_GROUPPROGRAMS_FROM_C_APPROVAL_TITLE',
);
