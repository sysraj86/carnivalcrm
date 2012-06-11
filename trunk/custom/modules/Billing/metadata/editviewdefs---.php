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
            'name' => 'accounts_billing_name',
          ),
          1 => 
          array (
            'name' => 'fits_billing_name',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'tours_billing_name',
          ),
          1 => 
          array (
            'name' => 'groupprogras_billing_name',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'restaurants_billing_name',
          ),
          1 => 
          array (
            'name' => 'hotels_billing_name',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'airlines_billing_name',
          ),
        ),
      ),
    ),
  ),
);
?>
