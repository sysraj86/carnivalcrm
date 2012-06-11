<?php
// created: 2011-10-04 10:29:08
$dictionary["C_Approval"]["fields"]["c_approval_roombookings"] = array (
  'name' => 'c_approval_roombookings',
  'type' => 'link',
  'relationship' => 'c_approval_roombookings',
  'source' => 'non-db',
  'vname' => 'LBL_C_APPROVAL_ROOMBOOKINGS_FROM_ROOMBOOKINGS_TITLE',
);
$dictionary["C_Approval"]["fields"]["c_approval_mbookings_name"] = array (
  'name' => 'c_approval_mbookings_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_APPROVAL_ROOMBOOKINGS_FROM_ROOMBOOKINGS_TITLE',
  'save' => true,
  'id_name' => 'c_approvalb659ookings_ida',
  'link' => 'c_approval_roombookings',
  'table' => 'roombookings',
  'module' => 'RoomBookings',
  'rname' => 'name',
);
$dictionary["C_Approval"]["fields"]["c_approvalb659ookings_ida"] = array (
  'name' => 'c_approvalb659ookings_ida',
  'type' => 'link',
  'relationship' => 'c_approval_roombookings',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_C_APPROVAL_ROOMBOOKINGS_FROM_C_APPROVAL_TITLE',
);
