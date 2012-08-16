<?php
$module_name = 'Locations';
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
      'useTabs' => false,
      'syncDetailEditViews' => false,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 'phone',
        ),
        1 => 
        array (
          0 => 'destinationlocations_name',
          1 => 
          array (
            'name' => 'address',
            'displayParams' => 
            array (
              'size' => 50,
            ),
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'department',
            'label' => 'LBL_DEPARTMENT',
          ),
          1 => 
          array (
            'name' => 'area',
            'label' => 'LBL_AREA',
          ),
        ),
        3 => 
        array (
          0 => 'description',
          1 => 'email1',
        ),
        4 => 
        array (
          0 => 'assigned_user_name',
        ),
      ),
      'lbl_editview_panel1' => 
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
