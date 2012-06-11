<?php
// created: 2011-08-19 11:22:38
$dictionary["Contact"]["fields"]["airlines_contacts"] = array (
  'name' => 'airlines_contacts',
  'type' => 'link',
  'relationship' => 'airlines_contacts',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINES_CONTACTS_FROM_AIRLINES_TITLE',
);
$dictionary["Contact"]["fields"]["airlines_contacts_name"] = array (
  'name' => 'airlines_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AIRLINES_CONTACTS_FROM_AIRLINES_TITLE',
  'save' => true,
  'id_name' => 'airlines_c7d68irlines_ida',
  'link' => 'airlines_contacts',
  'table' => 'airlines',
  'module' => 'Airlines',
  'rname' => 'name',
);
$dictionary["Contact"]["fields"]["airlines_c7d68irlines_ida"] = array (
  'name' => 'airlines_c7d68irlines_ida',
  'type' => 'link',
  'relationship' => 'airlines_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AIRLINES_CONTACTS_FROM_CONTACTS_TITLE',
);
