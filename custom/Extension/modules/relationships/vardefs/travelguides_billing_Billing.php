<?php
// created: 2011-12-14 18:12:45
$dictionary["Billing"]["fields"]["travelguides_billing"] = array (
  'name' => 'travelguides_billing',
  'type' => 'link',
  'relationship' => 'travelguides_billing',
  'source' => 'non-db',
  'vname' => 'LBL_TRAVELGUIDES_BILLING_FROM_TRAVELGUIDES_TITLE',
);
$dictionary["Billing"]["fields"]["travelguides_billing_name"] = array (
  'name' => 'travelguides_billing_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TRAVELGUIDES_BILLING_FROM_TRAVELGUIDES_TITLE',
  'save' => true,
  'id_name' => 'travelguidac2dlguides_ida',
  'link' => 'travelguides_billing',
  'table' => 'travelguides',
  'module' => 'TravelGuides',
  'rname' => 'name',
);
$dictionary["Billing"]["fields"]["travelguidac2dlguides_ida"] = array (
  'name' => 'travelguidac2dlguides_ida',
  'type' => 'link',
  'relationship' => 'travelguides_billing',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TRAVELGUIDES_BILLING_FROM_BILLING_TITLE',
);
