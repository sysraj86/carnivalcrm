<?php
$module_name = 'Passports';
$listViewDefs [$module_name] = 
array (
    'CODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CODE',
    'width' => '10%',
    'link' => true,
    'default' => true,
  ),
  'HOVATEN' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_HOVATEN_NONUM',
    'width' => '10%',
    'link' => true,
    'default' => true,
  ),
  'GIOITINH' => 
  array (
    'type' => 'radioenum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_GIOITINH_NONUM',
    'width' => '10%',
  ),
  'NGAYSINH' => 
  array (
    'type' => 'date',
    'label' => 'LBL_NGAYSINH_NONUM',
    'width' => '10%',
    'default' => true,
  ),
  'QUOCTICH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_QUOCTICH_NONUM',
    'width' => '10%',
    'default' => true,
  ),
  'SOCMND' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SOCMND_NONUM',
    'width' => '10%',
    'default' => true,
  ),
  'SODIENTHOAIDIDONG' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SODIENTHOAIDIDONG_NONUM',
    'width' => '10%',
    'default' => true,
  ),
  'EMAIL' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EMAIL_NONUM',
    'width' => '10%',
    'default' => true,
  ),
  'FITS_PASSPORTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'fits_passports',
    'label' => 'LBL_FITS_PASSPORTS_FROM_FITS_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'STATUS' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'default' => true,
  ),
);
?>
