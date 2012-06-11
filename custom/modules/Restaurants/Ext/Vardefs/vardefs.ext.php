<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-10-18 18:17:09
$dictionary["Restaurants"]["fields"]["countries_restaurants"] = array (
  'name' => 'countries_restaurants',
  'type' => 'link',
  'relationship' => 'countries_restaurants',
  'source' => 'non-db',
  'vname' => 'LBL_COUNTRIES_RESTAURANTS_FROM_COUNTRIES_TITLE',
);
$dictionary["Restaurants"]["fields"]["countries_rstaurants_name"] = array (
  'name' => 'countries_rstaurants_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_COUNTRIES_RESTAURANTS_FROM_COUNTRIES_TITLE',
  'save' => true,
  'id_name' => 'countries_8307untries_ida',
  'link' => 'countries_restaurants',
  'table' => 'countries',
  'module' => 'Countries',
  'rname' => 'name',
);
$dictionary["Restaurants"]["fields"]["countries_8307untries_ida"] = array (
  'name' => 'countries_8307untries_ida',
  'type' => 'link',
  'relationship' => 'countries_restaurants',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_COUNTRIES_RESTAURANTS_FROM_RESTAURANTS_TITLE',
);


// created: 2011-10-18 18:13:25
$dictionary["Restaurants"]["fields"]["destinations_restaurants"] = array (
  'name' => 'destinations_restaurants',
  'type' => 'link',
  'relationship' => 'destinations_restaurants',
  'source' => 'non-db',
  'vname' => 'LBL_DESTINATIONS_RESTAURANTS_FROM_DESTINATIONS_TITLE',
);
$dictionary["Restaurants"]["fields"]["destinationstaurants_name"] = array (
  'name' => 'destinationstaurants_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_DESTINATIONS_RESTAURANTS_FROM_DESTINATIONS_TITLE',
  'save' => true,
  'id_name' => 'destinatio9a61nations_ida',
  'link' => 'destinations_restaurants',
  'table' => 'destinations',
  'module' => 'Destinations',
  'rname' => 'name',
);
$dictionary["Restaurants"]["fields"]["destinatio9a61nations_ida"] = array (
  'name' => 'destinatio9a61nations_ida',
  'type' => 'link',
  'relationship' => 'destinations_restaurants',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_DESTINATIONS_RESTAURANTS_FROM_RESTAURANTS_TITLE',
);


// created: 2011-08-19 11:09:42
$dictionary["Restaurants"]["fields"]["restaurants_activities_calls"] = array (
  'name' => 'restaurants_activities_calls',
  'type' => 'link',
  'relationship' => 'restaurants_activities_calls',
  'source' => 'non-db',
);


// created: 2011-08-19 11:09:48
$dictionary["Restaurants"]["fields"]["restaurants_activities_emails"] = array (
  'name' => 'restaurants_activities_emails',
  'type' => 'link',
  'relationship' => 'restaurants_activities_emails',
  'source' => 'non-db',
);


// created: 2011-08-19 11:09:44
$dictionary["Restaurants"]["fields"]["restaurants_activities_meetings"] = array (
  'name' => 'restaurants_activities_meetings',
  'type' => 'link',
  'relationship' => 'restaurants_activities_meetings',
  'source' => 'non-db',
);


// created: 2011-08-19 11:09:45
$dictionary["Restaurants"]["fields"]["restaurants_activities_notes"] = array (
  'name' => 'restaurants_activities_notes',
  'type' => 'link',
  'relationship' => 'restaurants_activities_notes',
  'source' => 'non-db',
);


// created: 2011-08-19 11:09:47
$dictionary["Restaurants"]["fields"]["restaurants_activities_tasks"] = array (
  'name' => 'restaurants_activities_tasks',
  'type' => 'link',
  'relationship' => 'restaurants_activities_tasks',
  'source' => 'non-db',
);


// created: 2011-08-19 11:06:05
$dictionary["Restaurants"]["fields"]["restaurants_billing"] = array (
  'name' => 'restaurants_billing',
  'type' => 'link',
  'relationship' => 'restaurants_billing',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_RESTAURANTS_BILLING_FROM_BILLING_TITLE',
);


// created: 2011-08-19 11:04:24
$dictionary["Restaurants"]["fields"]["restaurants_contacts"] = array (
  'name' => 'restaurants_contacts',
  'type' => 'link',
  'relationship' => 'restaurants_contacts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_RESTAURANTS_CONTACTS_FROM_CONTACTS_TITLE',
);


// created: 2011-09-07 20:30:37
$dictionary["Restaurants"]["fields"]["restaurants_foodmenu_1"] = array (
  'name' => 'restaurants_foodmenu_1',
  'type' => 'link',
  'relationship' => 'restaurants_foodmenu_1',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_RESTAURANTS_FOODMENU_1_FROM_FOODMENU_TITLE',
);


// created: 2011-09-07 20:29:53
$dictionary["Restaurants"]["fields"]["restaurants_foodmenu"] = array (
  'name' => 'restaurants_foodmenu',
  'type' => 'link',
  'relationship' => 'restaurants_foodmenu',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_RESTAURANTS_FOODMENU_FROM_FOODMENU_TITLE',
);


// created: 2011-10-18 18:00:33
$dictionary["Restaurants"]["fields"]["restaurants_groupprograms"] = array (
  'name' => 'restaurants_groupprograms',
  'type' => 'link',
  'relationship' => 'restaurants_groupprograms',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_RESTAURANTS_GROUPPROGRAMS_FROM_GROUPPROGRAMS_TITLE',
);


// created: 2011-08-24 10:11:51
$dictionary["Restaurants"]["fields"]["restaurantservicebookings"] = array (
  'name' => 'restaurantservicebookings',
  'type' => 'link',
  'relationship' => 'restaurants_servicebookings',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_RESTAURANTS_SERVICEBOOKINGS_FROM_SERVICEBOOKINGS_TITLE',
);


// created: 2011-12-21 08:47:00
$dictionary["Restaurants"]["fields"]["tours_restaurants"] = array (
  'name' => 'tours_restaurants',
  'type' => 'link',
  'relationship' => 'tours_restaurants',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_RESTAURANTS_FROM_TOURS_TITLE',
);

?>