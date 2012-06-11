<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['ContractLiquidate'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'contractliquidate',
    'unified_search' => true,
    
    'fields'  => array(
      
        'type' => array(
            'name' => 'type',
            'vname' => 'LBL_TYPE',
            'type'  => 'varchar',
            'len' => 255,
        ),
        'number' => array(
            'name' => 'number',
            'vname' => 'LBL_NUMBER',
            'type'  => 'varchar',
            'required' => true,
            'len' => 255,
        ),
        'date' => array(
            'name' => 'date',
            'vname' => 'LBL_DATE',
            'type'  => 'date',
        ),
        'day' => array(
            'name' => 'day',
            'vname' => 'LBL_DAY',
            'type'  => 'varchar',
            'required' => true,
            'len' => 255,
        ),
        'month' => array(
            'name' => 'month',
            'vname' => 'LBL_MONTH',
            'type'  => 'varchar',
            'required' => true,
            'len' => 255,
        ),
        'year' => array(
            'name' => 'year',
            'vname' => 'LBL_YEAR',
            'type'  => 'varchar',
            'required' => true,
            'len' => 255,
        ),
        'contract' => array(
            'name' => 'contract',
            'vname' => 'LBL_CONTRACT',
            'type'  => 'varchar',
            'required' => true,
            'len' => 255,
        ),
        'contract_id' => array(
            'name' => 'contract_id',
            'vname' => 'LBL_NUMBER',
            'type'  => 'id',
            'required' => true,
            'len' => 36,
        ),
        'tongcong_contract_kehoach'  => array(
            'name'  => 'tongcong_contract_kehoach',
            'vname' => 'LBL_TONGCONG_CONTRACT_KEHOACH',
            'type'  => 'float',
            'len'   => '26',
            'precision' => '1',
        ),
        'tongcong_contract_thucte'  => array(
            'name'  => 'tongcong_contract_thucte',
            'vname' => 'LBL_TONGCONG_CONTRACT_THUCTE',
            'type'  => 'float',
            'len'   => '26',
            'precision' => '1',
        ),
        'tongcong_tang_kehoach'  => array(
            'name'  => 'tongcong_tang_kehoach',
            'vname' => 'LBL_TONGCONG_TANG_KEHOACH',
            'type'  => 'float',
            'len'   => '26',
            'precision' => '1',
        ),
        'tongcong_tang_thucte'  => array(
            'name'  => 'tongcong_tang_thucte',
            'vname' => 'LBL_TONGCONG_TANG_THUCTE',
            'type'  => 'float',
            'len'   => '26',
            'precision' => '1',
        ),
        'tongcong_giam_kehoach'  => array(
            'name'  => 'tongcong_giam_kehoach',
            'vname' => 'LBL_TONGCONG_GIAM_KEHOACH',
            'type'  => 'float',
            'len'   => '26',
            'precision' => '1',
        ),
        'tongcong_giam_thucte'  => array(
            'name'  => 'tongcong_giam_thucte',
            'vname' => 'LBL_TONGCONG_GIAM_THUCTE',
            'type'  => 'float',
            'len'   => '26',
            'precision' => '1',
        ),
        'tongtien_kehoach'  => array(
            'name'  => 'tongtien_kehoach',
            'vname' => 'LBL_TONGTIEN_KEHOACH',
            'type'  => 'float',
            'len'   => '26',
            'precision' => '1',
        ),
        'tongtien_thucte'  => array(
            'name'  => 'tongtien_thucte',
            'vname' => 'LBL_TONGTIEN_THUCTE',
            'type'  => 'float',
            'len'   => '26',
            'precision' => '1',
        ),
        'tienthanhtoan'  => array(
            'name'  => 'tienthanhtoan',
            'vname' => 'LBL_TIENTHANHTOAN',
            'type'  => 'float',
            'len'   => '26',
            'precision' => '1',
        ),
        'tienconlai'  => array(
            'name'  => 'tienconlai',
            'vname' => 'LBL_TIENCONLAI',
            'type'  => 'float',
            'len'   => '26',
            'precision' => '1',
        ),
        'tientralai'  => array(
            'name'  => 'tientralai',
            'vname' => 'LBL_TIENTRALAI',
            'type'  => 'float',
            'len'   => '26',
            'precision' => '1',
        ),
        'bangchu'   => array(
         'name'     => 'bangchu',
         'vname'    => 'LBL_BANGCHU' ,
         'type'     => 'varchar',
         'len'      => 255,
       ),
       'template_ddown_c' => 
      array (
        'name' => 'template_ddown_c',
        'vname' => 'LBL_TEMPLATE_DDOWN_C',
        'type' => 'multienum',
        'massupdate' => 0,
        'comments' => '',
        'help' => '',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => 0,
        'audited' => 0,
        'reportable' => 0,
        'len' => 255,
        'options' => 'template_ddown_c_list',
        'studio' => 'visible',
        'isMultiSelect' => true,
      ),
    
    ),
    
    'relationship' => array(
    
    ),
    
    
    
);
VardefManager::createVardef('ContractLiquidate','ContractLiquidate', array('default', 'assignable', ));
?>
