<?php
    
require_once('modules/PassportList/PassportList.php');
    class Viewexporttoword extends SugarView{
        var $ss ;
        function Viewexporttoword() {
            parent::SugarView();
        }

        function display(){
            $focus = new PassportList();
            $ss = new Sugar_Smarty();
            $db = DBManagerFactory::getInstance(); 
            // ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
            // A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR

            $record = isset($_GET["record"]) ? htmlspecialchars($_GET["record"]) : '';

            $template = file_get_contents('modules/PassportList/tpls/export.tpl');
            $sql = "Select p.name,gp.start_date_group,gp.end_date_group,p.code From passportlist p, groupprograpassportlist_c gpc,groupprograms gp Where p.id = '".$record."' And p.id = gpc.groupprogrc66dortlist_idb And gp.id = groupprogr20c9rograms_ida And p.deleted = 0 And gpc.deleted = 0 And gp.deleted = 0";
            $result = $db->query($sql); 
            $row = $db->fetchByAssoc($result);
            $template = str_replace("{FIT_RECORE}", $focus->get_passports_list($record),$template);     
            $template = str_replace("{TITLE}", $row['name'],$template);
            $template = str_replace("{NGAYBATDAU}", $row['start_date_group'],$template);  
            $template = str_replace("{NGAYKETTHUC}", $row['end_date_group'],$template);    
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
