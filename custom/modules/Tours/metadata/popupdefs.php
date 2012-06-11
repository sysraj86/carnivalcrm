<?php
$popupMeta = array (
    'moduleMain' => 'Tours',
    'varName' => 'Tour',
    'orderBy' => 'tours.name',
    'whereClauses' => array (
  'name' => 'tours.name',
  'deparment' => 'tours.deparment',
  'start_date' => 'tours.start_date',
  'end_date' => 'tours.end_date',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'deparment',
  5 => 'start_date',
  6 => 'end_date',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  array(
    'name' =>'tour_code',
    'width' =>'10%',
  ),
  'start_date' => 
  array (
    'name' => 'start_date',
    'width' => '10%',
  ),
  'end_date' => 
  array (
    'name' => 'end_date',
    'width' => '10%',
  ),
    'deparment' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_DEPARMENT',
    'sortable' => false,
    'width' => '10%',
    'name' => 'deparment',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'TOUR_CODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TOUR_CODE',
    'width' => '10%',
    'default' => true,
    'name' => 'tour_code',
  ),
  'TRANSPORT2' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TRANSPORT_2',
    'width' => '15%',
    'default' => true,
    'name' => 'transport2',
  ),
  'TOUR_DESTINATION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESTINATION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'DURATION' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_DURATION',
    'width' => '10%',
    'default' => true,
    'name' => 'duration',
  ),
  'START_DATE' => 
  array (
    'width' => '5%',
    'label' => 'LBL_START_DATE',
    'default' => true,
    'name' => 'start_date',
  ),
  'END_DATE' => 
  array (
    'width' => '5%',
    'label' => 'LBL_END_DATE',
    'default' => true,
    'name' => 'end_date',
  ),
),
);
