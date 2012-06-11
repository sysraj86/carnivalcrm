<?php
     if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
     
     class  AirlinesTicketsLists extends SugarBean{
         
        var $new_schema = true;
        var $module_dir = 'AirlinesTicketsLists';
        var $object_name = 'AirlinesTicketsLists';
        var $table_name = 'AirlinesTicketsLists';
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
        var $type;
        var $description;
        
        function AirlinesTicketsLists(){
            global $sugar_config;
            parent::SugarBean();
        }
        function get_summary_text() {
            return "$this->name";
        }
        function get_AirlinesTickets_list($record,&$fromitinerary,&$itinerary,&$time,&$itinerary2,&$time2){
           global $sugar_config;
            $sql = "Select at.name as name,f.salutation as salutation,at.itinerary as itinerary,at.itinerary2 as itinerary2,at.flight_code as flight_code,at.flight_code2 as flight_code2,at.ticket_code as ticket_code,at.ticket_code2 as ticket_code2,at.time as time,at.time2 as time2,at.from_itinerary as from_itinerary From airlinesticlinestickets_c alc, airlinestickets at,fits_airlinestickets_c fac, fits f Where at.id = alc.airlinestibcd8tickets_idb And alc.airlinesti7e28tslists_ida = '".$record."' And fac.fits_airli790ctickets_idb = at.id And fac.fits_airli3e39etsfits_ida = f.id And alc.deleted = 0 And at.deleted = 0 And fac.deleted = 0 And f.deleted = 0";
            $result = $this->db->query($sql);
            $html = "";
           
            $i = 1;
            while ($row = $this->db->fetchByAssoc($result)) {
                    $fromitinerary = $row['from_itinerary'];
                    $itinerary =$row['itinerary'];
                    $time = $row['time'];
                    $itinerary2 =$row['itinerary2'];
                    $time2 = $row['time2'];
                     $html.="<tr>
                      <td align='center'>
                         ". $i."
                      </td>
                      <td align='center'>
                         ". $row['name']."
                      </td>
                      <td align='center'>
                         ". $row['salutation']."
                      </td>
                      <td align='center'>
                         ". $row['flight_code']."
                      </td>
                      <td align='center'>
                         ". $row['ticket_code']."
                      </td>
                      <td align='center'>
                         ". $row['flight_code2']."
                      </td>
                      <td align='center'>
                         ". $row['ticket_code2']."
                      </td>
                      
                   </tr>" ;
                $i++;
            }
            //echo $html;
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
