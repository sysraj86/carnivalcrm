<?php
$module_name = 'Tours';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'tour_code' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_TOUR_CODE',
        'width' => '10%',
        'default' => true,
        'name' => 'tour_code',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'from_place' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_FROM_PLACE',
        'width' => '10%',
        'default' => true,
        'name' => 'from_place',
      ),
      'to_place' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_TO_PLACE',
        'width' => '10%',
        'default' => true,
        'name' => 'to_place',
      ),
      'start_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_START_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'start_date',
      ),
      'end_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_END_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'end_date',
      ),
      'contract_value' => 
      array (
        'type' => 'currency',
        'label' => 'LBL_CONTRACT_VALUE',
        'currency_format' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'contract_value',
      ),
      'deparment' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_DEPARMENT',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'deparment',
      ),
      'status' => 
      array (
        'name' => 'status',
        'default' => true,
        'width' => '10%',
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
      'tour_code' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_TOUR_CODE',
        'width' => '10%',
        'default' => true,
        'name' => 'tour_code',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'from_place' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_FROM_PLACE',
        'width' => '10%',
        'default' => true,
        'name' => 'from_place',
      ),
      'to_place' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_TO_PLACE',
        'width' => '10%',
        'default' => true,
        'name' => 'to_place',
      ),
      'tour_type' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_TOUR_TYPE',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'tour_type',
      ),
      'start_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_START_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'start_date',
      ),
      'end_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_END_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'end_date',
      ),
      'contract_value' => 
      array (
        'type' => 'currency',
        'label' => 'LBL_CONTRACT_VALUE',
        'currency_format' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'contract_value',
      ),
      'currency' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_CURRENCY',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'currency',
      ),
      'transport' => 
      array (
        'type' => 'multienum',
        'label' => 'LBL_TRANSPORT',
        'width' => '10%',
        'default' => true,
        'name' => 'transport',
      ),
      'quotes_tours_name' => 
      array (
        'type' => 'relate',
        'link' => 'quotes_tours',
        'label' => 'LBL_QUOTES_TOURS_FROM_QUOTES_TITLE',
        'width' => '10%',
        'default' => true,
        'name' => 'quotes_tours_name',
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
      'date_modified' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_MODIFIED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_modified',
      ),
      'modified_user_id' => 
      array (
        'type' => 'assigned_user_name',
        'label' => 'LBL_MODIFIED',
        'width' => '10%',
        'default' => true,
        'name' => 'modified_user_id',
      ),
      'current_user_only' => 
      array (
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
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
        'default' => true,
        'width' => '10%',
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
