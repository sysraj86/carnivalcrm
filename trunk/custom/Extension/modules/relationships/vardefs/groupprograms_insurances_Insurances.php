<?php
// created: 2011-08-23 11:28:48
$dictionary["Insurances"]["fields"]["groupprograms_insurances"] = array (
  'name' => 'groupprograms_insurances',
  'type' => 'link',
  'relationship' => 'groupprograms_insurances',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_INSURANCES_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["Insurances"]["fields"]["groupprogransurances_name"] = array (
  'name' => 'groupprogransurances_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_INSURANCES_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr3b48rograms_ida',
  'link' => 'groupprograms_insurances',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'rname' => 'name',
);
$dictionary["Insurances"]["fields"]["groupprogr3b48rograms_ida"] = array (
  'name' => 'groupprogr3b48rograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_insurances',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_GROUPPROGRAMS_INSURANCES_FROM_GROUPPROGRAMS_TITLE',
);
