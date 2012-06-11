<?php
// created: 2011-08-05 11:50:06
$dictionary["Contract"]["fields"]["tours_contracts"] = array (
  'name' => 'tours_contracts',
  'type' => 'link',
  'relationship' => 'tours_contracts',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_CONTRACTS_FROM_TOURS_TITLE',
);
$dictionary["Contract"]["fields"]["tours_contracts_name"] = array (
  'name' => 'tours_contracts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_CONTRACTS_FROM_TOURS_TITLE',
  'save' => true,
  'id_name' => 'tours_contec87tstours_ida',
  'link' => 'tours_contracts',
  'table' => 'tours',
  'module' => 'Tours',
  'rname' => 'name',
);
$dictionary["Contract"]["fields"]["tours_contec87tstours_ida"] = array (
  'name' => 'tours_contec87tstours_ida',
  'type' => 'link',
  'relationship' => 'tours_contracts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TOURS_CONTRACTS_FROM_CONTRACTS_TITLE',
);
