<?php
  if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    class HighLightMadeTour{
         function HighLight(&$bean,$event,$arguments){
            $color = '';
            if(!$this->checkBooking($bean->id)){
                $bean->groupprogram_code .= "<img style='display:none;' src='themes/Sugar5/images/help.gif' width='0' height='0'  onload='this.parentNode.parentNode.parentNode.className = \"fail\";'> ";
            }
        }
        function checkBooking($madetour_id){
            $return = array();
            global $db;
            // Check AirlineTicket
            $sql = "
            SELECT 
              a.id 
            FROM
              `airlinestickets` a 
              JOIN `groupprogralinestickets_c` c 
                ON a.`id` = c.`groupprogr8400tickets_idb` 
                AND c.`deleted` = 0 
                AND c.`groupprogr0fd9rograms_ida` = '{$madetour_id}' 
            WHERE a.`deleted` = 0 
            ";
            $result = $db->query($sql);
            while($row = $db->fetchByAssoc($result)){
                $return[] = $row;
            }
            // Check TransportBooking
            $sql = "
            SELECT DISTINCT
              a.*
            FROM
              `transportbookings` a  
              JOIN `groupprograportbookings_c` d 
                ON d.`groupprogrdcceookings_idb` = a.`id` 
                AND d.`groupprogrd5earograms_ida` = '{$madetour_id}' 
                AND d.`deleted` = 0 
            WHERE a.`deleted` = 0  
            ";
            $result = $db->query($sql);
            while($row = $db->fetchByAssoc($result)){
                $return[] = $row;
            }
            // Check RestaurantBooking
            $sql = "
            SELECT DISTINCT 
              a.*
            FROM
              `restaurantbookings` a 
              JOIN `groupprograrantbookings_c` c 
                ON c.`groupprogre72bookings_idb` = a.`id` 
                AND c.`deleted` = 0 
                AND c.`groupprogr880erograms_ida` = '{$madetour_id}' 
            WHERE a.`deleted` = 0   
            ";
            $result = $db->query($sql);
            while($row = $db->fetchByAssoc($result)){
                $return[] = $row;
            }
            // Check RoomBooking
            $sql = "
            SELECT DISTINCT 
              a.*
            FROM
              `roombookings` a 
              JOIN `groupprograroombookings_c` c 
                ON c.`groupprogr952fookings_idb` = a.`id` 
                AND c.`deleted` = 0 
                AND c.`groupprogra66erograms_ida` = '{$madetour_id}' 
            WHERE a.`deleted` = 0   
            ";
            $result = $db->query($sql);
            while($row = $db->fetchByAssoc($result)){
                $return[] = $row;
            }
            // Check ServiceBooking
            $sql = "
            SELECT DISTINCT 
              a.*
            FROM
              `servicebookings` a
              JOIN `groupprogravicebookings_c` c 
                ON c.`groupprogrf47aookings_idb` = a.`id` 
                AND c.`deleted` = 0 
                AND c.`groupprogr0d2frograms_ida` = '{$madetour_id}' 
            WHERE a.`deleted` = 0   
            ";
            $result = $db->query($sql);
            while($row = $db->fetchByAssoc($result)){
                $return[] = $row;
            }
            foreach($return as $service){
                if($service['confirm'] == '0'){
                    return false; 
                }
            }
            return true;
        }
    }
?>
