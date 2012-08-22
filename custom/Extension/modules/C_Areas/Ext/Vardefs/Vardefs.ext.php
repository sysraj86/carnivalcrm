<?php
 // created: 2012-03-05 13:21:03
/* fix issue 1563
$dictionary['C_Areas']['indices'][] = array(
    'name' =>'idx_areas_name', 
    'type' =>'index', 
    'fields'=>array('name')
);
*/

$dictionary['C_Areas']['indices'][] = array(
    'name' =>'idx_areas_code', 
    'type' =>'index', 
    'fields'=>array('code')
);

$dictionary["C_Areas"]["fields"]["country"] = array (
    'name' => 'country',
    'type' => 'varchar',
    'vname' => 'LBL_COUNTRY',
);
?>