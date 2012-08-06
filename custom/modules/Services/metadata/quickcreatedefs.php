<?php
$module_name = 'Services';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'tel',
            'comment' => 'tel of service company',
            'label' => 'LBL_RES_TEL',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'service_type',
            'label' => 'LBL_SERVICE_TYPE',
          ),
          1 => 
          array (
            'name' => 'area',
            'label' => 'LBL_AREA',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'address',
            'comment' => 'address of restaurant',
            'label' => 'LBL_RES_ADDRESS',
          ),
          1 => 
          array (
            'name' => 'destination_services_name',
            'label' => 'LBL_DESTINATIONS_SERVICES_FROM_DESTINATIONS_TITLE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'email1',
            'label' => 'LBL_EMAIL_ADDRESS',
          ),
          1 => 
          array (
            'name' => 'fax',
            'label' => 'LBL_FAX',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
          1 => 'assigned_user_name',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'countries_services_name',
            'label' => 'LBL_COUNTRIES_SERVICES_FROM_COUNTRIES_TITLE',
          ),
        ),
      ),
      'lbl_giathamkhao' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'giathamkhao',
            'label' => 'LBL_GIATHAMKHAO',
          ),
          1 => 
          array (
            'name' => 'ngaythamkhaogia',
            'label' => 'LBL_NGAYTHAMKHAOGIA',
          ),
        ),
      ),
    ),
  ),
);
?>
