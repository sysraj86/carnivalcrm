<?php
$module_name = 'Transports';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'enctype' => 'multipart/form-data',
      ),
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
            'name' => 'address',
            'label' => 'LBL_ADDRESS',
            'displayParams' => 
            array (
              'cols' => 60,
              'row' => 3,
            ),
          ),
          1 => 'LBL_ADDRESS',
          2 => 'LBL_ADDRESS',
        ),
        2 => 
        array (
          0 => 'type',
        ),
        3 => 
        array (
          0 => 'phone',
        ),
        4 => 
        array (
          0 => 'email1',
        ),
        5 => 
        array (
          0 => 'description',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'destinationransports_name',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'countries_transports_name',
          ),
          1 => 'assigned_user_name',
        ),
      ),
    ),
  ),
);
?>
