<?php
    header('Content-Type: text/html; charset=UTF-8');
    chdir(realpath(dirname(__FILE__)));

    define("sugarEntry", true);
    require_once('include/entryPoint.php'); 
    global $db;
    if(isset($_POST['val'])){
        $query = "SELECT
        fits.id,TRIM(CONCAT(IFNULL(fits.first_name,''),' ',IFNULL(fits.last_name,''))) as name,fits.phone_mobile,fits.address, nationality,
        email_addresses.email_address    email_address
        FROM fits
        LEFT JOIN email_addr_bean_rel
        ON fits.id = email_addr_bean_rel.bean_id
        AND email_addr_bean_rel.bean_module = 'FITs'
        AND email_addr_bean_rel.deleted = 0
        AND email_addr_bean_rel.primary_address = 1
        LEFT JOIN email_addresses
        ON email_addresses.id = email_addr_bean_rel.email_address_id 
        WHERE fits.deleted =0 AND  (((TRIM(CONCAT(IFNULL(fits.first_name,''),' ',IFNULL(fits.last_name,''))) like '%".trim($_REQUEST['val'])."%') OR (fits.first_name like '%".trim($_REQUEST['val'])."%') OR (fits.last_name like '%".trim($_REQUEST['val'])."%'))) ";  //" AND (MATCH(last_name) AGAINST('".trim(keywordProcess($_GET['val']))."'IN BOOLEAN MODE) OR MATCH(first_name) AGAINST('".trim(keywordProcess($_GET['val']))."'IN BOOLEAN MODE))";

        $result = $db->query($query);
        $n = $db->getRowCount($result);    
        $error='';
        if($n > 0){
            $i = 0;
            //$list_cus = array();
            while($row = $db->fetchByAssoc($result)){
                echo '<a class="getcusold" name="'.$row['name'].'" email="'.$row['email_address'].'" address="'.$row['address'].'" phone="'.$row['phone_mobile'].'" id="'.$row['id'].'"> '.$row['name'].' '.$row['phone_mobile'].'</a> <br/>';
                //$list_cus[] = array('id'=>$row['id'].'_'.$row['id'],'name'=>$row['name'].' - '.$row['orther']);
                $i++;
            }
        }
        else{
            echo '0';
        }
//        echo $reponse;
    }

    function keywordProcess($str)
    {   
        $temp = $str;
        if(strpos($temp, "&")!== FALSE || strpos($temp, "-")!== FALSE){
            $temp = '"'.$temp.'"'; 

        }else{

            $temp = explode(" ", $temp);
            //update truong hop co tu khoa nho hon 2 ki tu vd QAd Manager
            foreach($temp as $k=>$val){
                if(strlen($val)<=3){
                    return '"'.$str.'"';
                }
            }

            //end update
            $temp = implode(" +", $temp);
            $temp = "+".$temp;
        } 

        return $temp;
    }
?>
