<?php
// created: 2011-10-26 10:56:10
$dictionary['Country']['indices'][] = array(
    'name' =>'idx_countries_name', 
    'type' =>'index', 
    'fields'=>array('name')
);

$dictionary["Country"]["fields"]["department"] = array (
    'name' => 'department',
    'type' => 'enum',
    'options' => 'deparment_dom',
    'vname' => 'LBL_DEPARTMENT',
);
