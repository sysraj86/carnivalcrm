<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['TravelGuide'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'travelguides',
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
          'type'  => 'text',
          'comment' => 'address of the guides',
        ),
    
    'phone' => array(
        'name'      => 'phone',
        'vname'     => 'LBL_PHONE',
        'type'      => 'varchar',
        'options'   => 'number phone of the guides',
    
    ),
    
    'birthday'  => array(
       'name'   => 'birthday',
       'vname'  => 'LBL_BIRTHDAY',
       'type'   => 'date',
    ),
    'passport_no'   => array(
      'name'    => 'passport_no',
      'vname'   => 'LBL_PASSPORT_NO',
      'type'    => 'varchar',
      'len'     => 50,
    ),
    'date_issued'   => array(
      'name'    => 'date_issued',
      'vname'   => 'LBL_DATE_ISSUED',
      'type'    => 'date',
    ),
    
    'place_issued'  => array(
       'name'   => 'place_issued',
       'vname'  => 'LBL_PLACE_ISSUED',
       'type'   => 'varchar',
       'len'    => 250,
    ),
    'birthplace'    => array(
      'name'    => 'birthplace',
      'vname'   => 'LBL_BIRTHPLACE',
      'type'    => 'varchar',
      'len'     => 250,
    ),
    'expiration_date' => array(
     'name'     => 'expiration_date',
     'vname'    => 'LBL_EXPIRATION_DATE',
     'type'     => 'date',
   ),
   'passport_status' => array(
     'name'     => 'passport_status',
     'vname'    => 'LBL_PASSPORT_STATUS',
     'type'     => 'enum',
     'options'  => 'passport_status_dom',
   ),
    'card_no'   => array(
      'name'    => 'card_no',
      'vname'   => 'LBL_CARD_NO',
      'type'    => 'varchar',
      'len'     => 50,
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
        'relationship' => 'travelguides_email_addresses',
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
        'relationship' => 'travelguides_email_addresses_primary',
        'source' => 'non-db',
        'vname' => 'LBL_EMAIL_ADDRESS_PRIMARY',
        'duplicate_merge' => 'disabled',
        'required' => true,
    ) ,
    
    'contracts' =>
      array (
        'name' => 'contracts',
        'type' => 'link',
        'relationship' => 'travelguide_contracts',
        'module'=>'Contracts',
        'bean_name'=>'Contract',
        'source'=>'non-db',
            'vname'=>'LBL_CALLS',
      ),

    ),
    
    'relationship' => array(
    
    // contract relationship
        'travelguide_contracts' => array('lhs_module'=> 'TravelGuides', 'lhs_table'=> 'travelguides', 'lhs_key' => 'id',
                              'rhs_module'=> 'Contracts', 'rhs_table'=> 'contracts', 'rhs_key' => 'parent_id',
                              'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
                              'relationship_role_column_value'=>'TravelGuides'),
    
    'travelguides_email_addresses' => 
            array(
                'lhs_module'=> "TravelGuides", 'lhs_table'=> 'travelguides', 'lhs_key' => 'id',
                'rhs_module'=> 'EmailAddresses', 'rhs_table'=> 'email_addresses', 'rhs_key' => 'id',
                'relationship_type'=>'many-to-many',
                'join_table'=> 'email_addr_bean_rel', 'join_key_lhs'=>'bean_id', 'join_key_rhs'=>'email_address_id', 
                'relationship_role_column'=>'bean_module',
                'relationship_role_column_value'=>"TravelGuides"
            ),
        'travelguides_email_addresses_primary' => 
            array('lhs_module'=> "TravelGuides", 'lhs_table'=> 'travelguides', 'lhs_key' => 'id',
                'rhs_module'=> 'EmailAddresses', 'rhs_table'=> 'email_addresses', 'rhs_key' => 'id',
                'relationship_type'=>'many-to-many',
                'join_table'=> 'email_addr_bean_rel', 'join_key_lhs'=>'bean_id', 'join_key_rhs'=>'email_address_id', 
                'relationship_role_column'=>'primary_address', 
                'relationship_role_column_value'=>'1'
            ),
            
        
    
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('TravelGuides','TravelGuide', array('default', 'assignable', ));
?>
