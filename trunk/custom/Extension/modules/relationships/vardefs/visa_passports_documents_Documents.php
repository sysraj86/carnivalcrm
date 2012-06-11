<?php
// created: 2011-08-13 01:30:56
$dictionary["Document"]["fields"]["visa_passports_documents"] = array (
  'name' => 'visa_passports_documents',
  'type' => 'link',
  'relationship' => 'visa_passports_documents',
  'source' => 'non-db',
  'vname' => 'LBL_VISA_PASSPORTS_DOCUMENTS_FROM_VISA_PASSPORTS_TITLE',
);
$dictionary["Document"]["fields"]["visa_passpodocuments_name"] = array (
  'name' => 'visa_passpodocuments_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VISA_PASSPORTS_DOCUMENTS_FROM_VISA_PASSPORTS_TITLE',
  'save' => true,
  'id_name' => 'visa_passp91d5ssports_ida',
  'link' => 'visa_passports_documents',
  'table' => 'visa_passports',
  'module' => 'visa_Passports',
  'rname' => 'name',
);
$dictionary["Document"]["fields"]["visa_passp91d5ssports_ida"] = array (
  'name' => 'visa_passp91d5ssports_ida',
  'type' => 'link',
  'relationship' => 'visa_passports_documents',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VISA_PASSPORTS_DOCUMENTS_FROM_DOCUMENTS_TITLE',
);
