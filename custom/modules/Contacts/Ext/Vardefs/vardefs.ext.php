<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-08-19 11:22:38
$dictionary["Contact"]["fields"]["airlines_contacts"] = array (
  'name' => 'airlines_contacts',
  'type' => 'link',
  'relationship' => 'airlines_contacts',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINES_CONTACTS_FROM_AIRLINES_TITLE',
);
$dictionary["Contact"]["fields"]["airlines_contacts_name"] = array (
  'name' => 'airlines_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINES_CONTACTS_FROM_AIRLINES_TITLE',
  'save' => true,
  'id_name' => 'airlines_c7d68irlines_ida',
  'link' => 'airlines_contacts',
  'table' => 'airlines',
  'module' => 'Airlines',
  'rname' => 'name',
);
$dictionary["Contact"]["fields"]["airlines_c7d68irlines_ida"] = array (
  'name' => 'airlines_c7d68irlines_ida',
  'type' => 'link',
  'relationship' => 'airlines_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AIRLINES_CONTACTS_FROM_CONTACTS_TITLE',
);


// created: 2011-09-06 11:38:05
$dictionary["Contact"]["fields"]["contacts_quotes"] = array (
  'name' => 'contacts_quotes',
  'type' => 'link',
  'relationship' => 'contacts_quotes',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_QUOTES_FROM_QUOTES_TITLE',
);


// created: 2011-08-19 11:15:42
$dictionary["Contact"]["fields"]["hotels_contacts"] = array (
  'name' => 'hotels_contacts',
  'type' => 'link',
  'relationship' => 'hotels_contacts',
  'source' => 'non-db',
  'vname' => 'LBL_HOTELS_CONTACTS_FROM_HOTELS_TITLE',
);
$dictionary["Contact"]["fields"]["hotels_contacts_name"] = array (
  'name' => 'hotels_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HOTELS_CONTACTS_FROM_HOTELS_TITLE',
  'save' => true,
  'id_name' => 'hotels_con6414shotels_ida',
  'link' => 'hotels_contacts',
  'table' => 'hotels',
  'module' => 'Hotels',
  'rname' => 'name',
);
$dictionary["Contact"]["fields"]["hotels_con6414shotels_ida"] = array (
  'name' => 'hotels_con6414shotels_ida',
  'type' => 'link',
  'relationship' => 'hotels_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HOTELS_CONTACTS_FROM_CONTACTS_TITLE',
);


// created: 2011-08-19 11:04:24
$dictionary["Contact"]["fields"]["restaurants_contacts"] = array (
  'name' => 'restaurants_contacts',
  'type' => 'link',
  'relationship' => 'restaurants_contacts',
  'source' => 'non-db',
  'vname' => 'LBL_RESTAURANTS_CONTACTS_FROM_RESTAURANTS_TITLE',
);
$dictionary["Contact"]["fields"]["restaurants_contacts_name"] = array (
  'name' => 'restaurants_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_RESTAURANTS_CONTACTS_FROM_RESTAURANTS_TITLE',
  'save' => true,
  'id_name' => 'restaurantd2e4aurants_ida',
  'link' => 'restaurants_contacts',
  'table' => 'restaurants',
  'module' => 'Restaurants',
  'rname' => 'name',
);
$dictionary["Contact"]["fields"]["restaurantd2e4aurants_ida"] = array (
  'name' => 'restaurantd2e4aurants_ida',
  'type' => 'link',
  'relationship' => 'restaurants_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_RESTAURANTS_CONTACTS_FROM_CONTACTS_TITLE',
);



$dictionary['Contact']['fields']['SecurityGroups'] = array (
  	'name' => 'SecurityGroups',
    'type' => 'link',
	'relationship' => 'securitygroups_contacts',
	'module'=>'SecurityGroups',
	'bean_name'=>'SecurityGroup',
    'source'=>'non-db',
	'vname'=>'LBL_SECURITYGROUPS',
);






// created: 2011-11-01 09:19:33
$dictionary["Contact"]["fields"]["services_contacts"] = array (
  'name' => 'services_contacts',
  'type' => 'link',
  'relationship' => 'services_contacts',
  'source' => 'non-db',
  'vname' => 'LBL_SERVICES_CONTACTS_FROM_SERVICES_TITLE',
);
$dictionary["Contact"]["fields"]["services_contacts_name"] = array (
  'name' => 'services_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SERVICES_CONTACTS_FROM_SERVICES_TITLE',
  'save' => true,
  'id_name' => 'services_c22c5ervices_ida',
  'link' => 'services_contacts',
  'table' => 'services',
  'module' => 'Services',
  'rname' => 'name',
);
$dictionary["Contact"]["fields"]["services_c22c5ervices_ida"] = array (
  'name' => 'services_c22c5ervices_ida',
  'type' => 'link',
  'relationship' => 'services_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SERVICES_CONTACTS_FROM_CONTACTS_TITLE',
);


// created: 2011-09-27 09:30:40
$dictionary["Contact"]["fields"]["transports_contacts"] = array (
  'name' => 'transports_contacts',
  'type' => 'link',
  'relationship' => 'transports_contacts',
  'source' => 'non-db',
  'vname' => 'LBL_TRANSPORTS_CONTACTS_FROM_TRANSPORTS_TITLE',
);
$dictionary["Contact"]["fields"]["transports_contacts_name"] = array (
  'name' => 'transports_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TRANSPORTS_CONTACTS_FROM_TRANSPORTS_TITLE',
  'save' => true,
  'id_name' => 'transportsb673nsports_ida',
  'link' => 'transports_contacts',
  'table' => 'transports',
  'module' => 'Transports',
  'rname' => 'name',
);
$dictionary["Contact"]["fields"]["transportsb673nsports_ida"] = array (
  'name' => 'transportsb673nsports_ida',
  'type' => 'link',
  'relationship' => 'transports_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TRANSPORTS_CONTACTS_FROM_CONTACTS_TITLE',
);

?>