<?php
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2011 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

$dictionary['Hotels'] = array(
	'table'=>'hotels',
	'audited'=>true,
	'fields'=>array (
    // custom field
    
    // hotel code
     'code' => array(
         'name'     => 'code',
         'vname'    => 'LBL_HOTEL_CODE',
         'type'     => 'varchar',
         'len'      => 50,
         'comment'  => 'id of one hotel',
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
      
      // fax
      'fax' => array(
        'name'      => 'fax',
        'vname'     => 'LBL_FAX',
        'type'      => 'varchar',
        'len'       => 50,
        'comment'   => 'fax of hotel',
      ),
       // tel
      'tel' => array(
        'name'      => 'tel',
        'vname'     => 'LBL_HOTEL_TEL',
        'type'      => 'varchar',
        'len'       => 50,
        'comment'   => 'tel of hotel',
      ),
      
      // address
      
      'address' => array(
        'name'      => 'address',
        'vname'     => 'LBL_HOTEL_ADDRESS',
        'type'      => 'text',
        'len'       => 250,
        'comment'   => 'address of hotel',
      ),
       //  so phong
      'number_of_room'  => array(
        'name'      => 'number_of_room',
        'vname'     => 'LBL_NUMBER_ROOM',
        'type'      => 'int',
        'len'       => 11,
        'comment'   => 'number room',
      ),
          
    //   standard
    'standard' => array(
      'name'    => 'standard',
      'vname'   => 'LBL_STANDARD',
      'type'    => 'enum',
      'len'     => 150,
      'options' => 'hotel_standard_dom',
    ),
    
    // area
    'area'  => array(
      'name'    => 'area',
      'vname'   => 'LBL_AREA',
      'type'    => 'enum',
      'options' => 'khachsan_area',
      'len'     => 150,
    ),
    
    // website
    'website' => array (
        'name' => 'website',
        'vname' => 'LBL_WEBSITE',
        'type' => 'url',
        'dbType' => 'varchar',
        'len' => 255,
        'comment' => 'URL of website for the company',
    ),
    
    'city_province' => array(
       'name'   => 'city_province',
       'vname'  => 'LBL_CITY_PROVINCE',
       'type'   => 'enum',
       'len'    => 150,
       'options'=> 'city_province_dom',
    ),
    

    
    'tax_id'    => array(
      'name'    => 'tax_id',
      'vname'   => 'LBL_TAX_ID',
      'type'    => 'varchar',
      'len'     => 50,
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
        'relationship' => 'hotels_email_addresses',
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
        'relationship' => 'hotels_email_addresses_primary',
        'source' => 'non-db',
        'vname' => 'LBL_EMAIL_ADDRESS_PRIMARY',
        'duplicate_merge' => 'disabled',
        'required' => true,
    ) ,
    
      'contracts' =>
      array (
        'name' => 'contracts',
        'type' => 'link',
        'relationship' => 'hotel_contracts',
        'module'=>'Contracts',
        'bean_name'=>'Contract',
        'source'=>'non-db',
            'vname'=>'LBL_CALLS',
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
    
   
),

'indices' => array (
     array('name' =>'idx_hotels_id_del', 'type' =>'index', 'fields'=>array('id', 'deleted')),
        array('name' =>'autocode' , 'type'=>'unique' , 'fields'=>array('autocode')),
        array('name' =>'code' , 'type'=>'unique' , 'fields'=>array('code')),
),

	'relationships'=>array (
    
    'hotels_email_addresses' => 
            array(
                'lhs_module'=> "Hotels", 'lhs_table'=> 'hotels', 'lhs_key' => 'id',
                'rhs_module'=> 'EmailAddresses', 'rhs_table'=> 'email_addresses', 'rhs_key' => 'id',
                'relationship_type'=>'many-to-many',
                'join_table'=> 'email_addr_bean_rel', 'join_key_lhs'=>'bean_id', 'join_key_rhs'=>'email_address_id', 
                'relationship_role_column'=>'bean_module',
                'relationship_role_column_value'=>"Hotels"
            ),
        'hotels_email_addresses_primary' => 
            array('lhs_module'=> "Hotels", 'lhs_table'=> 'hotels', 'lhs_key' => 'id',
                'rhs_module'=> 'EmailAddresses', 'rhs_table'=> 'email_addresses', 'rhs_key' => 'id',
                'relationship_type'=>'many-to-many',
                'join_table'=> 'email_addr_bean_rel', 'join_key_lhs'=>'bean_id', 'join_key_rhs'=>'email_address_id', 
                'relationship_role_column'=>'primary_address', 
                'relationship_role_column_value'=>'1'
            ),
            
            // contracts
            
            'hotel_contracts' => array('lhs_module'=> 'Hotels', 'lhs_table'=> 'hotels', 'lhs_key' => 'id',
                              'rhs_module'=> 'Contracts', 'rhs_table'=> 'contracts', 'rhs_key' => 'parent_id',
                              'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
                              'relationship_role_column_value'=>'Hotels'),
    
),
	'optimistic_locking'=>true,
		'unified_search'=>true,
	);
if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('Hotels','Hotels', array('basic','assignable'));