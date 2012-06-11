<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['Destination'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'destinations',
    'unified_search' => true,
    
    'fields'  => array(
        'area_code' => array(
            'name' => 'area_code',
            'vname' => 'LBL_AREA_CODE',
            'type'  => 'varchar',
            'len'   =>10,
        ),
        'address'  => array(
          'name' => 'address',
          'vname' => 'LBL_ADDRESS',
          'type'  => 'varchar',
          'comment' => 'address of destination',
        ),
    
    'area' => array(
        'name'      => 'area',
        'vname'     => 'LBL_AREA',
        'type'      => 'enum',
        'options'   => 'khachsan_area',
    
    ),
    
    'city_province' => array(
        'name'      => 'city_province',
        'vname'     => 'LBL_CITY_PROVINCE',
        'type'      => 'enum',
        'options'   => 'city_province_dom'
    ),
     'country'    => array(
            'required' => false,
            'name' => 'country',
            'vname' => 'LBL_COUNTRY_NAME',
            'type' => 'enum',
            'options'   => 'countries_dom',
          ),
    /*'picture' => 
      array (
        'required' => false,
        'name' => 'picture',
        'vname' => 'LBL_PICTURE',
        'type' => 'photo',
        'massupdate' => 0,
        'comments' => 'The picture of destination',
        'help' => '',
        'importable' => 0,
        'duplicate_merge' => 0,
        'duplicate_merge_dom_value' => 0,
        'audited' => false,
        'reportable' => 0,
        'len' => 255,
        'size' => '20',
        'dbType' => 'varchar',
        'studio' => 'visible',
        'max_width' => '150',
        'max_height' => '300',
        'style' => '',
      ),*/  
      
      
'uploadfile' =>
  array (
     'name'=>'uploadfile',
     'vname' => 'LBL_PICTURE',
     'type'  => 'varchar',
     'source' => 'non-db',  
  ),
'image' => 
  array (
    'required' => false,
    'name'  => 'image',
    'vname' => '',
    'type'  => 'varchar',
    'len'   => 255,
  ),
  
  'picture' => 
      array (
        'required' => false,
        'name' => 'picture',
        'vname' => 'Picture',
        'type' => 'html',
        'massupdate' => 0,
      ),
      
      'code'    => array(
        'name'  => 'code',
        'vname' => 'LBL_CODE',
        'type'  => 'varchar',
        'len'   => 250,
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
    
    ),
    
    'indices' => array (
        array('name' =>'idx_des_id_del', 'type' =>'index', 'fields'=>array('id', 'deleted')),
        array('name' =>'autocode' , 'type'=>'unique' , 'fields'=>array('autocode')),
        array('name' =>'code' , 'type'=>'unique' , 'fields'=>array('code')),
     ),
    
    'relationship' => array(
    
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('Destinations','Destination', array('default', 'assignable', ));
?>
