<?php
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
  'rname' => 'name',
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
