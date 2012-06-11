<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-10-04 10:29:08
$dictionary["TransportBookings"]["fields"]["c_approval_nsportbookings"] = array (
  'name' => 'c_approval_nsportbookings',
  'type' => 'link',
  'relationship' => 'c_approval_transportbookings',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_C_APPROVAL_TRANSPORTBOOKINGS_FROM_C_APPROVAL_TITLE',
);


// created: 2011-09-10 08:42:47
$dictionary["TransportBookings"]["fields"]["groupprogransportbookings"] = array (
  'name' => 'groupprogransportbookings',
  'type' => 'link',
  'relationship' => 'groupprograms_transportbookings',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_TRANSPORTBOOKINGS_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["TransportBookings"]["fields"]["groupprogratbookings_name"] = array (
  'name' => 'groupprogratbookings_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_TRANSPORTBOOKINGS_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogrd5earograms_ida',
  'link' => 'groupprogransportbookings',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'required' => true,
  'rname' => 'groupprogram_code',
);
$dictionary["TransportBookings"]["fields"]["groupprogrd5earograms_ida"] = array (
  'name' => 'groupprogrd5earograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_transportbookings',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_TRANSPORTBOOKINGS_FROM_TRANSPORTBOOKINGS_TITLE',
);


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
  'required' => true,
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

?>