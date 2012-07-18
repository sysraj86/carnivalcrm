<?php
$module_name = 'AirlinesTickets';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'code' => 
      array (
        'name' => 'code',
        'default' => true,
        'width' => '10%',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'airline_status' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_STATUS',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'airline_status',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'code' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'width' => '10%',
        'label' => 'LBL_CODE',
        'name' => 'code',
      ),
      'fits_airlinestickets_name' => 
      array (
        'type' => 'relate',
        'link' => 'fits_airlinestickets',
        'label' => 'LBL_FITS_AIRLINESTICKETS_FROM_FITS_TITLE',
        'width' => '10%',
        'default' => true,
        'name' => 'fits_airlinestickets_name',
      ),
      'airlines_aiestickets_name' => 
      array (
        'type' => 'relate',
        'link' => 'airlines_airlinestickets',
        'label' => 'LBL_AIRLINES_AIRLINESTICKETS_FROM_AIRLINES_TITLE',
        'width' => '10%',
        'default' => true,
        'name' => 'airlines_aiestickets_name',
      ),
      'status' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STATUS',
        'sortable' => false,
        'width' => '10%',
        'name' => 'status',
      ),
      'groupprograestickets_name' => 
      array (
        'type' => 'relate',
        'link' => 'groupprograirlinestickets',
        'label' => 'LBL_GROUPPROGRAMS_AIRLINESTICKETS_FROM_GROUPPROGRAMS_TITLE',
        'width' => '10%',
        'default' => true,
        'name' => 'groupprograestickets_name',
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
        'default' => true,
        'width' => '10%',
      ),
      'current_user_only' => 
      array (
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
        'name' => 'current_user_only',
      ),
      'date_modified' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_MODIFIED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_modified',
      ),
      'created_by' => 
      array (
        'type' => 'assigned_user_name',
        'label' => 'LBL_CREATED',
        'width' => '10%',
        'default' => true,
        'name' => 'created_by',
      ),
      'modified_user_id' => 
      array (
        'type' => 'assigned_user_name',
        'label' => 'LBL_MODIFIED',
        'width' => '10%',
        'default' => true,
        'name' => 'modified_user_id',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
