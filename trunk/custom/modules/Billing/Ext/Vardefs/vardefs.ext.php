<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-08-19 10:13:01
$dictionary["Billing"]["fields"]["accounts_billing"] = array (
  'name' => 'accounts_billing',
  'type' => 'link',
  'relationship' => 'accounts_billing',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_BILLING_FROM_ACCOUNTS_TITLE',
);
$dictionary["Billing"]["fields"]["accounts_billing_name"] = array (
  'name' => 'accounts_billing_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_BILLING_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_b7c5dccounts_ida',
  'link' => 'accounts_billing',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["Billing"]["fields"]["accounts_b7c5dccounts_ida"] = array (
  'name' => 'accounts_b7c5dccounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_billing',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_BILLING_FROM_BILLING_TITLE',
);


// created: 2011-08-19 11:21:27
$dictionary["Billing"]["fields"]["airlines_billing"] = array (
  'name' => 'airlines_billing',
  'type' => 'link',
  'relationship' => 'airlines_billing',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINES_BILLING_FROM_AIRLINES_TITLE',
);
$dictionary["Billing"]["fields"]["airlines_billing_name"] = array (
  'name' => 'airlines_billing_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINES_BILLING_FROM_AIRLINES_TITLE',
  'save' => true,
  'id_name' => 'airlines_be4f5irlines_ida',
  'link' => 'airlines_billing',
  'table' => 'airlines',
  'module' => 'Airlines',
  'rname' => 'name',
);
$dictionary["Billing"]["fields"]["airlines_be4f5irlines_ida"] = array (
  'name' => 'airlines_be4f5irlines_ida',
  'type' => 'link',
  'relationship' => 'airlines_billing',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AIRLINES_BILLING_FROM_BILLING_TITLE',
);


// created: 2011-12-14 17:44:23
$dictionary["Billing"]["fields"]["billing_transports"] = array (
  'name' => 'billing_transports',
  'type' => 'link',
  'relationship' => 'billing_transports',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_BILLING_TRANSPORTS_FROM_TRANSPORTS_TITLE',
);


// created: 2011-08-19 10:30:15
$dictionary["Billing"]["fields"]["fits_billing"] = array (
  'name' => 'fits_billing',
  'type' => 'link',
  'relationship' => 'fits_billing',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_BILLING_FROM_FITS_TITLE',
);
$dictionary["Billing"]["fields"]["fits_billing_name"] = array (
  'name' => 'fits_billing_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_BILLING_FROM_FITS_TITLE',
  'save' => true,
  'id_name' => 'fits_billie73aingfits_ida',
  'link' => 'fits_billing',
  'table' => 'fits',
  'module' => 'FITs',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Billing"]["fields"]["fits_billie73aingfits_ida"] = array (
  'name' => 'fits_billie73aingfits_ida',
  'type' => 'link',
  'relationship' => 'fits_billing',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FITS_BILLING_FROM_BILLING_TITLE',
);


// created: 2011-08-19 11:00:50
$dictionary["Billing"]["fields"]["groupprograms_billing"] = array (
  'name' => 'groupprograms_billing',
  'type' => 'link',
  'relationship' => 'groupprograms_billing',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_BILLING_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["Billing"]["fields"]["groupprogras_billing_name"] = array (
  'name' => 'groupprogras_billing_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_BILLING_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr28ddrograms_ida',
  'link' => 'groupprograms_billing',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'rname' => 'name',
);
$dictionary["Billing"]["fields"]["groupprogr28ddrograms_ida"] = array (
  'name' => 'groupprogr28ddrograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_billing',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_BILLING_FROM_BILLING_TITLE',
);


// created: 2011-08-19 11:14:20
$dictionary["Billing"]["fields"]["hotels_billing"] = array (
  'name' => 'hotels_billing',
  'type' => 'link',
  'relationship' => 'hotels_billing',
  'source' => 'non-db',
  'vname' => 'LBL_HOTELS_BILLING_FROM_HOTELS_TITLE',
);
$dictionary["Billing"]["fields"]["hotels_billing_name"] = array (
  'name' => 'hotels_billing_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HOTELS_BILLING_FROM_HOTELS_TITLE',
  'save' => true,
  'id_name' => 'hotels_bil8409ghotels_ida',
  'link' => 'hotels_billing',
  'table' => 'hotels',
  'module' => 'Hotels',
  'rname' => 'name',
);
$dictionary["Billing"]["fields"]["hotels_bil8409ghotels_ida"] = array (
  'name' => 'hotels_bil8409ghotels_ida',
  'type' => 'link',
  'relationship' => 'hotels_billing',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HOTELS_BILLING_FROM_BILLING_TITLE',
);


// created: 2011-08-19 11:06:05
$dictionary["Billing"]["fields"]["restaurants_billing"] = array (
  'name' => 'restaurants_billing',
  'type' => 'link',
  'relationship' => 'restaurants_billing',
  'source' => 'non-db',
  'vname' => 'LBL_RESTAURANTS_BILLING_FROM_RESTAURANTS_TITLE',
);
$dictionary["Billing"]["fields"]["restaurants_billing_name"] = array (
  'name' => 'restaurants_billing_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_RESTAURANTS_BILLING_FROM_RESTAURANTS_TITLE',
  'save' => true,
  'id_name' => 'restaurantcc72aurants_ida',
  'link' => 'restaurants_billing',
  'table' => 'restaurants',
  'module' => 'Restaurants',
  'rname' => 'name',
);
$dictionary["Billing"]["fields"]["restaurantcc72aurants_ida"] = array (
  'name' => 'restaurantcc72aurants_ida',
  'type' => 'link',
  'relationship' => 'restaurants_billing',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_RESTAURANTS_BILLING_FROM_BILLING_TITLE',
);


// created: 2011-08-19 10:47:02
$dictionary["Billing"]["fields"]["tours_billing"] = array (
  'name' => 'tours_billing',
  'type' => 'link',
  'relationship' => 'tours_billing',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_BILLING_FROM_TOURS_TITLE',
);
$dictionary["Billing"]["fields"]["tours_billing_name"] = array (
  'name' => 'tours_billing_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_BILLING_FROM_TOURS_TITLE',
  'save' => true,
  'id_name' => 'tours_bill7148ngtours_ida',
  'link' => 'tours_billing',
  'table' => 'tours',
  'module' => 'Tours',
  'rname' => 'name',
);
$dictionary["Billing"]["fields"]["tours_bill7148ngtours_ida"] = array (
  'name' => 'tours_bill7148ngtours_ida',
  'type' => 'link',
  'relationship' => 'tours_billing',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TOURS_BILLING_FROM_BILLING_TITLE',
);


// created: 2011-12-14 18:10:08
$dictionary["Billing"]["fields"]["transports_billing_1"] = array (
  'name' => 'transports_billing_1',
  'type' => 'link',
  'relationship' => 'transports_billing_1',
  'source' => 'non-db',
  'vname' => 'LBL_TRANSPORTS_BILLING_1_FROM_TRANSPORTS_TITLE',
);
$dictionary["Billing"]["fields"]["transports_billing_1_name"] = array (
  'name' => 'transports_billing_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TRANSPORTS_BILLING_1_FROM_TRANSPORTS_TITLE',
  'save' => true,
  'id_name' => 'transports3b29nsports_ida',
  'link' => 'transports_billing_1',
  'table' => 'transports',
  'module' => 'Transports',
  'rname' => 'name',
);
$dictionary["Billing"]["fields"]["transports3b29nsports_ida"] = array (
  'name' => 'transports3b29nsports_ida',
  'type' => 'link',
  'relationship' => 'transports_billing_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TRANSPORTS_BILLING_1_FROM_BILLING_TITLE',
);


// created: 2011-12-14 18:08:58
$dictionary["Billing"]["fields"]["transports_billing"] = array (
  'name' => 'transports_billing',
  'type' => 'link',
  'relationship' => 'transports_billing',
  'source' => 'non-db',
  'vname' => 'LBL_TRANSPORTS_BILLING_FROM_TRANSPORTS_TITLE',
);


// created: 2011-12-14 18:12:45
$dictionary["Billing"]["fields"]["travelguides_billing"] = array (
  'name' => 'travelguides_billing',
  'type' => 'link',
  'relationship' => 'travelguides_billing',
  'source' => 'non-db',
  'vname' => 'LBL_TRAVELGUIDES_BILLING_FROM_TRAVELGUIDES_TITLE',
);
$dictionary["Billing"]["fields"]["travelguides_billing_name"] = array (
  'name' => 'travelguides_billing_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TRAVELGUIDES_BILLING_FROM_TRAVELGUIDES_TITLE',
  'save' => true,
  'id_name' => 'travelguidac2dlguides_ida',
  'link' => 'travelguides_billing',
  'table' => 'travelguides',
  'module' => 'TravelGuides',
  'rname' => 'name',
);
$dictionary["Billing"]["fields"]["travelguidac2dlguides_ida"] = array (
  'name' => 'travelguidac2dlguides_ida',
  'type' => 'link',
  'relationship' => 'travelguides_billing',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TRAVELGUIDES_BILLING_FROM_BILLING_TITLE',
);

?>