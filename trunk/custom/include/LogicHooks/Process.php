<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
////////////////////////////////////////////////////////////
// Mô tả chức năng của file                                /
// Chức năng : Xử lý tất cả các Record thông qua LogicHook /
////////////////////////////////////////////////////////////

//Include  
include("custom/include/LogicHooks/Date.php");
//////////////////////////////////////////////


// Lê Gia Thành
// Tạo xử lý tự động add file global
    class UserHook {
        function autoLoadFileLocal(&$focus, $event, $arguments) {
            global $current_user;
            
            if($focus->id == $current_user->id) {
                //echo '<script type="text/javascript" src="custom/include/js/jquery.js"></script>';
                //echo '<script type="text/javascript" src="custom/include/js/custom.js"></script>';
            }
        }
    }
    
 Class ProcessDetail{
   function Update_Score_FIT(&$bean,$event,$arguments){
          global $db;
          $sql = "select * from contracts where parent_type = 'FITs' and parent_id = '".$bean->id."' and deleted = 0";
          $result = $db->query($sql);
          $score = 0 ;
          $tongtien = 0;
          
          while($row = $db->fetchByAssoc($result)){
               $tongtien = $tongtien + $row['tongtien'];
          }
          //$score = $tongtien/1000000;
          //$bean->accumulation_score = $score;
          // Xay dung tieu chi tinh diem:
          // Nguyen tac lay : >= min va < max
          //$max = 10000000000;
//          $tieuChiPhanLoaiKH = array(
//            'dom' => array(
//                'vip' => array(
//                    'max' => 10000000000,
//                    'min' => 500000000,
//                ),
//                'levela' => array(
//                    'max' => 500000000,
//                    'min' => 300000000,
//                ),
//                'levelb' => array(
//                    'max' => 300000000,
//                    'min' => 1000000,
//                ),
//                'levelc' => array(
//                    'max' => 1000000,
//                    'min' => 0,
//                ),
//            ),
//            'sales' => array(
//                'vip' => array(
//                    'max' => 10000000000,
//                    'min' => 2000000000,
//                ),
//                'levela' => array(
//                    'max' => 2000000000,
//                    'min' => 1000000000,
//                ),
//                'levelb' => array(
//                    'max' => 1000000000,
//                    'min' => 500000000,
//                ),
//                'levelc' => array(
//                    'max' => 500000000,
//                    'min' => 0,
//                ),
//            ),
//            'han' => array(
//                'vip' => array(
//                    'max' => -1,
//                    'min' => -1,
//                ),
//                'levela' => array(
//                    'max' => 10000000000,
//                    'min' => 500000000,
//                ),
//                'levelb' => array(
//                    'max' => 1000000000,
//                    'min' => 500000000,
//                ),
//                'levelc' => array(
//                    'max' => 500000000,
//                    'min' => 0,
//                ),
//            ),
//          );
          $sql = "update fits set accumulation_score = ".$score." where id = '".$bean->id."' and deleted = 0 ";
          $result = $db->query($sql);
      }  
    
}   
    
    
    
// Lê Gia Thành
// Mô tả : Tạo màu cho record
// Xử lý : 
//  - Dựa vào các biến điều kiện ta tạo ra các biến màu tương ứng với các điều kiện.
//  - Sau đó ta tạo các Class CSS tương ứng trong file style.css của themes đang dùng.
//  - Sau đó cộng biến điều kiện với chuổi html(có khai báo class tương úng).
    Class ProcessList{
        function bookingDeadlineAuto(&$bean,$event,$arguments){
            $color =''; 
            $date = new Date();
            $today = strtotime(date('Y-m-d'));                      
            $deadline = strtotime($this->changeFormatdate($bean->deadline,'/','-'));            
            // Tính khoảng cách 2 ngày (hiện tại và deadline).
            $khoangcach = $date->dateDiff($today,$deadline);
            
            // Nêu các điều kiện
            if($bean->confirm == '0' && $deadline > $today && $khoangcach['days'] <= 5){
                $color = 'near_deadline';
            }elseif($bean->confirm == '0' && $deadline < $today){
                $color = 'after_deadline';
            }elseif($bean->confirm == '0' && $khoangcach['days'] == 0){
                $color = 'deadline';
            }elseif($bean->confirm == '1'){
                $color = 'confirm';
            }
            // Cộng biến deadline với chuổi html, chuổi này cho hiển thị màu của record, ta dùng biến color ở trên để gán.
            $bean->deadline .= "<img style='display:none;' src='themes/Sugar5/images/help.gif' width='0' height='0'  onload='this.parentNode.parentNode.className = \"".$color."\";'> ";     
        }
        
        /// Hàm chuyển định dạng ngày sang kiểu Y-m-d
        function changeFormatdate($date1,$format1,$format2){
            $temp = explode($format1,$date1,3);
            return $temp[2].$format2.$temp[1].$format2.$temp[0] ;
            
        }
    }
    
//////////////////////////////////////////////////////////////   
    
     
?>
