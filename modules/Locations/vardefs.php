<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['Location'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'locations',
    'unified_search' => true,
    
    'fields'  => array(
        
        
    'country_id' => 
      array (
        'required' => false,
        'name' => 'country_id',
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
      'country_name' => 
      array (
        'required' => false,
        'source' => 'non-db',
        'name' => 'country_name',
        'vname' => 'LBL_COUNTRY_NAME',
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
        'id_name' => 'country_id',
        'ext2' => 'Countries',
        'module' => 'Countries',
        'rname' => 'name',
        'quicksearch' => 'enabled',
        'studio' => 'visible',
      ),
      
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
        'vname' => 'LBL_PICTURE',
        'type'  => 'varchar',
        'len'   => 255,
      ),
      
      'picture' => 
      array (
        'required' => false,
        'name' => 'picture',
        'vname' => 'LBL_PICTURE',
        'type' => 'html',
        'massupdate' => 0,
      ),
      
        'code' => array(
          'name'    => 'code',
          'vname'   => 'LBL_CODE',
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
     
        'address'  => array(
          'name' => 'address',
          'vname' => 'LBL_ADDRESS',
          'type'  => 'varchar',
          'comment' => 'address of destination',
        ),
        
        'phone' =>  array(
          'name'    => 'phone',
          'vname'   => 'LBL_PHONE',
          'type'    => 'phone',
          'dbType'  => 'varchar',
          'len'     => 100,
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
        'relationship' => 'location_email_addresses',
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
        'relationship' => 'location_email_addresses_primary',
        'source' => 'non-db',
        'vname' => 'LBL_EMAIL_ADDRESS_PRIMARY',
        'duplicate_merge' => 'disabled',
        'required' => true,
    ) , 
    
   'department' => array( 
    'name' => 'department',
    'type' => 'enum',
    'options' => 'deparment_dom',
    'vname' => 'LBL_DEPARTMENT',   
     ),
    ),
    
    'indices' => array (
        array('name' =>'idx_localtion_id_del', 'type' =>'index', 'fields'=>array('id', 'deleted')),
        array('name' =>'autocode' , 'type'=>'unique' , 'fields'=>array('autocode')),
        array('name' =>'code' , 'type'=>'unique' , 'fields'=>array('code')),
     ),
    
    'relationship' => array(
         'location_email_addresses' => 
            array(
                'lhs_module'=> "Locations", 'lhs_table'=> 'locations', 'lhs_key' => 'id',
                'rhs_module'=> 'EmailAddresses', 'rhs_table'=> 'email_addresses', 'rhs_key' => 'id',
                'relationship_type'=>'many-to-many',
                'join_table'=> 'email_addr_bean_rel', 'join_key_lhs'=>'bean_id', 'join_key_rhs'=>'email_address_id', 
                'relationship_role_column'=>'bean_module',
                'relationship_role_column_value'=>"Locations"
            ),
        'location_email_addresses_primary' => 
            array('lhs_module'=> "Locations", 'lhs_table'=> 'locations', 'lhs_key' => 'id',
                'rhs_module'=> 'EmailAddresses', 'rhs_table'=> 'email_addresses', 'rhs_key' => 'id',
                'relationship_type'=>'many-to-many',
                'join_table'=> 'email_addr_bean_rel', 'join_key_lhs'=>'bean_id', 'join_key_rhs'=>'email_address_id', 
                'relationship_role_column'=>'primary_address', 
                'relationship_role_column_value'=>'1'
            ),
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('Locations','Location', array('default', 'assignable', ));
?>
