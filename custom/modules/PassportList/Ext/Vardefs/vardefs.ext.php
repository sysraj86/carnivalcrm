<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-08-22 17:06:06
$dictionary["PassportList"]["fields"]["groupprogras_passportlist"] = array (
  'name' => 'groupprogras_passportlist',
  'type' => 'link',
  'relationship' => 'groupprograms_passportlist',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_PASSPORTLIST_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["PassportList"]["fields"]["groupprograsportlist_name"] = array (
  'name' => 'groupprograsportlist_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_PASSPORTLIST_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr20c9rograms_ida',
  'link' => 'groupprogras_passportlist',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'rname' => 'name',
);
$dictionary["PassportList"]["fields"]["groupprogr20c9rograms_ida"] = array (
  'name' => 'groupprogr20c9rograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_passportlist',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_GROUPPROGRAMS_PASSPORTLIST_FROM_GROUPPROGRAMS_TITLE',
);


// created: 2011-08-18 11:16:42
$dictionary["PassportList"]["fields"]["passportlist_activities_calls"] = array (
  'name' => 'passportlist_activities_calls',
  'type' => 'link',
  'relationship' => 'passportlist_activities_calls',
  'source' => 'non-db',
);


// created: 2011-08-18 11:16:47
$dictionary["PassportList"]["fields"]["passportlist_activities_emails"] = array (
  'name' => 'passportlist_activities_emails',
  'type' => 'link',
  'relationship' => 'passportlist_activities_emails',
  'source' => 'non-db',
);


// created: 2011-08-18 11:16:43
$dictionary["PassportList"]["fields"]["passportlist_activities_meetings"] = array (
  'name' => 'passportlist_activities_meetings',
  'type' => 'link',
  'relationship' => 'passportlist_activities_meetings',
  'source' => 'non-db',
);


// created: 2011-08-18 11:16:45
$dictionary["PassportList"]["fields"]["passportlist_activities_notes"] = array (
  'name' => 'passportlist_activities_notes',
  'type' => 'link',
  'relationship' => 'passportlist_activities_notes',
  'source' => 'non-db',
);


// created: 2011-08-18 11:16:46
$dictionary["PassportList"]["fields"]["passportlist_activities_tasks"] = array (
  'name' => 'passportlist_activities_tasks',
  'type' => 'link',
  'relationship' => 'passportlist_activities_tasks',
  'source' => 'non-db',
);


// created: 2011-08-18 00:14:33
$dictionary["PassportList"]["fields"]["passportlist_passports"] = array (
  'name' => 'passportlist_passports',
  'type' => 'link',
  'relationship' => 'passportlist_passports',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_PASSPORTLIST_PASSPORTS_FROM_PASSPORTS_TITLE',
);

?>