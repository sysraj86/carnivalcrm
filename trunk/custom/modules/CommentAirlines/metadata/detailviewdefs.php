<?php
$module_name = 'CommentAirlines';
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
      'LBL_THONGTINCHUNG' => 
      array (
        0 => 
        array (
          0 => 'code',
          1 => 
          array (
            'name' => 'airlines_cotairlines_name',
          ),
        ),
        1 => 
        array (
          0 => 'lichtrinh',
          1 => 
          array (
            'name' => 'truongdoan',
            'label' => 'LBL_TRUONGDOAN',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'ngaybatdau',
            'label' => 'LBL_NGAYBATDAU',
          ),
          1 => 
          array (
            'name' => 'ngayketthuc',
            'label' => 'LBL_NGAYKETTHUC',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
      ),
      'LBL_DANHGIADICHVU' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'loaimaybay',
            'studio' => 'visible',
            'label' => 'LBL_LOAIMAYBAY',
          ),
          1 => 
          array (
            'name' => 'ykienkhac1',
            'studio' => 'visible',
            'label' => 'LBL_YKIENKHAC',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'baythang',
            'studio' => 'visible',
            'label' => 'LBL_BAYTHANG',
          ),
          1 => 
          array (
            'name' => 'ykienkhac2',
            'studio' => 'visible',
            'label' => 'LBL_YKIENKHAC',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'transit',
            'studio' => 'visible',
            'label' => 'LBL_TRANSIT',
          ),
          1 => 
          array (
            'name' => 'ykienkhac3',
            'studio' => 'visible',
            'label' => 'LBL_YKIENKHAC',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'quocte1',
            'studio' => 'visible',
            'label' => 'LBL_QUOCTE',
          ),
          1 => 
          array (
            'name' => 'ykienkhac4',
            'studio' => 'visible',
            'label' => 'LBL_YKIENKHAC',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'quocte2',
            'studio' => 'visible',
            'label' => '',
          ),
          1 => 
          array (
            'name' => 'ykienkhac5',
            'studio' => 'visible',
            'label' => 'LBL_YKIENKHAC',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'quocnoi1',
            'studio' => 'visible',
            'label' => 'LBL_QUOCNOI',
          ),
          1 => 
          array (
            'name' => 'ykienkhac6',
            'studio' => 'visible',
            'label' => 'LBL_YKIENKHAC',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'quocnoi2',
            'studio' => 'visible',
            'label' => '',
          ),
          1 => 
          array (
            'name' => 'ykienkhac7',
            'studio' => 'visible',
            'label' => 'LBL_YKIENKHAC',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'chongoi',
            'studio' => 'visible',
            'label' => 'LBL_CHONGOI',
          ),
          1 => 
          array (
            'name' => 'ykienkhac8',
            'studio' => 'visible',
            'label' => 'LBL_YKIENKHAC',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'thucan',
            'studio' => 'visible',
            'label' => 'LBL_THUCAN',
          ),
          1 => 
          array (
            'name' => 'ykienkhac9',
            'studio' => 'visible',
            'label' => 'LBL_YKIENKHAC',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'phucvu',
            'studio' => 'visible',
            'label' => 'LBL_PHUCVU',
          ),
          1 => 
          array (
            'name' => 'ykienkhac10',
            'studio' => 'visible',
            'label' => 'LBL_YKIENKHAC',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'phatsinh',
            'studio' => 'visible',
            'label' => 'LBL_PHATSINH',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'ykien',
            'studio' => 'visible',
            'label' => 'LBL_YKIEN',
          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'nhanxetchung',
            'studio' => 'visible',
            'label' => 'LBL_NHANXET',
          ),
        ),
      ),
    ),
  ),
);
?>
