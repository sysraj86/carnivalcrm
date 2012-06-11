<?php
// created: 2011-10-04 10:29:08
$dictionary["C_Approval"]["fields"]["c_approval_ervicebookings"] = array (
  'name' => 'c_approval_ervicebookings',
  'type' => 'link',
  'relationship' => 'c_approval_servicebookings',
  'source' => 'non-db',
  'vname' => 'LBL_C_APPROVAL_SERVICEBOOKINGS_FROM_SERVICEBOOKINGS_TITLE',
);
$dictionary["C_Approval"]["fields"]["c_approval_ebookings_name"] = array (
  'name' => 'c_approval_ebookings_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_APPROVAL_SERVICEBOOKINGS_FROM_SERVICEBOOKINGS_TITLE',
  'save' => true,
  'id_name' => 'c_approval9d6dookings_ida',
  'link' => 'c_approval_ervicebookings',
  'table' => 'servicebookings',
  'module' => 'ServiceBookings',
  'rname' => 'name',
);
$dictionary["C_Approval"]["fields"]["c_approval9d6dookings_ida"] = array (
  'name' => 'c_approval9d6dookings_ida',
  'type' => 'link',
  'relationship' => 'c_approval_servicebookings',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_C_APPROVAL_SERVICEBOOKINGS_FROM_C_APPROVAL_TITLE',
);
