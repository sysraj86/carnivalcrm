<?php
// created: 2011-10-21 10:42:20
$dictionary["Tour"]["fields"]["accounts_tours"] = array (
  'name' => 'accounts_tours',
  'type' => 'link',
  'relationship' => 'accounts_tours',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_TOURS_FROM_ACCOUNTS_TITLE',
);
$dictionary["Tour"]["fields"]["accounts_tours_name"] = array (
  'name' => 'accounts_tours_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_TOURS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_t4d21ccounts_ida',
  'link' => 'accounts_tours',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["Tour"]["fields"]["accounts_t4d21ccounts_ida"] = array (
  'name' => 'accounts_t4d21ccounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_tours',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_TOURS_FROM_TOURS_TITLE',
);
