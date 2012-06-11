<?php
// created: 2011-08-19 10:13:01
$dictionary["Billing"]["fields"]["accounts_billing"] = array (
  'name' => 'accounts_billing',
  'type' => 'link',
  'relationship' => 'accounts_billing',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_BILLING_FROM_ACCOUNTS_TITLE',
);
$dictionary["Billing"]["fields"]["accounts_billing_name"] = array (
  'name' => 'accounts_billing_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_BILLING_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_b7c5dccounts_ida',
  'link' => 'accounts_billing',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["Billing"]["fields"]["accounts_b7c5dccounts_ida"] = array (
  'name' => 'accounts_b7c5dccounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_billing',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_BILLING_FROM_BILLING_TITLE',
);
