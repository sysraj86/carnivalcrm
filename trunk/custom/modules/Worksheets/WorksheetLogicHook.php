<?php
  if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    class WorksheetLogicHook {
        function updateCode(&$bean, $event, $arguments) {

            global $db;

            $query = "SELECT MAX(auto_id) as maxcode FROM worksheets"; 


            $result = $db->query($query);

            $row = $db->fetchByAssoc($result);

            if($_POST['record'] == ""){//add new
                $maxcode =   $row['maxcode']+1;
                $sic_code = "Worksheet_".$maxcode;
                $bean->worksheet_code =$sic_code;
            }
        }
        // lay ten tour cho chiet tinh OutBound
        function outboutTourName(&$bean, $event, $arguments) { 
            if($bean->type=='Outbound'){
                $bean->worksheet_tour_name = $bean->groupprograorksheets_name;
            }
        }
    }
?>
