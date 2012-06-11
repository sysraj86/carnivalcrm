<?php
header('Content-Type: text/html; charset=UTF-8');
 //if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
 chdir(realpath(dirname(__FILE__)));

       define("sugarEntry", true);
       require_once('include/entryPoint.php'); 
       global $db; 
    $return_arr = array();
                    //mysql_real_escape_string
        
       $sql = "select distinct id,name from accounts where deleted=0 and name like '%".($_GET['val'])."%'"  ;       
        
       $fetch = $db->query($sql); 

        $i=0;
        while ($row = $db->fetchByAssoc($fetch)) {
            //echo $row['name'];
            //$row_array['id'] = $row['id'];
            $return_arr[$i++] = array("name"=>$row["name"]);
            
        }
        $reponse=$_GET['callback']."(".json_encode($return_arr).")";  
    //$db -> disconnect();
    echo($reponse);
  
      /*chdir(realpath(dirname(__FILE__)));

      / define("sugarEntry", true);
       require_once('include/entryPoint.php');*/
         

        /* $sql="select name from accounts where deleted=0 and lower(name) like binary '".strtolower($_GET['q'])."%'" ;
        $result=$GLOBALS['db']->query($sql,true);
        while($row=$GLOBALS['db']->fetchByAssoc($result)) {
        echo $row['name'];
        } */

?>
