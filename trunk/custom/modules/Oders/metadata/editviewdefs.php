<?php
$module_name = 'Oders';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '3',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '20',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '20',
        ),
        2 => 
        array (
          'label' => '10',
          'field' => '20',
        ),
      ),
      
      'useTabs' => false,
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'LBL_THONGTINCANHAN' => 
      array (
        0 => 
        array (
          0 => 'name',
          2 => '',
        ),
        1 => 
        array (
          0 => 'sodienthoai',
          1 => 'email',
          2 => '',
        ),
        2 => 
        array (
          0 => 'diachi',
          1 => 'quocgia',
          2 => '',
        ),
        3 => 
        array (
          0 => 'deparment',
          1 => 'nhanxet',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'fits_oders_name',
            'displayParams' => array (
                'field_to_name_array' => array (
                    'id' => 'fits_oders2a96ersfits_ida',
                    'name' => 'fits_oders_name',
                    'phone_mobile' => 'sodienthoai',
                    'email1' => 'email',
                    'address' => 'diachi',
                ),
        ),
          ),
          1 => 
          array (
            'name' => 'accounts_oders_name',
          ),
          2 => '',
        ),
      ),
      'LBL_THONGTINCHUYENDI' => 
      array (
        0 => 
        array (
          0 => 'ngaykhoihanh',
          1 => 'songuoilon',
        ),
        1 => 
        array (
          0 => 'thongtintreem',
          1 => 'songaydi',
        ),
      ),
      'LBL_MIENNAM' => 
      array (
        0 => 
        array (
          0 => 'vungtau',
          1 => 'cantho',
          2 => 'chaudoc',
        ),
        1 => 
        array (
          0 => 'cuchi',
          1 => 'dalat',
          2 => 'hochiminh',
        ),
        2 => 
        array (
          0 => 'tayninh',
          1 => 'dbscl',
          2 => 'phuquoc',
        ),
      ),
      'LBL_MIENTRUNG' => 
      array (
        0 => 
        array (
          0 => 'danang',
          1 => 'hoian',
          2 => 'hue',
        ),
        1 => 
        array (
          0 => 'myson',
          1 => 'nhatrang',
          2 => 'ninhbinh',
        ),
        2 => 
        array (
          0 => 'muine',
          1 => 'quynhon',
          2 => 'buonmethuot',
        ),
      ),
      'LBL_MIENBAC' => 
      array (
        0 => 
        array (
          0 => 'catba',
          1 => 'dienbienphu',
          2 => 'fansipan',
        ),
        1 => 
        array (
          0 => 'haiphong',
          1 => 'halong',
          2 => 'hanoi',
        ),
        2 => 
        array (
          0 => 'langson',
          1 => 'sapa',
          2 => '',
        ),
      ),
      'LBL_NOIKHAC' => 
      array (
        0 => 
        array (
          0 => '',
          1 => '',
          2 => 'chontour',
        ),
      ),
      'LBL_CAMPUCHIA' => 
      array (
        0 => 
        array (
          0 => 'angkor',
          1 => 'kampongthom',
          2 => 'sihanoukville',
        ),
        1 => 
        array (
          0 => 'kampot',
          1 => 'kep',
          2 => 'bienho',
        ),
        2 => 
        array (
          0 => 'kampong',
          1 => 'phnompenh',
          2 => 'noikhac_cam',
        ),
      ),
      'LBL_LAO' => 
      array (
        0 => 
        array (
          0 => 'hongsa',
          1 => 'luangprabang',
          2 => 'oudomxai',
        ),
        1 => 
        array (
          0 => 'samnua',
          1 => 'vangvieng',
          2 => 'houayxai',
        ),
        2 => 
        array (
          0 => 'muongsinh',
          1 => 'pakse',
          2 => 'sananakhet',
        ),
        3 => 
        array (
          0 => 'vientiane',
          1 => 'khongisland',
          2 => 'namngundam',
        ),
        4 => 
        array (
          0 => 'phongsali',
          1 => 'xiengkhouang',
          2 => 'noikhac_lao',
        ),
      ),
      'LBL_PHUONGTIEN' => 
      array (
        0 => 
        array (
          0 => 'maybay',
          1 => 'xehoiorbus',
          2 => 'tauhoa',
        ),
        1 => 
        array (
          0 => 'xemay',
        ),
      ),
      'LBL_HANHTRINH' => 
      array (
        0 => 
        array (
          0 => 'bicycling',
          1 => 'hilltribe',
          2 => 'culture',
        ),
        1 => 
        array (
          0 => 'kayaking',
          1 => 'diving',
          2 => 'filming',
        ),
        2 => 
        array (
          0 => 'trekking',
        ),
      ),
      'LBL_CHOO' => 
      array (
        0 => 
        array (
          0 => '',
          1 => '',
          2 => 'tieuchuankhachsan',
        ),
        1 => 
        array (
          0 => '',
          1 => '',
          2 => 'loaiphong',
        ),
        2 => 
        array (
          0 => 'single_',
          1 => 'double_',
          2 => 'twin',
        ),
        3 => 
        array (
          0 => 'triple',
          1 => 'extrabed',
          2 => '',
        ),
      ),
      'LBL_PHUCVUANUONG' => 
      array (
        0 => 
        array (
          0 => 'ansang',
          1 => 'antrua',
          2 => 'antoi',
        ),
      ),
      'LBL_THONGTINKHAC' => 
      array (
        0 => 
        array (
          0 => '',
          1 => '',
          2 => 'thongtinchuyendi',
        ),
      ),
      'LBL_THONGBAO' => 
      array (
        0 => 
        array (
          0 => '',
          1 => '',
          2 => 'nguonthongtin',
        ),
      ),
    ),
    0 => 
    array (
      0 => 
      array (
        0 => 'description',
        1 => 'assigned_user_name',
      ),
    ),
  ),
);
?>
