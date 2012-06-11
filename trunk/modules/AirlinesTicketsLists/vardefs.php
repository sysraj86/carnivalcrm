<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['AirlinesTicketsLists'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'AirlinesTicketsLists',
    'unified_search' => true,
    
    'fields'  => array(  
         'code' => array(
            'required' => false,
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

         'autocode' =>
         array(
            'required' => true,
            'name' => 'autocode',
            'type' => 'int',
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
    'type' => 
          array (
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
            'options' => 'airline_type_dom',
            'studio' => 'visible',
          ),
         

    
    ),
    
    'indices' => array (
    
),
    
    'relationship' => array(
        
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('AirlinesTicketsLists','AirlinesTicketsLists', array('default', 'assignable', ));
?>
