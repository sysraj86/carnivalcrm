<?PHP
    /*********************************************************************************
    * SugarCRM Community Edition is a customer relationship management program developed by
    * SugarCRM, Inc. Copyright (C) 2004-2011 SugarCRM Inc.
    * 
    * This program is free software; you can redistribute it and/or modify it under
    * the terms of the GNU Affero General Public License version 3 as published by the
    * Free Software Foundation with the addition of the following permission added
    * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
    * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
    * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
    * 
    * This program is distributed in the hope that it will be useful, but WITHOUT
    * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
    * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
    * details.
    * 
    * You should have received a copy of the GNU Affero General Public License along with
    * this program; if not, see http://www.gnu.org/licenses or write to the Free
    * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
    * 02110-1301 USA.
    * 
    * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
    * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
    * 
    * The interactive user interfaces in modified source and object code versions
    * of this program must display Appropriate Legal Notices, as required under
    * Section 5 of the GNU Affero General Public License version 3.
    * 
    * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
    * these Appropriate Legal Notices must retain the display of the "Powered by
    * SugarCRM" logo. If the display of the logo is not reasonably feasible for
    * technical reasons, the Appropriate Legal Notices must display the words
    * "Powered by SugarCRM".
    ********************************************************************************/

    /**
    * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
    */
    require_once('modules/C_Reports/C_Reports_sugar.php');
    require_once("modules/C_Reports/pagingClass.php");
    class C_Reports extends C_Reports_sugar {
        
        var $count;
        function C_Reports(){	
            parent::C_Reports_sugar();
        }

        /**
        * Author: Lê Gia Thành
        * Des : Ham tinh diem cho nhan vien Telesales
        */
        function getDanhSachDiemCuaNhanVienTeleSale($app,$mod,$ds_ketqua=null,$start_date = array(),$end_date = array(),$sale_man_id=null,$phongban=null,$xephang=null,$export=null,$report_type=null){
            // Khai bao bien /////////////////////
            global $db,$app_list_strings;
            $sales_quytactinhdiem = $app_list_strings;
            //$ds_ketqua = array();
            $html = '';
            $sql = '';
            
            // Xu ly dau vao : sale man va department
            if($sale_man_id != ''){
                $sale_man_id = ' AND u.id = "'.$sale_man_id.'"';
                $phongban = '';
            }elseif($phongban != '' && $phongban != 'any'){
                $phongban = '
                         AND u.type_sale = "telesales" 
                         AND u.department = "'.$phongban.'"';
            }else{
                $phongban = '
                         AND u.type_sale = "telesales"
                         AND (u.department = "sales"
                            OR u.department = "ope"
                            OR u.department = "dos"
                            OR u.department = "mice")';
            }
            // Lay danh sach nhan vien ///////////
            $sql = '
                SELECT CONCAT(IFNULL(u.last_name,"")," ",IFNULL(u.first_name,"")) AS name
                ,u.id AS id
                ,u.department
                FROM users u
                WHERE u.deleted = 0
                    '.$sale_man_id.$phongban;
                    
            $result = $db->query($sql);
            while($row = $db->fetchByAssoc($result)){
                $ds_ketqua[] = $row; 
            }
            ///////////////////////////////////////
            // Voi moi nhan vien, ta lay tung gia tri ve khach hang
            for($i = 0 ; $i < count($ds_ketqua) ; $i ++){
                $department  =   strtolower($ds_ketqua[$i]['department']);
                
                //
                /**
                *  Lay so luong Target
                */
                $sql = '
                SELECT *
                FROM users a
                  JOIN prospects b
                    ON a.id = b.assigned_user_id ';
                $sql .= ' AND ( ';
                $or = '';
                for($j = 0 ; $j < count($start_date) ; $j++){
                    $sql .= $or.' (b.date_entered >= "'.$start_date[$j].'"
                            AND b.date_entered <= "'.$end_date[$j].'" )';
                    $or = ' OR ';
                }
                $sql .= ' ) ';
                $sql .=' AND b.deleted = 0
                WHERE a.deleted = 0
                    AND a.id = "'.$ds_ketqua[$i]['id'].'"
                ';
                $result = $db->query($sql);
                $total = $db->getRowCount($result); 
                $ds_ketqua[$i]['list']['quantity'] = $total;
                if($department != ''){ // neu phong ban ton tai thi moi cham diem phan list
                    $value = 0;
                    if($sales_quytactinhdiem['telesales_'.$department]['list']){
                        $value = ($total / $sales_quytactinhdiem['telesales_'.$department]['list'])*$sales_quytactinhdiem['telesales_score']['list'];
                    }
                    
                    if( $value > $sales_quytactinhdiem['telesales_score']['list']){
                        $ds_ketqua[$i]['list']['score'] = $sales_quytactinhdiem['telesales_score']['list'] ;  
                    }else{
                        $ds_ketqua[$i]['list']['score'] = $value ;
                    }
                }
                // End
                
                /**
                *  Lay so luong Leads
                */
                $sql = '
                SELECT *
                FROM users a
                  JOIN leads b
                    ON a.id = b.assigned_user_id
                      ';
                $sql .= ' AND ( ';
                $or = ''; 
                for($j = 0 ; $j < count($start_date) ; $j++){
                    $sql .= $or.' (b.date_entered >= "'.$start_date[$j].'"
                            AND b.date_entered <= "'.$end_date[$j].'" )';
                    $or = ' OR ';
                }
                $sql .= ' ) ';
                $sql .='
                      AND b.deleted = 0
                WHERE a.deleted = 0
                    AND a.id = "'.$ds_ketqua[$i]['id'].'"
                ';
                $result = $db->query($sql);
                $total = $db->getRowCount($result); 
                $ds_ketqua[$i]['leads']['quantity'] = $total;
                if($department != ''){
                    $value = 0;
                    if($sales_quytactinhdiem['telesales_'.$department]['leads']){
                        $value = ($total / $sales_quytactinhdiem['telesales_'.$department]['leads'])*$sales_quytactinhdiem['telesales_score']['leads'];
                    }
                    if( $value > $sales_quytactinhdiem['telesales_score']['leads']){
                        $ds_ketqua[$i]['leads']['score'] = $sales_quytactinhdiem['telesales_score']['leads'] ;  
                    }else{
                        $ds_ketqua[$i]['leads']['score'] = $value;
                    }
                }
                // End
                
                /**
                *  Lay so luong Opportunity
                */
                $sql = '
                    SELECT *
                    FROM users a
                      JOIN opportunities b
                        ON a.id = b.assigned_user_id
                        ';
                $sql .= ' AND ( ';
                $or = ''; 
                for($j = 0 ; $j < count($start_date) ; $j++){
                    $sql .= $or.' (b.date_entered >= "'.$start_date[$j].'"
                            AND b.date_entered <= "'.$end_date[$j].'" )';
                    $or = ' OR ';
                }
                $sql .= ' ) ';
                $sql .='
                          AND b.deleted = 0
                          AND b.sales_stage <> "Closed Lost"
                    WHERE a.deleted = 0
                        AND a.id = "'.$ds_ketqua[$i]['id'].'"
                ';
                $result = $db->query($sql);
                $total = $db->getRowCount($result); 
                $ds_ketqua[$i]['opp_new']['quantity'] = $total;
                if($department != ''){
                    $value = 0;
                    if($sales_quytactinhdiem['telesales_'.$department]['opp_new']){
                        $value = ($total / $sales_quytactinhdiem['telesales_'.$department]['opp_new'])*$sales_quytactinhdiem['telesales_score']['opp_new'];
                    }
                    if( $value > $sales_quytactinhdiem['telesales_score']['opp_new']){
                        $ds_ketqua[$i]['opp_new']['score'] = $sales_quytactinhdiem['telesales_score']['opp_new'] ;  
                    }else{
                        $ds_ketqua[$i]['opp_new']['score'] = $value;
                    }
                }
                // End
                /**
                *  Lay so luong Hop dong cua nhan vien nay
                */
                $sql = '
                    SELECT *
                    FROM users a
                      JOIN contracts b
                        ON a.id = b.assigned_user_id
                          ';
                $sql .= ' AND ( ';
                $or = ''; 
                for($j = 0 ; $j < count($start_date) ; $j++){
                    $sql .= $or.' (b.date_entered >= "'.$start_date[$j].'"
                            AND b.date_entered <= "'.$end_date[$j].'" )';
                    $or = ' OR ';
                }
                $sql .= ' ) ';
                $sql .='
                          AND b.deleted = 0
                    WHERE a.deleted = 0
                        AND a.id = "'.$ds_ketqua[$i]['id'].'"
                ';
                $result = $db->query($sql);
                $total = $db->getRowCount($result); 
                $ds_ketqua[$i]['success']['quantity'] = $total;
                if($department != ''){
                    $value = 0;
                    if($sales_quytactinhdiem['telesales_'.$department]['success']){
                        $value = ($total / $sales_quytactinhdiem['telesales_'.$department]['success'])*$sales_quytactinhdiem['telesales_score']['success'];
                    }
                    if( $value > $sales_quytactinhdiem['telesales_score']['success']){
                        $ds_ketqua[$i]['success']['score'] = $sales_quytactinhdiem['telesales_score']['success'] ;  
                    }else{
                        $ds_ketqua[$i]['success']['score'] = $value;
                    }
                }
                // End
                /**
                * Lay du lieu dua vao html
                */
                
                /**
                * Lay tong gia tri hop dong
                */
                $sql = '
                    SELECT SUM(b.tongtien) as revenue
                    FROM users a
                      JOIN contracts b
                        ON a.id = b.assigned_user_id
                          ';
                $sql .= ' AND ( ';
                $or = ''; 
                for($j = 0 ; $j < count($start_date) ; $j++){
                    $sql .= $or.' (b.date_entered >= "'.$start_date[$j].'"
                            AND b.date_entered <= "'.$end_date[$j].'" )';
                    $or = ' OR ';
                }
                $sql .= ' ) ';
                $sql .='
                          AND b.deleted = 0
                    WHERE a.deleted = 0
                        AND a.id = "'.$ds_ketqua[$i]['id'].'"
                ';
                $result = $db->query($sql);
                $total = $db->fetchByAssoc($result); 
                $ds_ketqua[$i]['revenue']['quantity'] = $total['revenue'];
            }
            // End
            
            for($i = 0 ; $i < count($ds_ketqua) ; $i ++){
                // Tinh so thu tu:
                $stt = $i+1;
                // Tinh tong diem:
                $ds_ketqua[$i]['total'] = round($ds_ketqua[$i]['list']['score']) + round($ds_ketqua[$i]['leads']['score']) + round($ds_ketqua[$i]['opp_new']['score']) + round($ds_ketqua[$i]['success']['score']) ;
                
                // Kiem tra phong ban:
                if($ds_ketqua[$i]['department'] != ''){
                    $department = translate('deparment_dom','',$ds_ketqua[$i]['department']);
                    if(is_array($department))$department='';
                }else{
                    $department = '';
                }
                // Xep hang nhan vien:
                $hang = '';
                if($export != 1){
                    if($xephang == 1){
                        $hang .= '<td class="line">';
                        $hang .= $this->getRate('telesales',$ds_ketqua[$i]['total']);
                        $hang .= '</td>';
                    }
                    $html .= '
                        <tr style="background-color: #F5FFFA; height: 30px;" class="hover">
                            <td class="line">'.$stt.'</td>
                            <td class="line"><a href="index.php?module=Employees&action=DetailView&record='.$ds_ketqua[$i]['id'].'">'.$ds_ketqua[$i]['name'].'</a></td>
                            <td class="line">'.$department.'</td>
                            <td class="line">'.round($ds_ketqua[$i]['list']['quantity']).'</td>
                            <td class="line">'.round($ds_ketqua[$i]['list']['score']).'</td>
                            <td class="line">'.round($ds_ketqua[$i]['leads']['quantity']).'</td>
                            <td class="line">'.round($ds_ketqua[$i]['leads']['score']).'</td>
                            <td class="line">'.round($ds_ketqua[$i]['opp_new']['quantity']).'</td>
                            <td class="line">'.round($ds_ketqua[$i]['opp_new']['score']).'</td>
                            <td class="line">'.round($ds_ketqua[$i]['success']['quantity']).'</td>
                            <td class="line">'.round($ds_ketqua[$i]['success']['score']).'</td>
                            <td class="line">'.round($ds_ketqua[$i]['revenue']['quantity']).'</td>
                            <td class="line">'.round($ds_ketqua[$i]['total']).'</td>
                            '.$hang.'
                        </tr>
                    ';
                }else{
                    if($xephang == 1){
                        $hang .= '<td class=xl69 style="border-top:none;border-left:none">';
                        $hang .= $this->getRate('telesales',$ds_ketqua[$i]['total']);
                        $hang .= '</td>';
                    }
                    $html .= '
                          </tr>
                             <tr height=19 style="height:14.25pt">
                              <td height=19 class=xl68 align=right style="height:14.25pt;border-top:none">'.$stt.'</td>
                              <td class=xl68 align=right style="border-top:none;border-left:none">'.$ds_ketqua[$i]['name'].'</td>
                              <td class=xl69 style="border-top:none;border-left:none">'.$department.' </td>
                              <td class=xl69 style="border-top:none;border-left:none">'.round($ds_ketqua[$i]['list']['quantity']).' </td>
                              <td class=xl69 style="border-top:none;border-left:none">'.round($ds_ketqua[$i]['list']['score']).' </td>
                              <td class=xl69 style="border-top:none;border-left:none">'.round($ds_ketqua[$i]['leads']['quantity']).' </td>
                              <td class=xl69 style="border-top:none;border-left:none">'.round($ds_ketqua[$i]['leads']['score']).' </td>
                              <td class=xl69 style="border-top:none;border-left:none">'.round($ds_ketqua[$i]['opp_new']['quantity']).' </td>
                              <td class=xl69 style="border-top:none;border-left:none">'.round($ds_ketqua[$i]['opp_new']['score']).' </td>
                              <td class=xl69 style="border-top:none;border-left:none">'.round($ds_ketqua[$i]['success']['quantity']).' </td>
                              <td class=xl69 style="border-top:none;border-left:none">'.round($ds_ketqua[$i]['success']['score']).' </td>
                              <td class=xl69 style="border-top:none;border-left:none">'.round($ds_ketqua[$i]['revenue']['quantity']).' </td>
                              <td class=xl69 style="border-top:none;border-left:none">'.round($ds_ketqua[$i]['total']).' </td>
                              '.$hang.'
                          </tr>
                    '; 
                }
            }
            // Tao nut export :
            if(count($ds_ketqua) > 0 && $export != 1){
                $hang = '';
                if($xephang == 1){
                    $hang .= '<td class="nomal"></td>';
                }
                $html .= '
                    <tr>
                        <td class="nomal"></td>
                        <td class="nomal"></td>
                        <td class="nomal"></td>
                        <td class="nomal"></td>
                        <td class="nomal"></td>
                        <td class="nomal"></td>
                        <td class="nomal"></td>
                        <td class="nomal"></td>
                        <td class="nomal"></td>
                        <td class="nomal"></td>
                        <td class="nomal"></td>
                        <td class="nomal"></td>
                        '.$hang.'
                        <td class="nomal">
                        <input type="submit" name="export" id="export" value="'.$mod['LBL_EXPORT'].'">
                        <input type="hidden" name="report_type" id="report_type" value="'.$report_type.'">
                        </td>
                    </tr>
                ';
            }
            return $html;   
        }
        /**
        * Author: Lê Gia Thành
        * Des : Ham tinh diem cho nhan vien Sales
        */
        function getDanhSachDiemCuaNhanVienSale($app,$mod,$ds_ketqua=null,$start_date = null,$end_date = null,$sale_man_id=null,$phongban=null,$xephang=null,$export=null,$report_type=null){
            // Khai bao bien /////////////////////
            global $db,$app_list_strings;
            $sales_quytactinhdiem = $app_list_strings;
            //$ds_ketqua = array();
            $html = '';
            $sql = '';
            
            // Lay danh sach nhan vien ///////////
            // Xu ly dau vao : sale man va department
            if($sale_man_id != ''){
                $sale_man_id = ' AND u.id = "'.$sale_man_id.'"';
                $phongban = '';
            }elseif($phongban != '' && $phongban != 'any'){
                $phongban = '
                         AND u.type_sale = "sales" 
                         AND u.department = "'.$phongban.'"';
            }else{
                $phongban = '
                         AND u.type_sale = "sales"
                         AND (u.department = "sales"
                            OR u.department = "ope"
                            OR u.department = "dos"
                            OR u.department = "mice")';
            }
            // Lay danh sach nhan vien ///////////
            $sql = '
                SELECT CONCAT(IFNULL(u.last_name,"")," ",IFNULL(u.first_name,"")) AS name
                ,u.id AS id
                ,u.department
                FROM users u
                WHERE u.deleted = 0
                    '.$sale_man_id.$phongban;
            $result = $db->query($sql);
            while($row = $db->fetchByAssoc($result)){
                $ds_ketqua[] = $row; 
            }
            ///////////////////////////////////////
            // Voi moi nhan vien, ta lay tung gia tri ve khach hang
            for($i = 0 ; $i < count($ds_ketqua) ; $i ++){
                $department  =   strtolower($ds_ketqua[$i]['department']);
                
                
                
                
                
                /**
                *  Tinh khach hang cu
                * @var mixed
                */
                $sql = '
                    SELECT *
                    FROM opportunities o
                    WHERE o.assigned_user_id IN(SELECT
                                                  u.id
                                                FROM users u
                                                WHERE u.department = "'.$department.'")
                    AND o.opportunity_type <> "New Business"
                    AND o.sales_stage <> "Closed Lost" 
                ';
                $result = $db->query($sql);
                $total = $db->getRowCount($result); 
                $ds_ketqua[$i]['customer']['khachcu'] = $total;
                $khachcu   = $ds_ketqua[$i]['customer']['khachcu'];
                /**
                * Lay nhan vien moi
                * 
                * @var mixed
                */
                $sql = '
                    SELECT *
                    FROM users a
                      JOIN opportunities b
                        ON a.id = b.assigned_user_id
                          AND b.date_entered >= "'.$start_date.'"
                          AND b.date_entered <= "'.$end_date.'"
                          AND b.opportunity_type = "New Business"
                          AND b.sales_stage <> "Closed Lost"
                          AND b.deleted = 0
                    WHERE a.deleted = 0
                        AND a.id = "'.$ds_ketqua[$i]['id'].'"
                ';
                $result = $db->query($sql);
                $total = $db->getRowCount($result);
                $ds_ketqua[$i]['customer']['khachmoi'] = $total; 
                $khachmoi   = $ds_ketqua[$i]['customer']['khachmoi'];
                
                /**
                * Tinh ty le va tinh score
                * 
                * @var mixed
                */
                $opp_new    = $khachmoi+$khachcu;
                $tyle = 0;
                if($khachcu != 0 && $khachmoi != 0){
                    if($khachcu >= $khachmoi){
                        $tyle = $khachcu / $khachmoi * 100;
                    }else{
                        $tyle = $khachmoi / $khachcu * 100;
                    }
                    // Max cua ty le la 150%
                    if($tyle > 150){
                        $tyle = 150;
                    }
                    // Neu phong ban = OPE thi ap dung cong thuc khac
                    if($department == 'ope'){
                        if($khachcu == $khachmoi){
                            $tyle = 150;
                        }
                    }
                }
                $ds_ketqua[$i]['customer']['tyle'] = $tyle;
                // Tinh diem cho phan Customer
                // Tinh Score : IF((F47+G47)<(0.8*B47),0,IF(H47>1,$H$51*(1+(H47-1)*2),0))
                $score = 0;
                if($khachcu + $khachmoi >= 0.8 * $opp_new){
                    if($tyle > 100){
                        $score = $sales_quytactinhdiem['sales_score']['opp_new'] *(1 + 2*($tyle-100)/100);
                    }
                }
                
                $ds_ketqua[$i]['customer']['score'] = $score;
                $score2 = $score;
                // Tinh Score x 2 : IF((F47+G47)>=(B47*2),I47*2,I47)
                if($khachcu + $khachmoi >= $opp_new * 2){
                   $score2 = $score * 2; 
                }
                $ds_ketqua[$i]['customer']['scorex2'] = $score2;
                

                
                
                /**
                *  Lay so luong Opportunity
                */
                $sql = '
                    SELECT *
                    FROM users a
                      JOIN opportunities b
                        ON a.id = b.assigned_user_id
                          AND b.date_entered >= "'.$start_date.'"
                          AND b.date_entered <= "'.$end_date.'"
                          AND b.deleted = 0
                          AND b.sales_stage <> "Closed Lost"
                    WHERE a.deleted = 0
                        AND a.id = "'.$ds_ketqua[$i]['id'].'"
                ';
                $result = $db->query($sql);
                $total = $db->getRowCount($result);
                $ds_ketqua[$i]['opp_new']['quantity'] = $total ;
                if($department != ''){
                    $value = 0;
                    if($sales_quytactinhdiem['sales_'.$department]['opp_new']){
                       $value = ($total / $sales_quytactinhdiem['sales_'.$department]['opp_new'])*$sales_quytactinhdiem['sales_score']['opp_new']; 
                    }
                    
                    if( $value > $sales_quytactinhdiem['sales_score']['opp_new']){
                        $ds_ketqua[$i]['opp_new']['score'] = $sales_quytactinhdiem['sales_score']['opp_new'] ;  
                    }else{
                        $ds_ketqua[$i]['opp_new']['score'] = $value;
                    }
                }
                // End
                /**
                *  Lay so luong Hop dong cua nhan vien nay
                */ 
                $sql = '
                    SELECT *
                    FROM users a
                      JOIN contracts b
                        ON a.id = b.assigned_user_id
                          AND b.date_entered >= "'.$start_date.'"
                          AND b.date_entered <= "'.$end_date.'"
                          AND b.deleted = 0
                    WHERE a.deleted = 0
                        AND a.id = "'.$ds_ketqua[$i]['id'].'"
                ';
                $result = $db->query($sql);
                $total = $db->getRowCount($result); 
                $ds_ketqua[$i]['success']['quantity'] = $total;
                if($department != ''){
                    $value = 0;
                    if($sales_quytactinhdiem['sales_'.$department]['success']){
                        $value = ($total / $sales_quytactinhdiem['sales_'.$department]['success'])*$sales_quytactinhdiem['sales_score']['success'];
                    }
                    if( $value > $sales_quytactinhdiem['sales_score']['success']){
                        $ds_ketqua[$i]['success']['score'] = $sales_quytactinhdiem['sales_score']['success'] ;  
                    }else{
                        $ds_ketqua[$i]['success']['score'] = $value;
                    }
                }
                // End
                /**
                * Lay du lieu dua vao html
                */
                /**
                * Lay tong gia tri hop dong
                */
                $sql = '
                    SELECT SUM(b.tongtien) as revenue
                    FROM users a
                      JOIN contracts b
                        ON a.id = b.assigned_user_id
                          ';
                $sql .= ' AND ( ';
                $or = ''; 
                for($j = 0 ; $j < count($start_date) ; $j++){
                    $sql .= $or.' (b.date_entered >= "'.$start_date[$j].'"
                            AND b.date_entered <= "'.$end_date[$j].'" )';
                    $or = ' OR ';
                }
                $sql .= ' ) ';
                $sql .='
                          AND b.deleted = 0
                    WHERE a.deleted = 0
                        AND a.id = "'.$ds_ketqua[$i]['id'].'"
                ';
                $result = $db->query($sql);
                $total = $db->fetchByAssoc($result); 
                $ds_ketqua[$i]['revenue']['quantity'] = $total['revenue'];
            }
            // End
            
            for($i = 0 ; $i < count($ds_ketqua) ; $i ++){
                $stt = $i+1;
                $ds_ketqua[$i]['total'] = round($ds_ketqua[$i]['opp_new']['score']) + round($ds_ketqua[$i]['success']['score']) + round($ds_ketqua[$i]['customer']['scorex2']) ;
                
                // Kiem tra phong ban:
                if($ds_ketqua[$i]['department'] != ''){
                    $department = translate('deparment_dom','',$ds_ketqua[$i]['department']);
                    if(is_array($department))$department='';
                }else{
                    $department = '';
                }
                
                if($export != 1){
                    // Xep hang nhan vien:
                    $hang = '';
                    if($xephang == 1){
                        $hang .= '<td class="line">';
                        $hang .= $this->getRate('sales',$ds_ketqua[$i]['total']);
                        $hang .= '</td>';
                    }
                    //
                    $html .= '
                        <tr style="background-color: #F5FFFA; height: 30px;" class="hover">
                            <td class="line">'.$stt.'</td>
                            <td class="line"><a href="index.php?module=Employees&action=DetailView&record='.$ds_ketqua[$i]['id'].'">'.$ds_ketqua[$i]['name'].'</a></td>
                            <td class="line">'.$department.'</td>
                            <td class="line">'.round($ds_ketqua[$i]['opp_new']['quantity']).'</td>
                            <td class="line">'.round($ds_ketqua[$i]['opp_new']['score']).'</td>
                            <td class="line">'.round($ds_ketqua[$i]['success']['quantity']).'</td>
                            <td class="line">'.round($ds_ketqua[$i]['success']['score']).'</td>
                            <td class="line">'.round($ds_ketqua[$i]['customer']['khachcu']).'</td>
                            <td class="line">'.round($ds_ketqua[$i]['customer']['khachmoi']).'</td>
                            <td class="line">'.round($ds_ketqua[$i]['customer']['tyle']).' %</td>
                            <td class="line">'.round($ds_ketqua[$i]['customer']['score']).'</td>
                            <td class="line">'.round($ds_ketqua[$i]['customer']['scorex2']).'</td>
                            <td class="line">'.round($ds_ketqua[$i]['revenue']['quantity']).'</td>
                            <td class="line">'.round($ds_ketqua[$i]['total']).'</td>
                            '.$hang.'
                        </tr>
                    ';
                }else{
                    // Xep hang nhan vien:
                    $hang = '';
                    if($xephang == 1){
                        $hang .= '<td class=xl68 style="border-top:none;border-left:none">';
                        $hang .= $this->getRate('sales',$ds_ketqua[$i]['total']);
                        $hang .= '</td>';
                    }
                    //
                    $html .= '
                        <tr height=19 style="height:14.25pt">
                          <td height=19 class=xl67 align=right style="height:14.25pt;border-top:none">'.$stt.'</td>
                          <td class=xl67 align=right style="border-top:none;border-left:none">'.$ds_ketqua[$i]['name'].'</td>
                          <td class=xl68 style="border-top:none;border-left:none">
                          '.$department.'</td>
                          <td class=xl68 style="border-top:none;border-left:none">'.round($ds_ketqua[$i]['opp_new']['quantity']).' </td>
                          <td class=xl68 style="border-top:none;border-left:none">'.round($ds_ketqua[$i]['opp_new']['score']).' </td>
                          <td class=xl68 style="border-top:none;border-left:none">'.round($ds_ketqua[$i]['success']['quantity']).' </td>
                          <td class=xl68 style="border-top:none;border-left:none">'.round($ds_ketqua[$i]['success']['score']).' </td>
                          <td class=xl68 style="border-top:none;border-left:none">'.round($ds_ketqua[$i]['customer']['khachcu']).' </td>
                          <td class=xl68 style="border-top:none;border-left:none">'.round($ds_ketqua[$i]['customer']['khachmoi']).' </td>
                          <td class=xl68 style="border-top:none;border-left:none">'.round($ds_ketqua[$i]['customer']['tyle']).' </td>
                          <td class=xl68 style="border-top:none;border-left:none">'.round($ds_ketqua[$i]['customer']['score']).' </td>
                          <td class=xl68 style="border-top:none;border-left:none">'.round($ds_ketqua[$i]['customer']['scorex2']).' </td>
                          <td class=xl68 style="border-top:none;border-left:none">'.round($ds_ketqua[$i]['revenue']['quantity']).' </td>
                          <td class=xl68 style="border-top:none;border-left:none">'.round($ds_ketqua[$i]['total']).' </td>
                          '.$hang.'
                        </tr>
                    ';     
                }
            }
            // Tao nut export :
            if(count($ds_ketqua) > 0 && $export != 1){
                $hang = '';
                if($xephang == 1){
                    $hang .= '<td class="nomal"></td>';
                }
                $html .= '
                    <tr>
                        <td class="nomal"></td>
                        <td class="nomal"></td>
                        <td class="nomal"></td>
                        <td class="nomal"></td>
                        <td class="nomal"></td>
                        <td class="nomal"></td>
                        <td class="nomal"></td>
                        <td class="nomal"></td>
                        <td class="nomal"></td>
                        <td class="nomal"></td>
                        <td class="nomal"></td>
                        <td class="nomal"></td>
                        <td class="nomal"></td>
                        '.$hang.'
                        <td class="nomal">
                        <input type="submit" name="export" id="export" value="'.$mod['LBL_EXPORT'].'">
                        <input type="hidden" name="report_type" id="report_type" value="'.$report_type.'">
                        </td>
                    </tr>
                ';
            }
            return $html;   
        }
        
        /**
        * Ham lay xep hang cua nhanh vien
        */
        function getRate($type_sales,$total){
            global $app_list_strings;
            $quyTacXepHang = $app_list_strings;
            $hang = '';
            
            if($total >= $quyTacXepHang[$type_sales.'_xuatsac']['min']){
                $hang = $quyTacXepHang[$type_sales.'_xuatsac']['rate'];  
            }elseif($total >= $quyTacXepHang[$type_sales.'_gioi']['min'] && $total < $quyTacXepHang[$type_sales.'_gioi']['max']){
                $hang = $quyTacXepHang[$type_sales.'_gioi']['rate'];
            }elseif($total >= $quyTacXepHang[$type_sales.'_kha']['min'] && $total < $quyTacXepHang[$type_sales.'_kha']['max']){
                $hang = $quyTacXepHang[$type_sales.'_kha']['rate'];
            }elseif($total >= $quyTacXepHang[$type_sales.'_trungbinh']['min'] && $total < $quyTacXepHang[$type_sales.'_trungbinh']['max']){
                $hang = $quyTacXepHang[$type_sales.'_trungbinh']['rate'];
            }elseif($total >= $quyTacXepHang[$type_sales.'_yeu']['min'] && $total < $quyTacXepHang[$type_sales.'_yeu']['max']){
                $hang = $quyTacXepHang[$type_sales.'_yeu']['rate'];
            }
            return $hang;
        }
        
        
        /**
         * Ham tao mot list data(dropdown data) tu data cua mot module
         * 
         * @param mixed $module  : Bean Module
         * @param mixed $list_name : Ten danh sach (dropdown)
         * @param mixed $custom_where : Cau dieu kien (neu co)
         */
         function getList($module,$list_name,$custom_select = Null,$custom_where=null){
            global $db,$app_list_strings;
            if(!$custom_select) $custom_select = "id,name";
            if($custom_where) $custom_where .= " AND ";
            $sql = "SELECT {$custom_select} FROM {$module->table_name} WHERE {$custom_where} deleted = 0";
            
            $result = $db->query($sql);
            // Bien kiem tra thanh cong/that bai cua ham
            $kt = false;
            
            // Khoi tao gia tri ban dau cho list search
            $app_list_strings[$list_name][''] = '';
            while($row = $db->fetchByAssoc($result)){
                $app_list_strings[$list_name][$row['id']] = $row['name'];
                $kt = true;
            }
            return $kt;
        }
        
        
        function getName($module,$id){
            global $db;
            $table_name = strtolower($module);
            $sql = 'SELECT CONCAT(IFNULL(last_name,"")," ",IFNULL(first_name,"")) AS name FROM '.$table_name.' WHERE id = "'.$id.'" AND deleted = 0';
            $result = $db->query($sql);
            $row = $db->fetchByAssoc($result);
            if($row) return $row['name'];
            return '';
         }
         
         function getUserRole($moudle = '',$user_id){
            global $app_list_strings, $db,$current_user;
            $alcAction = new ACLAction();
            $is_owner = true; 
            $bool = ACLController::checkAccess($moudle, 'view', $is_owner);
            $action = $alcAction->getUserActions($user_id,false,$moudle,'module','view');
            if($current_user->is_admin == '1'){
                $view = $action[$moudle]['module']['view']['aclaccess'];   
            }
            else{
                $view = $action['aclaccess']; 
            } 

            $view2 = $action['aclaccess'];

            $arr_role = array('access1' => $bool, 'access2' => $view,'access3' => $view2 ) ;
            return  $arr_role;
        }
        function  getUserForReportAsRole(){
            global $current_user,$app_list_strings, $db;
            $role = $this->getUserRole('Reports',$current_user->id);
            $list_user = array();
            //$bool = $role['access1'];
//            $view = $role['access2'];
//            $view1 = $role['access3'];
            // if this user can access module report
            //if($bool){
                // if this user access owner 
//                if($view == 75 || $view1 == 75){
//                    $list_user[]= array('id' => $current_user->id, 'name' => $current_user->user_name);  
//                    $app_list_strings['report_user_dom'][$current_user->id] = $current_user->user_name;
//                }
                // else this user access group
//                if($view == 80 || $view1 == 80) {
//                    $query = "SELECT id , user_name FROM users WHERE deleted =0 AND status ='Active' AND id IN(
//                    SELECT
//                    DISTINCT user_id
//                    FROM securitygroups_users
//                    WHERE deleted = 0
//                    AND securitygroup_id IN(SELECT
//                    securitygroup_id
//                    FROM securitygroups_users
//                    WHERE user_id = '".$current_user->id."' AND deleted = 0))";
//                    $list_user[]= array('id' => '0', 'user_name' => '---All---');
//                    $app_list_strings['report_user_dom'][0] = '---All---';  
//                    $result = $db->query($query);
//                    while($row = $db->fetchByAssoc($result)){
//                        $list_user[]= array('id' => $row['id'], 'user_name' => $row['user_name']);  
//                        $app_list_strings['report_user_dom'][$row['id']] = $row['user_name'];
//                    }
//                }
//                if($view == 90 || $view1 == 90){
                    $query = "SELECT id , user_name FROM users WHERE deleted =0 AND status ='Active' ";
                    $result = $db->query($query);
                   // $list_user[]= array('id' => '-1', 'user_name' => '---None---');
                   // $app_list_strings['report_user_dom'][$list_user[0]['id']] = $list_user[0]['user_name'];  
                    while($row = $db->fetchByAssoc($result)){
                        $list_user[]= array('id' => $row['id'], 'user_name' => $row['user_name']);
                        $app_list_strings['report_user_dom'][$row['id']] = $row['user_name'];     
                    } 
//                }
//                if($view == -99 || $view1 == -99){
//                    $list_user[]= array();
//                }
                    return $list_user;
            }
//            
       
        /**
        * GET all user of group 
        * 
        * @param mixed $id
        */
        function getAllUserBySecuritySuite($id =''){
            global $db ,$app_list_strings;
            $query = "SELECT id FROM users WHERE deleted =0 AND id IN(
            SELECT
            DISTINCT user_id
            FROM securitygroups_users INNER JOIN securitygroups ON securitygroups_users.securitygroup_id = securitygroups.id
            WHERE securitygroups_users.deleted = 0 AND securitygroups.deleted =0 
            AND securitygroup_id = '".$id."')";
            $result = $db->query($query) ;
            $listData = array();
            while($row = $db->fetchByAssoc($result)){
                array_push($listData,$row['id']);
            }
            return $listData; 
        }
        function getAllSecuritySuite(){
            global $db, $app_list_strings;
            $query = "SELECT securitygroups.id , securitygroups.name FROM securitygroups WHERE securitygroups.deleted=0";
            $result = $db->query($query);
            while($row = $db->fetchByAssoc($result)){
                $app_list_strings['report_securitysuite_dom'][$row['id']] = $row['name'];
                $listData[] = $row; 
            }
            return $listData; 
        }
      
       function countRecordCreate($table_name = '' , $user_id='', $start_date = '', $end_date){
            global $db;
            $dateOp = new AdvancedDatetimeOperations($this);
            $start_date = $dateOp->sub_date($start_date,1);
            $query = "SELECT id FROM ".$table_name ." WHERE deleted = 0 AND '".$start_date." 17:00:00' <= date_entered AND date_entered <= '".$end_date." 16:59:59' AND created_by IN('".$user_id."') ";
            $result = $db->query($query);
            $count = $db->getRowCount($result) ;
            return $count ;
        }
        /**
        * count of record modify
        * 
        * @param mixed $table_name
        * @param mixed $user_id
        * @param mixed $start_date
        * @param mixed $end_date
        */
        function countRecordAsignedTo($table_name = '' , $user_id ='', $start_date = '', $end_date){
            global $db;
            $dateOp = new AdvancedDatetimeOperations($this); 
            $date_start = $dateOp->sub_date($start_date,1);
            $query = "SELECT id FROM ".$table_name ." WHERE deleted = 0 
            AND ( '".$date_start." 17:00:00' <= date_modified AND date_modified <= '".$end_date." 16:59:59') 
            AND assigned_user_id IN('".$user_id."') ";
            $result = $db->query($query);
            $count = $db->getRowCount($result) ;
            return $count ;
        }
        function countRecordModify($table_name = '' , $user_id='', $start_date = '', $end_date){
            global $db;
            $dateOp = new AdvancedDatetimeOperations($this);
            $start_date = $dateOp->sub_date($start_date,1);
            $query = "SELECT id FROM ".$table_name ." WHERE deleted = 0 AND ( '".$start_date." 17:00:00' <= date_modified AND date_modified <= '".$end_date." 16:59:59') AND modified_user_id IN('".$user_id."') ";
            $result = $db->query($query);
            $count = $db->getRowCount($result) ;
            return $count ;
        }
    }
?>