<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['GroupLists'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'grouplists',
    'unified_search' => true,
    
    'fields'  => array(
    
        'code'    => array(
            'name'  => 'code',
            'vname' => 'LBL_GROUPLIST_CODE',
            'type'  => 'varchar',
            'len'   => 250,
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
        
        'start_date' => array(
          'name' => 'start_date',
          'vname' => 'LBL_START_DATE',
          'type'    => 'date'
        ),
        
        'end_date' => array(
          'name' => 'end_date',
          'vname' => 'LBL_END_DATE',
          'type'    => 'date' ,
          'comment' => 'Expected or actual date the oppportunity will close',
            'importable' => 'required',
            'required' => false,
            'enable_range_search' => true,
            'options' => 'date_range_search_dom',
        ),
        'num_of_cus'    => array(
            'name'  => 'num_of_cus',
            'vname' => 'LBL_NUM_OF_CUS',
            'type'  => 'int',
            'len'   => 255,
        ),
    
        
    ),
    
    'indices' => array (
        array('name' =>'idx_grplist_id_del', 'type' =>'index', 'fields'=>array('id', 'deleted')),
        array('name' =>'autocode' , 'type'=>'unique' , 'fields'=>array('autocode')),
        array('name' =>'code' , 'type'=>'unique' , 'fields'=>array('code')),
    ),
    
    'relationship' => array(
    
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('GroupLists','GroupLists', array('default', 'assignable', ));
?>
