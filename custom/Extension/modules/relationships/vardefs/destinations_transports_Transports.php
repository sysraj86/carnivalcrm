<?php
// created: 2011-10-26 10:52:10
$dictionary["Transport"]["fields"]["destinations_transports"] = array (
  'name' => 'destinations_transports',
  'type' => 'link',
  'relationship' => 'destinations_transports',
  'source' => 'non-db',
  'vname' => 'LBL_DESTINATIONS_TRANSPORTS_FROM_DESTINATIONS_TITLE',
);
$dictionary["Transport"]["fields"]["destinationransports_name"] = array (
  'name' => 'destinationransports_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_DESTINATIONS_TRANSPORTS_FROM_DESTINATIONS_TITLE',
  'save' => true,
  'id_name' => 'destinatio458bnations_ida',
  'link' => 'destinations_transports',
  'table' => 'destinations',
  'module' => 'Destinations',
  'rname' => 'name',
);
$dictionary["Transport"]["fields"]["destinatio458bnations_ida"] = array (
  'name' => 'destinatio458bnations_ida',
  'type' => 'link',
  'relationship' => 'destinations_transports',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_DESTINATIONS_TRANSPORTS_FROM_TRANSPORTS_TITLE',
);
