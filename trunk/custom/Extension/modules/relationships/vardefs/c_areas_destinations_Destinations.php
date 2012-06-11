<?php
// created: 2012-03-02 11:57:23
$dictionary["Destination"]["fields"]["c_areas_destinations"] = array (
  'name' => 'c_areas_destinations',
  'type' => 'link',
  'relationship' => 'c_areas_destinations',
  'source' => 'non-db',
  'vname' => 'LBL_C_AREAS_DESTINATIONS_FROM_C_AREAS_TITLE',
);
$dictionary["Destination"]["fields"]["c_areas_destinations_name"] = array (
  'name' => 'c_areas_destinations_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_AREAS_DESTINATIONS_FROM_C_AREAS_TITLE',
  'save' => true,
  'id_name' => 'c_areas_de9d4fc_areas_ida',
  'link' => 'c_areas_destinations',
  'table' => 'c_areas',
  'module' => 'C_Areas',
  'rname' => 'name',
);
$dictionary["Destination"]["fields"]["c_areas_de9d4fc_areas_ida"] = array (
  'name' => 'c_areas_de9d4fc_areas_ida',
  'type' => 'link',
  'relationship' => 'c_areas_destinations',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_C_AREAS_DESTINATIONS_FROM_DESTINATIONS_TITLE',
);
