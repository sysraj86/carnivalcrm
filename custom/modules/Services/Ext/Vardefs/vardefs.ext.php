<?php 
 //WARNING: The contents of this file are auto-generated


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


// created: 2011-11-01 09:21:00
$dictionary["Services"]["fields"]["services_activities_calls"] = array (
  'name' => 'services_activities_calls',
  'type' => 'link',
  'relationship' => 'services_activities_calls',
  'source' => 'non-db',
);


// created: 2011-11-01 09:21:31
$dictionary["Services"]["fields"]["services_activities_emails"] = array (
  'name' => 'services_activities_emails',
  'type' => 'link',
  'relationship' => 'services_activities_emails',
  'source' => 'non-db',
);


// created: 2011-11-01 09:21:08
$dictionary["Services"]["fields"]["services_activities_meetings"] = array (
  'name' => 'services_activities_meetings',
  'type' => 'link',
  'relationship' => 'services_activities_meetings',
  'source' => 'non-db',
);


// created: 2011-11-01 09:21:16
$dictionary["Services"]["fields"]["services_activities_notes"] = array (
  'name' => 'services_activities_notes',
  'type' => 'link',
  'relationship' => 'services_activities_notes',
  'source' => 'non-db',
);


// created: 2011-11-01 09:21:24
$dictionary["Services"]["fields"]["services_activities_tasks"] = array (
  'name' => 'services_activities_tasks',
  'type' => 'link',
  'relationship' => 'services_activities_tasks',
  'source' => 'non-db',
);


// created: 2011-11-01 09:19:33
$dictionary["Services"]["fields"]["services_contacts"] = array (
  'name' => 'services_contacts',
  'type' => 'link',
  'relationship' => 'services_contacts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_SERVICES_CONTACTS_FROM_CONTACTS_TITLE',
);


// created: 2012-08-06 15:50:49
$dictionary["Services"]["fields"]["services_servicebookings"] = array (
  'name' => 'services_servicebookings',
  'type' => 'link',
  'relationship' => 'services_servicebookings',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_SERVICES_SERVICEBOOKINGS_FROM_SERVICEBOOKINGS_TITLE',
);


// created: 2011-12-06 08:51:25
$dictionary["Services"]["fields"]["tours_services"] = array (
  'name' => 'tours_services',
  'type' => 'link',
  'relationship' => 'tours_services',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_SERVICES_FROM_TOURS_TITLE',
);

?>