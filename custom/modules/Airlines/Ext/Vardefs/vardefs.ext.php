<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-08-19 11:20:00
$dictionary["Airline"]["fields"]["airlines_activities_calls"] = array (
  'name' => 'airlines_activities_calls',
  'type' => 'link',
  'relationship' => 'airlines_activities_calls',
  'source' => 'non-db',
);


// created: 2011-08-19 11:20:06
$dictionary["Airline"]["fields"]["airlines_activities_emails"] = array (
  'name' => 'airlines_activities_emails',
  'type' => 'link',
  'relationship' => 'airlines_activities_emails',
  'source' => 'non-db',
);


// created: 2011-08-19 11:20:01
$dictionary["Airline"]["fields"]["airlines_activities_meetings"] = array (
  'name' => 'airlines_activities_meetings',
  'type' => 'link',
  'relationship' => 'airlines_activities_meetings',
  'source' => 'non-db',
);


// created: 2011-08-19 11:20:03
$dictionary["Airline"]["fields"]["airlines_activities_notes"] = array (
  'name' => 'airlines_activities_notes',
  'type' => 'link',
  'relationship' => 'airlines_activities_notes',
  'source' => 'non-db',
);


// created: 2011-08-19 11:20:04
$dictionary["Airline"]["fields"]["airlines_activities_tasks"] = array (
  'name' => 'airlines_activities_tasks',
  'type' => 'link',
  'relationship' => 'airlines_activities_tasks',
  'source' => 'non-db',
);


// created: 2011-09-06 15:05:38
$dictionary["Airline"]["fields"]["airlines_airlinestickets"] = array (
  'name' => 'airlines_airlinestickets',
  'type' => 'link',
  'relationship' => 'airlines_airlinestickets',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_AIRLINES_AIRLINESTICKETS_FROM_AIRLINESTICKETS_TITLE',
);


// created: 2011-08-19 11:21:27
$dictionary["Airline"]["fields"]["airlines_billing"] = array (
  'name' => 'airlines_billing',
  'type' => 'link',
  'relationship' => 'airlines_billing',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_AIRLINES_BILLING_FROM_BILLING_TITLE',
);


// created: 2011-11-21 16:47:46
$dictionary["Airline"]["fields"]["airlines_commentairlines"] = array (
  'name' => 'airlines_commentairlines',
  'type' => 'link',
  'relationship' => 'airlines_commentairlines',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_AIRLINES_COMMENTAIRLINES_FROM_COMMENTAIRLINES_TITLE',
);


// created: 2011-08-19 11:22:38
$dictionary["Airline"]["fields"]["airlines_contacts"] = array (
  'name' => 'airlines_contacts',
  'type' => 'link',
  'relationship' => 'airlines_contacts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_AIRLINES_CONTACTS_FROM_CONTACTS_TITLE',
);


// created: 2011-09-06 12:32:50
$dictionary["Airline"]["fields"]["airlines_tiexchangeorders"] = array (
  'name' => 'airlines_tiexchangeorders',
  'type' => 'link',
  'relationship' => 'airlines_ticketexchangeorders',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_AIRLINES_TICKETEXCHANGEORDERS_FROM_TICKETEXCHANGEORDERS_TITLE',
);


// created: 2011-09-09 10:08:10
$dictionary["Airline"]["fields"]["airlines_ticketorder"] = array (
  'name' => 'airlines_ticketorder',
  'type' => 'link',
  'relationship' => 'airlines_ticketorder',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_AIRLINES_TICKETORDER_FROM_TICKETORDER_TITLE',
);


// created: 2011-08-19 10:46:04
$dictionary["Airline"]["fields"]["tours_airlines"] = array (
  'name' => 'tours_airlines',
  'type' => 'link',
  'relationship' => 'tours_airlines',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_AIRLINES_FROM_TOURS_TITLE',
);
$dictionary["Airline"]["fields"]["tours_airlines_name"] = array (
  'name' => 'tours_airlines_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_AIRLINES_FROM_TOURS_TITLE',
  'save' => true,
  'id_name' => 'tours_airl69b4estours_ida',
  'link' => 'tours_airlines',
  'table' => 'tours',
  'module' => 'Tours',
  'rname' => 'name',
);
$dictionary["Airline"]["fields"]["tours_airl69b4estours_ida"] = array (
  'name' => 'tours_airl69b4estours_ida',
  'type' => 'link',
  'relationship' => 'tours_airlines',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TOURS_AIRLINES_FROM_AIRLINES_TITLE',
);

?>