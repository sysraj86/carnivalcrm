<?php
$module_name = 'Orders';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'code' => 
      array (
        'label' => 'LBL_CODE',
        'width' => '10%',
        'name' => 'code',
        'default' => true,
      ),
      'name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_NAME',
        'width' => '10%',
        'name' => 'name',
        'default' => true,
      ),
      'email' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EMAIL',
        'width' => '10%',
        'name' => 'email',
        'default' => true,
      ),
      'sodienthoai' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SODIENTHOAI',
        'width' => '10%',
        'name' => 'sodienthoai',
        'default' => true,
      ),
      'deparment' => 
      array (
        'label' => 'LBL_DEPARMENT',
        'width' => '10%',
        'name' => 'deparment',
        'default' => true,
      ),
      'assigned_user_name' => 
      array (
        'label' => 'LBL_ASSIGNED_TO_NAME',
        'width' => '10%',
        'name' => 'assigned_user_name',
        'link' => 'assigned_user_link',
        'type' => 'relate',
        'default' => true,
      ),
    ),
    'advanced_search' => 
    array (
      'code' => 
      array (
        'label' => 'LBL_CODE',
        'width' => '10%',
        'name' => 'code',
        'default' => true,
      ),
      'name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_NAME',
        'width' => '10%',
        'name' => 'name',
        'default' => true,
      ),
      'email' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EMAIL',
        'width' => '10%',
        'name' => 'email',
        'default' => true,
      ),
      'diachi' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_DIACHI',
        'width' => '10%',
        'name' => 'diachi',
        'default' => true,
      ),
      'sodienthoai' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SODIENTHOAI',
        'width' => '10%',
        'name' => 'sodienthoai',
        'default' => true,
      ),
      'deparment' => 
      array (
        'label' => 'LBL_DEPARMENT',
        'width' => '10%',
        'name' => 'deparment',
        'default' => true,
      ),
      'ngaykhoihanh' => 
      array (
        'type' => 'date',
        'label' => 'LBL_NGAYKHOIHANH',
        'width' => '10%',
        'name' => 'ngaykhoihanh',
        'default' => true,
      ),
      'songuoilon' => 
      array (
        'type' => 'int',
        'label' => 'LBL_SONGUOILON',
        'width' => '10%',
        'name' => 'songuoilon',
        'default' => true,
      ),
      'songaydi' => 
      array (
        'type' => 'int',
        'label' => 'LBL_SONGAYDI',
        'width' => '10%',
        'name' => 'songaydi',
        'default' => true,
      ),
      'assigned_user_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ASSIGNED_TO_NAME',
        'width' => '10%',
        'name' => 'assigned_user_name',
        'default' => true,
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '20',
      'field' => '30',
    ),
  ),
);
?>
