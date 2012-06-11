<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-08-23 11:28:48
$dictionary["Insurances"]["fields"]["groupprograms_insurances"] = array (
  'name' => 'groupprograms_insurances',
  'type' => 'link',
  'relationship' => 'groupprograms_insurances',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_INSURANCES_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["Insurances"]["fields"]["groupprogransurances_name"] = array (
  'name' => 'groupprogransurances_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_INSURANCES_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr3b48rograms_ida',
  'link' => 'groupprograms_insurances',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'rname' => 'name',
);
$dictionary["Insurances"]["fields"]["groupprogr3b48rograms_ida"] = array (
  'name' => 'groupprogr3b48rograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_insurances',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_GROUPPROGRAMS_INSURANCES_FROM_GROUPPROGRAMS_TITLE',
);


// created: 2011-11-25 10:11:55
$dictionary["Insurances"]["fields"]["insurances_activities_calls"] = array (
  'name' => 'insurances_activities_calls',
  'type' => 'link',
  'relationship' => 'insurances_activities_calls',
  'source' => 'non-db',
);


// created: 2011-11-25 10:12:11
$dictionary["Insurances"]["fields"]["insurances_activities_emails"] = array (
  'name' => 'insurances_activities_emails',
  'type' => 'link',
  'relationship' => 'insurances_activities_emails',
  'source' => 'non-db',
);


// created: 2011-11-25 10:11:59
$dictionary["Insurances"]["fields"]["insurances_activities_meetings"] = array (
  'name' => 'insurances_activities_meetings',
  'type' => 'link',
  'relationship' => 'insurances_activities_meetings',
  'source' => 'non-db',
);


// created: 2011-11-25 10:12:03
$dictionary["Insurances"]["fields"]["insurances_activities_notes"] = array (
  'name' => 'insurances_activities_notes',
  'type' => 'link',
  'relationship' => 'insurances_activities_notes',
  'source' => 'non-db',
);


// created: 2011-11-25 10:12:08
$dictionary["Insurances"]["fields"]["insurances_activities_tasks"] = array (
  'name' => 'insurances_activities_tasks',
  'type' => 'link',
  'relationship' => 'insurances_activities_tasks',
  'source' => 'non-db',
);


// created: 2011-08-23 11:27:26
$dictionary["Insurances"]["fields"]["insurances_fits"] = array (
  'name' => 'insurances_fits',
  'type' => 'link',
  'relationship' => 'insurances_fits',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_INSURANCES_FITS_FROM_FITS_TITLE',
);

?>