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
 * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
 */
require_once('modules/PassportList/PassportList_sugar.php');
class PassportList extends PassportList_sugar {
	
    function get_summary_text() {
            return "$this->name";
        }
	function PassportList(){	
		parent::PassportList_sugar();
	}
	function get_passports_list($id){
            
            global $sugar_config;
            $sql = "Select * From passportlist_passports_c ppc, passports p Where p.id = ppc.passportli3ee5ssports_idb And ppc.passportli5f6cortlist_ida = '".$id."' And ppc.deleted = 0 And p.deleted = 0";
            $result = $this->db->query($sql);
            $html = "";

            $i = 1;
            while ($row = $this->db->fetchByAssoc($result)) {
                     $html.="<tr>
                      <td align='center'>
                         ". $i."
                      </td>
                      <td align='center'>
                         ". $row['hovaten']."
                      </td>
                      <td align='center'>
                         ". $row['ngaysinh']."
                      </td>
                      <td align='center'>
                         ". $row['sohochieu']."
                      </td>
                      <td align='center'>
                         ". $row['ngaycap']."
                      </td>
                      <td align='center'>
                         ". $row['ngayhethan']."
                      </td>
                      <td align='center'>
                         ". $row['hokhauthuongtru']."
                      </td>
                      <td align='center'>
                         ". $row['sodienthoaididong']."
                      </td>
                   </tr>" ;
                $i++;
            }
            //echo $html;
            return $html;
        }
}
?>