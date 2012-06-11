<?php
$module_name='Passports';
$subpanel_layout = array (
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'popup_module' => 'Passports',
    ),
  ),
  'where' => '',
  'list_fields' => 
  array (
    'hovaten' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_HOVATEN_NONUM',
      'widget_class' => 'SubPanelDetailViewLink',
      'width' => '10%',
      'default' => true,
    ),
    'gioitinh' => 
    array (
      'type' => 'radioenum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_GIOITINH_NONUM',
      'width' => '10%',
    ),
    'ngaysinh' => 
    array (
      'type' => 'date',
      'vname' => 'LBL_NGAYSINH_NONUM',
      'width' => '10%',
      'default' => true,
    ),
    'quoctich' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_QUOCTICH_NONUM',
      'width' => '10%',
      'default' => true,
    ),
    'socmnd' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_SOCMND_NONUM',
      'width' => '10%',
      'default' => true,
    ),
    'sodienthoaididong' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_SODIENTHOAIDIDONG_NONUM',
      'width' => '10%',
      'default' => true,
    ),
    'email' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_EMAIL_NONUM',
      'widget_class' => 'SubPanelEmailLink', 
      'width' => '10%',
      'default' => true,
    ),
    'date_modified'=>array(
             'vname' => 'LBL_DATE_MODIFIED',
             'width' => '45%',
        ),
        'edit_button'=>array(
            'widget_class' => 'SubPanelEditButton',
             'module' => $module_name,
             'width' => '4%',
        ),
        'remove_button'=>array(
            'widget_class' => 'SubPanelRemoveButton',
             'module' => $module_name,
            'width' => '5%',
        ),
  ),
);