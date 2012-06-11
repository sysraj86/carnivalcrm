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
        function getDanhSachDiemCuaNhanVienTeleSale($app,$mod,$ds_ketqua=null,$start_date = null,$end_date = null,$sale_man_id=null,$phongban=null,$xephang=null,$export=null,$report_type=null){
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
                SELECT CONCAT(u.last_name," ",u.first_name) AS name
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
                $department  =   $ds_ketqua[$i]['department'];
                
                //
                /**
                *  Lay so luong Target
                */
                $sql = '
                SELECT *
                FROM users a
                  JOIN prospects b
                    ON a.id = b.assigned_user_id
                      AND b.date_entered >= "'.$start_date.'"
                      AND b.date_entered <= "'.$end_date.'"
                      AND b.deleted = 0
                WHERE a.deleted = 0
                    AND a.id = "'.$ds_ketqua[$i]['id'].'"
                ';
                $result = $db->query($sql);
                $total = $db->getRowCount($result); 
                $ds_ketqua[$i]['list']['quantity'] = $total;
                if($department != ''){ // neu phong ban ton tai thi moi cham diem phan list
                    $value = ($total / $sales_quytactinhdiem['telesales_'.$department]['list'])*$sales_quytactinhdiem['telesales_score']['list'];
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
                      AND b.date_entered >= "'.$start_date.'"
                      AND b.date_entered <= "'.$end_date.'"
                      AND b.deleted = 0
                WHERE a.deleted = 0
                    AND a.id = "'.$ds_ketqua[$i]['id'].'"
                ';
                $result = $db->query($sql);
                $total = $db->getRowCount($result); 
                $ds_ketqua[$i]['leads']['quantity'] = $total;
                if($department != ''){
                    $value = ($total / $sales_quytactinhdiem['telesales_'.$department]['leads'])*$sales_quytactinhdiem['telesales_score']['leads'];
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
                          AND b.date_entered >= "'.$start_date.'"
                          AND b.date_entered <= "'.$end_date.'"
                          AND b.deleted = 0
                    WHERE a.deleted = 0
                        AND a.id = "'.$ds_ketqua[$i]['id'].'"
                ';
                $result = $db->query($sql);
                $total = $db->getRowCount($result); 
                $ds_ketqua[$i]['opp_new']['quantity'] = $total;
                if($department != ''){
                    $value = ($total / $sales_quytactinhdiem['telesales_'.$department]['opp_new'])*$sales_quytactinhdiem['telesales_score']['opp_new'];
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
                    $value = ($total / $sales_quytactinhdiem['telesales_'.$department]['success'])*$sales_quytactinhdiem['telesales_score']['success'];
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
                SELECT CONCAT(u.last_name," ",u.first_name) AS name
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
                $department  =   $ds_ketqua[$i]['department'];
                
                
                
                
                
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
                    WHERE a.deleted = 0
                        AND a.id = "'.$ds_ketqua[$i]['id'].'"
                ';
                $result = $db->query($sql);
                $total = $db->getRowCount($result);
                $ds_ketqua[$i]['opp_new']['quantity'] = $total ;
                if($department != ''){
                    $value = ($total / $sales_quytactinhdiem['sales_'.$department]['opp_new'])*$sales_quytactinhdiem['sales_score']['opp_new'];
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
                    $value = ($total / $sales_quytactinhdiem['sales_'.$department]['success'])*$sales_quytactinhdiem['sales_score']['success'];
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
                
            }
            // End
            
            for($i = 0 ; $i < count($ds_ketqua) ; $i ++){
                $stt = $i+1;
                $ds_ketqua[$i]['total'] = round($ds_ketqua[$i]['opp_new']['score']) + round($ds_ketqua[$i]['success']['score']) + round($ds_ketqua[$i]['customer']['scorex2']) ;
                
                // Kiem tra phong ban:
                if($ds_ketqua[$i]['department'] != ''){
                    $department = translate('deparment_dom','',$ds_ketqua[$i]['department']);
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
        
    }
?>