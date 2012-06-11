<?php
// created: 2011-08-19 11:14:20
$dictionary["Billing"]["fields"]["hotels_billing"] = array (
  'name' => 'hotels_billing',
  'type' => 'link',
  'relationship' => 'hotels_billing',
  'source' => 'non-db',
  'vname' => 'LBL_HOTELS_BILLING_FROM_HOTELS_TITLE',
);
$dictionary["Billing"]["fields"]["hotels_billing_name"] = array (
  'name' => 'hotels_billing_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HOTELS_BILLING_FROM_HOTELS_TITLE',
  'save' => true,
  'id_name' => 'hotels_bil8409ghotels_ida',
  'link' => 'hotels_billing',
  'table' => 'hotels',
  'module' => 'Hotels',
  'rname' => 'name',
);
$dictionary["Billing"]["fields"]["hotels_bil8409ghotels_ida"] = array (
  'name' => 'hotels_bil8409ghotels_ida',
  'type' => 'link',
  'relationship' => 'hotels_billing',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HOTELS_BILLING_FROM_BILLING_TITLE',
);
