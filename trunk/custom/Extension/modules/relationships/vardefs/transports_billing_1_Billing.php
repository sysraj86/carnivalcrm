<?php
// created: 2011-12-14 18:10:08
$dictionary["Billing"]["fields"]["transports_billing_1"] = array (
  'name' => 'transports_billing_1',
  'type' => 'link',
  'relationship' => 'transports_billing_1',
  'source' => 'non-db',
  'vname' => 'LBL_TRANSPORTS_BILLING_1_FROM_TRANSPORTS_TITLE',
);
$dictionary["Billing"]["fields"]["transports_billing_1_name"] = array (
  'name' => 'transports_billing_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TRANSPORTS_BILLING_1_FROM_TRANSPORTS_TITLE',
  'save' => true,
  'id_name' => 'transports3b29nsports_ida',
  'link' => 'transports_billing_1',
  'table' => 'transports',
  'module' => 'Transports',
  'rname' => 'name',
);
$dictionary["Billing"]["fields"]["transports3b29nsports_ida"] = array (
  'name' => 'transports3b29nsports_ida',
  'type' => 'link',
  'relationship' => 'transports_billing_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TRANSPORTS_BILLING_1_FROM_BILLING_TITLE',
);
