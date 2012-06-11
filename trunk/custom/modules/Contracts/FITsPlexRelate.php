<?php
  class FITsPlexRelate {
      // fix bug 0000256
      function updatePlexrelate(&$bean,$event,$arguments){
          global $db;
          if($bean->parent_type == 'FITs'){
               $oldParentID = $bean->fetched_row['parent_id'];
               $newParentID = $parentID = $bean->parent_id; 
               // xử lý thay đổi FITs id
               if($newParentID != $oldParentID){
                   if($newParentID !=''){
                       $query = 'UPDATE contracts 
                            SET
                            parent_id = "'.$newParentID.'"
                            WHERE
                            id ="'.$bean->id.'"';
                       $db->query($query);
                   }
               }
          }
          
      }
  }
?>
