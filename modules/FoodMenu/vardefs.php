<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['FoodMenu'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'foodmenu',
    'unified_search' => true,
    
    'fields'  => array(
    
    
    ),
    
    'relationship' => array(
    
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('FoodMenu','FoodMenu', array('default', 'assignable', ));
?>
