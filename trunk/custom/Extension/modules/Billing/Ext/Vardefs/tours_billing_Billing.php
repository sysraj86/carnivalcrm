<?php
// created: 2011-08-19 10:47:02
$dictionary["Billing"]["fields"]["tours_billing"] = array (
  'name' => 'tours_billing',
  'type' => 'link',
  'relationship' => 'tours_billing',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_BILLING_FROM_TOURS_TITLE',
);
$dictionary["Billing"]["fields"]["tours_billing_name"] = array (
  'name' => 'tours_billing_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_BILLING_FROM_TOURS_TITLE',
  'save' => true,
  'id_name' => 'tours_bill7148ngtours_ida',
  'link' => 'tours_billing',
  'table' => 'tours',
  'module' => 'Tours',
  'rname' => 'name',
);
$dictionary["Billing"]["fields"]["tours_bill7148ngtours_ida"] = array (
  'name' => 'tours_bill7148ngtours_ida',
  'type' => 'link',
  'relationship' => 'tours_billing',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TOURS_BILLING_FROM_BILLING_TITLE',
);
