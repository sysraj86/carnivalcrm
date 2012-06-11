<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['CarBookings'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'carbookings',
    'unified_search' => true,
    
    'fields'  => array(
       
       'carbooking_code' => array(
          'name'    => 'carbooking_code',
          'vname'   => 'LBL_WORKSHEET_CODE',
          'type'    => 'varchar',
          'len'     => 150,
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
    
    ),
    
    'indices' => array (
        array('name' =>'idx_carbooking_id_del', 'type' =>'index', 'fields'=>array('id', 'deleted')),
        array('name' =>'auto_id' , 'type'=>'unique' , 'fields'=>array('auto_id')),
        array('name' =>'carbooking_code' , 'type'=>'unique' , 'fields'=>array('carbooking_code')),
     ),
    
    'relationship' => array(
    
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('CarBookings','CarBookings', array('default', 'assignable', ));
?>
