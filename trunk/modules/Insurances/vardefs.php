<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['Insurances'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'insurances',
    'unified_search' => true,
    
    'fields'  => array(
        
        'code' => array(
            'name'  => 'code',
            'vname' => 'LBL_CODE',
            'type' => 'varchar',
            'len' => 50,
            'required' => true,
        )
    
    ),
    
    'relationship' => array(
    
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('Insurances','Insurances', array('default', 'assignable', ));
?>
