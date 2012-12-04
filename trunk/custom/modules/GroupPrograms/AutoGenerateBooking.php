<?php
require_once("include/utils.php");
require_once("custom/include/utils.php");
  if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    class AutoGenerateBooking {
        function Generate(&$bean, $event, $arguments){
            global $db;
            $worksheet = new Worksheets();
            $worksheet->retrieve($bean->groupprogr53b5ksheets_idb);
            $temp = base64_decode($worksheet->content);
            $noidung = json_decode($temp);
            
            // Tao AirTranBooking:
            foreach($noidung->vemaybay as $chuyenbay){
                if($this->createAirTrainBooking($bean,$chuyenbay)){
                    $GLOBALS['log']->fatal('Mot AirTransBooking da duoc tao thanh cong.');
                }else{
                    $GLOBALS['log']->fatal('Mot AirTransBooking da duoc tao that bai.');
                }
            }
            // Tao TranSportBooking:
            foreach($noidung->vanchuyen as $vanchuyen){
                if($this->createTransportBooking($bean,$vanchuyen)){
                    $GLOBALS['log']->fatal('Mot TransportBooking da duoc tao thanh cong.');
                }else{
                    $GLOBALS['log']->fatal('Mot TransportBooking da duoc tao that bai.');
                }
            }
            // Tao RestaurantBooking:
            foreach($noidung->nhahang as $nhahang){
                if($this->createRestaurantBooking($bean,$nhahang)){
                    $GLOBALS['log']->fatal('Mot RestaurantBooking da duoc tao thanh cong.');
                }else{
                    $GLOBALS['log']->fatal('Mot RestaurantBooking da duoc tao that bai.');
                }
            }
            // Tao RoomBooking:
            foreach($noidung->khachsan as $khachsan){
                if($this->createRoomBooking($bean,$khachsan)){
                    $GLOBALS['log']->fatal('Mot RoomBooking da duoc tao thanh cong.');
                }else{
                    $GLOBALS['log']->fatal('Mot RoomBooking da duoc tao that bai.');
                }
            }
            // Tao ServiceBooking:
            foreach($noidung->dichvu as $dichvu){
                if($this->createServiceBooking($bean,$dichvu)){
                    $GLOBALS['log']->fatal('Mot ServiceBooking da duoc tao thanh cong.');
                }else{
                    $GLOBALS['log']->fatal('Mot ServiceBooking da duoc tao that bai.');
                }
            }
            
        }
        function createAirTrainBooking($bean,$chuyenbay=''){
            global $db;
            $sql = "
            SELECT 
              a.id 
            FROM
              `airlinestickets` a 
              JOIN `airlines_ailinestickets_c` b 
                ON a.`id` = b.`airlines_a1d09tickets_idb` 
                AND b.`deleted` = 0 
                AND b.`airlines_a476cirlines_ida` = '{$chuyenbay->vemaybay}' 
              JOIN `groupprogralinestickets_c` c 
                ON a.`id` = c.`groupprogr8400tickets_idb` 
                AND c.`deleted` = 0 
                AND c.`groupprogr0fd9rograms_ida` = '{$bean->id}' 
            WHERE a.`deleted` = 0 
            ";
            $airTrainBooking = new AirlinesTickets();
            $result = $db->query($sql);
            while($row = $db->fetchByAssoc($result)){
               $airTrainBooking->id = $row['id']; 
            }
            $airTrainBooking->groupprograestickets_name = $bean->name;
            $airTrainBooking->groupprogr0fd9rograms_ida = $bean->id;
            $airTrainBooking->airlines_a476cirlines_ida = $chuyenbay->vemaybay;
            $airline = new Airline();
            $getname_input = array('name' => 'id','value'=>$chuyenbay->vemaybay);
            $airTrainBooking->airlines_aiestickets_name = getName($airline->table_name,$getname_input);
            $airTrainBooking->name = $airTrainBooking->groupprograestickets_name.' - '.$airTrainBooking->airlines_aiestickets_name;
            $airTrainBooking->assigned_user_name = $bean->assigned_user_name;
            $airTrainBooking->assigned_user_id = $bean->assigned_user_id;
            $return = $airTrainBooking->save();
            return $return; 
        }
        function createTransportBooking($bean,$vanchuyen=''){
            global $db;
            $sql = "
            SELECT 
              a.id 
            FROM
              `transportbookings` a 
              JOIN `transports_portbookings_c` b 
                ON a.`id` = b.`transportsc2aeookings_idb` 
                AND b.`deleted` = 0 
              JOIN `cars` c 
                ON c.`transport_id` = b.`transports6e65nsports_ida` 
                AND c.`deleted` = 0 
                AND c.`id` = '{$vanchuyen->vanchuyen_name}' 
              JOIN `groupprograportbookings_c` d 
                ON d.`groupprogrdcceookings_idb` = a.`id` 
                AND d.`groupprogrd5earograms_ida` = '{$bean->id}' 
                AND d.`deleted` = 0 
            WHERE a.`deleted` = 0 
            ";
            $TransportBooking = new TransportBookings();
            $result = $db->query($sql);
            while($row = $db->fetchByAssoc($result)){
               $TransportBooking->id = $row['id']; 
            }
            $TransportBooking->groupprogratbookings_name = $bean->name;
            $TransportBooking->groupprogrd5earograms_ida = $bean->id;
            $sql = "
            SELECT 
              a.* 
            FROM
              `transports` a 
              JOIN cars b 
                ON b.`transport_id` = a.`id` 
                AND b.`deleted` = 0 
                AND b.`id` = '{$vanchuyen->vanchuyen_name}' 
            WHERE a.`deleted` = 0
            ";
            $result = $db->query($sql);
            $row = $db->fetchByAssoc($result);
            $TransportBooking->transports6e65nsports_ida = $row['id'];
            $TransportBooking->transports_tbookings_name = $row['name'];
            $TransportBooking->address = $row['address'];
            $TransportBooking->tel_to = $row['phone'];
            $TransportBooking->confirm = 0;
            $TransportBooking->name = 'Transport Bookings To '.$row['name'];
            $TransportBooking->assigned_user_name = $bean->assigned_user_name;
            $TransportBooking->assigned_user_id = $bean->assigned_user_id;
            $return = $TransportBooking->save();
            return $return; 
        }
        function createRestaurantBooking($bean,$nhahang=''){
            global $db;
            $sql = "
            SELECT 
              a.id 
            FROM
              `restaurantbookings` a 
              JOIN `restaurantsrantbookings_c` b 
                ON a.`id` = b.`restaurantd663ookings_idb` 
                AND b.`deleted` = 0 
                AND b.`restaurant437baurants_ida` = '{$nhahang->nh_id}' 
              JOIN `groupprograrantbookings_c` c 
                ON c.`groupprogre72bookings_idb` = a.`id` 
                AND c.`deleted` = 0 
                AND c.`groupprogr880erograms_ida` = '{$bean->id}' 
            WHERE a.`deleted` = 0 
            ";
            $RestaurantBooking = new RestaurantBookings();
            $result = $db->query($sql);
            while($row = $db->fetchByAssoc($result)){
               $RestaurantBooking->id = $row['id']; 
            }
            $RestaurantBooking->groupprogratbookings_name = $bean->groupprogram_code;
            $RestaurantBooking->groupprogr880erograms_ida = $bean->id;
            $restaurant = new Restaurants();
            $restaurant->retrieve($nhahang->nh_id);
            $RestaurantBooking->restaurant437baurants_ida = $restaurant->id;
            $RestaurantBooking->restaurantstbookings_name = $restaurant->name; 
            $RestaurantBooking->res_address = $restaurant->address;
            $RestaurantBooking->res_tel = $restaurant->tel;
            $RestaurantBooking->res_fax = $restaurant->fax;
            $RestaurantBooking->confirm = 0;
            $RestaurantBooking->name = 'Restaurant Bookings To '.$restaurant->name;
            $RestaurantBooking->assigned_user_name = $bean->assigned_user_name;
            $RestaurantBooking->assigned_user_id = $bean->assigned_user_id;
            $return = $RestaurantBooking->save();
            return $return; 
        }
        function createRoomBooking($bean,$khachsan=''){
            global $db;
            $sql = "
            SELECT 
              a.id 
            FROM
              `roombookings` a 
              JOIN `hotels_roombookings_c` b 
                ON a.`id` = b.`hotels_rooc1a7ookings_idb` 
                AND b.`deleted` = 0 
                AND b.`hotels_rooc622shotels_ida` = '{$khachsan->ks_id}' 
              JOIN `groupprograroombookings_c` c 
                ON c.`groupprogr952fookings_idb` = a.`id` 
                AND c.`deleted` = 0 
                AND c.`groupprogra66erograms_ida` = '{$bean->id}' 
            WHERE a.`deleted` = 0 
            ";
            $RoomBooking = new RoomBookings();
            $result = $db->query($sql);
            while($row = $db->fetchByAssoc($result)){
               $RoomBooking->id = $row['id']; 
            }
            $RoomBooking->groupprogrambookings_name = $bean->groupprogram_code;
            $RoomBooking->groupprogra66erograms_ida = $bean->id;
            $hotel = new Hotels();
            $hotel->retrieve($khachsan->ks_id);
            $RoomBooking->hotels_rooc622shotels_ida = $hotel->id;
            $RoomBooking->hotels_roombookings_name = $hotel->name; 
            $RoomBooking->hotel_address = $hotel->address;
            $RoomBooking->hotel_tel = $hotel->tel;
            $RoomBooking->hotel_fax = $hotel->fax;
            $RoomBooking->confirm = 0;
            $RoomBooking->name = 'Room Bookings To '.$hotel->name;
            $RoomBooking->assigned_user_name = $bean->assigned_user_name;
            $RoomBooking->assigned_user_id = $bean->assigned_user_id;
            $return = $RoomBooking->save();
            return $return; 
        }
        function createServiceBooking($bean,$dichvu=''){
            global $db;
            $sql = "
            SELECT 
              a.id 
            FROM
              `servicebookings` a 
              JOIN `services_sevicebookings_c` b 
                ON a.`id` = b.`services_sb358ookings_idb` 
                AND b.`deleted` = 0 
                AND b.`services_sde2fervices_ida` = '{$dichvu->services_name}' 
              JOIN `groupprogravicebookings_c` c 
                ON c.`groupprogrf47aookings_idb` = a.`id` 
                AND c.`deleted` = 0 
                AND c.`groupprogr0d2frograms_ida` = '{$bean->id}' 
            WHERE a.`deleted` = 0  
            ";
            $ServiceBooking = new ServiceBookings();
            $result = $db->query($sql);
            while($row = $db->fetchByAssoc($result)){
               $ServiceBooking->id = $row['id']; 
            }
            $ServiceBooking->groupprograebookings_name = $bean->groupprogram_code;
            $ServiceBooking->groupprogr0d2frograms_ida = $bean->id;
            $service = new Services();
            $service->retrieve($dichvu->services_name);
            $ServiceBooking->services_sde2fervices_ida = $service->id;
            $ServiceBooking->services_seebookings_name = $service->name; 
            $ServiceBooking->res_address = $service->address;
            $ServiceBooking->res_tel = $service->tel;
            $ServiceBooking->res_fax = $service->fax;
            $ServiceBooking->confirm = 0;
            $ServiceBooking->name = 'Service Bookings To '.$service->name;
            $ServiceBooking->assigned_user_name = $bean->assigned_user_name;
            $ServiceBooking->assigned_user_id = $bean->assigned_user_id;
            $return = $ServiceBooking->save();
            return $return; 
        }
    }
?>
