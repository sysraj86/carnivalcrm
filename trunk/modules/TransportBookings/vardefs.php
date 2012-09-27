<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['TransportBookings'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'transportbookings',
    'unified_search' => true,
    
    'fields'  => array(
        'code' => array(
          'name'    => 'code',
          'vname'   => 'LBL_SERVICE_CODE',
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
/*        'transports_id'    => array(
            'name'  => 'transports_id',
            'vname' => '',
            'type'  => 'id',
        ),
        'transports'    => array(
        'name'  => 'transports',
        'vname' => 'LBL_TRANSPORT',
        'type'  => 'id',
        ),*/
        'address' => array(
          'name'     => 'address',
          'vname'    => 'LBL_ADDRESS',
          'type'     => 'varchar',
          'len'      => 255,
        ),
        'attn_to_name_id'    => array(
            'name'  => 'attn_to_name_id',
            'vname' => '',
            'type'  => 'id',
        ),
        'attn_to_name' => array(
          'name'     => 'attn_to_name',
          'vname'    => 'LBL_ATTN',
          'type'     => 'varchar',
          'len'      => 255,
        ),
        
        'attn_to_phone' => array(
          'name'     => 'attn_to_phone',
          'vname'    => '',
          'type'     => 'varchar',
          'len'      => 255,
        ),
         'tel_to' => array(
          'name'     => 'tel_to',
          'vname'    => 'LBL_TEL',
          'type'     => 'varchar',
          'len'      => 50,
        ),
        'fax_to' => array(
          'name'     => 'fax_to',
          'vname'    => 'LBL_FAX',
          'type'     => 'varchar',
          'len'      => 50,
        ),
        
        'from_co' => array(
          'name'     => 'from_co',
          'vname'    => 'LBL_FROM_CO',
          'type'     => 'varchar',
          'len'      => 255,
        ),
        'attn_from_name_id'    => array(
            'name'  => 'attn_from_name_id',
            'vname' => '',
            'type'  => 'id',
        ),
        
        'attn_from_name' => array(
          'name'     => 'attn_from_name',
          'vname'    => 'LBL_ATTN',
          'type'     => 'varchar',
          'len'      => 255,
        ),
        
        'attn_from_phone' => array(
          'name'     => 'attn_from_phone',
          'vname'    => '',
          'type'     => 'varchar',
          'len'      => 255,
        ),
        
        'email' => array(
          'name'     => 'email',
          'vname'    => 'LBL_EMAIL',
          'type'     => 'varchar',
          'len'      => 255,
        ),
        
        'tel_from' => array(
          'name'     => 'tel_from',
          'vname'    => 'LBL_TEL',
          'type'     => 'varchar',
          'len'      => 50,
        ),
        'fax_from' => array(
          'name'     => 'fax_from',
          'vname'    => 'LBL_FAX',
          'type'     => 'varchar',
          'len'      => 50,
        ),
        'vat' => array(
          'name'     => 'vat',
          'vname'    => '',
          'type'     => 'int',
        ),
         'confirm'    => array(
            'name'  => 'confirm',
            'vname' => 'LBL_CONFIRM',
            'type'  => 'radioenum',
            'len' => 1,
            'size'  => '20',
            'default' => '',
            'options'   => 'confirm_list',
            'dbType'  => 'tinyint',
        ),
        'date' => array(
            'name' => 'date',
            'vname' => 'LBL_DATE',
            'type' => 'date',
        ),
        
        'operator' => array(
          'name'     => 'operator',
          'vname'    => 'LBL_OPERATOR',
          'type'     => 'varchar',
          'len'      => 50,
        ),
         'require_transports' => 
          array (
            'required' => false,
            'name' => 'require_transports',
            'vname' => 'LBL_REQUIRE',
            'type' => 'text',
            'massupdate' => 0,
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'size' => '20',
            'studio' => 'visible',
            'rows' => '8',
            'cols' => '120',
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
    
    'relationship' => array(
    
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('TransportBookings','TransportBookings', array('default', 'assignable', ));
?>
