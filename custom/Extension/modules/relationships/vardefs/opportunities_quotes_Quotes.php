<?php
// created: 2012-12-22 12:23:38
$dictionary["Quotes"]["fields"]["opportunities_quotes"] = array (
  'name' => 'opportunities_quotes',
  'type' => 'link',
  'relationship' => 'opportunities_quotes',
  'source' => 'non-db',
  'vname' => 'LBL_OPPORTUNITIES_QUOTES_FROM_OPPORTUNITIES_TITLE',
);
$dictionary["Quotes"]["fields"]["opportunities_quotes_name"] = array (
  'name' => 'opportunities_quotes_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_OPPORTUNITIES_QUOTES_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'opportunit9b76unities_ida',
  'link' => 'opportunities_quotes',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
$dictionary["Quotes"]["fields"]["opportunit9b76unities_ida"] = array (
  'name' => 'opportunit9b76unities_ida',
  'type' => 'link',
  'relationship' => 'opportunities_quotes',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_OPPORTUNITIES_QUOTES_FROM_QUOTES_TITLE',
);
