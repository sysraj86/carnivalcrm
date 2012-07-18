<?php
$module_name = 'Restaurants';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'code' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_RES_CODE',
        'width' => '10%',
        'default' => true,
        'name' => 'code',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
    ),
    'advanced_search' => 
    array (
      'code' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_RES_CODE',
        'width' => '10%',
        'default' => true,
        'name' => 'code',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'address' => 
      array (
        'type' => 'text',
        'label' => 'LBL_RES_ADDRESS',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'address',
      ),
      'area' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_AREA',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'area',
      ),
      'city_province' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_CITY_PROVINCE',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'city_province',
      ),
      'quanity' => 
      array (
        'type' => 'int',
        'label' => 'LBL_CAPACITY',
        'width' => '10%',
        'default' => true,
        'name' => 'quanity',
      ),
      'website' => 
      array (
        'type' => 'url',
        'label' => 'LBL_WEBSITE',
        'width' => '10%',
        'default' => true,
        'name' => 'website',
      ),
      'tel' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_RES_TEL',
        'width' => '10%',
        'default' => true,
        'name' => 'tel',
      ),
      'fax' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_FAX',
        'width' => '10%',
        'default' => true,
        'name' => 'fax',
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
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
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
