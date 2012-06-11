<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   

    class  Worksheets extends SugarBean{

        var $new_schema = true;
        var $module_dir = 'Worksheets';
        var $object_name = 'Worksheets';
        var $table_name = 'worksheets';
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
        var $worksheet_code;
        var $noidung;
        var $worksheet_tour_id;

        function Worksheets(){
            $this->worksheet_tour_id = $id;
            global $sugar_config;
            $noidung = new stdClass();
            parent::SugarBean();

        }
        function getId(){
            $id = $this->worksheet_tour_id ;
            return $id;
        }
        function get_summary_text() {
            return "$this->name";
        }

        // loading restaurant data
        function getRestaurantData($id = ''){
            global $db;
            $nhArr = array();
            $sql = "SELECT
            res.id,res.NAME, res.giathamkhao,res.area FROM restaurants res INNER JOIN tours_restaurants_c tres ON res.id = tres.tours_rest15fcaurants_idb
            WHERE res.deleted = 0 AND tres.deleted = 0 AND tres.tours_rest8203tstours_ida ='".$id."'";
            $result = $db->query($sql);
            while($rownh = $db->fetchByAssoc($result)){
                $nhArr[] = array('id'=>$rownh['id'], 'area'=>$rownh['area'], 'name'=>$rownh['NAME'], 'giathamkhao' => $rownh['giathamkhao']);
            }
            return $nhArr;

        }

        // loading hotel data
        function getHotelData($id = ''){
            global $db;
            $sqlks =  "SELECT h.name,h.id ,h.giathamkhao,h.area,h.standard
            FROM hotels h INNER JOIN tours_hotels_c th ON h.id = th.tours_hote9da4shotels_idb 
            WHERE h.deleted = 0 AND th.deleted = 0 AND th.tours_hote943flstours_ida = '".$id."'";
            $resultks = $db->query($sqlks);
            $ksArr = array();
            while($rowks = $db->fetchByAssoc($resultks)){
                $ksArr[] = array('id'=>$rowks['id'], 'area'=>$rowks['area'],'standard'=>$rowks['standard'], 'name'=>$rowks['name'], 'giathamkhao' => $rowks['giathamkhao']);
            }
            return $ksArr;
        }

        // loading Transport data
        function getTransportData($id = ''){
            global $db;
            $sqlvc = "SELECT c.giathamkhao,c.number_plates, c.id,c.numofseat,c.area
            FROM cars c INNER JOIN tours_cars_c tc ON c.id = tc.tours_carsc2eearscars_idb
            WHERE c.deleted = 0 AND tc.deleted = 0 AND tc.tours_cars571brstours_ida = '".$id."'" ;
            $resultvc = $db->query($sqlvc);
            $vcArr = array();
            while($rowvc = $db->fetchByAssoc($resultvc)){
                $vcArr[] = array('id'=>$rowvc['id'],'area'=>$rowvc['area'], 'name'=>$rowvc['numofseat'],'giathamkhao'=>$rowvc['giathamkhao']);
            }
            return $vcArr;
        }

        // loadding service data

        function getServiceData($id = ''){
            global $db;
            $sqlsv = "SELECT s.name,s.giathamkhao, s.id,s.area
            FROM services s INNER JOIN tours_services_c tsc ON s.id = tsc.tours_serv55f6ervices_idb
            WHERE s.deleted = 0 AND tsc.deleted = 0 AND tsc.tours_serv1f4cestours_ida ='".$id."'" ;
            $resultsv = $db->query($sqlsv);  
            $svArr = array();
            while($rowsv = $db->fetchByAssoc($resultsv)){
                $svArr[] = array('id'=>$rowsv['id'],'area'=>$rowsv['area'], 'name'=>$rowsv['name'],'giathamkhao'=>$rowsv['giathamkhao']);
            }
            return $svArr;
        }

        // loading sightseeing data

        function getSightseeingData($id = ''){
            global $db;
            $sqltq = "SELECT l.name, l.giathamkhao, l.id ,l.area
            FROM locations l INNER JOIN tours_locations_c tlc ON l.id = tlc.tours_loca4b3bcations_idb
            WHERE l.deleted = 0 AND tlc.deleted = 0 AND tlc.tours_loca3506nstours_ida ='".$id."'" ;
            $resulttq = $db->query($sqltq);
            $tqArr = array();
            while($rowtq = $db->fetchByAssoc($resulttq)){
                $tqArr[] = array('id'=>$rowtq['id'],'area'=>$rowtq['area'], 'name'=>$rowtq['name'],'giathamkhao'=>$rowtq['giathamkhao']);
            }
            return $tqArr;
        }

        function getAirlineTicket ($id = ''){
            global $db;
            $airArrtk = array();
            $sql = "SELECT airtk.name , airtk.area, airtk.id
            FROM airlinestickets airtk INNER JOIN tours_airlinestickets_1_c tairtk ON airtk.id = tairtk.tours_airlefbatickets_idb
            WHERE airtk.deleted = 0 AND tairtk.deleted = 0 AND tairtk.tours_airlaf74_1tours_ida='".$id."'"; 
            $result = $db->query($sql/*"CALL getAirlineTicket('".$id."')"*/);
            while($row = $db->fetchByAssoc($result)){
                $airArrtk[] = array('id' => $row['id'], 'name'=> $row['name'], 'area'=>$row['area']);
            }
            return $airArrtk;
        }

        /***
        * Function get list destination of  tour_id
        * 
        * @param mixed $tour_id
        */
        function getListDestination($tour_id = ''){
            global $db;
            $listDestination = array();
            $sql = "SELECT des.name, des.area,des.id
            FROM destinations  des INNER JOIN tours_destinations_c tdes ON des.id = tdes.tours_destecacnations_idb
            WHERE des.deleted = 0 AND tdes.deleted =0 AND tdes.tours_dest10d5nstours_ida = '".$tour_id."'";
            $result = $db->query($sql);
            while($row = $db->fetchByAssoc($result)){
                $listDestination[] = array('id' => $row['id'], 'name' => $row['name'], 'area' => $row['area']);
            }
            return $listDestination;

        }
        
        function getCostGuide($tour_id = '',$area =''){
            global $db;
            $costguide = array();
            $query ="SELECT cg.congtacphi,cg.chiphikhachsan,cg.cacbuaan,cg.chiphivemaybay,cg.chiphivetau,cg.chiphivexe,cg.chiphianngu,cg.chihdvhalong
            FROM
            costguides cg LEFT JOIN tours_costguides_c tcg ON cg.id = tcg.tours_cost5ff4tguides_idb 
            WHERE cg.deleted = 0 AND tcg.deleted = 0 AND tcg.tours_costd7b8estours_ida='".$tour_id."' AND cg.area = '".$area."'";
            $result = $db->query($query);
            while($row = $db->fetchByAssoc($result)){
                $costguide =  $row;
            }
            return  $costguide;
        }

        function bean_implements($interface){
            switch($interface){
                case 'ACL':return true;
            }
            return false;
        }
    }
?>
