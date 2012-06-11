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

$module_name = 'Quotes';
$viewdefs[$module_name]['DetailView'] = array(
'templateMeta' => array('form' => array('buttons'=>array(
                                                          0 => 'EDIT',
                                                          1 => 'DUPLICATE',
                                                          2 => 'DELETE',
                                                          3 => array ('customCode' =>'<input title="{$MOD.LBL_EXPORTTOWORD}" type="button" accessKey="{$MOD.LBL_EXPORTTOWORD}" class="button" onclick="window.location.href=\'index.php?module=Quotes&action=export2word&record={$fields.id.value}\'" name="button" value="Export To Word">',),      
                                                         )),
                        'maxColumns' => '2',
                        'widths' => array(
                                        array('label' => '10', 'field' => '30'),
                                        array('label' => '10', 'field' => '30')
                                        ),
                        ),

'panels' =>array (

'lbl_overview' => 
  array (
       array (
        'code',
          'name',
          
        ),
        
        array(
            'accounts_quotes_name',
          'contacts_quotes_name',
          
        ),
        array(
        'quotes_tours_name',
          'quotes_oders_name',
        ),
        array(
        'service_cost',
          'fits_quotes_name', 
        ),
        
        array(
        'airline_journey',
           'total_cus', 
        ),
        

        array(
        'airline_ticket_cost',
          'total_cost',
        ),
        array (
          'sender',
          'senddate',
        ),
        array (
          'description',
          'assigned_user_name',  
        ),
        
   ),
   
   'lbl_gia_bao_gom' => array(
       array(
         'name' => 'transport',
         'lable'   => 'LBL_TRANSPORT',
         'displayParams'    => array('cols'=>120, 'rows'=> 6),
       ),
       
       array(
         'name'     => 'hotel',
         'label'    => 'LBL_HOTEL',
         'displayParams'    => array('cols'=>120, 'rows'=> 6),
       ),
       
       array(
         'name'     => 'room',
         'label'    => 'LBL_ROOM',
         'displayParams'    => array('cols'=>120, 'rows'=> 6),
       ),
       
       array(
         'name'     => 'food',
         'label'    => 'LBL_FOOD',
         'displayParams'    => array('cols'=>120, 'rows'=> 6),
       ),
       
       array(
         'name'     => 'guide',
         'label'    => 'LBL_GUIDE',
         'displayParams'    => array('cols'=>120, 'rows'=> 6),
       ),
       array(
         'name'     => 'insurance',
         'label'    => 'LBL_INSURANCE',
         'displayParams'    => array('cols'=>120, 'rows'=> 6),
       ),
       
       array(
         'name'     => 'other',
         'label'    => 'LBL_OTHER',
         'displayParams'    => array('cols'=>120, 'rows'=> 6),
       ), 
  ),
  
  'lbl_others'   => array(
    array(
        'name'  => 'not_content',
        'label' => 'LBL_NOT_CONTENT',
        'displayParams'    => array('cols'=>120, 'rows'=> 6),
    ),
    array(
        'name'  => 'child_cost',
        'label' => 'LBL_CHILD_COST_INFORMATIONS',
        'displayParams'    => array('cols'=>120, 'rows'=> 12),
    ),
    array(
        'name'  => 'surcharge',
        'label' => 'LBL_SURCHARGE',
        'displayParams'    => array('cols'=>120, 'rows'=> 6),
    ),
  ),  
  'lbl_default'=> array(
  array (
    array (
      'name' => 'date_entered',
      'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
      'label' => 'LBL_DATE_ENTERED',
    ),
    array (
      'name' => 'date_modified',
      'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
      'label' => 'LBL_DATE_MODIFIED',
    ),
  ),
  ),
 
)
);
?>