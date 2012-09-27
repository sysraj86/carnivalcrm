<?php
$module_name = 'Transports';
$listViewDefs [$module_name] = 
array (
  'CODE' => 
  array (
    'width' => '15%',
    'label' => 'LBL_TRANSPORT_CODE',
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
  'ADDRESS' => 
  array (
    'width' => '25%',
    'label' => 'LBL_ADDRESS',
    'default' => true,
  ),
  'EMAIL1' => 
  array (
    'width' => '20%',
    'label' => 'LBL_EMAIL',
    'link' => true,
    'customCode' => '{$EMAIL1_LINK}{$EMAIL1}</a>',
    'default' => true,
  ),
  'PHONE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_PHONE',
    'default' => true,
  ),
  'TYPE' => 
  array (
    'width' => '7%',
    'label' => 'LBL_TYPE',
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
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
  'MODIFIED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'modified_user_link',
    'label' => 'LBL_MODIFIED_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'DESTINATIONRANSPORTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'destinations_transports',
    'label' => 'LBL_DESTINATIONS_TRANSPORTS_FROM_DESTINATIONS_TITLE',
    'width' => '10%',
    'default' => false,
  ),
  'COUNTRIES_TRANSPORTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'countries_transports',
    'label' => 'LBL_COUNTRIES_TRANSPORTS_FROM_COUNTRIES_TITLE',
    'width' => '10%',
    'default' => false,
  ),
  'BILLING_TRANSPORTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'billing_transports',
    'label' => 'LBL_BILLING_TRANSPORTS_FROM_BILLING_TITLE',
    'width' => '10%',
    'default' => false,
  ),
  'AREA' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_AREA',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'CREATED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'created_by_link',
    'label' => 'LBL_CREATED',
    'width' => '10%',
    'default' => false,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => false,
  ),
);
?>
