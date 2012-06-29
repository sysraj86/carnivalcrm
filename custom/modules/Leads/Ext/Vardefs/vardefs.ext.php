<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2012-02-20 11:43:35
$dictionary["Lead"]["fields"]["accounts_leads"] = array (
  'name' => 'accounts_leads',
  'type' => 'link',
  'relationship' => 'accounts_leads',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_LEADS_FROM_ACCOUNTS_TITLE',
);
$dictionary["Lead"]["fields"]["accounts_leads_name"] = array (
  'name' => 'accounts_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_LEADS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_l777cccounts_ida',
  'link' => 'accounts_leads',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["Lead"]["fields"]["accounts_l777cccounts_ida"] = array (
  'name' => 'accounts_l777cccounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_leads',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_LEADS_FROM_LEADS_TITLE',
);



$dictionary['Lead']['fields']['SecurityGroups'] = array (
  	'name' => 'SecurityGroups',
    'type' => 'link',
	'relationship' => 'securitygroups_leads',
	'module'=>'SecurityGroups',
	'bean_name'=>'SecurityGroup',
    'source'=>'non-db',
	'vname'=>'LBL_SECURITYGROUPS',
);







$dictionary['Lead']['fields']['type'] = array (
      'name' => 'type',
    'type' => 'enum',
    'vname'=>'LBL_TYPE',
    'options'=>'lead_type_dom',
);
$dictionary['Lead']['fields']['gender'] = array (
    'required' => true,
    'name' => 'gender',
    'vname' => 'LBL_GENDER',
    'type' => 'radioenum',
    'massupdate' => 1,
    'default' => 'male',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'enable',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => 100,
    'size' => '20',
    'options' => 'gender_dom',
    'studio' => 'visible',
    'dbType' => 'enum',
    'separator' => '',
);





?>