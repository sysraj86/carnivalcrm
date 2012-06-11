<?php
$module_name = 'Orders';
$listViewDefs [$module_name] = 
array (
  'CODE' => 
  array (
    'width' => '10%',
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
  'NGAYKHOIHANH' => 
  array (
    'type' => 'date',
    'label' => 'LBL_NGAYKHOIHANH',
    'width' => '10%',
    'default' => true,
  ),
  'SODIENTHOAI' => 
  array (
    'width' => '15%',
    'label' => 'LBL_SODIENTHOAI',
    'default' => true,
  ),
  'EMAIL' => 
  array (
    'width' => '15%',
    'label' => 'LBL_EMAIL',
    'default' => true,
    'link' => true,
  ),
  'DIACHI' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DIACHI',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'link' => 'assigned_user_link',
    'type' => 'relate',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'width' => '10%',
    'default' => true,
  ),
);
?>
