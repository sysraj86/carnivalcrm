<?php
$popupMeta = array (
    'moduleMain' => 'AirlinesTickets',
    'varName' => 'AirlinesTickets',
    'orderBy' => 'AirlinesTickets.name',
    'whereClauses' => array (
  'name' => 'AirlinesTickets.name',
  'fits_airlinestickets_name' => 'airlinestickets.fits_airlinestickets_name',
  'airlines_aiestickets_name' => 'airlinestickets.airlines_aiestickets_name',
  'status' => 'airlinestickets.status',
  'area' => 'airlinestickets.area',
  'groupprograestickets_name' => 'airlinestickets.groupprograestickets_name',
  'assigned_user_id' => 'airlinestickets.assigned_user_id',
),
    'searchInputs' => array (
  1 => 'name',
  3 => 'status',
  4 => 'fits_airlinestickets_name',
  5 => 'airlines_aiestickets_name',
  6 => 'area',
  7 => 'groupprograestickets_name',
  8 => 'assigned_user_id',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'fits_airlinestickets_name' => 
  array (
    'type' => 'relate',
    'link' => 'fits_airlinestickets',
    'label' => 'LBL_FITS_AIRLINESTICKETS_FROM_FITS_TITLE',
    'width' => '10%',
    'name' => 'fits_airlinestickets_name',
  ),
  'airlines_aiestickets_name' => 
  array (
    'type' => 'relate',
    'link' => 'airlines_airlinestickets',
    'label' => 'LBL_AIRLINES_AIRLINESTICKETS_FROM_AIRLINES_TITLE',
    'width' => '10%',
    'name' => 'airlines_aiestickets_name',
  ),
  'groupprograestickets_name' => 
  array (
    'type' => 'relate',
    'link' => 'groupprograirlinestickets',
    'label' => 'LBL_GROUPPROGRAMS_AIRLINESTICKETS_FROM_GROUPPROGRAMS_TITLE',
    'width' => '10%',
    'name' => 'groupprograestickets_name',
  ),
  'airline_status' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'sortable' => false,
    'width' => '10%',
    'name' => 'airline_status',
  ),
  'area' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_AREA',
    'sortable' => false,
    'width' => '10%',
    'name' => 'area',
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
    'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'FITS_AIRLINESTICKETS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'fits_airlinestickets',
    'label' => 'LBL_FITS_AIRLINESTICKETS_FROM_FITS_TITLE',
    'width' => '10%',
    'default' => true,
    'name' => 'fits_airlinestickets_name',
  ),
  'AIRLINES_AIESTICKETS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'airlines_airlinestickets',
    'label' => 'LBL_AIRLINES_AIRLINESTICKETS_FROM_AIRLINES_TITLE',
    'width' => '10%',
    'default' => true,
    'name' => 'airlines_aiestickets_name',
  ),
  'AREA' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_AREA',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'GROUPPROGRAESTICKETS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'groupprograirlinestickets',
    'label' => 'LBL_GROUPPROGRAMS_AIRLINESTICKETS_FROM_GROUPPROGRAMS_TITLE',
    'width' => '10%',
    'default' => true,
    'name' => 'groupprograestickets_name',
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
),
);
