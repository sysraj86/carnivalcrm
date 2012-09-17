<?php
     if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
     
     class  Country extends SugarBean{
         
        var $new_schema = true;
        var $module_dir = 'Countries';
        var $object_name = 'Country';
        var $table_name = 'countries';
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
        var $country_code;
        
        function Country(){
            global $sugar_config;
            parent::SugarBean();
        }
        function get_summary_text() {
            return "$this->name";
        }
        public static function get_list_countries(){
            global $db;
            $countries = array();
            $result = $db->query("select * from countries where deleted = 0");
            while($row = $db->fetchByAssoc($result)){
                $countries[$row['id']]=$row['name'];
            }
            return $countries;
        }
        function bean_implements($interface){
        switch($interface){
            case 'ACL':return true;
        }
        return false;
    }
     }
?>
