<?php
	require_once 'custom/include/phpword/PHPWord.php'; 

            $db = DBManagerFactory::getInstance(); 
            // ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
            // A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR

            $record    = isset($_GET["record"]) ? htmlspecialchars($_GET["record"]) : '';

            //$sql = "select * from tours where id ='".$record."' and deleted = 0";
            $sql = "SELECT
            r.hotel_address
            , r.attn_hotel_name
            , r.attn_hotel_phone
            , r.hotel_tel
            , r.hotel_fax
            , r.attn_name
            , r.attn_email
            , r.attn_tel
            , r.attn_fax
            , r.company
            , r.attn_phone
            , r.nationlity
            , r.confirmed
            , r.convention
            , r.cost
            , r.include
            , r.dining_plan
            , r.date
            , r.deparment
            , r.notes
            , ht.name
            ,gr.groupprogram_code
            FROM roombookings r INNER JOIN hotels_roombookings_c htr ON r.id =htr.hotels_rooc1a7ookings_idb INNER JOIN hotels ht ON htr.hotels_rooc622shotels_ida = ht.id
            INNER JOIN groupprograroombookings_c grr ON r.id = grr.groupprogr952fookings_idb INNER JOIN groupprograms gr ON grr.groupprogra66erograms_ida = gr.id
            WHERE r.deleted =0 AND htr.deleted=0 AND ht.deleted =0 AND grr.deleted =0 AND gr.deleted=0 AND r.id = '".$record."'";
    
            $result = $db->query($sql);
            $row = $db->fetchByAssoc($result); 

            // $template = str_replace("{SITE_URL}",$sugar_config['site_url'],$template );  
            // $template = str_replace("{HOTEL}",$row['name'],$template);
            // $template = str_replace("{ADDRESS}",$row['hotel_address'],$template);
            // $template = str_replace("{ATTN_HOTEL_NAME}",$row['attn_hotel_name'],$template);
            // $template = str_replace("{ATTN_HOTEL_PHONE}",$row['attn_hotel_phone'],$template );  
            // $template = str_replace("{HOTEL_TEL}", $row['hotel_tel'],$template); 
            // $template = str_replace("{HOTEL_FAX}",$row['hotel_fax'],$template );  
            // $template = str_replace("{FROM}", $row['company'],$template);  
            // $template = str_replace("{ATTN_NAME}", $row['attn_name'],$template ); 
            // $template = str_replace("{ATTN_PHONE}", $row['attn_phone'],$template); 
            // $template = str_replace("{ATTN_EMAIL}", $row['attn_name'],$template); 
            // $template = str_replace("{TEL}", $row['attn_tel'],$template);  
            // $template = str_replace("{FAX}",  $row['attn_fax'],$template);  
            // $template = str_replace("{MADETOUR}",   $row['groupprogram_code'],$template);  
            // if(!empty($row['nationlity'])){
                // $template = str_replace("{NATIONLITY}", translate('countries_dom','',$row['nationlity']),$template);
            // }
            // else{$template = str_replace("{NATIONLITY}", translate('countries_dom','',''),$template); } 
            // $template = str_replace("{BOOKINGLINE}", $focus->get_bookingroom_detailview($record),$template);  
            // $template = str_replace("{NOTES}", html_entity_decode(nl2br($row['notes'])),$template);  
            // $template = str_replace("{CONVENTION}", html_entity_decode(nl2br($row['convention'])),$template);  
            // $template = str_replace("{COST}", html_entity_decode(nl2br($row['cost'])),$template);  
            // $template = str_replace("{INCLUDE}", html_entity_decode(nl2br($row['include'])),$template);  
            // $template = str_replace("{DINING_PLAN}", html_entity_decode(nl2br($row['dining_plan'])),$template); 
            // if($row['confirmed']== 0 ){
               // $template = str_replace("{CONFIRM}", 'No',$template); 
            // }
            // else {$template = str_replace("{CONFIRM}", 'Yes',$template); }
            // $template = str_replace("{DATE}", date("d/m/Y",strtotime($row['date'])),$template);    
            // $template = str_replace("{DEPARMENT}", $row['deparment'],$template);    
            
			$PHPWord = new PHPWord();

			$document = $PHPWord->loadTemplate('modules/RoomBookings/tpls/roombooking_template.docx');

			$document->setValue('To', $row['name']);
			$document->setValue('ToAddress', $row['hotel_address']);
			$document->setValue('ToContactName', $row['attn_hotel_name']);
			$document->setValue('ToContactPhone', $row['attn_hotel_phone']);
			$document->setValue('Phone', $row['hotel_tel']);
			$document->setValue('Fax', html_entity_decode(nl2br($row['convention'])));

			$document->output('modules/RoomBookings/Room-Booking.docx');            


?>