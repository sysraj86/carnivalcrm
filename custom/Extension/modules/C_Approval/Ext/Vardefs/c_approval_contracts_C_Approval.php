<?php
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
