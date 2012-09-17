<?php
  global $db;
  if(isset($_POST['department'])){ 
      $query = "SELECT id, NAME FROM countries WHERE deleted =0 AND department = '".$_POST['department']."' ORDER BY NAME ";
      $result = $db->query($query);
      if($db->getRowCount($result)>0){
          while($row = $db->fetchByAssoc($result)){
              $option .= '<option value="'.$row['id'].'">'.$row['NAME'].'</option>';
          }
          echo $option;
      }
  }                                                                                                                         
  
?>
