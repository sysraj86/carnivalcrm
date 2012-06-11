<?php
$module_name = 'CommentAirlines';

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
      'include' => array(
        
      ),
      'useTabs' => false,
      'syncDetailEditViews' => false,
    ),
    'panels' => 
    array (
      'LBL_THONGTINCHUNG' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'airlines_cotairlines_name',
          ),
          1 => 'lichtrinh',
        ),
        1 => 
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
        2 => 
        array (
          0 => 
          array (
            'name' => 'truongdoan',
            'label' => 'LBL_TRUONGDOAN',
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
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'ykienkhac1',
            'studio' => 'visible',
            'label' => 'LBL_YKIENKHAC',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'baythang',
            'studio' => 'visible',
            'label' => 'LBL_BAYTHANG',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'ykienkhac2',
            'studio' => 'visible',
            'label' => 'LBL_YKIENKHAC',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'transit',
            'studio' => 'visible',
            'label' => 'LBL_TRANSIT',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'ykienkhac3',
            'studio' => 'visible',
            'label' => 'LBL_YKIENKHAC',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'quocte1',
            'studio' => 'visible',
            'customCode' => '<tr><td valign="top" width="18.75%" scope="row">A:</td><td><label><input type="radio" name="quocte1" id="quocte11" value="chuyen">Chuyển Thẳng</label>&nbsp;<label><input type="radio" name="quocte1" id="quocte12" value="kha">Không Chuyển Thẳng</label><script>quocte = "{$fields.quocte1.value}"; if(quocte == "chuyen") document.getElementById("quocte11").checked=true ; else document.getElementById("quocte12").checked=true ;</script></td></tr>',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'ykienkhac4',
            'studio' => 'visible',
            'label' => 'LBL_YKIENKHAC',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'quocte2',
            'studio' => 'visible',
            'label' => 'B',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'ykienkhac5',
            'studio' => 'visible',
            'label' => 'LBL_YKIENKHAC',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'quocnoi1',
            'studio' => 'visible',
            'customCode' => '<tr><td valign="top" width="18.75%" scope="row">A:</td><td><label><input type="radio" name="quocnoi1" id="quocnoi11" value="chuyen">Chuyển Thẳng</label>&nbsp;<label><input type="radio" name="quocnoi1" id="quocnoi12" value="kha">Không Chuyển Thẳng</label><script>quocte = "{$fields.quocnoi1.value}"; if(quocte == "chuyen") document.getElementById("quocnoi11").checked=true ; else document.getElementById("quocnoi12").checked=true ;</script></td></tr>',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'ykienkhac6',
            'studio' => 'visible',
            'label' => 'LBL_YKIENKHAC',
          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'quocnoi2',
            'studio' => 'visible',
            'label' => 'B',
          ),
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'ykienkhac7',
            'studio' => 'visible',
            'label' => 'LBL_YKIENKHAC',
          ),
        ),
        14 => 
        array (
          0 => 
          array (
            'name' => 'chongoi',
            'studio' => 'visible',
            'label' => 'LBL_CHONGOI',
          ),
        ),
        15 => 
        array (
          0 => 
          array (
            'name' => 'ykienkhac8',
            'studio' => 'visible',
            'label' => 'LBL_YKIENKHAC',
          ),
        ),
        16 => 
        array (
          0 => 
          array (
            'name' => 'thucan',
            'studio' => 'visible',
            'label' => 'LBL_THUCAN',
          ),
        ),
        17 => 
        array (
          0 => 
          array (
            'name' => 'ykienkhac9',
            'studio' => 'visible',
            'label' => 'LBL_YKIENKHAC',
          ),
        ),
        18 => 
        array (
          0 => 
          array (
            'name' => 'phucvu',
            'studio' => 'visible',
            'label' => 'LBL_PHUCVU',
          ),
        ),
        19 => 
        array (
          0 => 
          array (
            'name' => 'ykienkhac10',
            'studio' => 'visible',
            'label' => 'LBL_YKIENKHAC',
          ),
        ),
        20 => 
        array (
          0 => 
          array (
            'name' => 'phatsinh',
            'studio' => 'visible',
            'label' => 'LBL_PHATSINH',
          ),
        ),
        21 => 
        array (
          0 => 
          array (
            'name' => 'ykien',
            'studio' => 'visible',
            'label' => 'LBL_YKIEN',
          ),
        ),
        22 => 
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
