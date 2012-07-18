<?php
$module_name = 'Cars';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'numofseat' => 
      array (
        'type' => 'int',
        'label' => 'LBL_NUMOFSEAT',
        'width' => '10%',
        'default' => true,
        'name' => 'numofseat',
      ),
      'transport_name' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_TRANSPORT_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'transport_name',
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
      'number_plates' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_NUMBER_PLATES',
        'width' => '10%',
        'default' => true,
        'name' => 'number_plates',
      ),
      'tours_cars_name' => 
      array (
        'type' => 'relate',
        'link' => 'tours_cars',
        'label' => 'LBL_TOURS_CARS_FROM_TOURS_TITLE',
        'width' => '10%',
        'default' => true,
        'name' => 'tours_cars_name',
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
