<?php 
 //WARNING: The contents of this file are auto-generated


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


// created: 2011-10-18 18:10:42
$dictionary["Hotels"]["fields"]["destinations_hotels"] = array (
  'name' => 'destinations_hotels',
  'type' => 'link',
  'relationship' => 'destinations_hotels',
  'source' => 'non-db',
  'vname' => 'LBL_DESTINATIONS_HOTELS_FROM_DESTINATIONS_TITLE',
);
$dictionary["Hotels"]["fields"]["destinations_hotels_name"] = array (
  'name' => 'destinations_hotels_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_DESTINATIONS_HOTELS_FROM_DESTINATIONS_TITLE',
  'save' => true,
  'id_name' => 'destinatio6fe0nations_ida',
  'link' => 'destinations_hotels',
  'table' => 'destinations',
  'module' => 'Destinations',
  'rname' => 'name',
);
$dictionary["Hotels"]["fields"]["destinatio6fe0nations_ida"] = array (
  'name' => 'destinatio6fe0nations_ida',
  'type' => 'link',
  'relationship' => 'destinations_hotels',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_DESTINATIONS_HOTELS_FROM_HOTELS_TITLE',
);


// created: 2011-08-19 11:13:31
$dictionary["Hotels"]["fields"]["hotels_activities_calls"] = array (
  'name' => 'hotels_activities_calls',
  'type' => 'link',
  'relationship' => 'hotels_activities_calls',
  'source' => 'non-db',
);


// created: 2011-08-19 11:13:36
$dictionary["Hotels"]["fields"]["hotels_activities_emails"] = array (
  'name' => 'hotels_activities_emails',
  'type' => 'link',
  'relationship' => 'hotels_activities_emails',
  'source' => 'non-db',
);


// created: 2011-08-19 11:13:32
$dictionary["Hotels"]["fields"]["hotels_activities_meetings"] = array (
  'name' => 'hotels_activities_meetings',
  'type' => 'link',
  'relationship' => 'hotels_activities_meetings',
  'source' => 'non-db',
);


// created: 2011-08-19 11:13:33
$dictionary["Hotels"]["fields"]["hotels_activities_notes"] = array (
  'name' => 'hotels_activities_notes',
  'type' => 'link',
  'relationship' => 'hotels_activities_notes',
  'source' => 'non-db',
);


// created: 2011-08-19 11:13:35
$dictionary["Hotels"]["fields"]["hotels_activities_tasks"] = array (
  'name' => 'hotels_activities_tasks',
  'type' => 'link',
  'relationship' => 'hotels_activities_tasks',
  'source' => 'non-db',
);


// created: 2011-08-19 11:14:20
$dictionary["Hotels"]["fields"]["hotels_billing"] = array (
  'name' => 'hotels_billing',
  'type' => 'link',
  'relationship' => 'hotels_billing',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_HOTELS_BILLING_FROM_BILLING_TITLE',
);


// created: 2011-08-19 11:15:42
$dictionary["Hotels"]["fields"]["hotels_contacts"] = array (
  'name' => 'hotels_contacts',
  'type' => 'link',
  'relationship' => 'hotels_contacts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_HOTELS_CONTACTS_FROM_CONTACTS_TITLE',
);


// created: 2011-10-26 11:39:34
$dictionary["Hotels"]["fields"]["hotels_groupprograms"] = array (
  'name' => 'hotels_groupprograms',
  'type' => 'link',
  'relationship' => 'hotels_groupprograms',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_HOTELS_GROUPPROGRAMS_FROM_GROUPPROGRAMS_TITLE',
);


// created: 2011-08-24 10:09:40
$dictionary["Hotels"]["fields"]["hotels_roombookings"] = array (
  'name' => 'hotels_roombookings',
  'type' => 'link',
  'relationship' => 'hotels_roombookings',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_HOTELS_ROOMBOOKINGS_FROM_ROOMBOOKINGS_TITLE',
);


// created: 2011-12-21 08:44:32
$dictionary["Hotels"]["fields"]["tours_hotels"] = array (
  'name' => 'tours_hotels',
  'type' => 'link',
  'relationship' => 'tours_hotels',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_HOTELS_FROM_TOURS_TITLE',
);

?>