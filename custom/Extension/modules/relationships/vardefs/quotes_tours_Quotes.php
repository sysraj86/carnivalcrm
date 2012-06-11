<?php
// created: 2011-09-06 11:44:45
$dictionary["Quotes"]["fields"]["quotes_tours"] = array (
  'name' => 'quotes_tours',
  'type' => 'link',
  'relationship' => 'quotes_tours',
  'source' => 'non-db',
  'vname' => 'LBL_QUOTES_TOURS_FROM_TOURS_TITLE',
);
$dictionary["Quotes"]["fields"]["quotes_tours_name"] = array (
  'name' => 'quotes_tours_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_QUOTES_TOURS_FROM_TOURS_TITLE',
  'save' => true,
  'id_name' => 'quotes_toufa8brstours_idb',
  'link' => 'quotes_tours',
  'table' => 'tours',
  'module' => 'Tours',
  'rname' => 'name',
);
$dictionary["Quotes"]["fields"]["quotes_toufa8brstours_idb"] = array (
  'name' => 'quotes_toufa8brstours_idb',
  'type' => 'link',
  'relationship' => 'quotes_tours',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_QUOTES_TOURS_FROM_TOURS_TITLE',
);
