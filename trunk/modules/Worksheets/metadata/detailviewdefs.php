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

$module_name = 'Worksheets';
$viewdefs[$module_name]['DetailView'] = array(
'templateMeta' => array('form' => array('buttons'=>array(
                                                          0 => 'EDIT',
                                                          1 => 'DUPLICATE',
                                                          2 => 'DELETE',
                                                          3 => array ('customCode' =>'<input title="{$MOD.LBL_EXPORTTOWORD}" type="button" accessKey="{$MOD.LBL_EXPORTTOWORD}" class="button" onclick="window.location.href=\'index.php?module=Worksheets&action=export2excel&record={$fields.id.value}\'" name="button" value="Export advance"/>',),      
                                                         )),
                        'maxColumns' => '1',
                        'widths' => array(
                                            array('label' => '5', 'field' => '95'),
                                            //array('label' => '20', 'field' => '30'),
                                        ), 
                        'includes' =>  array(
                                array('file' => "modules/Worksheets/js/stylecss.js"),
                            ),
                        ),

'panels' =>array (

  array (                               
    'name',
  ),
  array(
     'worksheet_code'
  ),
  array(
     array (
            'name' => 'groupprograorksheets_name',
            ),
  ),
  array(
    'version',
  ),
  array(
    'note',
  ),
  array(
    'type',
  ),
  array(
  array(
    'name'  => 'overview',
    'customCode'   => '{$HTML}'
  ),         
  ),
  
  array(
  array(
    'name'  => 'report',
    'customCode'   => '{$REPORT}'
  ),         
  ),
  
  array(
    'assigned_user_name',
  ) ,
  array(
  array (
      'name' => 'date_entered',
      'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
      'label' => 'LBL_DATE_ENTERED',
   ),
   ),
  array(
  array (
      'name' => 'date_modified',
      'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
      'label' => 'LBL_DATE_MODIFIED',
  ),
  ) ,
)
);
?>