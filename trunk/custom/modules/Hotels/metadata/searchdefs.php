<?php
$module_name = 'Hotels';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'code' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_HOTEL_CODE',
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
      'standard' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_STANDARD',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'standard',
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
      'website' => 
      array (
        'type' => 'url',
        'label' => 'LBL_WEBSITE',
        'width' => '10%',
        'default' => true,
        'name' => 'website',
      ),
      'address' => 
      array (
        'type' => 'text',
        'label' => 'LBL_HOTEL_ADDRESS',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'address',
      ),
      'countries_hotels_name' => 
      array (
        'type' => 'relate',
        'link' => 'countries_hotels',
        'label' => 'LBL_COUNTRIES_HOTELS_FROM_COUNTRIES_TITLE',
        'width' => '10%',
        'default' => true,
        'name' => 'countries_hotels_name',
      ),
      'email1' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EMAIL_ADDRESS',
        'width' => '10%',
        'default' => true,
        'name' => 'email1',
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
        'type' => 'varchar',
        'label' => 'LBL_HOTEL_CODE',
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
      'tel' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_HOTEL_TEL',
        'width' => '10%',
        'default' => true,
        'name' => 'tel',
      ),
      'website' => 
      array (
        'type' => 'url',
        'label' => 'LBL_WEBSITE',
        'width' => '10%',
        'default' => true,
        'name' => 'website',
      ),
      'address' => 
      array (
        'type' => 'text',
        'label' => 'LBL_HOTEL_ADDRESS',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'address',
      ),
      'destinations_hotels_name' => 
      array (
        'type' => 'relate',
        'link' => 'destinations_hotels',
        'label' => 'LBL_DESTINATIONS_HOTELS_FROM_DESTINATIONS_TITLE',
        'width' => '10%',
        'default' => true,
        'name' => 'destinations_hotels_name',
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
      'countries_hotels_name' => 
      array (
        'type' => 'relate',
        'link' => 'countries_hotels',
        'label' => 'LBL_COUNTRIES_HOTELS_FROM_COUNTRIES_TITLE',
        'width' => '10%',
        'default' => true,
        'name' => 'countries_hotels_name',
      ),
      'email1' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EMAIL_ADDRESS',
        'width' => '10%',
        'default' => true,
        'name' => 'email1',
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
