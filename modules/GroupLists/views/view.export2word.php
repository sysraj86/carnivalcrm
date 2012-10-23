<?php
    
require_once('modules/GroupLists/GroupLists.php');
    class Viewexport2word extends SugarView{
        var $ss ;
        function Viewexport2word() {
            parent::SugarView();
        }

        function display(){
            global $sugar_config, $timedate;
            $focus = new GroupLists();
            $ss = new Sugar_Smarty();
            $db = DBManagerFactory::getInstance(); 
            // ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
            // A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR

            $record = isset($_GET["record"]) ? htmlspecialchars($_GET["record"]) : '';
            
            $template = file_get_contents('modules/GroupLists/tpls/Export.tpl');
            $sql = "SELECT
                 g.groupprogram_code
                ,g.tour_name
                ,g.end_date_group
                ,g.start_date_group
                FROM
                  groupprograms g INNER JOIN grouplists_roupprograms_c ggr ON g.id = ggr.grouplistsf242rograms_idb 
                  INNER JOIN grouplists gl ON gl.id = ggr.grouplists87eduplists_ida 
                WHERE gl.deleted = 0 AND ggr.deleted = 0 AND g.deleted = 0 AND ggr.grouplists87eduplists_ida = '".$record."'";
            $result = $db->query($sql); 
            $row = $db->fetchByAssoc($result);
            
            $template = str_replace("{TOURNAME}", mb_strtoupper($row['tour_name'], 'utf-8'),$template);     
            $template = str_replace("{SITE_URL}", $sugar_config['site_url'],$template);     
            $template = str_replace("{CODE}", $row['groupprogram_code'],$template);
            $template = str_replace("{START_DATE}", $timedate->to_display_date($row['start_date_group'], true),$template);  
            $template = str_replace("{END_DATE}", $timedate->to_display_date($row['end_date_group'], true),$template);
            $template = str_replace("{SOLUONG}", $focus->get_count($record) ,$template);     
            $template = str_replace("{TEL}", '',$template);
            $template = str_replace("{FAX}", '',$template);  
            //$template = str_replace("{LIST_GIT}", $focus->get_GIT_to_report("('".$record."')"),$template);   
            $template = str_replace("{LIST_FIT}", $focus->get_customer_list("('".$record."')"),$template);   
            $template = str_replace("{DATE}", date('d/m/Y'),$template);   
            $size=strlen($template);
            $filename = "DS Doan ".mb_strtoupper($row['tour_name'], 'utf-8').".doc";
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
