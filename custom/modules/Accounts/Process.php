<?php
    Class Process{
      
      function MadePhoneRecord(&$bean,$event,$arguments){
         global $db;
         $sql = "select * from  accounts where id='".$bean->id."' and deleted = 0";
         $result = $db->query($sql);
         $row = $db->fetchByAssoc($result);
         $bean->phone = "<a href='callto://".$row['mavung'].$row['phone_office']."'>".$row['mavung'].$row['phone_office']."</a>";
      }
      
      
  }
?>
