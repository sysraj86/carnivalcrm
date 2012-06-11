<?php 
 //WARNING: The contents of this file are auto-generated


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


// created: 2011-10-04 10:29:08
$dictionary["C_Approval"]["fields"]["c_approval_contracts"] = array (
  'name' => 'c_approval_contracts',
  'type' => 'link',
  'relationship' => 'c_approval_contracts',
  'source' => 'non-db',
  'vname' => 'LBL_C_APPROVAL_CONTRACTS_FROM_CONTRACTS_TITLE',
);
$dictionary["C_Approval"]["fields"]["c_approval_contracts_name"] = array (
  'name' => 'c_approval_contracts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_APPROVAL_CONTRACTS_FROM_CONTRACTS_TITLE',
  'save' => true,
  'id_name' => 'c_approval8695ntracts_ida',
  'link' => 'c_approval_contracts',
  'table' => 'contracts',
  'module' => 'Contracts',
  'rname' => 'name',
);
$dictionary["C_Approval"]["fields"]["c_approval8695ntracts_ida"] = array (
  'name' => 'c_approval8695ntracts_ida',
  'type' => 'link',
  'relationship' => 'c_approval_contracts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_C_APPROVAL_CONTRACTS_FROM_C_APPROVAL_TITLE',
);


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

?>