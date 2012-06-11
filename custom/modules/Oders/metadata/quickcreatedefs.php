<?php
$module_name = 'Oders';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
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
          0 => 
          array (
            'name' => 'ngaykhoihanh',
            'label' => 'LBL_NGAYKHOIHANH',
          ),
          1 => 
          array (
            'name' => 'songuoilon',
            'label' => 'LBL_SONGUOILON',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'thongtintreem',
            'studio' => 'visible',
            'label' => 'LBL_THONGTINTREEM',
          ),
          1 => 
          array (
            'name' => 'songaydi',
            'label' => 'LBL_SONGAYDI',
          ),
        ),
      ),
    ),
  ),
);
?>
