<?php
$module_name = 'Locations';
$listViewDefs [$module_name] = 
array (
  'CODE' => 
  array (
    'width' => '15%',
    'label' => 'LBL_CODE',
    'default' => true,
    'link' => true,
  ),
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'DEPARTMENT' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_DEPARTMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '20%',
    'default' => true,
  ),
  'DESTINATIONLOCATIONS_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_DESTINATION',
    'link' => true,
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);
?>
