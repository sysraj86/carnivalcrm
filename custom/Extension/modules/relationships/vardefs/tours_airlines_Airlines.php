<?php
// created: 2011-08-19 10:46:04
$dictionary["Airline"]["fields"]["tours_airlines"] = array (
  'name' => 'tours_airlines',
  'type' => 'link',
  'relationship' => 'tours_airlines',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_AIRLINES_FROM_TOURS_TITLE',
);
$dictionary["Airline"]["fields"]["tours_airlines_name"] = array (
  'name' => 'tours_airlines_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_AIRLINES_FROM_TOURS_TITLE',
  'save' => true,
  'id_name' => 'tours_airl69b4estours_ida',
  'link' => 'tours_airlines',
  'table' => 'tours',
  'module' => 'Tours',
  'rname' => 'name',
);
$dictionary["Airline"]["fields"]["tours_airl69b4estours_ida"] = array (
  'name' => 'tours_airl69b4estours_ida',
  'type' => 'link',
  'relationship' => 'tours_airlines',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TOURS_AIRLINES_FROM_AIRLINES_TITLE',
);
