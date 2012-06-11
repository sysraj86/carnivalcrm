<?php
     if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
     
     class  PromotionSetting extends SugarBean{
         
        var $new_schema = true;
        var $module_dir = 'PromotionSetting';
        var $object_name = 'PromotionSetting';
        var $table_name = 'promotionsetting';
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
        var $email1;
        var $email2;
        var $email_addresses_primary;
        var $email_addresses;
        
        function PromotionSetting(){
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
