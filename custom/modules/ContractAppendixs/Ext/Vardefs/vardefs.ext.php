<?php 
 //WARNING: The contents of this file are auto-generated


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


// created: 2012-09-28 12:06:17
$dictionary["ContractAppendixs"]["fields"]["tours_contractappendixs"] = array (
  'name' => 'tours_contractappendixs',
  'type' => 'link',
  'relationship' => 'tours_contractappendixs',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_CONTRACTAPPENDIXS_FROM_TOURS_TITLE',
);
$dictionary["ContractAppendixs"]["fields"]["tours_contrappendixs_name"] = array (
  'name' => 'tours_contrappendixs_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_CONTRACTAPPENDIXS_FROM_TOURS_TITLE',
  'save' => true,
  'id_name' => 'tours_cont48c1xstours_ida',
  'link' => 'tours_contractappendixs',
  'table' => 'tours',
  'module' => 'Tours',
  'rname' => 'name',
  'required' => true,
);
$dictionary["ContractAppendixs"]["fields"]["tours_cont48c1xstours_ida"] = array (
  'name' => 'tours_cont48c1xstours_ida',
  'type' => 'link',
  'relationship' => 'tours_contractappendixs',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TOURS_CONTRACTAPPENDIXS_FROM_CONTRACTAPPENDIXS_TITLE',
);

?>