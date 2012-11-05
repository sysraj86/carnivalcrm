<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2012-11-01 15:54:49
$dictionary["Opportunity"]["fields"]["contacts_opportunities"] = array (
  'name' => 'contacts_opportunities',
  'type' => 'link',
  'relationship' => 'contacts_opportunities',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_OPPORTUNITIES_FROM_CONTACTS_TITLE',
);
$dictionary["Opportunity"]["fields"]["contacts_oprtunities_name"] = array (
  'name' => 'contacts_oprtunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_OPPORTUNITIES_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_ob501ontacts_ida',
  'link' => 'contacts_opportunities',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Opportunity"]["fields"]["contacts_ob501ontacts_ida"] = array (
  'name' => 'contacts_ob501ontacts_ida',
  'type' => 'link',
  'relationship' => 'contacts_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
);


// created: 2012-11-01 15:45:39
$dictionary["Opportunity"]["fields"]["fits_opportunities"] = array (
  'name' => 'fits_opportunities',
  'type' => 'link',
  'relationship' => 'fits_opportunities',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_OPPORTUNITIES_FROM_FITS_TITLE',
);
$dictionary["Opportunity"]["fields"]["fits_opportunities_name"] = array (
  'name' => 'fits_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_OPPORTUNITIES_FROM_FITS_TITLE',
  'save' => true,
  'id_name' => 'fits_oppor18f3iesfits_ida',
  'link' => 'fits_opportunities',
  'table' => 'fits',
  'module' => 'FITs',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Opportunity"]["fields"]["fits_oppor18f3iesfits_ida"] = array (
  'name' => 'fits_oppor18f3iesfits_ida',
  'type' => 'link',
  'relationship' => 'fits_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FITS_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
);



$dictionary['Opportunity']['fields']['SecurityGroups'] = array (
  	'name' => 'SecurityGroups',
    'type' => 'link',
	'relationship' => 'securitygroups_opportunities',
	'module'=>'SecurityGroups',
	'bean_name'=>'SecurityGroup',
    'source'=>'non-db',
	'vname'=>'LBL_SECURITYGROUPS',
);






$dictionary['Opportunity']['fields']['ngaykhoihanh'] = array (
    'required' => false,
    'name' => 'ngaykhoihanh',
    'vname' => 'LBL_NGAYKHOIHANH',
    'type' => 'date',
    'enable_range_search' => true,
    'size' => '30',
    'options' => 'date_range_search_dom',
);
$dictionary['Opportunity']['fields']['songuoilon'] = array (
    'name' => 'songuoilon',
    'vname' => 'LBL_SONGUOILON',
    'type' => 'int',
    'importable' => 'true',
    'default' => '0', 
    'size' => '20',
    'enable_range_search' => true,
    'duplicate_merge' => 'disabled', 
    'options' => 'numeric_range_search_dom',
);
$dictionary['Opportunity']['fields']['thongtintreem'] = array (
    'required' => false,
    'name' => 'thongtintreem',
    'vname' => 'LBL_THONGTINTREEM',
    'type' => 'text',
    'massupdate' => 0,
    'comments' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'size' => '20',
    'len' => '255',
    'studio' => 'visible',
    'rows' => '4',
    'cols' => '50',
);
$dictionary['Opportunity']['fields']['songaydi'] = array (
    'name' => 'songaydi',
    'vname' => 'LBL_SONGAYDI',
    'type' => 'int',
    'importable' => 'true',
    'default' => '0', 
    'size' => '20',
    'maxsize' => '255',
    'enable_range_search' => true,
    'duplicate_merge' => 'disabled',
    'options' => 'numeric_range_search_dom',
);
$dictionary['Opportunity']['fields']['noimuondi'] = array (
    'name' => 'noimuondi',
    'vname' => 'LBL_NOIMUONDI',
    'type' => 'varchar',
);
$dictionary['Opportunity']['fields']['phuongtienmuondi'] = array (
    'name' => 'phuongtienmuondi',
    'vname' => 'LBL_PHUONGTIENMUONDI',
    'type' => 'varchar',
);

?>