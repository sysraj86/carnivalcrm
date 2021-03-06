<?php
$module_name = 'Quotes';
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
  'QUOTES_TOURS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'quotes_tours',
    'label' => 'LBL_QUOTES_TOURS_FROM_TOURS_TITLE',
    'width' => '13%',
    'default' => true,
  ),
  'ACCOUNTS_QUOTES_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'accounts_quotes',
    'label' => 'LBL_ACCOUNTS_QUOTES_FROM_ACCOUNTS_TITLE',
    'width' => '13%',
    'default' => true,
  ),
  'FITS_QUOTES_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'fits_quotes',
    'label' => 'LBL_FITS_QUOTES_FROM_FITS_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'QUOTES_STATUS' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_QUOTES_STATUS',
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
