<?php
// created: 2011-08-23 11:28:48
$dictionary["GroupProgram"]["fields"]["groupprograms_insurances"] = array (
  'name' => 'groupprograms_insurances',
  'type' => 'link',
  'relationship' => 'groupprograms_insurances',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_INSURANCES_FROM_INSURANCES_TITLE',
);
$dictionary["GroupProgram"]["fields"]["groupprogransurances_name"] = array (
  'name' => 'groupprogransurances_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_INSURANCES_FROM_INSURANCES_TITLE',
  'save' => true,
  'id_name' => 'groupprogr5003urances_idb',
  'link' => 'groupprograms_insurances',
  'table' => 'insurances',
  'module' => 'Insurances',
  'rname' => 'name',
);
$dictionary["GroupProgram"]["fields"]["groupprogr5003urances_idb"] = array (
  'name' => 'groupprogr5003urances_idb',
  'type' => 'link',
  'relationship' => 'groupprograms_insurances',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_GROUPPROGRAMS_INSURANCES_FROM_INSURANCES_TITLE',
);
