<?php
$popupMeta = array (
    'moduleMain' => 'Services',
    'varName' => 'Services',
    'orderBy' => 'services.name',
    'whereClauses' => array (
  'name' => 'services.name',
  'service_type' => 'services.service_type',
  'address' => 'services.address',
  'assigned_user_id' => 'services.assigned_user_id',
  'code' => 'services.code',
  'area' => 'services.area',
  'countries_services_name' => 'services.countries_services_name',
  'destination_services_name' => 'services.destination_services_name',
  'tel' => 'services.tel',
  'fax' => 'services.fax',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'service_type',
  5 => 'address',
  6 => 'assigned_user_id',
  7 => 'code',
  8 => 'area',
  9 => 'countries_services_name',
  10 => 'destination_services_name',
  11 => 'tel',
  12 => 'fax',
),
    'searchdefs' => array (
  'code' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_RES_CODE',
    'width' => '10%',
    'name' => 'code',
  ),
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'service_type' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_SERVICE_TYPE',
    'sortable' => false,
    'width' => '10%',
    'name' => 'service_type',
  ),
  'area' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_AREA',
    'sortable' => false,
    'width' => '10%',
    'name' => 'area',
  ),
  'countries_services_name' => 
  array (
    'type' => 'relate',
    'link' => 'countries_services',
    'label' => 'LBL_COUNTRIES_SERVICES_FROM_COUNTRIES_TITLE',
    'width' => '10%',
    'name' => 'countries_services_name',
  ),
  'destination_services_name' => 
  array (
    'type' => 'relate',
    'link' => 'destinations_services',
    'label' => 'LBL_DESTINATIONS_SERVICES_FROM_DESTINATIONS_TITLE',
    'width' => '10%',
    'name' => 'destination_services_name',
  ),
  'tel' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_RES_TEL',
    'width' => '10%',
    'name' => 'tel',
  ),
  'fax' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_FAX',
    'width' => '10%',
    'name' => 'fax',
  ),
  'address' => 
  array (
    'type' => 'text',
    'label' => 'LBL_RES_ADDRESS',
    'sortable' => false,
    'width' => '10%',
    'name' => 'address',
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
    'type' => 'varchar',
    'label' => 'LBL_RES_CODE',
    'width' => '10%',
    'default' => true,
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
  'SERVICE_TYPE' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_SERVICE_TYPE',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
    'name' => 'service_type',
  ),
  'TEL' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_RES_TEL',
    'width' => '10%',
    'default' => true,
    'name' => 'tel',
  ),
  'FAX' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_FAX',
    'width' => '10%',
    'default' => true,
    'name' => 'fax',
  ),
  'EMAIL1' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EMAIL_ADDRESS',
    'width' => '10%',
    'default' => true,
    'name' => 'email1',
  ),
  'ADDRESS' => 
  array (
    'type' => 'text',
    'label' => 'LBL_RES_ADDRESS',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'DESTINATION_SERVICES_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'destinations_services',
    'label' => 'LBL_DESTINATIONS_SERVICES_FROM_DESTINATIONS_TITLE',
    'width' => '10%',
    'default' => true,
    'name' => 'destination_services_name',
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
