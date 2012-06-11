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

$viewdefs['Accounts']['EditView'] = array(
    'templateMeta' => array(
                            'form' => array('buttons'=>array('SAVE', 'CANCEL')),
                            'maxColumns' => '2', 
                            'widths' => array(
                                            array('label' => '10', 'field' => '30'),
                                            array('label' => '10', 'field' => '30'),
                                            ),
                            'includes'=> array(
                                            array('file'=>'modules/Accounts/Account.js'),
											array('file'=>'modules/Accounts/jquery.min.js'),
                                            array('file'=>'modules/Accounts/js/jquery-ui-1.8.13.custom.min.js'),
                                            array('file'=>'modules/Accounts/Validate.js'), 
											array('file'=>'modules/Accounts/duplicate.js'), 
                                         ),
                           ),
                           
    'panels' => array(
    
      'lbl_account_information' => 
      array (
        array (
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
         
        ),
        
        array(
          'git_type','deparment',
        ),
        
        array(
          'country','province_city',
        ),
        
        array(
          /*'destination_name' ,*/ 'grouplists_accounts_name',  'district', 
        ),
        
        array(
          'phone_office','phone_fax'
        
        ),
/*        array(
         'grouplists_accounts_name',
        ),*/

        array (

          array (
            'name' => 'website',
            'type' => 'link',
            'label' => 'LBL_WEBSITE',
          ),
          'source',
        ),
        
        // custom
        array(
          array(
            'name' => 'established_date',
            'label' => 'LBL_ESTABLISHED_DATE',
            'displayParams' => array('showFormats' => true),
          ),
          'git_action'
        ),
         
        array(
           'potential', 'ticketorder_accounts_name' 
        ) ,
        array(
            array(
          'name'    => 'address',
          'label'   => 'LBL_ADDRESS',
          'displayParams' => array('cols' => 80, 'rows' => 6), 
          ),
          'industry',
          ),
        
        array (

          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL',
          ),
        ),

        /*array (

          array (
            'name' => 'billing_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'billing',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),

        ),*/



        array (

          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
            'displayParams' => array('cols' => 120, 'rows' => 6),
          ),
        ),
      ),
     /* 'LBL_PANEL_ADVANCED' => 
      array (

        array (
          'account_type',
          'industry'
        ),

        array (
          'annual_revenue',
          'employees'
        ),

        array (
          'sic_code',
          'ticker_symbol'
        ),

        array (
          'parent_name',
          'ownership'
        ),

        array (
          'campaign_name',
          'rating'
        ),
      ), */
      'LBL_PANEL_ASSIGNMENT' => 
      array (

        array (
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
          ),
        ),
      ),
    )
);
?>