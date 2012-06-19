<?php
   ////////////////////////////////////////////////////////////
  // M? ta? ch??c n?ng cu?a file/////////////////////////////////
  // 1. Ch??c n?ng : Ta?o ma? (code) t?? ???ng cho c?c module
  // 2. Ph??ng ph?p : D??a v?o logic_hook ta?o x?? ly?, event : Before Save
  // 3. X?? ly? :
  //    - L??y chi? s?? cao nh??t cu?a field Auto cu?a module
  //    - T?ng chi? s?? n?y l?n 1 ??n vi?
  //    - X?t module ?ang x?t, ta?o c?c ti??p ???u ng?? cho t??ng module
  //    - X?t s?? ch?? s?? cu?a chi? s?? n?y ??? ta?o s?? 0 ???u chi? s??
  //    - Sau ?? l??y ti??p ???u ngu? + chi? s?? v? gh?p v?o bi??n Code
  //    - C??p nh??t bi??n Code n?y cho do?ng m??i save.
  ////////////////////////////////////////////////////////////
  if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 
  require_once('data/SugarBean.php'); 
  
  class Autocode{
      function Madecode(&$bean,$event,$arguments){
          global $db,$app_list_strings;
          $sql = "SELECT Max(autocode) as auto FROM ".$bean->table_name;
          $result = $db->query($sql);
          $row1 = $db->fetchByAssoc($result);
          $row =  $row1['auto'] + 1 ;
          $pre = "";
          $tableName = strtolower($bean->table_name);
          /**
          * Lay tiep dau ngu dua vao ten bang.
          */
          // Kiem tra loai kh trong GroupList
          if($tableName == 'grouplists'){
              if($bean->group_type == 'doan'){
                  $pre .= $app_list_strings['autocode_dom'][$tableName.'1'];
              }elseif($bean->group_type == 'le'){
                  $pre .= $app_list_strings['autocode_dom'][$tableName.'2'];
              }
          }else{
              $pre .= $app_list_strings['autocode_dom'][$tableName];
          }
          $len = $app_list_strings['autocode_dom']['len'];
          $zero_len = $len - strlen($pre) - strlen($row);
          
          for($i = 0 ; $i < $zero_len ; $i++){
              $pre .= "0";
          } 
              
          $query = "SELECT COUNT(*) AS total FROM {$tableName} WHERE id='{$bean->id}'";
          
          $result = $db->query($query);
          $check = $db->fetchByAssoc($result);
          if($check['total']== 0 || ($bean->autocode == "" && $bean->code =="")){// not exist
              $bean->autocode = $row ; 
              $bean->code = $pre.$row; 
          }
      } 
  }
  

?>
