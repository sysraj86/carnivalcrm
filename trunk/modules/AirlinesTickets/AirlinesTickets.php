<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   

    class  AirlinesTickets extends SugarBean{

    var $new_schema = true;
    var $module_dir = 'AirlinesTickets';
    var $object_name = 'AirlinesTickets';
    var $table_name = 'AirlinesTickets';
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
    var $flight_code;
    var $ticket_code;
    var $flight_code2;
    var $ticket_code2;
    var $autocode;
    var $type;           
    var $itinerary;
    var $time;
    var $itinerary2;
    var $time2;
    var $description;

    function AirlinesTickets(){
        global $sugar_config;
        parent::SugarBean();
    }

    function get_summary_text(){
        return "$this->name";
    }
    function get_gits_list($id = ''){
        $sql = "SELECT
        f.last_name,
        f.first_name,
        f.phone_mobile,
        airt.itinerary,
        airt.booking_class,
        airt.booking_code,
        air.name       AS airname
        FROM airlines air 
        INNER JOIN airlines_ailinestickets_c airair
        ON air.id = airair.airlines_a476cirlines_ida
        INNER JOIN airlinestickets airt
        ON airair.airlines_a1d09tickets_idb = airt.id
        INNER JOIN airlinesticets_accounts_c airacc
        ON airt.id = airacc.airlinestiec2atickets_ida
        INNER JOIN accounts acc
        ON acc.id = airacc.airlinesti3969ccounts_idb
        INNER JOIN accounts_fits_c afc
        ON acc.id = afc.accounts_fd483ccounts_ida
        INNER JOIN fits f
        ON f.id = afc.accounts_f7035itsfits_idb
        WHERE air.deleted = 0
        AND acc.deleted = 0
        AND airair.deleted = 0
        AND airacc.deleted = 0
        AND afc.deleted = 0
        AND airt.deleted = 0
        AND f.deleted =0
        AND airt.id = '".$id."'";
        $result = $this->db->query($sql);
        // define html code
        $html = "";
        $stt = 1;
        $airline;
        $html .= '<table cellpadding="0" cellspacing="0" border="1" width="100%" align="center" style="padding: 2px; border-collapse: collapse;">';
        $html .= '<tr>';
           $html .= '<th>STT</th> <th>Passenger Name</th><th>Itinerary</th><th>Booking Class</th><th>Booking code</th>';
        $html .= '</tr>';
        while($row = $this->db->fetchByAssoc($result)){
            $airline = $row['airname'];
            $html .= '<tr>';
            $html .= '<td align="center">'.$stt.'</td>';
            $html .= '<td align="center">'.$row['last_name'].' '.$row['first_name'] .'</td>';
            $html .= '<td align="center">'.$row['itinerary'] .'</td>';
            $html .= '<td align="center">'.$row['booking_class'] .'</td>';
            $html .= '<td align="center">'.$row['booking_code'] .'</td>';
            $html .= '</tr>';
            $stt ++;
        }
        $html .= '</table>';
        return $html;
    }

    function get_fits_list($id =''){
        $sql = "SELECT
        f.last_name ,f.first_name,airt.itinerary,airt.booking_class,airt.booking_code, air.name
        FROM
        airlines air INNER JOIN airlines_ailinestickets_c airair ON air.id = airair.airlines_a476cirlines_ida
        INNER JOIN airlinestickets airt ON airt.id = airair.airlines_a1d09tickets_idb INNER JOIN
        airlinestickets_fits_c airf ON airt.id = airf.airlinestia31ctickets_ida INNER JOIN fits f ON
        f.id = airf.airlinestib0dfitsfits_idb 
        WHERE f.deleted =0 AND air.deleted =0 AND airair.deleted =0 AND airf.deleted =0 AND airt.deleted =0 AND airt.id ='".$id."'";
        $result = $this->db->query($sql);
        // define html code
        $html = "";
        $airline = '';
        $stt = 1;
        $html .= '<table cellpadding="0" cellspacing="0" border="1" width="100%" align="center" style="padding: 2px; border-collapse: collapse;">';
        $html .= '<tr>';
           $html .= '<th>Nbr</th> <th>Passenger Name</th><th>Itinerary</th><th>Booking Class</th><th>Booking Code</th>';
        $html .= '</tr>';
        while($row = $this->db->fetchByAssoc($result)){
            $airline = $row['name'];
            $html .= '<tr>';
            $html .= '<td align="center">'.$stt.'</td>';
            $html .= '<td align="center">'.$row['last_name'].' '.$row['first_name'] .'</td>';
            $html .= '<td align="center">'.$row['itinerary'] .'</td>';
            $html .= '<td align="center">'.$row['booking_class'] .'</td>';
            $html .= '<td align="center">'.$row['booking_code'] .'</td>';
            $html .= '</tr>';
            $stt ++;
        }
        $html .= '</table>';
        return $html;
    }
    
     function get_ticket_exchange_order_record($id,$itinerary,$booking_class,$booking_code){
         
       $sql = "select distinct concat(fit.salutation,' ', fit.last_name,' ', fit.first_name) as ten , 
            fit.gender as gioitinh , fit.passport_no as passport ,
            fit.date_issue as date_issued, fit.expiration_date as date_expired
            from fits fit, airlinestickets_fits_c afc ,accounts_fits_c gfc,airlinesticets_accounts_c aac
            where (afc.airlinestia31ctickets_ida = '".$id."' 
            and fit.id = afc.airlinestib0dfitsfits_idb and fit.deleted = 0 and afc.deleted = 0)
or (aac.airlinestiec2atickets_ida = '".$id."' 
and gfc.accounts_fd483ccounts_ida = aac.airlinesti3969ccounts_idb
and gfc.accounts_f7035itsfits_idb = fit.id and aac.deleted = 0  and gfc.deleted = 0 and fit.deleted = 0)";  
        $result = $this->db->query($sql);
        $html = "";
        $stt = 1; 
        while($row = $this->db->fetchByAssoc($result)){
            
            $html .= '<tr>';
            $html .= '<td align="center">'.$stt.'</td>';
            $html .= '<td align="center">'.$row['ten'] .'</td>';
            $html .= '<td align="center">'.$row['gioitinh'] .'</td>';
            $html .= '<td align="center">'.$row['passport'] .'</td>';
            $html .= '<td align="center">'.$row['date_issued'] .'</td>';
            $html .= '<td align="center">'.$row['date_expired'] .'</td>';
            $html .= '<td align="center">'.$itinerary .'</td>';
            $html .= '<td align="center">'.$booking_class.'</td>';
            $html .= '<td align="center">'.$booking_code .'</td>';
            $html .= '</tr>';
            $stt ++;
        }
        return $html;         
     }

        function bean_implements($interface){
            switch($interface){
                case 'ACL':return true;
            }
            return false;
        }
    }
?>
