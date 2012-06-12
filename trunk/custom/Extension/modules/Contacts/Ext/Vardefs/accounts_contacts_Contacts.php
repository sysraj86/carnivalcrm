<?php
// created: 2011-09-27 09:30:40
$dictionary["Contact"]["fields"]["accounts_contacts"] = array (
  'name' => 'accounts_contacts',
  'type' => 'link',
  'relationship' => 'accounts_contacts',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNT_CONTACT_NAME',
);
$dictionary["Contact"]["fields"]["accounts_contacts_name"] = array (
  'name' => 'accounts_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNT_CONTACT_NAME',
  'save' => true,
  'id_name' => 'account_id',
  'link' => 'accounts_contacts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["Contact"]["fields"]["account_id"] = array (
  'name' => 'account_id',
  'type' => 'link',
  'relationship' => 'accounts_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_ACCOUNT_CONTACT_NAME',
);
