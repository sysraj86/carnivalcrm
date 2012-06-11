<?php
 if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
$popupMeta = array (
    'moduleMain' => 'FoodMenu',
    'varName' => 'FoodMenu',
    'orderBy' => 'foodmenu.name',
    'whereClauses' => array (
      'name' => 'foodmenu.name',
      'restaurants_foodmenu_name' => 'foodmenu.restaurants_foodmenu_name',
      'assigned_user_id' => 'foodmenu.assigned_user_id',
),
'searchInputs' => array (
  1 => 'name',
  4 => 'restaurants_foodmenu_name',
  5 => 'assigned_user_id',
),
'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'restaurants_foodmenu_name' => 
  array (
    'type' => 'relate',
    'link' => 'restaurants_foodmenu',
    'label' => 'LBL_RESTAURANTS_FOODMENU_FROM_RESTAURANTS_TITLE',
    'width' => '10%',
    'name' => 'restaurants_foodmenu_name',
  ),
  'assigned_user_id' => 
  array (
    'name' => 'assigned_user_id',
    'label' => 'LBL_ASSIGNED_TO',
    'type' => 'enum',
    'function' => 
    array (
      'name' => 'get_user_array',
      'params' => 
      array (
        0 => false,
      ),
    ),
    'width' => '10%',
  ),
),
'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
    'name' => 'description',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
    'name' => 'assigned_user_name',
  ),
),
);
