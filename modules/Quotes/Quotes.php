<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   

    class  Quotes extends SugarBean{

        var $new_schema = true;
        var $module_dir = 'Quotes';
        var $object_name = 'Quotes';
        var $table_name = 'quotes';
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
        var $accounts_quotes_name;
        var $fits_quotes_name;
        var $content;

        function Quotes(){
            global $sugar_config;
            $content = new stdClass();
            parent::SugarBean();
        }

        function get_summary_text() {
            return "$this->name";
        }

        function save($check_notify = false){
            // save cost detail dos
            if($this->department == 'dos'){
                $dos_cost_detail = count($_POST['dos_hotel_standard']);
                if($dos_cost_detail > 0){
                    for($i=0;$i<$dos_cost_detail;$i++){
                        $cost_detail[$i]->dos_hotel_standard  = $_POST['dos_hotel_standard'][$i];
                        $cost_detail[$i]->ticket_cost         = $_POST['ticket_cost'][$i];
                        $cost_detail[$i]->facility_cost       = $_POST['facility_cost'][$i];
                        $cost_detail[$i]->single_room         = $_POST['single_room'][$i];
                        $cost_detail[$i]->foreign             = $_POST['foreign'][$i];
                    }
                    $this->content->dos_cost_detail = $cost_detail;
                }
            }

            // save cost detail Inbound
            if($this->department == 'ib'){
                $cost_detail_head->group_site1 = $_POST['group_site1'];
                $cost_detail_head->group_site2 = $_POST['group_site2'];
                $cost_detail_head->group_site3 = $_POST['group_site3'];
                $cost_detail_head->group_site4 = $_POST['group_site4'];
                $cost_detail_head->group_site5 = $_POST['group_site5'];
                $cost_detail_head->group_site6 = $_POST['group_site6'];
                 
                $this->content->cost_detail_head = $cost_detail_head;
                
                $ib_cost_detail = count($_POST['ib_hotel_standard']);
                if($ib_cost_detail > 0){
                    for($i=0;$i<$ib_cost_detail;$i++){
                        $cost_detail[$i]->ib_hotel_standard   = $_POST['ib_hotel_standard'][$i];
                        $cost_detail[$i]->group_site1_cost    = $_POST['group_site1_cost'][$i];
                        $cost_detail[$i]->group_site2_cost    = $_POST['group_site2_cost'][$i];
                        $cost_detail[$i]->group_site3_cost    = $_POST['group_site3_cost'][$i];
                        $cost_detail[$i]->group_site4_cost    = $_POST['group_site4_cost'][$i];
                        $cost_detail[$i]->group_site5_cost    = $_POST['group_site5_cost'][$i];
                        $cost_detail[$i]->group_site6_cost    = $_POST['group_site6_cost'][$i];
                    }
                    $this->content->ib_cose_detai = $cost_detail;
                } 
            }
            if($this->department == 'ob'){ 
                $ob_cost_detail->price = $_POST['ob_price'];
                $ob_cost_detail->tax = $_POST['ob_tax'];
                $ob_cost_detail->currency = $_POST['ob_currency'];
                $ob_cost_detail->total_price = $_POST['ob_total_price'];
                $ob_cost_detail->price_note = $_POST['price_note'];
                
                $this->content-> ob_cost_detail = $ob_cost_detail;
            }
            $_SESSION['content']    = $this->content;
            $content = json_encode($_SESSION['content'] );
            $content = base64_encode($content);
            $this->cost_detail = $content;
            parent::save($check_notify);

        }

        function bean_implements($interface){
            switch($interface){
                case 'ACL':return true;
            }
            return false;
        }
    }
?>
