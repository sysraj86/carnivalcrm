<?php
$module_name = 'C_Areas';
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
            'name' => 'code_c',
            'label' => 'LBL_CODE',
          ),
        ),
        1 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'c_areas_countries_name',
          ),
        ),
        2 => 
        array (
          0 => 'assigned_user_name',
        ),
      ),
    ),
  ),
);
?>
