<?php
    $module_name = 'Orders';
    $viewdefs [$module_name] = 
    array (
    'EditView' => 
    array (
    'templateMeta' => 
        array (
            'maxColumns' => '3',
            'widths' => 
        array (
            array (
                'label' => '10',
                'field' => '30',
            ),
            array (
                'label' => '10',
                'field' => '30',
            ),                         
        ),
        'useTabs' => false,
        'includes'=> array(
                            array('file'=>'modules/Oders/js/jquery-ui-1.8.13.custom.min.js'),
                            array('file'=>'modules/Oders/js/AjaxGetAllCus.js'),
                            ),
    ),

    'panels' => 
    array (
    'LBL_THONGTINCANHAN' => 
    array (
        array (
             'loaikhachhang',
        array (
            'name' => 'name',
            'customCode' => '<input name="name" id="name" value="{$fields.name.value}" type="text" size="45" /><input type="hidden" name="parent_id" id="parent_id" value="{$fields.parent_id.value}"/> <input type="hidden" name="parent_type" id="parent_type" value="{$fields.parent_type.value}"/>',
        ),
      ),
      // bug 000613
      array(
            'is_company',
            '', 
        )
    ),
    // bug 0000585
    'LBL_BASIC_INFO'    => array(
        array(
           'ngaysinh','deparment',
        ),
        array(
            'tour_code','quocgia',
        ),
        array( 
            'nhanxet'
        ),
    ),
    
    'LBL_THONGTINLIENLAC'=> array(
    array(
        'sodienthoai',
    ),

        array (
            'email',

        array (
            'name' => 'diachi',
            'displayParams' => 
            array (
            'size' => '50',
            ),
        ),
        ),
    ),
    
    // company info 
    // bug 000613
    
    'LBL_COMPANY_INFO'  => array(
        array(
            'company_name',
            'company_phone',
        ),
        
        array(
          'company_email',
          'company_address',
        ),
    ),
    
   'LBL_THONGHINHTHUCLIENHE' => array(
    array (

        array (
            'name' => 'hinhthuclienhe',
            'label' => 'LBL_HINHTHUCLIENHE',
        ),

            array (
                'name' => 'xeploaikhachhang',
                'label' => 'LBL_XEPLOAIKHACHHANG',
            ),
        ),

    ),
    'LBL_THONGTINCHUYENDI' => 
    array (

    array (
    'chontour',
    'ngaykhoihanh',
    ),

    array (
    'songuoilon',
    'thongtintreem',
    ),

    array (
    'songaydi',
    'yeucaukhac',
    ),
    ),
    'lbl_editview_panel1' => 
    array (

    array (

    array (
    'name' => 'ketqua',
    'label' => 'LBL_KETQUA',
    ),

    ),
    ),

    array (

    array (
    'description',
    'assigned_user_name',
    ),
    ),
    ),
    ),
    );
?>
