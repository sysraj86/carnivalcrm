<?php
    require_once('modules/GuideContracts/GuideContracts.php');
    require_once('modules/GuideContracts/Forms.php');

    class Viewexport2word extends SugarView{
        var $ss ;
        function Viewexport2word() {
            parent::SugarView();
        }

        function display(){
            $focus = new GuideContracts();
            global $sugar_config;
            $ss = new Sugar_Smarty();
            $db = DBManagerFactory::getInstance(); 
            // ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
            // A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR

            $record    = isset($_GET["record"]) ? htmlspecialchars($_GET["record"]) : '';

            $template = file_get_contents('modules/GuideContracts/tpls/export.tpl');

            //$sql = "select * from tours where id ='".$record."' and deleted = 0";
            $sql = "SELECT
                c.number,c.date,c.months,c.year,c.company_name,c.address_a,c.phone_a,c.fax_a,c.salutation,c.representing_a,
                c.bonus,c.address_b,c.birthday,c.currency,c.passport_no,c.date_issued,c.date_start,c.date_end,
                c.inword,c.journey,c.partner,c.representative_a,c.representative_b,c.total_bonus
                ,c.tour_name,c.phone_b,c.num_of_date, g.name
            FROM
                guidecontracts c INNER JOIN travelguideidecontracts_c trc ON c.id = trc.travelguidde3cntracts_idb 
                INNER JOIN travelguides g ON trc.travelguidead0lguides_ida = g.id 
               WHERE c.deleted = 0 AND trc.deleted =0 AND g.deleted =0 AND c.id ='".$record."'";
                $result = $db->query($sql);
                $row = $db->fetchByAssoc($result); 
            
                $template = str_replace("{NUMBER}",$row['number'],$template);   
                $template = str_replace("{SITE_URL}",$sugar_config['site_url'],$template );  
                $template = str_replace("{DATE}",$row['date'],$template );  
                $template = str_replace("{THANG}", $row['months'],$template);  
                $template = str_replace("{YEAR}", $row['year'],$template ); 
                $template = str_replace("{COMPANY_NAME}", $row['company_name'],$template); 
                $template = str_replace("{ADDRESS_A}", $row['address_a'],$template); 
                $template = str_replace("{PHONE_A}", $row['phone_a'],$template);   
                $template = str_replace("{FAX_A}", $row['fax_a'],$template);   
                $template = str_replace("{SALUTATION}", $row['salutation'],$template);   
                $template = str_replace("{REPRESENTING_A}", $row['representing_a'],$template);  
                $template = str_replace("{REPRESENTING_B}", $row['name'],$template);  
                $template = str_replace("{BIRTHDAY}", $row['birthday'],$template);  
                $template = str_replace("{PASSPORT}", $row['passport_no'],$template);  
                $template = str_replace("{DATE_ISSUED}", $row['date_issued'],$template);  
                $template = str_replace("{PHONE_B}", $row['phone_b'],$template);  
                $template = str_replace("{ADDRESS_B}", $row['address_b'],$template);  
                $template = str_replace("{ADDRESS_B}", $row['address_b'],$template);  
                $template = str_replace("{TOUR_NAME}", $row['tour_name'],$template);  
                $template = str_replace("{DATE_START}", $row['date_start'],$template);  
                $template = str_replace("{DATE_END}", $row['date_end'],$template);  
                $template = str_replace("{JOURNEY}", $row['journey'],$template);  
                $template = str_replace("{PARTNER}", translate('partner_dom','',$row['partner']),$template);  
                $template = str_replace("{BONUS}", $row['bonus'],$template);  
                $template = str_replace("{CURRENCY}", translate('currency_dom','',$row['currency']) ,$template); 
                $template = str_replace("{NUM_OF_DATE}", $row['c.num_of_date'],$template);   
                $template = str_replace("{TOTAL_BONUS}", $row['total_bonus'],$template);   
                $template = str_replace("{INWORD}", $row['inword'],$template);   
                $template = str_replace("{EXPIRATION_DATE}", $row['expiration_date'],$template);   
                $template = str_replace("{REPRESENTATIVE_B}", $row['representative_b'],$template);   
                $template = str_replace("{REPRESENTATIVE_A}", $row['representative_a'],$template);    
                
                
                $size=strlen($template);
                $filename = "HỢP ĐỒNG HDV ".strtoupper($row['number']).".doc";
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
