<?php
// created: 2011-09-29 13:50:17
$dictionary["Contract"]["fields"]["groupprograms_contracts"] = array (
  'name' => 'groupprograms_contracts',
  'type' => 'link',
  'relationship' => 'groupprograms_contracts',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_CONTRACTS_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["Contract"]["fields"]["groupprogracontracts_name"] = array (
  'name' => 'groupprogracontracts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_CONTRACTS_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr4251rograms_ida',
  'link' => 'groupprograms_contracts',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  //'required'=> true,
  'rname' => 'name',
);
$dictionary["Contract"]["fields"]["groupprogr4251rograms_ida"] = array (
  'name' => 'groupprogr4251rograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_contracts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_CONTRACTS_FROM_CONTRACTS_TITLE',
);
