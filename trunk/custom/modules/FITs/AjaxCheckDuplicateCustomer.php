<?php


    header('Content-Type: text/html; charset=UTF-8');
    define("sugarEntry", true);

    // Sugar Date Time
    require_once("include/TimeDate.php");
    require_once('include/entryPoint.php'); 
    global $db, $current_user;


    $first_name    = trim($_POST['first_name']);
    $last_name    = trim($_POST['last_name']);
    $birthday    = trim($_POST['birthday']);
    $phone_mobile  = trim($_POST['phone_mobile']);
    $identy_card  = trim($_POST['identy_card']);
    
    $where = "deleted = 0 AND last_name = '".$last_name."'";

    if($first_name){
        $where .= " AND first_name = '".$first_name."'";  
    }
    
    if($birthday){
        // Xu ly chuoi ngay sinh
        $date_time = new TimeDate();
        $user_date_format = $date_time->get_date_format($current_user);
        $birdthday = $date_time->to_display($birthday, $user_date_format, 'Y-m-d');
        $where .= " AND birthday = '".$birdthday."'";  
    }
    
    if($phone_mobile){
        $where .= " AND phone_mobile = '".$phone_mobile."'";  
    }
    
    if($identy_card){
        $where .= " AND identy_card = '".$identy_card."'";  
    }                

    $sql = "SELECT id, first_name, last_name, birthday, phone_mobile, identy_card, assigned_user_id FROM fits WHERE {$where}";
    $result = $db->query($sql);


    //display
    $n = $db->getRowCount($result);    
    $error='';
    if($n > 0){
        $i = 0;
        
        // Sale Man
        $user = new User();
         
        $messages = '<img src="themes/default/images/not_available.png" align="absmiddle"> <font color="red">This name may be already exists:</font><br />';
        while ($row = $db->fetchByAssoc($result)) {
            $dob = explode('-', $row['birthday']);
            $user->retrieve($row['assigned_user_id']); 
            $messages.= '<a href="index.php?module=FITs&action=DetailView&record='. $row['id'] .'" target="_blank">'.$row['first_name'].' '.$row['last_name'].'</a>';
            $messages.= " - ".$dob[2].'/'.$dob[1].'/'.$dob[0].' - '.$row['phone_mobile'].' - '.$row['identy_card'].' - Sale Man: '.$user->name."<br>";

            $i++;
        }
        echo $messages; 
    }
    else
    {
        echo '0';//No Record Found - Username is available
        //exit();   
    } 
?>