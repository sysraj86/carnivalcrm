<?php
// created: 2011-10-04 10:29:08
$dictionary["C_Approval"]["fields"]["c_approval_irlinestickets"] = array (
  'name' => 'c_approval_irlinestickets',
  'type' => 'link',
  'relationship' => 'c_approval_airlinestickets',
  'source' => 'non-db',
  'vname' => 'LBL_C_APPROVAL_AIRLINESTICKETS_FROM_AIRLINESTICKETS_TITLE',
);
$dictionary["C_Approval"]["fields"]["c_approval_estickets_name"] = array (
  'name' => 'c_approval_estickets_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_APPROVAL_AIRLINESTICKETS_FROM_AIRLINESTICKETS_TITLE',
  'save' => true,
  'id_name' => 'c_approvalb882tickets_ida',
  'link' => 'c_approval_irlinestickets',
  'table' => 'AirlinesTickets',
  'module' => 'AirlinesTickets',
  'rname' => 'name',
);
$dictionary["C_Approval"]["fields"]["c_approvalb882tickets_ida"] = array (
  'name' => 'c_approvalb882tickets_ida',
  'type' => 'link',
  'relationship' => 'c_approval_airlinestickets',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_C_APPROVAL_AIRLINESTICKETS_FROM_C_APPROVAL_TITLE',
);
