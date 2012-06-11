<?php
// created: 2011-08-24 10:58:19
$dictionary["ServiceBookings"]["fields"]["groupprograervicebookings"] = array (
  'name' => 'groupprograervicebookings',
  'type' => 'link',
  'relationship' => 'groupprograms_servicebookings',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_SERVICEBOOKINGS_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["ServiceBookings"]["fields"]["groupprograebookings_name"] = array (
  'name' => 'groupprograebookings_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_SERVICEBOOKINGS_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr0d2frograms_ida',
  'link' => 'groupprograervicebookings',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'rname' => 'name',
);
$dictionary["ServiceBookings"]["fields"]["groupprogr0d2frograms_ida"] = array (
  'name' => 'groupprogr0d2frograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_servicebookings',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_SERVICEBOOKINGS_FROM_SERVICEBOOKINGS_TITLE',
);
