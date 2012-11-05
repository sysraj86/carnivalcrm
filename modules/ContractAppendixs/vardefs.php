<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['ContractAppendixs'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'contractappendixs',
    'unified_search' => true,
    
    'fields'  => array(  
    
        'contract'=>
          array(
              'name'=>'contract',
              'vname'=>'',
              'type'=>'id',
          ),
      'date_contract'  => array(
        'name'      => 'date_contract',
        'vname'     => 'LBL_DATE',
        'type'      => 'date',
        'len'       => 36,
    ),
        
        'tour'    => array(
            'name'  =>  'tour',
            'vname' => 'LBL_CONTRACT_VALUE',
            'type'  => 'varchar',
            'len'   => 255,
        ),
        'tour_id'    => array(
            'name'  =>  'tour_id',
            'vname' => '',
            'type'  => 'id',
        ),
      
        'number'    => array(
            'name'  =>  'number',
            'vname' => 'LBL_NUMBER',
            'type'  => 'varchar',
            'required'  => true,
            'len'   => 255,
        ),
        
        'fax'  => array(
            'name'      => 'fax',
            'vname'     => 'LBL_FAX',
            'type'      => 'varchar',
            'len'       => 50,
        ),
        
        'daidienbena' => array(
            'name' => 'daidienbena',
            'vname' => 'LBL_BEN_A' ,
            'type'  => 'varchar',
             'required' => true,
            'len'   => 255,
        ),
        'daidienbenb'    => array(
            'name'  => 'daidienbenb',
            'vname' => 'LBL_BEN_B',
            'type'  => 'varchar',
            'required' => true,
            'len'   => 255,
        ),
        
        'daidienbenb_name' => array(
          'name'    => 'daidienbenb_name',
          'vname'   => 'LBL_BEN_B_NAME',
          'type'    => 'varchar',
           'required' => true,
          'len'     => 255,
        ),
        
        'mst_bena'  => array(
            'name'  => 'mst_bena',
            'vname' => 'LBL_TAX',
            'type'  => 'varchar',
            'len'   => 50,
        ),
        
        'mst_benb'  => array(
          'name'    => 'mst_benb',
          'vname'   => 'LBL_TAX',
          'type'    => 'varchar',
          'len'     => 50,
        ),
        
        'position_a' =>array(
            'name'  => 'position_a',
            'vname' => 'LBL_POSITION',
            'type'  => 'enum',
            'options' => 'position_dom',
            'len'   => 150,
        ),
        
        'position_b'    => array(
           'name'   => 'position_b',
           'vname'  => 'LBL_POSITION',
           'type'   => 'enum',
           'options' => 'position_dom',
           'len'    => 150,
        ),
        
        'address_a' => array(
          'name'     => 'address_a',
          'vname'    => 'LBL_ADDRESS',
          'type'     => 'varchar',
          'len'      => 255,
        ),
        'address_b' => array(
            'name'     => 'address_b',
            'vname'    => 'LBL_ADDRESS',
            'type'     => 'varchar',
            'len'      => 255,
        ),
        
        'phone_a'   => array(
          'name'    => 'phone_a',
          'vname'   => 'LBL_PHONE',
          'type'    => 'varchar',
          'len'     => 50,
        ),
        
        'phone_b'   => array(
          'name'    => 'phone_b',
          'vname'   => 'LBL_PHONE',
          'type'    => 'varchar',
          'len'     => 50,
        ),
        
        'bank_address' => array(
          'name'    => 'bank_address',
          'vname'   => 'LBL_BANK_ADDRESS',
          'type'    => 'varchar',
          'len'     => 255,
        ),
        
        'bank_name'   => array(
           'name'   => 'bank_name',
           'vname'  => 'LBL_BANK_ACCOUNT',
           'type'   => 'varchar',
           'len'    => 255,
        ),
        
        'swift_code'    => array(
            'name'      => 'swift_code',
            'vname'     => 'LBL_SWIFT_CODE',
            'type'      => 'varchar',
            'len'       => 150,
        ),
        
        'account_name'  => array(
            'name'      => 'account_name',
            'vname'     => 'LBL_BANK_ACCOUNT_NAME',
            'type'      => 'varchar',
            'len'       => 255,
        ),
        
        'account_vnd'   => array(
          'name'    => 'account_vnd',
          'vname'   => 'LBL_ACCOUNT_VND',
          'type'    => 'varchar',
          'len'     => 150,
        ),
        
        'account_usd'   => array(
          'name'    => 'account_usd',
          'vname'   => 'LBL_ACCOUNT_USD',
          'type'    => 'varchar',
          'len'     => 150,
        ),
        
        'salutation_a' => array(
            'name'  => 'salutation_a',
            'vname' => 'LBL_SALUTATION',
            'type'  => 'enum',
            'len'   => 10,
            'options'   => 'xung_ho_dom',
        ),
        'salutation_b' => array(
            'name'  => 'salutation_b',
            'vname' => 'LBL_SALUTATION',
            'type'  => 'enum',
            'len'   => 10,
            'options' => 'xung_ho_dom'
        ),
        'associate' => array(
            'name'  => 'associate',
            'vname' => 'LBL_ASSOCIATE',
            'type'  => 'varchar',
            'len'   => 255,
        ),
        
        'purpose'   => array(
            'name'  => 'purpose',
            'vname' => 'LBL_PURPOSE',
            'type'  => 'varchar',
            'len'   => 255,        
        ),
        
        'start_date_contract'    => array(
            'name'  => 'start_date_contract',
            'vname' => 'LBL_START_DATE',
            'type'  => 'varchar',
            'len'   => 50,
        ),
        
        'end_date_contract'    => array(
            'name'  => 'end_date_contract',
            'vname' => 'LBL_END_DATE',
            'type'  => 'varchar',
            'len'   => 50,
        ),
        
        'date'  => array(
            'name'      => 'date',
            'vname'     => 'LBL_DATE',
            'type'      => 'date',
         //   'required'  => true,
            'len'       => 36,
        ),
        //'ngay'  => array(
//            'name'      => 'ngay',
//            'vname'     => 'LBL_NGAY',
//            'type'      => 'varchar',
//            'required'  => true,
//            'len'       => 25,
//        ),
//        
//        'thang'  => array(
//            'name'      => 'thang',
//            'vname'     => 'LBL_THANG',
//            'type'      => 'varchar',
//            'required'  => true,
//            'len'       => 25,
//        ),
//        'nam'  => array(
//            'name'      => 'nam',
//            'vname'     => 'LBL_NAM',
//            'type'      => 'varchar',
//            'required'  => true,
//            'len'       => 25,
//        ),
        
        'sl_khach'  => array(
            'name'      => 'sl_khach',
            'vname'     => 'LBL_SL_KHACH',
            'type'      => 'varchar',
            'len'       => 255,
        ),
                
        'tongtien'  => array(
            'name'  => 'tongtien',
            'vname' => 'LBL_TONGTIEN',
            'type'  => 'currency',
            'len'   => 26,6,
        ),                
        'tongtien2'  => array(
            'name'  => 'tongtien2',
            'vname' => 'LBL_TUONGDUONG',
            'type'  => 'currency',
            'len'   => 26,6,
        ),
        
        'tongthanhtoan'  => array(
            'name'  => 'tongthanhtoan',
            'vname' => 'LBL_TONGTHANHTOAN',
            'type'  => 'currency',
            'len'   => 26,6,
        ),
        
        'baogom'    => array(
            'name'  => 'baogom',
            'vname' => 'LBL_BAOGOM',
            'type'  => 'text',
        ) ,
        
        'khongbaogom'    => array(
            'name'  => 'khongbaogom',
            'vname' => 'LBL_KHONGBAOGOM',
            'type'  => 'text',
        ),
        
        'gia_tour_1' => array(
            'name'  => 'gia_tour_1',
            'vname' => 'LBL_GIATOUR',
            'type'  => 'currency',
            'len'   => 26,2,
        ),
        
        'sl_khach_1'  => array(
            'name'      => 'sl_khach_1',
            'vname'     => 'LBL_SL_KHACH',
            'type'      => 'varchar',
            'len'       => 20,
        ),
        
        'ten_nganhang'  => array(
            'name'  => 'ten_nganhang',
            'vname' => 'LBL_TEN_NGANHANG',
            'type'  => 'varchar',
            'len'   => 255,
        ),
        
        'solanthanhtoan'    => array(
          'name'    => 'solanthanhtoan',
          'vname'   => 'LBL_SOLANTHANHTOAN',
          'type'    => 'int',
        ),
                
        'bangchu'   => array(
          'name'    => 'bangchu',
          'vname'   => 'LBL_BANGCHU',
          'type'    => 'varchar',
          'size'    => '100',
          'len'     => 255,
        ),
        
        'nguoidaidienbenb' => array(
            'name'      => 'nguoidaidienbenb',
            'vname'     => 'LBL_NGUOIDAIDIENBENB',
            'type'      => 'varchar',
        ),
        
        'nguoidaidienbena' => array(
            'name'      => 'nguoidaidienbena',
            'vname'     => 'LBL_NGUOIDAIDIENBENA',
            'type'      => 'varchar',
        ),
        
        'tensanbay' => array(
            'name'  => 'tensanbay',
            'vnam'  => 'LBL_TENSANBAY',
            'type'  => 'varchar',
        ),
        'num_of_date' => array(
          'name'    => 'num_of_date',
          'vname'   => 'LBL_NUM_OF_DATE',
          'type'    => 'int',
          'len'     => 10,
        ),
        
        'num_of_night'  => array(
          'name'    => 'num_of_night',
          'vname'   => 'LBL_NUM_OF_NIGHT',
          'type'    => 'int',
          'len'     => 10,
        ),
        
        'trepercent' =>    array(
            'name'      => 'trepercent',
            'vanme'     => 'LBL_TREPERCENT',
            'type'      => 'varchar',
            'len'       => 10,
        ),
        
        'trepercent_1' =>    array(
            'name'      => 'trepercent_1',
            'vanme'     => 'LBL_TREPERCENT',
            'type'      => 'varchar',
            'len'       => 10,
        ),
        
        'tiente'  => array(
        'name'  => 'tiente',
        'vname' => 'LBL_TIENTE',
        'type'  => 'enum',
        'options' => 'currency_dom',
      ),
      'tigia'  => array(
        'name'  => 'tigia',
        'vname' => 'LBL_TIGIA',
        'type'  => 'varchar',
        'len' => 255,
      ),
      
      'tiente_usd' => array(
        'name'      => 'tiente_usd',
        'vname'     => 'LBL_TIENTE',
        'type'      => 'enum',
        'options'   => 'currency_dom'
      ),
      
      'tiente_vnd'  => array(
         'name'     => 'tiente_vnd',
         'type'     => 'enum',
         'vname'    => 'LBL_TIENTE',
         'options'  => 'currency_dom',
      ),
      
      'template_ddown_c' => 
      array (
        'name' => 'template_ddown_c',
        'vname' => 'LBL_TEMPLATE_DDOWN_C',
        'type' => 'enum',
        'massupdate' => 0,
        'comments' => '',
        'help' => '',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => 0,
        'audited' => 0,
        'reportable' => 0,
        'len' => 255,
        'options' => 'template_ddown_c_list',
        'studio' => 'visible',
      ),
      
       'type' => array(
          'name'    => 'type',
          'vname'   => 'LBL_WORKSHEET_TYPE',
          'type'    => 'radioenum',
          'dbType'  => 'enum',
          'options'     => 'contracts_type_dom',
        ),
        
      'parent_type'=>
      array(
            'name'=>'parent_type',
            'vname'=>'LBL_CONTRACT_PARENT_TYPE',
            'type' => 'parent_type',
            'dbType'=>'varchar',
            'group'=>'parent_name',
            'options'=> 'contract_parent_type_display',
            'len'=>255,
            'comment' => 'The Sugar object to which the call is related'
          ),

      'parent_name'=>
      array(
            'required'=> true,
            'name'=> 'parent_name',
            'parent_type'=>'contract_record_type_display' ,
            'type_name'=>'parent_type',
            'id_name'=>'parent_id',
            'vname'=>'LBL_BEN_B',
            'type'=>'parent',
            'group'=>'parent_name',
            'dbType'=>'varchar',
            'len' => 255,
            'options'=> 'contract_parent_type_display',
      ),
      'parent_id'=>
      array(
          'name'=>'parent_id',
          'vname'=>'LBL_LIST_RELATED_TO_ID',
          'type'=>'id',
          'group'=>'parent_name',
            'reportable'=>false,
          'comment' => 'The ID of the parent Sugar object identified by parent_type'
      ),
      
      'accounts' => array(
        'name' => 'accounts',
        'type' => 'link',
        'relationship' => 'account_contracts',
        'link_type'=>'one',
        'source'=>'non-db',
        'vname'=>'LBL_OLD_ACCOUNT_LINK',
      ),
      'fits'   => array(
        'name' => 'fits',
        'type' => 'link',
        'relationship' => 'fits_contracts',
        'link_type'=>'one',
        'source'=>'non-db',
        'vname'=>'LBL_OLD_FITS_LINK',
      ),
      
      'transports' => array(
        'name' => 'transports',
        'type' => 'link',
        'relationship' => 'transport_contracts',
        'link_type'=>'one',
        'source'=>'non-db',
        'vname'=>'LBL_OLD_TRANSPORTS_LINK',
      ),
      
      'hotels' => array(
        'name' => 'hotels',
        'type' => 'link',
        'relationship' => 'hotel_contracts',
        'link_type'=>'one',
        'source'=>'non-db',
        'vname'=>'LBL_OLD_HOTELS_LINK',
      ),
      
      'restaurants' => array(
        'name' => 'restaurants',
        'type' => 'link',
        'relationship' => 'restaurant_contracts',
        'link_type'=>'one',
        'source'=>'non-db',
        'vname'=>'LBL_OLD_RESTAURANTS_LINK',
      ),
      
      'travelguides'    => array(
        'name' => 'travelguides',
        'type' => 'link',
        'relationship' => 'travelguide_contracts',
        'link_type'=>'one',
        'source'=>'non-db',
        'vname'=>'LBL_OLD_TRAVELGUIDE_LINK',
      ),

        'start_date_guide'  => array(
          'name'        => 'start_date_guide',
          'vname'       => 'LBL_START_DATE_GUIDE' ,
          'type'        => 'date'
        ),
        
        'end_date_guide'  => array(
           'name'   => 'end_date_guide',
           'vname'  => 'LBL_END_DATE_GUIDE',
           'type'   => 'date',
        ),
        
        'journey'   => array(
          'name'    => 'journey',
          'vname'   => 'LBL_JOURNEY',
          'type'    => 'varchar',
          'len'     => 255,
        ),
        
        'guide_currency'   => array(
          'name'    => 'guide_currency',
          'vname'   => 'LBL_CURRENCY',
          'type'    => 'enum',
          'options' => 'currency_dom',
        ),
        'guide_num_of_date' => array(
          'name'    => 'guide_num_of_date',
          'vname'   => 'LBL_GUIDE_NUM_OF_DATE',
          'type'    => 'int',
          'len'     => 10,
        ),
        
        'total_bonus'   => array(
          'name'    => 'total_bonus',
          'vname'   => 'LBL_TOTAL_BONUS',
          'type'    => 'currency',
          'dbType'  => 'double',
        ),
        
       'inword'     => array(
         'name'     => 'inword',
         'vname'    => 'LBL_INWORD' ,
         'type'     => 'text',
       ),
       
       'expiration_date'    => array(
         'name'     => 'expiration_date',
         'vname'    => 'LBL_EXPIRATION_DATE',
         'type'     => 'date'
       ),
       
       'guider_type'    => array(
         'name'     => 'guider_type',
         'vname'    => 'LBL_GUIDER_TYPE',
         'type'     => 'varchar',
         'len'      => 250,
       ),
       
       'guide_card_no'  => array(
         'name'     => 'guide_card_no',
         'vname'    => 'LBL_GUIDE_CARD_NO',
         'type'     => 'varchar',
         'len'      => 150,
       ),
       
       'guide_bonus'    => array(
            'name'  => 'guide_bonus',
            'vname' => 'LBL_GUIDE_BONUS',
            'type'  => 'currency',
            'dbType' => 'varchar',
       ),
       
       'birthday'   => array(
         'name'     => 'birthday',
         'vname'    => 'LBL_BIRTHDAY',
         'type'     => 'date',
       ),
       
       'passport_no_guide'    => array(
         'name'     => 'passport_no_guide',
         'vname'    => 'LBL_PASSPORT_NO',
         'type'     => 'varchar',
         'len'      => 150,
       ),
       
       'giatrihopdongxe'    => array(
         'name'     => 'giatrihopdongxe',
         'vname'    => 'LBL_GIATRIHOPDONGXE',
         'type'     => 'currency',
         'dbType'   => 'double',
       ),
       
       'hopdongthuexe_percent'  => array(
         'name'     => 'hopdongthuexe_percent',
         'vname'    => 'LBL_HOPDONGXE_PERCENT',
         'type'     => 'double',
       ),
       
       'hopdongthuexe_inword' => array(
         'name'     => 'hopdongthuexe_inword',
         'vname'    => 'LBL_HOPDONGTHUEXE_INWORD',
         'type'     => 'text'
       ),
       'num_of_cus_guide'   => array(
         'name'     => 'num_of_cus_guide',
         'vname'    => 'LBL_NUM_OF_CUS_DATE',
         'type'     => 'int',
         'len'      => 10,
       ),
       
       'contract_guide_cost'    => array(
            'name'  => 'contract_guide_cost',
            'vname' => 'LBL_CONTRACT_GUIDE_COST',
            'type'  => 'currency',
            'dbType' => 'double',
       ),
       
       'guide_inword'   => array(
           'name'   => 'guide_inword',
           'vname'  => 'LBL_GUIDE_INWORD',
           'type'   => 'text',
       ),
       
       'bank_name_b'    => array(
         'name'     => 'bank_name_b',
         'vname'    => 'LBL_BANK_NAME_B',
         'type'     => 'varchar',
         'len'      => 250,
       ),
       
       'account_name_b' => array(
         'name'     => 'account_name_b',
         'vname'    => 'LBL_ACCOUNT_NAME_B',
         'type'     => 'varchar',
         'len'      => 250,
       ),
       
       'sotaikhoanbenb' => array(
         'name'     => 'sotaikhoanbenb',
         'vname'    => 'LBL_SOTAIKHOANBENB',
         'type'     => 'varchar',
         'len'      => 150
       ),
       'date_issued_guide'  => array(
         'name'     => 'date_issued_guide',
         'vname'    => 'LBL_DATE_ISSUED_GUIDE',
         'type'     => 'date',
       ),
       'place_issued_guide'  => array(
         'name'     => 'place_issued_guide',
         'vname'    => 'LBL_PLACE_ISSUED_GUIDE',
         'type'     => 'varchar',
       ),
       
       'date_of_contracts'  => array(
         'name'     => 'date_of_contracts',
         'vname'    => 'LBL_DATE_OF_CONTRACTS',
         'type'     => 'date',
         'importable' => 'required',
         'required' => false,
         'enable_range_search' => true,
         'options' => 'date_range_search_dom',
       ),
       
 
    ),

    'relationship' => array(
    
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('ContractAppendixs','ContractAppendixs', array('default', 'assignable', ));
?>
                       