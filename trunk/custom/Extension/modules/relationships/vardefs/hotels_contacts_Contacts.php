<?php
// created: 2011-08-19 11:15:42
$dictionary["Contact"]["fields"]["hotels_contacts"] = array (
  'name' => 'hotels_contacts',
  'type' => 'link',
  'relationship' => 'hotels_contacts',
  'source' => 'non-db',
  'vname' => 'LBL_HOTELS_CONTACTS_FROM_HOTELS_TITLE',
);
$dictionary["Contact"]["fields"]["hotels_contacts_name"] = array (
  'name' => 'hotels_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HOTELS_CONTACTS_FROM_HOTELS_TITLE',
  'save' => true,
  'id_name' => 'hotels_con6414shotels_ida',
  'link' => 'hotels_contacts',
  'table' => 'hotels',
  'module' => 'Hotels',
  'rname' => 'name',
);
$dictionary["Contact"]["fields"]["hotels_con6414shotels_ida"] = array (
  'name' => 'hotels_con6414shotels_ida',
  'type' => 'link',
  'relationship' => 'hotels_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HOTELS_CONTACTS_FROM_CONTACTS_TITLE',
);
