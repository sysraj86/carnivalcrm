<?php
$popupMeta = array (
    'moduleMain' => 'Case',
    'varName' => 'CASE',
    'orderBy' => 'name',
    'whereClauses' => array (
  'name' => 'cases.name',
  'case_number' => 'cases.case_number',
  'account_name' => 'accounts.name',
),
    'searchdefs' => array (
  0 => 'case_number',
  1 => 'name',
  2 => 
  array (
    'name' => 'account_name',
    'displayParams' => 
    array (
      'hideButtons' => 'true',
      'size' => 30,
      'class' => 'sqsEnabled sqsNoAutofill',
    ),
  ),
  3 => 'priority',
  4 => 'status',
  5 => 
  array (
    'name' => 'assigned_user_id',
    'type' => 'enum',
    'label' => 'LBL_ASSIGNED_TO',
    'function' => 
    array (
      'name' => 'get_user_array',
      'params' => 
      array (
        0 => false,
      ),
    ),
  ),
),
    'listviewdefs' => array (
  'CASE_NUMBER' => 
  array (
    'width' => '5%',
    'label' => 'LBL_LIST_NUMBER',
    'default' => true,
    'name' => 'case_number',
  ),
  'NAME' => 
  array (
    'width' => '35%',
    'label' => 'LBL_LIST_SUBJECT',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'FITS_CASES_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'fits_cases',
    'label' => 'LBL_FITS_CASES_FROM_FITS_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'GROUPPROGRAMS_CASES_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'groupprograms_cases',
    'label' => 'LBL_GROUPPROGRAMS_CASES_FROM_GROUPPROGRAMS_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'PRIORITY' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_PRIORITY',
    'default' => true,
    'name' => 'priority',
  ),
  'STATUS' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_STATUS',
    'default' => true,
    'name' => 'status',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '2%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'default' => true,
    'name' => 'assigned_user_name',
  ),
),
);
