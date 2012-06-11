<?php
// created: 2011-12-14 17:44:23
$dictionary["Transport"]["fields"]["billing_transports"] = array (
  'name' => 'billing_transports',
  'type' => 'link',
  'relationship' => 'billing_transports',
  'source' => 'non-db',
  'vname' => 'LBL_BILLING_TRANSPORTS_FROM_BILLING_TITLE',
);
$dictionary["Transport"]["fields"]["billing_transports_name"] = array (
  'name' => 'billing_transports_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_BILLING_TRANSPORTS_FROM_BILLING_TITLE',
  'save' => true,
  'id_name' => 'billing_trdb38billing_ida',
  'link' => 'billing_transports',
  'table' => 'billing',
  'module' => 'Billing',
  'rname' => 'name',
);
$dictionary["Transport"]["fields"]["billing_trdb38billing_ida"] = array (
  'name' => 'billing_trdb38billing_ida',
  'type' => 'link',
  'relationship' => 'billing_transports',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_BILLING_TRANSPORTS_FROM_TRANSPORTS_TITLE',
);
