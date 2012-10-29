<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/Sugarpdf/sugarpdf/sugarpdf.smarty.php');

class ToursSugarpdfBasic extends SugarpdfSmarty{
    
    function preDisplay(){
        parent::preDisplay();
        
        // Bat hien thi header & footer
        $this->print_header = true;
        $this->print_footer = true;
        
        $this->fileName = 'Tour.pdf';
        $this->SetFont('freeserif','',8);
        
        // Khai bao duong dan den file tpl
        $this->templateLocation = "custom/modules/Tours/tpls/basic_pdf.tpl";
        
        // Thiet lap header
        $this->setHeaderData("company_logo.png", "50", "Tours Details", "Export from SugarCRM");

        // Assign data sang tpl        
        $record = isset($_GET["record"]) ? htmlspecialchars($_GET["record"]) : '';
        $tour = new Tour();
        $tour->retrieve($record);
        
        $this->ss->assign('NAME', $this->bean->name);
        $this->ss->assign('TOUR_NOTE',html_entity_decode_utf8($tour->description));
        $this->ss->assign('CODE',$tour->tour_code);
        $this->ss->assign('TRANSPORT',$tour->transport2);
        $this->ss->assign('START_DATE',$tour->start_date);
        $this->ss->assign('DURATION',$tour->duration);
        
        if($tour->picture && file_exists($sugar_config['site_url']."/modules/images/".$tour->picture)){
            $main_picture = '<img width="627" height="312" src="'.$sugar_config['site_url']."/modules/images/".$tour->picture.'" >';   
        }else{
            $main_picture = '';
        }
        
        $this->ss->assign('PICTURE', $main_picture);        
        $this->ss->assign('TOUR_PROGRAM_LINES',html_entity_decode_utf8($tour->get_data_to_export2pdf()));
        
        // Cleanup cache file
        ob_clean();
        /*$this->ss->assign("PHONE_OFFICE", $this->bean->phone_office);
        $this->ss->assign("WEBSITE", $this->bean->website);
        $this->ss->assign("PHONE_FAX", $this->bean->phone_fax);
        $this->ss->assign("ADDRESS", $this->bean->billing_address_street .' - '. $this->bean->billing_address_city . ' - '. $this->bean->billing_address_country);
        $this->ss->assign("ACCOUNT_TYPE", $this->bean->account_type);
        $this->ss->assign("INDUSTRY", $this->bean->industry);
        $this->ss->assign("ANNUAL_REVENUE", $this->bean->annual_revenue);
        $this->ss->assign("RATING", $this->bean->rating);*/
    }
}
