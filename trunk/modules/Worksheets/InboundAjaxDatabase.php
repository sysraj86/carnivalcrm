<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    if(isset($_POST['tour_id'])){
        global $db, $app_list_strings;
        $html = '';
        $focus = new Worksheets();
        $id = '';
        $i = 1; $j = 1; $m = 1; $k=1; $l=1;
        $id  = isset($_POST['tour_id']) ? htmlspecialchars($_POST['tour_id']):"";
        $type  = isset($_POST['type']) ? htmlspecialchars($_POST['type']):"";
        $tour_name  = isset($_POST['tour_name']) ? htmlspecialchars($_POST['tour_name']):"";
        $tourcode  = isset($_POST['tourcode']) ? htmlspecialchars($_POST['tourcode']):"";
        $duration  = isset($_POST['duration']) ? htmlspecialchars($_POST['duration']):"";
        $transport  = isset($_POST['transport']) ? htmlspecialchars($_POST['transport']):"";
        $groupprogrd737rograms_ida  = isset($_POST['groupprogrd737rograms_ida']) ? htmlspecialchars($_POST['groupprogrd737rograms_ida']):"";
        $groupprograorksheets_name  = isset($_POST['groupprograorksheets_name']) ? htmlspecialchars($_POST['groupprograorksheets_name']):"";
        $thuesuathoa  = isset($_POST['thuesuathoa']) ? htmlspecialchars($_POST['thuesuathoa']):"";
        $sokhach  = isset($_POST['sokhach']) ? htmlspecialchars($_POST['sokhach']):"";
        $tyle  = isset($_POST['tyle']) ? htmlspecialchars($_POST['tyle']):"";
        $version  = isset($_POST['version']) ? htmlspecialchars($_POST['version']):"";
        $lotrinh  = isset($_POST['lotrinh']) ? htmlspecialchars($_POST['lotrinh']):"";
            
        $focus->retrieve($_POST['record']);
        if (!empty($_POST['assigned_user_id']) && ($focus->assigned_user_id != $_POST['assigned_user_id']) && ($_POST['assigned_user_id'] != $current_user->id)) {
            $check_notify = TRUE;
        }else{
            $check_notify = FALSE;
        }
        $html = '';           
         
        $html .=  '<script type="text/javascript">';
       // $html .= ''; 
        $html .=  '$("#record").val($("#worksheet_id").val()); ';
        $html .=  '$("#return_id").val($("#worksheet_id").val()); ';
        $html .= '
            
            $(".center").focus(function(){
                    if($(this).val()== 0){
                        $(this).val("");   
                    }
                });
                $(".center").blur(function(){
                    if($(this).val()==""){
                        $(this).val("0");
                    }
                });';
        $html .= '</script>';
        if($id){
            // chi phí vé máy bay
            $airArrtk = array();
            $airArrtk = $focus->getAirlineTicket($id);
            if(count($airArrtk)>0){
                foreach($airArrtk as $tk){
                    if($tk['area']=="mienbac"){
                        $app_list_strings['list_airlinetiket_dom_north'][$tk['id']]=$tk['name'];
                    }
                    if($tk['area']=="mientrung"){
                        $app_list_strings['list_airlinetiket_dom_middle'][$tk['id']]=$tk['name'];
                    }
                    if($tk['area']=="miennam"){
                        $app_list_strings['list_airlinetiket_dom_south'][$tk['id']]=$tk['name'];
                    }
                }
                
                
                $html .= '<fieldset>';
                $html .= '<div>';
                $html .= '<p>&nbsp;</p>'; 
                $html .= '<a class="showdiv"><img src="custom/themes/default/images/btndown.png" width="30" height="30" title="phóng to"/></a> &nbsp; <a class="hidediv"><img src="custom/themes/default/images/btnup.png" width="30" height="30" title="thu nhỏ"/></a>' ; 
                $html .= '<div class="displayandshow">';
                $html .= '<legend><h3>VÉ MÁY BAY</h3></legend>';
                $html .= '<table width="100%" class="tabForm" id="vemaybay" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>'; 
                $html .= '</thead>';
                
                $focus->noidung->vemaybay_tongthanhtien = 0;
                $focus->noidung->vemaybay_tongthue = 0;
                
                $html .= '<tbody>';  
                // chuyến bay tại miền bắc
                $html .= '<tr>';
                    $html .= '<td colspan="7">';
                       $html .= '<fieldset><legend><h3>MIỀN BẮC</h3></legend>';
                        $html .= '<table width="100%" class="table_clone" id="vemaybay_mb" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                            $html .= '<thead>' ;
                                $html .= '<tr>';
                                    $html .= '<th>Tên chuyến bay</th>';
                                    $html .= '<th>Đơn giá</th>';
                                    $html .= '<th>Số lượng</th>';
                                    $html .= '<th>FOC</th>';
                                    $html .= '<th>Thành tiền</th>';
                                    $html .= '<th>Thuế suất</th>';
                                    $html .= '<th>Thuế</th>';
                                    $html .= '<th>&nbsp;</th>';  
                                $html .= '</tr>';
                                $html .= '<tr>';  
                                        $html .= '<th>&nbsp;</th>';
                                        $html .= '<th>&nbsp;</th>';
                                        $html .= '<th>&nbsp;</th>';
                                        $html .= '<th>&nbsp;</th>';
                                        $html .= '<th><input type="text" class="center" name="vemaybay_mb_tongthanhtien" id="vemaybay_mb_tongthanhtien"></th>';  
                                        $html .= '<th>&nbsp;</th>';
                                        $html .= '<th><input type="text" class="center" name="vemaybay_mb_tongthue"  id="vemaybay_mb_tongthue"/></th>';
                                        $html .= '<th>&nbsp;</th>'; 
                                $html .= '</tr>';  
                                $focus->noidung->vemaybay_mb_tongthanhtien = 0;
                                $focus->noidung->vemaybay_mb_tongthue = 0;
                            $html .= '</thead>' ;
                            $html .= '<tbody>';
                            $vmb_mb = 1;
                                foreach($airArrtk as $airtk){
                                  if($airtk['area']=="mienbac") {
                                      $html .= '<tr>';
                                        $html .= '<td class="dataField"><select name="vemaybay_mb[]" id="vemaybay_mb'.$vmb_mb.'">'.get_select_options_with_id($app_list_strings['list_airlinetiket_dom_north'],$airtk['id']).'</select> </td>';
                                        $html .= '<td class="dataField"><input type="text" class="dongia center" name="vemaybay_mb_dongia[]" id="vemaybay_mb_dongia'.$vmb_mb.'" value="0" /></td>';
                                        $html .= '<td class="dataField"><input type="text" class="soluong vemaybay_soluong highlight center" name="vemaybay_mb_soluong[]" id="vemaybay_mb_soluong'.$vmb_mb.'" value="'.$thuesuathoa+$sokhach.'" /></td>';
                                        $html .= '<td class="dataField"><input type="text" class="foc center" name="vemaybay_mb_foc[]" id="vemaybay_mb_foc'.$vmb_mb.'" value="0" /></td>';
                                        $html .= '<td class="dataField"><input type="text" class="thanhtien center" name="vemaybay_mb_thanhtien[]" id="vemaybay_mb_thanhtien'.$vmb_mb.'" value="0" /></td>';
                                        $html .= '<td class="dataField"><input type="text" class="thuesuat center" name="vemaybay_mb_thuesuat[]" id="vemaybay_mb_thuesuat'.$vmb_mb.'" value="10" /></td>';
                                        $html .= '<td class="dataField"><input type="text" class="vat center" name="vemaybay_mb_vat[]" id="vemaybay_mb_vat'.$vmb_mb.'" value="0" /></td>';
                                        $html .= '<td class="dataField"><input type="button" class="btnAddRow" value="Add row"/> <input type="button" class="btnDelRow" value="Delete row"/></td>';
                                      $html .= '</tr>';
                                      
                                      $VMB_MB[$vmb_mb]->vemaybay_mb = $airtk['id']  ;
                                      $VMB_MB[$vmb_mb]->vemaybay_mb_dongia = 0  ;
                                      $VMB_MB[$vmb_mb]->vemaybay_mb_soluong = 0  ;
                                      $VMB_MB[$vmb_mb]->vemaybay_mb_foc = 0  ;
                                      $VMB_MB[$vmb_mb]->vemaybay_mb_thanhtien = 0  ;
                                      $VMB_MB[$vmb_mb]->vemaybay_mb_thuesuat = 0  ;
                                      $VMB_MB[$vmb_mb]->vemaybay_mb_vat = 0  ;
                                      $vmb_mb ++;
                                  }
                                }
                                $focus->noidung->vmb_mienbac = $VMB_MB;
                                
                            $html .= '</tbody>';
                            
                        $html .= '</table>';
                        $html .= '</fieldset>';
                    $html .= '</td>';
                $html .= '</tr>';
                
                // chuyến bay tại miền trung
                $html .= '<tr>';
                    $html .= '<td colspan="7">';
                       $html .= '<fieldset><legend><h3>MIỀN TRUNG</h3></legend>';
                        $html .= '<table width="100%" class="tabForm" id="vemaybay_mt" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                            $html .= '<thead>' ;
                                $html .= '<tr>';
                                    $html .= '<th>Tên chuyến bay</th>';
                                    $html .= '<th>Đơn giá</th>';
                                    $html .= '<th>Số lượng</th>';
                                    $html .= '<th>FOC</th>';
                                    $html .= '<th>Thành tiền</th>';
                                    $html .= '<th>Thuế suất</th>';
                                    $html .= '<th>Thuế</th>';
                                    $html .= '<th>&nbsp;</th>';  
                                $html .= '</tr>';
                                $html .= '<tr>'; 
                                        $html .= '<th>&nbsp;</th>';
                                        $html .= '<th>&nbsp;</th>';
                                        $html .= '<th>&nbsp;</th>';
                                        $html .= '<th>&nbsp;</th>';
                                        $html .= '<th><input type="text" class="center" name="vemaybay_mt_tongthanhtien" id="vemaybay_mt_tongthanhtien"/></th>';
                                        $html .= '<th>&nbsp;</th>';  
                                        $html .= '<th><input type="text" class="center" name="vemaybay_mt_tongthue"  id="vemaybay_mt_tongthue"/></th>';
                                        $html .= '<th>&nbsp;</th>';
                                $html .= '</tr>';
                                $focus->noidung->vemaybay_mt_tongthanhtien = 0;
                                $focus->noidung->vemaybay_mt_tongthue = 0;
                            $html .= '</thead>' ;
                            
                            $html .= '<tbody>';
                            $vmb_mt = 1;
                                foreach($airArrtk as $airtk){
                                  if($airtk['area']=="mientrung") {
                                      $html .= '<tr>';
                                        $html .= '<td class="dataField"><select name="vemaybay_mt[]" id="vemaybay_mt'.$vmb_mt.'">'.get_select_options_with_id($app_list_strings['list_airlinetiket_dom_middle'],$airtk['id']).'</select> </td>';
                                        $html .= '<td class="dataField"><input type="text" class="dongia center" name="vemaybay_mt_dongia[]" id="vemaybay_mt_dongia'.$vmb_mt.'" value="0" /></td>';
                                        $html .= '<td class="dataField"><input type="text" class="soluong vemaybay_soluong highlight center" name="vemaybay_mt_soluong[]" id="vemaybay_mt_soluong'.$vmb_mt.'" value="'.$thuesuathoa+$sokhach.'" /></td>';
                                        $html .= '<td class="dataField"><input type="text" class="foc center" name="vemaybay_mt_foc[]" id="vemaybay_mt_foc'.$vmb_mt.'" value="0" /></td>';
                                        $html .= '<td class="dataField"><input type="text" class="thanhtien center" name="vemaybay_mt_thanhtien[]" id="vemaybay_mt_thanhtien'.$vmb_mt.'" value="0" /></td>';
                                        $html .= '<td class="dataField"><input type="text" class="thuesuat center" name="vemaybay_mt_thuesuat[]" id="vemaybay_mt_thuesuat'.$vmb_mt.'" value="10" /></td>';
                                        $html .= '<td class="dataField"><input type="text" class="vat center" name="vemaybay_mt_vat[]" id="vemaybay_mt_vat'.$vmb_mt.'" value="0" /></td>';
                                        $html .= '<td class="dataField"><input type="button" class="btnAddRow" value="Add row"/> <input type="button" class="btnDelRow" value="Delete row"/></td>';
                                      $html .= '</tr>';
                                      $VMB_MT[$vmb_mt]->vemaybay_mt = $airtk['id'];
                                      $VMB_MT[$vmb_mt]->vemaybay_mt_dongia = 0;
                                      $VMB_MT[$vmb_mt]->vemaybay_mt_soluong = 0;
                                      $VMB_MT[$vmb_mt]->vemaybay_mt_foc = 0;
                                      $VMB_MT[$vmb_mt]->vemaybay_mt_thanhtien = 0;
                                      $VMB_MT[$vmb_mt]->vemaybay_mt_thuesuat = 0;
                                      $VMB_MT[$vmb_mt]->vemaybay_mt_vat = 0;
                                      $vmb_mt ++;
                                  }
                                }
                                $focus->noidung->vmb_mientrung = $VMB_MT;
                            $html .= '</tbody>';   
                        $html .= '</table>';
                        $html .= '</fieldset>';
                    $html .= '</td>';
                $html .= '</tr>';
                
                // chuyến bay tại miền nam
                $html .= '<tr>';
                    $html .= '<td colspan="7">';
                       $html .= '<fieldset><legend><h3>MIỀN NAM</h3></legend>';
                        $html .= '<table width="100%" class="tabForm" id="vemaybay_mn" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                            $html .= '<thead>' ;
                                $html .= '<tr>';
                                    $html .= '<th>Tên chuyến bay</th>';
                                    $html .= '<th>Đơn giá</th>';
                                    $html .= '<th>Số lượng</th>';
                                    $html .= '<th>FOC</th>';
                                    $html .= '<th>Thành tiền</th>';
                                    $html .= '<th>Thuế suất</th>';
                                    $html .= '<th>Thuế</th>';
                                    $html .= '<th>&nbsp;</th>';  
                                $html .= '</tr>';
                                $html .= '<tr>';
                                        $html .= '<th>&nbsp;</th>';
                                        $html .= '<th>&nbsp;</th>';
                                        $html .= '<th>&nbsp;</th>';
                                        $html .= '<th>&nbsp;</th>';
                                        $html .= '<th><input type="text" class="center" name="vemaybay_mn_tongthanhtien" id="vemaybay_mn_tongthanhtien"></th>';
                                        $html .= '<th>&nbsp;</th>';
                                        $html .= '<th><input type="text" class="center" name="vemaybay_mn_tongthue"  id="vemaybay_mn_tongthue"</th>';
                                        $html .= '<th>&nbsp;</th>';
                                        $focus->noidung->vemaybay_mn_tongthanhtien = 0;
                                        $focus->noidung->vemaybay_mn_tongthue = 0;
                                        
                                $html .= '</tr>';
                            $html .= '</thead>' ;
                            
                            $html .= '<tbody>';
                            $vmb_mn = 1;
                                foreach($airArrtk as $airtk){
                                  if($airtk['area']=="miennam") {
                                      $html .= '<tr>';
                                        $html .= '<td class="dataField"><select name="vemaybay_mn[]" id="vemaybay_mn'.$vmb_mn.'">'.get_select_options_with_id($app_list_strings['list_airlinetiket_dom_south'],$airtk['id']).'</select> </td>';
                                        $html .= '<td class="dataField"><input type="text" class="dongia center" name="vemaybay_mn_dongia[]" id="vemaybay_mn_dongia'.$vmb_mn.'" value="0" /></td>';
                                        $html .= '<td class="dataField"><input type="text" class="soluong vemaybay_soluong highlight center" name="vemaybay_mn_soluong[]" id="vemaybay_mn_soluong'.$vmb_mn.'" value="'.$thuesuathoa+$sokhach.'" /></td>';
                                        $html .= '<td class="dataField"><input type="text" class="foc center" name="vemaybay_mn_foc[]" id="vemaybay_mn_foc'.$vmb_mn.'" value="0" /></td>';
                                        $html .= '<td class="dataField"><input type="text" class="thanhtien center" name="vemaybay_mn_thanhtien[]" id="vemaybay_mn_thanhtien'.$vmb_mn.'" value="0" /></td>';
                                        $html .= '<td class="dataField"><input type="text" class="thuesuat center" name="vemaybay_mn_thuesuat[]" id="vemaybay_mn_thuesuat'.$vmb_mn.'" value="10" /></td>';
                                        $html .= '<td class="dataField"><input type="text" class="vat center" name="vemaybay_mn_vat[]" id="vemaybay_mn_vat'.$vmb_mn.'" value="0" /></td>';
                                        $html .= '<td class="dataField"><input type="button" class="btnAddRow" value="Add row"/> <input type="button" class="btnDelRow" value="Delete row"/></td>';
                                      $html .= '</tr>';
                                      
                                      $VMB_MN[$vmb_mn]->vemaybay_mn = $airtk['id'];
                                      $VMB_MN[$vmb_mn]->vemaybay_mn_dongia = 0;
                                      $VMB_MN[$vmb_mn]->vemaybay_mn_soluong = 0;
                                      $VMB_MN[$vmb_mn]->vemaybay_mn_foc = 0;
                                      $VMB_MN[$vmb_mn]->vemaybay_mn_thanhtien = 0;
                                      $VMB_MN[$vmb_mn]->vemaybay_mn_thuesuat = 0;
                                      $VMB_MN[$vmb_mn]->vemaybay_mn_vat = 0;
                                      
                                      $vmb_mn ++;
                                  }
                                }
                                $focus->noidung->vmb_miennam = $VMB_MN;
                            $html .= '</tbody>';   
                        $html .= '</table>';
                        $html .= '</fieldset>';
                    $html .= '</td>';
                $html .= '</tr>';
                $html .='</tbody>';
                $html .= '<tfoot>';
                    $html .= '<tr>';
                    $html .= '<th>TỔNG CỘNG</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" class="center" name="vemaybay_tongthanhtien" " id="vemaybay_tongthanhtien"></th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" class="center" name="vemaybay_tongthue"  id="vemaybay_tongthue"</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '</tr>';
                $html .= '</tfoot>';
                $html .= '</table>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</fieldset>';
                
                
            }
            
            // gán số khách vào số lượng
            
            $nhahangslk = $sokhach+$thuesuathoa; 
            
             // get du lieu nha hang
            $nhArr = array(); 
            $nhArr = $focus->getRestaurantData($id);
             foreach($nhArr as $arr){
                 if($arr['area']=='mienbac'){
                     $app_list_strings['list_restaurant_dom_north'][$arr['id']] = $arr['name'];
                 }
                 if($arr['area']=='mientrung'){
                     $app_list_strings['list_restaurant_dom_middle'][$arr['id']] = $arr['name'];
                 }
                 if($arr['area']=='miennam'){
                     $app_list_strings['list_restaurant_dom_south'][$arr['id']] = $arr['name'];
                 }
                
             }
            if(count($nhArr)>0){
                
                $html .= '<fieldset >';
                $html .= '<legend><h3>NHÀ HÀNG</h3></legend>';
                $html .= '<div>';
                $html .= '<p>&nbsp;</p>'; 
                $html .= '<a class="showdiv"><img src="custom/themes/default/images/btndown.png" width="30" height="30" title="phóng to"/></a> &nbsp; <a class="hidediv"><img src="custom/themes/default/images/btnup.png" width="30" height="30" title="thu nhỏ"/></a>' ; 
                $html .= '<div class="displayandshow">';
                $html .= '<table width="100%" class="tabForm"  id="nhahang" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>'; 
                $html .= '</thead>';
                $html .= '<tbody>';
                
                $focus->noidung->nhahang_tongthanhtien = 0;
                $focus->noidung->nhahang_tongthue = 0; 
                
                // lấy danh sách nhà hàng ở miền bắc
                $html .= '<tr> <td colspan="9">';
                $html .= '<fieldset >';
                $html .= '<legend><h3>MIỀN BẮC</h3></legend>';
                $html .= '<table width="100%" class="table_clone" id="nhahang_mienbac" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th width="20%">Tên nhà hàng</th>';
                    $html .= '<th width="10%">Ghi chú</th>';
                    $html .= '<th width="10%">Đơn giá</th>';
                    $html .= '<th width="10%">Số lượng</th>';
                    $html .= '<th width="10%">Số bữa ăn</th>';
                    $html .= '<th width="10%">FOC</th>';
                    $html .= '<th width="10%">Thành tiền</th>';
                    $html .= '<th width="10%">Thuế suất</th>';
                    $html .= '<th width="10%">Thuế</th>';
                    $html .= '<th width="10%">&nbsp;</th>';  
                $html .= '</tr>';
                $html .= '<tr>';
                    $html .= '<th width="20%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" class="center" name="nhahang_tongthanhtien_mienbac" size="10" id="nhahang_tongthanhtien_mienbac"></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" class="center" name="nhahang_tongthue_mienbac" size="10" id="nhahang_tongthue_mienbac"/></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                $nh_mb = 1;
                $focus->noidung->nhahang_tongthanhtien_mienbac = 0;
                $focus->noidung->nhahang_tongthue_mienbac = 0;
                
                
                foreach($nhArr as $val){
                    if($val['area']=="mienbac"){
                        $html .= '<tr>';
                            $html .= '<td width="20%"><select class="servicename" name="nh_id_mb[]" id="nh_id_mb'.$nh_mb.'">'.get_select_options_with_id($app_list_strings['list_restaurant_dom_north'],$val['id']).' </select> <input class="service_name" type="hidden" name="nh_name_mb[]" id="nh_name_mb'.$nh_mb.'" value="'.$val['name'].'"/></td>';
                            $html .= '<td width="10%" class="dataField"><select class="ghichu" name="nh_ghichu_mb[]" id="nh_ghichu_mb'.$nh_mb.'">'.get_select_options($app_list_strings['workshet_notes_type_dom'], '').'</select></td>';
                            $html .= '<td width="10%" class="dataField"><input size="10" class="dongia center" name="nh_dongia_mb[]" type="text" id="nh_dongia_mb'.$nh_mb.'" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="soluong center highlight" name="nh_soluong_mb[]" type="text" id="nh_soluong_mb'.$nh_mb.'" size="10" value="'.$nhahangslk.'"/></td>';
                            $html .= '<td width="10%" class="dataField"><input class="songay center" name="nh_songay_mb[]" type="text" id="nh_songay_mb'.$nh_mb.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="foc center" name="nh_foc_mb[]" type="text" id="nh_foc_mb'.$nh_mb.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="nh_thanhtien_mb[]" type="text" id="nh_thanhtien_mb'.$nh_mb.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="nh_thuexuat_mb[]" type="text" id="nh_thuexuat_mb'.$nh_mb.'" value="10" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="vat center" name="nh_thue_mb[]" type="text" id="nh_thue_mb'.$nh_mb.'" size="10" /></td>';
                            $html .= '<td width="10%"><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                        $html .= '</tr> ';
                        $NHAHANG_MIENBAC[$nh_mb]->nh_id = $val['id'];
                        $NHAHANG_MIENBAC[$nh_mb]->nh_name = $val['name'];
                        $NHAHANG_MIENBAC[$nh_mb]->ghichu_mb = '';
                        $NHAHANG_MIENBAC[$nh_mb]->nh_dongia_mb = 0;
                        $NHAHANG_MIENBAC[$nh_mb]->nh_soluong_mb = 0;
                        $NHAHANG_MIENBAC[$nh_mb]->nh_songay_mb = 0;
                        $NHAHANG_MIENBAC[$nh_mb]->nh_foc_mb = 0;
                        $NHAHANG_MIENBAC[$nh_mb]->nh_thanhtien_mb = 0;
                        $NHAHANG_MIENBAC[$nh_mb]->nh_thuexuat_mb = 0;
                        $NHAHANG_MIENBAC[$nh_mb]->nh_thuexuat_mb = 0;
                        $nh_mb++;
                    }
                }
                $focus->noidung->nhahang_mienbac = $NHAHANG_MIENBAC;
                $html .= '</tbody>'; 
                $html .= '</table>';
                $html .= '</fieldset>';
                $html .= '</td></tr>';
                // lấy danh sách nhà hàng ở miền trung
                $html .= '<tr> <td colspan="9">';
                $html .= '<fieldset>';
                $html .= '<legend><h3>MIỀN TRUNG</h3></legend>';
                $html .= '<table width="100%" class="table_clone" id="nhahang_mientrung" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th width="20%">Tên nhà hàng</th>';
                    $html .= '<th width="10%">Ghi chú</th>';
                    $html .= '<th width="10%">Đơn giá</th>';
                    $html .= '<th width="10%">Số lượng</th>';
                    $html .= '<th width="10%">Số bữa ăn</th>';
                    $html .= '<th width="10%">FOC</th>';
                    $html .= '<th width="10%">Thành tiền</th>';
                    $html .= '<th width="10%">Thuế suất</th>';
                    $html .= '<th width="10%">Thuế</th>';
                    $html .= '<th width="10%">&nbsp;</th>';  
                $html .= '</tr>';
                $html .= '<tr>';
                    $html .= '<th width="20%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" class="center" name="nhahang_tongthanhtien_mientrung" size="10" id="nhahang_tongthanhtien_mientrung"></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" class="center" name="nhahang_tongthue_mientrung" size="10" id="nhahang_tongthue_mientrung"/></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                $focus->noidung->nhahang_tongthanhtien_mientrung = 0;
                $focus->noidung->nhahang_tongthue_mientrung = 0;
                $nh_mt = 1;
                foreach($nhArr as $val){
                    if($val['area']=="mientrung"){
                            $html .= '<tr>';
                            $html .= '<td width="20%"><select class="servicename" name="nh_id_mt[]" id="nh_id_mt'.$nh_mt.'">'.get_select_options_with_id($app_list_strings['list_restaurant_dom_middle'],$val['id']).' </select> <input class="service_name" type="hidden" name="nh_name_mt[]" id="nh_name_mt'.$nh_mt.'" value="'.$val['name'].'"/> </td>';
                            $html .= '<td width="10%" class="dataField" ><select class="ghichu" name="nh_ghichu_mt[]" id="nh_ghichu_mt'.$nh_mt.'" '.get_select_options($app_list_strings['workshet_notes_type_dom'], '').'</select></td>';
                            $html .= '<td width="10%" class="dataField"><input size="10" class="dongia center" name="nh_dongia_mt[]" type="text" id="nh_dongia_mt'.$nh_mt.'" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="soluong center highlight" name="nh_soluong_mt[]" type="text" id="nh_soluong_mt'.$nh_mt.'" size="10" value="'.$nhahangslk.'" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="songay center" name="nh_songay_mt[]" type="text" id="nh_songay_mt'.$nh_mt.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="foc center" name="nh_foc_mt[]" type="text" id="nh_foc_mt'.$nh_mt.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="nh_thanhtien_mt[]" type="text" id="nh_thanhtien_mt'.$nh_mt.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="nh_thuexuat_mt[]" type="text" id="nh_thuexuat_mt'.$nh_mt.'" value="10" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="vat center" name="nh_thue_mt[]" type="text" id="nh_thue_mt'.$nh_mt.'" size="10" /></td>';
                            $html .= '<td width="10%"><input type="button" class="btnAddRow" value="Add Row"/> <input type="button" class="btnDelRow" value="Delete Row"/></td>';
                        $html .= '</tr> ';
                    
                    
                    $NHAHANG_MIENTRUNG[$nh_mt]->nh_id = $val['id'];
                    $NHAHANG_MIENTRUNG[$nh_mt]->nh_name = $val['name'];
                    $NHAHANG_MIENTRUNG[$nh_mt]->ghichu_mt = '';
                    $NHAHANG_MIENTRUNG[$nh_mt]->nh_dongia_mt = 0;
                    $NHAHANG_MIENTRUNG[$nh_mt]->nh_soluong_mt = 0;
                    $NHAHANG_MIENTRUNG[$nh_mt]->nh_songay_mt = 0;
                    $NHAHANG_MIENTRUNG[$nh_mt]->nh_foc_mt = 0;
                    $NHAHANG_MIENTRUNG[$nh_mt]->nh_thanhtien_mt = 0;
                    $NHAHANG_MIENTRUNG[$nh_mt]->nh_thuexuat_mt = 0;
                    $NHAHANG_MIENTRUNG[$nh_mt]->nh_thuexuat_mt = 0;
                    $nh_mt++;
                    }
                }
                $focus->noidung->nhahang_mientrung = $NHAHANG_MIENTRUNG;
                $html .= '</tbody>';
                $html .= '</table> ';
                $html .= '</fieldset>';
                $html .= '</td></tr>';
                
                // lấy danh sách nhà hàng ở miền nam
                
                $html .= '<tr> <td colspan="9">';
                $html .= '<fieldset>';
                $html .= '<legend><h3>MIỀN NAM</h3></legend>';
                $html .= '<table width="100%" class="table_clone" id="nhahang_miennam" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th width="20%">Tên nhà hàng</th>';
                    $html .= '<th width="10%">Ghi chú</th>';
                    $html .= '<th width="10%">Đơn giá</th>';
                    $html .= '<th width="10%">Số lượng</th>';
                    $html .= '<th width="10%">Số bữa ăn</th>';
                    $html .= '<th width="10%">FOC</th>';
                    $html .= '<th width="10%">Thành tiền</th>';
                    $html .= '<th width="10%">Thuế suất</th>';
                    $html .= '<th width="10%">Thuế</th>';
                    $html .= '<th width="10%">&nbsp;</th>';  
                $html .= '</tr>';
                $html .= '<tr>';
                    $html .= '<th width="20%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" class="center" name="nhahang_tongthanhtien_miennam" size="10" id="nhahang_tongthanhtien_miennam"></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" class="center" name="nhahang_tongthue_miennam" size="10" id="nhahang_tongthue_miennam"/></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                $html .= '</tr>';
                $focus->noidung->nhahang_tongthanhtien_miennam = 0;
                $focus->noidung->nhahang_tongthue_miennam = 0;
                $html .= '</thead>';
                $html .= '<tbody>';
                $nh_mn = 1;
                foreach($nhArr as $val){
                    if($val['area']=="miennam"){
                        $html .= '<tr>';
                            $html .= '<td width="10%"><select class="servicename" name="nh_id_mn[]" id="nh_id_mn'.$nh_mn.'">'.get_select_options_with_id($app_list_strings['list_restaurant_dom_south'],$val['id']).' </select> <input class="service_name" type="hidden" name="nh_name_mn[]" id="nh_name_mn'.$nh_mn.'" value="'.$val['name'].'"/></td>';
                            $html .= '<td width="10%" class="dataField"><select class="ghichu" name="nh_ghichu_mn[]" id="nh_ghichu_mn'.$nh_mn.'" '.get_select_options($app_list_strings['workshet_notes_type_dom'], '').'</select></td>';
                            $html .= '<td width="10%" class="dataField"><input size="10" class="dongia center" name="nh_dongia_mn[]" type="text" id="nh_dongia_mn'.$nh_mn.'" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="soluong center highlight" name="nh_soluong_mn[]" type="text" id="nh_soluong_mn'.$nh_mn.'" size="10" value="'.$nhahangslk.'" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="songay center" name="nh_songay_mn[]" type="text" id="nh_songay_mn'.$nh_mn.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="foc center" name="nh_foc_mn[]" type="text" id="nh_foc_mt'.$nh_mn.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="nh_thanhtien_mn[]" type="text" id="nh_thanhtien_mn'.$nh_mn.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="nh_thuexuat_mn[]" type="text" id="nh_thuexuat_mn'.$nh_mn.'" value="10" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="vat center" name="nh_thue_mn[]" type="text" id="nh_thue_mn'.$nh_mn.'" size="10" /></td>';
                            $html .= '<td width="10%"><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                        $html .= '</tr> '; 
                    
                        $NHAHANG_MIENNAM[$nh_mn]->nh_name = $val['name'];
                        $NHAHANG_MIENNAM[$nh_mn]->nh_id = $val['id'];
                        $NHAHANG_MIENNAM[$nh_mn]->ghichu_mn = '';
                        $NHAHANG_MIENNAM[$nh_mn]->nh_dongia_mn = 0;
                        $NHAHANG_MIENNAM[$nh_mn]->nh_soluong_mn = 0;
                        $NHAHANG_MIENNAM[$nh_mn]->nh_songay_mn = 0;
                        $NHAHANG_MIENNAM[$nh_mn]->nh_foc_mn = 0;
                        $NHAHANG_MIENNAM[$nh_mn]->nh_thanhtien_mn = 0;
                        $NHAHANG_MIENNAM[$nh_mn]->nh_thuexuat_mn = 0;
                        $NHAHANG_MIENNAM[$nh_mn]->nh_thue_mn = 0;
                        $nh_mn++;
                    }
            }
                $html .= '</tbody>';
                $html .= '</table> ';
                $html .= '</fieldset>';
                $html .= '</td></tr>';
                $focus->noidung->nhahang_miennam = $NHAHANG_MIENNAM;
                $html .= '</tbody>';
                $html .= '<tfoot>';
                    $html .= '<tr>';
                    $html .= '<th width="20%">TỔNG CỘNG</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" class="center" name="nhahang_tongthanhtien"  id="nhahang_tongthanhtien"></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" class="center" name="nhahang_tongthue"  id="nhahang_tongthue"/></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '</tr>';
                $html .= '</tfoot>';
                $html .= '</table>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</fieldset>';
                
            }
               // lấy danh sách khách sạn
                
                $listDestination = $focus->getListDestination($id);
                foreach($listDestination as $list){
                    if($list['area'] == 'mienbac'){
                        $app_list_strings['list_destination_north_dom'][$list['id']] = $list['name'];
                    }
                    else if($list['area'] == 'mientrung'){
                        $app_list_strings['list_destination_middle_dom'][$list['id']] = $list['name'];
                    }
                    else if($list['area'] =='miennam'){
                        $app_list_strings['list_destination_south_dom'][$list['id']] = $list['name'];
                    }
                }
                
                
                $html .= '<fieldset>';
                $html .= '<legend><h3>KHÁCH SẠN</h3></legend>';
                $html .= '<div>';
                $html .= '<p>&nbsp;</p>'; 
                $html .= '<a class="showdiv"><img src="custom/themes/default/images/btndown.png" width="30" height="30" title="phóng to"/></a> &nbsp; <a class="hidediv"><img src="custom/themes/default/images/btnup.png" width="30" height="30" title="thu nhỏ"/></a>' ; 
                $html .= '<div class="displayandshow">';
                $html .= '<table width="100%" class="tabForm" border="0" class="tabForm" id="khachsan" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<tfoot>';
                $html .= '<tr>';
                $html .= '<th>TỔNG CỘNG</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th><input type="text" size="15" class="center" name="khachsan_tongthanhtien" id="khachsan_tongthanhtien"/></th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th><input type="text" size="15" class="center" name="khachsan_tongthue" id="khachsan_tongthue"/></th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '</tr>';
                $html .= '</tfoot>';
                $html .= '<tbody>';
                $focus->noidung->khachsan_tongthanhtien = 0;
                $focus->noidung->khachsan_tongthue = 0;
                

                 // lấy danh sách khách sạn ở miền bắc
                $html .= '<tr><td colspan="13">';
                $html .= '<fieldset >';
                $html .= '<legend><h3>MIỀN BẮC</h3></legend>';
                $html .= '<table width="100%" border="0" class="table_clone" id="ks_mb" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                
                $html .= '<tr>';
                $html .= '<th>Nơi đến</th>';
                $html .= '<th><select name ="destination_north" id="destination_north" class="destination" size="4">'.get_select_options_with_id($app_list_strings['list_destination_north_dom'],'').' </select></th>';
                $html .= '<th>Tiêu chuẩn</th>';
                $html .= '<th> <select name="standard_north" id="standard_north" class="standard" size="4">'.get_select_options_with_id($app_list_strings['hotel_standard_dom'],'').' </select> <div id="waitting"></div> </th>';
                $html .= '<th><input type="button" class="loadingdatahotel" value="Lấy dữ liệu"/></th>';
                $html .= '<th>Khách sạn</th>';
                $html .= '<th><select name="ks_mienbac" id="ks_mienbac" class="tenkhachsan" size="4"></select></th>';
                $html .= '<th>Hạng Phòng</th>';
                $html .= '<th><select name="hangphong_north" id="hangphong_north" class="hangphong" size="4">'.get_select_options_with_id($app_list_strings['roombooking_type_dom'],'').'</select></th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th><input type="button" class="btnKSAddRow" value="Add row"/></th>';
                $html .= '</tr>';
                $focus->noidung->khachsan_tongthanhtien_mienbac = 0;
                $focus->noidung->khachsan_tongthue_mienbac = 0;
                $html .= '<tr>';
                $html .= '<th>Tên khách sạn</th>';
                $html .= '<th>Single</th>';
                $html .= '<th>SL Single</th>';
                $html .= '<th>Double</th>';
                $html .= '<th>SL Double</th>';
                $html .= '<th>Triple</th>';
                $html .= '<th>SL Triple</th>';
                $html .= '<th>Hạng phòng</th>';
                $html .= '<th>Số đêm</th>';
                $html .= '<th>Thành tiền</th>';
                $html .= '<th>Thuế suất</th>';
                $html .= '<th>Thuế</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '</tr>';
                
                $html .= '</thead>';
                $html .= '<tbody>';
                
                $html .= '</tbody>';
                $html .= '<tfoot>';
                    $html .= '<tr>';
                    $html .= '<th>Tổng cộng</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" size="15" class="center" name="khachsan_tongthanhtien_mienbac" id="khachsan_tongthanhtien_mienbac"/></th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" size="15" class="center" name="khachsan_tongthue_mienbac" id="khachsan_tongthue_mienbac"/></th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '</tr>';
                $html .= '</tfoot>';
                $html .= '</table>';
                $html .= '</fieldset>';
                $html .= '</td></tr>';
                
                // khách sạn tại miền trung
                $html .= '<tr><td colspan="13">';
                $html .= '<fieldset >';
                $html .= '<legend><h3>MIỀN TRUNG</h3></legend>';
                $html .= '<table width="100%" border="0" class="table_clone" id="ks_mt" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                $html .= '<th>Nơi đến</th>';
                $html .= '<th><select name ="destination_middle" id="destination_middle" class="destination" size="4">'.get_select_options_with_id($app_list_strings['list_destination_middle_dom'],'').' </select></th>';
                $html .= '<th><select name="standard_middle" id="standard_middle" class="standard" size="4" >'.get_select_options_with_id($app_list_strings['hotel_standard_dom'],'').' </select> <div id="waitting"></div></th>';
                $html .= '<th><input type="button" class="loadingdatahotel" value="Lấy dữ liệu"/></th>';
                 $html .= '<th>Khách sạn</th>';
                $html .= '<th><select name="ks_mienbac" id="ks_mienbac" class="tenkhachsan" size="4"></select></th>';
                $html .= '<th>Hạng phòng</th>';
                $html .= '<th><select name="hangphong_middle" id="hangphong_middle" class="hangphong" size="4">'.get_select_options_with_id($app_list_strings['roombooking_type_dom'],'').'</select></th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th><input type="button" class="btnKSAddRow" value="Add row"/></th>';
                $html .= '</tr>';
                
                $html .= '<tr>';
                $html .= '<th>Tên khách sạn</th>';
                $html .= '<th>Single</th>';
                $html .= '<th>SL Single</th>';
                $html .= '<th>Double</th>';
                $html .= '<th>SL Double</th>';
                $html .= '<th>Triple</th>';
                $html .= '<th>SL Triple</th>';
                $html .= '<th>Hạng phòng</th>';
                $html .= '<th>Số đêm</th>';
                $html .= '<th>Thành tiền</th>';
                $html .= '<th>Thuế suất</th>';
                $html .= '<th>Thuế</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '</tr>';
                
                $html .= '</thead>';
                $html .= '<tbody>';
                $html .= '</tbody>';
                $html .= '<tfoot>';
                    $html .= '<tr>';
                    $html .= '<th>Tổng cộng</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" size="15" class="center" name="khachsan_tongthanhtien_mientrung" id="khachsan_tongthanhtien_mientrung" value="'.$focus->noidung->khachsan_tongthanhtien_mientrung.'"/></th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" size="15" class="center" name="khachsan_tongthue_mientrung" id="khachsan_tongthue_mientrung" value="'.$focus->noidung->khachsan_tongthue_mientrung.'"/></th>';
                    $html .= '<th>&nbsp;</th>';
                    $focus->noidung->khachsan_tongthanhtien_mientrung = 0;
                    $focus->noidung->khachsan_tongthue_mientrung = 0;
                    $html .= '</tr>';
                $html .= '</tfoot>';
                $html .= '</table>';
                $html .= '</fieldset>';
                $html .= '</td></tr>';
                
                // khách sạn tại miền nam
                $html .= '<tr><td colspan="13">';
                $html .= '<fieldset >';
                $html .= '<legend><h3>MIỀN NAM</h3></legend>';
                $html .= '<table width="100%" border="0" class="table_clone" id="ks_mn" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                $html .= '<th>Nơi đến</th>';
                $html .= '<th><select name ="destination_south" id="destination_south" class="destination" size="4">'.get_select_options_with_id($app_list_strings['list_destination_south_dom'],'').' </select></th>';
                $html .= '<th><select name="standard_south" id="standard_south" class="standard" size="4" >'.get_select_options_with_id($app_list_strings['hotel_standard_dom'],'').' </select><div id="waitting"></div></th>';
                $html .= '<th><input type="button" class="loadingdatahotel" value="Lấy dữ liệu"/></th>';
                $html .= '<th>Khách sạn</th>';
                $html .= '<th><select name="ks_mienbac" id="ks_mienbac" class="tenkhachsan" size="4"></select></th>';
                $html .= '<th>Hạng phòng</th>';
                $html .= '<th><select name="hangphong_south" id="hangphong_south" class="hangphong" size="4">'.get_select_options_with_id($app_list_strings['roombooking_type_dom'],'').'</select></th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th><input type="button" class="btnKSAddRow" value="Add row"/></th>';
                $html .= '</tr>';
                $html .= '<tr>';
                $html .= '<th>Tên khách sạn</th>';
                $html .= '<th>Single</th>';
                $html .= '<th>SL Single</th>';
                $html .= '<th>Double</th>';
                $html .= '<th>SL Double</th>';
                $html .= '<th>Triple</th>';
                $html .= '<th>SL Triple</th>';
                $html .= '<th>Hạng phòng</th>';
                $html .= '<th>Số đêm</th>';
                $html .= '<th>Thành tiền</th>';
                $html .= '<th>Thuế suất</th>';
                $html .= '<th>Thuế</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '</tfoot>';
                $html .= '</thead>';
                $html .= '<tbody>';
                $html .= '</tbody>';
                $html .= '<tfoot>';
                    $html .= '<tr>';
                    $html .= '<th>Tổng cộng</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" size="15" class="center" name="khachsan_tongthanhtien_miennam" id="khachsan_tongthanhtien_miennam" value="'.$focus->noidung->khachsan_tongthanhtien_miennam.'"/></th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" size="15" class="center" name="khachsan_tongthue_miennam" id="khachsan_tongthue_miennam" value="'.$focus->noidung->khachsan_tongthue_miennam.'"/></th>';
                    $html .= '<th>&nbsp;</th>';
                    $focus->noidung->khachsan_tongthanhtien_miennam = 0;
                    $focus->noidung->khachsan_tongthue_miennam = 0;
                    $html .= '</tr>';
                $html .= '</tfoot>';
                $html .= '</table>';
                $html .= '</fieldset>';
                $html .= '</td></tr>';
                $focus->nodung->khachsan = $KHACHSAN;
                $html .= '</table>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</fieldset>';
                
            //}
            
            // loading data van chuyen
            $vcArr = array();
            $vcArr = $focus->getTransportData($id);
            foreach($vcArr as $arrvc){
                if($arrvc['area'] == 'mienbac'){
                   $app_list_strings['list_vanchuyen_dom_north'][$arrvc['id']] ='Xe '.$arrvc['name'].' chỗ'; 
                }
                if($arrvc['area'] == 'mientrung'){
                   $app_list_strings['list_vanchuyen_dom_middle'][$arrvc['id']] ='Xe '.$arrvc['name'].' chỗ'; 
                }
                if($arrvc['area'] == 'miennam'){
                   $app_list_strings['list_vanchuyen_dom_south'][$arrvc['id']] ='Xe '.$arrvc['name'].' chỗ'; 
                }
                
            }
            if(count($vcArr)>0){
                
                $html .= '<fieldset>';
                $html .= '<legend> <h3>VẬN CHUYỂN</h3></legend>';
                $html .= '<div>';
                $html .= '<p>&nbsp;</p>'; 
                $html .= '<a class="showdiv"><img src="custom/themes/default/images/btndown.png" width="30" height="30" title="phóng to"/></a> &nbsp; <a class="hidediv"><img src="custom/themes/default/images/btnup.png" width="30" height="30" title="thu nhỏ"/></a>' ; 
                $html .= '<div class="displayandshow">';
                $html .= '<table width="100%" class="tabForm" id="vanchuyen" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                /*$html .= '<tr>';
                    $html .= '<th width="10%">Lọai xe</th>';
                    $html .= '<th width="20%">Đơn giá</th>';
                    $html .= '<th width="10%">Số lượng</th>';
                    $html .= '<th width="10%">Số ngày</th>';
                    $html .= '<th width="10%">Thành tiền</th>';
                    $html .= '<th width="10%">Thuế suất</th>';
                    $html .= '<th width="20%">Thuế</th>';
                    $html .= '<th width="20%">&nbsp;</th>';
                $html .= '</tr>'; */
                $html .= '</thead>';
                $html .= '<tbody>';
                $focus->noidung->vanchuyen_tongthanhtien = 0;
                $focus->noidung->vanchuyen_tongthue = 0;
                // lấy danh sách vận chuyển ở miền bắc
                $html .= '<tr><td colspan="8">';
                $html .= '<fieldset >';
                $html .= '<legend><h3>MIỀN BẮC</h3></legend>';
                $html .= '<table width="100%" class="table_clone" id="vanchuyen_mienbac" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th width="10%">Lọai xe</th>';
                    $html .= '<th width="20%">Đơn giá</th>';
                    $html .= '<th width="10%">Số lượng</th>';
                    $html .= '<th width="10%">Số ngày</th>';
                    $html .= '<th width="10%">FOC</th>';
                    $html .= '<th width="10%">Thành tiền</th>';
                    $html .= '<th width="10%">Thuế suất</th>';
                    $html .= '<th width="20%">Thuế</th>';
                    $html .= '<th width="20%">&nbsp;</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '</tfoot>';
                $html .= '<tr>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="20%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" size="10" class="center" name="vanchuyen_tongthanhtien_mienbac" id="vanchuyen_tongthanhtien_mienbac"/></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" size="10" class="center" name="vanchuyen_tongthue_mienbac" id="vanchuyen_tongthue_mienbac" /></th>';
                    $html .= '<th width="20%">&nbsp;</th>';
                    
                    $focus->noidung->vanchuyen_tongthanhtien_mienbac = 0;
                    $focus->noidung->vanchuyen_tongthue_mienbac = 0;
                
                $html .= '</tr>';
                $html .= '</tfoot>';
                $html .= '<tbody>';
                $vc_mb = 1;
                foreach($vcArr as $vcVal){
                    if($vcVal['area']=="mienbac"){
                        $html .= '<tr>';
                            $html .= '<td width="10%" class="dataField"><select class="servicename" name="vanchuyen_name_mb[]" id="vanchuyen_name_mb'.$vc_mb.'">'.get_select_options_with_id( $app_list_strings['list_vanchuyen_dom_north'],$vcVal['id']).'</select></td>';
                            $html .= '<td width="20%" class="dataField"><input size="10" class="dongia center" name="vanchuyen_dongia_mb[]" type="text" id="vanchuyen_dongia_mb'.$vc_mb.'" /> <select name="dongia_option_mb[]" class="dongia_option" id="dongia_option_mb'.$vc_mb.'">'.get_select_options_with_id($app_list_strings['vanchuyen_dongia_option'],'').'</select></td>';
                            $html .= '<td width="10%" class="dataField"><input class="soluong center" name="vanchuyen_soluong_mb[]" type="text" id="vanchuyen_soluong_mb'.$vc_mb.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="songay center" name="vanchuyen_songay_mb[]" type="text" id="vanchuyen_songay_mb'.$vc_mb.'" size="10" /></td>';
//                            $html .= '<td width="10%" class="dataField"><input class="foc center" name="vanchuyen_foc_mb[]" type="text" id="vanchuyen_foc_mb'.$vc_mb.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="vanchuyen_thanhtien_mb[]" type="text" id="vanchuyen_thanhtien_mb'.$vc_mb.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="vanchuyen_thuesuat_mb[]" type="text" id="vanchuyen_thuesuat_mb'.$vc_mb.'" value="10" size="10" /></td>';
                            $html .= '<td width="20%" class="dataField"><input class="vat center" name="vanchuyen_vat_mb[]" type="text" id="vanchuyen_vat_mb'.$vc_mb.'" size="10" /></td>';
                            $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                        $html .= '</tr> ';
                        $VANCHUYEN_MIENBAC[$vc_mb]->vanchuyen_name_mb = $vcVal['id'];
                        $VANCHUYEN_MIENBAC[$vc_mb]->vanchuyen_dongia_mb = 0;
                        $VANCHUYEN_MIENBAC[$vc_mb]->dongia_option_mb = 0;
                        $VANCHUYEN_MIENBAC[$vc_mb]->vanchuyen_soluong_mb = 0;
                        $VANCHUYEN_MIENBAC[$vc_mb]->vanchuyen_songay_mb = 0;
                        $VANCHUYEN_MIENBAC[$vc_mb]->vanchuyen_foc_mb = 0;
                        $VANCHUYEN_MIENBAC[$vc_mb]->vanchuyen_thanhtien_mb = 0;
                        $VANCHUYEN_MIENBAC[$vc_mb]->vanchuyen_thuexuat_mb = 0;
                        $VANCHUYEN_MIENBAC[$vc_mb]->vanchuyen_vat_mb = 0;
                        $vc_mb++;             
                    }
                    $focus->noidung->vanchuyen_mienbac = $VANCHUYEN_MIENBAC;
                }
                $html .='</tbody></table></fieldset></td></tr>';
                // lấy danh sách vận chuyển ở miền trung
                $html .= '<tr><td colspan="8">';
                $html .= '<fieldset >';
                $html .= '<legend><h3>MIỀN TRUNG</h3></legend>';
                $html .= '<table width="100%" class="table_clone" id="vanchuyen_mientrung" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th width="10%">Lọai xe</th>';
                    $html .= '<th width="20%">Đơn giá</th>';
                    $html .= '<th width="10%">Số lượng</th>';
                    $html .= '<th width="10%">Số ngày</th>';
                    $html .= '<th width="10%">FOC</th>';
                    $html .= '<th width="10%">Thành tiền</th>';
                    $html .= '<th width="10%">Thuế suất</th>';
                    $html .= '<th width="20%">Thuế</th>';
                    $html .= '<th width="20%">&nbsp;</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tfoot>';
                $html .= '<tr>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="20%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" size="10" class="center" name="vanchuyen_tongthanhtien_mientrung" id="vanchuyen_tongthanhtien_mientrung"/></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" size="10" class="center" name="vanchuyen_tongthue_mientrung" id="vanchuyen_tongthue_mientrung" /></th>';
                    $html .= '<th width="20%">&nbsp;</th>';
                $html .= '</tr>';
                $html .= '</tfoot>'; 
                $html .= '<tbody>';
                $focus->noidung->vanchuyen_tongthanhtien_mientrung = 0;
                $focus->noidung->vanchuyen_tongthue_mientrung = 0;
                $vc_mt = 1;
                foreach($vcArr as $vcVal){
                    if($vcVal['area']=="mientrung"){
                        $html .= '<tr>';
                            $html .= '<td width="10%" class="dataField"><select class="servicename" name="vanchuyen_name_mt[]" id="vanchuyen_name_mt'.$vc_mt.'">'.get_select_options_with_id( $app_list_strings['list_vanchuyen_dom_middle'],$vcVal['id']).'</select> </td>';
                            $html .= '<td width="20%" class="dataField"><input size="10" class="dongia center" name="vanchuyen_dongia_mt[]" type="text" id="vanchuyen_dongia_mt'.$vc_mt.'" /> <select name="dongia_option_mt[]" class="dongia_option" id="dongia_option_mt'.$vc_mt.'">'.get_select_options_with_id($app_list_strings['vanchuyen_dongia_option'],'').'</select></td>';
                            $html .= '<td width="10%" class="dataField"><input class="soluong center" name="vanchuyen_soluong_mt[]" type="text" id="vanchuyen_soluong_mt'.$vc_mt.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="songay center" name="vanchuyen_songay_mt[]" type="text" id="vanchuyen_songay_mt'.$vc_mt.'" size="10" /></td>';
//                            $html .= '<td width="10%" class="dataField"><input class="foc center" name="vanchuyen_foc_mt[]" type="text" id="vanchuyen_foc_mt'.$vc_mt.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="vanchuyen_thanhtien_mt[]" type="text" id="vanchuyen_thanhtien_mt'.$vc_mt.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="vanchuyen_thuexuat_mt[]" type="text" id="vanchuyen_thuexuat_mt'.$vc_mt.'" value="10" size="10" /></td>';
                            $html .= '<td width="20%" class="dataField"><input class="vat center" name="vanchuyen_vat_mt[]" type="text" id="vanchuyen_vat_mt'.$vc_mt.'" size="10" /></td>';
                            $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                        $html .= '</tr> ';
                        $VANCHUYEN_MIENTRUNG[$vc_mt]->vanchuyen_name_mt = $vcVal['id'];
                        $VANCHUYEN_MIENTRUNG[$vc_mt]->vanchuyen_dongia_mt = 0;
                        $VANCHUYEN_MIENTRUNG[$vc_mt]->vanchuyen_dongia_mt = 0;
                        $VANCHUYEN_MIENTRUNG[$vc_mt]->vanchuyen_soluong_mt = 0;
                        $VANCHUYEN_MIENTRUNG[$vc_mt]->vanchuyen_songay_mt = 0;
                        $VANCHUYEN_MIENTRUNG[$vc_mt]->vanchuyen_foc_mt = 0;
                        $VANCHUYEN_MIENTRUNG[$vc_mt]->vanchuyen_thanhtien_mt = 0;
                        $VANCHUYEN_MIENTRUNG[$vc_mt]->vanchuyen_thuexuat_mt = 0;
                        $VANCHUYEN_MIENTRUNG[$vc_mt]->vanchuyen_vat_mt = 0;
                        $vc_mt++;             
                    }
                }
                $html .= '</tbody></table></fieldset></td></tr>';
                $focus->noidung->vanchuyen_mientrung = $VANCHUYEN_MIENTRUNG;                
                // lấy danh sách vận chuyển ở miền nam
                $html .= '<tr><td colspan="8">';
                $html .= '<fieldset >';
                $html .= '<legend><h3>MIỀN NAM</h3></legend>';
                $html .= '<table width="100%" class="table_clone" id="vanchuyen_miennam" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th width="10%">Lọai xe</th>';
                    $html .= '<th width="20%">Đơn giá</th>';
                    $html .= '<th width="10%">Số lượng</th>';
                    $html .= '<th width="10%">Số ngày</th>'; 
                    $html .= '<th width="10%">FOC</th>'; 
                    $html .= '<th width="10%">Thành tiền</th>';
                    $html .= '<th width="10%">Thuế suất</th>';
                    $html .= '<th width="20%">Thuế</th>';
                    $html .= '<th width="20%">&nbsp;</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '</tfoot>';
                $html .= '<tr>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" size="10" class="center" name="vanchuyen_tongthanhtien_miennam" id="vanchuyen_tongthanhtien_miennam"/></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" size="10" class="center" name="vanchuyen_tongthue_miennam" id="vanchuyen_tongthue_miennam" /></th>';
                    $html .= '<th width="20%">&nbsp;</th>';
                $html .= '</tr>';
                $html .= '</tfoot>';
                $html .= '<tbody>';
                $focus->noidung->vanchuyen_tongthanhtien_miennam = 0;
                $focus->noidung->vanchuyen_tongthue_miennam = 0;
                $vc_mn = 1;
                foreach($vcArr as $vcVal){
                    if($vcVal['area']=="miennam"){
                        $html .= '<tr>';
                            $html .= '<td width="10%" class="dataField"><select class="servicename" name="vanchuyen_name_mn[]" id="vanchuyen_name_mn'.$vc_mn.'">'.get_select_options_with_id( $app_list_strings['list_vanchuyen_dom_south'],$vcVal['id']).'</select></td>';
                            $html .= '<td width="20%" class="dataField"><input size="10" class="dongia center" name="vanchuyen_dongia_mn[]" type="text" id="vanchuyen_dongia_mn'.$vc_mn.'" /> <select name="dongia_option_mn[]" class="dongia_option" id="dongia_option_mn'.$vc_mn.'">'.get_select_options_with_id($app_list_strings['vanchuyen_dongia_option'],'').'</select> </td>';
                            $html .= '<td width="10%" class="dataField"><input class="soluong center" name="vanchuyen_soluong_mn[]" type="text" id="vanchuyen_soluong_mn'.$vc_mn.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="songay center" name="vanchuyen_songay_mn[]" type="text" id="vanchuyen_songay_mn'.$vc_mn.'" size="10" /></td>';
//                            $html .= '<td width="10%" class="dataField"><input class="foc center" name="vanchuyen_foc_mn[]" type="text" id="vanchuyen_foc_mn'.$vc_mn.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="vanchuyen_thanhtien_mn[]" type="text" id="vanchuyen_thanhtien_mn'.$vc_mn.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="vanchuyen_thuexuat_mn[]" type="text" id="vanchuyen_thuexuat_mn'.$vc_mn.'" value="10" size="10" /></td>';
                            $html .= '<td width="20%" class="dataField"><input class="vat center" name="vanchuyen_vat_mn[]" type="text" id="vanchuyen_vat_mn'.$vc_mn.'" size="10" /></td>';
                            $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                        $html .= '</tr> ';
                        $VANCHUYEN_MIENNAM[$vc_mn]->vanchuyen_name_mn = $vcVal['id'];
                        $VANCHUYEN_MIENNAM[$vc_mn]->vanchuyen_dongia_mn = 0;
                        $VANCHUYEN_MIENNAM[$vc_mn]->vanchuyen_dongia_mn = 0;
                        $VANCHUYEN_MIENNAM[$vc_mn]->vanchuyen_soluong_mn = 0;
                        $VANCHUYEN_MIENNAM[$vc_mn]->vanchuyen_songay_mn = 0;
                        $VANCHUYEN_MIENNAM[$vc_mn]->vanchuyen_foc_mn = 0;
                        $VANCHUYEN_MIENNAM[$vc_mn]->vanchuyen_thanhtien_mn = 0;
                        $VANCHUYEN_MIENNAM[$vc_mn]->vanchuyen_thuexuat_mn = 0;
                        $VANCHUYEN_MIENNAM[$vc_mn]->vanchuyen_vat_mn = 0;
                        $vc_mn++;             
                    }
                }
                
                $html .= '</tbody></table></fieldset></td></tr>';
                
                $focus->noidung->vanchuyen_miennam = $VANCHUYEN_MIENNAM;
                $html .= '</tbody>';
                $html .= '<tfoot>';
                    $html .= '<tr>';
                    $html .= '<th width="10%">TỔNG CỘNG</th>';
                    $html .= '<th width="20%">&nbsp;</th>';
                    $html .= '<th width="10%" >&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" size="10" class="center" name="vanchuyen_tongthanhtien" id="vanchuyen_tongthanhtien"/></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" size="10" class="center" name="vanchuyen_tongthue" id="vanchuyen_tongthue" /></th>';
                    $html .= '<th width="20%">&nbsp;</th>';
                    $html .= '</tr>';
                $html .= '</tfoot>';
                $html .= '</table>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</fieldset>';
                
            }

            // loading data dich vu
            $svArr = array();
            $svArr = $focus->getServiceData($id);
             foreach($svArr as $arrsv){
                 if($arrsv['area']=="mienbac"){
                   $app_list_strings['list_dichvu_dom_north'][$arrsv['id']] = $arrsv['name'];  
                 }
                 if($arrsv['area']=="mientrung"){
                   $app_list_strings['list_dichvu_dom_middle'][$arrsv['id']] = $arrsv['name'];  
                 }
                 if($arrsv['area']=="miennam"){
                   $app_list_strings['list_dichvu_dom_south'][$arrsv['id']] = $arrsv['name'];  
                 }
                 
             }
            
            if(count($svArr)>0){
                
                $html .= '<fieldset>';
                $html .= '<legend> <h3>DỊCH VỤ</h3></legend>';
                $html .= '<div>';
                $html .= '<p>&nbsp;</p>'; 
                $html .= '<a class="showdiv"><img src="custom/themes/default/images/btndown.png" width="30" height="30" title="phóng to"/></a> &nbsp; <a class="hidediv"><img src="custom/themes/default/images/btnup.png" width="30" height="30" title="thu nhỏ"/></a>' ; 
                $html .= '<div class="displayandshow">';
                $html .= '<table width="100%" class="tabForm" border="0" id="dichvu" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<tfoot>';
                $html .= '<tr>';
                    $html .= '<th>TỔNG CỘNG</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" size="15" class="center" name="service_tongthanhtien" id="service_tongthanhtien"/></th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" size="15" class="center" name="service_tongthue" id="service_tongthue"/></th>';
                    $html .= '<th>&nbsp;</th>';
                $html .= '</tr>';
                $html .= '</tfoot>';
                $html .= '<tbody>';
                $focus->noidung->service_tongthanhtien = 0;
                $focus->noidung->service_tongthue = 0;
                // lấy danh sách dịch vụ miền bắc
                $html .= '<tr><td colspan="8">';
                $html .= '<fieldset >';
                $html .= '<legend><h3>MIỀN BẮC</h3></legend>';
                $html .= '<table width="100%" class="table_clone" id="dichvu_mienbac" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th>Loại dịch vụ</th>';
                    $html .= '<th>Đơn giá</th>';
                    $html .= '<th>Số lượng</th>';
                    $html .= '<th>Số ngày</th>';
                    $html .= '<th>FOC</th>';
                    $html .= '<th>Thành tiền</th>';
                    $html .= '<th>Thuế suất</th>';
                    $html .= '<th>Thuế</th>';
                    $html .= '<th>&nbsp;</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tfoot>';
                $html .= '<tr>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" size="15" class="center" name="service_tongthanhtien_mienbac" id="service_tongthanhtien_mienbac"/></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" size="15" class="center" name="service_tongthue_mienbac" id="service_tongthue_mienbac"/></th>';
                    $html .= '<th width="20%">&nbsp;</th>';
                $html .= '</tr>';
                $html .= '</tfoot>';
                $html .= '<tbody>';
                $focus->noidung->service_tongthanhtien_mienbac = 0;
                $focus->noidung->service_tongthue_mienbac = 0;
                $sv_mb = 1;
                foreach($svArr as $svVal){
                    if($svVal['area']== "mienbac"){
                    $html .= '<tr>';
                        $html .= '<td width="20%" class="dataField"><select class="servicename" name="services_name_mb[]" id="services_name_mb'.$sv_mb.'">'.get_select_options_with_id($app_list_strings['list_dichvu_dom_north'],$svVal['id']).'</select> </td>';
                        $html .= '<td width="10%" class="dataField"><input size="10" class="dongia center" name="services_dongia_mb[]" type="text" id="services_dongia_mb'.$sv_mb.'" /></td>';
                        $html .= '<td width="10%" class="dataField"><input class="soluong center" name="services_soluong_mb[]" type="text" id="services_soluong_mb'.$sv_mb.'" size="10" /></td>';
                        $html .= '<td width="10%" class="dataField"><input class="songay center" name="services_songay_mb[]" type="text" id="services_songay_mb'.$sv_mb.'" size="10" /></td>';
                        $html .= '<td width="10%" class="dataField"><input class="foc center" name="services_foc_mb[]" type="text" id="services_foc_mb'.$sv_mb.'" size="10" /></td>';
                        $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="services_thanhtien_mb[]" type="text" id="services_thanhtien_mb'.$sv_mb.'" size="10" /></td>';
                        $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="services_thuexuat_mb[]" type="text" id="services_thuexuat_mb'.$sv_mb.'" value="10" size="10" /></td>';
                        $html .= '<td width="20%" class="dataField"><input class="vat center" name="services_vat_mb[]" type="text" id="services_vat_mb'.$sv_mb.'" size="10" /></td>';
                        $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                    $html .= '</tr> ';
                    $DICHVU_MIENBAC[$sv_mb]->services_name_mb = $svVal['id'];
                    $DICHVU_MIENBAC[$sv_mb]->services_dongia_mb = 0;
                    $DICHVU_MIENBAC[$sv_mb]->services_soluong_mb = 0;
                    $DICHVU_MIENBAC[$sv_mb]->services_songay_mb = 0;
                    $DICHVU_MIENBAC[$sv_mb]->services_foc_mb = 0;
                    $DICHVU_MIENBAC[$sv_mb]->services_thanhtien_mb = 0;
                    $DICHVU_MIENBAC[$sv_mb]->services_thuexuat_mb = 0;
                    $DICHVU_MIENBAC[$sv_mb]->services_vat_mb = 0;
                    $sv_mb++;               
                }
            }
            $focus->noidung->dichvu_mienbac = $DICHVU_MIENBAC;
                $html .= '</tbody></table></fieldset></td></tr>';  
                // lấy danh sách dịch vụ miền trung
                $html .= '<tr><td colspan="8">';
                $html .= '<fieldset >';
                $html .= '<legend><h3>MIỀN TRUNG</h3></legend>';
                $html .= '<table width="100%" class="table_clone" id="dichvu_mientrung" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th>Loại dịch vụ</th>';
                    $html .= '<th>Đơn giá</th>';
                    $html .= '<th>Số lượng</th>';
                    $html .= '<th>Số ngày</th>';
                    $html .= '<th>FOC</th>';
                    $html .= '<th>Thành tiền</th>';
                    $html .= '<th>Thuế suất</th>';
                    $html .= '<th>Thuế</th>';
                    $html .= '<th>&nbsp;</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tfoot>';
                $html .= '<tr>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" size="15" class="center" name="service_tongthanhtien_mientrung" id="service_tongthanhtien_mientrung"/></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" size="15" class="center" name="service_tongthue_mientrung" id="service_tongthue_mientrung"/></th>';
                    $html .= '<th width="20%">&nbsp;</th>';
                $html .= '</tr>';
                $html .= '</tfoot>';
                $html .= '<tbody>';
                $focus->noidung->service_tongthanhtien_mientrung = 0;
                $focus->noidung->service_tongthue_mientrung = 0;
                $dv_mt = 1;
                foreach($svArr as $svVal){
                    if($svVal['area']== "mientrung"){
                    $html .= '<tr>';
                        $html .= '<td width="20%" class="dataField"><select class="servicename" name="services_name_mt[]" id="services_name_mt'.$dv_mt.'">'.get_select_options_with_id($app_list_strings['list_dichvu_dom_middle'],$svVal['id']).'</select> </td>';
                        $html .= '<td width="10%" class="dataField"><input size="10" class="dongia center" name="services_dongia_mt[]" type="text" id="services_dongia_mt'.$dv_mt.'" /></td>';
                        $html .= '<td width="10%" class="dataField"><input class="soluong center" name="services_soluong_mt[]" type="text" id="services_soluong_mt'.$dv_mt.'" size="10" /></td>';
                        $html .= '<td width="10%" class="dataField"><input class="songay center" name="services_songay_mt[]" type="text" id="services_songay_mt'.$dv_mt.'" size="10" /></td>';
                        $html .= '<td width="10%" class="dataField"><input class="foc center" name="services_foc_mt[]" type="text" id="services_foc_mt'.$dv_mt.'" size="10" /></td>';
                        $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="services_thanhtien_mt[]" type="text" id="services_thanhtien_mt'.$dv_mt.'" size="10" /></td>';
                        $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="services_thuexuat_mt[]" type="text" id="services_thuexuat_mt'.$dv_mt.'" value="10" size="10" /></td>';
                        $html .= '<td width="20%" class="dataField"><input class="vat center" name="services_vat_mt[]" type="text" id="services_vat_mt'.$dv_mt.'" size="10" /></td>';
                        $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                    $html .= '</tr> ';
                    $DICHVU_MIENTRUNG[$dv_mt]->services_name_mt = $svVal['id'];
                    $DICHVU_MIENTRUNG[$dv_mt]->services_dongia_mt = 0;
                    $DICHVU_MIENTRUNG[$dv_mt]->services_soluong_mt = 0;
                    $DICHVU_MIENTRUNG[$dv_mt]->services_songay_mt = 0;
                    $DICHVU_MIENTRUNG[$dv_mt]->services_foc_mt = 0;
                    $DICHVU_MIENTRUNG[$dv_mt]->services_thanhtien_mt = 0;
                    $DICHVU_MIENTRUNG[$dv_mt]->services_thuexuat_mt = 0;
                    $DICHVU_MIENTRUNG[$dv_mt]->services_vat_mt = 0;
                    $dv_mt ++;               
                }
            }
                $focus->noidung->dichvu_mientrung = $DICHVU_MIENTRUNG;
                $html .= '</tbody></table></fieldset></td></tr>';
                  // lay danh sách dịch vụ ở miền nam
            
                $html .= '<tr><td colspan="8">';
                $html .= '<fieldset>';
                $html .= '<legend><h3>MIỀN NAM</h3></legend>';
                $html .= '<table width="100%" class="table_clone" id="dichvu_miennam" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th>Loại dịch vụ</th>';
                    $html .= '<th>Đơn giá</th>';
                    $html .= '<th>Số lượng</th>';
                    $html .= '<th>Số ngày</th>';
                    $html .= '<th>FOC</th>';
                    $html .= '<th>Thành tiền</th>';
                    $html .= '<th>Thuế suất</th>';
                    $html .= '<th>Thuế</th>';
                    $html .= '<th>&nbsp;</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tfoot>';
                $html .= '<tr>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" size="15" class="center" name="service_tongthanhtien_miennam" id="service_tongthanhtien_miennam"/></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" size="15" class="center" name="service_tongthue_miennam" id="service_tongthue_miennam"/></th>';
                    $html .= '<th width="20%">&nbsp;</th>';
                $html .= '</tr>';
                $html .= '</tfoot>';
                $html .= '<tbody>';
                $focus->noidung->service_tongthanhtien_miennam = 0;
                $focus->noidung->service_tongthue_miennam = 0;
                $dv_mv = 1;
                foreach($svArr as $svVal){
                    if($svVal['area']== "miennam"){
                        $html .= '<tr>';
                            $html .= '<td width="20%" class="dataField"><select class="servicename" name="services_name_mn[]" id="services_name_mn'.$dv_mv.'">'.get_select_options_with_id($app_list_strings['list_dichvu_dom_south'],$svVal['id']).'</select></td>';
                            $html .= '<td width="10%" class="dataField"><input size="10" class="dongia center" name="services_dongia_mn[]" type="text" id="services_dongia_mn'.$dv_mv.'" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="soluong center" name="services_soluong_mn[]" type="text" id="services_soluong_mn'.$dv_mv.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="songay center" name="services_songay_mn[]" type="text" id="services_songay_mn'.$dv_mv.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="foc center" name="services_foc_mn[]" type="text" id="services_foc_mn'.$dv_mv.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="services_thanhtien_mn[]" type="text" id="services_thanhtien_mn'.$dv_mv.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="services_thuexuat_mn[]" type="text" id="services_thuexuat_mn'.$dv_mv.'" value="10" size="10" /></td>';
                            $html .= '<td width="20%" class="dataField"><input class="vat center" name="services_vat_mn[]" type="text" id="services_vat_mn'.$dv_mv.'" size="10" /></td>';
                            $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                        $html .= '</tr> ';
                        $DICHVU_MIENNAM[$dv_mv]->services_name_mn = $svVal['id'];
                        $DICHVU_MIENNAM[$dv_mv]->services_dongia_mn = 0;
                        $DICHVU_MIENNAM[$dv_mv]->services_soluong_mn = 0;
                        $DICHVU_MIENNAM[$dv_mv]->services_songay_mn = 0;
                        $DICHVU_MIENNAM[$dv_mv]->services_foc_mn = 0;
                        $DICHVU_MIENNAM[$dv_mv]->services_thanhtien_mn = 0;
                        $DICHVU_MIENNAM[$dv_mv]->services_thuexuat_mn = 0;
                        $DICHVU_MIENNAM[$dv_mv]->services_vat_mn = 0;
                        $dv_mv++;               
                    }
                }
                $html .= '</tbody></table></fieldset></td></tr>';
                
                $focus->noidung->dichvu_miennam = $DICHVU_MIENNAM;
                $html .= '</tbody>';
                $html .= '</table>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</fieldset>';
                
            }

            // loading data tham quan
            $tqArr = array();
            $tqArr = $focus->getSightseeingData($id);
            foreach($tqArr as $arrtq){
                if($arrtq['area']=="mienbac"){
                     $app_list_strings['list_thamquan_dom_north'][$arrtq['id']]= $arrtq['name']; 
                }
                if($arrtq['area']=="mientrung"){
                     $app_list_strings['list_thamquan_dom_middle'][$arrtq['id']]= $arrtq['name']; 
                }
                if($arrtq['area']=="miennam"){
                     $app_list_strings['list_thamquan_dom_south'][$arrtq['id']]= $arrtq['name']; 
                }
                
            }
            if(count($tqArr)>0){
                
                $html .= '<fieldset>';
                $html .= '<div>';
                $html .= '<p>&nbsp;</p>'; 
                $html .= '<a class="showdiv"><img src="custom/themes/default/images/btndown.png" width="30" height="30" title="phóng to"/></a> &nbsp; <a class="hidediv"><img src="custom/themes/default/images/btnup.png" width="30" height="30" title="thu nhỏ"/></a>' ; 
                $html .= '<div class="displayandshow">';
                $html .= '<legend> <h3>THAM QUAN</h3></legend>';
                $html .= '<table width="100%" class="tabForm" border="0" id="thamquan" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                
                $html .= '<tr>';
                    $html .= '<th>TỔNG CỘNG</th>';
//                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" size="15" class="center" name="thamquan_tongthanhtien" id="thamquan_tongthanhtien" size="15"/></th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" size="15" class="center" name="thamquan_tongthue" id="thamquan_tongthue" size="15"/></th>';
                    $html .= '<th>&nbsp;</th>';
                $html .= '</tr>';
                $html .= '<thead>';
                $html .= '<tbody>';
                
                $focus->noidung->thamquan_tongthanhtien = 0;
                $focus->noidung->thamquan_tongthue = 0;
                // lấy danh sách tham quan tại miền bắc
                $html .= '<tr><td colspan="10">';
                $html .= '<fieldset >';
                $html .= '<legend><h3>MIỀN BẮC</h3></legend>';
                $html .= '<table width="100%" class="table_clone" id="thamquan_mienbac" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th>Địa điểm tham quan</th>';
                    $html .= '<th>Đơn giá NL</th>';
                    $html .= '<th>Số lượng NL</th>';
                    $html .= '<th>Đơn giá TE</th>';
                    $html .= '<th>Số lượng TE</th>';
                    $html .= '<th>Số Lần/Lượt </th>';
//                    $html .= '<th>FOC</th>';
                    $html .= '<th>Thành tiền</th>';
                    $html .= '<th>Thuế suất</th>';
                    $html .= '<th>Thuế</th>';
                    $html .= '<th>&nbsp;</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tfoot>';
                $html .= '<tr>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" size="15" class="center" name="thamquan_tongthanhtien_mienbac" id="thamquan_tongthanhtien_mienbac" size="15"/></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" size="15" class="center" name="thamquan_tongthue_mienbac" id="thamquan_tongthue_mienbac" size="15"/></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                $html .= '</tr>';
                $html .= '</tfoot>';
                $html .= '<tbody>';
                $focus->noidung->thamquan_tongthanhtien_mienbac = 0;
                $focus->noidung->thamquan_tongthue_mienbac = 0;
                $tq_mb = 1;
                foreach($tqArr as $tqVal){
                        if($tqVal['area']== "mienbac"){
                        $html .= '<tr>';
                            $html .= '<td width="10%" class="dataField"><select class="servicename" name="thamquan_name_mb[]" id="thamquan_name_mb'.$tq_mb.'">'.get_select_options_with_id($app_list_strings['list_thamquan_dom_north'],$tqVal['id']).'</select> </td>';
                            $html .= '<td width="10%" class="dataField"><input type="text" size="10" class="thamquan_dongianl center" name="thamquan_gianguoilon_mb[]" id="thamquan_gianguoilon_mb'.$tq_mb.'"/> </td>';
                            $html .= '<td width="10%" class="dataField"><input size="10" class="thamquan_soluongnl center" name="thamquan_soluongnguoilon_mb[]" type="text" id="thamquan_soluongnguoilon_mb'.$tq_mb.'" value="'.$thuesuathoa.'" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thamquan_dongiate center" name="thamquan_dongiatreem_mb[]" type="text" id="thamquan_dongiatreem_mb'.$tq_mb.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thamquan_soluongte center" name="thamquan_soluongtreem_mb[]" type="text" id="thamquan_soluongtreem_mb'.$tq_mb.'" size="10" value="'.$sokhach.'" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="songay center" name="thamquan_songay_mb[]" type="text" id="thamquan_songay_mb'.$tq_mb.'" size="10" /></td>';
//                            $html .= '<td width="10%" class="dataField"><input class="foc center" name="thamquan_foc_mb[]" type="text" id="thamquan_foc_mb'.$tq_mb.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="thamquan_thanhtien_mb[]" type="text" id="thamquan_thanhtien_mb'.$tq_mb.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="thamquan_thuesuat_mb[]" type="text" id="thamquan_thuesuat_mb'.$tq_mb.'" value="10" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="vat center" name="thamquan_vat_mb[]" type="text" id="thamquan_vat_mb'.$tq_mb.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                        $html .= '</tr> '; 
                        $THAMQUAN_MIENBAC[$tq_mb]->thamquan_name_mb = $tqVal['id'];
                        $THAMQUAN_MIENBAC[$tq_mb]->thamquan_gianguoilon_mb = 0;
                        $THAMQUAN_MIENBAC[$tq_mb]->thamquan_soluongnguoilon_mb = 0;
                        $THAMQUAN_MIENBAC[$tq_mb]->thamquan_dongiatreem_mb = 0;
                        $THAMQUAN_MIENBAC[$tq_mb]->thamquan_soluongtreem_mb = 0;
                        $THAMQUAN_MIENBAC[$tq_mb]->thamquan_songay_mb = 0;
                        $THAMQUAN_MIENBAC[$tq_mb]->thamquan_foc_mb = 0;
                        $THAMQUAN_MIENBAC[$tq_mb]->thamquan_thanhtien_mb = 0;
                        $THAMQUAN_MIENBAC[$tq_mb]->thamquan_thuesuat_mb = 0;
                        $THAMQUAN_MIENBAC[$tq_mb]->thamquan_vat_mb = 0;
                        $tq_mb++;              
                    }
                }
                $html .= '</tbody></table></fieldset></td></tr>';
                $focus->noidung->thamquan_mienbac = $THAMQUAN_MIENBAC;
                //  lấy danh sách tham quan tại miền trung
            
                $html .= '<tr><td colspan="10">';
                $html .= '<fieldset >';
                $html .= '<legend><h3>MIỀN TRUNG</h3></legend>';
                $html .= '<table width="100%" class="table_clone" id="thamquan_mientrung" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th>Địa điểm tham quan</th>';
                    $html .= '<th>Đơn giá NL</th>';
                    $html .= '<th>Số lượng NL</th>';
                    $html .= '<th>Đơn giá TE</th>';
                    $html .= '<th>Số lượng TE</th>';
                    $html .= '<th>Số Lần/Lượt </th>';
//                    $html .= '<th>FOC</th>';
                    $html .= '<th>Thành tiền</th>';
                    $html .= '<th>Thuế suất</th>';
                    $html .= '<th>Thuế</th>';
                    $html .= '<th>&nbsp;</th>';
                $html .= '</tr>';
                $html .= '<thead>'; 
                $html .= '<tfoot>';
                $html .= '<tr>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" size="15" class="center" name="thamquan_tongthanhtien_mientrung" id="thamquan_tongthanhtien_mientrung" size="15"/></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" size="15" class="center" name="thamquan_tongthue_mientrung" id="thamquan_tongthue_mientrung" size="15"/></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                $html .= '</tr>';
                $html .= '</tfoot>';
                $html .= '<tbody>';
                $focus->noidung->thamquan_tongthanhtien_mientrung = 0;
                $focus->noidung->thamquan_tongthue_mientrung = 0;
                $tq_mt = 1;
                foreach($tqArr as $tqVal){
                        if($tqVal['area']== "mientrung"){
                        $html .= '<tr>';
                            $html .= '<td width="10%" class="dataField"><select class="servicename" name="thamquan_name_mt[]" id="thamquan_name_mt'.$tq_mt.'">'.get_select_options_with_id($app_list_strings['list_thamquan_dom_middle'],$tqVal['id']).'</select> </td>';
                            $html .= '<td width="10%" class="dataField"><input type="text" size="10" class="thamquan_dongianl center" name="thamquan_gianguoilon_mt[]" id="thamquan_gianguoilon_mt'.$tq_mt.'"/> </td>';
                            $html .= '<td width="10%" class="dataField"><input size="10" class="thamquan_soluongte center" name="thamquan_soluongnguoilon_mt[]" type="text" id="thamquan_soluongnguoilon_mt'.$tq_mt.'"  value="'.$thuesuathoa.'"/></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thamquan_dongiate center" name="thamquan_dongiatreem_mt[]" type="text" id="thamquan_dongiatreem_mt'.$tq_mt.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thamquan_soluongte center" name="thamquan_soluongtreem_mt[]" type="text" id="thamquan_soluongtreem_mt'.$tq_mt.'" size="10" value="'.$sokhach.'" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="songay center" name="thamquan_songay_mt[]" type="text" id="thamquan_songay_mt'.$tq_mt.'" size="10" /></td>';
//                            $html .= '<td width="10%" class="dataField"><input class="foc center" name="thamquan_foc_mt[]" type="text" id="thamquan_foc_mt'.$tq_mt.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="thamquan_thanhtien_mt[]" type="text" id="thamquan_thanhtien_mt'.$tq_mt.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="thamquan_thuesuat_mt[]" type="text" id="thamquan_thuesuat_mt'.$tq_mt.'" value="10" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="vat center" name="thamquan_vat_mt[]" type="text" id="thamquan_vat_mt'.$tq_mt.' size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                        $html .= '</tr> ';  
                        $THAMQUAN_MIENTRUNG[$tq_mt]->thamquan_name_mt = $tqVal['id'];
                        $THAMQUAN_MIENTRUNG[$tq_mt]->thamquan_gianguoilon_mt = 0;
                        $THAMQUAN_MIENTRUNG[$tq_mt]->thamquan_soluongnguoilon_mt = 0;
                        $THAMQUAN_MIENTRUNG[$tq_mt]->thamquan_dongiatreem_mt = 0;
                        $THAMQUAN_MIENTRUNG[$tq_mt]->thamquan_soluongtreem_mt = 0;
                        $THAMQUAN_MIENTRUNG[$tq_mt]->thamquan_songay_mt = 0;
                        $THAMQUAN_MIENTRUNG[$tq_mt]->thamquan_foc_mt = 0;
                        $THAMQUAN_MIENTRUNG[$tq_mt]->thamquan_thanhtien_mt = 0;
                        $THAMQUAN_MIENTRUNG[$tq_mt]->thamquan_thuesuat_mt = 0;
                        $THAMQUAN_MIENTRUNG[$tq_mt]->thamquan_vat_mt = 0;
                        $tq_mt++;              
                    }
                }
                $html .= '</tbody></table></fieldset></td></tr>';
                $focus->noidung->thamquan_mientrung = $THAMQUAN_MIENTRUNG; 
                /// lấy danh sách tham quan tại miền nam
                
                $html .= '<tr><td colspan="10">';
                $html .= '<fieldset >';
                $html .= '<legend><h3>MIỀN NAM</h3></legend>';
                $html .= '<table width="100%" class="table_clone" id="thamquan_miennam" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th>Địa điểm tham quan</th>';
                    $html .= '<th>Đơn giá NL</th>';
                    $html .= '<th>Số lượng NL</th>';
                    $html .= '<th>Đơn giá TE</th>';
                    $html .= '<th>Số lượng TE</th>';
                    $html .= '<th>Số Lần/Lượt </th>';
//                    $html .= '<th>FOC</th>';
                    $html .= '<th>Thành tiền</th>';
                    $html .= '<th>Thuế suất</th>';
                    $html .= '<th>Thuế</th>';
                    $html .= '<th>&nbsp;</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tfoot>';
                $html .= '<tr>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" size="15" class="center" name="thamquan_tongthanhtien_miennam" id="thamquan_tongthanhtien_miennam" size="15"/></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%"><input type="text" size="15" class="center" name="thamquan_tongthue_mienam" id="thamquan_tongthue_mienam" size="15"/></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                $html .= '</tr>';
                $html .= '</tfoot>';
                $html .= '<tbody>';
                $focus->noidung->thamquan_tongthanhtien_miennam = 0;
                $focus->noidung->thamquan_tongthue_mienam = 0;
                $tq_mn = 1;
                foreach($tqArr as $tqVal){
                        if($tqVal['area']== "miennam"){
                        $html .= '<tr>';
                            $html .= '<td width="10%" class="dataField"><select class="servicename" name="thamquan_name_mn[]" id="thamquan_name_mn'.$tq_mn.'">'.get_select_options_with_id($app_list_strings['list_thamquan_dom_south'],$tqVal['id']).'</select> </td>';
                            $html .= '<td width="10%" class="dataField"><input type="text" size="10" class="thamquan_dongianl center" name="thamquan_gianguoilon_mn[]" id="thamquan_gianguoilon_mn'.$tq_mn.'"/> </td>';
                            $html .= '<td width="10%" class="dataField"><input size="10" class="thamquan_soluongte center" name="thamquan_soluongnguoilon_mn[]" type="text" id="thamquan_soluongnguoilon_mn'.$tq_mn.'"  value="'.$thuesuathoa.'"/></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thamquan_dongiate center" name="thamquan_dongiatreem_mn[]" type="text" id="thamquan_dongiatreem_mn'.$tq_mn.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thamquan_soluongte center" name="thamquan_soluongtreem_mn[]" type="text" id="thamquan_soluongtreem_mn'.$tq_mn.'" size="10" value="'.$sokhach.'" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="songay center" name="thamquan_songay_mn[]" type="text" id="thamquan_songay_mn'.$tq_mn.'" size="10" /></td>';
//                            $html .= '<td width="10%" class="dataField"><input class="foc center" name="thamquan_foc_mn[]" type="text" id="thamquan_foc_mn'.$tq_mn.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="thamquan_thanhtien_mn[]" type="text" id="thamquan_thanhtien_mn'.$tq_mn.'" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="thamquan_thuesuat_mn[]" type="text" id="thamquan_thuesuat_mn'.$tq_mn.'" value="10" size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input class="vat center" name="thamquan_vat_mn[]" type="text" id="thamquan_vat_mn'.$tq_mn.' size="10" /></td>';
                            $html .= '<td width="10%" class="dataField"><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                        $html .= '</tr> ';  
                        $THAMQUAN_MIENNAM[$tq_mn]->thamquan_name_mn = $tqVal['id'];
                        $THAMQUAN_MIENNAM[$tq_mn]->thamquan_gianguoilon_mn = 0;
                        $THAMQUAN_MIENNAM[$tq_mn]->thamquan_soluongnguoilon_mn = 0;
                        $THAMQUAN_MIENNAM[$tq_mn]->thamquan_dongiatreem_mn = 0;
                        $THAMQUAN_MIENNAM[$tq_mn]->thamquan_soluongtreem_mn = 0;
                        $THAMQUAN_MIENNAM[$tq_mn]->thamquan_songay_mn = 0;
//                        $THAMQUAN_MIENNAM[$tq_mn]->thamquan_foc_mn = 0;
                        $THAMQUAN_MIENNAM[$tq_mn]->thamquan_thanhtien_mn = 0;
                        $THAMQUAN_MIENNAM[$tq_mn]->thamquan_thuesuat_mn = 0;
                        $THAMQUAN_MIENNAM[$tq_mn]->thamquan_giachuathue = 0;
                        $THAMQUAN_MIENNAM[$tq_mn]->thamquan_vat_mn = 0;
                        $tq_mn ++;              
                    }
                }
                $html .= '</tbody></table></fieldset></td></tr>';
                
                $focus->noidung->thamquan_miennam = $THAMQUAN_MIENNAM;
                $html .= '</body>';
                $html .= '</table>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</fieldset>';
                
            }
            $_SESSION['content']  = $focus->noidung;
            $content = json_encode($_SESSION['content'] );
            $content = base64_encode($content);
            $focus->content = $content;
            $focus->type = $type;
            $focus->worksheet_tour_id = $id;
            $focus->worksheet_tour_name  = $tour_name;
            $focus->tourcode  = $tourcode;
            $focus->duration  = $duration;
            $focus->transport  = $transport;
            $focus->groupprogrd737rograms_ida  = $groupprogrd737rograms_ida;
            $focus->groupprograorksheets_name  = $groupprograorksheets_name;
            $focus->thuesuathoa  = $thuesuathoa;
            $focus->sokhach  = $sokhach;
            $focus->tyle  = $tyle;
            $focus->version  = $version;
            $focus->lotrinh  = $lotrinh;
            
            $focus->save($check_notify) ;
            $id = $focus->id;
            //$arr = array($id,$html);
            $html .= '<table><tr><td>';
            $html .="<input type='hidden' name='worksheet_id' id='worksheet_id' value='".$id."'";
            $html .= '</td></tr></table>';
            $_SESSION['record'] = $_SESSION['return_id'] = $id;
            $html .= '<script type="text/javascript">';
                $html .= '$(".servicename").change(function(){
                        var val = $(this).val();
                        //var index = $(this).get(0).selectedIndex;
                        //alert(index);
                        //alert($(this).closest("tr").find(".giathamkhao_an option:[value="+val+"]").text());
                        //tienthamkhao = $(this).closest("tr").find(".nh_giathamkhao_an option:[value="+val+"]").text();
                        //alert($(this).closest("tr").find(".giathamkhao_an option:eq("+index+")").text()); 
                        //$(this).find(".nh_giathamkhao").val(tienthamkhao);
                        $(this).closest("tr").find(".giathamkhao").val($(this).closest("tr").find(".giathamkhao_an option:[value="+val+"]").text());
                        $(this).closest("tr").find(".center").val(0);                        
                }); ';
            
            $html .= '</script>';
            echo $html;
            echo '<script type="text/javascript">
            $("#btnAction").hide();
            </script>'; 
        }
        else if($i== 1 && $j ==1 && $k ==1 && $l == 1 && $l == 1){
            echo '0';
        }
    } 
?>
