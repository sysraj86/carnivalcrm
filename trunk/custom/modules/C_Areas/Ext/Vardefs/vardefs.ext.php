<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2012-08-22 10:31:18
$dictionary["C_Areas"]["fields"]["countries_c_areas"] = array (
  'name' => 'countries_c_areas',
  'type' => 'link',
  'relationship' => 'countries_c_areas',
  'source' => 'non-db',
  'vname' => 'LBL_COUNTRIES_C_AREAS_FROM_COUNTRIES_TITLE',
);

// created: 2012-03-02 11:57:23
$dictionary["C_Areas"]["fields"]["c_areas_destinations"] = array (
  'name' => 'c_areas_destinations',
  'type' => 'link',
  'relationship' => 'c_areas_destinations',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_C_AREAS_DESTINATIONS_FROM_DESTINATIONS_TITLE',
);


 // created: 2012-03-05 13:21:03

 

 // created: 2012-03-05 13:21:03
$dictionary['C_Areas']['indices'][] = array(
    'name' =>'idx_areas_name', 
    'type' =>'index', 
    'fields'=>array('name')
);

$dictionary['C_Areas']['indices'][] = array(
    'name' =>'idx_areas_code', 
    'type' =>'index', 
    'fields'=>array('code')
);

?>