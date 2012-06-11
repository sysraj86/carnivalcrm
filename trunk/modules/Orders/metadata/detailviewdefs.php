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

$module_name = 'Orders';
$viewdefs[$module_name]['DetailView'] = array(
'templateMeta' => array('form' => array('buttons'=>array('EDIT', 'DUPLICATE', 'DELETE',
                                                         )),
                        'maxColumns' => '3',
                        'widths' => array(
                                        array('label' => '10', 'field' => '20'),
                                        array('label' => '10', 'field' => '20'),
                                        array('label' => '10', 'field' => '20') 
                                        ),
                        ),

'panels' =>array (
////////////
/////////// 
'LBL_THONGTINCANHAN' => array(
             array (
            'name',
            'email',
            ),
            array(
            'diachi',
            'quocgia'
            ),

            array(
            'maso',
            'sodienthoai',
            ),

            array(
            'sofacsmile',
            ),    
        ),
        'LBL_THONGTINCHUYENDI' => 
    array(
        array (
        'ngaykhoihanh',
        'songuoilon'
        ),
        array(
        'thongtintreem',
        'songaydi'
        ), 
    ),
     'LBL_MIENNAM' => 
    array(
        array (
        'vungtau',
        'cantho',
        'chaudoc', 
        ),
        array(
        'cuchi',
        'dalat',
        'hochiminh', 
        ), 
        array(
        'tayninh',
        'dbscl',
        'phuquoc',
        ),
    ),
    'LBL_MIENTRUNG' => 
    array(
        array (
        'danang',
        'hoian',
        'hue',  
        ),
        array(
        'myson',
        'nhatrang',
        'ninhbinh',
        ),
        array(
        'muine',
        'quynhon',
        'buonmethuot',
        ),
    ),
      'LBL_MIENBAC' => 
    array(
        array (
        'catba',
        'dienbienphu',
        'fansipan',
        ),
        array(
        'haiphong',
        'halong',
        'hanoi',
        ),
        array(
        'langson',
        'sapa',
        '',
        ),
    ),
    'LBL_NOIKHAC' => 
    array(
        array (
        '',
        'chontour',
        '',
        ),
    ),
    'LBL_CAMPUCHIA' =>
    array(
        array (
        'angkor',
        'kampongthom',
        'sihanoukville', 
        ),
         array (
        'kampot', 
        'kep',
        'bienho',
        ),
        array(
        'kampong',
        'phnompenh',
        'noikhac_cam',
        ),
    ),
    
    'LBL_LAO' =>
    array(
        array (
        'hongsa',
        'luangprabang',
        'oudomxai',  
        ),
         array (
        'samnua',
        'vangvieng',
        'houayxai',
        ),
        array(
        'muongsinh',
        'pakse',
        'sananakhet',
        ),
        array(
        'vientiane',
        'khongisland',
        'namngundam',
        ),
        array(
        'phongsali',
        'xiengkhouang',
        'noikhac_lao',
        ),
    ),
    
     'LBL_PHUONGTIEN' =>
    array(
        array (
        'maybay',
        'xehoiorbus',
        'tauhoa',
        ),
        array (
        'xemay',
        ),
    ),
    'LBL_HANHTRINH' =>
    array(
        array (
        'bicycling',
        'hilltribe',
        'culture',
        ),
        array (
        'kayaking',
        'diving',
        'filming',
        ),
        array (
        'trekking',
        ),
    ),
    
        'LBL_CHOO' =>
        array(
            array (
            '',
            'tieuchuankhachsan',
            '',
            ),
            array ( 
            '',
            'loaiphong',
            '',
            ),
            array (
            'single_',
            'double_',
            'twin',
            ),
            array (
            'triple',
            'extrabed',
            '',
            ),
        ),
        
        'LBL_PHUCVUANUONG' =>
        array(
            array (
            'ansang',
            'antrua',
            'antoi',
            ),
        ),
        
        'LBL_THONGTINKHAC' =>
        array(
            array (
            '',
            'thongtinchuyendi',
            '',
            ),
        ),
        
        'LBL_THONGBAO' =>
        array(
            array (
            '',
            'nguonthongtin',
            'nguonthongtin2',
            ),
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
    
     ),    
        
);
?>