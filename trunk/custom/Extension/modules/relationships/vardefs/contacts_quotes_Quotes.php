<?php
// created: 2011-09-06 11:38:05
$dictionary["Quotes"]["fields"]["contacts_quotes"] = array (
  'name' => 'contacts_quotes',
  'type' => 'link',
  'relationship' => 'contacts_quotes',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_QUOTES_FROM_CONTACTS_TITLE',
);
$dictionary["Quotes"]["fields"]["contacts_quotes_name"] = array (
  'name' => 'contacts_quotes_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_QUOTES_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_q33a7ontacts_ida',
  'link' => 'contacts_quotes',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Quotes"]["fields"]["contacts_q33a7ontacts_ida"] = array (
  'name' => 'contacts_q33a7ontacts_ida',
  'type' => 'link',
  'relationship' => 'contacts_quotes',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_QUOTES_FROM_QUOTES_TITLE',
);
