<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['PromotionSetting'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'promotionsetting',
    'unified_search' => true,
    
    'fields'  => array(
    'code' => array(
        'name' => 'code',
        'vname' => 'LBL_CODE',
        'type' => 'varchar',
        'massupdate' => 0,
        'comments' => '',
        'help' => '',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => '0',
        'audited' => false,
        'reportable' => true,
        'len' => '255',
        'size' => '20',
    ),
    'autocode'    => array(
        'required' => '1',
        'name' => 'autocode',
        'vname' => '',
        'type' => 'int',
        'massupdate' => 0,
        'comments' => '',
        'help' => '',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => 0,
        'audited' => 0,
        'reportable' => 0,
        'len' => '25',
     ),
     'type' => array(
        'required' => false,
        'name' => 'type',
        'vname' => 'LBL_TYPE',
        'type' => 'enum',
        'massupdate' => 0,
        'comments' => '',
        'help' => '',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => '0',
        'audited' => false,
        'reportable' => true,
        'len' => 100,
        'size' => '20',
        'options' => 'type_promotion_dom',
        'studio' => 'visible',
        'dependency' => false,
     ),
     
     'value_score' => array(
        'required' => false,
        'name' => 'value_score',
        'vname' => 'LBL_VALUE_SCORE',
        'type' => 'long',
        'massupdate' => 0,
        'comments' => '',
        'help' => 'Giá triò VND cuÒa 1 ðiêÒm',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => '0',
        'audited' => false,
        'reportable' => true,
        'len' => '255',
        'size' => '20',
        'enable_range_search' => false,
        'disable_num_format' => '',
     ),
     

   ),
    
    'relationship' => array(
    
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('PromotionSetting','PromotionSetting', array('default', 'assignable', ));
?>
