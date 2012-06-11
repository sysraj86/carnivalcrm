<?php
// created: 2011-08-31 11:29:59
$dictionary["AirlinesTickets"]["fields"]["groupprograirlinestickets"] = array (
  'name' => 'groupprograirlinestickets',
  'type' => 'link',
  'relationship' => 'groupprograms_airlinestickets',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_AIRLINESTICKETS_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["AirlinesTickets"]["fields"]["groupprograestickets_name"] = array (
  'name' => 'groupprograestickets_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_AIRLINESTICKETS_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr0fd9rograms_ida',
  'link' => 'groupprograirlinestickets',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'rname' => 'name',
);
$dictionary["AirlinesTickets"]["fields"]["groupprogr0fd9rograms_ida"] = array (
  'name' => 'groupprogr0fd9rograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_airlinestickets',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_AIRLINESTICKETS_FROM_AIRLINESTICKETS_TITLE',
);
