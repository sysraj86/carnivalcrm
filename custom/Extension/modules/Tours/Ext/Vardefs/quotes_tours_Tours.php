<?php
// created: 2011-09-06 11:44:45
$dictionary["Tour"]["fields"]["quotes_tours"] = array (
  'name' => 'quotes_tours',
  'type' => 'link',
  'relationship' => 'quotes_tours',
  'source' => 'non-db',
  'vname' => 'LBL_QUOTES_TOURS_FROM_QUOTES_TITLE',
);
$dictionary["Tour"]["fields"]["quotes_tours_name"] = array (
  'name' => 'quotes_tours_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_QUOTES_TOURS_FROM_QUOTES_TITLE',
  'save' => true,
  'id_name' => 'quotes_toue0b3squotes_ida',
  'link' => 'quotes_tours',
  'table' => 'quotes',
  'module' => 'Quotes',
  'rname' => 'name',
);
$dictionary["Tour"]["fields"]["quotes_toue0b3squotes_ida"] = array (
  'name' => 'quotes_toue0b3squotes_ida',
  'type' => 'link',
  'relationship' => 'quotes_tours',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_QUOTES_TOURS_FROM_QUOTES_TITLE',
);
