<?php
$popupMeta = array (
    'moduleMain' => 'Airlines',
    'varName' => 'Airline',
    'orderBy' => 'airlines.name',
    'whereClauses' => array (
  'name' => 'airlines.name',
),
    'searchInputs' => array (
  0 => 'airlines_number',
  1 => 'name',
  2 => 'priority',
  3 => 'status',
),
    'listviewdefs' => array (
  'CODE' => 
  array (
    'width' => '10%',
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
    'type' => 'enum',
    'label' => 'LBL_AREA',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
    'name' => 'area',
  ),
  'PHONE' => 
  array (
    'width' => '20%',
    'label' => 'LBL_PHONE',
    'default' => true,
    'name' => 'phone',
  ),
  'EMAIL1' => 
  array (
    'width' => '15%',
    'label' => 'LBL_EMAIL',
    'sortable' => false,
    'link' => true,
    'customCode' => '{$EMAIL1_LINK}{$EMAIL1}</a>',
    'default' => true,
    'name' => 'email1',
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
