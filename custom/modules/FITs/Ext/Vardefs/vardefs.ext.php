<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-08-22 10:23:01
$dictionary["FITs"]["fields"]["accounts_fits"] = array (
  'name' => 'accounts_fits',
  'type' => 'link',
  'relationship' => 'accounts_fits',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_FITS_FROM_ACCOUNTS_TITLE',
);
$dictionary["FITs"]["fields"]["accounts_fits_name"] = array (
  'name' => 'accounts_fits_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_FITS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_fd483ccounts_ida',
  'link' => 'accounts_fits',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["FITs"]["fields"]["accounts_fd483ccounts_ida"] = array (
  'name' => 'accounts_fd483ccounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_fits',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_FITS_FROM_FITS_TITLE',
);


// created: 2011-10-01 09:52:14
$dictionary["FITs"]["fields"]["airlinestickets_fits"] = array (
  'name' => 'airlinestickets_fits',
  'type' => 'link',
  'relationship' => 'airlinestickets_fits',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINESTICKETS_FITS_FROM_AIRLINESTICKETS_TITLE',
);
$dictionary["FITs"]["fields"]["airlinestickets_fits_name"] = array (
  'name' => 'airlinestickets_fits_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINESTICKETS_FITS_FROM_AIRLINESTICKETS_TITLE',
  'save' => true,
  'id_name' => 'airlinestia31ctickets_ida',
  'link' => 'airlinestickets_fits',
  'table' => 'AirlinesTickets',
  'module' => 'AirlinesTickets',
  'rname' => 'name',
);
$dictionary["FITs"]["fields"]["airlinestia31ctickets_ida"] = array (
  'name' => 'airlinestia31ctickets_ida',
  'type' => 'link',
  'relationship' => 'airlinestickets_fits',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AIRLINESTICKETS_FITS_FROM_FITS_TITLE',
);


// created: 2011-08-19 10:29:03
$dictionary["FITs"]["fields"]["fits_activities_calls"] = array (
  'name' => 'fits_activities_calls',
  'type' => 'link',
  'relationship' => 'fits_activities_calls',
  'source' => 'non-db',
);


// created: 2011-08-19 10:29:06
$dictionary["FITs"]["fields"]["fits_activities_emails"] = array (
  'name' => 'fits_activities_emails',
  'type' => 'link',
  'relationship' => 'fits_activities_emails',
  'source' => 'non-db',
);


// created: 2011-08-19 10:29:04
$dictionary["FITs"]["fields"]["fits_activities_meetings"] = array (
  'name' => 'fits_activities_meetings',
  'type' => 'link',
  'relationship' => 'fits_activities_meetings',
  'source' => 'non-db',
);


// created: 2011-08-19 10:29:04
$dictionary["FITs"]["fields"]["fits_activities_notes"] = array (
  'name' => 'fits_activities_notes',
  'type' => 'link',
  'relationship' => 'fits_activities_notes',
  'source' => 'non-db',
);


// created: 2011-08-19 10:29:05
$dictionary["FITs"]["fields"]["fits_activities_tasks"] = array (
  'name' => 'fits_activities_tasks',
  'type' => 'link',
  'relationship' => 'fits_activities_tasks',
  'source' => 'non-db',
);


// created: 2011-08-31 11:31:09
$dictionary["FITs"]["fields"]["fits_airlinestickets"] = array (
  'name' => 'fits_airlinestickets',
  'type' => 'link',
  'relationship' => 'fits_airlinestickets',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_FITS_AIRLINESTICKETS_FROM_AIRLINESTICKETS_TITLE',
);


// created: 2011-08-19 10:30:15
$dictionary["FITs"]["fields"]["fits_billing"] = array (
  'name' => 'fits_billing',
  'type' => 'link',
  'relationship' => 'fits_billing',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_FITS_BILLING_FROM_BILLING_TITLE',
);


// created: 2011-11-11 22:50:07
$dictionary["FITs"]["fields"]["fits_cases"] = array (
  'name' => 'fits_cases',
  'type' => 'link',
  'relationship' => 'fits_cases',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_FITS_CASES_FROM_CASES_TITLE',
);


// created: 2011-11-21 16:43:47
$dictionary["FITs"]["fields"]["fits_commentairlines"] = array (
  'name' => 'fits_commentairlines',
  'type' => 'link',
  'relationship' => 'fits_commentairlines',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_FITS_COMMENTAIRLINES_FROM_COMMENTAIRLINES_TITLE',
);


// created: 2011-10-18 14:57:37
$dictionary["FITs"]["fields"]["fits_comments"] = array (
  'name' => 'fits_comments',
  'type' => 'link',
  'relationship' => 'fits_comments',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_FITS_COMMENTS_FROM_COMMENTS_TITLE',
);


// created: 2011-11-01 12:41:34
$dictionary["FITs"]["fields"]["fits_contracts"] = array (
  'name' => 'fits_contracts',
  'type' => 'link',
  'relationship' => 'fits_contracts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_FITS_CONTRACTS_FROM_CONTRACTS_TITLE',
);


// created: 2011-08-22 10:36:35
$dictionary["FITs"]["fields"]["fits_fits"]=array (
  'name' => 'fits_fits',
  'type' => 'link',
  'relationship' => 'fits_fits',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_FITS_FROM_FITS_L_TITLE',
  'side' => 'left',
);
$dictionary["FITs"]["fields"]["fits_fits_name"] = array (
  'name' => 'fits_fits_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_FITS_FROM_FITS_L_TITLE',
  'save' => true,
  'id_name' => 'fits_fitsfbaacitsfits_ida',
  'link' => 'fits_fits',
  'table' => 'fits',
  'module' => 'FITs',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["FITs"]["fields"]["fits_fitsfbaacitsfits_ida"] = array (
  'name' => 'fits_fitsfbaacitsfits_ida',
  'type' => 'link',
  'relationship' => 'fits_fits',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FITS_FITS_FROM_FITS_R_TITLE',
);


// created: 2011-09-05 10:45:41
$dictionary["FITs"]["fields"]["fits_groupprograms"] = array (
  'name' => 'fits_groupprograms',
  'type' => 'link',
  'relationship' => 'fits_groupprograms',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_FITS_GROUPPROGRAMS_FROM_GROUPPROGRAMS_TITLE',
);


// created: 2011-10-26 00:43:22
$dictionary["FITs"]["fields"]["fits_oders"] = array (
  'name' => 'fits_oders',
  'type' => 'link',
  'relationship' => 'fits_oders',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_FITS_ODERS_FROM_ODERS_TITLE',
);


// created: 2011-11-15 12:48:00
$dictionary["FITs"]["fields"]["fits_orders"] = array (
  'name' => 'fits_orders',
  'type' => 'link',
  'relationship' => 'fits_orders',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_FITS_ORDERS_FROM_ORDERS_TITLE',
);


// created: 2011-08-19 15:05:02
$dictionary["FITs"]["fields"]["fits_passports"] = array (
  'name' => 'fits_passports',
  'type' => 'link',
  'relationship' => 'fits_passports',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_FITS_PASSPORTS_FROM_PASSPORTS_TITLE',
);


// created: 2011-09-20 09:12:33
$dictionary["FITs"]["fields"]["fits_quotes"] = array (
  'name' => 'fits_quotes',
  'type' => 'link',
  'relationship' => 'fits_quotes',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_FITS_QUOTES_FROM_QUOTES_TITLE',
);


// created: 2011-08-19 10:28:21
$dictionary["FITs"]["fields"]["fits_tours"] = array (
  'name' => 'fits_tours',
  'type' => 'link',
  'relationship' => 'fits_tours',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_FITS_TOURS_FROM_TOURS_TITLE',
);


// created: 2011-08-19 10:34:31
$dictionary["FITs"]["fields"]["fits_visa_passports"] = array (
  'name' => 'fits_visa_passports',
  'type' => 'link',
  'relationship' => 'fits_visa_passports',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_FITS_VISA_PASSPORTS_FROM_VISA_PASSPORTS_TITLE',
);


// created: 2011-08-22 10:53:04
$dictionary["FITs"]["fields"]["grouplists_fits"] = array (
  'name' => 'grouplists_fits',
  'type' => 'link',
  'relationship' => 'grouplists_fits',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPLISTS_FITS_FROM_GROUPLISTS_TITLE',
);
$dictionary["FITs"]["fields"]["grouplists_fits_name"] = array (
  'name' => 'grouplists_fits_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPLISTS_FITS_FROM_GROUPLISTS_TITLE',
  'save' => true,
  'id_name' => 'grouplistsd262uplists_ida',
  'link' => 'grouplists_fits',
  'table' => 'grouplists',
  'module' => 'GroupLists',
  'rname' => 'name',
);
$dictionary["FITs"]["fields"]["grouplistsd262uplists_ida"] = array (
  'name' => 'grouplistsd262uplists_ida',
  'type' => 'link',
  'relationship' => 'grouplists_fits',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GROUPLISTS_FITS_FROM_FITS_TITLE',
);


// created: 2011-10-17 11:39:26
$dictionary["FITs"]["fields"]["groupprograms_fits"] = array (
  'name' => 'groupprograms_fits',
  'type' => 'link',
  'relationship' => 'groupprograms_fits',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_FITS_FROM_GROUPPROGRAMS_TITLE',
);


// created: 2011-08-23 11:27:26
$dictionary["FITs"]["fields"]["insurances_fits"] = array (
  'name' => 'insurances_fits',
  'type' => 'link',
  'relationship' => 'insurances_fits',
  'source' => 'non-db',
  'vname' => 'LBL_INSURANCES_FITS_FROM_INSURANCES_TITLE',
);
$dictionary["FITs"]["fields"]["insurances_fits_name"] = array (
  'name' => 'insurances_fits_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_INSURANCES_FITS_FROM_INSURANCES_TITLE',
  'save' => true,
  'id_name' => 'insurances87aeurances_ida',
  'link' => 'insurances_fits',
  'table' => 'insurances',
  'module' => 'Insurances',
  'rname' => 'name',
);
$dictionary["FITs"]["fields"]["insurances87aeurances_ida"] = array (
  'name' => 'insurances87aeurances_ida',
  'type' => 'link',
  'relationship' => 'insurances_fits',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_INSURANCES_FITS_FROM_FITS_TITLE',
);


// created: 2012-10-26 19:00:56
$dictionary["FITs"]["fields"]["prospectlists_fits"] = array (
  'name' => 'prospectlists_fits',
  'type' => 'link',
  'relationship' => 'prospectlists_fits',
  'source' => 'non-db',
  'vname' => 'LBL_PROSPECTLISTS_FITS_FROM_PROSPECTLISTS_TITLE',
);
$dictionary["FITs"]["fields"]["prospectlists_fits_name"] = array (
  'name' => 'prospectlists_fits_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_PROSPECTLISTS_FITS_FROM_PROSPECTLISTS_TITLE',
  'save' => true,
  'id_name' => 'prospectli3a05ctlists_ida',
  'link' => 'prospectlists_fits',
  'table' => 'prospect_lists',
  'module' => 'ProspectLists',
  'rname' => 'name',
);
$dictionary["FITs"]["fields"]["prospectli3a05ctlists_ida"] = array (
  'name' => 'prospectli3a05ctlists_ida',
  'type' => 'link',
  'relationship' => 'prospectlists_fits',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_PROSPECTLISTS_FITS_FROM_FITS_TITLE',
);


 // created: 2012-07-21 09:55:31
$dictionary['FITs']['fields']['account_name']['importable']='false';

 

 // created: 2012-07-21 09:54:00
$dictionary['FITs']['fields']['date_of_issue']['importable']='false';
$dictionary['FITs']['fields']['date_of_issue']['enable_range_search']=false;

 

 // created: 2012-07-21 09:55:31
$dictionary['FITs']['fields']['department']['importable']='false';

 

 // created: 2012-07-21 09:49:33
$dictionary['FITs']['fields']['email1']['importable']='true';

 

 // created: 2012-06-23 11:44:40
$dictionary['FITs']['fields']['nationality']['default']='^^';

 

 // created: 2012-06-23 12:01:27
$dictionary['FITs']['fields']['provice_city']['default']='';

 

 // created: 2012-07-21 09:49:33
$dictionary['FITs']['fields']['title']['importable']='false';

 

// created: 2011-08-08 11:54:02
$dictionary["FITs"]["fields"]["tours_fits"] = array (
  'name' => 'tours_fits',
  'type' => 'link',
  'relationship' => 'tours_fits',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_FITS_FROM_TOURS_TITLE',
);


// created: 2011-08-22 10:23:01
$dictionary["FITs"]["fields"]["visited_country"] = array (
  'name' => 'visited_country',
  'type' => 'text',
  'vname' => 'LBL_VISITED_COUNTRY',
);
$dictionary["FITs"]["fields"]["identy_card"] = array (
  'name' => 'identy_card',
  'type' => 'varchar',
  'vname' => 'LBL_IDENTY_CARD',
);
$dictionary["FITs"]["fields"]["company_name"] = array (
  'name' => 'company_name',
  'type' => 'varchar',
  'source' => 'non-db',
  'vname' => 'LBL_COMPANY_NAME',
);
$dictionary["FITs"]["fields"]["company_phone"] = array (
  'name' => 'company_phone',
  'type' => 'varchar',
  'source' => 'non-db',
  'vname' => 'LBL_COMPANY_PHONE',
);

$dictionary['FITs']['fields']['nationality']['massupdate'] = false;
$dictionary['FITs']['fields']['fit_relationship_type']['massupdate'] = false;
$dictionary['FITs']['fields']['account_name']['massupdate'] = false;
?>