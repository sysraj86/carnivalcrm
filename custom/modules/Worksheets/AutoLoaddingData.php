<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    class AutoLoaddingData{
        function loaddingdata (&$bean, $event, $arguments){
            if(!empty($_POST['action']) &&  $_POST['action']=='EditView'){
                global $db; 
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
                                if($key){
                                    unset($NHAHANG[$key]); 
                                }
                            }
                        }
                        $nhArrkey = array_search($row['id'],$nhArr);
                        if($nhArrkey && $row['deleted']==1){
                            unset($nhArr[$nhArrkey]);
                        }
                        //else if((in_array($row['id'],(array)$nhVal)) && ($row['deleted'] != 1)){
                        //$k = array_search($row['id'],$nhArr);
                        if((!in_array($row['id'],$nhArr))&&($row['deleted']!=1)){
                            // echo $row['id'].", ";
                            $addnh = array('nh_id' => $row['id'], 'nh_name' => $row['NAME'], 'nh_deleted' => '0', 'nh_giathamkhao' => $row['giathamkhao'],'nh_dongia' => '0',
                            'nh_soluong'    => '0' , 'nh_songay' => '0', 'nh_thanhtien' => '0' ,'nh_thuexuat' => '0' , 'nh_giachuathue' => '0', 'nh_vat' => '0',
                            'nh_hinhthucthanhtoan'  => 'ck', 'nh_tamung' => '0'
                            ); 
                            array_push($NHAHANG,$addnh);
                        }
                    }

                    $noidung->nhahang = $NHAHANG; 

                    //update phan khach san
                    $KHACHSAN = (array)$noidung->khachsan;
                    $ksArr = array();
                    foreach ($KHACHSAN as $ksv){
                        array_push($ksArr,$ksv->ks_id) ;
                    }
                    $ksSql = "SELECT distinct h.name,h.id ,h.giathamkhao ,th.deleted
                    FROM hotels h INNER JOIN tours_hotels_c th ON h.id = th.tours_hote9da4shotels_idb 
                    WHERE h.deleted = 0  AND th.tours_hote943flstours_ida = '".$bean->tour_id."'";
                    $ksResult = $db->query($ksSql);
                    while($ksRow = $db->fetchByAssoc($ksResult)){
                        // xoa khoi danh sach neu trong khong ton tai trong subpanel cua tour
                        foreach($KHACHSAN as $ksVal){
                            if($ksrow['id']== $ksVal->ks_id && $ksrow['deleted'] == 1){
                                $kskey = array_search($ksVal,$KHACHSAN);
                                echo $kskey;
                                if($kskey){
                                    unset($KHACHSAN[$kskey]); 
                                }
                            }
                        }
                        $ksArrKey = array_search($ksRow['id'],$ksArr);
                        if($ksArrKey && $ksRow['delete']==1){
                            unset($ksArr[$ksArrKey]);
                        }
                        // them vao danh sach khi ton tai trong subpanel cua tour nhung chua xuat hien o trong worksheet
                        if((!in_array($ksRow['id'],$ksArr)) && $ksRow['deleted']==0){
                            $addks = array('ks_id' => $ksRow['id'], 'ks_name' => $ksRow['name'], 'ks_deleted' => '0', 'ks_giathamkhao' => $ksRow['giathamkhao'],'ks_dongia' => '0',
                            'ks_soluong'    => '0' , 'ks_songay' => '0', 'ks_thanhtien' => '0' ,'ks_thuexuat' => '0' , 'ks_giachuathue' => '0', 'ks_vat' => '0',
                            'ks_hinhthucthanhtoan'  => 'ck', 'ks_tamung' => '0'
                            );
                            // them moi mot khoan muc vao
                            array_push($KHACHSAN,$addks);

                        }
                    }
                    $noidung->khachsan =  $KHACHSAN;
                    // phan van chuyen
                    $VANCHUYEN =(array)$noidung->vanchuyen;
                    $vcArr = array();
                    foreach($VANCHUYEN as $vcv){
                        array_push($vcArr,$vcv->vanchuyen_id);
                    }
                    $vcSql = "SELECT distinct c.giathamkhao,c.number_plates, c.id ,tc.deleted
                    FROM cars c INNER JOIN tours_cars_c tc ON c.id = tc.tours_carsc2eearscars_idb
                    WHERE c.deleted = 0  AND tc.tours_cars571brstours_ida = '".$bean->tour_id."'" ;
                    $vcResult = $db->query($vcSql);
                    while($vcsRow = $db->fetchByAssoc($vcResult)){
                        // xoa khoi danh sach neu trong khong ton tai trong subpanel cua tour  
                        foreach($VANCHUYEN as $vcval) {    
                            if($vcsRow['id'] == $vcval->vanchuyen_id && $vcsRow['deleted']==1){
                                $vcKey = array_search($vcval,$VANCHUYEN);
                                if($vcKey) {
                                    unset($VANCHUYEN[$vcKey]) ;
                                }
                            }
                        }
                        $vcArrKey = array_search($vcsRow['id'],$vcArr);
                        if($vcArrKey && $vcsRow['deleted']==1){
                            unset($vcArr[$vcArrKey]);
                        }
                        // them vao danh sach khi ton tai trong subpanel cua tour nhung chua xuat hien o trong worksheet
                        if((!in_array($vcsRow['id'],$vcArr)) && $vcsRow['deleted']==0){
                            $addvc = array('vanchuyen_id' => $vcsRow['id'], 'vanchuyen_name' => $vcsRow['number_plates'], 'ks_deleted' => '0', 'vanchuyen_giathamkhao' => $vcsRow['giathamkhao'],'vanchuyen_dongia' => '0',
                            'vanchuyen_soluong'    => '0' , 'vanchuyen_songay' => '0', 'vanchuyen_thanhtien' => '0' ,'vanchuyen_thuexuat' => '0' , 'vanchuyen_giachuathue' => '0', 'vanchuyen_vat' => '0',
                            'vanchuyen_hinhthucthanhtoan'  => 'ck', 'vanchuyen_tamung' => '0'
                            );
                            // them moi mot khoan muc vao
                            array_push($VANCHUYEN,$addvc);

                        }  
                    }

                    $noidung->vanchuyen=$VANCHUYEN;   

                    // phan dich vu 

                    $DICHVU = (array) $noidung->dichvu;
                    $dvArr = array();
                    foreach($DICHVU as $dvV){
                        array_push($dvArr,$dvV->services_id);
                    }
                    $dvSql = " SELECT distinct s.name,s.giathamkhao, s.id ,tsc.deleted
                    FROM services s INNER JOIN tours_services_c tsc ON s.id = tsc.tours_serv55f6ervices_idb
                    WHERE s.deleted = 0 AND tsc.tours_serv1f4cestours_ida ='".$bean->tour_id."'" ;
                    $dvResult = $db->query($dvSql);
                    while($dvRow = $db->fetchByAssoc($dvResult)){
                        foreach($DICHVU as $dvval) {    
                            if($dvRow['id'] == $dvval->services_id && $dvRow['deleted']==1){
                                $dvKey = array_search($dvval,$DICHVU);
                                if($dvKey){
                                    unset($DICHVU[$dvKey]);
                                }
                            }
                        }
                        $dvArrKey = array_search($dvRow['id'],$dvArr);
                        if($dvArrKey && $dvRow['deleted']==1){
                            unset($dvArr[$dvArrKey]);
                        }
                        // them vao danh sach khi ton tai trong subpanel cua tour nhung chua xuat hien o trong worksheet   
                        if((!in_array($dvRow['id'],$dvArr)) && $dvRow['deleted']==0){
                            $addDV = array('services_id' => $dvRow['id'], 'services_name' => $dvRow['name'], 'services_deleted' => '0', 'services_giathamkhao' => $dvRow['giathamkhao'],'services_dongia' => '0',
                            'services_soluong'    => '0' , 'services_songay' => '0', 'services_thanhtien' => '0' ,'services_thuexuat' => '0' , 'services_giachuathue' => '0', 'services_vat' => '0',
                            'services_hinhthucthanhtoan'  => 'ck', 'services_tamung' => '0'
                            );
                            // them moi mot khoan muc vao
                            array_push($DICHVU,$addDV);

                        } 

                    }
                    $noidung->dichvu = $DICHVU; 

                    // phan tham quan
                    $THAMQUAN = (array) $noidung->thamquan;
                    $tqArr = array();
                    foreach($THAMQUAN as $tqv){
                        array_push($tqArr, $tqv->thamquan_id);
                    }
                    $tqSql = "SELECT distinct s.name,s.giathamkhao, s.id ,tsc.deleted
                    FROM services s INNER JOIN tours_services_c tsc ON s.id = tsc.tours_serv55f6ervices_idb
                    WHERE s.deleted = 0 AND tsc.tours_serv1f4cestours_ida ='".$bean->tour_id."'" ;
                    $tqResult = $db->query($tqSql);
                    while($tqRow = $db->fetchByAssoc($tqResult)){
                        // xoa khoi danh sach neu trong khong ton tai trong subpanel cua tour
                        foreach($THAMQUAN as $tqVal){
                            if($tqRow['id']== $tqVal->ks_id && $tqRow['deleted'] == 1){
                                $tqkey = array_search($tqVal,$THAMQUAN);
                                echo $tqkey;
                                if($tqkey){
                                    unset($THAMQUAN[$tqkey]); 
                                }
                            }
                        }
                         $tqArrkey = array_search($tqRow['id'],$tqArr);
                         if($tqArrkey && $tqRow['deleted']==1){
                             unset($tqArr[$tqArrkey]);
                         }
                        // them vao danh sach khi ton tai trong subpanel cua tour nhung chua xuat hien o trong worksheet
                        //$ktq = array_search($tqRow['id'],$tqArr);
                        if((!in_array($tqRow['id'],$tqArr)) && $tqRow['deleted']==0){
                            $addtq = array('thamquan_id' => $tqRow['id'], 'thamquan_name' => $tqRow['name'], 'thamquan_deleted' => '0', 'thamquan_giathamkhao' => $tqRow['giathamkhao'],'thamquan_dongia' => '0',
                            'thamquan_soluong'    => '0' , 'thamquan_songay' => '0', 'thamquan_thanhtien' => '0' ,'thamquan_thuexuat' => '0' , 'thamquan_giachuathue' => '0', 'thamquan_vat' => '0',
                            'thamquan_hinhthucthanhtoan'  => 'ck', 'thamquan_tamung' => '0'
                            );
                            // them moi mot khoan muc vao
                            array_push($THAMQUAN,$addtq);

                        } 
                    }
                    $noidung->thamquan = $THAMQUAN ;

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
    }
?>
