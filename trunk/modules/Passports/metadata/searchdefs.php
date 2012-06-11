<?php
$module_name = 'Passports';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
    'code' =>
      array(
        'label' => 'LBL_CODE',
        'width' => '10%',
        'default' => true,
        'name' => 'code',
      ),
      'typevisa' =>
      array(
        'type' => 'enum',
        'label' => 'LBL_TYPEVISA',
        'width' => '10%',
        'default' => true,
        'name' => 'typevisa',
      ),
      'status' =>
      array(
        'type' => 'enum',
        'label' => 'LBL_STATUS',
        'width' => '10%',
        'default' => true,
        'name' => 'status',
      ),
      'hovaten' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_HOVATEN_NONUM',
        'width' => '10%',
        'default' => true,
        'name' => 'hovaten',
      ),
      'ngaysinh' => 
      array (
        'type' => 'date',
        'label' => 'LBL_NGAYSINH_NONUM',
        'width' => '10%',
        'default' => true,
        'name' => 'ngaysinh',
      ),
      'quoctich' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_QUOCTICH_NONUM',
        'width' => '10%',
        'default' => true,
        'name' => 'quoctich',
      ),
      'socmnd' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SOCMND_NONUM',
        'width' => '10%',
        'default' => true,
        'name' => 'socmnd',
      ),
      'sodienthoaididong' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SODIENTHOAIDIDONG_NONUM',
        'width' => '10%',
        'default' => true,
        'name' => 'sodienthoaididong',
      ),
      'email' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EMAIL_NONUM',
        'width' => '10%',
        'default' => true,
        'name' => 'email',
      ),
    ),
    'advanced_search' => 
    array (
    'code' =>
      array(
        'label' => 'LBL_CODE',
        'width' => '10%',
        'default' => true,
        'name' => 'code',
      ),
      'typevisa' =>
      array(
        'type' => 'enum',
        'label' => 'LBL_TYPEVISA',
        'width' => '10%',
        'default' => 'my',
        'name' => 'typevisa',
      ),
      'status' =>
      array(
        'type' => 'enum',
        'label' => 'LBL_STATUS',
        'width' => '10%',
        'default' => 'my',
        'name' => 'status',
      ),
      'hovaten' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_HOVATEN_NONUM',
        'width' => '10%',
        'default' => true,
        'name' => 'hovaten',
      ),
      'gioitinh' => 
      array (
        'type' => 'radioenum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_GIOITINH_NONUM',
        'width' => '10%',
        'name' => 'gioitinh',
      ),
      'tenkhac' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_TENKHAC_NONUM',
        'width' => '10%',
        'default' => true,
        'name' => 'tenkhac',
      ),
      'ngaysinh' => 
      array (
        'type' => 'date',
        'label' => 'LBL_NGAYSINH_NONUM',
        'width' => '10%',
        'default' => true,
        'name' => 'ngaysinh',
      ),
      'tinhtranghonnhan' => 
      array (
        'type' => 'radioenum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_TINHTRANGHONNHAN_NONUM',
        'width' => '10%',
        'name' => 'tinhtranghonnhan',
      ),
      'noisinh' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_NOISINH_NONUM',
        'width' => '10%',
        'default' => true,
        'name' => 'noisinh',
      ),
      'quocgia' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_QUOCGIA_NONUM',
        'width' => '10%',
        'default' => true,
        'name' => 'quocgia',
      ),
      'quoctich' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_QUOCTICH_NONUM',
        'width' => '10%',
        'default' => true,
        'name' => 'quoctich',
      ),
      'socmnd' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SOCMND_NONUM',
        'width' => '10%',
        'default' => true,
        'name' => 'socmnd',
      ),
      'hokhauthuongtru' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_HOKHAUTHUONGTRU_NONUM',
        'width' => '10%',
        'default' => true,
        'name' => 'hokhauthuongtru',
      ),
      'sodienthoainha' => 
      array (
        'type' => 'phone',
        'label' => 'LBL_SODIENTHOAINHA_NONUM',
        'width' => '10%',
        'default' => true,
        'name' => 'sodienthoainha',
      ),
      'sodienthoaididong' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SODIENTHOAIDIDONG_NONUM',
        'width' => '10%',
        'default' => true,
        'name' => 'sodienthoaididong',
      ),
      'email' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EMAIL_NONUM',
        'width' => '10%',
        'default' => true,
        'name' => 'email',
      ),
      'sohochieu' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SOHOCHIEU_NONUM',
        'width' => '10%',
        'default' => true,
        'name' => 'sohochieu',
      ),
      'ngaycap' => 
      array (
        'type' => 'date',
        'label' => 'LBL_NGAYCAP_NONUM',
        'width' => '10%',
        'default' => true,
        'name' => 'ngaycap',
      ),
      'ngayhethan' => 
      array (
        'type' => 'date',
        'label' => 'LBL_NGAYHETHAN_NONUM',
        'width' => '10%',
        'default' => true,
        'name' => 'ngayhethan',
      ),
      'quocgiacap' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_QUOCGIACAP_NONUM',
        'width' => '10%',
        'default' => true,
        'name' => 'quocgiacap',
      ),
      'thanhphocap' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_THANHPHOCAP_NONUM',
        'width' => '10%',
        'default' => true,
        'name' => 'thanhphocap',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
