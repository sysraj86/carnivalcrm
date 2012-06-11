<?php
$popupMeta = array (
    'moduleMain' => 'Destinations',
    'varName' => 'Destination',
    'orderBy' => 'destinations.name',
    'whereClauses' => array (
  'name' => 'destinations.name',
),
    'searchInputs' => array (
  0 => 'destinations_number',
  1 => 'name',
  2 => 'priority',
  3 => 'status',
),
    'listviewdefs' => array (
  'CODE' => 
  array (
    'width' => '7%',
    'label' => 'LBL_CODE',
    'default' => true,
    'link' => true,
    'name' => 'code',
  ),
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'AREA' => 
  array (
    'width' => '10%',
    'label' => 'LBL_AREA',
    'default' => true,
    'name' => 'area',
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '50%',
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
