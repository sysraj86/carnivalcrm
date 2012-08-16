<?php
$module_name = 'Locations';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'enctype' => 'multipart/form-data',
      ),
      0 => 
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
      'useTabs' => false,
      'syncDetailEditViews' => true,
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
            'name' => 'phone',
            'label' => 'LBL_PHONE',
          ),
        ),
        1 => 
        array (
          0 => 'destinationlocations_name',
          1 => 
          array (
            'name' => 'address',
            'comment' => 'address of destination',
            'label' => 'LBL_ADDRESS',
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
          0 => 
          array (
            'name' => 'email1',
            'label' => 'LBL_EMAIL_ADDRESS',
          ),
          1 => 'assigned_user_name',
        ),
        4 => 
        array (
          0 => 'description',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
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
