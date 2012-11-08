<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['Insurances'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'insurances',
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
    
    ),
    
    'relationship' => array(
    
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('Insurances','Insurances', array('default', 'assignable', ));
?>
