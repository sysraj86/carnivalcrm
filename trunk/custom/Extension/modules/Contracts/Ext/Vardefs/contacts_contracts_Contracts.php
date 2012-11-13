<?php
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
