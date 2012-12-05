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
          3 => 
          array (
            'customCode' => '<input title="{$MOD.LBL_EXPORTTOWORD}" type="button" accessKey="{$MOD.LBL_EXPORTTOWORD}" class="button" onclick="window.location.href=\'index.php?module=Worksheets&action=export2excel&record={$fields.id.value}\'" name="button" value="Export advance"/>',
          ),
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
          1 => '',
        ),
        1 => 
        array (
          0 => 'worksheet_code',
          1 => '',
        ),
        2 => 
        array (
          0 => 'version',
          1 => '',
        ),
        3 => 
        array (
          0 => 'note',
        ),
        4 => 
        array (
          0 => 'type',
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'overview',
            'customCode' => '{$HTML}',
            'hidelabel' => true,
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'report',
            'customCode' => '{$REPORT}',
            'hidelabel' => true,
          ),
        ),
        7 => 
        array (
          0 => 'assigned_user_name',
          1 => '',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => '',
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
