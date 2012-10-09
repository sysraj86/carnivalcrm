<?php
    require_once('modules/ServiceBookings/ServiceBookings.php');
    require_once('modules/ServiceBookings/Forms.php');

    class Viewexport2word extends SugarView{
        var $ss ;
        function Viewexport2word() {
            parent::SugarView();
        }

        function display(){
            global $sugar_config,$mod_strings,$app_strings;
            $focus = new ServiceBookings();
            $db = DBManagerFactory::getInstance(); 
            // ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
            // A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR

            $record    = isset($_GET["record"]) ? htmlspecialchars($_GET["record"]) : '';

            $template = file_get_contents('modules/ServiceBookings/tpls/export.tpl');

            //$sql = "select * from tours where id ='".$record."' and deleted = 0";
            $sql = "
                SELECT
                  srv.code,
                  srv.res_address,
                  srv.attn_res_name,
                  srv.attn_res_phone,
                  srv.res_tel,
                  srv.res_fax,
                  srv.company,
                  srv.attn_name,
                  srv.attn_phone,
                  srv.attn_id,
                  srv.attn_email,
                  srv.attn_tel,
                  srv.attn_fax,
                  srv.nationlity,
                  srv.notes,
                  srv.confirmed,
                  srv.date,
                  srv.deparment,
                  srv.date_time,
                  srv.operating_date,
                  srv.quantity_pax,
                  srv.guide,
                  srv.guide_id,
                  srv.guide_phone,
                  ser.name,
                  ser.code as ser_code,
                  grp.groupprogram_code
                FROM servicebookings srv
                  LEFT JOIN services_sevicebookings_c sersvr
                    ON srv.id = sersvr.services_sb358ookings_idb
                      AND sersvr.deleted = 0
                  LEFT JOIN services ser
                    ON ser.id = sersvr.services_sde2fervices_ida
                      AND ser.deleted = 0
                  LEFT JOIN groupprogravicebookings_c grpsrv
                    ON srv.id = grpsrv.groupprogrf47aookings_idb
                      AND grpsrv.deleted = 0
                  LEFT JOIN groupprograms grp
                    ON grpsrv.groupprogr0d2frograms_ida = grp.id
                      AND grp.deleted = 0
                WHERE srv.deleted = 0
                    AND srv.id = '".$record."'
            ";
   
    
            $result = $db->query($sql);
            $row = $db->fetchByAssoc($result); 
            $template = str_replace("{LBL_TO}",$mod_strings['LBL_TO'],$template );
            $template = str_replace("{LBL_RES_ADDRESS}",$mod_strings['LBL_RES_ADDRESS'],$template );
            $template = str_replace("{LBL_ATTN_RES_NAME}",$mod_strings['LBL_ATTN_RES_NAME'],$template );
            $template = str_replace("{LBL_RES_TEL}",$mod_strings['LBL_RES_TEL'],$template );
            $template = str_replace("{LBL_RES_FAX}",$mod_strings['LBL_RES_FAX'],$template );
            $template = str_replace("{LBL_FROM}",$mod_strings['LBL_FROM'],$template );
            $template = str_replace("{LBL_ATTN_NAME}",$mod_strings['LBL_ATTN_NAME'],$template );
            $template = str_replace("{LBL_EMAIL}",$mod_strings['LBL_EMAIL'],$template );
            $template = str_replace("{LBL_ATTN_PHONE}",$mod_strings['LBL_ATTN_PHONE'],$template );
            $template = str_replace("{LBL_FAX}",$mod_strings['LBL_FAX'],$template );
            $template = str_replace("{LBL_TITLE}",$mod_strings['LBL_TITLE'],$template );
            $template = str_replace("{LBL_OPERATING_DATE}",$mod_strings['LBL_OPERATING_DATE'],$template );
            $template = str_replace("{LBL_MADE_TOUR}",$mod_strings['LBL_MADE_TOUR'],$template );
            $template = str_replace("{LBL_NATIONLITY}",$mod_strings['LBL_NATIONLITY'],$template );
            $template = str_replace("{LBL_QUANTITY_PAX}",$mod_strings['LBL_QUANTITY_PAX'],$template );
            $template = str_replace("{LBL_GUIDE}",$mod_strings['LBL_GUIDE'],$template );
            $template = str_replace("{LBL_SERVICE}",$mod_strings['LBL_SERVICE'],$template );
            $template = str_replace("{LBL_QUANTITY}",$mod_strings['LBL_QUANTITY'],$template );
            $template = str_replace("{LBL_UNITPRICE}",$mod_strings['LBL_UNITPRICE'],$template );
            $template = str_replace("{LBL_MENU}",$mod_strings['LBL_MENU'],$template );
            $template = str_replace("{LBL_NOTICE}",$mod_strings['LBL_NOTICE'],$template );
            $template = str_replace("{LBL_CONFIRM_SERVICE}",$mod_strings['LBL_CONFIRM_SERVICE'],$template );
            $template = str_replace("{LBL_DATE}",$mod_strings['LBL_DATE'],$template );
            $template = str_replace("{LBL_CONFIRM_CARNIVAL}",$mod_strings['LBL_CONFIRM_CARNIVAL'],$template );
            
            /////////////  
            $template = str_replace("{SITE_URL}",$sugar_config['site_url'],$template );  
            $template = str_replace("{RES}",$row['name'],$template);
            $template = str_replace("{ADDRESS}",$row['res_address'],$template);
            $template = str_replace("{ATTN_RES_NAME}",$row['attn_res_name'],$template);
            $template = str_replace("{ATTN_RES_PHONE}",$row['attn_res_phone'],$template );  
            $template = str_replace("{RES_TEL}", $row['res_tel'],$template); 
            $template = str_replace("{RES_FAX}",$row['res_fax'],$template );  
            $template = str_replace("{FROM}", $row['company'],$template);  
            $template = str_replace("{ATTN_NAME}", $row['attn_name'],$template ); 
            $template = str_replace("{ATTN_PHONE}", $row['attn_phone'],$template); 
            $template = str_replace("{ATTN_EMAIL}", $row['attn_email'],$template); 
            $template = str_replace("{TEL}", $row['attn_tel'],$template);  
            $template = str_replace("{FAX}",  $row['attn_fax'],$template);  
            $template = str_replace("{DATE_TIME}",  $row['date_time'],$template);  
            $template = str_replace("{OPERATING_DATE}",  $row['operating_date'],$template);  
            $template = str_replace("{QUANTITY_PAX}",  $row['quantity_pax'],$template);  
            $template = str_replace("{GUIDE}",  $row['guide'],$template);  
            $template = str_replace("{GUIDE_PHONE}",  $row['guide_phone'],$template);  
            $template = str_replace("{MADETOUR}",   $row['groupprogram_code'],$template);  
            if(!empty($row['nationlity'])){
                $template = str_replace("{NATIONLITY}", translate('countries_dom','',$row['nationlity']),$template);
            }else{
                $template = str_replace("{NATIONLITY}", "",$template); 
            } 
            $template = str_replace("{BOOKINGLINE}", $focus->get_servicebooking_detailview($record),$template);  
            $template = str_replace("{NOTES}", html_entity_decode(nl2br($row['notes'])),$template);  
            if($row['confirmed']== 0 ){
               $template = str_replace("{CONFIRM}", 'No',$template); 
            }
            else {$template = str_replace("{CONFIRM}", 'Yes',$template); }
            $template = str_replace("{DATE}", date("d/m/Y",strtotime($row['date'])),$template);    
            $template = str_replace("{DEPARMENT}", $row['deparment'],$template);    
            
            
            $size=strlen($template);
            $filename = "Service_Booking_".$row['code']."_To_".$row['ser_code'].".doc";
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
