<?php
$module_name = 'TransportBookings';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'code' => 
      array (
        'name' => 'code',
        'label' => 'LBL_CODE',
        'default' => true,
        'width' => '10%',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'confirm' => 
      array (
        'type' => 'enum',
        'default' => true,
        'label' => 'LBL_CONFIRM',
        'width' => '10%',
        'name' => 'confirm',
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
      'code' => 
      array (
        'name' => 'code',
        'label' => 'LBL_CODE',
        'default' => true,
        'width' => '10%',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'transports_tbookings_name' => 
      array (
        'type' => 'relate',
        'link' => 'transports_nsportbookings',
        'label' => 'LBL_TRANSPORTS_TRANSPORTBOOKINGS_FROM_TRANSPORTS_TITLE',
        'width' => '10%',
        'default' => true,
        'name' => 'transports_tbookings_name',
      ),
      'deadline' => 
      array (
        'type' => 'date',
        'label' => 'LBL_DEADLINE',
        'width' => '10%',
        'default' => true,
        'name' => 'deadline',
      ),
      'date_modified' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_MODIFIED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_modified',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
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
      'confirm' => 
      array (
        'type' => 'enum',
        'default' => true,
        'label' => 'LBL_CONFIRM',
        'width' => '10%',
        'name' => 'confirm',
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
