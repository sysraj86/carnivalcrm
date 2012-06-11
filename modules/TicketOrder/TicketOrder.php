<?php
     if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
     
     class  TicketOrder extends SugarBean{
         
        var $new_schema = true;
        var $module_dir = 'TicketOrder';
        var $object_name = 'TicketOrder';
        var $table_name = 'TicketOrder';
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
        var $code;
        var $autocode;
        var $passenger;
        var $itinerary;
        var $bookingclass;
        var $description;
        
        function TicketOrder(){
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
