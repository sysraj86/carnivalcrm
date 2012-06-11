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
    require_once('modules/FITs/FITs_sugar.php');
    class FITs extends FITs_sugar {
        function FITs(){	
            parent::FITs_sugar();
            $this->emailAddress = new SugarEmailAddress();
            $this->accumulation_score = 0;
        }

        /*  function retrieve($id = -1, $encode=true) { 
        $ret_val = parent::retrieve($id, $encode); 
        $this->emailAddress->handleLegacyRetrieve($this); 
        return $ret_val; 
        } 

        function save($check_notify=false) { 
        $this->emailAddress->handleLegacySave($this, $this->module_dir); 
        $email1_ori = $this->email1; 
        $email2_ori = $this->email2; 
        $this->in_workflow = false; 
        parent::save($check_notify); 
        $override_email = array(); 
        if($this->in_workflow) {// workflow will edit this $this->email1 and $this->email2 
        if($email1_ori != $this->email1) { 
        $override_email['emailAddress0'] = $this->email1; 
        } 
        if($email2_ori != $this->email2) { 
        $override_email['emailAddress1'] = $this->email2; 
        } 
        } 
        $this->emailAddress->save($this->id, $this->module_dir, $override_email,'','','','',$this->in_workflow); 
        return $this->id; 
        } 
       */
        function get_list_view_data() { 
            global $system_config; 
            global $current_user; 
            $temp_array = $this->get_list_view_array(); 
            $temp_array['NAME'] = $this->name; 
            $temp_array['EMAIL1'] = $this->emailAddress->getPrimaryAddress($this);
            $this->email1 =  $temp_array['EMAIL1'];
            $temp_array['EMAIL1_LINK'] = $current_user->getEmailLink('email1', $this, '', '', 'ListView'); 
            return $temp_array; 
        } 	

        function create_export_query(&$order_by, &$where, $relate_link_join='')
        {
            $custom_join = $this->custom_fields->getJOIN(true, true,$where);
            if($custom_join)
                $custom_join['join'] .= $relate_link_join;
            $query = "SELECT
            fits.*,email_addresses.email_address email_address,
            users.user_name as assigned_user_name ";
            if($custom_join){
                $query .= $custom_join['select'];
            }
            $query .= " FROM fits ";
            $query .= "LEFT JOIN users
            ON fits.assigned_user_id=users.id ";

            //join email address table too.
            $query .=  ' LEFT JOIN  email_addr_bean_rel on fits.id = email_addr_bean_rel.bean_id and email_addr_bean_rel.bean_module=\'FITs\' and email_addr_bean_rel.deleted=0 and email_addr_bean_rel.primary_address=1 ';
            $query .=  ' LEFT JOIN email_addresses on email_addresses.id = email_addr_bean_rel.email_address_id ' ;

            if($custom_join){
                $query .= $custom_join['join'];
            }

            $where_auto = "( fits.deleted IS NULL OR fits.deleted=0 )";

            if($where != "")
                $query .= "where ($where) AND ".$where_auto;
            else
                $query .= "where ".$where_auto;

            if(!empty($order_by))
                $query .=  " ORDER BY ". $this->process_order_by($order_by, null);

            return $query;
        }

        /*function create_new_list_query($order_by, $where,$filter=array(),$params=array(), $show_deleted = 0,$join_type='', $return_array = false, $parentbean=null, $singleSelect = false){

        $where_clause = '';
        if(empty($_REQUEST['accounts_fits_name_basic'])&& empty($_REQUEST['accounts_fd483ccounts_ida_basic'])){
        // $id = $_REQUEST['accounts_fd483ccounts_ida_basic'];
        $where_clause = " AND fits.id not in (SELECT accounts_f7035itsfits_idb FROM accounts_fits_c af INNER JOIN accounts a ON a.id = af.accounts_fd483ccounts_ida   WHERE a.deleted = 0 AND af.deleted =0 )";                 
        }
        $ret_array = parent::create_new_list_query($order_by, $where, $filter, $params, $show_deleted, $join_type, true, $parentbean, $singleSelect);

        $ret_array['where'] .= $where_clause;
        if ( !$return_array ){

        return  $ret_array['select'] . $ret_array['from'] . $ret_array['where']. $ret_array['order_by'];
        }

        return $ret_array;


        }     */


    }
?>