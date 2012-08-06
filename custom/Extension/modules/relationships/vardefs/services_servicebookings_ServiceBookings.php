<?php
// created: 2012-08-06 15:50:49
$dictionary["ServiceBookings"]["fields"]["services_servicebookings"] = array (
  'name' => 'services_servicebookings',
  'type' => 'link',
  'relationship' => 'services_servicebookings',
  'source' => 'non-db',
  'vname' => 'LBL_SERVICES_SERVICEBOOKINGS_FROM_SERVICES_TITLE',
);
$dictionary["ServiceBookings"]["fields"]["services_seebookings_name"] = array (
  'name' => 'services_seebookings_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SERVICES_SERVICEBOOKINGS_FROM_SERVICES_TITLE',
  'save' => true,
  'id_name' => 'services_sde2fervices_ida',
  'link' => 'services_servicebookings',
  'table' => 'services',
  'module' => 'Services',
  'rname' => 'name',
);
$dictionary["ServiceBookings"]["fields"]["services_sde2fervices_ida"] = array (
  'name' => 'services_sde2fervices_ida',
  'type' => 'link',
  'relationship' => 'services_servicebookings',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SERVICES_SERVICEBOOKINGS_FROM_SERVICEBOOKINGS_TITLE',
);
