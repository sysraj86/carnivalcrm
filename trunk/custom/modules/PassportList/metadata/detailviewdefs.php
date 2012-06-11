<?php
$module_name = 'PassportList';
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
            'customCode' => '<input title="{$MOD.LBL_EXPORTTOWORD}" accessKey="{$MOD.LBL_EXPORTTOWORD}" class="button" onclick="window.location.href=\'index.php?module=PassportList&action=exporttoword&record={$fields.id.value}\'" name="button" type="button" value="Export To Word">',
          ),
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
          0 => 
          array (
            'name' => 'code',
            'label' => 'LBL_CODE',
            'type' => 'readonly',
          ),
        ),
        1 => 
        array (
          0 => 'name',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'status',
            'studio' => 'visible',
            'label' => 'LBL_STATUS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'groupprograsportlist_name',
            'label' => 'LBL_GROUPPROGRAMS_PASSPORTLIST_FROM_GROUPPROGRAMS_TITLE',
          ),
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
