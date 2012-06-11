<?php
// created: 2011-08-19 16:16:42
$dictionary["Destination"]["fields"]["countries_destinations"] = array (
  'name' => 'countries_destinations',
  'type' => 'link',
  'relationship' => 'countries_destinations',
  'source' => 'non-db',
  'vname' => 'LBL_COUNTRIES_DESTINATIONS_FROM_COUNTRIES_TITLE',
);
$dictionary["Destination"]["fields"]["countries_dtinations_name"] = array (
  'name' => 'countries_dtinations_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_COUNTRIES_DESTINATIONS_FROM_COUNTRIES_TITLE',
  'save' => true,
  'id_name' => 'countries_5a12untries_ida',
  'link' => 'countries_destinations',
  'table' => 'countries',
  'module' => 'Countries',
  'rname' => 'name',
);
$dictionary["Destination"]["fields"]["countries_5a12untries_ida"] = array (
  'name' => 'countries_5a12untries_ida',
  'type' => 'link',
  'relationship' => 'countries_destinations',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_COUNTRIES_DESTINATIONS_FROM_DESTINATIONS_TITLE',
);
