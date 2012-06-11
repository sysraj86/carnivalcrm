<?php
  if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 
  $db = DBManagerFactory::getInstance();
  class Autocode{
      function Madecode(&$bean,$event,$arguments){
          $sql = "SELECT Max(autocode) FROM passportlist";
          $result = $db->query($sql);
          $row = $db->fetchByAssoc($result);
          $pre = "Pss";
          $bean->code = $pre.($row + 1);
      } 
  }
?>
