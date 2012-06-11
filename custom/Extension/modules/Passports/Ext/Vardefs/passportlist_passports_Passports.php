<?php
// created: 2011-08-18 00:14:33
$dictionary["Passports"]["fields"]["passportlist_passports"] = array (
  'name' => 'passportlist_passports',
  'type' => 'link',
  'relationship' => 'passportlist_passports',
  'source' => 'non-db',
  'vname' => 'LBL_PASSPORTLIST_PASSPORTS_FROM_PASSPORTLIST_TITLE',
);
$dictionary["Passports"]["fields"]["passportlispassports_name"] = array (
  'name' => 'passportlispassports_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_PASSPORTLIST_PASSPORTS_FROM_PASSPORTLIST_TITLE',
  'save' => true,
  'id_name' => 'passportli5f6cortlist_ida',
  'link' => 'passportlist_passports',
  'table' => 'PassportList',
  'module' => 'PassportList',
  'rname' => 'name',
);
$dictionary["Passports"]["fields"]["passportli5f6cortlist_ida"] = array (
  'name' => 'passportli5f6cortlist_ida',
  'type' => 'link',
  'relationship' => 'passportlist_passports',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_PASSPORTLIST_PASSPORTS_FROM_PASSPORTS_TITLE',
);
