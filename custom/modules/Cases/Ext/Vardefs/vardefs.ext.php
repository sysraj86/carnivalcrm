<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-11-11 22:50:07
$dictionary["Case"]["fields"]["fits_cases"] = array (
  'name' => 'fits_cases',
  'type' => 'link',
  'relationship' => 'fits_cases',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_CASES_FROM_FITS_TITLE',
);
$dictionary["Case"]["fields"]["fits_cases_name"] = array (
  'name' => 'fits_cases_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_CASES_FROM_FITS_TITLE',
  'save' => true,
  'id_name' => 'fits_cases9412sesfits_ida',
  'link' => 'fits_cases',
  'table' => 'fits',
  'module' => 'FITs',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Case"]["fields"]["fits_cases9412sesfits_ida"] = array (
  'name' => 'fits_cases9412sesfits_ida',
  'type' => 'link',
  'relationship' => 'fits_cases',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FITS_CASES_FROM_CASES_TITLE',
);


// created: 2011-08-17 18:13:33
$dictionary["Case"]["fields"]["groupprograms_cases_1"] = array (
  'name' => 'groupprograms_cases_1',
  'type' => 'link',
  'relationship' => 'groupprograms_cases_1',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_CASES_1_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["Case"]["fields"]["groupprogras_cases_1_name"] = array (
  'name' => 'groupprogras_cases_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_CASES_1_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr9b03rograms_ida',
  'link' => 'groupprograms_cases_1',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'rname' => 'name',
);
$dictionary["Case"]["fields"]["groupprogr9b03rograms_ida"] = array (
  'name' => 'groupprogr9b03rograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_cases_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_CASES_1_FROM_CASES_TITLE',
);


// created: 2011-08-17 18:15:27
$dictionary["Case"]["fields"]["groupprograms_cases_2"] = array (
  'name' => 'groupprograms_cases_2',
  'type' => 'link',
  'relationship' => 'groupprograms_cases_2',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_CASES_2_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["Case"]["fields"]["groupprogras_cases_2_name"] = array (
  'name' => 'groupprogras_cases_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_CASES_2_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr06d7rograms_ida',
  'link' => 'groupprograms_cases_2',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'rname' => 'name',
);
$dictionary["Case"]["fields"]["groupprogr06d7rograms_ida"] = array (
  'name' => 'groupprogr06d7rograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_cases_2',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_CASES_2_FROM_CASES_TITLE',
);


// created: 2011-08-19 10:58:01
$dictionary["Case"]["fields"]["groupprograms_cases"] = array (
  'name' => 'groupprograms_cases',
  'type' => 'link',
  'relationship' => 'groupprograms_cases',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_CASES_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["Case"]["fields"]["groupprograms_cases_name"] = array (
  'name' => 'groupprograms_cases_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_CASES_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr446brograms_ida',
  'link' => 'groupprograms_cases',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'rname' => 'name',
);
$dictionary["Case"]["fields"]["groupprogr446brograms_ida"] = array (
  'name' => 'groupprogr446brograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_cases',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_CASES_FROM_CASES_TITLE',
);



$dictionary['Case']['fields']['SecurityGroups'] = array (
  	'name' => 'SecurityGroups',
    'type' => 'link',
	'relationship' => 'securitygroups_cases',
	'module'=>'SecurityGroups',
	'bean_name'=>'SecurityGroup',
    'source'=>'non-db',
	'vname'=>'LBL_SECURITYGROUPS',
);






// created: 2011-11-11 22:50:07

$dictionary["Case"]["fields"]["case_number"]['required'] =  false;

?>