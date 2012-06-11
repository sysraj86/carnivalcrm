<?php
// created: 2011-10-18 18:15:44
$dictionary["Hotels"]["fields"]["countries_hotels"] = array (
  'name' => 'countries_hotels',
  'type' => 'link',
  'relationship' => 'countries_hotels',
  'source' => 'non-db',
  'vname' => 'LBL_COUNTRIES_HOTELS_FROM_COUNTRIES_TITLE',
);
$dictionary["Hotels"]["fields"]["countries_hotels_name"] = array (
  'name' => 'countries_hotels_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_COUNTRIES_HOTELS_FROM_COUNTRIES_TITLE',
  'save' => true,
  'id_name' => 'countries_d511untries_ida',
  'link' => 'countries_hotels',
  'table' => 'countries',
  'module' => 'Countries',
  'rname' => 'name',
);
$dictionary["Hotels"]["fields"]["countries_d511untries_ida"] = array (
  'name' => 'countries_d511untries_ida',
  'type' => 'link',
  'relationship' => 'countries_hotels',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_COUNTRIES_HOTELS_FROM_HOTELS_TITLE',
);
