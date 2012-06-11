<?php
// created: 2011-09-21 10:55:26
$dictionary["AppendixContract"]["fields"]["contracts_apendixcontract"] = array (
  'name' => 'contracts_apendixcontract',
  'type' => 'link',
  'relationship' => 'contracts_appendixcontract',
  'source' => 'non-db',
  'vname' => 'LBL_CONTRACTS_APPENDIXCONTRACT_FROM_CONTRACTS_TITLE',
);
$dictionary["AppendixContract"]["fields"]["contracts_axcontract_name"] = array (
  'name' => 'contracts_axcontract_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTRACTS_APPENDIXCONTRACT_FROM_CONTRACTS_TITLE',
  'save' => true,
  'id_name' => 'contracts_2fafntracts_ida',
  'link' => 'contracts_apendixcontract',
  'table' => 'contracts',
  'module' => 'Contracts',
  'rname' => 'name',
);
$dictionary["AppendixContract"]["fields"]["contracts_2fafntracts_ida"] = array (
  'name' => 'contracts_2fafntracts_ida',
  'type' => 'link',
  'relationship' => 'contracts_appendixcontract',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_CONTRACTS_APPENDIXCONTRACT_FROM_APPENDIXCONTRACT_TITLE',
);
