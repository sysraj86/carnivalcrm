<?php
// created: 2011-10-04 10:29:08
$dictionary["C_Approval"]["fields"]["c_approval_nsportbookings"] = array (
  'name' => 'c_approval_nsportbookings',
  'type' => 'link',
  'relationship' => 'c_approval_transportbookings',
  'source' => 'non-db',
  'vname' => 'LBL_C_APPROVAL_TRANSPORTBOOKINGS_FROM_TRANSPORTBOOKINGS_TITLE',
);
$dictionary["C_Approval"]["fields"]["c_approval_tbookings_name"] = array (
  'name' => 'c_approval_tbookings_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_APPROVAL_TRANSPORTBOOKINGS_FROM_TRANSPORTBOOKINGS_TITLE',
  'save' => true,
  'id_name' => 'c_approval991dookings_ida',
  'link' => 'c_approval_nsportbookings',
  'table' => 'TransportBookings',
  'module' => 'TransportBookings',
  'rname' => 'name',
);
$dictionary["C_Approval"]["fields"]["c_approval991dookings_ida"] = array (
  'name' => 'c_approval991dookings_ida',
  'type' => 'link',
  'relationship' => 'c_approval_transportbookings',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_C_APPROVAL_TRANSPORTBOOKINGS_FROM_C_APPROVAL_TITLE',
);
