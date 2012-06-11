<?php

    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


    global $db;

    if(isset($_POST['name']) )
    {

        $name    = isset($_POST['name']) ? htmlspecialchars($_POST['name']):"";


        $sql = "SELECT id,name FROM accounts WHERE deleted = 0 AND name LIKE '%".$name."%'";

        $result = $db->query($sql);
        $n = $db->getRowCount($result);    


        $error='';
        if($n > 0){
            $i = 0;
            while ($row = $db->fetchByAssoc($result)) {

                $error = 'Account may be already exists:';
                echo '<img src="themes/default/images/not_available.png" align="absmiddle"> <font color="red">'.$error.'</font><br /><a href="index.php?module=Accounts&action=DetailView&record='. $row['id'] .'" target="_blank">'.$row['name'].'</a><br/>';
                   
                $i++;
            }
            //exit();  
        }
        else
        {
            echo '0';//No Record Found - Username is available
            //exit();   
        }



    }


?>