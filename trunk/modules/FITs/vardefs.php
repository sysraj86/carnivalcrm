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

$dictionary['FITs'] = array(
	'table'=>'fits',
	'audited'=>true,
	'fields'=>array (
    
     'religion'  => array(
        'name' => 'religion',
        'vname' => 'LBL_RELIGION',
        'type'  => 'enum',
        'options'  => 'religion_dom',
        'comment' => 'Religion of FIT',
    ),
    'quocgia' => array(
        'name' => 'quocgia',
        'vname' => 'LBL_QUOCGIA',
        'type' => 'enum',
        'options' => 'countries_dom',
        'default' => 'vietnam',
    ),
    
    'nick_chat' => array(
        'name'  => 'nick_chat',
        'vname' => 'LBL_NICKCHAT',
        'type'  => 'varchar',
        'comment'   => 'nick chat of FIT',
      
      ),
      'phone_mobile' => array(
        'name' => 'phone_mobile',
        'vname' => 'LBL_MOBILE_PHONE',
        'type' => 'varchar',
        'len' => 100,
      ),
      
      'birthday' => array(
        'name'  => 'birthday',
        'vname' => 'LBL_BIRTHDAY',
        'type'  => 'date',
      ),
      
         // git source
      'source' => array(
        'name'  => 'source',
        'vname' => 'LBL_FIT_SOURCE',
        'type'  => 'enum',
        'options'   => 'lead_source_dom' ,
        'comment'   => 'select source of git',
      ),
      
      // git action
      
      'fit_action' =>array(
        'name'  => 'fit_action',
        'vname' => 'LBL_FIT_ACTION',
        'type'  => 'enum',
        'options'   => 'action_dom',
        'comment'   => 'the action of employees with git',
      ),
      
      // date of issue
      
      'date_of_issue' => array(
        'name' => 'date_of_issue',
        'vname' => 'LBL_DATE_ISSUE',
        'type'  => 'date',  
        'comment'  => ''
      
      ),
      
      'date_of_expiry' => array(
         'name'     => 'date_of_expiry',
         'vname'    => 'LBL_DATE_EXPIRY',
         'type'     => 'date',
      ),
      
      // potential
      
      'potential' => array(
        'name'  => 'potential',
        'vname' => 'LBL_POTENTIAL',
        'type'  => 'enum',
        'options' => 'potential_type_dom',
        'comment' => 'Potential of FIT',
        
      ),
      // accumulation score
      'accumulation_score'   => array(
        'required' => false,
        'name' => 'accumulation_score',
        'vname' => 'LBL_ACCUMULATION_SCORE',
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
      'career' => array(
          'name'       => 'career',
          'vname'      => 'LBL_CAREER',
          'type'       => 'enum',
          'options'    => 'career_dom',
      ),
      
      
      'account_name' =>
        array (
            'name' => 'account_name',
            'rname' => 'name',
            'id_name' => 'account_id',
            'vname' => 'LBL_ACCOUNT_NAME',
            'join_name'=>'accounts',
            'type' => 'relate',
            'link' => 'accounts',
            'table' => 'accounts',
            'isnull' => 'true',
            'module' => 'Accounts',
            'dbType' => 'varchar',
            'len' => '255',
            'source' => 'non-db',
            'unified_search' => true,
        ),
    'account_id' =>
        array (
            'name' => 'account_id',
            'rname' => 'id',
            'id_name' => 'account_id',
            'vname' => 'LBL_ACCOUNT_ID',
            'type' => 'relate',
            'table' => 'accounts',
            'isnull' => 'true',
            'module' => 'Accounts',
            'dbType' => 'id',
            'reportable'=>false,
            'source' => 'non-db',
            'massupdate' => false,
            'duplicate_merge'=> 'disabled',
            'hideacl'=>true,

        ),
        
        // gender
        'gender' => array (
            'required' => false,
            'name' => 'gender',
            'vname' => 'LBL_GENDER',
            'type' => 'radioenum',
            'massupdate' => 1,
            'default' => 'male',
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'duplicate_merge' => 'enable',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'len' => 100,
            'size' => '20',
            'options' => 'gender_dom',
            'studio' => 'visible',
            'dbType' => 'enum',
            'separator' => '',
        ),
        
        
    'provice_city' => array(
        'name'  => 'provice_city',
        'vname' => 'LBL_PROVINCE_CITY',
        'type'  => 'enum',
        'options' => 'city_province_dom',
    ),
    
    'fit_type'  => array(
      'name'    => 'fit_type',
      'vname'   => 'LBL_FIT_TYPE',
      'type'    => 'enum',
      'options' => 'fit_type_dom',
    ),
    'fit_type2'  => array(
      'name'    => 'fit_type2',
      'vname'   => 'LBL_FIT2_TYPE',
      'type'    => 'enum',
      'options' => 'fit_type2_dom',
    ),
    
    'district'  => array(
      'name'    => 'district',
      'vname'   => 'LBL_DISTRICT',
      'type'    => 'varchar',
      'len'     => 255,
    ),
    
    'address'   => array(
      'name'    => 'address',
      'vname'   => 'LBL_ADDRESS',
      'type'    => 'text',
    ),
    
    'fit_title' => array(
      'name'    => 'fit_title',
      'vname'   => 'LBL_TITLE',
      'type'    => 'enum',
      'options' => 'fit_title_dom',
    ),
    
    'deparment' => array(
      'name'    => 'deparment',
      'vname'   => 'LBL_DEPARMENT',
      'type'    => 'enum',
      'options' => 'deparment_dom',
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
        'relationship' => 'fits_email_addresses',
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
        'relationship' => 'fits_email_addresses_primary',
        'source' => 'non-db',
        'vname' => 'LBL_EMAIL_ADDRESS_PRIMARY',
        'duplicate_merge' => 'disabled',
        'required' => true,
    ) ,
    
   'code'   => array(
     'name'     => 'code',
     'vname'    => 'LBL_CODE',
     'type'     => 'varchar',
     'len'      => 150,
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
    // passport information
    'passport_no'   => array(
     'name'     => 'passport_no',
     'vname'    => 'LBL_PASSPORT_NO',
     'type'     => 'varchar',
     'len'      => 150,
   ),
   
   'date_issue' => array(
     'name'     => 'date_issue',
     'vname'    => 'LBL_DATE_ISSUE',
     'type'     => 'date',
   ),
   
   'expiration_date' => array(
     'name'     => 'expiration_date',
     'vname'    => 'LBL_EXPIRATION_DATE',
     'type'     => 'date',
   ),
   
   'issue_place'    => array(
     'name'     => 'issue_place',
     'vname'    => 'LBL_ISSUE_PLACE',
     'type'     => 'varchar',
     'len'      => 255,
   ),
   
   'passport_status' => array(
     'name'     => 'passport_status',
     'vname'    => 'LBL_PASSPORT_STATUS',
     'type'     => 'enum',
     'options'  => 'passport_status_dom',
   ), 
   
   //added 07-06-2012
   'fit_relationship_type' => array(
     'name'     => 'fit_relationship_type',
     'vname'    => 'LBL_RELATIONSHIP_TYPE',
     'type'     => 'enum',
     'options'  => 'fit_relationship_dom',
   ),
   
   'nick_skype'    => array(
     'name'     => 'nick_skype',
     'vname'    => 'LBL_NICK_SKYPE',
     'type'     => 'varchar',
     'len'      => 255,
   ),
   
   //end 07-06-2012
   
    'contracts' =>
    array (
        'name' => 'contracts',
        'type' => 'link',
        'relationship' => 'fits_contracts',
        'module'=>'Contracts',
        'bean_name'=>'Contract',
        'source'=>'non-db',
            'vname'=>'LBL_CALLS',
    ),
    
    /**
    * Le Gia Thanh
    * Bug : 633
    */
    'level' => array(
        'name' => 'level',
        'type' => 'enum',
        'vname' => 'LBL_LEVEL',
        'options' => 'fit_level_dom',
    ),
    
    'nationality' => array(
        'name'         => 'nationality',
        'vname'        => 'LBL_NATIONALITY',
        'type'        => 'multienum',
        'options'    => 'countries_dom',
        'default'   => 'VIETNAM',
        'merge_filter' => 'enabled',
    ),
    
      
      
      
),
'indices' => array (
     array('name' =>'idx_fit_id_del', 'type' =>'index', 'fields'=>array('id', 'deleted')),
        array('name' =>'autocode' , 'type'=>'unique' , 'fields'=>array('autocode')),
        array('name' =>'code' , 'type'=>'unique' , 'fields'=>array('code')),
),
	'relationships'=>array (       
    
     'fits_email_addresses' => 
            array(
                'lhs_module'=> "FITs", 'lhs_table'=> 'fits', 'lhs_key' => 'id',
                'rhs_module'=> 'EmailAddresses', 'rhs_table'=> 'email_addresses', 'rhs_key' => 'id',
                'relationship_type'=>'many-to-many',
                'join_table'=> 'email_addr_bean_rel', 'join_key_lhs'=>'bean_id', 'join_key_rhs'=>'email_address_id', 
                'relationship_role_column'=>'bean_module',
                'relationship_role_column_value'=>"FITs"
            ),
        'fits_email_addresses_primary' => 
            array('lhs_module'=> "FITs", 'lhs_table'=> 'fits', 'lhs_key' => 'id',
                'rhs_module'=> 'EmailAddresses', 'rhs_table'=> 'email_addresses', 'rhs_key' => 'id',
                'relationship_type'=>'many-to-many',
                'join_table'=> 'email_addr_bean_rel', 'join_key_lhs'=>'bean_id', 'join_key_rhs'=>'email_address_id', 
                'relationship_role_column'=>'primary_address', 
                'relationship_role_column_value'=>'1'
            ),
        // fits contracts
    'fits_contracts' => array('lhs_module'=> 'FITs', 'lhs_table'=> 'fits', 'lhs_key' => 'id',
                              'rhs_module'=> 'Contracts', 'rhs_table'=> 'contracts', 'rhs_key' => 'parent_id',
                              'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
                              'relationship_role_column_value'=>'FITs'),        
    
),
	'optimistic_locking'=>true,
		'unified_search'=>true,
	);
if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('FITs','FITs', array('basic','assignable','person'));