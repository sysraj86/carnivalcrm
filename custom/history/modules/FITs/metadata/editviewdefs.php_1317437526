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
 /*require_once("include/SugarTinyMCE.php"); 

// Campo description 
$tiny = new SugarTinyMCE(); 
$tiny->defaultConfig['cleanup_on_startup']=true; 
$tinyHtml = $tiny->getInstance('description'); */
$module_name = 'FITs';
$viewdefs[$module_name]['EditView'] = array(
    'templateMeta' => array('maxColumns' => '2', 
                            'widths' => array(
                                            array('label' => '10', 'field' => '30'), 
                                            array('label' => '10', 'field' => '30'),
                                        ),
                            'include' => array(),
),
 'panels' =>array (
  'lbl_contact_information' => 
  array (
    
        array (   
          array (
            'name' => 'first_name',
            'customCode' => '{html_options name="salutation" id="salutation" options=$fields.salutation.options selected=$fields.salutation.value}' 
            . '&nbsp;<input name="first_name"  id="first_name" size="25" maxlength="25" type="text" value="{$fields.first_name.value}">',
          ),
          'fit_type',
        ),
        array (
            'last_name',
             'gender', 
        ),  
        array(
            'deparment',
            'fits_fits_name',
        ),
        
        array(
          'grouplists_fits_name',
          'insurances_fits_name',
        ),
        
         array(
             array(
                'name' => 'birthday',
                'label' => 'LBL_BIRTHDAY',
                'displayParams' => array('showFormats' =>true),
            ),
            array (
            'name' => 'accounts_fits_name',
            'label' => 'LBL_ACCOUNT_NAME',
            'displayParams' =>
            array (
              'key' => 'billing',
              'copy' => 'primary',
              'billingKey' => 'primary',
              'additionalFields' =>
              array (
                'phone_office' => 'phone_work',
              ),
            ),
          ),
         ),
          
        array (
          
            array (
                'name' => 'phone_work',
                'comment' => 'Work phone number of the contact',
                'label' => 'LBL_OFFICE_PHONE',
              ),
          array (
            'name' => 'phone_mobile',
            'comment' => 'Mobile phone number of the contact',
            'label' => 'LBL_MOBILE_PHONE',
          ),
        ),

        array (
            array (
                'name' => 'phone_fax',
                'comment' => 'Contact fax number',
                'label' => 'LBL_FAX_PHONE',
            ),
          array (
            'name' => 'fit_title',
            'comment' => 'The title of the contact',
            'label' => 'LBL_TITLE',
          ),
        ),

        array (
          'nick_chat',
          'career',
         
        ),
        array(
          'provice_city', 'district',
        ),
        
        
        array(
          'source', 'religion',
        ),
        
        array(
            'potential', 'fit_action',
        ),
        
        /*array(
          array(
            'name'  => 'date_of_issue',
            'label' => 'LBL_DATE_ISSUE',
            'displayParams' => array('showFormats' => true)
          ),
           array(
            'name'  => 'date_of_expiry',
            'label' => 'LBL_DATE_EXPIRY',
            'displayParams' => array('showFormats' => true)
          ),
        
        ),   */
        
       array(
         'nationality',
       ),
       
       array(
        'name'      => 'address',
        'label'     => 'LBL_ADDRESS',
        'displayParams' => array('cols'=>60, 'rows'=> 4),
       ),
        /*array (

          array (
            'name' => 'primary_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' =>
            array (
              'key' => 'primary',
              'rows' => 2,
              'cols' => 20,
              'maxlength' => 150,
            ),
          ),

        ),*/

        array (

          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL_ADDRESS',
          ),
        ),

        array (

          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
            /*'customCode'=>'<textarea id="description" name="description">{$fields.description.value}</textarea>{literal}'. $tinyHtml . '<script>focus_obj = document.getElementById("description");</script>{/literal}', 
            'displayParams'=>array('required'=>false,'rows'=>5,'cols'=>60)*/ 
            
          ),
        ),
      ),
     'LBL_PASSPORT_INFO' => array(
       array(
         array(
           'name'   => 'date_issue',
           'label'  => 'LBL_DATE_ISSUE',
           'displayParams' => array('showFormats' => true),
         ),
         array(
           'name'   => 'expiration_date',
           'label'  => 'LBL_EXPIRATION_DATE',
           'displayParams' => array('showFormats' => true),
         ),
       ),
       array(
         'issue_place',
         'passport_status',
       ),
     ),

    /*  'LBL_PANEL_ADVANCED' =>
      array (

        array (

          array (
            'name' => 'report_to_name',
            'label' => 'LBL_REPORTS_TO',
          ),

          array (
            'name' => 'sync_contact',
            'comment' => 'Synch to outlook?  (Meta-Data only)',
            'label' => 'LBL_SYNC_CONTACT',
          ),
        ),

        array (

          array (
            'name' => 'lead_source',
            'comment' => 'How did the contact come about',
            'label' => 'LBL_LEAD_SOURCE',
          ),

          array (
            'name' => 'do_not_call',
            'comment' => 'An indicator of whether contact can be called',
            'label' => 'LBL_DO_NOT_CALL',
          ),
        ),

        array (
          'campaign_name',  
        ),
      ), */



      'LBL_PANEL_ASSIGNMENT' =>
      array (
        array (
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
    ),  
  ),

),


);
?>
