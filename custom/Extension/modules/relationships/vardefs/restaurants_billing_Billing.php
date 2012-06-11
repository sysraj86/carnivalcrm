<?php
// created: 2011-08-19 11:06:05
$dictionary["Billing"]["fields"]["restaurants_billing"] = array (
  'name' => 'restaurants_billing',
  'type' => 'link',
  'relationship' => 'restaurants_billing',
  'source' => 'non-db',
  'vname' => 'LBL_RESTAURANTS_BILLING_FROM_RESTAURANTS_TITLE',
);
$dictionary["Billing"]["fields"]["restaurants_billing_name"] = array (
  'name' => 'restaurants_billing_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_RESTAURANTS_BILLING_FROM_RESTAURANTS_TITLE',
  'save' => true,
  'id_name' => 'restaurantcc72aurants_ida',
  'link' => 'restaurants_billing',
  'table' => 'restaurants',
  'module' => 'Restaurants',
  'rname' => 'name',
);
$dictionary["Billing"]["fields"]["restaurantcc72aurants_ida"] = array (
  'name' => 'restaurantcc72aurants_ida',
  'type' => 'link',
  'relationship' => 'restaurants_billing',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_RESTAURANTS_BILLING_FROM_BILLING_TITLE',
);
