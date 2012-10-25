<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/Sugarpdf/sugarpdf/sugarpdf.smarty.php');

class ToursSugarpdfBasic extends SugarpdfSmarty{
    
    function preDisplay(){
        parent::preDisplay();
        
        // Bat hien thi header & footer
        $this->print_header = true;
        $this->print_footer = true;
        
        $this->fileName = 'tour.pdf';
        $this->SetFont('freeserif','',8);
        
        // Khai bao duong dan den file tpl
        $this->templateLocation = "custom/modules/Tours/tpls/basic_pdf.tpl";
        
        // Thiet lap header
        $this->setHeaderData("company_logo.png", "50", "Tours Details", "Export from SugarCRM");

        // Assign data sang tpl
        $this->ss->assign("NAME", $this->bean->name);
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
