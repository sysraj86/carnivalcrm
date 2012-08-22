<?php
$module_name = 'Countries';
$listViewDefs [$module_name] = 
array (
  'CODE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_COUNTRY_CODE',
    'default' => true,
    'link' => true,
  ),
  'NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'CONTINENT' => 
  array (
    'width' => '10%',
    'label' => 'LBL_CONTINENT',
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
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);
?>
