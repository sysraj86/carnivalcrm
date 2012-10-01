<?php
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
