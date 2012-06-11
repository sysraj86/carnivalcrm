<?php
// created: 2011-08-19 10:41:51
$dictionary["Oder"]["fields"]["tours_oders"] = array (
  'name' => 'tours_oders',
  'type' => 'link',
  'relationship' => 'tours_oders',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_ODERS_FROM_TOURS_TITLE',
);
$dictionary["Oder"]["fields"]["tours_oders_name"] = array (
  'name' => 'tours_oders_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_ODERS_FROM_TOURS_TITLE',
  'save' => true,
  'id_name' => 'tours_odere23crstours_ida',
  'link' => 'tours_oders',
  'table' => 'tours',
  'module' => 'Tours',
  'rname' => 'name',
);
$dictionary["Oder"]["fields"]["tours_odere23crstours_ida"] = array (
  'name' => 'tours_odere23crstours_ida',
  'type' => 'link',
  'relationship' => 'tours_oders',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TOURS_ODERS_FROM_ODERS_TITLE',
);
