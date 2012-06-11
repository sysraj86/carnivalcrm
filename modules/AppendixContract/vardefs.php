<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['AppendixContract'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'appendixcontract',
    'unified_search' => true,
    
    'fields'  => array(
      'type' => array(
          'name'    => 'type',
          'vname'   => 'LBL_APPEND_TYPE',
          'type'    => 'varchar',
          'len'     => 10,
        ),
    
    ),
    
    'relationship' => array(
    
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('AppendixContract','AppendixContract', array('default', 'assignable', ));
?>
