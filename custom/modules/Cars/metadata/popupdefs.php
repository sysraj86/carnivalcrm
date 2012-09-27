<?php
$popupMeta = array (
    'moduleMain' => 'Cars',
    'varName' => 'Car',
    'orderBy' => 'cars.name',
    'whereClauses' => array (
  'name' => 'cars.name',
  'numofseat' => 'cars.numofseat',
  'giathamkhao' => 'cars.giathamkhao',
  'ngaythamkhaogia' => 'cars.ngaythamkhaogia',
  'transports_cars_name' => 'cars.transports_cars_name',
  'assigned_user_id' => 'cars.assigned_user_id',
  'area' => 'cars.area',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'numofseat',
  5 => 'giathamkhao',
  6 => 'ngaythamkhaogia',
  7 => 'transports_cars_name',
  8 => 'assigned_user_id',
  9 => 'area',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'numofseat' => 
  array (
    'type' => 'int',
    'label' => 'LBL_NUMOFSEAT',
    'width' => '10%',
    'name' => 'numofseat',
  ),
  'giathamkhao' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_GIATHAMKHAO',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'giathamkhao',
  ),
  'ngaythamkhaogia' => 
  array (
    'type' => 'date',
    'label' => 'LBL_NGAYTHAMKHAOGIA',
    'width' => '10%',
    'name' => 'ngaythamkhaogia',
  ),
  'transports_cars_name' => 
  array (
    'type' => 'varchar',
    'link' => 'transports_cars',
    'label' => 'LBL_TRANSPORTS_CARS_FROM_TRANSPORTS_TITLE',
    'width' => '10%',
    'name' => 'transports_cars_name',
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
  'NUMBER_PLATES' => 
  array (
    'width' => '7%',
    'label' => 'LBL_NUMBER_PLATES',
    'default' => true,
    'name' => 'number_plates',
    'link' => 'true',
  ),
  'DRIVER_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NAME',
    'width' => '10%',
    'default' => true,
    'name' => 'driver_name',
  ),
  'PHONE' => 
  array (
    'width' => '7%',
    'label' => 'LBL_PHONE',
    'default' => true,
    'name' => 'phone',
  ),
  'NUMOFSEAT' => 
  array (
    'type' => 'int',
    'label' => 'LBL_NUMOFSEAT',
    'width' => '5%',
    'default' => true,
    'name' => 'numofseat',
  ),
  'TRANSPORT_NAME' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_TRANSPORT_NAME',
    'width' => '10%',
    'default' => true,
    'link' => true,
    'name' => 'transport_name',
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
    'name' => 'date_modified',
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
