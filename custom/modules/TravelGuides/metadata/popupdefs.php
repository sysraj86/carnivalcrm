<?php
$popupMeta = array (
    'moduleMain' => 'TravelGuides',
    'varName' => 'TravelGuide',
    'orderBy' => 'travelguides.name',
    'whereClauses' => array (
  'name' => 'travelguides.name',
),
    'searchInputs' => array (
  0 => 'travelguides_number',
  1 => 'name',
  2 => 'priority',
  3 => 'status',
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
  'BIRTHDAY' => 
  array (
    'type' => 'date',
    'label' => 'LBL_BIRTHDAY',
    'width' => '10%',
    'default' => true,
  ),
  'PASSPORT_NO' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PASSPORT_NO',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_ISSUED' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DATE_ISSUED',
    'width' => '10%',
    'default' => true,
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
