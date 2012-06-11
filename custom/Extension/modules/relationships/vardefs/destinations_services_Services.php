<?php
// created: 2011-11-01 14:20:09
$dictionary["Services"]["fields"]["destinations_services"] = array (
  'name' => 'destinations_services',
  'type' => 'link',
  'relationship' => 'destinations_services',
  'source' => 'non-db',
  'vname' => 'LBL_DESTINATIONS_SERVICES_FROM_DESTINATIONS_TITLE',
);
$dictionary["Services"]["fields"]["destination_services_name"] = array (
  'name' => 'destination_services_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_DESTINATIONS_SERVICES_FROM_DESTINATIONS_TITLE',
  'save' => true,
  'id_name' => 'destinatioe07anations_ida',
  'link' => 'destinations_services',
  'table' => 'destinations',
  'module' => 'Destinations',
  'rname' => 'name',
);
$dictionary["Services"]["fields"]["destinatioe07anations_ida"] = array (
  'name' => 'destinatioe07anations_ida',
  'type' => 'link',
  'relationship' => 'destinations_services',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_DESTINATIONS_SERVICES_FROM_SERVICES_TITLE',
);
