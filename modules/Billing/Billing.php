<?php
     if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
     
     class  Billing extends SugarBean{
         
        var $new_schema = true;
        var $module_dir = 'Billing';
        var $object_name = 'Billing';
        var $table_name = 'billing';
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
        var $billing_code;
        
        function Billing(){
            global $sugar_config;
            parent::SugarBean();
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
