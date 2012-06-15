<?php
    require_once('modules/Tours/Tour.php');
    require_once('modules/Tours/Forms.php');

    class Viewexport2word extends SugarView{
        var $ss ;
        function Viewexport2word() {
            parent::SugarView();
        }

        function display(){
            $tour = new Tour();

            global $sugar_config;
           // $ss = new Sugar_Smarty();
            $db = DBManagerFactory::getInstance();
            // ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
            // A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR

            $record    = isset($_GET["record"]) ? htmlspecialchars($_GET["record"]) : '';
            $tour->retrieve($record);
            $template = file_get_contents('modules/Tours/tpls/exports/template-dos.htm');
            $template = str_replace('${SITE_URL}',$sugar_config['site_url'],$template);

            $template = str_replace('${TOUR_NOTE}',html_entity_decode_utf8($tour->description),$template);
            $template = str_replace('${CODE}',$tour->tour_code,$template);
            $template = str_replace('${NAME}',$tour->name, $template);
            $template = str_replace('${TRANSPORT}',$tour->transport2, $template);
            $template = str_replace('${START_DATE}',$tour->start_date, $template);
            $template = str_replace('${DURATION}',$tour->duration, $template);
            $template = str_replace('${PICTURE}',$sugar_config['site_url']."/modules/images/".$tour->picture, $template);
            $template = str_replace('${TOUR_PROGRAM_LINES}',html_entity_decode_utf8($tour->get_data_to_expor2word()),$template);
            $size=strlen($template);
            $filename = "TOUR_PROGRAM_".$tour->name.".doc";
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
