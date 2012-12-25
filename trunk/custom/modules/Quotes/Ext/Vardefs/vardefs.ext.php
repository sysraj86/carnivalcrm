<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-09-06 11:29:51
$dictionary["Quotes"]["fields"]["accounts_quotes"] = array (
  'name' => 'accounts_quotes',
  'type' => 'link',
  'relationship' => 'accounts_quotes',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_QUOTES_FROM_ACCOUNTS_TITLE',
);
$dictionary["Quotes"]["fields"]["accounts_quotes_name"] = array (
  'name' => 'accounts_quotes_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_QUOTES_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_qd96cccounts_ida',
  'link' => 'accounts_quotes',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["Quotes"]["fields"]["accounts_qd96cccounts_ida"] = array (
  'name' => 'accounts_qd96cccounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_quotes',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_QUOTES_FROM_QUOTES_TITLE',
);


// created: 2011-09-06 11:38:05
$dictionary["Quotes"]["fields"]["contacts_quotes"] = array (
  'name' => 'contacts_quotes',
  'type' => 'link',
  'relationship' => 'contacts_quotes',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_QUOTES_FROM_CONTACTS_TITLE',
);
$dictionary["Quotes"]["fields"]["contacts_quotes_name"] = array (
  'name' => 'contacts_quotes_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_QUOTES_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_q33a7ontacts_ida',
  'link' => 'contacts_quotes',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Quotes"]["fields"]["contacts_q33a7ontacts_ida"] = array (
  'name' => 'contacts_q33a7ontacts_ida',
  'type' => 'link',
  'relationship' => 'contacts_quotes',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_QUOTES_FROM_QUOTES_TITLE',
);


// created: 2011-09-20 09:12:33
$dictionary["Quotes"]["fields"]["fits_quotes"] = array (
  'name' => 'fits_quotes',
  'type' => 'link',
  'relationship' => 'fits_quotes',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_QUOTES_FROM_FITS_TITLE',
);
$dictionary["Quotes"]["fields"]["fits_quotes_name"] = array (
  'name' => 'fits_quotes_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_QUOTES_FROM_FITS_TITLE',
  'save' => true,
  'id_name' => 'fits_quotedcbetesfits_ida',
  'link' => 'fits_quotes',
  'table' => 'fits',
  'module' => 'FITs',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Quotes"]["fields"]["fits_quotedcbetesfits_ida"] = array (
  'name' => 'fits_quotedcbetesfits_ida',
  'type' => 'link',
  'relationship' => 'fits_quotes',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FITS_QUOTES_FROM_QUOTES_TITLE',
);


// created: 2012-12-22 12:23:38
$dictionary["Quotes"]["fields"]["opportunities_quotes"] = array (
  'name' => 'opportunities_quotes',
  'type' => 'link',
  'relationship' => 'opportunities_quotes',
  'source' => 'non-db',
  'vname' => 'LBL_OPPORTUNITIES_QUOTES_FROM_OPPORTUNITIES_TITLE',
);
$dictionary["Quotes"]["fields"]["opportunities_quotes_name"] = array (
  'name' => 'opportunities_quotes_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_OPPORTUNITIES_QUOTES_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'opportunit9b76unities_ida',
  'link' => 'opportunities_quotes',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
$dictionary["Quotes"]["fields"]["opportunit9b76unities_ida"] = array (
  'name' => 'opportunit9b76unities_ida',
  'type' => 'link',
  'relationship' => 'opportunities_quotes',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_OPPORTUNITIES_QUOTES_FROM_QUOTES_TITLE',
);


// created: 2011-11-28 08:47:50
$dictionary["Quotes"]["fields"]["orders_quotes"] = array (
  'name' => 'orders_quotes',
  'type' => 'link',
  'relationship' => 'orders_quotes',
  'source' => 'non-db',
  'vname' => 'LBL_ORDERS_QUOTES_FROM_ORDERS_TITLE',
);
$dictionary["Quotes"]["fields"]["orders_quotes_name"] = array (
  'name' => 'orders_quotes_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ORDERS_QUOTES_FROM_ORDERS_TITLE',
  'save' => true,
  'id_name' => 'orders_quo2e0asorders_ida',
  'link' => 'orders_quotes',
  'table' => 'orders',
  'module' => 'Orders',
  'rname' => 'name',
);
$dictionary["Quotes"]["fields"]["orders_quo2e0asorders_ida"] = array (
  'name' => 'orders_quo2e0asorders_ida',
  'type' => 'link',
  'relationship' => 'orders_quotes',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ORDERS_QUOTES_FROM_QUOTES_TITLE',
);


// created: 2011-11-11 12:07:20
$dictionary["Quotes"]["fields"]["quotes_activities_calls"] = array (
  'name' => 'quotes_activities_calls',
  'type' => 'link',
  'relationship' => 'quotes_activities_calls',
  'source' => 'non-db',
);


// created: 2011-11-11 12:07:24
$dictionary["Quotes"]["fields"]["quotes_activities_emails"] = array (
  'name' => 'quotes_activities_emails',
  'type' => 'link',
  'relationship' => 'quotes_activities_emails',
  'source' => 'non-db',
);


// created: 2011-11-11 12:07:21
$dictionary["Quotes"]["fields"]["quotes_activities_meetings"] = array (
  'name' => 'quotes_activities_meetings',
  'type' => 'link',
  'relationship' => 'quotes_activities_meetings',
  'source' => 'non-db',
);


// created: 2011-11-11 12:07:22
$dictionary["Quotes"]["fields"]["quotes_activities_notes"] = array (
  'name' => 'quotes_activities_notes',
  'type' => 'link',
  'relationship' => 'quotes_activities_notes',
  'source' => 'non-db',
);


// created: 2011-11-11 12:07:23
$dictionary["Quotes"]["fields"]["quotes_activities_tasks"] = array (
  'name' => 'quotes_activities_tasks',
  'type' => 'link',
  'relationship' => 'quotes_activities_tasks',
  'source' => 'non-db',
);


// created: 2011-09-06 11:46:30
$dictionary["Quotes"]["fields"]["quotes_oders"] = array (
  'name' => 'quotes_oders',
  'type' => 'link',
  'relationship' => 'quotes_oders',
  'source' => 'non-db',
  'vname' => 'LBL_QUOTES_ODERS_FROM_ODERS_TITLE',
);
$dictionary["Quotes"]["fields"]["quotes_oders_name"] = array (
  'name' => 'quotes_oders_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_QUOTES_ODERS_FROM_ODERS_TITLE',
  'save' => true,
  'id_name' => 'quotes_odec393rsoders_idb',
  'link' => 'quotes_oders',
  'table' => 'oders',
  'module' => 'Oders',
  'rname' => 'name',
);
$dictionary["Quotes"]["fields"]["quotes_odec393rsoders_idb"] = array (
  'name' => 'quotes_odec393rsoders_idb',
  'type' => 'link',
  'relationship' => 'quotes_oders',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_QUOTES_ODERS_FROM_ODERS_TITLE',
);


// created: 2011-09-06 11:44:45
$dictionary["Quotes"]["fields"]["quotes_tours"] = array (
  'name' => 'quotes_tours',
  'type' => 'link',
  'relationship' => 'quotes_tours',
  'source' => 'non-db',
  'vname' => 'LBL_QUOTES_TOURS_FROM_TOURS_TITLE',
);
$dictionary["Quotes"]["fields"]["quotes_tours_name"] = array (
  'name' => 'quotes_tours_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_QUOTES_TOURS_FROM_TOURS_TITLE',
  'save' => true,
  'id_name' => 'quotes_toufa8brstours_idb',
  'link' => 'quotes_tours',
  'table' => 'tours',
  'module' => 'Tours',
  'rname' => 'name',
);
$dictionary["Quotes"]["fields"]["quotes_toufa8brstours_idb"] = array (
  'name' => 'quotes_toufa8brstours_idb',
  'type' => 'link',
  'relationship' => 'quotes_tours',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_QUOTES_TOURS_FROM_TOURS_TITLE',
);


// created: 2011-09-06 11:44:45
$dictionary["Quotes"]["fields"]["quotes_status"] = array (
  'name' => 'quotes_status',
  'type' => 'enum',
  'options' => 'quotes_status_dom',
  'vname' => 'LBL_QUOTES_STATUS',
);
?>