<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['Services'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'services',
    'unified_search' => true,
    
    'fields'  => array(
    // auto code
    
    'code' => array(
         'name'     => 'code',
         'vname'    => 'LBL_RES_CODE',
         'type'     => 'varchar',
         'len'      => 50,
         'comment'  => 'id of one restaurant',
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
      
       'tel' => array(
        'name'      => 'tel',
        'vname'     => 'LBL_RES_TEL',
        'type'      => 'phone',
        'dbType'    => 'varchar',
        'len'       => 50,
        'comment'   => 'tel of service company',
        'audited'   => true,
      ),
      // address
      
      'address' => array(
        'name'      => 'address',
        'vname'     => 'LBL_RES_ADDRESS',
        'type'      => 'text',
        'len'       => 250,
        'comment'   => 'address of restaurant',
      ), 
      
      'service_type'    => array(
        'name'  => 'service_type',
        'vname' => 'LBL_SERVICE_TYPE',
        'type'  => 'enum',
        'options' => 'service_company_dom',
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
        // custom email
    
    'email1' =>  
    array ( 
      'name' => 'email1', 
      'vname' => 'LBL_EMAIL_ADDRESS', 
      'type' => 'varchar', 
      'function' =>  
      array ( 
        'name' => 'getEmailAddressWidget', 
        'returns' => 'html', 
      ), 
      'source' => 'non-db', 
      'group' => 'email1', 
      'merge_filter' => 'enabled', 
    ), 
    
    'email2' =>  
    array ( 
      'name' => 'email2', 
      'vname' => 'LBL_OTHER_EMAIL_ADDRESS', 
      'type' => 'varchar', 
      'function' =>  
      array ( 
        'name' => 'getEmailAddressWidget', 
        'returns' => 'html', 
      ), 
      'source' => 'non-db', 
      'group' => 'email2', 
      'merge_filter' => 'enabled', 
    ), 
    'email_addresses' => array(
        'name' => 'email_addresses',
        'type' => 'link',
        'relationship' => 'service_email_addresses',
        'module' => 'EmailAddress',
        'bean_name' => 'EmailAddress',
        'source' => 'non-db',
        'vname' => 'LBL_EMAIL_ADDRESSES',
        'reportable' => false,
        'required' => true,
    ) ,
    'email_addresses_primary' => array(
        'name' => 'email_addresses_primary',
        'type' => 'link',
        'relationship' => 'service_email_addresses_primary',
        'source' => 'non-db',
        'vname' => 'LBL_EMAIL_ADDRESS_PRIMARY',
        'duplicate_merge' => 'disabled',
        'required' => true,
    ) ,
    
    ),
    'indices' => array (
     array('name' =>'idx_service_id_del', 'type' =>'index', 'fields'=>array('id', 'deleted')),
        array('name' =>'autocode' , 'type'=>'unique' , 'fields'=>array('autocode')),
        array('name' =>'code' , 'type'=>'unique' , 'fields'=>array('code')),
),
    
    'relationship' => array(
      'service_email_addresses' => 
            array(
                'lhs_module'=> "Services", 'lhs_table'=> 'services', 'lhs_key' => 'id',
                'rhs_module'=> 'EmailAddresses', 'rhs_table'=> 'email_addresses', 'rhs_key' => 'id',
                'relationship_type'=>'many-to-many',
                'join_table'=> 'email_addr_bean_rel', 'join_key_lhs'=>'bean_id', 'join_key_rhs'=>'email_address_id', 
                'relationship_role_column'=>'bean_module',
                'relationship_role_column_value'=>"Services"
            ),
        'service_email_addresses_primary' => 
            array('lhs_module'=> "Services", 'lhs_table'=> 'services', 'lhs_key' => 'id',
                'rhs_module'=> 'EmailAddresses', 'rhs_table'=> 'email_addresses', 'rhs_key' => 'id',
                'relationship_type'=>'many-to-many',
                'join_table'=> 'email_addr_bean_rel', 'join_key_lhs'=>'bean_id', 'join_key_rhs'=>'email_address_id', 
                'relationship_role_column'=>'primary_address', 
                'relationship_role_column_value'=>'1'
            ),
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('Services','Services', array('default', 'assignable', ));
?>
