<?php
  if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    class AirLogicHook {
        function updateCode(&$bean, $event, $arguments) {

            global $db;

            $query = "SELECT MAX(auto_id) as maxcode FROM airlines"; 


            $result = $db->query($query);

            $row = $db->fetchByAssoc($result);

            if($_POST['record'] == ""){//add new
                $maxcode =   $row['maxcode']+1;
                $sic_code = "AIR".$maxcode;
                $bean->air_code =$sic_code;
               // $query = "UPDATE accounts SET hotel_code ='".$sic_code. "' WHERE id='".$bean->id."'";  
               // $db->query($query);
            }
        }
    }
?>
