<?php
// created: 2012-02-20 11:43:35
$dictionary["Lead"]["fields"]["accounts_leads"] = array (
  'name' => 'accounts_leads',
  'type' => 'link',
  'relationship' => 'accounts_leads',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_LEADS_FROM_ACCOUNTS_TITLE',
);
$dictionary["Lead"]["fields"]["accounts_leads_name"] = array (
  'name' => 'accounts_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_LEADS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_l777cccounts_ida',
  'link' => 'accounts_leads',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["Lead"]["fields"]["accounts_l777cccounts_ida"] = array (
  'name' => 'accounts_l777cccounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_leads',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_LEADS_FROM_LEADS_TITLE',
);
