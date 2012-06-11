<?php
$popupMeta = array (
    'moduleMain' => 'GroupPrograms',
    'varName' => 'GroupProgram',
    'orderBy' => 'groupprograms.name',
    'whereClauses' => array (
  'name' => 'groupprograms.name',
  'groupprogram_code' => 'groupprograms.groupprogram_code',
  'start_date_group' => 'groupprograms.start_date_group',
  'end_date_group' => 'groupprograms.end_date_group',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'groupprogram_code',
  5 => 'start_date_group',
  6 => 'end_date_group',
),
    'searchdefs' => array (
  'groupprogram_code' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CODE',
    'width' => '10%',
    'name' => 'groupprogram_code',
  ),
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'start_date_group' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_START_DATE',
    'width' => '10%',
    'name' => 'start_date_group',
  ),
  'end_date_group' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_END_DATE',
    'width' => '10%',
    'name' => 'end_date_group',
  ),
),
    'listviewdefs' => array (
  'GROUPPROGRAM_CODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CODE',
    'width' => '10%',
    'default' => true,
    'link' => true,
    'name' => 'groupprogram_code',
  ),
  'NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'NUMOFDATE' => 
  array (
    'type' => 'int',
    'label' => 'LBL_NUM_OF_DATE',
    'width' => '2%%',
    'default' => true,
    'name' => 'numofdate',
  ),
  'NUMOFNIGHT' => 
  array (
    'type' => 'int',
    'label' => 'LBL_NUM_OF_NIGHT',
    'width' => '2%%',
    'default' => true,
    'name' => 'numofnight',
  ),
  'START_DATE_GROUP' => 
  array (
    'width' => '5%',
    'label' => 'LBL_START_DATE',
    'default' => true,
    'name' => 'start_date_group',
  ),
  'END_DATE_GROUP' => 
  array (
    'width' => '5%',
    'label' => 'LBL_END_DATE',
    'default' => true,
    'name' => 'end_date_group',
  ),
  'CHILD_2' => 
  array (
    'type' => 'int',
    'label' => 'LBL_CHILD_2',
    'width' => '5%',
    'default' => false,
    'name' => 'child_2',
  ),
  'ADULTS' => 
  array (
    'type' => 'int',
    'label' => 'adults',
    'width' => '5%',
    'default' => false,
    'name' => 'adults',
  ),
  'CHILDFROM2TO12' => 
  array (
    'type' => 'int',
    'label' => 'LBL_FROM2TO12',
    'width' => '5%',
    'default' => false,
    'name' => 'childfrom2to12',
  ),
  'COUNTOFCUS' => 
  array (
    'type' => 'int',
    'label' => 'LBL_COUNT_CUS',
    'width' => '2%',
    'default' => true,
    'name' => 'countofcus',
  ),
  'TOUR_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TOUR_NAME',
    'width' => '10%',
    'default' => false,
    'name' => 'tour_name',
  ),
  'TOUR_ID' => 
  array(
    'type' => 'varchar',
    'label' => 'LBL_TOUR_ID',
    'width' => '10%',
    'default' => false,
    'name' => 'tour_id',
  ),
'ASSIGNED_USER_NAME' => array(
        'width' => '9', 
        'label' => 'LBL_ASSIGNED_TO_NAME',
        'module' => 'Employees',
        'id' => 'ASSIGNED_USER_ID',
        'default' => true),
),
);
    
