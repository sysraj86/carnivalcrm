<?php

    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    global $db;

    if(isset($_POST['name']) ){

        $name = isset($_POST['name']) ? trim(htmlspecialchars($_POST['name'])) : "";
        $sql = "SELECT id, name, assigned_user_id FROM accounts WHERE deleted = 0 AND name LIKE '%".$name."%'";
        $result = $db->query($sql);
        $n = $db->getRowCount($result);    

        $error='';
        if($n > 0){
            $i = 0;
            // Nguoi quan ly thong tin
            $user = new User();
            while ($row = $db->fetchByAssoc($result)) {
                $user->retrieve($row['assigned_user_id']);
                $error = 'Account may be already exists:';
                echo '<img src="themes/default/images/not_available.png" align="absmiddle"> <font color="red">'.$error.'</font><br /><a href="index.php?module=Accounts&action=DetailView&record='. $row['id'] .'" target="_blank">'.$row['name'].'</a> - Sale Man: '.$user->name.'<br/>';
                   
                $i++;
            }
            //exit();  
        }else{
            echo '0';//No Record Found - Username is available
            //exit();   
        }
    }
?>