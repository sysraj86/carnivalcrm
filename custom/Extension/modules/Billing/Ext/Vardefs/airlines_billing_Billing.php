<?php
// created: 2011-08-19 11:21:27
$dictionary["Billing"]["fields"]["airlines_billing"] = array (
  'name' => 'airlines_billing',
  'type' => 'link',
  'relationship' => 'airlines_billing',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINES_BILLING_FROM_AIRLINES_TITLE',
);
$dictionary["Billing"]["fields"]["airlines_billing_name"] = array (
  'name' => 'airlines_billing_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINES_BILLING_FROM_AIRLINES_TITLE',
  'save' => true,
  'id_name' => 'airlines_be4f5irlines_ida',
  'link' => 'airlines_billing',
  'table' => 'airlines',
  'module' => 'Airlines',
  'rname' => 'name',
);
$dictionary["Billing"]["fields"]["airlines_be4f5irlines_ida"] = array (
  'name' => 'airlines_be4f5irlines_ida',
  'type' => 'link',
  'relationship' => 'airlines_billing',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AIRLINES_BILLING_FROM_BILLING_TITLE',
);
