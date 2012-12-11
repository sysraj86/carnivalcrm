<?php
  if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

  if(isset($_REQUEST['id'])){
      $id = $_REQUEST['id'];
      global $db;
      $sql = "
        SELECT DISTINCT
          b.* 
        FROM
          `groupprograms` a 
          JOIN `tours` b 
            ON b.`id` = a.`tour_id`
            AND b.`deleted` = 0 
        WHERE a.`id` = '{$id}'
      ";
      $result = $db->query($sql);
      $row = $db->fetchByAssoc($result);
      if($row['contract_value']){
          echo json_encode($row['contract_value']);
      }      
  }

?>
