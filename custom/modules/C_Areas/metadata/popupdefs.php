<?php
$popupMeta = array (
    'moduleMain' => 'C_Areas',
    'varName' => 'C_Areas',
    'orderBy' => 'c_areas.name',
    'whereClauses' => array (
  'name' => 'c_areas.name',
  'c_areas_countries_name' => 'c_areas.c_areas_countries_name',
  'assigned_user_id' => 'c_areas.assigned_user_id',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'c_areas_countries_name',
  5 => 'assigned_user_id',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'c_areas_countries_name' => 
  array (
    'type' => 'relate',
    'link' => 'c_areas_countries',
    'label' => 'LBL_C_AREAS_COUNTRIES_FROM_COUNTRIES_TITLE',
    'width' => '10%',
    'name' => 'c_areas_countries_name',
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
);
