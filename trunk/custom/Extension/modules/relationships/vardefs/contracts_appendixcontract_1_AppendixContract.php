<?php
// created: 2011-11-23 15:54:30
$dictionary["AppendixContract"]["fields"]["contracts_andixcontract_1"] = array (
  'name' => 'contracts_andixcontract_1',
  'type' => 'link',
  'relationship' => 'contracts_appendixcontract_1',
  'source' => 'non-db',
  'vname' => 'LBL_CONTRACTS_APPENDIXCONTRACT_1_FROM_CONTRACTS_TITLE',
);
$dictionary["AppendixContract"]["fields"]["contracts_aontract_1_name"] = array (
  'name' => 'contracts_aontract_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTRACTS_APPENDIXCONTRACT_1_FROM_CONTRACTS_TITLE',
  'save' => true,
  'id_name' => 'contracts_b286ntracts_ida',
  'link' => 'contracts_andixcontract_1',
  'table' => 'contracts',
  'module' => 'Contracts',
  'rname' => 'name',
);
$dictionary["AppendixContract"]["fields"]["contracts_b286ntracts_ida"] = array (
  'name' => 'contracts_b286ntracts_ida',
  'type' => 'link',
  'relationship' => 'contracts_appendixcontract_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_CONTRACTS_APPENDIXCONTRACT_1_FROM_APPENDIXCONTRACT_TITLE',
);
