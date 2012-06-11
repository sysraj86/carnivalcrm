<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-08-19 10:08:46
$dictionary["GroupProgram"]["fields"]["accounts_groupprograms"] = array (
  'name' => 'accounts_groupprograms',
  'type' => 'link',
  'relationship' => 'accounts_groupprograms',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_GROUPPROGRAMS_FROM_ACCOUNTS_TITLE',
);
$dictionary["GroupProgram"]["fields"]["accounts_grpprograms_name"] = array (
  'name' => 'accounts_grpprograms_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_GROUPPROGRAMS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_g640eccounts_ida',
  'link' => 'accounts_groupprograms',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["GroupProgram"]["fields"]["accounts_g640eccounts_ida"] = array (
  'name' => 'accounts_g640eccounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_groupprograms',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_GROUPPROGRAMS_FROM_GROUPPROGRAMS_TITLE',
);


// created: 2011-10-04 10:29:08
$dictionary["GroupProgram"]["fields"]["c_approval_groupprograms"] = array (
  'name' => 'c_approval_groupprograms',
  'type' => 'link',
  'relationship' => 'c_approval_groupprograms',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_C_APPROVAL_GROUPPROGRAMS_FROM_C_APPROVAL_TITLE',
);


// created: 2011-09-05 10:45:41
$dictionary["GroupProgram"]["fields"]["fits_groupprograms"] = array (
  'name' => 'fits_groupprograms',
  'type' => 'link',
  'relationship' => 'fits_groupprograms',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_GROUPPROGRAMS_FROM_FITS_TITLE',
);
$dictionary["GroupProgram"]["fields"]["fits_groupprograms_name"] = array (
  'name' => 'fits_groupprograms_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_GROUPPROGRAMS_FROM_FITS_TITLE',
  'save' => true,
  'id_name' => 'fits_group33fdamsfits_ida',
  'link' => 'fits_groupprograms',
  'table' => 'fits',
  'module' => 'FITs',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["GroupProgram"]["fields"]["fits_group33fdamsfits_ida"] = array (
  'name' => 'fits_group33fdamsfits_ida',
  'type' => 'link',
  'relationship' => 'fits_groupprograms',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FITS_GROUPPROGRAMS_FROM_GROUPPROGRAMS_TITLE',
);


// created: 2011-09-13 14:15:20
$dictionary["GroupProgram"]["fields"]["grouplists_groupprograms"] = array (
  'name' => 'grouplists_groupprograms',
  'type' => 'link',
  'relationship' => 'grouplists_groupprograms',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPLISTS_GROUPPROGRAMS_FROM_GROUPLISTS_TITLE',
);
$dictionary["GroupProgram"]["fields"]["grouplists_pprograms_name"] = array (
  'name' => 'grouplists_pprograms_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPLISTS_GROUPPROGRAMS_FROM_GROUPLISTS_TITLE',
  'save' => true,
  'id_name' => 'grouplists87eduplists_ida',
  'link' => 'grouplists_groupprograms',
  'table' => 'grouplists',
  'module' => 'GroupLists',
  'rname' => 'name',
  'required' => true,
);
$dictionary["GroupProgram"]["fields"]["grouplists87eduplists_ida"] = array (
  'name' => 'grouplists87eduplists_ida',
  'type' => 'link',
  'relationship' => 'grouplists_groupprograms',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_GROUPLISTS_GROUPPROGRAMS_FROM_GROUPLISTS_TITLE',
);


// created: 2011-08-19 10:57:11
$dictionary["GroupProgram"]["fields"]["groupprograms_activities_calls"] = array (
  'name' => 'groupprograms_activities_calls',
  'type' => 'link',
  'relationship' => 'groupprograms_activities_calls',
  'source' => 'non-db',
);


// created: 2011-08-19 10:57:16
$dictionary["GroupProgram"]["fields"]["groupprograms_activities_emails"] = array (
  'name' => 'groupprograms_activities_emails',
  'type' => 'link',
  'relationship' => 'groupprograms_activities_emails',
  'source' => 'non-db',
);


// created: 2011-08-19 10:57:13
$dictionary["GroupProgram"]["fields"]["groupprograms_activities_meetings"] = array (
  'name' => 'groupprograms_activities_meetings',
  'type' => 'link',
  'relationship' => 'groupprograms_activities_meetings',
  'source' => 'non-db',
);


// created: 2011-08-19 10:57:14
$dictionary["GroupProgram"]["fields"]["groupprograms_activities_notes"] = array (
  'name' => 'groupprograms_activities_notes',
  'type' => 'link',
  'relationship' => 'groupprograms_activities_notes',
  'source' => 'non-db',
);


// created: 2011-08-19 10:57:15
$dictionary["GroupProgram"]["fields"]["groupprograms_activities_tasks"] = array (
  'name' => 'groupprograms_activities_tasks',
  'type' => 'link',
  'relationship' => 'groupprograms_activities_tasks',
  'source' => 'non-db',
);


// created: 2011-09-05 08:49:54
$dictionary["GroupProgram"]["fields"]["groupprograesticketslists"] = array (
  'name' => 'groupprograesticketslists',
  'type' => 'link',
  'relationship' => 'groupprograms_airlinesticketslists',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_AIRLINESTICKETSLISTS_FROM_AIRLINESTICKETSLISTS_TITLE',
);
$dictionary["GroupProgram"]["fields"]["groupprograketslists_name"] = array (
  'name' => 'groupprograketslists_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_AIRLINESTICKETSLISTS_FROM_AIRLINESTICKETSLISTS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr60cctslists_idb',
  'link' => 'groupprograesticketslists',
  'table' => 'AirlinesTicketsLists',
  'module' => 'AirlinesTicketsLists',
  'rname' => 'name',
);
$dictionary["GroupProgram"]["fields"]["groupprogr60cctslists_idb"] = array (
  'name' => 'groupprogr60cctslists_idb',
  'type' => 'link',
  'relationship' => 'groupprograms_airlinesticketslists',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_GROUPPROGRAMS_AIRLINESTICKETSLISTS_FROM_AIRLINESTICKETSLISTS_TITLE',
);


// created: 2011-08-31 11:29:59
$dictionary["GroupProgram"]["fields"]["groupprograirlinestickets"] = array (
  'name' => 'groupprograirlinestickets',
  'type' => 'link',
  'relationship' => 'groupprograms_airlinestickets',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_AIRLINESTICKETS_FROM_AIRLINESTICKETS_TITLE',
);


// created: 2011-08-19 11:00:50
$dictionary["GroupProgram"]["fields"]["groupprograms_billing"] = array (
  'name' => 'groupprograms_billing',
  'type' => 'link',
  'relationship' => 'groupprograms_billing',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_BILLING_FROM_BILLING_TITLE',
);


// created: 2011-08-17 18:13:33
$dictionary["GroupProgram"]["fields"]["groupprograms_cases_1"] = array (
  'name' => 'groupprograms_cases_1',
  'type' => 'link',
  'relationship' => 'groupprograms_cases_1',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_CASES_1_FROM_CASES_TITLE',
);


// created: 2011-08-17 18:15:27
$dictionary["GroupProgram"]["fields"]["groupprograms_cases_2"] = array (
  'name' => 'groupprograms_cases_2',
  'type' => 'link',
  'relationship' => 'groupprograms_cases_2',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_CASES_2_FROM_CASES_TITLE',
);


// created: 2011-08-19 10:58:01
$dictionary["GroupProgram"]["fields"]["groupprograms_cases"] = array (
  'name' => 'groupprograms_cases',
  'type' => 'link',
  'relationship' => 'groupprograms_cases',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_CASES_FROM_CASES_TITLE',
);


// created: 2011-10-18 14:28:40
$dictionary["GroupProgram"]["fields"]["groupprograms_comments"] = array (
  'name' => 'groupprograms_comments',
  'type' => 'link',
  'relationship' => 'groupprograms_comments',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_COMMENTS_FROM_COMMENTS_TITLE',
);


// created: 2011-09-29 13:50:17
$dictionary["GroupProgram"]["fields"]["groupprograms_contracts"] = array (
  'name' => 'groupprograms_contracts',
  'type' => 'link',
  'relationship' => 'groupprograms_contracts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_CONTRACTS_FROM_CONTRACTS_TITLE',
);


// created: 2011-08-19 10:59:39
$dictionary["GroupProgram"]["fields"]["groupprograms_documents"] = array (
  'name' => 'groupprograms_documents',
  'type' => 'link',
  'relationship' => 'groupprograms_documents',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_DOCUMENTS_FROM_DOCUMENTS_TITLE',
);


// created: 2011-10-17 11:39:26
$dictionary["GroupProgram"]["fields"]["groupprograms_fits"] = array (
  'name' => 'groupprograms_fits',
  'type' => 'link',
  'relationship' => 'groupprograms_fits',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_FITS_FROM_FITS_TITLE',
);


// created: 2011-09-13 11:54:59
$dictionary["GroupProgram"]["fields"]["groupprograms_grouplists"] = array (
  'name' => 'groupprograms_grouplists',
  'type' => 'link',
  'relationship' => 'groupprograms_grouplists',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_GROUPLISTS_FROM_GROUPLISTS_TITLE',
);
$dictionary["GroupProgram"]["fields"]["groupprograrouplists_name"] = array (
  'name' => 'groupprograrouplists_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_GROUPLISTS_FROM_GROUPLISTS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr9ea5uplists_idb',
  'link' => 'groupprograms_grouplists',
  'table' => 'grouplists',
  'module' => 'GroupLists',
  'rname' => 'name',
);
$dictionary["GroupProgram"]["fields"]["groupprogr9ea5uplists_idb"] = array (
  'name' => 'groupprogr9ea5uplists_idb',
  'type' => 'link',
  'relationship' => 'groupprograms_grouplists',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_GROUPPROGRAMS_GROUPLISTS_FROM_GROUPLISTS_TITLE',
);


// created: 2011-08-23 11:28:48
$dictionary["GroupProgram"]["fields"]["groupprograms_insurances"] = array (
  'name' => 'groupprograms_insurances',
  'type' => 'link',
  'relationship' => 'groupprograms_insurances',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_INSURANCES_FROM_INSURANCES_TITLE',
);
$dictionary["GroupProgram"]["fields"]["groupprogransurances_name"] = array (
  'name' => 'groupprogransurances_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_INSURANCES_FROM_INSURANCES_TITLE',
  'save' => true,
  'id_name' => 'groupprogr5003urances_idb',
  'link' => 'groupprograms_insurances',
  'table' => 'insurances',
  'module' => 'Insurances',
  'rname' => 'name',
);
$dictionary["GroupProgram"]["fields"]["groupprogr5003urances_idb"] = array (
  'name' => 'groupprogr5003urances_idb',
  'type' => 'link',
  'relationship' => 'groupprograms_insurances',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_GROUPPROGRAMS_INSURANCES_FROM_INSURANCES_TITLE',
);


// created: 2011-08-22 17:06:06
$dictionary["GroupProgram"]["fields"]["groupprogras_passportlist"] = array (
  'name' => 'groupprogras_passportlist',
  'type' => 'link',
  'relationship' => 'groupprograms_passportlist',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_PASSPORTLIST_FROM_PASSPORTLIST_TITLE',
);
$dictionary["GroupProgram"]["fields"]["groupprograsportlist_name"] = array (
  'name' => 'groupprograsportlist_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_PASSPORTLIST_FROM_PASSPORTLIST_TITLE',
  'save' => true,
  'id_name' => 'groupprogrc66dortlist_idb',
  'link' => 'groupprogras_passportlist',
  'table' => 'PassportList',
  'module' => 'PassportList',
  'rname' => 'name',
);
$dictionary["GroupProgram"]["fields"]["groupprogrc66dortlist_idb"] = array (
  'name' => 'groupprogrc66dortlist_idb',
  'type' => 'link',
  'relationship' => 'groupprograms_passportlist',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_GROUPPROGRAMS_PASSPORTLIST_FROM_PASSPORTLIST_TITLE',
);


// created: 2011-08-24 10:56:49
$dictionary["GroupProgram"]["fields"]["groupprogras_roombookings"] = array (
  'name' => 'groupprogras_roombookings',
  'type' => 'link',
  'relationship' => 'groupprograms_roombookings',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_ROOMBOOKINGS_FROM_ROOMBOOKINGS_TITLE',
);


// created: 2011-08-24 10:58:19
$dictionary["GroupProgram"]["fields"]["groupprograervicebookings"] = array (
  'name' => 'groupprograervicebookings',
  'type' => 'link',
  'relationship' => 'groupprograms_servicebookings',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_SERVICEBOOKINGS_FROM_SERVICEBOOKINGS_TITLE',
);


// created: 2011-09-10 08:42:47
$dictionary["GroupProgram"]["fields"]["groupprogransportbookings"] = array (
  'name' => 'groupprogransportbookings',
  'type' => 'link',
  'relationship' => 'groupprograms_transportbookings',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_TRANSPORTBOOKINGS_FROM_TRANSPORTBOOKINGS_TITLE',
);


// created: 2011-09-05 09:11:50
$dictionary["GroupProgram"]["fields"]["groupprograms_worksheets"] = array (
  'name' => 'groupprograms_worksheets',
  'type' => 'link',
  'relationship' => 'groupprograms_worksheets',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_WORKSHEETS_FROM_WORKSHEETS_TITLE',
);
$dictionary["GroupProgram"]["fields"]["groupprograorksheets_name"] = array (
  'name' => 'groupprograorksheets_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_WORKSHEETS_FROM_WORKSHEETS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr53b5ksheets_idb',
  'link' => 'groupprograms_worksheets',
  'table' => 'worksheets',
  'module' => 'Worksheets',
  'rname' => 'name',
);
$dictionary["GroupProgram"]["fields"]["groupprogr53b5ksheets_idb"] = array (
  'name' => 'groupprogr53b5ksheets_idb',
  'type' => 'link',
  'relationship' => 'groupprograms_worksheets',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'studio' => 'visible',
  'vname' => 'LBL_GROUPPROGRAMS_WORKSHEETS_FROM_WORKSHEETS_TITLE',
);


// created: 2011-10-26 11:39:34
$dictionary["GroupProgram"]["fields"]["hotels_groupprograms"] = array (
  'name' => 'hotels_groupprograms',
  'type' => 'link',
  'relationship' => 'hotels_groupprograms',
  'source' => 'non-db',
  'vname' => 'LBL_HOTELS_GROUPPROGRAMS_FROM_HOTELS_TITLE',
);
$dictionary["GroupProgram"]["fields"]["hotels_groupprograms_name"] = array (
  'name' => 'hotels_groupprograms_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HOTELS_GROUPPROGRAMS_FROM_HOTELS_TITLE',
  'save' => true,
  'id_name' => 'hotels_gro0d05shotels_ida',
  'link' => 'hotels_groupprograms',
  'table' => 'hotels',
  'module' => 'Hotels',
  'rname' => 'name',
);
$dictionary["GroupProgram"]["fields"]["hotels_gro0d05shotels_ida"] = array (
  'name' => 'hotels_gro0d05shotels_ida',
  'type' => 'link',
  'relationship' => 'hotels_groupprograms',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HOTELS_GROUPPROGRAMS_FROM_GROUPPROGRAMS_TITLE',
);


// created: 2011-10-18 18:00:33
$dictionary["GroupProgram"]["fields"]["restaurants_groupprograms"] = array (
  'name' => 'restaurants_groupprograms',
  'type' => 'link',
  'relationship' => 'restaurants_groupprograms',
  'source' => 'non-db',
  'vname' => 'LBL_RESTAURANTS_GROUPPROGRAMS_FROM_RESTAURANTS_TITLE',
);
$dictionary["GroupProgram"]["fields"]["restaurantspprograms_name"] = array (
  'name' => 'restaurantspprograms_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_RESTAURANTS_GROUPPROGRAMS_FROM_RESTAURANTS_TITLE',
  'save' => true,
  'id_name' => 'restaurant7162aurants_ida',
  'link' => 'restaurants_groupprograms',
  'table' => 'restaurants',
  'module' => 'Restaurants',
  'rname' => 'name',
);
$dictionary["GroupProgram"]["fields"]["restaurant7162aurants_ida"] = array (
  'name' => 'restaurant7162aurants_ida',
  'type' => 'link',
  'relationship' => 'restaurants_groupprograms',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_RESTAURANTS_GROUPPROGRAMS_FROM_GROUPPROGRAMS_TITLE',
);


// created: 2011-08-05 11:51:56
$dictionary["GroupProgram"]["fields"]["tours_groupprograms"] = array (
  'name' => 'tours_groupprograms',
  'type' => 'link',
  'relationship' => 'tours_groupprograms',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_GROUPPROGRAMS_FROM_TOURS_TITLE',
);
$dictionary["GroupProgram"]["fields"]["tours_groupprograms_name"] = array (
  'name' => 'tours_groupprograms_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_GROUPPROGRAMS_FROM_TOURS_TITLE',
  'save' => true,
  'id_name' => 'tours_groufc45mstours_ida',
  'link' => 'tours_groupprograms',
  'table' => 'tours',
  'module' => 'Tours',
  'rname' => 'name',
);
$dictionary["GroupProgram"]["fields"]["tours_groufc45mstours_ida"] = array (
  'name' => 'tours_groufc45mstours_ida',
  'type' => 'link',
  'relationship' => 'tours_groupprograms',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TOURS_GROUPPROGRAMS_FROM_GROUPPROGRAMS_TITLE',
);

?>