<?php
// created: 2011-09-06 11:46:30
$dictionary["Oder"]["fields"]["quotes_oders"] = array (
  'name' => 'quotes_oders',
  'type' => 'link',
  'relationship' => 'quotes_oders',
  'source' => 'non-db',
  'vname' => 'LBL_QUOTES_ODERS_FROM_QUOTES_TITLE',
);
$dictionary["Oder"]["fields"]["quotes_oders_name"] = array (
  'name' => 'quotes_oders_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_QUOTES_ODERS_FROM_QUOTES_TITLE',
  'save' => true,
  'id_name' => 'quotes_oded7c9squotes_ida',
  'link' => 'quotes_oders',
  'table' => 'quotes',
  'module' => 'Quotes',
  'rname' => 'name',
);
$dictionary["Oder"]["fields"]["quotes_oded7c9squotes_ida"] = array (
  'name' => 'quotes_oded7c9squotes_ida',
  'type' => 'link',
  'relationship' => 'quotes_oders',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_QUOTES_ODERS_FROM_QUOTES_TITLE',
);
