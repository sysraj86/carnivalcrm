<?php
$module_name = 'Passports';
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
          3 => array ('customCode' =>'<input title="{$MOD.LBL_EXPORTTOWORD}" type="button" accessKey="{$MOD.LBL_EXPORTTOWORD}" class="button" onclick="window.location.href=\'index.php?module=Passports&action=exporttoword&record={$fields.id.value}\'" name="button" value="Export To Word">',),
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
      'lbl_editview_panel2' => 
      array (
        array(
            'code',
        ),
        array (
        'typevisa',
        'status',
          
        ),
         
        array (
        'hovaten',
        'gioitinh',
          
        ),
         
        array (
        'tenkhac'  ,
        'ngaysinh'
        ),
        
        array (
        'tinhtranghonnhan',
        'noisinh'
        ),
 
        array (
        'quocgia',
        'quoctich'
        ),
 
        array (
        'quoctichkhac',
        'socmnd',
        ),
        
        array (
          'hokhauthuongtru',
          'diachinhanvisa'
        ),

        array (
          'sodienthoainha',
          'sodienthoaididong',
        ),

        array (
          0 => 
          array (
            'name' => 'email',

          ),
          1 => 
          array (
            'name' => 'fits_passports_name',

          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'sohochieu',

          ),
          1 => 
          array (
            'name' => 'ngaycap',

          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'ngayhethan',

          ),
          1 => 
          array (
            'name' => 'quocgiacap',

          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'thanhphocap',

          ),
          1 => 
          array (
            'name' => 'tungbimathochieu',
            'studio' => 'visible',

          ),
        ),
      ),
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'tencongty',

          ),
          1 => 
          array (
            'name' => 'diachicongty',

          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'dienthoaicongty',

          ),
          1 => 
          array (
            'name' => 'sofax',

          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'chucvu',

          ),
          1 => 
          array (
            'name' => 'mucluonghangthang',

          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'motacongviec',
            'studio' => 'visible',

          ),
          1 => '',
        ),
      ),
      'lbl_editview_panel4' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'congtycu',
            'studio' => 'visible',

          ),
          1 => 
          array (
            'name' => 'diachicongtycu',
            'studio' => 'visible',

          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'chucvucongtycu',

          ),
          1 => 
          array (
            'name' => 'dienthoaicongtycu',

          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'captren',

          ),
          1 => 
          array (
            'name' => 'ngayvaolam',

          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'ngayketthuc',

          ),
          1 => 
          array (
            'name' => 'motacongvieccu',

          ),
        ),
      ),
      'lbl_editview_panel5' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'truongdahoc',
            'studio' => 'visible',

          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'diachitruong',
            'studio' => 'visible',

          ),
          1 => 
          array (
            'name' => 'nganhhoc',

          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'ngaynhaphoc',

          ),
          1 => 
          array (
            'name' => 'ngayketthuchoc',

          ),
        ),
      ),
      'lbl_editview_panel6' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'hotencha',

          ),
          1 => 
          array (
            'name' => 'ngaysinhcha',

          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'hotenme',

          ),
          1 => 
          array (
            'name' => 'ngaysinhme',

          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'chamedangonoiden',
            'studio' => 'visible',

          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'hotenvochong',

          ),
          1 => 
          array (
            'name' => 'ngaysinhvochong',

          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'quoctichvochong',

          ),
          1 => 
          array (
            'name' => 'diachivochong',

          ),
        ),
      ),
      'lbl_editview_panel7' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'ngaydiden',

          ),
          1 => 
          array (
            'name' => 'nguoicungdi',

          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'quocgiatungden',
            'studio' => 'visible',
        
          ),
          1 => 
          array (
            'name' => 'mucdichchuyendi',

          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'nguoichitra',

          ),
          1 => 
          array (
            'name' => 'thoigiano',

          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'tungduoccapthithuc',
            'studio' => 'visible',

          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'ngaycapvisa',

          ),
          1 => 
          array (
            'name' => 'sovisa',

          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'quocgiacapvisa',

          ),
          1 => 
          array (
            'name' => 'thanhphocapvisa',

          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'loaivisa',

          ),
          1 => 
          array (
            'name' => 'lanvantay',
            'studio' => 'visible',

          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'matvisa',
            'studio' => 'visible',

          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'noitungden',

          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'ngayden',

          ),
          1 => 
          array (
            'name' => 'songayo',

          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'visabituchoi',

          ),
          1 => 
          array (
            'name' => 'lydobituchoi',
            'studio' => 'visible',

          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'thannhanoday',

          ),
          1 => 
          array (
            'name' => 'hotenthannhan',

          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'moiquanhe',

          ),
          1 => 
          array (
            'name' => 'tinhtranghonnhanthanhnhan',
            'studio' => 'visible',

          ),
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'diachithannhan',

          ),
          1 => 
          array (
            'name' => 'sodienthoaithannhan',

          ),
        ),
      ),
      'lbl_editview_panel9' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'thuocdangphai',
            'studio' => 'visible',

          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'tochucxahoi',
            'studio' => 'visible',

          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'kynangchuyendung',
            'studio' => 'visible',

          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'phucvuquandoi',
            'studio' => 'visible',

          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'benhtruyennhiem',
            'studio' => 'visible',

          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'tochucdacbiet',
            'studio' => 'visible',

          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'nghienmatuy',
            'studio' => 'visible',

          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'tienantiensu',
            'studio' => 'visible',

          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'viphamhoachat',
            'studio' => 'visible',

          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'viphammaidam',
            'studio' => 'visible',

          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'thamgiahopphap',
            'studio' => 'visible',

          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'thamgiakhungbo',
            'studio' => 'visible',

          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'hotrokhungbo',
            'studio' => 'visible',

          ),
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'thanhvienkhungbo',
            'studio' => 'visible',

          ),
        ),
        14 => 
        array (
          0 => 
          array (
            'name' => 'thamgiadietchung',
            'studio' => 'visible',

          ),
        ),
        15 => 
        array (
          0 => 
          array (
            'name' => 'thamgianguocdai',
            'studio' => 'visible',

          ),
        ),
        16 => 
        array (
          0 => 
          array (
            'name' => 'thamgiachinhtri',
            'studio' => 'visible',

          ),
        ),
        17 => 
        array (
          0 => 
          array (
            'name' => 'boquyencongdan',
            'studio' => 'visible',

          ),
        ),
      ),
    ),
  ),
);
?>
