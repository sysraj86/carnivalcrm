<?php
// created: 2012-02-18 11:07:24
$dictionary["Services"]["fields"]["countries_services"] = array (
  'name' => 'countries_services',
  'type' => 'link',
  'relationship' => 'countries_services',
  'source' => 'non-db',
  'vname' => 'LBL_COUNTRIES_SERVICES_FROM_COUNTRIES_TITLE',
);
$dictionary["Services"]["fields"]["countries_services_name"] = array (
  'name' => 'countries_services_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_COUNTRIES_SERVICES_FROM_COUNTRIES_TITLE',
  'save' => true,
  'id_name' => 'countries_22abuntries_ida',
  'link' => 'countries_services',
  'table' => 'countries',
  'module' => 'Countries',
  'rname' => 'name',
);
$dictionary["Services"]["fields"]["countries_22abuntries_ida"] = array (
  'name' => 'countries_22abuntries_ida',
  'type' => 'link',
  'relationship' => 'countries_services',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_COUNTRIES_SERVICES_FROM_SERVICES_TITLE',
);
