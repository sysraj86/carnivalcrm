<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-10-04 10:29:08
$dictionary["RoomBookings"]["fields"]["c_approval_roombookings"] = array (
  'name' => 'c_approval_roombookings',
  'type' => 'link',
  'relationship' => 'c_approval_roombookings',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_C_APPROVAL_ROOMBOOKINGS_FROM_C_APPROVAL_TITLE',
);


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
  'required'   => true, 
  'rname' => 'groupprogram_code',
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

?>