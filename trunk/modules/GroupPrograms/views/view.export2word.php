<?php
    require_once('modules/GroupPrograms/GroupProgram.php');
    require_once('modules/GroupPrograms/Forms.php');

    class Viewexport2word extends SugarView{
        var $ss ;
        function Viewexport2word() {
            parent::SugarView();
        }

        function display(){
            $focus = new GroupProgram();
            $db = DBManagerFactory::getInstance(); 
            // ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
            // A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR

            $record    = isset($_GET["record"]) ? htmlspecialchars($_GET["record"]) : '';

            $template = file_get_contents('modules/GroupPrograms/tpls/export.tpl');

            //$sql = "select * from tours where id ='".$record."' and deleted = 0";
            $sql = "select * from groupprograms where id ='".$record."'And deleted =0";  
            $result = $db->query($sql);
            $row = $db->fetchByAssoc($result); 

             $template = str_replace("{NAME}",$row['git_name'],$template);
             $template = str_replace("{CODETOUR}",$row['groupprogram_code'],$template);
             $template = str_replace("{TOUR}",$row['tour_name'],$template);
            /*if(!empty($row['NAME'])){
                 $template = str_replace("{NAME}",$row['NAME'],$template ); 
            }
            else{
                 $template = str_replace("{NAME}",'',$template);
            }   */
            $template = str_replace("{START_DATE}",$row['start_date_group'],$template );  
            $template = str_replace("{END_DATE}", $row['end_date_group'],$template); 
            $template = str_replace("{NGAYBT}",$row['start_date_group'],$template );  
            $template = str_replace("{NGAYKT}", $row['end_date_group'],$template);  
            $template = str_replace("{TRUONGDOAN}", $row['team_leader'],$template ); 
            $template = str_replace("{LEADER_PHONE}", $row['leader_phone'],$template); 
            $template = str_replace("{GUIDE_PICK_UP}", $row['guide_pick_up_at_airport'],$template); 
            $template = str_replace("{PHONEGUIDE_PICK_UP}", $row['pick_up_phone'],$template);  
            $template = str_replace("{GUIDE}",  $row['guide'],$template);  
            $template = str_replace("{PHONEGUIDE}",   $row['guide_phone'],$template);              
            $template = str_replace("{ASSIGNED_TO}", $row['first_name'].' '.$row['last_name'],$template);  
            $template = str_replace("{OPERATOR}", $row['operator'],$template);  
            $template = str_replace("{PHONEOPERATOR}", $row['operator_phone'],$template);  
            $template = str_replace("{XEDONTIEN}", $focus->get_pick_up_car_export($record),$template);  
            $template = str_replace("{XETHAMQUAN}", $focus->get_sighitseeing_car_export($record),$template);  
            $template = str_replace("{DATATOEXPORT}", $focus->get_groupprogram_for_export($record),$template);  
            $template = str_replace("{QUANITY}", $focus->get_quanity($record),$template);
            $template = str_replace("{GROUP}", $focus->get_Group($record),$template);  
            
            
            $size=strlen($template);
            $filename = "KE HOACH DOAN".$row['groupprogram_code'].".doc";
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
