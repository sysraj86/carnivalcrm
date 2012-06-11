<?php
    require_once('modules/AirlinesTickets/AirlinesTickets.php');
    require_once('modules/ServiceBookings/Forms.php');

    class Viewexportexchangeorder extends SugarView{
        
        function Viewexportexchangeorder() {
            parent::SugarView();
        }

        function display(){
            global $sugar_config;
            $focus = new AirlinesTickets();
            $db = DBManagerFactory::getInstance(); 


            $record    = isset($_GET["record"]) ? htmlspecialchars($_GET["record"]) : '';
            $sql = "select atk.name as name, air.name as airline,
            atk.messenger as messenger,atk.airlines_representative as representative,
            atk.ticket_agency as ticket_agency, atk.itinerary as itinerary,
            atk.booking_class as booking_class, atk.booking_code as booking_code,
            atk.fare as fare ,atk.commisson as commisson,atk.tax_fee_change as tax_fee_change,
            atk.nett as nett, atk.roe as roe,atk.equivalent_in_vn as equivalent_in_vn
            from airlinestickets atk , airlines air  ,airlines_ailinestickets_c aac 
            where atk.id = '".$record."' 
            and air.id = aac.airlines_a476cirlines_ida 
            and atk.id = aac.airlines_a1d09tickets_idb 
            and atk.deleted = 0 and aac.deleted = 0 and air.deleted = 0";
            // This query to get airline name and airlineticket info.
            $result = $db->query($sql);
            
            $template = file_get_contents('modules/AirlinesTickets/tpls/Export_exchangeorder.tpl');
            
            $row = $db->fetchByAssoc($result);

            $template = str_replace("{SITE_URL}",$sugar_config['site_url'],$template );  
            $template = str_replace("{AIRLINE}",$row['airline'],$template );
            $template = str_replace("{MESSENGER}",$row['messenger'],$template );
            $template = str_replace("{REPRESENTATIVE}",$row['representative'],$template );
            $template = str_replace("{TICKET_AGENCY}",$row['ticket_agency'],$template );
            $template = str_replace("{FARE}",$row['fare'],$template );
            $template = str_replace("{COMMISSION}",$row['commisson'],$template );
            $template = str_replace("{TAXFEECHANGE}",$row['tax_fee_change'],$template );
            $template = str_replace("{NETT}",$row['nett'],$template );
            $template = str_replace("{ROE}",$row['roe'],$template );
            $template = str_replace("{EQUIVALENT}",$row['equivalent_in_vn'],$template );            
            $template = str_replace("{RECORDS}",$focus->get_ticket_exchange_order_record($record,$row['itinerary'],$row['booking_class'],$row['booking_code']),$template );            
             

            $size=strlen($template);
            $filename = "Ticket Exchange Order ".$row['name'].".doc";
            ob_end_clean();
            header("Cache-Control: private");
            header("Content-Type: application/force-download;");
            header("Content-Disposition:attachment; filename=\"$filename\"");
            header("Content-length:$size");
            echo $template;
            ob_flush(); 
        }  // end function
    } // end class
?>
