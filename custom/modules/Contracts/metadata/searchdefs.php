<?php
$module_name = 'Contracts';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'number' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_NUMBER',
        'width' => '10%',
        'default' => true,
        'name' => 'number',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'assigned_user_name' => 
      array (
        'link' => 'assigned_user_link',
        'type' => 'relate',
        'label' => 'LBL_ASSIGNED_TO_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'assigned_user_name',
      ),
      'nguoidaidienbenb' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_NGUOIDAIDIENBENB',
        'width' => '10%',
        'default' => true,
        'name' => 'nguoidaidienbenb',
      ),
      'date_of_contracts' => 
      array (
        'type' => 'date',
        'label' => 'LBL_DATE_OF_CONTRACTS',
        'width' => '10%',
        'default' => true,
        'name' => 'date_of_contracts',
      ),
      'nguoidaidienbena' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_NGUOIDAIDIENBENA',
        'width' => '10%',
        'default' => true,
        'name' => 'nguoidaidienbena',
      ),
      'type' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_WORKSHEET_TYPE',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'type',
      ),
      'tongtien' => 
      array (
        'type' => 'currency',
        'label' => 'LBL_TONGTIEN',
        'currency_format' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'tongtien',
      ),
      'tour_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_TOUR_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'tour_name',
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
      'number' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_NUMBER',
        'width' => '10%',
        'default' => true,
        'name' => 'number',
      ),
      'parent_type' => 
      array (
        'type' => 'parent_type',
        'label' => 'LBL_CONTRACT_PARENT_TYPE',
        'width' => '10%',
        'default' => true,
        'name' => 'parent_type',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'daidienbena' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_BEN_A',
        'width' => '10%',
        'default' => true,
        'name' => 'daidienbena',
      ),
      'phone_a' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PHONE',
        'width' => '10%',
        'default' => true,
        'name' => 'phone_a',
      ),
      'address_a' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ADDRESS',
        'width' => '10%',
        'default' => true,
        'name' => 'address_a',
      ),
      'daidienbenb' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_BEN_B',
        'width' => '10%',
        'default' => true,
        'name' => 'daidienbenb',
      ),
      'phone_b' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PHONE',
        'width' => '10%',
        'default' => true,
        'name' => 'phone_b',
      ),
      'address_b' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ADDRESS',
        'width' => '10%',
        'default' => true,
        'name' => 'address_b',
      ),
      'tour_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_TOURNAME',
        'width' => '10%',
        'default' => true,
        'name' => 'tour_name',
      ),
      'tongtien' => 
      array (
        'type' => 'currency',
        'label' => 'LBL_TONGTIEN',
        'currency_format' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'tongtien',
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
