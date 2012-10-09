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
  'ATTN_FROM_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'width' => '10%',
    'default' => true,
  ),
);
?>
