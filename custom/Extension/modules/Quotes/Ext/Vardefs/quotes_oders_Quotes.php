<?php
// created: 2011-09-06 11:46:30
$dictionary["Quotes"]["fields"]["quotes_oders"] = array (
  'name' => 'quotes_oders',
  'type' => 'link',
  'relationship' => 'quotes_oders',
  'source' => 'non-db',
  'vname' => 'LBL_QUOTES_ODERS_FROM_ODERS_TITLE',
);
$dictionary["Quotes"]["fields"]["quotes_oders_name"] = array (
  'name' => 'quotes_oders_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_QUOTES_ODERS_FROM_ODERS_TITLE',
  'save' => true,
  'id_name' => 'quotes_odec393rsoders_idb',
  'link' => 'quotes_oders',
  'table' => 'oders',
  'module' => 'Oders',
  'rname' => 'name',
);
$dictionary["Quotes"]["fields"]["quotes_odec393rsoders_idb"] = array (
  'name' => 'quotes_odec393rsoders_idb',
  'type' => 'link',
  'relationship' => 'quotes_oders',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_QUOTES_ODERS_FROM_ODERS_TITLE',
);
