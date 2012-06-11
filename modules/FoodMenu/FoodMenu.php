<?php
     if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
     
     class  FoodMenu extends SugarBean{
         
        var $new_schema = true;
        var $module_dir = 'FoodMenu';
        var $object_name = 'FoodMenu';
        var $table_name = 'foodmenu';
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
        
        function FoodMenu(){
            global $sugar_config;
            parent::SugarBean();
        }
        
        function bean_implements($interface){
        switch($interface){
            case 'ACL':return true;
        }
        return false;
    }
     }
?>
