<?php
$popupMeta = array (
    'moduleMain' => 'Countries',
    'varName' => 'Country',
    'orderBy' => 'countries.name',
    'whereClauses' => array (
  'name' => 'countries.name',
  'code' => 'countries.code',
  'areas_name' => 'countries.areas_name',
  'continent' => 'countries.continent',
  'assigned_user_name' => 'countries.assigned_user_name',
  'current_user_only' => 'countries.current_user_only',
  'date_entered' => 'countries.date_entered',
  'created_by' => 'countries.created_by',
  'date_modified' => 'countries.date_modified',
  'modified_user_id' => 'countries.modified_user_id',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'code',
  5 => 'areas_name',
  6 => 'continent',
  7 => 'assigned_user_name',
  8 => 'current_user_only',
  9 => 'date_entered',
  10 => 'created_by',
  11 => 'date_modified',
  12 => 'modified_user_id',
),
    'searchdefs' => array (
  'code' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_COUNTRY_CODE',
    'width' => '10%',
    'name' => 'code',
  ),
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'areas_name' => 
  array (
    'type' => 'relate',
    'link' => 'countries_c_areas',
    'label' => 'LBL_COUNTRIES_C_AREAS_FROM_C_AREAS_TITLE',
    'width' => '10%',
    'name' => 'areas_name',
  ),
  'continent' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_CONTINENT',
    'sortable' => false,
    'width' => '10%',
    'name' => 'continent',
  ),
  'assigned_user_name' => 
  array (
    'link' => 'assigned_user_link',
    'type' => 'relate',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'width' => '10%',
    'name' => 'assigned_user_name',
  ),
  'current_user_only' => 
  array (
    'name' => 'current_user_only',
    'label' => 'LBL_CURRENT_USER_FILTER',
    'type' => 'bool',
    'width' => '10%',
  ),
  'date_entered' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'name' => 'date_entered',
  ),
  'created_by' => 
  array (
    'type' => 'assigned_user_name',
    'label' => 'LBL_CREATED',
    'width' => '10%',
    'name' => 'created_by',
  ),
  'date_modified' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'name' => 'date_modified',
  ),
  'modified_user_id' => 
  array (
    'type' => 'assigned_user_name',
    'label' => 'LBL_MODIFIED',
    'width' => '10%',
    'name' => 'modified_user_id',
  ),
),
);
