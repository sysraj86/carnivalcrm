<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['RestaurantBookings'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'restaurantbookings',
    'unified_search' => true,
    
    'fields'  => array(
       
       'code' => array(
          'name'    => 'code',
          'vname'   => 'LBL_CODE',
          'type'    => 'varchar',
          'len'     => 150,
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
     'res_address'  => array(
       'name'   => 'res_address',
       'vname'  => 'LBL_RES_ADDRESS',
       'type'   => 'text',
     ),
     
     'attn_res_name' => array(
        'name'  => 'attn_res_name',
        'vname' => 'LBL_ATTN_RES_NAME',
        'type'  => 'varchar',
        'required'  => true,
        'len'   => 250,
     ) ,
      
     'attn_res_name_id'   => array(
        'name'      => 'attn_res_name_id',
        'vname'     => 'LBL_ATTN_RES_NAME_ID',
        'type'      => 'id',
     ),
     
     
     'attn_res_phone' => array(
       'name'   => 'attn_res_phone',
       'vname'  => 'LBL_ATTN_RES_PHONE',
       'type'   => 'phone',
       'dbType' => 'varchar',
       'require'   => true,
       'len'    => 50,
     ),
     
     'res_tel'  => array(
       'name'   => 'res_tel',
       'vname'  => 'LBL_RES_TEL',
       'type'   => 'phone',
       'dbType' => 'varchar',
       'len'    => 50,
     ),
     
     'res_fax'    => array(
       'name'   => 'res_fax',
       'vname'  => 'LBL_RES_FAX',
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
     
     'notes'  => array(
      'name'    => 'notes',
      'vname'   => 'LBL_NOTES',
      'type'    => 'text',
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
   
    'date_time' => array(
      'name'    => 'date_time',
      'vname'   => 'LBL_DATE_TIME',
      'type'    => 'varchar',
      'len'     => 150,
    ),

    'operating_date' => array(
      'name'    => 'operating_date',
      'vname'   => 'LBL_OPERATING_DATE',
      'type'    => 'date',
    ),

    'quantity_pax'  => array(
        'name'      => 'quantity_pax',
        'vname'     => 'LBL_QUANTITY_PAX',
        'type'      => 'varchar',
        'len'       => 250,
    ),

    'guide'     => array(
      'name'    => 'guide',
      'vname'   => 'LBL_GUIDE',
      'type'    => 'varchar',
      'len'     => 250,
    ),

    'guide_id' => array(
      'name'    => 'guide_id',
      'vname'   => 'LBL_GUIDE_ID',
      'type'    => 'id',
    ),

    'guide_phone'   =>  array(
      'name'    => 'guide_phone',
      'vname'   => 'LBL_GUIDE_PHONE',
      'type'    => 'phone',
      'dbType'  => 'varchar',
      'len'     => 50,
    ),
   
   'type'   => array(
     'name'     => 'type',
     'vname'    => 'LBL_TYPE',
     'type'     => 'enum',
     'options'  => 'service_booking_dom',
   ),
    'deadline'  => array(
        'name' => 'deadline' ,
        'vname' => 'LBL_DEADLINE',
        'type'  => 'date',
        'display_default'   => '' ,
        'enable_range_search' => true,
        'options' => 'date_range_search_dom'
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
        array('name' =>'idx_service_id_del', 'type' =>'index', 'fields'=>array('id', 'deleted')),
        array('name' =>'autocode' , 'type'=>'unique' , 'fields'=>array('autocode')),
        array('name' =>'code' , 'type'=>'unique' , 'fields'=>array('code')),
     ),
    
    'relationship' => array(
    
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('RestaurantBookings','RestaurantBookings', array('default', 'assignable', ));
?>
