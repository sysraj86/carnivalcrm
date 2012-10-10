<?php
$module_name = 'ServiceBookings';
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
  'DEADLINE' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DEADLINE',
    'default' => true,
  ),
  'CONFIRM' => 
  array (
    'width' => '15%',
    'label' => 'LBL_CONFIRM',
    'default' => true,
  ),
  'DEPARMENT' => 
  array (
    'width' => '9%',
    'label' => 'LBL_DEPARMENT',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ATTN_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);
?>
