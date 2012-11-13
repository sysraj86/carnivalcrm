<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/Sugarpdf/sugarpdf/sugarpdf.smarty.php');
require_once("custom/include/MPDF/mpdf.php");

class ToursSugarpdfBasic extends SugarpdfSmarty{

    function preDisplay(){
        parent::preDisplay();
        
        $tour = new Tour();
        
        $html = file_get_contents("custom/modules/Tours/tpls/basic_pdf.tpl");
        $html = str_replace("{NAME}", $this->bean->name, $html);
        
        $desc = html_entity_decode_utf8($this->bean->description);
        $desc = $tour->removeHtmlTags($desc);
        
        $html = str_replace("{TOUR_NOTE}", $desc, $html);
        
        $picture = '<img width="627" height="312" src="modules/images/'.$this->bean->picture.'">';
        
        $html = str_replace("{PICTURE}", $picture, $html);
        $html = str_replace("{CODE}", $this->bean->tour_code, $html);
        $html = str_replace("{DURATION}", $this->bean->duration, $html);
        $html = str_replace("{TRANSPORT}", $this->bean->transport2, $html);
        $html = str_replace("{START_DATE}", $this->bean->start_date, $html);
        
        $program = html_entity_decode_utf8($tour->get_data_to_export2pdf($_GET['record']));
        
        $html = str_replace("{TOUR_PROGRAM_LINES}", $program, $html);
        
        // Xuat ra pdf
        $mpdf=new mPDF("vi");
        $mpdf->SetFooter('{PAGENO}');
        $mpdf->WriteHTML($html);
        $mpdf->Output("Tour.pdf", "D");
        exit;
    }
}
