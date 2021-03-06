<?php
$module_name = 'Services';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'service_type' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_SERVICE_TYPE',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'service_type',
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
      'tel' => 
      array (
        'type' => 'phone',
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
      'email1' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EMAIL_ADDRESS',
        'width' => '10%',
        'default' => true,
        'name' => 'email1',
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
      'countries_services_name' => 
      array (
        'type' => 'relate',
        'link' => 'countries_services',
        'label' => 'LBL_COUNTRIES_SERVICES_FROM_COUNTRIES_TITLE',
        'width' => '10%',
        'default' => true,
        'name' => 'countries_services_name',
      ),
      'destination_services_name' => 
      array (
        'type' => 'relate',
        'link' => 'destinations_services',
        'label' => 'LBL_DESTINATIONS_SERVICES_FROM_DESTINATIONS_TITLE',
        'width' => '10%',
        'default' => true,
        'name' => 'destination_services_name',
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
