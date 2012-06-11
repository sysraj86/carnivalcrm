<?php
$module_name = 'Comments';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '15',
          'field' => '25',
        ),
        1 => 
        array (
          'label' => '15',
          'field' => '25',
        ),
      ),
      'useTabs' => false,
      'syncDetailEditViews' => false,
    ),
    'panels' => 
    array ( 
        'LBL_THONGTINCHUNG' => 
    array(
        array (
          'name',
        ),
        array (
          'groupprogra_comments_name',
          'ngay'
        ),
        array(
          'lichtrinh',
          'assigned_user_name', 
        ),
        ),
        
        'LBL_HUONGDANVIEN' => 
    array(
        array (
          'thaidolamviec',
          'kienthucamhieu',
        ),
        array(
          'tinhchuyennghiep',
          'nhungvandekhac_hdv',
        ),
        ),
        'LBL_PHUONGTIEN' => 
    array(
        array (
          'chatluongphuongtien',
          'laixe',
        ),
        array(
          'nhungvandekhac_pt',
        ),
        ),
        
        'LBL_DICHVUKHAC' => 
    array(
        array (
          'khachsan',
        ),
        array (
          'nhahang',
        ),
        array(
          'lichtrinhtour',
        ),
        array (
          'nhanxetchung',
        ),
        ),
        
        'LBL_THONGTINCANHAN' => 
    array(
        array (
          array (
          'name' => 'fits_comments_name',
          'label' => 'LBL_FITS'
          ),
          'diachi',
        ),
        array(
          'dienthoai',
          'email',
        ),

        
        ),
    ),
  ),
);
?>
