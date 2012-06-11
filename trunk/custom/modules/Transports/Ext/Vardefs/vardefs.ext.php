<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-12-14 17:44:23
$dictionary["Transport"]["fields"]["billing_transports"] = array (
  'name' => 'billing_transports',
  'type' => 'link',
  'relationship' => 'billing_transports',
  'source' => 'non-db',
  'vname' => 'LBL_BILLING_TRANSPORTS_FROM_BILLING_TITLE',
);
$dictionary["Transport"]["fields"]["billing_transports_name"] = array (
  'name' => 'billing_transports_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_BILLING_TRANSPORTS_FROM_BILLING_TITLE',
  'save' => true,
  'id_name' => 'billing_trdb38billing_ida',
  'link' => 'billing_transports',
  'table' => 'billing',
  'module' => 'Billing',
  'rname' => 'name',
);
$dictionary["Transport"]["fields"]["billing_trdb38billing_ida"] = array (
  'name' => 'billing_trdb38billing_ida',
  'type' => 'link',
  'relationship' => 'billing_transports',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_BILLING_TRANSPORTS_FROM_TRANSPORTS_TITLE',
);


// created: 2011-10-26 10:56:10
$dictionary["Transport"]["fields"]["countries_transports"] = array (
  'name' => 'countries_transports',
  'type' => 'link',
  'relationship' => 'countries_transports',
  'source' => 'non-db',
  'vname' => 'LBL_COUNTRIES_TRANSPORTS_FROM_COUNTRIES_TITLE',
);
$dictionary["Transport"]["fields"]["countries_transports_name"] = array (
  'name' => 'countries_transports_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_COUNTRIES_TRANSPORTS_FROM_COUNTRIES_TITLE',
  'save' => true,
  'id_name' => 'countries_f24buntries_ida',
  'link' => 'countries_transports',
  'table' => 'countries',
  'module' => 'Countries',
  'rname' => 'name',
);
$dictionary["Transport"]["fields"]["countries_f24buntries_ida"] = array (
  'name' => 'countries_f24buntries_ida',
  'type' => 'link',
  'relationship' => 'countries_transports',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_COUNTRIES_TRANSPORTS_FROM_TRANSPORTS_TITLE',
);


// created: 2011-10-26 10:52:10
$dictionary["Transport"]["fields"]["destinations_transports"] = array (
  'name' => 'destinations_transports',
  'type' => 'link',
  'relationship' => 'destinations_transports',
  'source' => 'non-db',
  'vname' => 'LBL_DESTINATIONS_TRANSPORTS_FROM_DESTINATIONS_TITLE',
);
$dictionary["Transport"]["fields"]["destinationransports_name"] = array (
  'name' => 'destinationransports_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_DESTINATIONS_TRANSPORTS_FROM_DESTINATIONS_TITLE',
  'save' => true,
  'id_name' => 'destinatio458bnations_ida',
  'link' => 'destinations_transports',
  'table' => 'destinations',
  'module' => 'Destinations',
  'rname' => 'name',
);
$dictionary["Transport"]["fields"]["destinatio458bnations_ida"] = array (
  'name' => 'destinatio458bnations_ida',
  'type' => 'link',
  'relationship' => 'destinations_transports',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_DESTINATIONS_TRANSPORTS_FROM_TRANSPORTS_TITLE',
);


// created: 2011-08-23 12:43:27
$dictionary["Transport"]["fields"]["transports_activities_calls"] = array (
  'name' => 'transports_activities_calls',
  'type' => 'link',
  'relationship' => 'transports_activities_calls',
  'source' => 'non-db',
);


// created: 2011-08-23 12:43:37
$dictionary["Transport"]["fields"]["transports_activities_emails"] = array (
  'name' => 'transports_activities_emails',
  'type' => 'link',
  'relationship' => 'transports_activities_emails',
  'source' => 'non-db',
);


// created: 2011-08-23 12:43:29
$dictionary["Transport"]["fields"]["transports_activities_meetings"] = array (
  'name' => 'transports_activities_meetings',
  'type' => 'link',
  'relationship' => 'transports_activities_meetings',
  'source' => 'non-db',
);


// created: 2011-08-23 12:43:32
$dictionary["Transport"]["fields"]["transports_activities_notes"] = array (
  'name' => 'transports_activities_notes',
  'type' => 'link',
  'relationship' => 'transports_activities_notes',
  'source' => 'non-db',
);


// created: 2011-08-23 12:43:34
$dictionary["Transport"]["fields"]["transports_activities_tasks"] = array (
  'name' => 'transports_activities_tasks',
  'type' => 'link',
  'relationship' => 'transports_activities_tasks',
  'source' => 'non-db',
);


// created: 2011-12-14 18:10:08
$dictionary["Transport"]["fields"]["transports_billing_1"] = array (
  'name' => 'transports_billing_1',
  'type' => 'link',
  'relationship' => 'transports_billing_1',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_TRANSPORTS_BILLING_1_FROM_BILLING_TITLE',
);


// created: 2011-12-14 18:08:58
$dictionary["Transport"]["fields"]["transports_billing"] = array (
  'name' => 'transports_billing',
  'type' => 'link',
  'relationship' => 'transports_billing',
  'source' => 'non-db',
  'vname' => 'LBL_TRANSPORTS_BILLING_FROM_BILLING_TITLE',
);


// created: 2011-11-09 10:14:26
$dictionary["Transport"]["fields"]["transports_cars"] = array (
  'name' => 'transports_cars',
  'type' => 'link',
  'relationship' => 'transports_cars',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_TRANSPORTS_CARS_FROM_CARS_TITLE',
);


// created: 2011-09-27 09:30:40
$dictionary["Transport"]["fields"]["transports_contacts"] = array (
  'name' => 'transports_contacts',
  'type' => 'link',
  'relationship' => 'transports_contacts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_TRANSPORTS_CONTACTS_FROM_CONTACTS_TITLE',
);


// created: 2011-09-10 08:39:23
$dictionary["Transport"]["fields"]["transports_nsportbookings"] = array (
  'name' => 'transports_nsportbookings',
  'type' => 'link',
  'relationship' => 'transports_transportbookings',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_TRANSPORTS_TRANSPORTBOOKINGS_FROM_TRANSPORTBOOKINGS_TITLE',
);

?>