<?php
// created: 2011-08-19 11:04:24
$dictionary["Contact"]["fields"]["restaurants_contacts"] = array (
  'name' => 'restaurants_contacts',
  'type' => 'link',
  'relationship' => 'restaurants_contacts',
  'source' => 'non-db',
  'vname' => 'LBL_RESTAURANTS_CONTACTS_FROM_RESTAURANTS_TITLE',
);
$dictionary["Contact"]["fields"]["restaurants_contacts_name"] = array (
  'name' => 'restaurants_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_RESTAURANTS_CONTACTS_FROM_RESTAURANTS_TITLE',
  'save' => true,
  'id_name' => 'restaurantd2e4aurants_ida',
  'link' => 'restaurants_contacts',
  'table' => 'restaurants',
  'module' => 'Restaurants',
  'rname' => 'name',
);
$dictionary["Contact"]["fields"]["restaurantd2e4aurants_ida"] = array (
  'name' => 'restaurantd2e4aurants_ida',
  'type' => 'link',
  'relationship' => 'restaurants_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_RESTAURANTS_CONTACTS_FROM_CONTACTS_TITLE',
);
