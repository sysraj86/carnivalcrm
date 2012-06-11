<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    class AutoLoaddingData{
        function loaddingdata (&$bean, $event, $arguments){
            if(!empty($_POST['action']) &&  $_POST['action']=='EditView'){
            global $db; 
            $noidung = '';
            if($bean->type =='DOS'){
                $temp = base64_decode($bean->content);
                $noidung = json_decode($temp);
                $query = '';
                // upade pha nha hang
                $NHAHANG = (array) $noidung->nhahang;
                $nhArr = array() ;
                foreach($NHAHANG as $val ){
                      array_push($nhArr,$val->nh_id);
                }
                $sqlnhahang = "SELECT
                distinct res.id,res.NAME, res.giathamkhao,tres.deleted,tres.tours_rest15fcaurants_idb FROM restaurants res INNER JOIN tours_restaurants_c tres ON res.id = tres.tours_rest15fcaurants_idb
                WHERE res.deleted = 0 AND tres.tours_rest8203tstours_ida ='".$bean->tour_id."'";
                $resultnhahang = $db->query($sqlnhahang);
                while($row = $db->fetchByAssoc($resultnhahang)){
                    foreach($NHAHANG as $nhVal){
                      if($row['id']== $nhVal->nh_id && $row['deleted'] == 1){
                         $key = array_search($nhVal,$NHAHANG);
                       echo $key;
                       if($key){
                          unset($NHAHANG[$key]); 
                       }
                      }
                    }
                      //else if((in_array($row['id'],(array)$nhVal)) && ($row['deleted'] != 1)){
                        $k = array_search($row['id'],$nhArr);
                        if(!$k && $row['deleted']!=1){
                           // echo $row['id'].", ";
                            $addnh = array('nh_id' => $row['id'], 'nh_name' => $row['NAME'], 'nh_deleted' => '0', 'nh_giathamkhao' => $row['giathamkhao'],'nh_dongia' => '0',
                                'nh_soluong'    => '0' , 'nh_songay' => '0', 'nh_thanhtien' => '0' ,'nh_thuexuat' => '0' , 'nh_giachuathue' => '0', 'nh_vat' => '0',
                                'nh_hinhthucthanhtoan'  => 'ck', 'nh_tamung' => '0'
                                ); 
                           array_push($NHAHANG,$addnh);
                        }
                         /*if(in_array($row['id'],$nhArr,false) && $row['deleted']!=1){
                            echo  $row['id'].", ";
                       } */
                    }
                       
                          /*$addnh = array('nh_id' => $row['id'], 'nh_name' => $row['name'], 'nh_deleted' => '0', 'nh_giathamkhao' => $row['giathamkhao'],'nh_dongia' => '0',
                                'nh_soluong'    => '0' , 'nh_songay' => '0', 'nh_thanhtien' => '0' ,'nh_thuexuat' => '0' , 'nh_giachuathue' => '0', 'nh_vat' => '0',
                                'nh_hinhthucthanhtoan'  => 'ck', 'nh_tamung' => '0'
                                );*/  
                          //array_push($NHAHANG,$addnh);
                         
                          /*$addnh = array('nh_id' => $row['id'], 'nh_name' => $row['name'], 'nh_deleted' => '0', 'nh_giathamkhao' => $row['giathamkhao'],'nh_dongia' => '0',
                                'nh_soluong'    => '0' , 'nh_songay' => '0', 'nh_thanhtien' => '0' ,'nh_thuexuat' => '0' , 'nh_giachuathue' => '0', 'nh_vat' => '0',
                                'nh_hinhthucthanhtoan'  => 'ck', 'nh_tamung' => '0'
                                );
                                //$NHAHANG =  (array)$NHAHANG ;
                                // them mot khoan muc moi vao nha hang
                                array_push($NHAHANG,$addnh);*/
                      //}
                       /* 
                      }*/
                      // $nhKey = array_search($row['id'],$nhVal->nh_id);
                       /*$key = array_search($nhKey,$NHAHANG);
                       echo $key;
                       if($key && $row['deleted'] == 1){
                          unset($NHAHANG[$key]); 
                       }*/
                    
                   
                   /* if($nhKey && $row['deleted'] == 1){
                        echo $nhKey;
                        unset($NHAHANG[$nhKey]);
                    }*/
                    /*else if((!$nhKey)&& $ksRow['deleted'] != 1){
                                $addnh = array('nh_id' => $row['id'], 'nh_name' => $row['name'], 'nh_deleted' => '0', 'nh_giathamkhao' => $row['giathamkhao'],'nh_dongia' => '0',
                                'nh_soluong'    => '0' , 'nh_songay' => '0', 'nh_thanhtien' => '0' ,'nh_thuexuat' => '0' , 'nh_giachuathue' => '0', 'nh_vat' => '0',
                                'nh_hinhthucthanhtoan'  => 'ck', 'nh_tamung' => '0'
                                );
                                // them mot khoan muc moi vao nha hang
                                array_push($NHAHANG,$addnh);  
                    }*/
                    /*if($row['deleted']==1){
                        foreach($NHAHANG as $nhval) {    
                            if($row['id'] == $nhval->nh_id){
                                $nhKey = array_search($nhval,$NHAHANG);
                                if($nhKey){
                                    unset($NHAHANG[$nhKey]);
                                }
                                echo $nhKey;
                            } 
                        }
                    }
                    else{
                        foreach($NHAHANG as $nhval) {
                            if($row['id'] != $nhval->nh_id){
                                $addnh = array('nh_id' => $row['id'], 'nh_name' => $row['name'], 'nh_deleted' => '0', 'nh_giathamkhao' => $row['giathamkhao'],'nh_dongia' => '0',
                                'nh_soluong'    => '0' , 'nh_songay' => '0', 'nh_thanhtien' => '0' ,'nh_thuexuat' => '0' , 'nh_giachuathue' => '0', 'nh_vat' => '0',
                                'nh_hinhthucthanhtoan'  => 'ck', 'nh_tamung' => '0'
                                );
                                array_push($NHAHANG,$addnh);  
                            }
                        }
                    }*/

                
                //echo $nhArr;
                $noidung->nhahang = $NHAHANG; 

                // phan khach san
                $KHACHSAN = $noidung->khachsan;
                $ksSql = "SELECT distinct h.name,h.id ,h.giathamkhao ,th.deleted
                FROM hotels h INNER JOIN tours_hotels_c th ON h.id = th.tours_hote9da4shotels_idb 
                WHERE h.deleted = 0  AND th.tours_hote943flstours_ida = '".$bean->tour_id."'";
                $ksResult = $db->query($ksSql);
                while($ksRow = $db->fetchByAssoc($ksResult)){
                    //if($ksRow['deleted']==1){
                        //foreach($KHACHSAN as $ksval) {    
                            //if($ksRow['id'] == $ksval->ks_id){
                                /*$ksKey = array_search($ksRow['id'],$KHACHSAN);
                                if($ksKey && $ksRow['deleted'] == 1 ){
                                    echo $ksKey; 
                                    // xoa khoan muc nay di vi ben tour da xoa
                                    unset($KHACHSAN[$ksKey]);
                                } */
                               /* else if((!$ksKey)&& $ksRow['deleted'] != 1){
                                    $addks = array('ks_id' => $ksRow['id'], 'ks_name' => $ksRow['name'], 'ks_deleted' => '0', 'ks_giathamkhao' => $ksRow['giathamkhao'],'ks_dongia' => '0',
                                            'ks_soluong'    => '0' , 'ks_songay' => '0', 'ks_thanhtien' => '0' ,'ks_thuexuat' => '0' , 'ks_giachuathue' => '0', 'ks_vat' => '0',
                                            'ks_hinhthucthanhtoan'  => 'ck', 'ks_tamung' => '0'
                                            );
                                    // them moi mot khoan muc vao
                                   array_push($KHACHSAN,$addks);   
                                }*/
                            //}

                        //}
                    //}
                    //else{
                        //foreach($KHACHSAN as $ksval){
                            //if($ksRow['id'] != $ksval->ks_id){
                           /* $ksKey = array_search($ksRow['id'],$KHACHSAN); 
                            if(!$ksKey)
                                $addks = array('ks_id' => $ksRow['id'], 'ks_name' => $ksRow['name'], 'ks_deleted' => '0', 'ks_giathamkhao' => $ksRow['giathamkhao'],'ks_dongia' => '0',
                                'ks_soluong'    => '0' , 'ks_songay' => '0', 'ks_thanhtien' => '0' ,'ks_thuexuat' => '0' , 'ks_giachuathue' => '0', 'ks_vat' => '0',
                                'ks_hinhthucthanhtoan'  => 'ck', 'ks_tamung' => '0'
                                );
                                array_push($KHACHSAN,$addks);  */
                            //}
                        //}

                        // array_push($noidung->khachsan,$addks);
                    //} 
                }
                $noidung->khachsan =  $KHACHSAN;
                // phan van chuyen
                $VANCHUYEN = $noidung->vanchuyen;
                $vcSql = "SELECT distinct c.giathamkhao,c.number_plates, c.id ,tc.deleted
                FROM cars c INNER JOIN tours_cars_c tc ON c.id = tc.tours_carsc2eearscars_idb
                WHERE c.deleted = 0  AND tc.tours_cars571brstours_ida = '".$bean->tour_id."'" ;
                $vcResult = $db->query($vcSql);
                while($vcsRow = $db->fetchByAssoc($vcResult)){
                    if($vcsRow['deleted']==1){
                        foreach($VANCHUYEN as $vcval) {    
                            if($vcsRow['id'] == $vcval->vanchuyen_id){
                                $vcKey = array_search($vcval,$VANCHUYEN);
                                if($vcKey) {
                                    $VANCHUYEN[$vcKey]->vanchuyen_deleted = 1; 
                                }
                                echo $vcKey;
                            }
                            //else echo "xin chao";
                        }
                    }
                }

                $noidung->vanchuyen=$VANCHUYEN;   

                // phan dich vu 

                $DICHVU = $noidung->dichvu;
                $dvSql = " SELECT distinct s.name,s.giathamkhao, s.id ,tsc.deleted
                FROM services s INNER JOIN tours_services_c tsc ON s.id = tsc.tours_serv55f6ervices_idb
                WHERE s.deleted = 0 AND tsc.tours_serv1f4cestours_ida ='".$bean->tour_id."'" ;
                $dvResult = $db->query($dvSql);
                while($dvRow = $db->fetchByAssoc($dvResult)){
                    if($dvRow['deleted']==1){
                        foreach($DICHVU as $dvval) {    
                            if($dvRow['id'] == $dvval->services_id){
                                $dvKey = array_search($dvval,$DICHVU);
                                if($dvKey){
                                    $DICHVU[$dvKey]->services_deleted = 1; 
                                }
                                echo $dvKey;
                            }
                            //else echo "xin chao";
                        }
                    } 
                }
                $noidung->dichvu = $DICHVU; 

                // phan tham quan
                $THAMQUAN = $noidung->thamquan;
                $tqSql = "SELECT distinct s.name,s.giathamkhao, s.id ,tsc.deleted
                FROM services s INNER JOIN tours_services_c tsc ON s.id = tsc.tours_serv55f6ervices_idb
                WHERE s.deleted = 0 AND tsc.tours_serv1f4cestours_ida ='".$bean->tour_id."'" ;
                $tqResult = $db->query($tqSql);
                while($tqRow = $db->fetchByAssoc($tqResult)){
                    if($tqRow['deleted']==1){
                        foreach($THAMQUAN as $tqval) {    
                            if($tqRow['id'] == $tqval->thamquan_id){
                                $tqKey = array_search($tqval,$THAMQUAN);
                                if($tqKey){
                                    $THAMQUAN[$tqKey]->thamquan_deleted = 1; 
                                }
                                echo $tqKey;
                            }
                            //else echo "xin chao";
                        }
                    } 
                }
                $noidung->thamquan = $THAMQUAN ;

            } 




            $_SESSION['content']  = $noidung;

            $content = json_encode($_SESSION['content'] );
            $content = base64_encode($content);

            $temp1 = base64_decode($content);
            $noitemp = json_decode($temp1) ;

           $sql = "UPDATE worksheets SET content ='".$content."' WHERE id ='".$bean->id."'" ;
           $bean->db->query($sql, true);
        }
        } 
    }
?>
