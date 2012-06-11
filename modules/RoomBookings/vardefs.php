<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['RoomBookings'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'roombookings',
    'unified_search' => true,
    
    'fields'  => array(
       
       'code' => array(
          'name'    => 'code',
          'vname'   => 'LBL_ROOM_CODE',
          'type'    => 'varchar',
          'len'     => 150,
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
     
     'hotel_address'  => array(
       'name'   => 'hotel_address',
       'vname'  => 'LBL_RES_ADDRESS',
       'type'   => 'text',
     ),
     
     'attn_hotel_name' => array(
        'name'  => 'attn_hotel_name',
        'vname' => 'LBL_ATTN_HOTEL_NAME',
        'type'  => 'varchar',
        'required'  => true,
        'len'   => 250,
     ) ,
      
     'attn_hotel_name_id'   => array(
        'name'      => 'attn_hotel_name_id',
        'vname'     => 'LBL_ATTN_HOTEL_NAME_ID',
        'type'      => 'id',
     ),
     
     
     'attn_hotel_phone' => array(
       'name'   => 'attn_hotel_phone',
       'vname'  => 'LBL_ATTN_HOTEL_PHONE',
       'type'   => 'phone',
       'dbType' => 'varchar',
       'require'   => true,
       'len'    => 50,
     ),
     
     'hotel_tel'  => array(
       'name'   => 'hotel_tel',
       'vname'  => 'LBL_HOTEL_TEL',
       'type'   => 'phone',
       'dbType' => 'varchar',
       'len'    => 50,
     ),
     
     'hotel_fax'    => array(
       'name'   => 'hotel_fax',
       'vname'  => 'LBL_HOTEL_FAX',
       'type'   => 'phone',
       'dbType' => 'varchar',
       'len'    => 50,
     ),
     
     'company' =>  array(
        'name'      => 'company',
        'vname'     => 'LBL_FROM',
        'type'      => 'varchar',
        'len'       => 255,
     ),
     
     'attn_name'    => array(
       'name'   => 'attn_name',
       'vname'  => 'LBL_ATTN_NAME',
       'type'   => 'varchar',
       'len'    => 250,
     ),
     
     'attn_phone'   => array(
        'name'  => 'attn_phone',
        'vname' => 'LBL_ATTN_PHONE',
        'type'  => 'phone',
        'dbType'    => 'varchar',
        'len'   => 50,
     ),
     
     'attn_id'  => array(
       'name'   => 'attn_id',
       'vname'  => 'LBL_ATTN_ID',
       'type'   => 'id',
     ),
     
     'attn_email'   => array(
       'name'       => 'attn_email',
       'vname'      => 'LBL_EMAIL',
       'type'       => 'varchar',
       'len'        => 255,
     ),
     
     'attn_tel' => array(
       'name'   => 'attn_tel',
       'vname'  => 'LBL_TEL',
       'type'   => 'phone',
       'dbType' => 'varchar',
       'len'    => 50,
     ),
     
     'attn_fax' => array(
       'name'   => 'attn_fax',
       'vname'  => 'LBL_FAX',
       'type'   => 'phone',
       'dbType' => 'varchar',
       'len'    => 50,
     ),
     
     'nationlity'   => array(
       'name'       => 'nationlity',
       'vname'      => 'LBL_NATIONLITY',
       'type'       => 'enum',
       'options'    => 'countries_dom',
     ),
     
   'confirm' => 
    array (
      'name' => 'confirm',
      'vname' => 'LBL_CONFIRM',
      'dbType'  => 'tinyint',
      'len'     => 1,
      'type' => 'radioenum',
      'comments' => '',
      'help' => '',
      'default' => '',
      'duplicate_merge' => 'disabled',
      'options' => 'confirm_list',
    ),
    
    'convention'    => array(
      'name'  => 'convention',
      'vname'   => 'LBL_CONVENTION',
      'type'    => 'text',
    ),
    
    'cost'  => array(
      'name'    => 'cost',
      'vname'   => 'LBL_COST',
      'type'    => 'varchar',
      'len'     => 255,
    ),
    
    'include'   => array(
      'name'    => 'include',
      'vname'   => 'LBL_INCLUDE',
      'type'    => 'text',
    ),
    
    'dining_plan'   => array(
      'name'    => 'dining_plan',
      'vname'   => 'LBL_DINING_PLAN',
      'type'    => 'text',
    ),
    'date'  => array(
        'name' => 'date' ,
        'vname' => 'LBL_DATE',
        'type'  => 'date',
        'display_default'   => 'now' ,
    ) ,
    
   'deparment'  => array(
     'name'     => 'deparment',
     'vname'    => 'LBL_DEPARMENT',
     'type'     => 'varchar',
     'len'      => 255,
   ),
   

    'deadline'  => array(
        'name' => 'deadline' ,
        'vname' => 'LBL_DEADLINE',
        'type'  => 'date',
        'display_default'   => '' ,
    ) ,
    'gia'   => array(
        'name'  => 'gia',
        'vname' => 'LBL_GIA',
        'type'  => 'currency',
        'dbType' => 'decimal',
        'len'   => 18,
        'precision' => 2,
    ),
   ),
    
    'indices' => array (
        array('name' =>'idx_room_id_del', 'type' =>'index', 'fields'=>array('id', 'deleted')),
        array('name' =>'autocode' , 'type'=>'unique' , 'fields'=>array('autocode')),
        array('name' =>'code' , 'type'=>'unique' , 'fields'=>array('code')),
     ),
    
    'relationship' => array(
    
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('RoomBookings','RoomBookings', array('default', 'assignable', ));
?>
        
