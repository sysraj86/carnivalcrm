<?php
$module_name = 'Worksheets';
$listViewDefs [$module_name] = 
array (
  'WORKSHEET_CODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_WORKSHEET_CODE',
    'width' => '10%',
    'link' => true,
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '10%',
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
  'TOURCODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TOURCODE',
    'width' => '5%',
    'default' => true,
  ),
  'GROUPPROGRAORKSHEETS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'groupprograms_worksheets',
    'label' => 'LBL_GROUPPROGRAMS_WORKSHEETS_FROM_GROUPPROGRAMS_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'NGAYKHOIHANH' => 
  array (
    'type' => 'date',
    'label' => 'LBL_NGAYKHOIHANH',
    'width' => '10%',
    'default' => true,
  ),
  'NGAYKETTHUC' => 
  array (
    'type' => 'date',
    'label' => 'LBL_NGAYKETTHUC',
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
