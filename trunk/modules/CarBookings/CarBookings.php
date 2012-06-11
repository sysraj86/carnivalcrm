<?php
     if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
     
     class  CarBookings extends SugarBean{
         
        var $new_schema = true;
        var $module_dir = 'CarBookings';
        var $object_name = 'CarBookings';
        var $table_name = 'carbookings';
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
        var $worksheet_code;
        
        function CarBookings(){
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
