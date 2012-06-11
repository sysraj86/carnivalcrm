<?php
     if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 
     class HotelFormBase {
         function checkForDuplicates($prefix){
             global $local_log;
             require_once('include/formbase.php');
             $focus = new Hotels();
             $query = '';
             $baseQuery = 'Select id, name from hotels where deleted = 0 and ';
             if(!empty($_POST[$prefix.'name'])){
                 $query = $baseQuery." name like '%".$_POST[$prefix.'name']."%'";
             }
                $rows = array();
                global $db;
                $result = $db->query($query);
                while (($row = $db->fetchByAssoc($result)) != null) {
                    if(!isset($rows[$row['id']])) {
                       $rows[] = $row;
                    }
                }
                return !empty($row)? $row : null;
         }
         
         
         function handleSave($prefix,$redirect=true, $useRequired=false){
            
         }
         
     }
?>
