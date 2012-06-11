<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['Billing'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'billing',
    'unified_search' => true,
    
    'fields'  => array(
    
        'code'   => array(
         'name'     => 'code',
         'vname'    => 'LBL_BILLING_CODE',
         'type'     => 'varchar',
         'len'      => 150,
       ),
       
       'autocode'    => array(
            'required' => '1',
            'name' => 'autocode',
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
        ),
        'billing_cost' => array(
            'name'      => 'billing_cost',
            'vname'     => 'LBL_BILLING_COST',
            'type'      => 'currency',
            'dbType'    => 'double',
        ),
        'type' => array(
              'name'    => 'type',
              'vname'   => 'LBL_TYPE',
              'type'    => 'enum',
              'options' => 'billing_type_dom',
            ),
        'payment_date'  => array(
            'name'  => 'payment_date',
            'vname' => 'LBL_PAYMENT_DATE',
            'type'  => 'date',
        ),
        // added by Hoc - 21122011
        'amount'  => array(
            'name'  => 'amount',
            'vname' => 'LBL_AMOUNT',
            'type'  => 'float',
        ),
        
        'giatour_nguoilon'  => array(
            'name'  => 'giatour_nguoilon',
            'vname' => 'LBL_GIATOUR_NGUOILON',
            'type'  => 'int',
        ),
        'giatour_treem'  => array(
            'name'  => 'giatour_treem',
            'vname' => 'LBL_GIATOUR_TREEM',
            'type'  => 'int',
        ),
        
        
        'parent_name' => 
          array (
            'required' => false,
            'source' => 'non-db',
            'name' => 'parent_name',
            'vname' => 'LBL_FLEX_RELATE',
            'type' => 'parent',
            'massupdate' => 0,
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'len' => 25,
            'size' => '20',
            'options' => 'parent_type_for_billing',
            'studio' => 'visible',
            'type_name' => 'parent_type',
            'id_name' => 'parent_id',
            'parent_type' => 'record_type_display',
          ),
          'parent_type' => 
          array (
            'required' => false,
            'name' => 'parent_type',
            'vname' => 'LBL_PARENT_TYPE',
            'type' => 'parent_type',
            'massupdate' => 0,
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => 0,
            'audited' => false,
            'reportable' => true,
            'len' => 255,
            'size' => '20',
            'dbType' => 'varchar',
            'studio' => 'hidden',
          ),
          'parent_id' => 
          array (
            'required' => false,
            'name' => 'parent_id',
            'vname' => 'LBL_PARENT_ID',
            'type' => 'id',
            'massupdate' => 0,
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => 0,
            'audited' => false,
            'reportable' => true,
            'len' => 36,
            'size' => '20',
          ),
    
    
    ),
    
    'indices' => array (
        array('name' =>'idx_bil_id_del', 'type' =>'index', 'fields'=>array('id', 'deleted')),
        array('name' =>'auto_id' , 'type'=>'unique' , 'fields'=>array('auto_id')),
        array('name' =>'billing_code' , 'type'=>'unique' , 'fields'=>array('billing_code')),
    ),
    
    'relationship' => array(
    
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('Billing','Billing', array('default', 'assignable', ));
?>
