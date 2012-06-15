<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2012-06-15 16:58:50
$dictionary["C_Areas"]["fields"]["c_areas_countries"] = array (
  'name' => 'c_areas_countries',
  'type' => 'link',
  'relationship' => 'c_areas_countries',
  'source' => 'non-db',
  'vname' => 'LBL_C_AREAS_COUNTRIES_FROM_COUNTRIES_TITLE',
);
$dictionary["C_Areas"]["fields"]["c_areas_countries_name"] = array (
  'name' => 'c_areas_countries_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_AREAS_COUNTRIES_FROM_COUNTRIES_TITLE',
  'save' => true,
  'id_name' => 'c_areas_cobbabuntries_ida',
  'link' => 'c_areas_countries',
  'table' => 'countries',
  'module' => 'Countries',
  'rname' => 'name',
);
$dictionary["C_Areas"]["fields"]["c_areas_cobbabuntries_ida"] = array (
  'name' => 'c_areas_cobbabuntries_ida',
  'type' => 'link',
  'relationship' => 'c_areas_countries',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_C_AREAS_COUNTRIES_FROM_C_AREAS_TITLE',
);

?>