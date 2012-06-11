<?php
// created: 2011-09-05 08:49:54
$dictionary["GroupProgram"]["fields"]["groupprograesticketslists"] = array (
  'name' => 'groupprograesticketslists',
  'type' => 'link',
  'relationship' => 'groupprograms_airlinesticketslists',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_AIRLINESTICKETSLISTS_FROM_AIRLINESTICKETSLISTS_TITLE',
);
$dictionary["GroupProgram"]["fields"]["groupprograketslists_name"] = array (
  'name' => 'groupprograketslists_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_AIRLINESTICKETSLISTS_FROM_AIRLINESTICKETSLISTS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr60cctslists_idb',
  'link' => 'groupprograesticketslists',
  'table' => 'AirlinesTicketsLists',
  'module' => 'AirlinesTicketsLists',
  'rname' => 'name',
);
$dictionary["GroupProgram"]["fields"]["groupprogr60cctslists_idb"] = array (
  'name' => 'groupprogr60cctslists_idb',
  'type' => 'link',
  'relationship' => 'groupprograms_airlinesticketslists',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_GROUPPROGRAMS_AIRLINESTICKETSLISTS_FROM_AIRLINESTICKETSLISTS_TITLE',
);
