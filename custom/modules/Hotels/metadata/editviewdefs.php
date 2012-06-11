<?php
$module_name = 'Hotels';
$viewdefs [$module_name] = 
array (
  'EditView' => 
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
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL',
          ),
        ),
        2 => 
        array (
          0 => 'website',
          1 => 'tel',
        ),
        3 => 
        array (
          0 => 'tax_id',
          1 => 'fax',
        ),
        4 => 
        array (
          0 => 'destinations_hotels_name',
          1 => 'countries_hotels_name',
        ),
        5 => 
        array (
          0 => 'standard',
          1 => 'number_of_room',
        ),
        6 => 
        array (
          0 => 'area',
          1 => 'city_province',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'address',
            'label' => 'LBL_HOTEL_ADDRESS',
            'displayParams' => 
            array (
              'cols' => 80,
              'rows' => 3,
            ),
          ),
          1 => 'assigned_user_name',
        ),
        8 => 
        array (
          0 => 'description',
        ),
      ),
      'lbl_giathamkhao' => 
      array (
        0 => 
        array (
          0 => 'giathamkhao',
          1 => 
          array (
            'name' => 'ngaythamkhaogia',
            'displayParams' => 
            array (
              'showFormats' => true,
            ),
          ),
        ),
      ),
    ),
  ),
);
?>
