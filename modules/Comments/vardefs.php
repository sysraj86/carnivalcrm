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

$dictionary['Comments'] = array(
	'table'=>'Comments',
	'audited'=>true,
	'fields'=>array (


    'ngay' => 
  array (
    'required' => false,
    'name' => 'ngay',
    'vname' => 'LBL_NGAY',
    'type' => 'date',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'size' => '20',
    'enable_range_search' => true,
  ),
    'lichtrinh' => 
  array (
    'required' => false,
    'name' => 'lichtrinh',
    'vname' => 'LBL_LICHTRINH',
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
    'rows' => '4',
    'cols' => '120',
  ),
  
    'thaidolamviec' => 
  array (
    'required' => false,
    'name' => 'thaidolamviec',
    'vname' => 'LBL_THAIDOLAMVIEC',
    'type' => 'radioenum',
    'massupdate' => 0,
    'default' => '',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => 100,
    'size' => '20',
    'options' => 'danhgia_list',
    'studio' => 'visible',
    'dbType' => 'enum',
    'separator' => '&nbsp;&nbsp;&nbsp;',
  ),
  'kienthucamhieu' => 
  array (
    'required' => false,
    'name' => 'kienthucamhieu',
    'vname' => 'LBL_KIENTHUCAMHIEU',
    'type' => 'radioenum',
    'massupdate' => 0,
    'default' => '',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => 100,
    'size' => '20',
    'options' => 'danhgia_list',
    'studio' => 'visible',
    'dbType' => 'enum',
    'separator' => '&nbsp;&nbsp;&nbsp;',
  ),
  'tinhchuyennghiep' => 
  array (
    'required' => false,
    'name' => 'tinhchuyennghiep',
    'vname' => 'LBL_TINHCHUYENNGHIEP',
    'type' => 'radioenum',
    'massupdate' => 0,
    'default' => '',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => 100,
    'size' => '20',
    'options' => 'danhgia_list',
    'studio' => 'visible',
    'dbType' => 'enum',
    'separator' => '&nbsp;&nbsp;&nbsp;',
  ),
  'nhungvandekhac_hdv' => 
  array (
    'required' => false,
    'name' => 'nhungvandekhac_hdv',
    'vname' => 'LBL_NHUNGVANDEKHAC',
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
    'rows' => '4',
    'cols' => '80',
  ),
  'chatluongphuongtien' => 
  array (
    'required' => false,
    'name' => 'chatluongphuongtien',
    'vname' => 'LBL_CHATLUONGPHUONGTIEN',
    'type' => 'radioenum',
    'massupdate' => 0,
    'default' => '',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => 100,
    'size' => '20',
    'options' => 'danhgia_list',
    'studio' => 'visible',
    'dbType' => 'enum',
    'separator' => '&nbsp;&nbsp;&nbsp;',
  ),
  'laixe' => 
  array (
    'required' => false,
    'name' => 'laixe',
    'vname' => 'LBL_LAIXE',
    'type' => 'radioenum',
    'massupdate' => 0,
    'default' => '',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => 100,
    'size' => '20',
    'options' => 'danhgia_list',
    'studio' => 'visible',
    'dbType' => 'enum',
    'separator' => '&nbsp;&nbsp;&nbsp;',
  ),
  
  'nhungvandekhac_pt' => 
  array (
    'required' => false,
    'name' => 'nhungvandekhac_pt',
    'vname' => 'LBL_NHUNGVANDEKHAC',
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
    'rows' => '4',
    'cols' => '80',
  ),
  'khachsan' => 
  array (
    'required' => false,
    'name' => 'khachsan',
    'vname' => 'LBL_KHACHSAN',
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
    'rows' => '4',
    'cols' => '120',
  ),
  'nhahang' => 
  array (
    'required' => false,
    'name' => 'nhahang',
    'vname' => 'LBL_NHAHANG',
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
    'rows' => '4',
    'cols' => '120',
  ),
    'lichtrinhtour' => 
  array (
    'required' => false,
    'name' => 'lichtrinhtour',
    'vname' => 'LBL_LICHTRINHTOUR',
    'type' => 'radioenum',
    'massupdate' => 0,
    'default' => '',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => 100,
    'size' => '20',
    'options' => 'danhgia_list',
    'studio' => 'visible',
    'dbType' => 'enum',
    'separator' => '&nbsp;&nbsp;&nbsp;',
  ),
  'nhanxetchung' => 
  array (
    'required' => false,
    'name' => 'nhanxetchung',
    'vname' => 'LBL_NHANXETCHUNG',
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
    'rows' => '4',
    'cols' => '120',
  ),
  
  'diachi' => 
  array (
    'required' => false,
    'name' => 'diachi',
    'vname' => 'LBL_DIACHI',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => '255',
    'size' => '20',
  ),
  'dienthoai' => 
  array (
    'required' => false,
    'name' => 'dienthoai',
    'vname' => 'LBL_DIENTHOAI',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => '255',
    'size' => '20',
  ),
  'email' => 
  array (
    'required' => false,
    'name' => 'email',
    'vname' => 'LBL_EMAIL',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => '255',
    'size' => '20',
  ),

  'code'    => array(
    'name'  => 'code',
    'vname' => 'LBL_CODE',
    'type'  => 'varchar',
    'len'   => 250,
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
),
	'relationships'=>array (
),
	'optimistic_locking'=>true,
		'unified_search'=>true,
	);
if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('Comments','Comments', array('basic','assignable'));
