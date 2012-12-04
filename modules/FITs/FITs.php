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
/**
        * Add By Thanh Le At 09/11/2012
        * 
        * @param mixed $order_by
        * @param mixed $where
        * @param mixed $relate_link_join
        * @return String
        */
        function create_export_query(&$order_by, &$where, $relate_link_join=''){
            $custom_join = $this->custom_fields->getJOIN(true, true,$where);
            global $current_user;
            $displayColumns = $_SESSION[$current_user->user_name]['displayColumns'];
            $test = parent::create_new_list_query("", $where, $displayColumns, null,false,"", true);
            $select_fields = "";
            $n=0;
            $export_cols = array();
            while($field_name =  key($displayColumns)){ 
                $field_name = strtolower($field_name);  
                $field_defs = $this->field_defs[$field_name];
               if($field_defs){
                   if(count($field_defs['fields'])>0){
                        for($i=0;$i<count($field_defs['fields']);$i++){
                            $sub_field = strtolower($field_defs['fields'][$i]);
                            if($sub_field != "id" && in_array($this->table_name. "." .$sub_field, $export_cols) == false){
                                $export_cols[] = $this->table_name. "." .$sub_field;
                            }
                        }
                    }else{
                        if($field_name != "id" && $field_defs['source'] != 'non-db' && in_array($this->table_name. "." .$field_name, $export_cols) == false){
                            $export_cols[] = $this->table_name. "." .$field_name;
                        }elseif($field_defs['source'] == 'non-db'){
                            if($field_name == 'assigned_user_name'){
                                $export_cols[] = "TRIM(CONCAT(IFNULL(users.first_name,''),' ',IFNULL(users.last_name,''))) AS assigned_user_name ";
                                $custom_join['join'] .= " LEFT JOIN users ON users.id = {$this->table_name}.{$field_defs['id_name']} AND users.deleted=0 ";    
                            }else{
                                $link = $GLOBALS['dictionary'][$field_defs['link']];
                                $left = $link['relationships'][$field_defs['link']]['join_key_lhs'];
                                $right = $link['relationships'][$field_defs['link']]['join_key_rhs'];
                                if($link['table'] != '' && $field_defs['table'] != ''){
                                    $table_list = explode('_',$field_defs['link']); // lay ra bang ten cua bang left
                                    if($table_list[0] == $this->table_name){ // Neu bang left == bang chinh thi id bang chinh = left
                                        $custom_join['join'] .= " LEFT JOIN {$link['table']} ON {$link['table']}.{$left} = {$this->table_name}.id AND {$link['table']}.deleted=0";
                                        $custom_join['join'] .= " LEFT JOIN {$field_defs['table']} ON {$field_defs['table']}.id = {$link['table']}.{$right} AND {$field_defs['table']}.deleted=0";
                                    }else{   // Nguoc lai id bang chinh bang =  right
                                        $custom_join['join'] .= " LEFT JOIN {$link['table']} ON {$link['table']}.{$right} = {$this->table_name}.id AND {$link['table']}.deleted=0";
                                        $custom_join['join'] .= " LEFT JOIN {$field_defs['table']} ON {$field_defs['table']}.id = {$link['table']}.{$left} AND {$field_defs['table']}.deleted=0";
                                    }
                                }elseif($field_defs['name'] == 'email1'){
                                    $export_cols[] = ' email_addresses.email_address email_address ';
                                    $custom_join['join'] .= ' LEFT JOIN  email_addr_bean_rel on fits.id = email_addr_bean_rel.bean_id and email_addr_bean_rel.bean_module=\'FITs\' and email_addr_bean_rel.deleted=0 and email_addr_bean_rel.primary_address=1 ';
                                    $custom_join['join'] .= ' LEFT JOIN email_addresses on email_addresses.id = email_addr_bean_rel.email_address_id ';
                                }else{
                                    if($field_defs['name'] == 'created_by_name'){
                                       $field_defs['name'] = 'created_by' ;
                                    }elseif($field_defs['name'] == 'modified_by_name'){
                                       $field_defs['name'] = 'modified_user_id' ;
                                    }
                                    $custom_join['join'] .= " LEFT JOIN users users_{$field_defs['name']} ON users_{$field_defs['name']}.id = {$this->table_name}.{$field_defs['name']} AND users_{$field_defs['name']}.deleted=0";
                                }
                                
                                
                                if($field_defs['table'] != ''){
                                    if($field_defs['table'] == 'leads' || $field_defs['table'] == 'contacts'){
                                        $export_cols[] = " TRIM(CONCAT(IFNULL({$field_defs['table']}.first_name,''),' ',IFNULL({$field_defs['table']}.last_name,''))) AS {$field_name} ";
                                    }else{
                                        $export_cols[] = "{$field_defs['table']}.name as {$field_name}";
                                    }
                                }
                            }
                        }elseif(($field_defs['table']=='accounts' ||$field_defs['table']=='users') && in_array($field_defs['table']. "." .$field_defs['rname'], $export_cols) == false){
                            if($field_defs['table']=='accounts'){
                               $export_cols[] = $field_defs['table']. "." .$field_defs['rname']." AS account_name";  
                            }else{
                               $export_cols[] = " TRIM(CONCAT(IFNULL(users.first_name,''),' ',IFNULL(users.last_name,''))) AS customer_care_name ";
                            }
                        }elseif($field_name == 'email1'){  
                            $export_cols[] = ' email_addresses.email_address email_address '; 
                        }elseif($field_name == 'company_address') {
                            $export_cols[] = ' accounts.address AS company_address ';
                        }elseif($field_name == 'company_phone'){
                            $export_cols[] = 'accounts.phone_office AS company_phone';
                        }elseif($field_name == 'company_industry'){
                            $export_cols[] = 'accounts.industry AS company_industry';   
                        } 
                    } 
                }
                
                next($displayColumns);
                $n++;
            }
          if(count($export_cols))     
            $select_fields = implode(",",$export_cols);
          else
            $select_fields = "fits.*";
            $query = "SELECT
            {$select_fields} ";
            if($custom_join){
                $query .= $custom_join['select'];
            }
            $query .= " FROM fits ";
            if($custom_join){
                $query .= $custom_join['join'];
            }
            if($where != ""){
                $query .= " where ($where)"; 
            }
                
            if(!empty($order_by))
                $query .=  " ORDER BY ". $this->process_order_by($order_by, null);
            return $query;
        } 
        //function create_export_query(&$order_by, &$where, $relate_link_join='')
//        {
//            $custom_join = $this->custom_fields->getJOIN(true, true,$where);
//            if($custom_join)
//                $custom_join['join'] .= $relate_link_join;
//            $query = "SELECT
//            fits.*,email_addresses.email_address email_address,
//            users.user_name as assigned_user_name ";
//            if($custom_join){
//                $query .= $custom_join['select'];
//            }
//            $query .= " FROM fits ";
//            $query .= "LEFT JOIN users
//            ON fits.assigned_user_id=users.id ";

            //join email address table too.
//            $query .=  ' LEFT JOIN  email_addr_bean_rel on fits.id = email_addr_bean_rel.bean_id and email_addr_bean_rel.bean_module=\'FITs\' and email_addr_bean_rel.deleted=0 and email_addr_bean_rel.primary_address=1 ';
//            $query .=  ' LEFT JOIN email_addresses on email_addresses.id = email_addr_bean_rel.email_address_id ' ;

//            if($custom_join){
//                $query .= $custom_join['join'];
//            }

//            $where_auto = "( fits.deleted IS NULL OR fits.deleted=0 )";

//            if($where != "")
//                $query .= "where ($where) AND ".$where_auto;
//            else
//                $query .= "where ".$where_auto;

//            if(!empty($order_by))
//                $query .=  " ORDER BY ". $this->process_order_by($order_by, null);

//            return $query;
//        }

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