<?php
$module_name = 'Worksheets';
$listViewDefs [$module_name] = 
array (
  'WORKSHEET_CODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_WORKSHEET_CODE',
    'width' => '10%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'TYPE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_WORKSHEET_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'VERSION' => 
  array (
    'type' => 'int',
    'label' => 'LBL_VERSION',
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
