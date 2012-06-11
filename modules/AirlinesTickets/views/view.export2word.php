<?php
    require_once('modules/AirlinesTickets/AirlinesTickets.php');
    require_once('modules/ServiceBookings/Forms.php');

    class Viewexport2word extends SugarView{
        var $ss ;
        function Viewexport2word() {
            parent::SugarView();
        }

        function display(){
            global $sugar_config;
            $focus = new AirlinesTickets();
            $db = DBManagerFactory::getInstance(); 
            // ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
            // A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR

            $record    = isset($_GET["record"]) ? htmlspecialchars($_GET["record"]) : '';
            $sql = "SELECT
            f.last_name,
            f.first_name,
            f.phone_mobile,
            airt.itinerary,
            acc.name       AS accname,
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
            AND airt.id = '".$record."'";
            $result = $db->query($sql);
            $countGIT = $db->getRowCount($result);

            $sql1 = "SELECT
            f.last_name ,f.first_name,f.phone_mobile,airt.itinerary, air.name
            FROM
            airlines air INNER JOIN airlines_ailinestickets_c airair ON air.id = airair.airlines_a476cirlines_ida
            INNER JOIN airlinestickets airt ON airt.id = airair.airlines_a1d09tickets_idb INNER JOIN
            airlinestickets_fits_c airf ON airt.id = airf.airlinestia31ctickets_ida INNER JOIN fits f ON
            f.id = airf.airlinestib0dfitsfits_idb 
            WHERE f.deleted =0 AND air.deleted =0 AND airair.deleted =0 AND airf.deleted =0 AND airt.deleted =0 AND airt.id ='".$record."'";
            $result1 = $db->query($sql1);
            $countFIT = $db->getRowCount($result1);

            $sql2 = "
            SELECT 
            airt.tax_fee_change, 
            airt.nett, 
            airt.roe, 
            airt.equivalent_in_vn, 
            airt.messenger, 
            airt.airlines_representative, 
            airt.ticket_agency,
            airt.name as name,
            air.name as airline
            FROM 
            airlinestickets airt  INNER JOIN airlines_ailinestickets_c airairt ON airt.id = airairt.airlines_a1d09tickets_idb
            INNER JOIN airlines air ON air.id = airairt.airlines_a476cirlines_ida WHERE air.deleted =0  AND airt.deleted =0 AND airairt.deleted =0 and airt.id='".$record."'";

            $result2 = $db->query($sql2);
            $row = $db->fetchByAssoc($result2);

            $template = '';

            if($countGIT != 0 && $countFIT == 0){
                $template = file_get_contents('modules/AirlinesTickets/tpls/ExportGIT.tpl');
            }
            else if($countFIT != 0 && $countGIT == 0){
                    $template = file_get_contents('modules/AirlinesTickets/tpls/ExportFIT.tpl');
                }
                else{
                    $template = file_get_contents('modules/AirlinesTickets/tpls/Export.tpl');
            }

            $template = str_replace("{SITE_URL}",$sugar_config['site_url'],$template );
            $template = str_replace("{NAME}",$row['name'],$template );  
            $template = str_replace("{AIRLINE}",$row['airline'],$template );            
            $template = str_replace("{MESSENGER}",$row['messenger'],$template );            
            $template = str_replace("{AIRLINESREPRESENTATIVE}",$row['airlines_representative'],$template );            
            $template = str_replace("{TICKETAGENCY}",$row['ticket_agency'],$template );            
            $template = str_replace("{FARE}",$row['fare'],$template );            
            $template = str_replace("{COMMISSON}",$row['commison'],$template );            
            $template = str_replace("{TAXFEECHANGE}",$row['tax_fee_change'],$template );            
            $template = str_replace("{NETT}",$row['nett'],$template );            
            $template = str_replace("{ROE}",$row['roe'],$template );            
            $template = str_replace("{EQUIVALENT}",$row['equivalent_in_vn'],$template );            
            $template = str_replace("{GIT_LIST}",$focus->get_gits_list($record),$template );  
            $template = str_replace("{FIT_LIST}",$focus->get_fits_list($record),$template );  

            $size=strlen($template);
            $filename = "Danh Sach Ve May Bay ".$row['name'].".doc";
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
