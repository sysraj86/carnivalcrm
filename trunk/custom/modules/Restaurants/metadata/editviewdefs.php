<?php
$module_name = 'Restaurants';
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
          0 => 'tax_id',
          1 => 
          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL',
          ),
        ),
        2 => 
        array (
          0 => 'tel',
          1 => 'fax',
        ),
        3 => 
        array (
          0 => 'destinationstaurants_name',
          1 => 'countries_rstaurants_name',
        ),
        4 => 
        array (
          0 => 'quanity',
          1 => 'website',
        ),
        5 => 
        array (
          0 => 'area',
          1 => 'city_province',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'address',
            'label' => 'LBL_RES_ADDRESS',
            'displayParams' => 
            array (
              'cols' => 60,
              'rows' => 3,
            ),
          ),
        ),
        7 => 
        array (
          0 => 'description',
        ),
        8 => 
        array (
          0 => 'assigned_user_name',
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
