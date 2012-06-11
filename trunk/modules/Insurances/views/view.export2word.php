<?php
    
require_once('modules/Insurances/Insurances.php');
    class Viewexport2word extends SugarView{
        var $ss ;
        function Viewexporttoword() {
            parent::SugarView();
        }

        function display(){
            global $sugar_config;
            $focus = new Insurances();
            $ss = new Sugar_Smarty();
            $db = DBManagerFactory::getInstance(); 
            // ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
            // A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR

            $record = isset($_GET["record"]) ? htmlspecialchars($_GET["record"]) : '';
            
            $template = file_get_contents('modules/Insurances/tpls/Export.tpl');
            $sql = "SELECT
                g.groupprogram_code
                ,g.tour_name
                ,g.end_date_group
                ,g.start_date_group
                ,gg.grouplists87eduplists_ida
                FROM
                  groupprograms g INNER JOIN groupprogras_insurances_c gi ON g.id = gi.groupprogr3b48rograms_ida INNER JOIN insurances ins 
                  ON ins.id = gi.groupprogr5003urances_idb
                  INNER JOIN grouplists_roupprograms_c gg ON g.id = gg.grouplistsf242rograms_idb   WHERE g.deleted = 0 AND gi.deleted = 0 AND gi.groupprogr5003urances_idb ='".$record."'";
            $result = $db->query($sql); 
            $row = $db->fetchByAssoc($result);
            
            $template = str_replace("{TOURNAME}", $row['tour_name'],$template);     
            $template = str_replace("{SITE_URL}", $sugar_config['site_url'],$template);     
            $template = str_replace("{CODE}", $row['groupprogram_code'],$template);
            $template = str_replace("{START_DATE}", $row['start_date_group'],$template);  
            $template = str_replace("{END_DATE}", $row['end_date_group'],$template);
            $template = str_replace("{SOLUONG}", $focus->get_count($record) ,$template);     
            $template = str_replace("{TEL}", '',$template);
            $template = str_replace("{FAX}", '',$template);  
            $template = str_replace("{LIST_FIT}", $focus->get_fit_to_export($record),$template);   
            $template = str_replace("{DATE}", date('d/m/Y'),$template);   
            $size=strlen($template);
            $filename = "DS bao Hiem ".$row['tour_name'].".doc";
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
