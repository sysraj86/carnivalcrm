<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['Worksheets'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'worksheets',
    'unified_search' => true,
    
    'fields'  => array(
       
       'worksheet_code' => array(
          'name'    => 'worksheet_code',
          'vname'   => 'LBL_WORKSHEET_CODE',
          'type'    => 'varchar',
          'len'     => 150,
        ),
        
        'type' => array(
          'name'    => 'type',
          'vname'   => 'LBL_WORKSHEET_TYPE',
          'type'    => 'varchar',
          'len'     => 50,
        ),
        
        'auto_id'    => array(
        'required' => '1',
        'name' => 'auto_id',
        'vname' => 'LBL_TIMENO',
        'type' => 'int',
        'massupdate' => 0,
        'comments' => '',
        'help' => '',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => 0,
        'audited' => 0,
        'reportable' => 0,
        'len' => '25',
        'auto_increment'=>true,
     ),
     
     'content' => array(
        'name'  => 'content',
        'vname' => 'LBL_CONTENT',
        'type'  => 'text',
     ),
     
     'ngaykhoihanh' => array(
        'name'  => 'ngaykhoihanh',
        'vname' => 'LBL_NGAYKHOIHANH',
        'type'  => 'date',
     ),
     
     'ngayketthuc'  => array(
        'name'  => 'ngayketthuc',
        'vname' => 'LBL_NGAYKETTHUC',
        'type'  => 'date',
     ),
     
     'tongthunguoilon1' => array(
        'name'  => 'tongthunguoilon1',
        'vname' => 'LBL_TONGTHUNGUOILON1',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     'tongthunguoilon2' => array(
        'name'  => 'tongthunguoilon2',
        'vname' => 'LBL_TONGTHUNGUOILON2',
        'type'  => 'currency',
        'dbType'   => 'double',
     ),
     
      'tongthunguoilon3' => array(
        'name'  => 'tongthunguoilon3',
        'vname' => 'LBL_TONGTHUNGUOILON3',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     'tongthunguoilon4' => array(
        'name'  => 'tongthunguoilon4',
        'vname' => 'LBL_TONGTHUNGUOILON4',
        'type'  => 'currency',
        'dbType'   => 'double',
     ),
     
     'tongthute1' => array(
        'name'  => 'tongthute1',
        'vname' => 'LBL_TONGTHUE1',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     'tongthute2' => array(
        'name'  => 'tongthute2',
        'vname' => 'LBL_TONGTHUE2',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tongthute3' => array(
        'name'  => 'tongthute3',
        'vname' => 'LBL_TONGTHUE3',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     'tongthute4' => array(
        'name'  => 'tongthute4',
        'vname' => 'LBL_TONGTHUE4',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tongchivanchuyen1'    => array(
        'name'  => 'tongchivanchuyen1',
        'vname' => 'LBL_TONGCHIVANCHUYEN1',
        'type'  => 'currency',
        'dbType'    => 'double',
     ),
     
     'tongchivanchuyen2'    => array(
        'name'  => 'tongchivanchuyen2',
        'vname' => 'LBL_TONGCHIVANCHUYEN2',
        'type'  => 'currency',
        'dbType'    => 'double',
     ),
     
     'sumlandfeepackage1'    => array(
        'name'  => 'sumlandfeepackage1',
        'vname' => 'LBL_SUMLANDFEEPACKAGE1',
        'type'  => 'currency',
        'dbType'    => 'double',
     ),
     
     'sumlandfeepackage2'    => array(
        'name'  => 'sumlandfeepackage2',
        'vname' => 'LBL_SUMLANDFEEPACKAGE2',
        'type'  => 'currency',
        'dbType'    => 'double',
     ),
     
     'sumvisa1'    => array(
        'name'  => 'sumvisa1',
        'vname' => 'LBL_SUMVISA1',
        'type'  => 'currency',
        'dbType'    => 'double',
     ), 
     
     'sumvisa2'    => array(
        'name'  => 'sumvisa2',
        'vname' => 'LBL_SUMVISA2',
        'type'  => 'currency',
        'dbType'    => 'double',
     ),
     
     'sumguide1'    => array(
        'name'  => 'sumguide1',
        'vname' => 'LBL_SUMGUIDE1',
        'type'  => 'currency',
        'dbType'    => 'double',
     ),
     
     'sumguide2'    => array(
        'name'  => 'sumguide2',
        'vname' => 'LBL_SUMGUIDE2',
        'type'  => 'currency',
        'dbType'    => 'double',
     ),
     
     'sumotherservice1' => array(
        'name'  => 'sumotherservice1',
        'vname' => 'LBL_SUMOTHERSERVICE1',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'sumotherservice2' => array(
        'name'  => 'sumotherservice2',
        'vname' => 'LBL_SUMOTHERSERVICE2',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tongchi1' => array(
        'name'  => 'tongchi1',
        'vname' => 'LBL_TONGCHI1',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tongchi2' => array(
        'name'  => 'tongchi2',
        'vname' => 'LBL_TONGCHI2',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tongchi3' => array(
        'name'  => 'tongchi3',
        'vname' => 'LBL_TONGCHI3',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tongchi4' => array(
        'name'  => 'tongchi4',
        'vname' => 'LBL_TONGCHI4',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tongchi5' => array(
        'name'  => 'tongchi5',
        'vname' => 'LBL_TONGCHI5',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tongchi6' => array(
        'name'  => 'tongchi6',
        'vname' => 'LBL_TONGCHI6',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tongchi7' => array(
        'name'  => 'tongchi7',
        'vname' => 'LBL_TONGCHI7',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tongchi8' => array(
        'name'  => 'tongchi8',
        'vname' => 'LBL_TONGCHI8',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tongchi9' => array(
        'name'  => 'tongchi9',
        'vname' => 'LBL_TONGCHI9',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tongchi10' => array(
        'name'  => 'tongchi10',
        'vname' => 'LBL_TONGCHI10',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tongchi11' => array(
        'name'  => 'tongchi11',
        'vname' => 'LBL_TONGCHI11',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tongchi12' => array(
        'name'  => 'tongchi12',
        'vname' => 'LBL_TONGCHI12',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'gianet1' => array(
        'name'  => 'gianet1',
        'vname' => 'LBL_GIANET1',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'gianet2' => array(
        'name'  => 'gianet2',
        'vname' => 'LBL_GIANET2',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     
     'gianet3' => array(
        'name'  => 'gianet3',
        'vname' => 'LBL_GIANET3',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'gianet4' => array(
        'name'  => 'gianet4',
        'vname' => 'LBL_GIANET4',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'gianet5' => array(
        'name'  => 'gianet5',
        'vname' => 'LBL_GIANET5',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'gianet6' => array(
        'name'  => 'gianet6',
        'vname' => 'LBL_GIANET6',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     
     'gianet7' => array(
        'name'  => 'gianet7',
        'vname' => 'LBL_GIANET7',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'gianet8' => array(
        'name'  => 'gianet8',
        'vname' => 'LBL_GIANET8',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'gianet9' => array(
        'name'  => 'gianet9',
        'vname' => 'LBL_GIANET9',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'gianet10' => array(
        'name'  => 'gianet10',
        'vname' => 'LBL_GIANET10',
        'type'  => 'currency',
        'dbType' => 'double'
        ,
     ),
     
     
     'gianet11' => array(
        'name'  => 'gianet11',
        'vname' => 'LBL_GIANET11',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'gianet12' => array(
        'name'  => 'gianet12',
        'vname' => 'LBL_GIANET12',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'gianet12' => array(
        'name'  => 'gianet12',
        'vname' => 'LBL_GIANET12',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'giaban1'  => array(
        'name'  => 'giaban1',
        'vname' => 'LBL_GIABAN1',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'giaban2'  => array(
        'name'  => 'giaban2',
        'vname' => 'LBL_GIABAN2',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'giaban3'  => array(
        'name'  => 'giaban3',
        'vname' => 'LBL_GIABAN3',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'giaban4'  => array(
        'name'  => 'giaban4',
        'vname' => 'LBL_GIABAN4',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'giaban5'  => array(
        'name'  => 'giaban5',
        'vname' => 'LBL_GIABAN5',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'giaban6'  => array(
        'name'  => 'giaban6',
        'vname' => 'LBL_GIABAN6',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'giaban7'  => array(
        'name'  => 'giaban7',
        'vname' => 'LBL_GIABAN7',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'giaban8'  => array(
        'name'  => 'giaban8',
        'vname' => 'LBL_GIABAN8',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'giaban9'  => array(
        'name'  => 'giaban9',
        'vname' => 'LBL_GIABAN9',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'giaban10'  => array(
        'name'  => 'giaban10',
        'vname' => 'LBL_GIABAN10',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'giaban11'  => array(
        'name'  => 'giaban11',
        'vname' => 'LBL_GIABAN11',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'giaban12'  => array(
        'name'  => 'giaban12',
        'vname' => 'LBL_GIABAN12',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'laikhach1'  => array(
        'name'  => 'laikhach1',
        'vname' => 'LBL_LAIKHACH1',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'laikhach2'  => array(
        'name'  => 'laikhach2',
        'vname' => 'LBL_LAIKHACH2',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'laikhach3'  => array(
        'name'  => 'laikhach3',
        'vname' => 'LBL_LAIKHACH3',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'laikhach4'  => array(
        'name'  => 'laikhach4',
        'vname' => 'LBL_LAIKHACH4',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'laikhach5'  => array(
        'name'  => 'laikhach5',
        'vname' => 'LBL_LAIKHACH5',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'laikhach6'  => array(
        'name'  => 'laikhach6',
        'vname' => 'LBL_LAIKHACH6',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'laikhach7'  => array(
        'name'  => 'laikhach7',
        'vname' => 'LBL_LAIKHACH7',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'laikhach8'  => array(
        'name'  => 'laikhach8',
        'vname' => 'LBL_LAIKHACH8',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'laikhach9'  => array(
        'name'  => 'laikhach9',
        'vname' => 'LBL_LAIKHACH9',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'laikhach10'  => array(
        'name'  => 'laikhach10',
        'vname' => 'LBL_LAIKHACH10',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'laikhach11'  => array(
        'name'  => 'laikhach11',
        'vname' => 'LBL_LAIKHACH11',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'laikhach12'  => array(
        'name'  => 'laikhach12',
        'vname' => 'LBL_LAIKHACH12',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tonglai1' => array(
        'name'  => 'tonglai1',
        'vname' => 'LBL_TONGLAI1',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tonglai2' => array(
        'name'  => 'tonglai2',
        'vname' => 'LBL_TONGLAI2',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tonglai3' => array(
        'name'  => 'tonglai3',
        'vname' => 'LBL_TONGLAI3',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tonglai4' => array(
        'name'  => 'tonglai4',
        'vname' => 'LBL_TONGLAI4',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tonglai5' => array(
        'name'  => 'tonglai5',
        'vname' => 'LBL_TONGLAI5',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tonglai6' => array(
        'name'  => 'tonglai6',
        'vname' => 'LBL_TONGLAI6',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tonglai7' => array(
        'name'  => 'tonglai7',
        'vname' => 'LBL_TONGLAI7',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tonglai8' => array(
        'name'  => 'tonglai8',
        'vname' => 'LBL_TONGLAI8',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tonglai9' => array(
        'name'  => 'tonglai9',
        'vname' => 'LBL_TONGLAI9',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tonglai10' => array(
        'name'  => 'tonglai10',
        'vname' => 'LBL_TONGLAI10',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tonglai11' => array(
        'name'  => 'tonglai11',
        'vname' => 'LBL_TONGLAI11',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tonglai12' => array(
        'name'  => 'tonglai12',
        'vname' => 'LBL_TONGLAI12',
        'type'  => 'currency',
        'dbType' => 'double',
     ),
     
     'tyle1'  => array(
        'name'  => 'tyle1',
        'vname' => 'LBL_TYLE1',
        'type'  => 'double',
     ),
     
     'tyle2'  => array(
        'name'  => 'tyle2',
        'vname' => 'LBL_TYLE2',
        'type'  => 'double',
     ),
     
     'tyle3'  => array(
        'name'  => 'tyle3',
        'vname' => 'LBL_TYLE3',
        'type'  => 'double',
     ),
     
     'tyle4'  => array(
        'name'  => 'tyle4',
        'vname' => 'LBL_TYLE4',
        'type'  => 'double',
     ),
     
     'tyle5'  => array(
        'name'  => 'tyle5',
        'vname' => 'LBL_TYLE5',
        'type'  => 'double',
     ),
     
     'tyle6'  => array(
        'name'  => 'tyle6',
        'vname' => 'LBL_TYLE6',
        'type'  => 'double',
     ),
     
     'tyle7'  => array(
        'name'  => 'tyle7',
        'vname' => 'LBL_TYLE7',
        'type'  => 'double',
     ),
     
     'tyle8'  => array(
        'name'  => 'tyle8',
        'vname' => 'LBL_TYLE8',
        'type'  => 'double',
     ),
     
     'tyle9'  => array(
        'name'  => 'tyle9',
        'vname' => 'LBL_TYLE9',
        'type'  => 'double',
     ),
     
     'tyle10'  => array(
        'name'  => 'tyle10',
        'vname' => 'LBL_TYLE10',
        'type'  => 'double',
     ),
     
     'tyle11'  => array(
        'name'  => 'tyle11',
        'vname' => 'LBL_TYLE11',
        'type'  => 'double',
     ),
     
     'tyle12'  => array(
        'name'  => 'tyle12',
        'vname' => 'LBL_TYLE12',
        'type'  => 'double',
     ),
     
     'foc_number'   => array(
        'name'  => 'foc_number',
        'vname' => 'LBL_FOC_NUMBER',
        'type'  => 'int',
        'len'   => 10,
     ),
     
     'land_treem'   => array(
        'name'  => 'land_treem',
        'vname' => 'LBL_LAND_TREEM',
        'type'  => 'int',
        'len'   => 10,
     ),
     
     
    ),
    
    'indices' => array (
        array('name' =>'idx_worksheet_id_del', 'type' =>'index', 'fields'=>array('id', 'deleted')),
        array('name' =>'auto_id' , 'type'=>'unique' , 'fields'=>array('auto_id')),
        array('name' =>'worksheet_code' , 'type'=>'unique' , 'fields'=>array('worksheet_code')),
     ),
    
    'relationship' => array(
    
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('Worksheets','Worksheets', array('default', 'assignable', ));
?>
