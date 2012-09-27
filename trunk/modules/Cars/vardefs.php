<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['Car'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'cars',
    'unified_search' => true,
    
    'fields'  => array(
    
    'number_plates'   => array(
          'name'    => 'number_plates',
          'vname'   => 'LBL_NUMBER_PLATES',
          'type'    => 'varchar',
          'len'     => 50, 
          'required' => true,
        ),
        
    'phone' => array(
        'name'  => 'phone',
        'vname' => 'LBL_PHONE',
        'type'  => 'varchar',
        'len'   => 50,
    ),
    
    'numofseat' =>  array(
      'name'    => 'numofseat',
      'vname'   => 'LBL_NUMOFSEAT',
      'type'    => 'int',
      'len'     => 5,
    ),      
    
    'giathamkhao' => array(
          'name'    => 'giathamkhao',
          'vname'   => 'LBL_GIATHAMKHAO',
          'type'    => 'currency',
          'dbType'  => 'double',
      ),
      
      'ngaythamkhaogia' => array(
        'name'      => 'ngaythamkhaogia',
        'vname'     => 'LBL_NGAYTHAMKHAOGIA',
        'type'      => 'date',
      ),
       
      'area' => array(
        'name'  => 'area',
        'vname' => 'LBL_AREA',
        'type'  => 'enum',
        'options'   => 'khachsan_area',
      ), 
        
    'transport_id' => 
    array (
        'required' => false,
        'name' => 'transport_id',
        'vname' => '',
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
    'transport_name' => 
    array (
        'required' => false,
        'source' => 'non-db',
        'name' => 'transport_name',
        'vname' => 'LBL_TRANSPORT_NAME',
        'type' => 'relate',
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
        'id_name' => 'transport_id',
        'ext2' => 'Transports',
        'module' => 'Transports',
        'rname' => 'name',
        'quicksearch' => 'enabled',
        'studio' => 'visible',
    ),
    'driver_name' => array(
        'vname' =>'LBL_NAME',
        'name' => 'driver_name',
        'len' =>'50',
        'type' => 'varchar',
    ),    
    
    ),
    
    'relationship' => array(
    
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('Cars','Car', array('default', 'assignable', ));
?>
