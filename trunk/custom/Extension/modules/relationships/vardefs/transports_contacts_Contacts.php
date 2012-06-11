<?php
// created: 2011-09-27 09:30:40
$dictionary["Contact"]["fields"]["transports_contacts"] = array (
  'name' => 'transports_contacts',
  'type' => 'link',
  'relationship' => 'transports_contacts',
  'source' => 'non-db',
  'vname' => 'LBL_TRANSPORTS_CONTACTS_FROM_TRANSPORTS_TITLE',
);
$dictionary["Contact"]["fields"]["transports_contacts_name"] = array (
  'name' => 'transports_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TRANSPORTS_CONTACTS_FROM_TRANSPORTS_TITLE',
  'save' => true,
  'id_name' => 'transportsb673nsports_ida',
  'link' => 'transports_contacts',
  'table' => 'transports',
  'module' => 'Transports',
  'rname' => 'name',
);
$dictionary["Contact"]["fields"]["transportsb673nsports_ida"] = array (
  'name' => 'transportsb673nsports_ida',
  'type' => 'link',
  'relationship' => 'transports_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TRANSPORTS_CONTACTS_FROM_CONTACTS_TITLE',
);
