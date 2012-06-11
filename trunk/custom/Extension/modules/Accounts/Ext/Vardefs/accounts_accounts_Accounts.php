<?php
// created: 2011-09-06 11:24:37
$dictionary["Account"]["fields"]["accounts_accounts"] = array (
  'name' => 'accounts_accounts',
  'type' => 'link',
  'relationship' => 'accounts_accounts',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_ACCOUNTS_FROM_ACCOUNTS_L_TITLE',
);
$dictionary["Account"]["fields"]["accounts_accounts_name"] = array (
  'name' => 'accounts_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_ACCOUNTS_FROM_ACCOUNTS_L_TITLE',
  'save' => true,
  'id_name' => 'accounts_a0647ccounts_ida',
  'link' => 'accounts_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["Account"]["fields"]["accounts_a0647ccounts_ida"] = array (
  'name' => 'accounts_a0647ccounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_ACCOUNTS_FROM_ACCOUNTS_R_TITLE',
);
