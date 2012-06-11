<?php
     if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
     
     class  RoomLists extends SugarBean{
         
        var $new_schema = true;
        var $module_dir = 'RoomLists';
        var $object_name = 'RoomLists';
        var $table_name = 'roomlists';
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
        // new custom
        var $tenks;
        var $ks_id;
        var $made_tour;
        var $made_tour_id;
        var $noidung;
        var $content;
        
        function RoomLists(){
            global $sugar_config;
            $noidung = new stdClass();
            parent::SugarBean();
        }
        
        function get_summary_text(){
            return $this->name;
        }
        
        function bean_implements($interface){
        switch($interface){
            case 'ACL':return true;
        }
        return false;
    }
     }
?>
