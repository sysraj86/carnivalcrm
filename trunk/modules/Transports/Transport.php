<?php
     if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
     require_once('include/upload_file.php'); 
     require_once('include/formbase.php');     
     
     class  Transport extends SugarBean{
         
        var $new_schema = true;
        var $module_dir = 'Transports';
        var $object_name = 'Transport';
        var $table_name = 'transports';
        var $importable = true; 
        
        var $id;
        var $date_entered;
        var $date_modified;
        var $modified_user_id;
        var $assigned_user_id;
        var $created_by;
        var $created_by_name;
        var $currency_id;
        var $modified_by_name;
        var $name;
        var $description;
        var $address;
        var $email1;
        var $email2;
        var $phone;  
        var $type;
        var $transport_code;
        
        // for relate field
         var $contract_id; 
         
          var $additional_column_fields = array('contract_id')    ;
          var $relationship_fields  = array('contract_id'=>'contracts');

        
        function Transport(){
            global $sugar_config;
            parent::SugarBean();
              $this->emailAddress = new SugarEmailAddress(); 
    }
    
     function retrieve($id = -1, $encode=true) { 
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
     
    function get_list_view_data() { 
        global $system_config; 
        global $current_user; 
        $temp_array = $this->get_list_view_array(); 
        $temp_array['NAME'] = $this->name; 
        $temp_array['EMAIL1'] = $this->emailAddress->getPrimaryAddress($this); 
        $temp_array['EMAIL1_LINK'] = $current_user->getEmailLink('email1', $this, '', '', 'ListView'); 
        return $temp_array; 
    } 
        
        function get_summary_text() {
            return "$this->name";
        }

        function bean_implements($interface){
            switch($interface){
                case 'ACL':return true;
            }
            return false;
        }
     }
?>
