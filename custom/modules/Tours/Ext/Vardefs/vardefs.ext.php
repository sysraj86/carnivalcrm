<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-10-21 10:42:20
$dictionary["Tour"]["fields"]["accounts_tours"] = array (
  'name' => 'accounts_tours',
  'type' => 'link',
  'relationship' => 'accounts_tours',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_TOURS_FROM_ACCOUNTS_TITLE',
);
$dictionary["Tour"]["fields"]["accounts_tours_name"] = array (
  'name' => 'accounts_tours_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_TOURS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_t4d21ccounts_ida',
  'link' => 'accounts_tours',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["Tour"]["fields"]["accounts_t4d21ccounts_ida"] = array (
  'name' => 'accounts_t4d21ccounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_tours',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_TOURS_FROM_TOURS_TITLE',
);


// created: 2011-08-19 10:28:21
$dictionary["Tour"]["fields"]["fits_tours"] = array (
  'name' => 'fits_tours',
  'type' => 'link',
  'relationship' => 'fits_tours',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_TOURS_FROM_FITS_TITLE',
);
$dictionary["Tour"]["fields"]["fits_tours_name"] = array (
  'name' => 'fits_tours_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_TOURS_FROM_FITS_TITLE',
  'save' => true,
  'id_name' => 'fits_tours3769ursfits_ida',
  'link' => 'fits_tours',
  'table' => 'fits',
  'module' => 'FITs',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Tour"]["fields"]["fits_tours3769ursfits_ida"] = array (
  'name' => 'fits_tours3769ursfits_ida',
  'type' => 'link',
  'relationship' => 'fits_tours',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FITS_TOURS_FROM_TOURS_TITLE',
);


// created: 2011-09-06 11:44:45
$dictionary["Tour"]["fields"]["quotes_tours"] = array (
  'name' => 'quotes_tours',
  'type' => 'link',
  'relationship' => 'quotes_tours',
  'source' => 'non-db',
  'vname' => 'LBL_QUOTES_TOURS_FROM_QUOTES_TITLE',
);
$dictionary["Tour"]["fields"]["quotes_tours_name"] = array (
  'name' => 'quotes_tours_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_QUOTES_TOURS_FROM_QUOTES_TITLE',
  'save' => true,
  'id_name' => 'quotes_toue0b3squotes_ida',
  'link' => 'quotes_tours',
  'table' => 'quotes',
  'module' => 'Quotes',
  'rname' => 'name',
);
$dictionary["Tour"]["fields"]["quotes_toue0b3squotes_ida"] = array (
  'name' => 'quotes_toue0b3squotes_ida',
  'type' => 'link',
  'relationship' => 'quotes_tours',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_QUOTES_TOURS_FROM_QUOTES_TITLE',
);


// created: 2011-08-08 10:22:17
$dictionary["Tour"]["fields"]["tours_accounts"] = array (
  'name' => 'tours_accounts',
  'type' => 'link',
  'relationship' => 'tours_accounts',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
);


// created: 2011-08-19 10:40:14
$dictionary["Tour"]["fields"]["tours_activities_calls"] = array (
  'name' => 'tours_activities_calls',
  'type' => 'link',
  'relationship' => 'tours_activities_calls',
  'source' => 'non-db',
);


// created: 2011-08-19 10:40:18
$dictionary["Tour"]["fields"]["tours_activities_emails"] = array (
  'name' => 'tours_activities_emails',
  'type' => 'link',
  'relationship' => 'tours_activities_emails',
  'source' => 'non-db',
);


// created: 2011-08-19 10:40:15
$dictionary["Tour"]["fields"]["tours_activities_meetings"] = array (
  'name' => 'tours_activities_meetings',
  'type' => 'link',
  'relationship' => 'tours_activities_meetings',
  'source' => 'non-db',
);


// created: 2011-08-19 10:40:16
$dictionary["Tour"]["fields"]["tours_activities_notes"] = array (
  'name' => 'tours_activities_notes',
  'type' => 'link',
  'relationship' => 'tours_activities_notes',
  'source' => 'non-db',
);


// created: 2011-08-19 10:40:17
$dictionary["Tour"]["fields"]["tours_activities_tasks"] = array (
  'name' => 'tours_activities_tasks',
  'type' => 'link',
  'relationship' => 'tours_activities_tasks',
  'source' => 'non-db',
);


// created: 2012-03-14 15:47:46
$dictionary["Tour"]["fields"]["tours_airlinestickets_1"] = array (
  'name' => 'tours_airlinestickets_1',
  'type' => 'link',
  'relationship' => 'tours_airlinestickets_1',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_AIRLINESTICKETS_1_FROM_AIRLINESTICKETS_TITLE',
);


// created: 2011-12-20 09:20:57
$dictionary["Tour"]["fields"]["tours_airlinestickets"] = array (
  'name' => 'tours_airlinestickets',
  'type' => 'link',
  'relationship' => 'tours_airlinestickets',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_TOURS_AIRLINESTICKETS_FROM_AIRLINESTICKETS_TITLE',
);


// created: 2011-08-19 10:46:04
$dictionary["Tour"]["fields"]["tours_airlines"] = array (
  'name' => 'tours_airlines',
  'type' => 'link',
  'relationship' => 'tours_airlines',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_TOURS_AIRLINES_FROM_AIRLINES_TITLE',
);


// created: 2011-08-19 10:47:02
$dictionary["Tour"]["fields"]["tours_billing"] = array (
  'name' => 'tours_billing',
  'type' => 'link',
  'relationship' => 'tours_billing',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_TOURS_BILLING_FROM_BILLING_TITLE',
);


// created: 2011-12-21 08:48:30
$dictionary["Tour"]["fields"]["tours_cars"] = array (
  'name' => 'tours_cars',
  'type' => 'link',
  'relationship' => 'tours_cars',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_CARS_FROM_CARS_TITLE',
);


// created: 2012-09-28 12:06:17
$dictionary["Tour"]["fields"]["tours_contractappendixs"] = array (
  'name' => 'tours_contractappendixs',
  'type' => 'link',
  'relationship' => 'tours_contractappendixs',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_TOURS_CONTRACTAPPENDIXS_FROM_CONTRACTAPPENDIXS_TITLE',
);


// created: 2011-08-05 11:50:06
$dictionary["Tour"]["fields"]["tours_contracts"] = array (
  'name' => 'tours_contracts',
  'type' => 'link',
  'relationship' => 'tours_contracts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_TOURS_CONTRACTS_FROM_CONTRACTS_TITLE',
);


// created: 2012-01-10 09:17:34
$dictionary["Tour"]["fields"]["tours_costguides"] = array (
  'name' => 'tours_costguides',
  'type' => 'link',
  'relationship' => 'tours_costguides',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_TOURS_COSTGUIDES_FROM_COSTGUIDES_TITLE',
);


// created: 2011-12-12 15:39:15
$dictionary["Tour"]["fields"]["tours_destinations"] = array (
  'name' => 'tours_destinations',
  'type' => 'link',
  'relationship' => 'tours_destinations',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_DESTINATIONS_FROM_DESTINATIONS_TITLE',
);


// created: 2011-08-08 11:54:02
$dictionary["Tour"]["fields"]["tours_fits"] = array (
  'name' => 'tours_fits',
  'type' => 'link',
  'relationship' => 'tours_fits',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_FITS_FROM_FITS_TITLE',
);


// created: 2011-08-05 11:51:56
$dictionary["Tour"]["fields"]["tours_groupprograms"] = array (
  'name' => 'tours_groupprograms',
  'type' => 'link',
  'relationship' => 'tours_groupprograms',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_TOURS_GROUPPROGRAMS_FROM_GROUPPROGRAMS_TITLE',
);


// created: 2011-12-21 08:44:32
$dictionary["Tour"]["fields"]["tours_hotels"] = array (
  'name' => 'tours_hotels',
  'type' => 'link',
  'relationship' => 'tours_hotels',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_HOTELS_FROM_HOTELS_TITLE',
);


// created: 2011-12-12 15:42:52
$dictionary["Tour"]["fields"]["tours_locations"] = array (
  'name' => 'tours_locations',
  'type' => 'link',
  'relationship' => 'tours_locations',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_LOCATIONS_FROM_LOCATIONS_TITLE',
);


// created: 2011-08-19 10:41:51
$dictionary["Tour"]["fields"]["tours_oders"] = array (
  'name' => 'tours_oders',
  'type' => 'link',
  'relationship' => 'tours_oders',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_TOURS_ODERS_FROM_ODERS_TITLE',
);


// created: 2011-12-21 08:47:00
$dictionary["Tour"]["fields"]["tours_restaurants"] = array (
  'name' => 'tours_restaurants',
  'type' => 'link',
  'relationship' => 'tours_restaurants',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_RESTAURANTS_FROM_RESTAURANTS_TITLE',
);


// created: 2011-12-06 08:51:25
$dictionary["Tour"]["fields"]["tours_services"] = array (
  'name' => 'tours_services',
  'type' => 'link',
  'relationship' => 'tours_services',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_SERVICES_FROM_SERVICES_TITLE',
);

?>