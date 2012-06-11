<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2012-02-20 11:40:16
$dictionary["Prospect"]["fields"]["accounts_prospects"] = array (
  'name' => 'accounts_prospects',
  'type' => 'link',
  'relationship' => 'accounts_prospects',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_PROSPECTS_FROM_ACCOUNTS_TITLE',
);
$dictionary["Prospect"]["fields"]["accounts_prospects_name"] = array (
  'name' => 'accounts_prospects_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_PROSPECTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_p4bcbccounts_ida',
  'link' => 'accounts_prospects',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["Prospect"]["fields"]["accounts_p4bcbccounts_ida"] = array (
  'name' => 'accounts_p4bcbccounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_prospects',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_PROSPECTS_FROM_PROSPECTS_TITLE',
);



$dictionary['Prospect']['fields']['SecurityGroups'] = array (
  	'name' => 'SecurityGroups',
    'type' => 'link',
	'relationship' => 'securitygroups_prospects',
	'module'=>'SecurityGroups',
	'bean_name'=>'SecurityGroup',
    'source'=>'non-db',
	'vname'=>'LBL_SECURITYGROUPS',
);





?>