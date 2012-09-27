<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2012-02-20 17:18:12
$dictionary["AirlinesTickets"]["fields"]["airlinesticirlinestickets"] = array (
  'name' => 'airlinesticirlinestickets',
  'type' => 'link',
  'relationship' => 'airlinesticketslists_airlinestickets',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINESTICKETSLISTS_AIRLINESTICKETS_FROM_AIRLINESTICKETSLISTS_TITLE',
);
$dictionary["AirlinesTickets"]["fields"]["airlinesticestickets_name"] = array (
  'name' => 'airlinesticestickets_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINESTICKETSLISTS_AIRLINESTICKETS_FROM_AIRLINESTICKETSLISTS_TITLE',
  'save' => true,
  'id_name' => 'airlinesti7e28tslists_ida',
  'link' => 'airlinesticirlinestickets',
  'table' => 'AirlinesTicketsLists',
  'module' => 'AirlinesTicketsLists',
  'rname' => 'name',
);
$dictionary["AirlinesTickets"]["fields"]["airlinesti7e28tslists_ida"] = array (
  'name' => 'airlinesti7e28tslists_ida',
  'type' => 'link',
  'relationship' => 'airlinesticketslists_airlinestickets',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AIRLINESTICKETSLISTS_AIRLINESTICKETS_FROM_AIRLINESTICKETS_TITLE',
);


// created: 2011-10-01 10:06:20
$dictionary["AirlinesTickets"]["fields"]["airlinestickets_accounts"] = array (
  'name' => 'airlinestickets_accounts',
  'type' => 'link',
  'relationship' => 'airlinestickets_accounts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_AIRLINESTICKETS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
);


// created: 2012-09-25 18:15:46
$dictionary["AirlinesTickets"]["fields"]["airlinesticirlinestickets"] = array (
  'name' => 'airlinesticirlinestickets',
  'type' => 'link',
  'relationship' => 'airlinestickets_airlinestickets',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINESTICKETS_AIRLINESTICKETS_FROM_AIRLINESTICKETS_L_TITLE',
);
$dictionary["AirlinesTickets"]["fields"]["airlinesticirlinestickets"] = array (
  'name' => 'airlinesticirlinestickets',
  'type' => 'link',
  'relationship' => 'airlinestickets_airlinestickets',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINESTICKETS_AIRLINESTICKETS_FROM_AIRLINESTICKETS_R_TITLE',
);


// created: 2011-10-01 09:52:14
$dictionary["AirlinesTickets"]["fields"]["airlinestickets_fits"] = array (
  'name' => 'airlinestickets_fits',
  'type' => 'link',
  'relationship' => 'airlinestickets_fits',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_AIRLINESTICKETS_FITS_FROM_FITS_TITLE',
);


// created: 2011-09-06 15:05:38
$dictionary["AirlinesTickets"]["fields"]["airlines_airlinestickets"] = array (
  'name' => 'airlines_airlinestickets',
  'type' => 'link',
  'relationship' => 'airlines_airlinestickets',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINES_AIRLINESTICKETS_FROM_AIRLINES_TITLE',
);
$dictionary["AirlinesTickets"]["fields"]["airlines_aiestickets_name"] = array (
  'name' => 'airlines_aiestickets_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINES_AIRLINESTICKETS_FROM_AIRLINES_TITLE',
  'save' => true,
  'id_name' => 'airlines_a476cirlines_ida',
  'link' => 'airlines_airlinestickets',
  'table' => 'airlines',
  'module' => 'Airlines',
  'rname' => 'name',
);
$dictionary["AirlinesTickets"]["fields"]["airlines_a476cirlines_ida"] = array (
  'name' => 'airlines_a476cirlines_ida',
  'type' => 'link',
  'relationship' => 'airlines_airlinestickets',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AIRLINES_AIRLINESTICKETS_FROM_AIRLINESTICKETS_TITLE',
);


// created: 2011-10-04 10:29:08
$dictionary["AirlinesTickets"]["fields"]["c_approval_irlinestickets"] = array (
  'name' => 'c_approval_irlinestickets',
  'type' => 'link',
  'relationship' => 'c_approval_airlinestickets',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_C_APPROVAL_AIRLINESTICKETS_FROM_C_APPROVAL_TITLE',
);


// created: 2011-08-31 11:31:09
$dictionary["AirlinesTickets"]["fields"]["fits_airlinestickets"] = array (
  'name' => 'fits_airlinestickets',
  'type' => 'link',
  'relationship' => 'fits_airlinestickets',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_AIRLINESTICKETS_FROM_FITS_TITLE',
);
$dictionary["AirlinesTickets"]["fields"]["fits_airlinestickets_name"] = array (
  'name' => 'fits_airlinestickets_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_AIRLINESTICKETS_FROM_FITS_TITLE',
  'save' => true,
  'id_name' => 'fits_airli3e39etsfits_ida',
  'link' => 'fits_airlinestickets',
  'table' => 'fits',
  'module' => 'FITs',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["AirlinesTickets"]["fields"]["fits_airli3e39etsfits_ida"] = array (
  'name' => 'fits_airli3e39etsfits_ida',
  'type' => 'link',
  'relationship' => 'fits_airlinestickets',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FITS_AIRLINESTICKETS_FROM_AIRLINESTICKETS_TITLE',
);


// created: 2011-08-31 11:29:59
$dictionary["AirlinesTickets"]["fields"]["groupprograirlinestickets"] = array (
  'name' => 'groupprograirlinestickets',
  'type' => 'link',
  'relationship' => 'groupprograms_airlinestickets',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_AIRLINESTICKETS_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["AirlinesTickets"]["fields"]["groupprograestickets_name"] = array (
  'name' => 'groupprograestickets_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_AIRLINESTICKETS_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr0fd9rograms_ida',
  'link' => 'groupprograirlinestickets',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'rname' => 'name',
);
$dictionary["AirlinesTickets"]["fields"]["groupprogr0fd9rograms_ida"] = array (
  'name' => 'groupprogr0fd9rograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_airlinestickets',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_AIRLINESTICKETS_FROM_AIRLINESTICKETS_TITLE',
);


 // created: 2011-11-11 10:02:47

 

// created: 2011-12-20 09:20:57
$dictionary["AirlinesTickets"]["fields"]["tours_airlinestickets"] = array (
  'name' => 'tours_airlinestickets',
  'type' => 'link',
  'relationship' => 'tours_airlinestickets',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_AIRLINESTICKETS_FROM_TOURS_TITLE',
);
$dictionary["AirlinesTickets"]["fields"]["tours_airliestickets_name"] = array (
  'name' => 'tours_airliestickets_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_AIRLINESTICKETS_FROM_TOURS_TITLE',
  'save' => true,
  'id_name' => 'tours_airl9600tstours_ida',
  'link' => 'tours_airlinestickets',
  'table' => 'tours',
  'module' => 'Tours',
  'rname' => 'name',
);
$dictionary["AirlinesTickets"]["fields"]["tours_airl9600tstours_ida"] = array (
  'name' => 'tours_airl9600tstours_ida',
  'type' => 'link',
  'relationship' => 'tours_airlinestickets',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TOURS_AIRLINESTICKETS_FROM_AIRLINESTICKETS_TITLE',
);


$dictionary["AirlinesTickets"]["fields"]["type_air_train"] = array (
  'name' => 'type_air_train',
  'type' => 'enum',
  'options' => 'type_air_train_dom',
  'vname' => 'LBL_TYPE_AIR_TRAIN',
);
 
?>