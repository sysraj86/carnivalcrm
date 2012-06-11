<?php
include_once("modules/Users/User.php");
class ViewTinhDiemNhanVien extends SugarView{
    function  ViewTinhDiemNhanVien(){
      parent::SugarView();
    }
      
    function display(){
        $focus = new C_Reports();
        global $db;
        global $app_strings;
        global $app_list_strings;
        global $mod_strings;
        global $currentModule;
        $ketqua = '';
        $export = '';
        $file_name = '';
        $ss = new Sugar_Smarty();
        $ss->assign("APP", $app_strings);
        $ss->assign("MOD", $mod_strings);
        $ss->assign('CURRENT_MODULE',$currentModule);
        $ss->assign('KY',get_select_options($app_list_strings['tinhdiem_ky_dom'],''));
        $ss->assign('THANG',get_select_options($app_list_strings['tinhdiem_thang_dom'],''));
        $ss->assign('DEPARTMENT',get_select_options($app_list_strings['report_deparment_dom'],'any'));
        
        
        if((isset($_REQUEST['tinhdiem']) || isset($_REQUEST['tinhdiemsales']) || isset($_REQUEST['tinhdiemtelesales']) || isset($_REQUEST['xephang']) || isset($_REQUEST['xephangsales']) || isset($_REQUEST['xephangtelesales']) || isset($_REQUEST['export'])) && $_REQUEST['nam'] != ''){
            //////////////////////////////////////
            //Khai bao bien
            $ds_ketqua = array();
            $rate = '';
            $type_calculate = '';
            $type_value = '';
            $start_date = '';
            $end_date = '';
            $report_type = '';
            $check_sale_man = $_REQUEST['check_sale_man'];
            $sale_man = $_REQUEST['sale_man'];
            $sale_man_id = $_REQUEST['sale_man_id'];
            $department = $_REQUEST['department'];
            if(isset($_REQUEST['report_type'])){
                $report_type = $_REQUEST['report_type'];
            }
            if(isset($_REQUEST['export'])){
                $export = 1;
            }
            $ky = $_REQUEST['ky'];
            $thang = $_REQUEST['thang'];
            $nam = $_REQUEST['nam'];
            if($check_sale_man == '1'){
                $ss->assign('CHECK_SALE_MAN','checked="checked"');
            }elseif($check_sale_man == '0'){
                $ss->assign('CHECK_SALE_MAN','');
            }
            
            $ss->assign('SALE_MAN',$sale_man);
            $ss->assign('SALE_MAN_ID',$sale_man_id);
            $ss->assign('KY',get_select_options($app_list_strings['tinhdiem_ky_dom'],$ky));
            $ss->assign('THANG',get_select_options($app_list_strings['tinhdiem_thang_dom'],$thang));
            $ss->assign('DEPARTMENT',get_select_options($app_list_strings['report_deparment_dom'],$department));
            $ss->assign('NAM',$nam);
            ///////////////////////////////////////
            // Tinh ngay bat dau va ngay ket thuc de cham diem
            if(isset($_REQUEST['xephangsales']) || isset($_REQUEST['xephangtelesales']) || isset($_REQUEST['xephang']) || $report_type == 5 || $report_type == 6 || $report_type == 7 || $report_type == 8){
                $start_date = $nam.'-'.$thang.'-01';
                $end_date = date('Y-m-d',strtotime('-1 second',strtotime('+1 month',strtotime($thang.'/01/'.$nam.' 00:00:00')))); 
            }else{
                if($ky == '1'){
                    $start_date = $nam.'-'.$thang.'-01';
                    $end_date = $nam.'-'.$thang.'-16';
                }else{
                    $start_date = $nam.'-'.$thang.'-16';
                    $end_date = date('Y-m-d',strtotime('-1 second',strtotime('+1 month',strtotime($thang.'/01/'.$nam.' 00:00:00'))));
                }
            }
            
            ////////////////////////////////////////
            // Lay ket qua
            if(isset($_REQUEST['tinhdiemtelesales']) || ($report_type == 1 && $export == 1) ){
                if($report_type != 1) $report_type = 1;
                $ketqua = $focus->getDanhSachDiemCuaNhanVienTeleSale($app_strings,$mod_strings,$ds_ketqua,$start_date,$end_date,$sale_man_id,$department,null,$export,$report_type);
                $type_value = 1;
                $type_calculate = $mod_strings['LBL_TINH_DIEM_TELESALES']; 
            }elseif(isset($_REQUEST['tinhdiemsales']) || ($report_type == 2 && $export == 1) ){
                if($report_type != 2) $report_type = 2;
                $ketqua = $focus->getDanhSachDiemCuaNhanVienSale($app_strings,$mod_strings,$ds_ketqua,$start_date,$end_date,$sale_man_id,$department,null,$export,$report_type);
                $type_value = 2;
                $type_calculate = $mod_strings['LBL_TINH_DIEM_SALES'];
            }elseif(isset($_REQUEST['tinhdiem']) || (($report_type == 3 || $report_type == 4)  && $export == 1)){
                $user = new User();
                $user->retrieve($sale_man_id);
                if($user->type_sale == 'telesales' || $report_type == 3){
                    if($report_type != 3) $report_type = 3;
                    $ketqua = $focus->getDanhSachDiemCuaNhanVienTeleSale($app_strings,$mod_strings,$ds_ketqua,$start_date,$end_date,$sale_man_id,$department,null,$export,$report_type);
                    $type_value = 1;
                    $type_calculate = $mod_strings['LBL_TINH_DIEM_TELESALES'].' '.$user->last_name;
                }elseif($user->type_sale == 'sales' || $report_type == 4){
                    if($report_type != 4) $report_type = 4;
                    $ketqua = $focus->getDanhSachDiemCuaNhanVienSale($app_strings,$mod_strings,$ds_ketqua,$start_date,$end_date,$sale_man_id,$department,null,$export,$report_type);
                    $type_value = 2;
                    $type_calculate = $mod_strings['LBL_TINH_DIEM_SALES'].' '.$user->last_name;
                }
            }elseif(isset($_REQUEST['xephangtelesales']) || ($report_type == 5 && $export == 1)){
                if($report_type != 5) $report_type = 5;
                $ketqua = $focus->getDanhSachDiemCuaNhanVienTeleSale($app_strings,$mod_strings,$ds_ketqua,$start_date,$end_date,$sale_man_id,$department,1,$export,$report_type);
                $type_value = 1;
                $rate = 1;
                $type_calculate = $mod_strings['LBL_XEP_HANG_TELESALES'];
            }elseif(isset($_REQUEST['xephangsales']) || ($report_type == 6 && $export == 1)){
                if($report_type != 6) $report_type = 6;
                $ketqua = $focus->getDanhSachDiemCuaNhanVienSale($app_strings,$mod_strings,$ds_ketqua,$start_date,$end_date,$sale_man_id,$department,1,$export,$report_type);
                $type_value = 2;
                $rate = 1;
                $type_calculate = $mod_strings['LBL_XEP_HANG_SALES'];
            }elseif(isset($_REQUEST['xephang']) || (($report_type == 7 || $report_type == 8) && $export == 1)){
                $user = new User();
                $user->retrieve($sale_man_id);
                if($user->type_sale == 'telesales' || $report_type == 7){
                    if($report_type != 7) $report_type = 7;
                    $ketqua = $focus->getDanhSachDiemCuaNhanVienTeleSale($app_strings,$mod_strings,$ds_ketqua,$start_date,$end_date,$sale_man_id,$department,1,$export,$report_type);
                    $type_value = 1;
                    $type_calculate = $mod_strings['LBL_XEP_HANG_TELESALES'].' '.$user->last_name;
                }elseif($user->type_sale == 'sales' || $report_type == 8){
                    if($report_type != 8) $report_type = 8;
                    $ketqua = $focus->getDanhSachDiemCuaNhanVienSale($app_strings,$mod_strings,$ds_ketqua,$start_date,$end_date,$sale_man_id,$department,1,$export,$report_type);
                    $type_value = 2;
                    $type_calculate = $mod_strings['LBL_XEP_HANG_SALES'].' '.$user->last_name;
                }
                $rate = 1;
                
            }
            
            /////////////////////////////////////////////
            // Kiem tra ky de chinh lai end_date, chinh lai thanh ngay 15.
            // Tuy chinh giao dien ben ngoai cho phu hop voi loai tinh diem.
            
            if($ky == '1' && !isset($_REQUEST['xephangtelesales']) && !isset($_REQUEST['xephangsales']) && !isset($_REQUEST['xephang']) && $report_type != 5 && $report_type != 6 && $report_type != 7 && $report_type != 8){ 
               $end_date_temp = explode('-',$end_date);
               $end_date_temp[2] -= 1;
               $end_date = $end_date_temp[0].'-'.$end_date_temp[1].'-'.$end_date_temp[2];
            }
            $file_name = $type_calculate;
            $type_calculate .= $mod_strings['LBL_START_DATE'].'<font color=red>'.date('d-m-Y',strtotime($start_date)).'</font>'.$mod_strings['LBL_END_DATE'].'<font color=red>'.date('d-m-Y',strtotime($end_date)).'</font>' ;
            $ss->assign('TYPE_CALCULATE',$type_calculate);
            $ss->assign('TYPE_VALUE',$type_value);
            $ss->assign('RATE',$rate);
            if($ketqua == ''){
                $ketqua = '<tr><td colspan="16">'.$mod_strings['LBL_NODATA'].'</td></tr>';
            }
            ////////////////////////////////////////////////
        }else{
            ///////////////////////////////////////////////
            // Neu khong co du lieu
            $ketqua = '<tr><td colspan="16">'.$mod_strings['LBL_NODATA'].'</td></tr>';
        }
        
        /**
        * Kiem tra kieu du lieu :
        * 1. View Table
        * 2. File Excel
        */
        if($export != 1){
            $ss->assign('KETQUA',$ketqua);
            $ss->display("modules/C_Reports/tpls/tinhdiemnhanvien.tpl"); 
        }else{
            /**
            * Export To Excel:
            */
            if($report_type == 1 || $report_type == 3){
                $temp = file_get_contents("modules/C_Reports/tpls/FormExport_Telesales_files/sheet001.htm");  
            }elseif($report_type == 2 || $report_type == 4){
                $temp = file_get_contents("modules/C_Reports/tpls/FormExport_Sales_files/sheet001.htm");  
            }elseif($report_type == 5 || $report_type == 7){
                $temp = file_get_contents("modules/C_Reports/tpls/FormExport_Telesales_XepHang_files/sheet001.htm");   
            }elseif($report_type == 6 || $report_type == 8){
                $temp = file_get_contents("modules/C_Reports/tpls/FormExport_Sales_XepHang_files/sheet001.htm");   
            }                  
            
            $temp = str_replace('{TITLE}',$mod_strings['LBL_TITLE'],$temp);
            $temp = str_replace('{LBL_STT}',$mod_strings['LBL_STT'],$temp);
            $temp = str_replace('{LBL_SALE_NAME}',$mod_strings['LBL_SALE_NAME'],$temp);
            $temp = str_replace('{LBL_PHONGBAN}',$mod_strings['LBL_PHONGBAN'],$temp);
            $temp = str_replace('{LBL_LIST}',$mod_strings['LBL_LIST'],$temp);
            $temp = str_replace('{LBL_LEADS}',$mod_strings['LBL_LEADS'],$temp);
            $temp = str_replace('{LBL_ACCOUNT}',$mod_strings['LBL_ACCOUNT'],$temp);
            $temp = str_replace('{LBL_SUCCESS}',$mod_strings['LBL_SUCCESS'],$temp);
            $temp = str_replace('{LBL_TOTAL}',$mod_strings['LBL_TOTAL'],$temp);
            $temp = str_replace('{LBL_QUANTITY}',$mod_strings['LBL_QUANTITY'],$temp);
            $temp = str_replace('{LBL_SCORE}',$mod_strings['LBL_SCORE'],$temp);
            $temp = str_replace('{LBL_SCORE2}',$mod_strings['LBL_SCORE2'],$temp);
            $temp = str_replace('{LBL_SCOREx2}',$mod_strings['LBL_SCOREx2'],$temp);
            $temp = str_replace('{LBL_CUSTOMERS}',$mod_strings['LBL_CUSTOMERS'],$temp);
            $temp = str_replace('{LBL_KHACHMOI}',$mod_strings['LBL_KHACHMOI'],$temp);
            $temp = str_replace('{LBL_KHACHCU}',$mod_strings['LBL_KHACHCU'],$temp);
            $temp = str_replace('{LBL_TYLE}',$mod_strings['LBL_TYLE'],$temp);
            $temp = str_replace('{LBL_RAKING}',$mod_strings['LBL_RAKING'],$temp);
            $temp = str_replace('{LBL_KETQUA}',$mod_strings['LBL_KETQUA'],$temp);
            $temp = str_replace('{TYPE_CALCULATE}',$type_calculate,$temp);
            $temp = str_replace('{KETQUA}',$ketqua,$temp);
            ob_clean();
            header("Pragma: cache");
            $temp = chr(255).chr(254).mb_convert_encoding($temp, "UTF-16LE", "UTF-8");
            header("Content-type: application/x-msdownload");
            header("Content-disposition: xls; filename=".$mod_strings['LBL_FILENAME']."_".$file_name.".xls; size=".strlen($temp));
            echo $temp;
            exit();
        }
        
    }
    /************************************************************
    * 
    
    //function getNgayTrongTuan($thu=0,$tuan=0,$thang=0,$nam=0){
//        $now = getdate();
//        if($nam<=0){
//            $nam = $now['year'];
//        }
//        if($thang<=0){
//            $thang = $now['mon'];
//        }
//        if($tuan<=0){
//            $tuan = 1;
//        }
//        if($thu <= 0 || $thu >=7){
//            $thu = 'Mon';
//        }
//        $end_date_month = date('d',strtotime('-1 second',strtotime('+1 month',strtotime($thang.'/01/'.$nam.' 00:00:00'))));
//        $date = '';
//        $tuan_temp = 0;
//        for($i=1;$i<=$end_date_month;$i++){
//            $dateofmonth = date('w',mktime(0,0,0,$thang,$i,$nam,-1));
//            
//            if($dateofmonth == $thu){
//                $date = date('Y-m-d',mktime(0,0,0,$thang,$i,$nam,-1));
//                $tuan_temp++;
//                if($tuan_temp == $tuan){
//                    return $date;
//                } 
//            }      
//        }
//          
//    }  */
}


?>
