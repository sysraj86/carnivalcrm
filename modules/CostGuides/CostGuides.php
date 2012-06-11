<?php
     if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
     
     class  CostGuides extends SugarBean{
         
        var $new_schema = true;
        var $module_dir = 'CostGuides';
        var $object_name = 'CostGuides';
        var $table_name = 'costguides';
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
        
        function CostGuides(){
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
