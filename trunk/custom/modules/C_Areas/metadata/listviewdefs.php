<?php
$module_name = 'C_Areas';
$listViewDefs [$module_name] = 
array (
  'CODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_AREAS_CODE',
    'width' => '10%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'C_AREAS_COUNTRIES_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'c_areas_countries',
    'label' => 'LBL_C_AREAS_COUNTRIES_FROM_COUNTRIES_TITLE',
    'width' => '10%',
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
