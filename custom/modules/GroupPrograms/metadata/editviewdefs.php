<?php
$module_name = 'GroupPrograms';
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
          0 => 'description',
          1 => 'assigned_user_name',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'groupprograsportlist_name',
            'label' => 'LBL_GROUPPROGRAMS_PASSPORTLIST_FROM_PASSPORTLIST_TITLE',
          ),
          1 => 
          array (
            'name' => 'groupprograketslists_name',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'groupprograorksheets_name',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'grouplists_pprograms_name',
            'label' => 'LBL_GROUPLISTS_GROUPPROGRAMS_FROM_GROUPLISTS_TITLE',
          ),
          1 => 
          array (
            'name' => 'restaurantspprograms_name',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'hotels_groupprograms_name',
          ),
        ),
      ),
    ),
  ),
);
?>
