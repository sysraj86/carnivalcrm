<?php
$module_name = 'CommentAirlines';
$listViewDefs [$module_name] = 
array (
    'CODE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_CODE',
    'default' => true,
    'link' => true,
  ),
  'AIRLINES_COTAIRLINES_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_HANGHANGKHONG',
    'default' => true,
    'link' => true,
  ),
  'LICHTRINH' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LICHTRINH',
    'default' => true,
    'link' => false,
  ),
  'NGAYBATDAU' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NGAYBATDAU',
    'width' => '10%',
    'default' => true,
  ),
  'NGAYKETTHUC' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_NGAYKETTHUC',
    'width' => '10%',
    'default' => true,
  ),
  'TRUONGDOAN' =>
  array (
    'width' => '9%',
    'label' => 'LBL_TRUONGDOAN',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);
?>
