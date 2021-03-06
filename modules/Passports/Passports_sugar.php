<?PHP
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

/**
 * THIS CLASS IS GENERATED BY MODULE BUILDER
 * PLEASE DO NOT CHANGE THIS CLASS
 * PLACE ANY CUSTOMIZATIONS IN visa_Passports
 */


class Passports_sugar extends Basic {
	var $new_schema = true;
	var $module_dir = 'Passports';
	var $object_name = 'Passports';
	var $table_name = 'passports';
	var $importable = false;
	var $disable_row_level_security = true ; // to ensure that modules created and deployed under CE will continue to function under team security if the instance is upgraded to PRO
		var $id;
		var $name;
		var $date_entered;
		var $date_modified;
		var $modified_user_id;
		var $modified_by_name;
		var $created_by;
		var $created_by_name;
		var $description;
		var $deleted;
		var $created_by_link;
		var $modified_user_link;
		var $assigned_user_id;
		var $assigned_user_name;
		var $assigned_user_link;
		var $hovaten;
		var $gioitinh;
		var $tenkhac;
		var $tinhtranghonnhan;
		var $noisinh;
		var $quocgia;
		var $quoctich;
		var $quoctichkhac;
		var $socmnd;
		var $hokhauthuongtru;
		var $diachinhanvisa;
		var $sodienthoainha;
		var $sodienthoaididong;
		var $email;
		var $sohochieu;
		var $ngaycap;
		var $ngayhethan;
		var $quocgiacap;
		var $thanhphocap;
		var $tungbimathochieu;
		var $tencongty;
		var $diachicongty;
		var $dienthoaicongty;
		var $sofax;
		var $chucvu;
		var $mucluonghangthang;
		var $motacongviec;
		var $congtycu;
		var $diachicongtycu;
		var $chucvucongtycu;
		var $dienthoaicongtycu;
		var $captren;
		var $ngayvaolam;
		var $ngayketthuc;
		var $motacongvieccu;
		var $truongdahoc;
		var $diachitruong;
		var $nganhhoc;
		var $ngaynhaphoc;
		var $ngayketthuchoc;
		var $hotencha;
		var $ngaysinhcha;
		var $hotenme;
		var $ngaysinhme;
		var $chamedangonoiden;
		var $hotenvochong;
		var $ngaysinhvochong;
		var $quoctichvochong;
		var $diachivochong;
		var $ngaydiden;
		var $nguoicungdi;
		var $quocgiatungden;
		var $mucdichchuyendi;
		var $nguoichitra;
		var $thoigiano;
		var $tungduoccapthithuc;
		var $ngaycapvisa;
		var $sovisa;
		var $quocgiacapvisa;
		var $thanhphocapvisa;
		var $loaivisa;
		var $lanvantay;
		var $matvisa;
		var $noitungden;
		var $ngayden;
		var $songayo;
		var $visabituchoi;
		var $lydobituchoi;
		var $thannhanoday;
		var $hotenthannhan;
		var $moiquanhe;
		var $tinhtranghonnhanthanhnhan;
		var $diachithannhan;
		var $sodienthoaithannhan;
		var $thuocdangphai;
		var $tochucxahoi;
		var $kynangchuyendung;
		var $phucvuquandoi;
		var $benhtruyennhiem;
		var $tochucdacbiet;
		var $nghienmatuy;
		var $tienantiensu;
		var $viphamhoachat;
		var $viphammaidam;
		var $thamgiahopphap;
		var $thamgiakhungbo;
		var $hotrokhungbo;
		var $thanhvienkhungbo;
		var $thamgiadietchung;
		var $thamgianguocdai;
		var $thamgiachinhtri;
		var $boquyencongdan;
		var $ngaysinh;
		function Passports_sugar(){	
		parent::Basic();
	}
	
	function bean_implements($interface){
		switch($interface){
			case 'ACL': return true;
		}
		return false;
}
		
}
?>