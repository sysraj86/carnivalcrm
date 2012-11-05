<?php
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
