<?php
    require_once('modules/RoomBookings/RoomBookings.php');
    require_once('modules/RoomBookings/Forms.php');

    class Viewexport2word extends SugarView{
        var $ss ;
        function Viewexport2word() {
            parent::SugarView();
        }

        function display(){
            global $sugar_config,$mod_strings,$app_strings;
            $focus = new RoomBookings();
            $db = DBManagerFactory::getInstance(); 
            // ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
            // A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR

            $record    = isset($_GET["record"]) ? htmlspecialchars($_GET["record"]) : '';

            $template = file_get_contents('modules/RoomBookings/tpls/export.tpl');

            
            $sql = "SELECT
            r.hotel_address
            , r.code
            , r.attn_hotel_name
            , r.attn_hotel_phone
            , r.hotel_tel
            , r.hotel_fax
            , r.assigned_user_id
            , r.attn_email
            , r.attn_tel
            , r.attn_fax
            , r.company
            , r.attn_phone
            , r.nationlity
            , r.confirmed
            , r.convention
            , r.date
            , r.deparment
            , r.notes
            , ht.name
            , ht.code as ht_code
            , u.last_name as user
            ,gr.groupprogram_code
            FROM roombookings r INNER JOIN hotels_roombookings_c htr ON r.id =htr.hotels_rooc1a7ookings_idb INNER JOIN hotels ht ON htr.hotels_rooc622shotels_ida = ht.id
            INNER JOIN groupprograroombookings_c grr ON r.id = grr.groupprogr952fookings_idb INNER JOIN groupprograms gr ON grr.groupprogra66erograms_ida = gr.id 
            INNER JOIN users u ON r.modified_user_id = u.id
            WHERE r.deleted =0 AND htr.deleted=0 AND ht.deleted =0 AND grr.deleted =0 AND gr.deleted=0 AND r.id = '".$record."'";
    
            $result = $db->query($sql);
            $row = $db->fetchByAssoc($result);
             
            $template = str_replace("{LBL_TO}",$mod_strings['LBL_TO'],$template );  
            $template = str_replace("{LBL_RES_ADDRESS}",$mod_strings['LBL_RES_ADDRESS'],$template );  
            $template = str_replace("{LBL_ATTN_HOTEL_NAME}",$mod_strings['LBL_ATTN_HOTEL_NAME'],$template );  
            $template = str_replace("{LBL_ATTN_HOTEL_PHONE}",$mod_strings['LBL_ATTN_HOTEL_PHONE'],$template );  
            $template = str_replace("{LBL_HOTEL_FAX}",$mod_strings['LBL_HOTEL_FAX'],$template );  
            $template = str_replace("{LBL_FROM}",$mod_strings['LBL_FROM'],$template );  
            $template = str_replace("{LBL_ATTN_NAME}",$mod_strings['LBL_ATTN_NAME'],$template );  
            $template = str_replace("{LBL_EMAIL}",$mod_strings['LBL_EMAIL'],$template );  
            $template = str_replace("{LBL_TEL}",$mod_strings['LBL_TEL'],$template );  
            $template = str_replace("{LBL_ATTN_FAX}",$mod_strings['LBL_ATTN_FAX'],$template );  
            $template = str_replace("{LBL_TITLE}",$mod_strings['LBL_TITLE'],$template );  
            $template = str_replace("{LBL_ROOM_RESERVATION}",$mod_strings['LBL_ROOM_RESERVATION'],$template );  
            $template = str_replace("{LBL_MADE_TOUR_CODE}",$mod_strings['LBL_MADE_TOUR_CODE'],$template );  
            $template = str_replace("{LBL_NATIONLITY}",$mod_strings['LBL_NATIONLITY'],$template );  
            $template = str_replace("{LBL_LINE_TYPE}",$mod_strings['LBL_LINE_TYPE'],$template );  
            $template = str_replace("{LBL_LINE_QUANTITY}",$mod_strings['LBL_LINE_QUANTITY'],$template );  
            $template = str_replace("{LBL_LINE_UNIT_PRICE}",$mod_strings['LBL_LINE_UNIT_PRICE'],$template );  
            $template = str_replace("{LBL_LINE_CHECK_IN}",$mod_strings['LBL_LINE_CHECK_IN'],$template );  
            $template = str_replace("{LBL_LINE_CHECK_OUT}",$mod_strings['LBL_LINE_CHECK_OUT'],$template );  
            $template = str_replace("{LBL_ROOM_CONVENTION}",$mod_strings['LBL_ROOM_CONVENTION'],$template );  
            $template = str_replace("{LBL_ROOM_OTHER_SERVICE}",$mod_strings['LBL_ROOM_OTHER_SERVICE'],$template );  
            $template = str_replace("{LBL_DATE}",$mod_strings['LBL_DATE'],$template );  
            $template = str_replace("{LBL_DEPARMENT}",$mod_strings['LBL_DEPARMENT'],$template );
            $template = str_replace("{LBL_CONFIRM_SERVICE}",$mod_strings['LBL_CONFIRM_SERVICE'],$template );  
            $template = str_replace("{LBL_CONFIRM_CARNIVAL}",$mod_strings['LBL_CONFIRM_CARNIVAL'],$template );  
            /////////////// 
            $template = str_replace("{SITE_URL}",$sugar_config['site_url'],$template );  
            $template = str_replace("{HOTEL}",$row['name'],$template);
            $template = str_replace("{ADDRESS}",$row['hotel_address'],$template);
            $template = str_replace("{ATTN_HOTEL_NAME}",$row['attn_hotel_name'],$template);
            $template = str_replace("{ATTN_HOTEL_PHONE}",$row['attn_hotel_phone'],$template );  
            $template = str_replace("{HOTEL_TEL}", $row['hotel_tel'],$template); 
            $template = str_replace("{HOTEL_FAX}",$row['hotel_fax'],$template );  
            $template = str_replace("{FROM}", $row['company'],$template);  
            //$template = str_replace("{ATTN_NAME}", $row['attn_name'],$template );
            $user = new User();
            $user->retrieve($row['assigned_user_id']); 
            $template = str_replace("{ATTN_NAME}", $user->name,$template ); 
            $template = str_replace("{ATTN_PHONE}", $row['attn_phone'],$template); 
            $template = str_replace("{ATTN_EMAIL}", $row['attn_email'],$template); 
            $template = str_replace("{TEL}", $row['attn_tel'],$template);  
            $template = str_replace("{FAX}",  $row['attn_fax'],$template);  
            $template = str_replace("{MADETOUR}",   $row['groupprogram_code'],$template);  
            if(!empty($row['nationlity'])){
                $template = str_replace("{NATIONLITY}", translate('countries_dom','',$row['nationlity']),$template);
            }
            else{$template = str_replace("{NATIONLITY}", translate('countries_dom','',''),$template); } 
            $template = str_replace("{BOOKINGLINE}", $focus->get_bookingroom_detailview($record),$template);  
            $template = str_replace("{NOTES}", html_entity_decode(nl2br($row['notes'])),$template);  
            $template = str_replace("{CONVENTION}", html_entity_decode(nl2br($row['convention'])),$template);  
            $template = str_replace("{SERVICE}", $focus->get_service_detail($record),$template);  
             
            if($row['confirmed']== 0 ){
               $template = str_replace("{CONFIRM}", 'No',$template); 
            }
            else {$template = str_replace("{CONFIRM}", 'Yes',$template); }
            $template = str_replace("{DATE}", date("d/m/Y",strtotime($row['date'])),$template);    
            $template = str_replace("{DEPARMENT}", $row['deparment'],$template);
            $template = str_replace("{USER}", $row['user'],$template);     
            
            
            $size=strlen($template);
            $filename = "Room_Booking_".$row['code']."_To_".$row['ht_code'].".doc";
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
