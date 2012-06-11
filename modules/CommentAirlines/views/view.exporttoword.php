<?php
    
require_once('modules/Insurances/Insurances.php');
    class Viewexporttoword extends SugarView{
        var $ss ;
        function Viewexporttoword() {
            parent::SugarView();
        }

        function display(){
            $focus = new Insurances();
            $ss = new Sugar_Smarty();
            $db = DBManagerFactory::getInstance(); 
            // ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
            // A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR

            $record = isset($_GET["record"]) ? htmlspecialchars($_GET["record"]) : '';

            $template = file_get_contents('modules/Insurances/tpls/export.tpl');
            
            $name = "";
            $start = "";
            $end = "";
            $canhan = "";
            $giadinh = "";
            $canhan = $focus->get_data_insurances_canhan($record,$name,$start,$end);
            $giadinh = $focus->get_data_insurances_giadinh($record,$name,$start,$end);  
            $template = str_replace("{CANHAN}",$canhan,$template);     
            $template = str_replace("{GIADINH}",$giadinh,$template); 
            $template = str_replace("{TITLE}", $name,$template);
            $template = str_replace("{NGAYBATDAU}", $start,$template);  
            $template = str_replace("{NGAYKETTHUC}", $end ,$template);    
            $size=strlen($template);
            $filename = strtoupper($name).".doc";
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
