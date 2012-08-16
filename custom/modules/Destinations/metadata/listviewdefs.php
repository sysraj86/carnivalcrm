<?php
$module_name = 'Destinations';
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
  'COUNTRIES_DTINATIONS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'countries_destinations',
    'label' => 'LBL_COUNTRIES_DESTINATIONS_FROM_COUNTRIES_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'DESTINATION_REGION' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_DESTINATION_REGION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'AREA' => 
  array (
    'width' => '10%',
    'label' => 'LBL_AREA',
    'default' => true,
  ),
  'DEPARTMENT' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_DEPARTMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'link' => true,
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);
?>
