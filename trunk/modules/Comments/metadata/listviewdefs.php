<?php
$module_name = 'Comments';
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
    'width' => '10%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'FITS_COMMENTS_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_FITS',
    'default' => true,
    'link' => true,
  ),
  'GROUPPROGRA_COMMENTS_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_GROUPPROGRAMS_COMMENTS_FROM_GROUPPROGRAMS_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
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
