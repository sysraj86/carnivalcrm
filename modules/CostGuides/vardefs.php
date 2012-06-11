<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['CostGuides'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'costguides',
    'unified_search' => true,
    
    'fields'  => array(
        'congtacphi'   => array(
          'name'    => 'congtacphi',
          'vname'   => 'LBL_CONGTACPHI',
          'type'  => 'currency',
          'dbType' => 'decimal',
          'len'   => 18,
          'precision' => 2,
        ),
        
        'chiphikhachsan'    => array(
          'name'    => 'chiphikhachsan',
          'vname'   => 'LBL_CHIPHIKHACHSAN',
          'type'  => 'currency',
          'dbType' => 'decimal',
          'len'   => 18,
          'precision' => 2,
        ),
        
        'cacbuaan'  => array(
          'name'    => 'cacbuaan',
          'vname'   => 'LBL_CACBUAAN',
          'type'  => 'currency',
          'dbType' => 'decimal',
          'len'   => 18,
          'precision' => 2,
        ),
        
        'chiphivemaybay'   => array(
            'name'  => 'chiphivemaybay',
            'vname' => 'LBL_CHIPHIVEMAYBAY',
            'type'  => 'currency',
            'dbType' => 'decimal',
            'len'   => 18,
            'precision' => 2,
        ), 
        
        'chiphivetau' => array(
          'name'    => 'chiphivetau',
          'vname'   => 'LBL_CHIPHIVETAU',
          'type'  => 'currency',
          'dbType' => 'decimal',
          'len'   => 18,
          'precision' => 2,
        ),
        
        'chiphivexe'  => array(
          'name'    => 'chiphivexe',
          'vname'   => 'LBL_CHIPHIVEXE',
          'type'  => 'currency',
          'dbType' => 'decimal',
          'len'   => 18,
          'precision' => 2,
        ),
        
        'chiphianngu' => array(
          'name'   => 'chiphianngu',
          'vname'  => 'LBL_CHIPHIANNGU',
          'type'  => 'currency',
          'dbType' => 'decimal',
          'len'   => 18,
          'precision' => 2,
        ),
        
        'area'  => array(
          'name'    => 'area',
          'vname'   => 'LBL_AREA',
          'type'    => 'enum',
          'options' => 'khachsan_area',
          'required' => true,
        ),
        
        'chihdvhalong'  =>  array(
          'name'    => 'chihdvhalong',
          'vname'   => 'LBL_CHIHDVHALONG',
          'type'  => 'currency',
          'dbType' => 'decimal',
          'len'   => 18,
          'precision' => 2,
        ),
    ),
    
    'relationship' => array(
    
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('CostGuides','CostGuides', array('default', 'assignable', ));
?>
    