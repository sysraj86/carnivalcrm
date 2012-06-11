<?php
$module_name = 'Worksheets';
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
          'label' => '20',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '20',
          'field' => '30',
        ),
      ),
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/Worksheets/js/stylecss.js',
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
          1 => 'worksheet_code',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'groupprograorksheets_name',
          ),
          1 => 
          array (
            'name' => 'version',
            'label' => 'LBL_VERSION',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'note',
            'label' => 'LBL_NOTE',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'overview',
            'customCode' => '{$HTML}',
          ),
        ),
        4 => 
        array (
          0 => 'assigned_user_name',
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
      'lbl_detailview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'report',
            'customCode' => '{$REPORT}',
          ),
        ),
        1 => 
        array (
          0 => '',
          1 => '',
        ),
      ),
    ),
  ),
);
?>
