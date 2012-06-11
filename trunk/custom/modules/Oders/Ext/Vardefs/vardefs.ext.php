<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-10-26 00:36:45
$dictionary["Oder"]["fields"]["accounts_oders"] = array (
  'name' => 'accounts_oders',
  'type' => 'link',
  'relationship' => 'accounts_oders',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_ODERS_FROM_ACCOUNTS_TITLE',
);
$dictionary["Oder"]["fields"]["accounts_oders_name"] = array (
  'name' => 'accounts_oders_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_ODERS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_o20ceccounts_ida',
  'link' => 'accounts_oders',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["Oder"]["fields"]["accounts_o20ceccounts_ida"] = array (
  'name' => 'accounts_o20ceccounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_oders',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_ODERS_FROM_ODERS_TITLE',
);


// created: 2011-10-26 00:43:22
$dictionary["Oder"]["fields"]["fits_oders"] = array (
  'name' => 'fits_oders',
  'type' => 'link',
  'relationship' => 'fits_oders',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_ODERS_FROM_FITS_TITLE',
);
$dictionary["Oder"]["fields"]["fits_oders_name"] = array (
  'name' => 'fits_oders_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_ODERS_FROM_FITS_TITLE',
  'save' => true,
  'id_name' => 'fits_oders2a96ersfits_ida',
  'link' => 'fits_oders',
  'table' => 'fits',
  'module' => 'FITs',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Oder"]["fields"]["fits_oders2a96ersfits_ida"] = array (
  'name' => 'fits_oders2a96ersfits_ida',
  'type' => 'link',
  'relationship' => 'fits_oders',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FITS_ODERS_FROM_ODERS_TITLE',
);


// created: 2011-10-25 19:18:32
$dictionary["Oder"]["fields"]["oders_activities_calls"] = array (
  'name' => 'oders_activities_calls',
  'type' => 'link',
  'relationship' => 'oders_activities_calls',
  'source' => 'non-db',
);


// created: 2011-10-25 19:18:53
$dictionary["Oder"]["fields"]["oders_activities_emails"] = array (
  'name' => 'oders_activities_emails',
  'type' => 'link',
  'relationship' => 'oders_activities_emails',
  'source' => 'non-db',
);


// created: 2011-10-25 19:18:38
$dictionary["Oder"]["fields"]["oders_activities_meetings"] = array (
  'name' => 'oders_activities_meetings',
  'type' => 'link',
  'relationship' => 'oders_activities_meetings',
  'source' => 'non-db',
);


// created: 2011-10-25 19:18:43
$dictionary["Oder"]["fields"]["oders_activities_notes"] = array (
  'name' => 'oders_activities_notes',
  'type' => 'link',
  'relationship' => 'oders_activities_notes',
  'source' => 'non-db',
);


// created: 2011-10-25 19:18:48
$dictionary["Oder"]["fields"]["oders_activities_tasks"] = array (
  'name' => 'oders_activities_tasks',
  'type' => 'link',
  'relationship' => 'oders_activities_tasks',
  'source' => 'non-db',
);


// created: 2011-09-06 11:46:30
$dictionary["Oder"]["fields"]["quotes_oders"] = array (
  'name' => 'quotes_oders',
  'type' => 'link',
  'relationship' => 'quotes_oders',
  'source' => 'non-db',
  'vname' => 'LBL_QUOTES_ODERS_FROM_QUOTES_TITLE',
);
$dictionary["Oder"]["fields"]["quotes_oders_name"] = array (
  'name' => 'quotes_oders_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_QUOTES_ODERS_FROM_QUOTES_TITLE',
  'save' => true,
  'id_name' => 'quotes_oded7c9squotes_ida',
  'link' => 'quotes_oders',
  'table' => 'quotes',
  'module' => 'Quotes',
  'rname' => 'name',
);
$dictionary["Oder"]["fields"]["quotes_oded7c9squotes_ida"] = array (
  'name' => 'quotes_oded7c9squotes_ida',
  'type' => 'link',
  'relationship' => 'quotes_oders',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_QUOTES_ODERS_FROM_QUOTES_TITLE',
);


// created: 2011-08-19 10:41:51
$dictionary["Oder"]["fields"]["tours_oders"] = array (
  'name' => 'tours_oders',
  'type' => 'link',
  'relationship' => 'tours_oders',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_ODERS_FROM_TOURS_TITLE',
);
$dictionary["Oder"]["fields"]["tours_oders_name"] = array (
  'name' => 'tours_oders_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_ODERS_FROM_TOURS_TITLE',
  'save' => true,
  'id_name' => 'tours_odere23crstours_ida',
  'link' => 'tours_oders',
  'table' => 'tours',
  'module' => 'Tours',
  'rname' => 'name',
);
$dictionary["Oder"]["fields"]["tours_odere23crstours_ida"] = array (
  'name' => 'tours_odere23crstours_ida',
  'type' => 'link',
  'relationship' => 'tours_oders',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TOURS_ODERS_FROM_ODERS_TITLE',
);

?>