<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['GuideContracts'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'guidecontracts',
    'unified_search' => true,
    
    'fields'  => array(
        'number'    => array(
          'name'    => 'number',
          'vname'   => 'LBL_NUMBER',
          'type'    => 'varchar',
          'required'   => true,
          'len'     => 50,
        ),
        
        'date'  => array(
          'name'    => 'date',
          'vname'   => 'LBL_DATE',
          'type'    => 'varchar',
          'len'     => 2,
          'required'    => true, 
        ),
         'months'  => array(
          'name'    => 'months',
          'vname'   => 'LBL_MONTH',
          'type'    => 'varchar',
          'len'     => 2,
          'required'    => true, 
        ),
                
        'year'  => array(
          'name'    => 'year',
          'vname'   => 'LBL_YEAR',
          'type'    => 'varchar',
          'len'     => 5,
          'required'    => true,  
        ),
        
        'company_name'  => array(
          'name'        => 'company_name',
          'vname'       => 'LBL_COMPANY_NAME',
          'type'        => 'varchar',
          'len'         => 250,
          'required'    => true,
        ),
        
        'address_a' => array(
          'name'    => 'address_a',
          'vname'   => 'LBL_ADDRESS',
          'type'    => 'text',
        ),
        
        'phone_a'  => array(
          'name'    => 'phone_a',
          'vname'   => 'LBL_PHONE',
          'type'    => 'phone',
          'dbType'  => 'varchar',
          'len'     => 50
        ),
        'salutation'    => array(
          'name'   => 'salutation',
          'vname'   => 'LBL_SALUTATION',
          'type'    => 'enum',
          'options' => 'xung_ho_dom',
        ),
        
        'representing_a'   => array(
          'name'    => 'representing_a',
          'vname'   => 'LBL_REPRESENTING_A',
          'type'    => 'varchar',
          'required' => true,
          'len'     => 255,
        ),
        
        'birthday'  => array(
          'name'    => 'birthday',
          'vname'   => 'LBL_BIRTHDAY',
          'type'    => 'date',
        ),
        
        'passport_no'   => array(
          'name'    => 'passport_no',
          'vname'   => 'LBL_PASSPORT_NO',
          'type'    => 'varchar',
          'len'     => 150,
        ),
        
        'phone_b'   => array(
          'name'    => 'phone_b',
          'vname'   => 'LBL_PHONE',
          'type'    => 'phone',
          'dbType'  => 'varchar',
          'len'     => 50,
        ),
        
        'address_b' => array(
          'name'    => 'address_b',
          'vname'   => 'LBL_ADDRESS',
          'type'    => 'text',
        ),
        'tour_name' => array(
          'name'    => 'tour_name',
          'vname'   => 'LBL_TOUR_NAME',
          'type'    => 'varchar',
          'len'     => 250,
        ),
        'tour_id'   =>  array(
          'name'    => 'tour_id',
          'vname'   => 'LBL_TOUR_ID',
          'type'    => 'id',
        ),
        
        'date_start'   => array(
          'name'    => 'date_start',
          'vname'   => 'LBL_DATE_START',
          'type'    => 'date',
        ),
        
        'date_end'   => array(
          'name'    => 'date_end',
          'vname'   => 'LBL_DATE_END',
          'type'    => 'date',
        ),
        
        'journey'   => array(
          'name'    => 'journey',
          'vname'   => 'LBL_JOURNEY',
          'type'    => 'varchar',
        ),
        
        'partner'   => array(
          'name'    => 'partner',
          'vname'   => 'LBL_PARTNER',
          'type'    => 'enum',
          'options' => 'partner_dom',
        ),
        'bonus' => array(
          'name'    => 'bonus',
          'vname'   => 'LBL_BONUS',
          'type'    => 'int',
          'len'     => 10,
        ),
        
        'currency'  => array(
          'name'    => 'currency',
          'vname'   => 'LBL_CURRENCY',
          'type'    => 'enum',
          'options' => 'currency_dom',
        ),
        'num_of_date'   => array(
          'name'    => 'num_of_date',
          'vname'   => 'LBL_NUM_OF_DATE',
          'type'    => 'int',
          'len'     => 10,
        ),
        'total_bonus'   => array(
          'name'    => 'total_bonus',
          'vname'   => 'LBL_TOTAL_BONUS',
          'type'    => 'currency',
          'dbType'  => 'double',
        ),
        'inword'    => array(
          'name'    => 'inword',
          'vname'   => 'LBL_INWORD',
          'type'    => 'text',
        ),
        
        'expiration_date'   => array(
          'name'    => 'expiration_date',
          'vname'   => 'LBL_EXPIRATION_DATE',
          'type'    => 'date',
        ),
        'representative_b' => array(
          'name'    => 'representative_b',
          'vname'   => 'LBL_REPRESENTATIVE_B',
          'type'    => 'varchar',
          'len'     => 250,
        ),
        'representative_a' => array(
          'name'    => 'representative_a',
          'vname'   => 'LBL_REPRESENTATIVE_A',
          'type'    => 'varchar',
          'len'     => 250,
        ),
        'fax_a' => array(
          'name'    => 'fax_a',
          'vname'   => 'LBL_FAX',
          'type'    => 'phone',
          'dbType'  => 'varchar',
          'len'     => 50,
        ),
        'date_issued'   => array(
          'name'     => 'date_issued',
          'vname'    => 'LBL_DATE_ISSUSED',
          'type'     => 'date',
        ),
        
    ),
    
    'relationship' => array(
    
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('GuideContracts','GuideContracts', array('default', 'assignable', ));
?>
