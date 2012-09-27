<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['Transport'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'transports',
    'unified_search' => true,
    
    'fields'  => array(    
        'address'  => array(
          'name' => 'address',
          'vname' => 'LBL_ADDRESS',
          'type'  => 'varchar',
          'comment' => 'address of the guides',
        ),
    
    'phone' => array(
        'name'      => 'phone',
        'vname'     => 'LBL_PHONE',
        'type'      => 'varchar',
        'len'       => 50,
        'options'   => 'number phone of the guides',
    
    ),
    
    // transport type
    
    'type' => array(
         'name'     =>  'type',
         'vname'    =>  'LBL_TYPE',
         'type'     =>   'enum',
         'options'  => 'transport_dom2',
         'comments'     => 'type of transport'  ,
    ),
    
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
        'relationship' => 'transport_email_addresses',
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
        'relationship' => 'transport_email_addresses_primary',
        'source' => 'non-db',
        'vname' => 'LBL_EMAIL_ADDRESS_PRIMARY',
        'duplicate_merge' => 'disabled',
        'required' => true,
    ) ,
    
    
   'code' => array(
          'name'    => 'code',
          'vname'   => 'LBL_TRANSPORT_CODE',
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
    'contracts' =>
      array (
        'name' => 'contracts',
        'type' => 'link',
        'relationship' => 'transport_contracts',
        'module'=>'Contracts',
        'bean_name'=>'Contract',
        'source'=>'non-db',
            'vname'=>'LBL_CALLS',
      ),
      
     'area' => array(
        'name'  => 'area',
        'vname' => 'LBL_AREA',
        'type'  => 'enum',
        'options'   => 'khachsan_area',
      ),
    
    ),
      
    
    'indices' => array (
        array('name' =>'idx_transport_id_del', 'type' =>'index', 'fields'=>array('id', 'deleted')),
        array('name' =>'autocode' , 'type'=>'unique' , 'fields'=>array('autocode')),
        array('name' =>'code' , 'type'=>'unique' , 'fields'=>array('code')),
     ),
    
    'relationship' => array(
    
    'transport_email_addresses' => 
            array(
                'lhs_module'=> "Transports", 'lhs_table'=> 'transpots', 'lhs_key' => 'id',
                'rhs_module'=> 'EmailAddresses', 'rhs_table'=> 'email_addresses', 'rhs_key' => 'id',
                'relationship_type'=>'many-to-many',
                'join_table'=> 'email_addr_bean_rel', 'join_key_lhs'=>'bean_id', 'join_key_rhs'=>'email_address_id', 
                'relationship_role_column'=>'bean_module',
                'relationship_role_column_value'=>"Transports"
            ),
        'transport_email_addresses_primary' => 
            array('lhs_module'=> "Transports", 'lhs_table'=> 'transports', 'lhs_key' => 'id',
                'rhs_module'=> 'EmailAddresses', 'rhs_table'=> 'email_addresses', 'rhs_key' => 'id',
                'relationship_type'=>'many-to-many',
                'join_table'=> 'email_addr_bean_rel', 'join_key_lhs'=>'bean_id', 'join_key_rhs'=>'email_address_id', 
                'relationship_role_column'=>'primary_address', 
                'relationship_role_column_value'=>'1'
            ),
    // contracts 
     'transport_contracts' => array('lhs_module'=> 'Transports', 'lhs_table'=> 'transports', 'lhs_key' => 'id',
                              'rhs_module'=> 'Contracts', 'rhs_table'=> 'contracts', 'rhs_key' => 'parent_id',
                              'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
                              'relationship_role_column_value'=>'Transports'
                              ),
    
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('Transports','Transport', array('default', 'assignable', ));
?>
