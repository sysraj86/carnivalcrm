<?php
$module_name = 'Billing';
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
        ),
        1 => 
        array (
          0 => 'billing_cost',
          1 => 
          array (
            'name' => 'payment_date',
            'label' => 'LBL_PAYMENT_DATE',
            'displayParams' => 
            array (
              'showFormats' => true,
            ),
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'type',
            'label' => 'LBL_TYPE',
          ),
          1 => 
          array (
            'name' => 'parent_name',
            'studio' => 'visible',
            'label' => 'LBL_FLEX_RELATE',
          ),
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
