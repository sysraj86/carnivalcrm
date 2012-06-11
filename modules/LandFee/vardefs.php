<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['LandFee'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'landfee',
    'unified_search' => true,
    
    'fields'  => array(
    
        'phone' =>  array(
          'name'    => 'phone',
          'vname'   => 'LBL_PHONE',
          'type'    => 'phone',
          'dbType'  => 'varchar',
          'len'     => 50,
        ),
        
        'area'  => array(
            'name'      => 'area',
            'vname'     => 'LBL_AREA',
            'type'      => 'enum',
            'options'   => 'area_dom',
        ),
        
        'landfee_service' => array(
          'name'        => 'landfee_service',
          'vname'       => 'LBL_LANDFEE_SERVICE',
          'type'        => 'enum',
          'options'     => 'landfee_service_dom',
        ),
        
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
        'relationship' => 'landfee_email_addresses',
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
        'relationship' => 'landfee_email_addresses_primary',
        'source' => 'non-db',
        'vname' => 'LBL_EMAIL_ADDRESS_PRIMARY',
        'duplicate_merge' => 'disabled',
        'required' => true,
    ) ,
    
    ),
    
    'relationship' => array(
        'landfee_email_addresses' => 
            array(
                'lhs_module'=> "LandFee", 'lhs_table'=> 'landfee', 'lhs_key' => 'id',
                'rhs_module'=> 'EmailAddresses', 'rhs_table'=> 'email_addresses', 'rhs_key' => 'id',
                'relationship_type'=>'many-to-many',
                'join_table'=> 'email_addr_bean_rel', 'join_key_lhs'=>'bean_id', 'join_key_rhs'=>'email_address_id', 
                'relationship_role_column'=>'bean_module',
                'relationship_role_column_value'=>"LandFee"
            ),
        'landfee_email_addresses_primary' => 
            array('lhs_module'=> "LandFee", 'lhs_table'=> 'landfee', 'lhs_key' => 'id',
                'rhs_module'=> 'EmailAddresses', 'rhs_table'=> 'email_addresses', 'rhs_key' => 'id',
                'relationship_type'=>'many-to-many',
                'join_table'=> 'email_addr_bean_rel', 'join_key_lhs'=>'bean_id', 'join_key_rhs'=>'email_address_id', 
                'relationship_role_column'=>'primary_address', 
                'relationship_role_column_value'=>'1'
            ),
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('LandFee','LandFee', array('default', 'assignable', ));
?>
