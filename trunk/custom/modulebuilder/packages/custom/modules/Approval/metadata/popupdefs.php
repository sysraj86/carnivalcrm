<?php
$popupMeta = array (
    'moduleMain' => 'C_Approval',
    'varName' => 'C_Approval',
    'orderBy' => 'c_approval.name',
    'whereClauses' => array (
  'name' => 'c_approval.name',
  'status' => 'c_approval.status',
  'parent_name' => 'c_approval.parent_name',
  'date_entered' => 'c_approval.date_entered',
  'created_by' => 'c_approval.created_by',
  'description' => 'c_approval.description',
),
    'searchInputs' => array (
  1 => 'name',
  3 => 'status',
  4 => 'parent_name',
  5 => 'date_entered',
  6 => 'created_by',
  7 => 'description',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'status' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'sortable' => false,
    'width' => '10%',
    'name' => 'status',
  ),
  'parent_name' => 
  array (
    'type' => 'parent',
    'studio' => 'visible',
    'label' => 'LBL_FLEX_RELATE',
    'width' => '10%',
    'name' => 'parent_name',
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
  'description' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'name' => 'description',
  ),
),
);
