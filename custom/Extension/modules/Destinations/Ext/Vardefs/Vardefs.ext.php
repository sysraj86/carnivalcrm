<?php
// created: 2011-10-26 10:56:10
$dictionary['Destination']['indices'][] = array(
    'name' =>'idx_destination_name', 
    'type' =>'index', 
    'fields'=>array('name')
);

$dictionary["Destination"]["fields"]["department"] = array (
  'name' => 'department',
  'type' => 'enum',
  'options' => 'deparment_dom',
  'vname' => 'LBL_DEPARTMENT',
);