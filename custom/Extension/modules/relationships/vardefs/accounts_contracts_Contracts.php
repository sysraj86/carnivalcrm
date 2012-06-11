<?php
// created: 2011-08-19 10:10:18
$dictionary["Contract"]["fields"]["accounts_contracts"] = array (
  'name' => 'accounts_contracts',
  'type' => 'link',
  'relationship' => 'accounts_contracts',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_CONTRACTS_FROM_ACCOUNTS_TITLE',
);
$dictionary["Contract"]["fields"]["accounts_contracts_name"] = array (
  'name' => 'accounts_contracts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_CONTRACTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_c71f9ccounts_ida',
  'link' => 'accounts_contracts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["Contract"]["fields"]["accounts_c71f9ccounts_ida"] = array (
  'name' => 'accounts_c71f9ccounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_contracts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_CONTRACTS_FROM_CONTRACTS_TITLE',
);
