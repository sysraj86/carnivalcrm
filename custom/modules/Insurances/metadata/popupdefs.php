<?php
$popupMeta = array (
    'moduleMain' => 'Insurances',
    'varName' => 'Insurances',
    'orderBy' => 'insurances.name',
    'whereClauses' => array (
  'name' => 'insurances.name',
  'code' => 'insurances.code',
  'groupprogransurances_name' => 'insurances.groupprogransurances_name',
  'current_user_only' => 'insurances.current_user_only',
  'assigned_user_id' => 'insurances.assigned_user_id',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'code',
  5 => 'groupprogransurances_name',
  6 => 'current_user_only',
  7 => 'assigned_user_id',
),
    'searchdefs' => array (
  'code' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CODE',
    'width' => '10%',
    'name' => 'code',
  ),
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'groupprogransurances_name' => 
  array (
    'type' => 'relate',
    'link' => 'groupprograms_insurances',
    'label' => 'LBL_GROUPPROGRAMS_INSURANCES_FROM_GROUPPROGRAMS_TITLE',
    'width' => '10%',
    'name' => 'groupprogransurances_name',
  ),
  'current_user_only' => 
  array (
    'label' => 'LBL_CURRENT_USER_FILTER',
    'type' => 'bool',
    'width' => '10%',
    'name' => 'current_user_only',
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
