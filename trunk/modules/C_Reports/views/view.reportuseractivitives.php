<?php
    // Sugar Date Time
    require_once("include/TimeDate.php");
    require_once("custom/include/Report/PhanTrang.php"); 
    require_once("modules/C_Reports/C_Reports.php");
    class ViewReportUserActivitives extends SugarView{
        public $list_user_search = 'list_user_search';
        function ViewReportUserActivitives(){
            $user = new User();
            $custom_select = 'id, CONCAT(IFNULL(last_name,"")," ",IFNULL(first_name,"")) AS name';
            C_Reports::getList($user,$this->list_user_search,$custom_select);
            parent::display();
        }

        
        
        function display(){
            global $db, $mod_strings, $app_list_strings,$current_user,$sugar_config;
            global $timedate;

            $ss = new Sugar_Smarty();

            $ss->assign('MOD',$mod_strings);
            $ss->assign('START_DATE',$_REQUEST['start_date']);
            $ss->assign('END_DATE',$_REQUEST['end_date']);
            $ss->assign('DEPARTMENT',get_select_options_with_id($app_list_strings['user_department_dom'],$_REQUEST['department']));
            $ss->assign('USER_ID',get_select_options_with_id($app_list_strings[$this->list_user_search],$_REQUEST['user_id']));
            //$ss->assign('USER_ID',$_REQUEST['user_id']);
            //$ss->assign('USER',$_REQUEST['user']);

            if(isset($_REQUEST['submit_report']) || isset($_REQUEST['export_to_excel']) || isset($_REQUEST['button_first']) || isset($_REQUEST['button_previous']) || isset($_REQUEST['button_next']) || isset($_REQUEST['button_last'])){

                // Lay ra chinh xac dinh dang ngay thang mong muon
                $timeDate = new TimeDate();
                $user_date_format = $timeDate->get_date_format($current_user);
                $start_date = $timeDate->to_display($_REQUEST['start_date'], $user_date_format, 'Y-m-d');
                $end_date = $timeDate->to_display($_REQUEST['end_date'], $user_date_format, 'Y-m-d');
                $departments = $_REQUEST['department'];
                $user_ids = $_REQUEST['user_id'];
                
                $query_select = " SELECT a.*
                ,b.id as user_id
                ,TRIM(CONCAT(IFNULL(b.first_name,''),' ',IFNULL(b.last_name,' '))) AS user_name ";
                $query_from = " FROM tasks a JOIN users b ON b.id = a.assigned_user_id";
                $query_where = " WHERE a.deleted = 0 AND a.status = 'Completed'";
               
                // Neu co chon start
                if($start_date != ''){
                    $query_where.=' AND DATE(a.date_due) >= "'.$start_date.'"';
                }
                // Neu co chon end
                if($end_date != ''){
                    $query_where.=' AND DATE(a.date_due) <= "'.$end_date.'"';
                }
                
                // Neu co chon user
                if(count($user_ids) && $user_ids[0] != ''){
                    $or = ' AND (';
                    foreach($user_ids as $user_id){
                        $query_where .= $or.' b.id = "'.$user_id.'"';
                        $or = ' OR ';
                    }
                    $query_where.=')'; 
                }
                // Neu co chon phong ban
                if(count($departments) && $departments[0] != ''){
                    $or = ' AND (';
                    foreach($departments as $department){
                        $query_where .= $or.' b.department = "'.$department.'"';
                        $or = ' OR ';
                    }
                    $query_where.=')'; 
                }

                // Start Phan trang
                // So dong toi da trong 1 trang                
                $max_row_of_page = $sugar_config['list_max_entries_per_page'];

                // Kiem tra chi so dong dang duyet
                $row_start = 0;
                if(isset($_REQUEST['button_first'])){
                    $row_start = (isset($_REQUEST['first'])?$_REQUEST['first']:0); 
                }elseif(isset($_REQUEST['button_previous'])){
                    $row_start = (isset($_REQUEST['previous'])?$_REQUEST['previous']:0);
                }elseif(isset($_REQUEST['button_next'])){
                    $row_start = (isset($_REQUEST['next'])?$_REQUEST['next']:0);
                }elseif(isset($_REQUEST['button_last'])){
                    $row_start = (isset($_REQUEST['last'])?$_REQUEST['last']:0);
                }
                // End Phan trang
                
                //order by
                
                $orderby = " ORDER BY DATE(CONVERT_TZ(a.date_due,'+00:00','+07:00')) ASC, b.last_name ASC, TIME(CONVERT_TZ(a.date_due, '+00:00', '+07:00')) ASC"; 
                
                // Chi khi nao thao tac tren form thi moi thuc hien phan trang
                if(isset($_REQUEST['submit_report']) || isset($_REQUEST['button_first']) || isset($_REQUEST['button_previous']) || isset($_REQUEST['button_next']) || isset($_REQUEST['button_last'])){
                    $query_limit .= ' LIMIT '.$row_start.', '.$max_row_of_page.'';
                }  
                
                     

                $query_main =  $query_select . $query_from . $query_where . $orderby . $query_limit ;
                
                //Get data to count
                $report_result = $db->query($query_main);
                //
                $html = ''; 
                $list_task = array();
                $i = 0;
                while($row = $db->fetchByAssoc($report_result)){
                   $list_task[$i++] = $row; 
                }//end of while of campaigns  
                if($i>0){

                    // Get data to Phan trang
                    if(isset($_REQUEST['total']) && !isset($_REQUEST['submit_report'])){
                        $total =  $_REQUEST['total'];
                    }else{
                        $query_num_row = $query_select . $query_from . $query_where;
                        $num_row_result = $db->query($query_num_row);
                        $total = $db->getRowCount($num_row_result);
                    }
                    
                    //
                    
                    

                    // Xuat tieu de cho file exel
                    if(isset($_REQUEST['export_to_excel'])){
                        $html .= '
                        <table>
                        <tr>
                        <td colspan=8 align="center">
                        <h1>'.$mod_strings['LBL_REPORT_USER_ACTIVITIVES'].'</h1>
                        </td>
                        </tr>
                        </table>';    
                    }else{
                        $html .= '<h3>'.$mod_strings['LBL_RESULT'].'</h3>';    
                    }                    
                    //
                    
                    // Hien thi button phan trang 
                    if(isset($_REQUEST['submit_report']) || isset($_REQUEST['button_first']) || isset($_REQUEST['button_previous']) || isset($_REQUEST['button_next']) || isset($_REQUEST['button_last'])){
                        $html .= PhanTrang::insertActionPhanTrang($row_start,$max_row_of_page,$total);
                        $html .= PhanTrang::getButtonPhanTrang($row_start,$max_row_of_page,$total);
                    }
                    // 
                    
                    // Chen tong so luong vao tieu de tung cot
                    $html .= '<table cellpadding="0" cellspacing="0" width="100%" border="1" class="report_table">';
                    $html .= '<thead>'; 
                    $html .= '<tr>'; 
                    $html .= '<th>'.$mod_strings['LBL_STT'].'</th>';
                    $html .= '<th>'.$mod_strings['LBL_DATE'].'</th>';
                    $html .= '<th>'.$mod_strings['LBL_SALER'].'</th>';
                    $html .= '<th>'.$mod_strings['LBL_TIME'].'</th>'; 
                    $html .= '<th>'.$mod_strings['LBL_CONTENT'].'</th>';
                    $html .= '<th>'.$mod_strings['LBL_CUSTOMER'].'</th>';
                    $html .= '</tr>';
                    $html .= '</thead>';
                    $html .= '<tbody>';
                    
                    
                    
                    $index = $row_start + 1;
                    for($i = 0; $i < count($list_task);$i++){
                        $time = $timeDate->to_display_time($list_task[$i]['date_due'],true,true);
                        $date = $timeDate->to_display_date($list_task[$i]['date_due'],true);
                        $date_old = $timeDate->to_display_date($list_task[$i-1]['date_due'],true);
                        $html .= '<tr>';    
                        $html .= '<td width=20 align=center><a href="'.$sugar_config['site_url'].'/index.php?module=Tasks&action=DetailView&record='.$list_task[$i]['id'].'" target="_blank">'.$index++.'</a></td>';
                      //  $html .= '<td width=20>'.$index++.'</td>';
                        // Hien thi cot ngay
                        if($date != $date_old || $i == 0){
                            $html .= ViewReportUserActivitives::xuLyCotNgay($list_task,$i,$date);
                        }
                        
                        // Hien thi cot nhan vien
                        $user = $list_task[$i]['user_id'];
                        $user_old = $list_task[$i-1]['user_id'];
                        if($user != $user_old || $date != $date_old || $i == 0){
                            $html .= ViewReportUserActivitives::xuLyCotUser($list_task,$i);
                        }
                        
                        // Hien thi cot loai
                        //$type1 = $list_task[$i]['task_type'];
//                        $type2 = $list_task[$i-1]['task_type'];
//                        if($type1 != $type2 || $user != $user_old || $date != $date_old || $i == 0){
//                            $html .= ViewReportUserActivitives::xuLyCotType($list_task,$i);
//                        }
                        $html .= '<td width=100 style="mso-number-format:\'@\';"  align=center>'.$time.'</td>';                        
                        $html .= '<td width=200  align=left>'.$list_task[$i]['description'].'</td>';
                        $html .= '<td width=100  align=center><a href="'.$sugar_config['site_url'].'/index.php?module='.$list_task[$i]['parent_type'].'&action=DetailView&record='.$list_task[$i]['parent_id'].'" target="_blank">'.C_Reports::getName($list_task[$i]['parent_type'],$list_task[$i]['parent_id']).'</a></td>';
//                        $html .= '<td width=100  align=center>'.$list_task[$i]['y_kien_kh'].'</td>';
//                        $html .= '<td width=100  align=center>'.$list_task[$i]['y_kien_sale'].'</td>';
                    }                
                    $html .= '</tbody>';  
                    $html .= '</table>';
                    // Hien thi button phan trang
                    if(isset($_REQUEST['submit_report']) || isset($_REQUEST['button_first']) || isset($_REQUEST['button_previous']) || isset($_REQUEST['button_next']) || isset($_REQUEST['button_last'])){
                        $html .= PhanTrang::getButtonPhanTrang($row_start,$max_row_of_page,$total);
                    }
                    //

                }else{

                    $html .= '<h3>'.$mod_strings['LBL_NO_DATA'].'</h3>' ;

                }
            }

            if(isset($_REQUEST['export_to_excel'])){
                ob_clean();
                header("Pragma: cache");
                $html = chr(255).chr(254).mb_convert_encoding($html, "UTF-16LE", "UTF-8");
                header("Content-type: application/x-msdownload");
                header("Content-disposition: xls; filename=Report_User_Activitives.xls; size=".strlen($html));
                echo $html;
                exit();    
            }else{
                $ss->assign('RESULT', $html);
                $ss->display("modules/C_Reports/tpls/reportuseractivitives.tpl");    
            }
        }
        /**
        * Ham Xu ly cot ngay trong layout, muc dich de tao rowspan
        * 
        * @param mixed $list_task
        * @param mixed $i
        * @param mixed $date_time
        */
        function xuLyCotNgay($list_task = array(),$i,$date_time){
            $j = $i;
            $timeDate = new TimeDate();
            $date1 = $timeDate->to_display_date($list_task[$i]['date_due'],true);
            $date2 = $timeDate->to_display_date($list_task[$j]['date_due'],true);
            $dem = 0;
            while($date1 == $date2 && $j < count($list_task)){
                $dem ++;
                $date2 = $timeDate->to_display_date($list_task[++$j]['date_due'],true);
            }
            $html = '<td rowspan="'.$dem.'" width=100 style="mso-number-format:\'@\';"  align=center>'.$date_time.'</td>'; 
            return $html;
        }
        
        /**
        * Ham Xu ly cot user trong layout, muc dich de tao rowspan
        * 
        * @param mixed $list_task
        * @param mixed $i
        * @param mixed $date_time
        */
        function xuLyCotUser($list_task = array(),$i){
            global $sugar_config;
            $j = $i;
            $timeDate = new TimeDate();
            $date1 = $timeDate->to_display_date($list_task[$i]['date_due'],true);
            $date2 = $timeDate->to_display_date($list_task[$j]['date_due'],true);
            $user1 = $list_task[$i]['user_id'];
            $user2 = $list_task[$j]['user_id'];
            $dem = 0;
            while($user1 == $user2 && $date1 == $date2 && $j < count($list_task)){
                $dem ++;
                $user2 = $list_task[++$j]['user_id'];
                $date2 = $timeDate->to_display_date($list_task[$j]['date_due'],true); 
            }
            $html = '<td rowspan="'.$dem.'" width=100  align=center><a href="'.$sugar_config['site_url'].'/index.php?module=Employees&action=DetailView&record='.$list_task[$i]['user_id'].'" target="_blank">'.$list_task[$i]['user_name'].'</a></td>'; 
            return $html;
        }
        /**
        * Ham Xu ly cot type trong layout, muc dich de tao rowspan
        * 
        * @param mixed $list_task
        * @param mixed $i
        * @param mixed $date_time
        */
        function xuLyCotType($list_task = array(),$i){
            global $sugar_config;
            $j = $i;
            $timeDate = new TimeDate();
            $date1 = $timeDate->to_display_date($list_task[$i]['date_due'],true);
            $date2 = $timeDate->to_display_date($list_task[$j]['date_due'],true);
            $user1 = $list_task[$i]['user_id'];
            $user2 = $list_task[$j]['user_id'];
            $type1 = $list_task[$i]['task_type'];
            $type2 = $list_task[$j]['task_type'];
            $dem = 0;
            while($type1 == $type2 && $user1 == $user2 && $date1 == $date2 && $j < count($list_task)){
                $dem ++;
                $type2 = $list_task[++$j]['task_type']; 
                $user2 = $list_task[$j]['user_id'];
                $date2 = $timeDate->to_display_date($list_task[$j]['date_due'],true); 
            }
            
            $html = '<td rowspan="'.$dem.'" width=100  align=center>'.translate('task_type_dom','',$list_task[$i]['task_type']).'</a></td>';
            return $html;
        }
        
    }
?>
