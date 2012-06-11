<?php
// created: 2011-10-26 10:56:10
$dictionary["Transport"]["fields"]["countries_transports"] = array (
  'name' => 'countries_transports',
  'type' => 'link',
  'relationship' => 'countries_transports',
  'source' => 'non-db',
  'vname' => 'LBL_COUNTRIES_TRANSPORTS_FROM_COUNTRIES_TITLE',
);
$dictionary["Transport"]["fields"]["countries_transports_name"] = array (
  'name' => 'countries_transports_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_COUNTRIES_TRANSPORTS_FROM_COUNTRIES_TITLE',
  'save' => true,
  'id_name' => 'countries_f24buntries_ida',
  'link' => 'countries_transports',
  'table' => 'countries',
  'module' => 'Countries',
  'rname' => 'name',
);
$dictionary["Transport"]["fields"]["countries_f24buntries_ida"] = array (
  'name' => 'countries_f24buntries_ida',
  'type' => 'link',
  'relationship' => 'countries_transports',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_COUNTRIES_TRANSPORTS_FROM_TRANSPORTS_TITLE',
);
