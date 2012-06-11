<?php
     if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
     
     class  GuideContracts extends SugarBean{
         
        var $new_schema = true;
        var $module_dir = 'GuideContracts';
        var $object_name = 'GuideContracts';
        var $table_name = 'guidecontracts';
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
        var $number;
        var $date;
        var $months;
        var $year;
        var $company_name;
        var $address_a;
        var $phone_a;
        var $fax_a;
        var $salutation;
        var $representing_a;
        var $birthday;
        var $passport_no;
        var $date_issued;
        var $phone_b;
        var $address_b;
        var $tour_name;
        var $tour_id;
        var $date_start;
        var $date_end;
        var $journey;
        var $partner;
        var $bonus;
        var $currency;
        var $num_of_date;
        var $total_bonus;
        var $inword;
        var $expiration_date;
        var $representative_b;
        var $representative_a;
        var $travelguidead0lguides_ida;
        var $travelguidecontracts_name;
        
        function GuideContracts(){
            global $sugar_config;
            parent::SugarBean();
        }
         function save ($check_notify = false){
            if(!empty($this->number)){
                $this->name =$this->number; 
            }
            return parent::save($check_notify);
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
