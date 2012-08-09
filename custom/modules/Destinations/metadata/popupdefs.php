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
    'width' => '15%',
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
  'C_AREAS_DESTINATIONS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'c_areas_destinations',
    'width' => '10%',
    'label' => 'LBL_AREA',
    'default' => true,
    'name' => 'c_areas_destinations_name',
  ),
  'DEPARTMENT' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_DEPARTMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
    'name' => 'department',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'link' => true,
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
    'name' => 'assigned_user_name',
  ),
),
);
