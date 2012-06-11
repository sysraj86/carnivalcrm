<?php
// created: 2011-08-24 10:56:49
$dictionary["RoomBookings"]["fields"]["groupprogras_roombookings"] = array (
  'name' => 'groupprogras_roombookings',
  'type' => 'link',
  'relationship' => 'groupprograms_roombookings',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_ROOMBOOKINGS_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["RoomBookings"]["fields"]["groupprogrambookings_name"] = array (
  'name' => 'groupprogrambookings_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_ROOMBOOKINGS_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogra66erograms_ida',
  'link' => 'groupprogras_roombookings',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'rname' => 'name',
);
$dictionary["RoomBookings"]["fields"]["groupprogra66erograms_ida"] = array (
  'name' => 'groupprogra66erograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_roombookings',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_ROOMBOOKINGS_FROM_ROOMBOOKINGS_TITLE',
);
