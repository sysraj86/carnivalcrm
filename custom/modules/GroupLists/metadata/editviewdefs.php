<?php
$module_name = 'GroupLists';
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
          'label' => '20',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '20',
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
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'group_type',
            'label' => 'LBL_GROUP_TYPE',
          ),
        ),
        2 => 
        array (
          0 => 'grouplists_pprograms_name',
        ),
        3 => 
        array (
          0 => 'description',
        ),
        4 => 
        array (
          0 => 'assigned_user_name',
        ),
      ),
    ),
  ),
);
?>
