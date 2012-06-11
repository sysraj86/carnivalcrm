<?php
   ////////////////////////////////////////////////////////////
  // Mô taÒ chýìc nãng cuÒa file/////////////////////////////////
  // 1. Chýìc nãng : Taòo maÞ (code) týò ðôòng cho các module
  // 2. Phýõng pháp : Dýòa vào logic_hook taòo xýÒ lyì, event : Before Save
  // 3. XýÒ lyì :
  //    - Lâìy chiÒ sôì cao nhâìt cuÒa field Auto cuÒa module
  //    - Tãng chiÒ sôì này lên 1 ðõn viò
  //    - Xét module ðang xét, taòo các tiêìp ðâÌu ngýÞ cho týÌng module
  //    - Xét sôì chýÞ sôì cuÒa chiÒ sôì này ðêÒ taòo sôì 0 ðâÌu chiÒ sôì
  //    - Sau ðó lâìy tiêìp ðâÌu nguÞ + chiÒ sôì và ghép vào biêìn Code
  //    - Câòp nhâòt biêìn Code này cho doÌng mõìi save.
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
              if($bean->type_cus == 'doan'){
                  $pre .= $app_list_strings['autocode_dom'][$tableName.'1'];
              }elseif($bean->type_cus == 'le'){
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
