<?php
$module_name = 'Passports';
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
      'lbl_quickcreate_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'hovaten',
            'label' => 'LBL_HOVATEN_NONUM',
          ),
          1 => 
          array (
            'name' => 'gioitinh',
            'studio' => 'visible',
            'label' => 'LBL_GIOITINH_NONUM',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'noisinh',
            'label' => 'LBL_NOISINH_NONUM',
          ),
          1 => 
          array (
            'name' => 'quoctich',
            'label' => 'LBL_QUOCTICH_NONUM',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'socmnd',
            'label' => 'LBL_SOCMND_NONUM',
          ),
          1 => 
          array (
            'name' => 'hokhauthuongtru',
            'label' => 'LBL_HOKHAUTHUONGTRU_NONUM',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'sodienthoaididong',
            'label' => 'LBL_SODIENTHOAIDIDONG_NONUM',
          ),
          1 => 
          array (
            'name' => 'email',
            'label' => 'LBL_EMAIL_NONUM',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'sohochieu',
            'label' => 'LBL_SOHOCHIEU_NONUM',
          ),
          1 => 
          array (
            'name' => 'quocgiacap',
            'label' => 'LBL_QUOCGIACAP_NONUM',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'ngaycap',
            'label' => 'LBL_NGAYCAP_NONUM',
          ),
          1 => 
          array (
            'name' => 'ngayhethan',
            'label' => 'LBL_NGAYHETHAN_NONUM',
          ),
        ),
      ),
    ),
  ),
);
?>
