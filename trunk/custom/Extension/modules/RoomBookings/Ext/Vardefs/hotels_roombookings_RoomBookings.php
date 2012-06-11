<?php
// created: 2011-08-24 10:09:40
$dictionary["RoomBookings"]["fields"]["hotels_roombookings"] = array (
  'name' => 'hotels_roombookings',
  'type' => 'link',
  'relationship' => 'hotels_roombookings',
  'source' => 'non-db',
  'vname' => 'LBL_HOTELS_ROOMBOOKINGS_FROM_HOTELS_TITLE',
);
$dictionary["RoomBookings"]["fields"]["hotels_roombookings_name"] = array (
  'name' => 'hotels_roombookings_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HOTELS_ROOMBOOKINGS_FROM_HOTELS_TITLE',
  'save' => true,
  'id_name' => 'hotels_rooc622shotels_ida',
  'link' => 'hotels_roombookings',
  'table' => 'hotels',
  'module' => 'Hotels',
  'rname' => 'name',
  'required'    => true,
);
$dictionary["RoomBookings"]["fields"]["hotels_rooc622shotels_ida"] = array (
  'name' => 'hotels_rooc622shotels_ida',
  'type' => 'link',
  'relationship' => 'hotels_roombookings',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HOTELS_ROOMBOOKINGS_FROM_ROOMBOOKINGS_TITLE',
);
