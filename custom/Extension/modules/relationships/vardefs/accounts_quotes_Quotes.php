<?php
// created: 2011-09-06 11:29:51
$dictionary["Quotes"]["fields"]["accounts_quotes"] = array (
  'name' => 'accounts_quotes',
  'type' => 'link',
  'relationship' => 'accounts_quotes',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_QUOTES_FROM_ACCOUNTS_TITLE',
);
$dictionary["Quotes"]["fields"]["accounts_quotes_name"] = array (
  'name' => 'accounts_quotes_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_QUOTES_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_qd96cccounts_ida',
  'link' => 'accounts_quotes',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["Quotes"]["fields"]["accounts_qd96cccounts_ida"] = array (
  'name' => 'accounts_qd96cccounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_quotes',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_QUOTES_FROM_QUOTES_TITLE',
);
