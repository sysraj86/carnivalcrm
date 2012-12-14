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
$viewdefs[$module_name]['EditView'] = array(
    'templateMeta' => array('maxColumns' => '2', 
                            'widths' => array(
                                            array('label' => '20', 'field' => '30'), 
                                            array('label' => '20', 'field' => '30')
                                            ),                                                                                                                                    
                             'includes'=> array(
                                            array('file'=>'modules/Tours/jquery.js'),
                                            array('file'=>'modules/Quotes/calculate.js'),
                                            ),
                                            ),
                                            
                                            
 'panels' =>array (
  'lbl_overview' => 
  array (
       array (
            array(
               'name' => 'name',
               'customCode' => '<input type="text" name="name" size="30" id="name" value="{$fields.name.value}"/> <input type="hidden" id="tour_name" value="{$tour_name}"/> <input type="hidden" name="tour_id" value="{$tour_id}"/> <input type="hidden" name="is_tour" value="{$is_tour}"/>'
            ),
          
          array(
              'name'=>'accounts_quotes_name',
              'required' => true),
        ),
        
        array(
          'contacts_quotes_name',
          'quotes_tours_name',
        ),
        array(
          'quotes_oders_name',
          array(
            'name'  => 'service_cost' ,
            'label' => 'LBL_SERVICE_COST' ,
            'customCode' =>'<input type="text" class="calculate" id="service_cost" size="30" name="service_cost" value="{$fields.service_cost.value}"/>',
            ),
        ),
        
        array(
          'airline_journey',
          array(
           'name'   => 'airline_ticket_cost',
           'label'  => 'LBL_ARILINE_TICKET_COST',
           'customCode' =>'<input type="text" class="calculate" id="airline_ticket_cost" size="30" name="airline_ticket_cost" value="{$fields.airline_ticket_cost.value}"/>',
          )
        ),
        

        array(
            array(
              'name' =>  'fits_quotes_name',
              'required' =>true,
            ), 
            array(
              'name'=>'total_cus',
              'label' => 'LBL_TOTAL_CUS',
            ),
        ),
        
        array(
            'total_cost',
            'assigned_user_name',
        ),
        
         array (
          'sender',
          'senddate',
        ),
        array (
          'description',
        ),
        
   ),
   
   'lbl_gia_bao_gom' => array(
       array(
         'name' => 'transport',
         'lable'   => 'LBL_TRANSPORT',
         'displayParams'    => array('cols'=>120, 'rows'=> 6,),
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
        'displayParams'    => array('cols'=>120, 'rows'=> 6),
    ),
    array(
        'name'  => 'surcharge',
        'label' => 'LBL_SURCHARGE',
        'displayParams'    => array('cols'=>120, 'rows'=> 6),
    ),

  ),
                                                    
),
                        
);
?>