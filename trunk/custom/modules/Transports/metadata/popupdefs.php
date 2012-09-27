<?php
$popupMeta = array (
    'moduleMain' => 'Transports',
    'varName' => 'Transport',
    'orderBy' => 'transports.name',
    'whereClauses' => array (
  'name' => 'transports.name',
),
    'searchInputs' => array (
  0 => 'transports_number',
  1 => 'name',
  2 => 'priority',
  3 => 'status',
),
    'listviewdefs' => array (
  'CODE' => 
  array (
    'width' => '15%',
    'label' => 'LBL_TRANSPORT_CODE',
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
  'ADDRESS' => 
  array (
    'width' => '25%',
    'label' => 'LBL_ADDRESS',
    'default' => true,
    'name' => 'address',
  ),
  'EMAIL1' => 
  array (
    'width' => '20%',
    'label' => 'LBL_EMAIL',
    'link' => true,
    'customCode' => '{$EMAIL1_LINK}{$EMAIL1}</a>',
    'default' => true,
    'name' => 'email1',
  ),
  'PHONE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_PHONE',
    'default' => true,
    'name' => 'phone',
  ),
  'TYPE' => 
  array (
    'width' => '7%',
    'label' => 'LBL_TYPE',
    'default' => true,
    'name' => 'type',
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
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
    'name' => 'date_modified',
  ),
  'MODIFIED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'modified_user_link',
    'label' => 'LBL_MODIFIED_NAME',
    'width' => '10%',
    'default' => true,
    'name' => 'modified_by_name',
  ),
),
);
