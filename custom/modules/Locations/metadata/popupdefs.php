<?php
$popupMeta = array (
    'moduleMain' => 'Locations',
    'varName' => 'Location',
    'orderBy' => 'locations.name',
    'whereClauses' => array (
  'name' => 'locations.name',
  'code' => 'locations.code',
  'destinationlocations_name' => 'locations.destinationlocations_name',
  'area' => 'locations.area',
  'assigned_user_id' => 'locations.assigned_user_id',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'code',
  5 => 'destinationlocations_name',
  6 => 'area',
  7 => 'assigned_user_id',
),
    'searchdefs' => array (
  'code' => 
  array (
    'name' => 'code',
    'width' => '10%',
  ),
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'destinationlocations_name' => 
  array (
    'type' => 'relate',
    'link' => 'destinations_locations',
    'label' => 'LBL_DESTINATIONS_LOCATIONS_FROM_DESTINATIONS_TITLE',
    'width' => '10%',
    'name' => 'destinationlocations_name',
  ),
  'area' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_AREA',
    'sortable' => false,
    'width' => '10%',
    'name' => 'area',
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
    'type' => 'phone',
    'label' => 'LBL_PHONE',
    'width' => '10%',
    'default' => true,
    'name' => 'phone',
  ),
  'ADDRESS' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ADDRESS',
    'width' => '10%',
    'default' => true,
    'name' => 'address',
  ),
  'DESTINATIONLOCATIONS_NAME' => 
  array (
    'width' => '7%',
    'label' => 'LBL_DESTINATION',
    'link' => true,
    'default' => true,
    'name' => 'destinationlocations_name',
  ),
  'COUNTRY_NAME' => 
  array (
    'width' => '7%',
    'label' => 'LBL_COUNTRY_NAME',
    'link' => true,
    'default' => true,
    'name' => 'country_name',
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '40%',
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
