<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2012-02-20 17:18:12
$dictionary["AirlinesTicketsLists"]["fields"]["airlinesticirlinestickets"] = array (
  'name' => 'airlinesticirlinestickets',
  'type' => 'link',
  'relationship' => 'airlinesticketslists_airlinestickets',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_AIRLINESTICKETSLISTS_AIRLINESTICKETS_FROM_AIRLINESTICKETS_TITLE',
);


// created: 2011-09-05 08:49:54
$dictionary["AirlinesTicketsLists"]["fields"]["groupprograesticketslists"] = array (
  'name' => 'groupprograesticketslists',
  'type' => 'link',
  'relationship' => 'groupprograms_airlinesticketslists',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_AIRLINESTICKETSLISTS_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["AirlinesTicketsLists"]["fields"]["groupprograketslists_name"] = array (
  'name' => 'groupprograketslists_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_AIRLINESTICKETSLISTS_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogredb7rograms_ida',
  'link' => 'groupprograesticketslists',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'rname' => 'name',
);
$dictionary["AirlinesTicketsLists"]["fields"]["groupprogredb7rograms_ida"] = array (
  'name' => 'groupprogredb7rograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_airlinesticketslists',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_GROUPPROGRAMS_AIRLINESTICKETSLISTS_FROM_GROUPPROGRAMS_TITLE',
);

?>