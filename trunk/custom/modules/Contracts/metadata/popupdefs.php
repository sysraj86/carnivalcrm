<?php
$popupMeta = array (
    'moduleMain' => 'Contracts',
    'varName' => 'Contract',
    'orderBy' => 'contracts.name',
    'whereClauses' => array (
  'name' => 'contracts.name',
),
    'searchInputs' => array (
  0 => 'contracts_number',
  1 => 'name',
  2 => 'priority',
  3 => 'status',
),
    'listviewdefs' => array (
  'NUMBER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NUMBER',
    'width' => '10%',
    'default' => true,
    'link' => true,
    'name' => 'number',
  ),
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'PARENT_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_BEN_B',
    'width' => '10%',
    'default' => true,
    'name' => 'parent_name',
  ),
  'DAIDIENBENB_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_BEN_B_NAME',
    'width' => '10%',
    'default' => true,
    'name' => 'daidienbenb_name',
  ),
  'DATE_OF_CONTRACTS' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DATE_OF_CONTRACTS',
    'width' => '10%',
    'default' => true,
  ),
  'GROUPPROGRACONTRACTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'groupprograms_contracts',
    'label' => 'LBL_GROUPPROGRAMS_CONTRACTS_FROM_GROUPPROGRAMS_TITLE',
    'width' => '10%',
    'default' => true,
    'name' => 'groupprogracontracts_name',
  ),
  'TYPE' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_WORKSHEET_TYPE',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
    'name' => 'type',
  ),
  'TONGTIEN' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_TONGTIEN',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'tongtien',
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
