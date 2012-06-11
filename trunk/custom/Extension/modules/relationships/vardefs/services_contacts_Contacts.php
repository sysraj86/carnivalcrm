<?php
// created: 2011-11-01 09:19:33
$dictionary["Contact"]["fields"]["services_contacts"] = array (
  'name' => 'services_contacts',
  'type' => 'link',
  'relationship' => 'services_contacts',
  'source' => 'non-db',
  'vname' => 'LBL_SERVICES_CONTACTS_FROM_SERVICES_TITLE',
);
$dictionary["Contact"]["fields"]["services_contacts_name"] = array (
  'name' => 'services_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SERVICES_CONTACTS_FROM_SERVICES_TITLE',
  'save' => true,
  'id_name' => 'services_c22c5ervices_ida',
  'link' => 'services_contacts',
  'table' => 'services',
  'module' => 'Services',
  'rname' => 'name',
);
$dictionary["Contact"]["fields"]["services_c22c5ervices_ida"] = array (
  'name' => 'services_c22c5ervices_ida',
  'type' => 'link',
  'relationship' => 'services_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SERVICES_CONTACTS_FROM_CONTACTS_TITLE',
);
