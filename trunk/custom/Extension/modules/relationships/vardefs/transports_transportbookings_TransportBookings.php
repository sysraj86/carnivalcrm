<?php
// created: 2011-09-10 08:39:23
$dictionary["TransportBookings"]["fields"]["transports_nsportbookings"] = array (
  'name' => 'transports_nsportbookings',
  'type' => 'link',
  'relationship' => 'transports_transportbookings',
  'source' => 'non-db',
  'vname' => 'LBL_TRANSPORTS_TRANSPORTBOOKINGS_FROM_TRANSPORTS_TITLE',
);
$dictionary["TransportBookings"]["fields"]["transports_tbookings_name"] = array (
  'name' => 'transports_tbookings_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TRANSPORTS_TRANSPORTBOOKINGS_FROM_TRANSPORTS_TITLE',
  'save' => true,
  'id_name' => 'transports6e65nsports_ida',
  'link' => 'transports_nsportbookings',
  'table' => 'transports',
  'module' => 'Transports',
  'rname' => 'name',
);
$dictionary["TransportBookings"]["fields"]["transports6e65nsports_ida"] = array (
  'name' => 'transports6e65nsports_ida',
  'type' => 'link',
  'relationship' => 'transports_transportbookings',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TRANSPORTS_TRANSPORTBOOKINGS_FROM_TRANSPORTBOOKINGS_TITLE',
);
