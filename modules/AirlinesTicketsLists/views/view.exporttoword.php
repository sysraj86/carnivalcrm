<?php
    
require_once('modules/AirlinesTicketsLists/AirlinesTicketsLists.php');
    class Viewexporttoword extends SugarView{
        var $ss ;
        function Viewexporttoword() {
            parent::SugarView();
        }

        function display(){
            $focus = new AirlinesTicketsLists();
            $ss = new Sugar_Smarty();
            $db = DBManagerFactory::getInstance(); 
            // ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
            // A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR

            $record = isset($_GET["record"]) ? htmlspecialchars($_GET["record"]) : '';

            $template = file_get_contents('modules/AirlinesTicketsLists/tpls/export.tpl');
            $sql = "Select * From AirlinesTicketsLists p Where p.id = '".$record."' And p.deleted = 0";
            $result = $db->query($sql); 
            $row = $db->fetchByAssoc($result);
            $fromitinerary = "";
            $itinerary = "";
            $time = "";
            $itinerary2 = "";
            $time2 = "";
            $template = str_replace("{FIT_RECORE}", $focus->get_AirlinesTickets_list($record,$fromitinerary,$itinerary,$time,$itinerary2,$time2),$template);     
            $template = str_replace("{TITLE}", $row['name'],$template);
            $template = str_replace("{FROM}", $fromitinerary,$template);
            $template = str_replace("{CHUYENBAY1}", $itinerary,$template);
            $template = str_replace("{TIME1}", $time,$template); 
            $template = str_replace("{CHUYENBAY2}", $itinerary2,$template);
            $template = str_replace("{TIME2}", $time2,$template);  
            $size=strlen($template);
            $filename = "DANH_SACH_DOAN_".strtoupper($row['code']).".doc";
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
