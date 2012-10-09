<?php
    
require_once('modules/TransportBookings/TransportBookings.php');
    class Viewexporttoword extends SugarView{
        var $ss ;
        function Viewexporttoword() {
            parent::SugarView();
        }

        function display(){
            global $sugar_config,$mod_strings,$app_strings, $timedate;
            $focus = new TransportBookings();
            $ss = new Sugar_Smarty();
            $db = DBManagerFactory::getInstance(); 
            // ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
            // A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR

            $record = isset($_GET["record"]) ? htmlspecialchars($_GET["record"]) : '';
            
            $template = file_get_contents('modules/TransportBookings/tpls/Export.tpl');
            $sql = "SELECT 
            tb.address
            ,tb.code
            ,tb.attn_from_name
            ,tb.attn_from_phone
            ,tb.attn_to_name
            ,tb.attn_to_phone
            ,tb.confirm
            ,tb.date
            ,tb.email
            ,tb.from_co
            ,tb.fax_to
            ,tb.operator
            ,tb.tel_from
            ,tb.fax_from
            ,tb.tel_to
            ,tb.fax_to
            ,tb.vat
            ,tb.require_transports
            ,t.name
            ,t.code as t_code
            ,g.groupprogram_code
            FROM
                transportbookings tb INNER JOIN  transports_portbookings_c ttb ON tb.id = ttb.transportsc2aeookings_idb 
                INNER JOIN transports t ON ttb.transports6e65nsports_ida = t.id INNER JOIN groupprograportbookings_c gtb
                ON tb.id = gtb.groupprogrdcceookings_idb INNER JOIN groupprograms g ON g.id = gtb.groupprogrd5earograms_ida
                WHERE tb.deleted = 0 AND ttb.deleted = 0 AND t.deleted = 0 AND g.deleted = 0 AND gtb.deleted = 0 AND tb.id = '".$record."'";
            $result = $db->query($sql); 
            $row = $db->fetchByAssoc($result);
            
            $template = str_replace("{LBL_TO}", $mod_strings['LBL_TO'],$template);
            $template = str_replace("{LBL_ADDRESS}", $mod_strings['LBL_ADDRESS'],$template);
            $template = str_replace("{LBL_ATTN}", $mod_strings['LBL_ATTN'],$template);
            $template = str_replace("{LBL_TEL}", $mod_strings['LBL_TEL'],$template);
            $template = str_replace("{LBL_FAX}", $mod_strings['LBL_FAX'],$template);
            $template = str_replace("{LBL_FROM}", $mod_strings['LBL_FROM'],$template);
            $template = str_replace("{LBL_ATTN}", $mod_strings['LBL_ATTN'],$template);
            $template = str_replace("{LBL_EMAIL}", $mod_strings['LBL_EMAIL'],$template);
            $template = str_replace("{LBL_TEL}", $mod_strings['LBL_TEL'],$template);
            $template = str_replace("{LBL_TITLE}", $mod_strings['LBL_TITLE'],$template);
            $template = str_replace("{LBL_ROUTE}", $mod_strings['LBL_ROUTE'],$template);
            $template = str_replace("{LBL_DATELINE}", $mod_strings['LBL_DATELINE'],$template);
            $template = str_replace("{LBL_UNITPRICE}", $mod_strings['LBL_UNITPRICE'],$template);
            $template = str_replace("{LBL_TYPE}", $mod_strings['LBL_TYPE'],$template);
            $template = str_replace("{LBL_CONTENTLINE}", $mod_strings['LBL_CONTENTLINE'],$template);
            $template = str_replace("{LBL_REQUIRE}", $mod_strings['LBL_REQUIRE'],$template);
            $template = str_replace("{LBL_VAT1}", $mod_strings['LBL_VAT1'],$template);
            $template = str_replace("{LBL_VAT2}", $mod_strings['LBL_VAT2'],$template);
            $template = str_replace("{LBL_CONFIRM_SERVICE}",$mod_strings['LBL_CONFIRM_SERVICE'],$template );
            $template = str_replace("{LBL_DATE}", $mod_strings['LBL_DATE'],$template);
            $template = str_replace("{LBL_OPERATOR}", $mod_strings['LBL_OPERATOR'],$template);
            $template = str_replace("{LBL_CONFIRM_CARNIVAL}",$mod_strings['LBL_CONFIRM_CARNIVAL'],$template );
            
            //////////     
            $template = str_replace("{TRANSPORTS}", $row['name'],$template);     
            $template = str_replace("{SITE_URL}", $sugar_config['site_url'],$template);     
            $template = str_replace("{ADDRESS}", $row['address'],$template);
            $template = str_replace("{ATTN_TO_NAME}", $row['attn_to_name'],$template);  
            $template = str_replace("{ATTN_TO_PHONE}", $row['attn_to_phone'],$template);
            $template = str_replace("{TEL_TO}", $row['tel_to'],$template);     
            $template = str_replace("{FAX_TO}", $row['fax_to'],$template);
            $template = str_replace("{FROM_CO}", $row['from_co'],$template);  
            $template = str_replace("{ATTN_FROM_NAME}", $row['attn_from_name'],$template);
            $template = str_replace("{ATTN_FROM_PHONE}", $row['attn_from_phone'],$template);     
            $template = str_replace("{EMAIL}", $row['email'],$template);
            $template = str_replace("{TEL_FROM}", $row['tel_from'],$template);  
            $template = str_replace("{FAX_FROM}", $row['fax_from'],$template);
            $template = str_replace("{VAT}", $row['vat'],$template);  
            $template = str_replace("{REQUIRE}", html_entity_decode(nl2br($row['require_transports'])),$template);
            if($row['confirm'] == 0){
              $template = str_replace("{CONFIRM}", 'No',$template);  
            }
             else{
                $template = str_replace("{CONFIRM}", 'Yes',$template);   
             }
            $date = $timedate->to_display_date($row['date'], true);    
            $template = str_replace("{DATE}", $date,$template);
            $template = str_replace("{OPERATOR}", $row['operator'],$template);
            $template = str_replace("{TRANSPORTSBOOKING_LINE}", $focus->get_transportBookings_export($record),$template);
            $size=strlen($template);
            $filename = "Transport_Booking_".$row['code']."_To_".$row['t_code'].".doc";
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
