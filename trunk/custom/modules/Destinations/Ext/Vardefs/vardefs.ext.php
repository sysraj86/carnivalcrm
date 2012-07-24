<?php 
 //WARNING: The contents of this file are auto-generated


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


// created: 2012-03-02 11:57:23
$dictionary["Destination"]["fields"]["c_areas_destinations"] = array (
  'name' => 'c_areas_destinations',
  'type' => 'link',
  'relationship' => 'c_areas_destinations',
  'source' => 'non-db',
  'vname' => 'LBL_C_AREAS_DESTINATIONS_FROM_C_AREAS_TITLE',
);
$dictionary["Destination"]["fields"]["c_areas_destinations_name"] = array (
  'name' => 'c_areas_destinations_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_AREAS_DESTINATIONS_FROM_C_AREAS_TITLE',
  'save' => true,
  'id_name' => 'c_areas_de9d4fc_areas_ida',
  'link' => 'c_areas_destinations',
  'table' => 'c_areas',
  'module' => 'C_Areas',
  'rname' => 'name',
);
$dictionary["Destination"]["fields"]["c_areas_de9d4fc_areas_ida"] = array (
  'name' => 'c_areas_de9d4fc_areas_ida',
  'type' => 'link',
  'relationship' => 'c_areas_destinations',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_C_AREAS_DESTINATIONS_FROM_DESTINATIONS_TITLE',
);


// created: 2011-10-18 18:10:42
$dictionary["Destination"]["fields"]["destinations_hotels"] = array (
  'name' => 'destinations_hotels',
  'type' => 'link',
  'relationship' => 'destinations_hotels',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_DESTINATIONS_HOTELS_FROM_HOTELS_TITLE',
);


// created: 2011-08-19 16:15:29
$dictionary["Destination"]["fields"]["destinations_locations"] = array (
  'name' => 'destinations_locations',
  'type' => 'link',
  'relationship' => 'destinations_locations',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_DESTINATIONS_LOCATIONS_FROM_LOCATIONS_TITLE',
);


// created: 2011-10-18 18:13:25
$dictionary["Destination"]["fields"]["destinations_restaurants"] = array (
  'name' => 'destinations_restaurants',
  'type' => 'link',
  'relationship' => 'destinations_restaurants',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_DESTINATIONS_RESTAURANTS_FROM_RESTAURANTS_TITLE',
);


// created: 2011-11-01 14:20:09
$dictionary["Destination"]["fields"]["destinations_services"] = array (
  'name' => 'destinations_services',
  'type' => 'link',
  'relationship' => 'destinations_services',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_DESTINATIONS_SERVICES_FROM_SERVICES_TITLE',
);


// created: 2011-10-26 10:52:10
$dictionary["Destination"]["fields"]["destinations_transports"] = array (
  'name' => 'destinations_transports',
  'type' => 'link',
  'relationship' => 'destinations_transports',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_DESTINATIONS_TRANSPORTS_FROM_TRANSPORTS_TITLE',
);


 // created: 2012-07-24 11:20:20
$dictionary['Destination']['fields']['area']['massupdate']=1;

 

 // created: 2012-07-24 11:20:20
$dictionary['Destination']['fields']['city_province']['massupdate']=0;

 

 // created: 2012-07-24 11:20:20
$dictionary['Destination']['fields']['countries_dtinations_name']['massupdate']=1;

 

 // created: 2012-07-24 11:20:20
$dictionary['Destination']['fields']['country']['massupdate']=0;

 

 // created: 2012-07-24 11:20:20
$dictionary['Destination']['fields']['c_areas_destinations_name']['massupdate']=1;

 

 // created: 2011-07-29 11:01:45

 

// created: 2011-12-12 15:39:15
$dictionary["Destination"]["fields"]["tours_destinations"] = array (
  'name' => 'tours_destinations',
  'type' => 'link',
  'relationship' => 'tours_destinations',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_DESTINATIONS_FROM_TOURS_TITLE',
);

?>