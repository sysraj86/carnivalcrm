<?php
// created: 2011-10-26 00:36:45
$dictionary["Oder"]["fields"]["accounts_oders"] = array (
  'name' => 'accounts_oders',
  'type' => 'link',
  'relationship' => 'accounts_oders',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_ODERS_FROM_ACCOUNTS_TITLE',
);
$dictionary["Oder"]["fields"]["accounts_oders_name"] = array (
  'name' => 'accounts_oders_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_ODERS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_o20ceccounts_ida',
  'link' => 'accounts_oders',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["Oder"]["fields"]["accounts_o20ceccounts_ida"] = array (
  'name' => 'accounts_o20ceccounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_oders',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_ODERS_FROM_ODERS_TITLE',
);
