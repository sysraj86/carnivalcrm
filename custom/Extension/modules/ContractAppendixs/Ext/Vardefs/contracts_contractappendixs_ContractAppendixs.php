<?php
// created: 2012-10-01 16:16:00
$dictionary["ContractAppendixs"]["fields"]["contracts_ctractappendixs"] = array (
  'name' => 'contracts_ctractappendixs',
  'type' => 'link',
  'relationship' => 'contracts_contractappendixs',
  'source' => 'non-db',
  'vname' => 'LBL_CONTRACTS_CONTRACTAPPENDIXS_FROM_CONTRACTS_TITLE',
);
$dictionary["ContractAppendixs"]["fields"]["contracts_cappendixs_name"] = array (
  'name' => 'contracts_cappendixs_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTRACTS_CONTRACTAPPENDIXS_FROM_CONTRACTS_TITLE',
  'save' => true,
  'id_name' => 'contracts_2225ntracts_ida',
  'link' => 'contracts_ctractappendixs',
  'table' => 'contracts',
  'module' => 'Contracts',
  'rname' => 'name',
  'required' => true,
);
$dictionary["ContractAppendixs"]["fields"]["contracts_2225ntracts_ida"] = array (
  'name' => 'contracts_2225ntracts_ida',
  'type' => 'link',
  'relationship' => 'contracts_contractappendixs',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_CONTRACTS_CONTRACTAPPENDIXS_FROM_CONTRACTAPPENDIXS_TITLE',
);
