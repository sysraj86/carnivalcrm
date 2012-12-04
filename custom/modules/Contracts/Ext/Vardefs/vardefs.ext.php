<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2012-11-12 16:42:17
$dictionary["Contract"]["fields"]["contacts_contracts"] = array (
  'name' => 'contacts_contracts',
  'type' => 'link',
  'relationship' => 'contacts_contracts',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_CONTRACTS_FROM_CONTACTS_TITLE',
);
$dictionary["Contract"]["fields"]["contacts_contracts_name"] = array (
  'name' => 'contacts_contracts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_CONTRACTS_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_c3245ontacts_ida',
  'link' => 'contacts_contracts',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Contract"]["fields"]["contacts_c3245ontacts_ida"] = array (
  'name' => 'contacts_c3245ontacts_ida',
  'type' => 'link',
  'relationship' => 'contacts_contracts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_CONTRACTS_FROM_CONTRACTS_TITLE',
);


// created: 2011-11-23 15:54:30
$dictionary["Contract"]["fields"]["contracts_andixcontract_1"] = array (
  'name' => 'contracts_andixcontract_1',
  'type' => 'link',
  'relationship' => 'contracts_appendixcontract_1',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_CONTRACTS_APPENDIXCONTRACT_1_FROM_APPENDIXCONTRACT_TITLE',
);


// created: 2011-09-21 10:55:26
$dictionary["Contract"]["fields"]["contracts_apendixcontract"] = array (
  'name' => 'contracts_apendixcontract',
  'type' => 'link',
  'relationship' => 'contracts_appendixcontract',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_CONTRACTS_APPENDIXCONTRACT_FROM_APPENDIXCONTRACT_TITLE',
);


// created: 2012-10-01 16:16:00
$dictionary["Contract"]["fields"]["contracts_ctractappendixs"] = array (
  'name' => 'contracts_ctractappendixs',
  'type' => 'link',
  'relationship' => 'contracts_contractappendixs',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_CONTRACTS_CONTRACTAPPENDIXS_FROM_CONTRACTAPPENDIXS_TITLE',
);


// created: 2011-10-04 10:29:08
$dictionary["Contract"]["fields"]["c_approval_contracts"] = array (
  'name' => 'c_approval_contracts',
  'type' => 'link',
  'relationship' => 'c_approval_contracts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_C_APPROVAL_CONTRACTS_FROM_C_APPROVAL_TITLE',
);


// created: 2011-11-01 12:41:34
$dictionary["Contract"]["fields"]["fits_contracts"] = array (
  'name' => 'fits_contracts',
  'type' => 'link',
  'relationship' => 'fits_contracts',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_CONTRACTS_FROM_FITS_TITLE',
);
$dictionary["Contract"]["fields"]["fits_contracts_name"] = array (
  'name' => 'fits_contracts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_CONTRACTS_FROM_FITS_TITLE',
  'save' => true,
  'id_name' => 'fits_contr29f3ctsfits_ida',
  'link' => 'fits_contracts',
  'table' => 'fits',
  'module' => 'FITs',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Contract"]["fields"]["fits_contr29f3ctsfits_ida"] = array (
  'name' => 'fits_contr29f3ctsfits_ida',
  'type' => 'link',
  'relationship' => 'fits_contracts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FITS_CONTRACTS_FROM_CONTRACTS_TITLE',
);


// created: 2011-09-29 13:50:17
$dictionary["Contract"]["fields"]["groupprograms_contracts"] = array (
  'name' => 'groupprograms_contracts',
  'type' => 'link',
  'relationship' => 'groupprograms_contracts',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_CONTRACTS_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["Contract"]["fields"]["groupprogracontracts_name"] = array (
  'name' => 'groupprogracontracts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_CONTRACTS_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr4251rograms_ida',
  'link' => 'groupprograms_contracts',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  //'required'=> true,
  'rname' => 'name',
);
$dictionary["Contract"]["fields"]["groupprogr4251rograms_ida"] = array (
  'name' => 'groupprogr4251rograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_contracts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_CONTRACTS_FROM_CONTRACTS_TITLE',
);

?>