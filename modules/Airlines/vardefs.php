<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['Airline'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'airlines',
    'unified_search' => true,
    
    'fields'  => array(  
    
        'phone'    => array(
            'name'      => 'phone',
            'vname'     => 'LBL_PHONE',
            'type'      => 'varchar',
        ),
        
        // custom email
    
    'email1' =>  
    array ( 
      'name' => 'email1', 
      'vname' => 'LBL_EMAIL', 
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
        'relationship' => 'arilines_email_addresses',
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
        'relationship' => 'airlines_email_addresses_primary',
        'source' => 'non-db',
        'vname' => 'LBL_EMAIL_ADDRESS_PRIMARY',
        'duplicate_merge' => 'disabled',
        'required' => true,
    ) ,
    
    
    'code'  => array(
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
      
      'area' => array(
        'name'  => 'area',
        'vname' => 'LBL_AREA',
        'type'  => 'enum',
        'options'   => 'khachsan_area',
      ),
    
    ),
    
    'indices' => array (
     array('name' =>'idx_air_id_del', 'type' =>'index', 'fields'=>array('id', 'deleted')),
        array('name' =>'auto_id' , 'type'=>'unique' , 'fields'=>array('auto_id')),
        array('name' =>'air_code' , 'type'=>'unique' , 'fields'=>array('air_code')),
),
    
    'relationship' => array(
        'arilines_email_addresses' => 
            array(
                'lhs_module'=> "Airlines", 'lhs_table'=> 'airlines', 'lhs_key' => 'id',
                'rhs_module'=> 'EmailAddresses', 'rhs_table'=> 'email_addresses', 'rhs_key' => 'id',
                'relationship_type'=>'many-to-many',
                'join_table'=> 'email_addr_bean_rel', 'join_key_lhs'=>'bean_id', 'join_key_rhs'=>'email_address_id', 
                'relationship_role_column'=>'bean_module',
                'relationship_role_column_value'=>"Airlines"
            ),
        'airlines_email_addresses_primary' => 
            array('lhs_module'=> "Airlines", 'lhs_table'=> 'airlines', 'lhs_key' => 'id',
                'rhs_module'=> 'EmailAddresses', 'rhs_table'=> 'email_addresses', 'rhs_key' => 'id',
                'relationship_type'=>'many-to-many',
                'join_table'=> 'email_addr_bean_rel', 'join_key_lhs'=>'bean_id', 'join_key_rhs'=>'email_address_id', 
                'relationship_role_column'=>'primary_address', 
                'relationship_role_column_value'=>'1'
            ),
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('Airlines','Airline', array('default', 'assignable', ));
?>
