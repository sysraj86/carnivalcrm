<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2012-10-26 19:00:56
$dictionary["ProspectList"]["fields"]["prospectlists_fits"] = array (
  'name' => 'prospectlists_fits',
  'type' => 'link',
  'relationship' => 'prospectlists_fits',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_PROSPECTLISTS_FITS_FROM_FITS_TITLE',
);



$dictionary['ProspectList']['fields']['SecurityGroups'] = array (
  	'name' => 'SecurityGroups',
    'type' => 'link',
	'relationship' => 'securitygroups_prospect_lists',
	'module'=>'SecurityGroups',
	'bean_name'=>'SecurityGroup',
    'source'=>'non-db',
	'vname'=>'LBL_SECURITYGROUPS',
);





?>