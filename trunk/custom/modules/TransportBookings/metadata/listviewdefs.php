<?php
$module_name = 'TransportBookings';
$listViewDefs [$module_name] = 
array (
  'CODE' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CODE',
    'width' => '8%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'type' => 'relate',
    'link' => 'name',
    'label' => 'LBL_NAME',
    'width' => '20%',
    'default' => true,
  ),
  'DEADLINE' => 
  array (
    'type' => 'date',
    'default' => true,
    'label' => 'LBL_DEADLINE',
    'width' => '8%',
  ),
  'CONFIRM' => 
  array (
    'type' => 'radioenum',
    'default' => true,
    'label' => 'LBL_CONFIRM',
    'width' => '8%',
  ),
  'OPERATOR' => 
  array (
    'width' => '9%',
    'label' => 'LBL_OPERATOR',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ATTN',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);
?>
