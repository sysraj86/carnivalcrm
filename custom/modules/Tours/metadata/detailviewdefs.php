<?php
$module_name = 'Tours';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
        ),
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
          1 => 'name',
          2 => 'name',
          3 => 'name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'accounts_tours_name',
            'label' => 'LBL_ACCOUNTS_TOURS_FROM_ACCOUNTS_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
