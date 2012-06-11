<?php
$module_name = 'FoodMenu';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'RESTAURANTS_FOODMENU_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'restaurants_foodmenu',
    'label' => 'LBL_RESTAURANTS_FOODMENU_FROM_RESTAURANTS_TITLE',
    'width' => '15%',
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
