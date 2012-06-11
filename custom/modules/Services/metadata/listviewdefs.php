<?php
$module_name = 'Services';
$listViewDefs [$module_name] = 
array (
  'CODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_RES_CODE',
    'width' => '10%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'SERVICE_TYPE' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_SERVICE_TYPE',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'TEL' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_RES_TEL',
    'width' => '10%',
    'default' => true,
  ),
  'EMAIL1' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EMAIL_ADDRESS',
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
