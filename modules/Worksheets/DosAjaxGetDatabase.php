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
            $(".center").val("0");
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
            
            // lay danh sach chi phi ve may bay
                 $airArrtk = $focus->getAirlineTicket($id); 
                 foreach($airArrtk as $tk){
                      $app_list_strings['list_airlinetiket_dom'][$tk['id']]=$tk['name'];
                      $app_list_strings['list_airlinetiket_giathamkhao_dom'][$tk['id']]=$tk['giathamkhao'];
                 }
                 if(count($airArrtk)>0){
                    $html .= '<fieldset>';
                    $html .= '<legend><h3>VÉ MÁY BAY</h3></legend>';
                    $html .= '<table width="100%" class="tabForm" id="vemaybay" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                    $html .= '<thead>'; 
                    $html .= '<tr>';
                    $html .= '<th>Vé chuyến bay</th>';
                    $html .= '<th>Giá tham khảo</th>';
                    $html .= '<th>Đơn giá</th>';
                    $html .= '<th>Số lượng</th>';
                    $html .= '<th>Thành tiền</th>';
                    $html .= '<th>Thuế xuất</th>';
                    $html .= '<th>Giá chưa thuế</th>';
                    $html .= '<th>VAT</th>';
                    $html .= '<th>Hình thức thanh toán</th>';
                    $html .= '<th>Tạm ứng</th>';
                    $html .= '<th>&nbsp;</th>';  
                    $html .= '</tr>';
                    $html .= '<tr>';
                    $html .= '</thead>';
                    $html .= '<tbody>';
                    $focus->noidung->vemaybay_tongthanhtien = 0;
                    $focus->noidung->vemaybay_tongthue = 0;
                    $vmb_mb = 0;
                        foreach($airArrtk as $airtk){
                            $html .= '<tr>';
                                $html .= '<td class="dataField"><select name="vemaybay[]" id="vemaybay'.$vmb_mb.'">'.get_select_options_with_id($app_list_strings['list_airlinetiket_dom'],$airtk['id']).'</select> </td>';
                                $html .= '<td class="dataField"><input type="text" class="dongia center" name="vemaybay_dongia[]" id="vemaybay_dongia'.$vmb_mb.'" value="0" /> <select style="display:none;" class="giathamkhao_an" id="vemabay_giathamkhao_an" name="vemabay_giathamkhao_an[]">'.get_select_options_with_id($app_list_strings['list_airlinetiket_giathamkhao_dom'],$airtk['id']).'</select></td>';
                                $html .= '<td class="dataField"><input type="text" class="soluong center" name="vemaybay_soluong[]" id="vemaybay_soluong'.$vmb_mb.'" value="0" /></td>';
                                $html .= '<td class="dataField"><input type="text" class="foc center" name="vemaybay_foc[]" id="vemaybay_foc'.$vmb_mb.'" value="0" /></td>';
                                $html .= '<td class="dataField"><input type="text" class="thanhtien center" name="vemaybay_thanhtien[]" id="vemaybay_thanhtien'.$vmb_mb.'" value="0" /></td>';
                                $html .= '<td class="dataField"><input type="text" class="thuesuat center" name="vemaybay_thuesuat[]" id="vemaybay_thuesuat'.$vmb_mb.'" value="10" /></td>';
                                $html .= '<td class="dataField"><input class="giachuathue center" name="vemaybay_giachuathue[]" type="text" id="vemaybay_giachuathue'.$vmb_mb.'" size="10" /></td>';
                                $html .= '<td class="dataField"><input type="text" class="vat center" name="vemaybay_vat[]" id="vemaybay_vat'.$vmb_mb.'" value="0" /></td>';
                                $html .= '<td class="dataField"><select name="vemaybay_hinhthucthanhtoan[]" id="vemaybay_hinhthucthanhtoan'.$vmb_mb.'">'.get_select_options_with_id($app_list_strings['hinh_thuc_thanh_toan_dom'],'').' </select> </td>';
                                $html .= '<td class="center" width="10%"><input type = "checkbox" name="vemaybay_check_tam_ung'.$vmb_mb.'" class ="check_tam_ung" id="vemaybay_check_tam_ung'.$vmb_mb.'"><input class="vemaybay_tinhtoan center tamung" name="vemaybay_tamung[]" type="text" id="vemaybay_tamung'.$vmb_mb.'" size="10" /></td>';
                                $html .= '<td class="dataField"><input type="button" class="btnAddRow" value="Add row"/> <input type="button" class="btnDelRow" value="Delete row"/></td>';
                              $html .= '</tr>';
                                $VMB[$vmb_mb]->vemaybay = $airtk['id']  ;
                                $VMB[$vmb_mb]->vemaybay_dongia = 0  ;
                                $VMB[$vmb_mb]->vemaybay_soluong = 0  ;
                                $VMB[$vmb_mb]->vemaybay_foc = 0  ;
                                $VMB[$vmb_mb]->vemaybay_thanhtien = 0  ;
                                $VMB[$vmb_mb]->vemaybay_thuesuat = 0  ;
                                $VMB[$vmb_mb]->vemaybay_vat = 0  ;
                                $VMB[$vmb_mb]->vemaybay_giachuathue = 0;
                                $VMB[$vmb_mb]->vemaybay_hinhthucthanhtoan = 'ck';
                                $VMB[$vmb_mb]->vemaybay_check_tam_ung = "";
                                $VMB[$vmb_mb]->vemaybay_tamung = 0;
                              $vmb_mb ++;
                        }
                    $html .= '</tbody>';
                    $html .='<tfoot>';
                        $html .= '<th>TỔNG CỘNG</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th><input type="text" class="center" name="vemaybay_tongthanhtien" " id="vemaybay_tongthanhtien"></th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th><input type="text" class="center" name="vemaybay_tongthue"  id="vemaybay_tongthue"/></th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '</tr>';
                    $html .= '</tfoot>';
                    $html .= '</table>';
                    $html .= '</fieldset>';
                }
                $focus->noidung->vemaybay = $VMB;
             // get du lieu nha hang
            $nhArr = array(); 
            $nhArr = $focus->getRestaurantData($id);
             foreach($nhArr as $arr){
                $app_list_strings['list_restaurant_dom'][$arr['id']] = $arr['name'];
                $app_list_strings['list_restaurant_giathamkhao_dom'][$arr['id']] = $arr['giathamkhao'];
             }
            if(count($nhArr)>0){
                $html .= '<fieldset class="tabForm">';
                $html .= '<legend><h3>NHÀ HÀNG</h3></legend>';
                $html .= '<table width="100%" class="table_clone" id="nhahang" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>'; 
                $html .= '<tr>';
                $html .= '<th>Tên nhà hàng</th>';
                $html .= '<th>Giá tham khảo</th>';
                $html .= '<th>Đơn giá</th>';
                $html .= '<th>Số lượng</th>';
                $html .= '<th>Số bữa ăn</th>';
                $html .= '<th>Thành tiền</th>';
                $html .= '<th>Thuế xuất</th>';
                $html .= '<th>Giá chưa thuế</th>';
                $html .= '<th>VAT</th>';
                $html .= '<th>Hình thức thanh toán</th>';
                $html .= '<th>Tạm ứng</th>';
                $html .= '<th>&nbsp;</th>';  
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                $focus-> noidung->nhahang_tongthanhtien = 0;
                $focus-> noidung->nhahang_tongthue = 0;
                $i = 0;
                foreach($nhArr as $val){
                    $html .= '<tr>';
                        $html .= '<td class="notcenter"><select class="servicename" name="nh_id[]" id="nh_id'.$i.'">'.get_select_options_with_id($app_list_strings['list_restaurant_dom'],$val['id']).' </select><input class="service_name" type="hidden" name="nh_name[]" id="nh_name'.$i.'" value="'.$val['name'].'"/></td>';
                        $html .= '<td><input type="text" size="10" class="giathamkhao" name="nh_giathamkhao[]" id="nh_giathamkhao'.$i.'" value="'.format_number($val['giathamkhao']).'"/><select style="display:none;" class="giathamkhao_an" id="nh_giathamkhao_an" name="nh_giathamkhao_an[]">'.get_select_options_with_id($app_list_strings['list_restaurant_giathamkhao_dom'],$val['id']).'</select> </td>';
                        $html .= '<td class="center"><input size="10" class="dongia center" name="nh_dongia[]" type="text" id="nh_dongia'.$i.'" /></td>';
                        $html .= '<td class="center"><input class="soluong center" name="nh_soluong[]" type="text" id="nh_soluong'.$i.'" size="10" /></td>';
                        $html .= '<td class="center"><input class="songay center" name="nh_songay[]" type="text" id="nh_songay'.$i.'" size="10" /></td>';
                        $html .= '<td class="center"><input class="thanhtien center" name="nh_thanhtien[]" type="text" id="nh_thanhtien'.$i.'" size="10" /></td>';
                        $html .= '<td class="center"><input class="thuesuat center" name="nh_thuexuat[]" type="text" id="nh_thuexuat'.$i.'" value="10"  size="10" /></td>';
                        $html .= '<td class="center"><input class="giachuathue center" name="nh_giachuathue[]" type="text" id="nh_giachuathue'.$i.'" size="10" /></td>';
                        $html .= '<td class="center"><input class="vat center" name="nh_vat[]" type="text" id="nh_vat'.$i.'" size="10" /></td>';
                        $html .= '<td class="center"><select class="nh_tinhtoan center" name="nh_hinhthucthanhtoan[]" id="nh_hinhthucthanhtoan'.$i.'">'.get_select_options_with_id($app_list_strings['hinh_thuc_thanh_toan_dom'],'').' </select> </td>';
                        $html .= '<td class="center" width="10%"><input type = "checkbox" name="nh_check_tam_ung'.$i.'" class ="check_tam_ung" id="nh_check_tam_ung'.$i.'" ><input class="nh_tinhtoan center tamung" name="nh_tamung[]" type="text" id="nh_tamung'.$i.'" size="10" /></td>';
                        $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                    $html .= '</tr> ';
                    $NHAHANG[$i]->nh_name = $val['name'];
                    $NHAHANG[$i]->nh_id = $val['id'];
                    $NHAHANG[$i]->nh_giathamkhao = $val['giathamkhao'];
                    $NHAHANG[$i]->nh_dongia = 0;
                    $NHAHANG[$i]->nh_soluong = 0;
                    $NHAHANG[$i]->nh_songay = 0;
                    $NHAHANG[$i]->nh_thanhtien = 0;
                    $NHAHANG[$i]->nh_thuexuat = 0;
                    $NHAHANG[$i]->nh_giachuathue = 0;
                    $NHAHANG[$i]->nh_vat = 0;
                    $NHAHANG[$i]->nh_hinhthucthanhtoan = 'ck';
                    $NHAHANG[$i]->nh_check_tam_ung = "";
                    $NHAHANG[$i]->nh_tamung = 0;
                    $i++;
                }
                $focus->noidung->nhahang =$NHAHANG;
                $html .= '</tbody>';
                $html .= '<tfoot>';
                    $html .= '<tr>';
                    $html .= '<th>TỔNG CỘNG</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" class="center" name="nhahang_tongthanhtien" size="15" id="nhahang_tongthanhtien"></th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" class="center" name="nhahang_tongthue" size="15" id="nhahang_tongthue"</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '</tr>';
                $html .= '</tfoot>';
                $html .= '</table> </fieldset>';
            }
            // loading khach san 
                $ksArr = array();
                $ksArr = $focus->getHotelData($id);
                foreach($ksArr as $arrks){
                   $app_list_strings['list_khach_san_dom'][$arrks['id']] = $arrks['name'];
                   $app_list_strings['list_khach_san_giathamkhao_dom'][$arrks['id']] = $arrks['giathamkhao'];
                }
                if(count($ksArr)>0){
                $html .= '<fieldset class="tabForm">';
                $html .= '<legend><h3>KHÁCH SẠN</h3></legend>';
                $html .= '<table width="100%" border="1" class="table_clone" id="khachsan" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                $html .= '<th>Tên khách sạn</th>';
                $html .= '<th>Ghi chú</th>';
                $html .= '<th>Giá tham khảo</th>';
                $html .= '<th>Đơn giá</th>';
                $html .= '<th>Số lượng</th>';
                $html .= '<th>Số đêm</th>';
                $html .= '<th>Thành tiền</th>';
                $html .= '<th>Thuế xuất</th>';
                $html .= '<th>Giá chưa thuế</th>';
                $html .= '<th>VAT</th>';
                $html .= '<th>Hình thức thanh toán</th>';
                $html .= '<th>Tạm ứng</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';

                $focus->noidung->khachsan_tongthanhtien = 0;
                $focus->noidung->khachsan_tongthue = 0;
                 $j = 0;
                foreach($ksArr as $ksval){
                    $html .= '<tr>';
                        $html .= '<td class="notcenter"><select class="servicename" name="ks_id[]" id="ks_id'.$j.'">'.get_select_options_with_id($app_list_strings['list_khach_san_dom'], $ksval['id']).'</select> <input class="service_name" type="hidden" name="ks_name[]" id="ks_name'.$j.'" value="'.$ksval['name'].'"/> </td>';
                        $html .= '<td><input name="ks_ghichu[]" type="text" id="ks_ghichu'.$j.'" /></td>';
                        $html .= '<td><input type="text" size="10" class="giathamkhao" name="ks_giathamkhao[]" id="ks_giathamkhao'.$j.'" value="'.format_number($ksval['giathamkhao']).'"/><select style="display:none" class="giathamkhao_an" id="ks_giathamkhao_an" name="kh_giathamkhao_an[]">'.get_select_options_with_id($app_list_strings['list_khach_san_giathamkhao_dom'],$ksval['giathamkhao']).'</select></td>';
                        $html .= '<td class="center"><input size="10" class="dongia center" name="ks_dongia[]" type="text" id="ks_dongia'.$j.'" /></td>';
                        $html .= '<td class="center"><input class="soluong center" name="ks_soluong[]" type="text" id="ks_soluong'.$j.'" size="10" /></td>';
                        $html .= '<td class="center"><input class="songay center" name="ks_songay[]" type="text" id="ks_songay'.$j.'" size="10" /></td>';
                        $html .= '<td class="center"><input class="thanhtien center" name="ks_thanhtien[]" type="text" id="ks_thanhtien'.$j.'" size="10" /></td>';
                        $html .= '<td class="center"><input class="thuesuat center" name="ks_thuexuat[]" type="text" id="ks_thuexuat'.$j.'" value="10" size="10" /></td>';
                        $html .= '<td class="center"><input class="giachuathue center" name="ks_giachuathue[]" type="text" id="ks_giachuathue'.$j.'" size="10" /></td>';
                        $html .= '<td class="center"><input class="vat center" name="ks_vat[]" type="text" id="ks_vat'.$j.'" size="10" /></td>';
                        $html .= '<td class="center"><select class="ks_tinhtoan center" name="ks_hinhthucthanhtoan[]" id="ks_hinhthucthanhtoan'.$j.'">'.get_select_options_with_id($app_list_strings['hinh_thuc_thanh_toan_dom'],'').' </select></td>';
                        $html .= '<td class="center" width="10%"><input type = "checkbox" name="ks_check_tam_ung'.$j.'" class ="check_tam_ung" id="ks_check_tam_ung'.$j.'" > <input class="ks_tinhtoan center tamung" name="ks_tamung[]" type="text" id="ks_tamung'.$j.'" size="10" /></td>';
                        $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                    $html .= '</tr> ';
                    $KHACHSAN[$j]->ks_name = $ksval['name'];
                    $KHACHSAN[$j]->ks_ghichu = $ksval['ks_ghichu'];
                    $KHACHSAN[$j]->ks_id = $ksval['id'];
                    $KHACHSAN[$j]->ks_giathamkhao = $ksval['giathamkhao'];
                    $KHACHSAN[$j]->ks_dongia = 0;
                    $KHACHSAN[$j]->ks_soluong = 0;
                    $KHACHSAN[$j]->ks_songay = 0;
                    $KHACHSAN[$j]->ks_thanhtien = 0;
                    $KHACHSAN[$j]->ks_thuexuat = 0;
                    $KHACHSAN[$j]->ks_thuexuat = 0;
                    $KHACHSAN[$j]->ks_giachuathue = 0;
                    $KHACHSAN[$j]->ks_vat = 0;
                    $KHACHSAN[$j]->ks_hinhthucthanhtoan = 'ck';
                    $KHACHSAN[$j]->ks_check_tam_ung = "";
                    $KHACHSAN[$j]->ks_tamung = 0;
                    $j++;              
                }
                $focus->nodung->khachsan = $KHACHSAN;
                $html .= '</tbody>';
                $html .= '<tfoot>';
                    $html .= '<tr>';
                    $html .= '<th>TỔNG CỘNG</th>';
                    $html .= '<th>&nbsp;</th>';
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
                    $html .= '</tr>';
                $html .= '</tfoot>';
                $html .= '</table> </fieldset>';
            }
            // loading data van chuyen
            $vcArr = array();
            $vcArr = $focus->getTransportData($id);
            foreach($vcArr as $arrvc){
                $app_list_strings['list_vanchuyen_dom'][$arrvc['id']] ='Xe '.$arrvc['name'].' chỗ';
                $app_list_strings['list_vanchuyengiathamkhao_dom'][$arrvc['id']] = $arrvc['giathamkhao'];
            }
            if(count($vcArr)>0){
                $html .= '<fieldset class="tabForm">';
                $html .= '<legend> <h3>VẬN CHUYỂN</h3></legend>';
                $html .= '<table width="100%" class="table_clone" id="vanchuyen" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                $html .= '<th>Lọai xe</th>';
                $html .= '<th>Giá tham khảo</th>';
                $html .= '<th>Đơn giá</th>';
                $html .= '<th>Số lượng</th>';
                $html .= '<th>Ngày/Km/Giờ</th>';
                $html .= '<th>Thành tiền</th>';
                $html .= '<th>Thuế xuất</th>';
                $html .= '<th>Giá chưa thuế</th>';
                $html .= '<th>VAT</th>';
                $html .= '<th>Hình thức thanh toán</th>';
                $html .= '<th>Tạm ứng</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                $focus->noidung->vanchuyen_tongthanhtien = 0;
                $focus->noidung->vanchuyen_tongthue = 0;
                $k = 0;
                foreach($vcArr as $vcVal){
                    $html .= '<tr>';
                        $html .= '<td class="notcenter"><select class="servicename" name="vanchuyen_name[]" id="vanchuyen_name'.$k.'">'.get_select_options_with_id( $app_list_strings['list_vanchuyen_dom'],$vcVal['id']).'</select> <input type="hidden" name="vanchuyen_id[]" id="vanchuyen_id" value="'.$rowvc['id'].'"/> </td>';
                        $html .= '<td><input type="text" size="10" class="giathamkhao" name="vanchuyen_giathamkhao[]" id="vanchuyen_giathamkhao'.$k.'" value="'.format_number($vcVal['giathamkhao']).'"/><select class="giathamkhao_an" id="vanchuyen_giathamkhao_an" name="vanchuyen_giathamkhao_an" style="display:none">'.get_select_options_with_id($app_list_strings['list_vanchuyengiathamkhao_dom'],$vcVal['giathamkhao']).'</select></td>';
                        $html .= '<td class="center"><input size="10" class="dongia center" name="vanchuyen_dongia[]" type="text" id="vanchuyen_dongia'.$k.'" /> <select name="dongia_option[]" class="dongia_option" id="dongia_option'.$k.'">'.get_select_options_with_id($app_list_strings['vanchuyen_dongia_option'],'').'</select></td>';
                        $html .= '<td class="center"><input class="soluong center" name="vanchuyen_soluong[]" type="text" id="vanchuyen_soluong'.$k.'" size="10" /></td>';
                        $html .= '<td class="center"><input class="songay center" name="vanchuyen_songay[]" type="text" id="vanchuyen_songay'.$k.'" size="10" /></td>';
                        $html .= '<td class="center"><input class="thanhtien center" name="vanchuyen_thanhtien[]" type="text" id="vanchuyen_thanhtien'.$k.'" size="10" /></td>';
                        $html .= '<td class="center"><input class="thuesuat center" name="vanchuyen_thuexuat[]" type="text" id="vanchuyen_thuexuat'.$k.'" value="10" size="10" /></td>';
                        $html .= '<td class="center"><input class="giachuathue center" name="vanchuyen_giachuathue[]" type="text" id="vanchuyen_giachuathue'.$k.'" size="10" /></td>';
                        $html .= '<td class="center"><input class="vat center" name="vanchuyen_vat[]" type="text" id="vanchuyen_vat'.$k.'" size="10" /></td>';
                        $html .= '<td class="center"><select name="vanchuyen_hinhthucthanhtoan[]" id="vanchuyen_hinhthucthanhtoan'.$k.'">'.get_select_options_with_id($app_list_strings['hinh_thuc_thanh_toan_dom'],'').' </select></td>';
                        $html .= '<td class="center"><input type = "checkbox" name="vc_check_tam_ung'.$k.'" class ="check_tam_ung" id="vc_check_tam_ung'.$k.'" > <input class="vc_tinhtoan center tamung" name="vanchuyen_tamung[]" type="text" id="vanchuyen_tamung'.$k.'" size="10" /></td>';
                        $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                    $html .= '</tr> ';
                    $VANCHUYEN[$k]->vanchuyen_name = $vcVal['id'];
                    $VANCHUYEN[$k]->vanchuyen_giathamkhao = $vcVal['giathamkhao'];
                    $VANCHUYEN[$k]->vanchuyen_dongia = 0;
                    $VANCHUYEN[$k]->vanchuyen_soluong = 0;
                    $VANCHUYEN[$k]->vanchuyen_songay = 0;
                    $VANCHUYEN[$k]->vanchuyen_thanhtien = 0;
                    $VANCHUYEN[$k]->vanchuyen_thuexuat = 0;
                    $VANCHUYEN[$k]->vanchuyen_giachuathue = 0;
                    $VANCHUYEN[$k]->vanchuyen_vat = 0;
                    $VANCHUYEN[$k]->vanchuyen_hinhthucthanhtoan = 'ck';
                    $VANCHUYEN[$k]->vc_check_tam_ung = "";
                    $VANCHUYEN[$k]->vanchuyen_tamung = 0;
                    $k++;             
                }
                $focus->noidung->vanchuyen = $VANCHUYEN;
                $html .= '</tbody>';
                $html .= '<tfoot>';
                    $html .= '<tr>';
                    $html .= '<th>TỔNG CỘNG</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" size="15" class="center" name="vanchuyen_tongthanhtien" id="vanchuyen_tongthanhtien"/></th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" size="15" class="center" name="vanchuyen_tongthue" id="vanchuyen_tongthue" /></th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '</tr>';
                $html .= '</tfoot>';
                $html .= '</table> </fieldset>';
            }

            // loading data dich vu
            $svArr = array();
            $svArr = $focus->getServiceData($id);
             foreach($svArr as $arrsv){
                 $app_list_strings['list_dichvu_dom'][$arrsv['id']] = $arrsv['name'];
                 $app_list_strings['list_dichvu_giathamkhao_dom'][$arrsv['id']] = $arrsv['giathamkhao'];
             }
            
            if(count($svArr)>0){
                $html .= '<fieldset class="tabForm">';
                $html .= '<legend> <h3>DỊCH VỤ</h3></legend>';
                $html .= '<table width="100%" class="table_clone" border="1" id="dichvu" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                $html .= '<th>Loại dịch vụ</th>';
                $html .= '<th>Giá tham khảo</th>';
                $html .= '<th>Đơn giá</th>';
                $html .= '<th>Số lượng</th>';
                $html .= '<th>Số ngày</th>';
                $html .= '<th>Thành tiền</th>';
                $html .= '<th>Thuế xuất</th>';
                $html .= '<th>Giá chưa thuế</th>';
                $html .= '<th>VAT</th>';
                $html .= '<th>Hình thức thanh toán</th>';
                $html .= '<th>Tạm ứng</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                $focus->noidung->service_tongthanhtien = 0;
                $focus->noidung->service_tongthue = 0;
                $l = 0;
                foreach($svArr as $svVal){
                    $html .= '<tr>';
                        $html .= '<td class="notcenter"><select class="servicename" name="services_name[]" id="services_name'.$l.'">'.get_select_options_with_id($app_list_strings['list_dichvu_dom'],$svVal['id']).'</select> <input type="hidden" name="services_id[]" id="services_id" value="'.$svVal['id'].'"/>  </td>';
                        $html .= '<td><input type="text" size="10" class="giathamkhao" name="services_giathamkhao[]" id="services_giathamkhao'.$l.'" value="'.format_number($svVal['giathamkhao']).'"/><select class="giathamkhao_an" name="service_giathamkhao_an[]" id="service_giathamkhao_an" style="display:none">'.get_select_options_with_id($app_list_strings['list_dichvu_giathamkhao_dom'],$svVal['giathamkhao']).'</select> </td>';
                        $html .= '<td class="center"><input size="10" class="dongia center" name="services_dongia[]" type="text" id="services_dongia'.$l.'" /></td>';
                        $html .= '<td class="center"><input class="soluong center" name="services_soluong[]" type="text" id="services_soluong'.$l.'" size="10" /></td>';
                        $html .= '<td class="center"><input class="songay center" name="services_songay[]" type="text" id="services_songay'.$l.'" size="10" /></td>';
                        $html .= '<td class="center"><input class="thanhtien center" name="services_thanhtien[]" type="text" id="services_thanhtien'.$l.'" size="10" /></td>';
                        $html .= '<td class="center"><input class="thuesuat center" name="services_thuexuat[]" type="text" id="services_thuexuat'.$l.'" value="10" size="10" /></td>';
                        $html .= '<td class="center"><input class="giachuathue center" name="services_giachuathue[]" type="text" id="services_giachuathue'.$l.'" size="10" /></td>';
                        $html .= '<td class="center"><input class="vat center" name="services_vat[]" type="text" id="services_vat'.$l.'" size="10" /></td>';
                        $html .= '<td class="center"><select  name="services_hinhthucthanhtoan[]" id="services_hinhthucthanhtoan'.$l.'">'.get_select_options_with_id($app_list_strings['hinh_thuc_thanh_toan_dom'],'').' </select> </td>';
                        $html .= '<td class="center" width="10%"><input type = "checkbox" name="sv_check_tam_ung'.$l.'" class ="check_tam_ung" id="sv_check_tam_ung'.$l.'" > <input class="sv_tinhtoan center tamung" name="services_tamung[]" type="text" id="services_tamung'.$l.'" size="10" /></td>';
                        $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                    $html .= '</tr> ';
                    $DICHVU[$l]->services_name = $svVal['id'];
                    $DICHVU[$l]->services_id = $svVal['id'];
                    $DICHVU[$l]->service_giathamkhao = $svVal['giathamkhao'];
                    $DICHVU[$l]->services_dongia = 0;
                    $DICHVU[$l]->services_soluong = 0;
                    $DICHVU[$l]->services_songay = 0;
                    $DICHVU[$l]->services_thanhtien = 0;
                    $DICHVU[$l]->services_thuexuat = 0;
                    $DICHVU[$l]->services_giachuathue = 0;
                    $DICHVU[$l]->services_vat = 0;
                    $DICHVU[$l]->services_hinhthucthanhtoan = 'ck';
                    $DICHVU[$l]->sv_check_tam_ung = "";
                    $DICHVU[$l]->services_tamung = 0;
                    $l++;               
                }
                $focus->noidung->dichvu = $DICHVU;
                $html .= '</tbody>';
                $html .= '<tfoot>';
                    $html .= '<tr>';
                    $html .= '<th>TỔNG CỘNG</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" size="15" class="center" name="service_tongthanhtien" id="service_tongthanhtien"/></th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" size="15" class="center" name="service_tongthue" id="service_tongthue"/></th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '</tr>';
                $html .= '</tfoot>';
                $html .= '</table> </fieldset>';
            }

            // loading data tham quan
            $tqArr = array();
            $tqArr = $focus->getSightseeingData($id);
            foreach($tqArr as $arrtq){
                $app_list_strings['list_thamquan_dom'][$arrtq['id']]= $arrtq['name'];
                $app_list_strings['list_thamquan_giathamkhao_dom'][$arrtq['id']]= $arrtq['giathamkhao'];
            }
            if(count($tqArr)>0){
                $html .= '<fieldset class="tabForm">';
                $html .= '<legend> <h3>THAM QUAN</h3></legend>';
                $html .= '<table width="100%" class="table_clone" border="1" id="thamquan" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                $html .= '<th>Địa điểm tham quan</th>';
                $html .= '<th>Giá tham khảo</th>';
                $html .= '<th>Đơn giá</th>';
                $html .= '<th>Số lượng</th>';
                $html .= '<th>Số ngày</th>';
                $html .= '<th>Thành tiền</th>';
                $html .= '<th>Thuế xuất</th>';
                $html .= '<th>Giá chưa thuế</th>';
                $html .= '<th>VAT</th>';
                $html .= '<th>Hình thức thanh toán</th>';
                $html .= '<th>Tạm ứng</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '</tr>';
                $html .= '<thead>';
                $html .= '<tbody>';
                $focus->noidung->thamquan_tongthanhtien = 0;
                $focus->noidung->thamquan_tongthue = 0;
                $m =0;
                foreach($tqArr as $tqVal){
                    $html .= '<tr>';
                        $html .= '<td class="notcenter"><select class="servicename" name="thamquan_name[]" id="thamquan_name'.$m.'">'.get_select_options_with_id($app_list_strings['list_thamquan_dom'],$tqVal['id']).'</select> <input type="hidden" name="thamquan_id[]" id="thamquan_id" value="'.$rowtq['id'].'"/> </td>';
                        $html .= '<td><input type="text" size="10" class="giathamkhao" name="thamquan_giathamkhao[]" id="thamquan_giathamkhao'.$m.'" value="'.format_number($tqVal['giathamkhao']).'"/> <select class="giathamkhao_an" id="thamquan_giathamkhao_an'.$m.'" name="thamquan_giathamkhao_an[]" style="display:none">'.get_select_options_with_id($app_list_strings['list_thamquan_giathamkhao_dom'],$tqVal['giathamkhao']).'</select> </td>';
                        $html .= '<td class="center"><input size="10" class="dongia center" name="thamquan_dongia[]" type="text" id="thamquan_dongia'.$m.'" /></td>';
                        $html .= '<td class="center"><input class="soluong center" name="thamquan_soluong[]" type="text" id="thamquan_soluong'.$m.'" size="10" /></td>';
                        $html .= '<td class="center"><input class="songay center" name="thamquan_songay[]" type="text" id="thamquan_songay'.$m.'" size="10" /></td>';
                        $html .= '<td class="center"><input class="thanhtien center" name="thamquan_thanhtien[]" type="text" id="thamquan_thanhtien'.$m.'" size="10" /></td>';
                        $html .= '<td class="center"><input class="thuesuat center" name="thamquan_thuexuat[]" type="text" id="thamquan_thuexuat'.$m.'" value="10" size="10" /></td>';
                        $html .= '<td class="center"><input class="giachuathue center" name="thamquan_giachuathue[]" type="text" id="thamquan_giachuathue'.$m.'" size="10" /></td>';
                        $html .= '<td class="center"><input class="vat center" name="thamquan_vat[]" type="text" id="thamquan_vat'.$m.'" size="10" /></td>';
                        $html .= '<td class="center"><select name="thamquan_hinhthucthanhtoan[]" id="thamquan_hinhthucthanhtoan'.$m.'">'.get_select_options_with_id($app_list_strings['hinh_thuc_thanh_toan_dom'],'').' </select> </td>';
                        $html .= '<td class="center" width="10%"><input type = "checkbox" name="tq_check_tam_ung'.$m.'" class ="check_tam_ung" id="tq_check_tam_ung'.$m.'" > <input class="tq_tinhtoan center tamung" name="thamquan_tamung[]" type="text" id="thamquan_tamung'.$m.'" size="10" /></td>';
                        $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                    $html .= '</tr> '; 
                    $THAMQUAN[$m]->thamquan_name = $tqVal['id'];
                    $THAMQUAN[$m]->thamquan_id = $tqVal['id'];
                    $THAMQUAN[$m]->thamquan_giathamkhao = $tqVal['giathamkhao'];
                    $THAMQUAN[$m]->thamquan_dongia = 0;
                    $THAMQUAN[$m]->thamquan_soluong = 0;
                    $THAMQUAN[$m]->thamquan_songay = 0;
                    $THAMQUAN[$m]->thamquan_thanhtien = 0;
                    $THAMQUAN[$m]->thamquan_thuexuat = 0;
                    $THAMQUAN[$m]->thamquan_giachuathue = 0;
                    $THAMQUAN[$m]->thamquan_vat = 0;
                    $THAMQUAN[$m]->thamquan_hinhthucthanhtoan = 'ck';
                    $THAMQUAN[$m]->tq_check_tam_ung = "";
                    $THAMQUAN[$m]->thamquan_tamung = 0;
                    $m++;              
                }
                $focus->noidung->thamquan = $THAMQUAN;
                $html .= '</body>';
                $html .= '<tfoot>';
                    $html .= '<tr>';
                    $html .= '<th>TỔNG CỘNG</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" size="15" class="center" name="thamquan_tongthanhtien" id="thamquan_tongthanhtien" size="15"/></th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" size="15" class="center" name="thamquan_tongthue" id="thamquan_tongthue" size="15"/></th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '</tr>';
                $html .= '</tfoot>';
                $html .= '</table> </fieldset>';
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
            
            //$focus->save($check_notify) ;
            //$id = $focus->id;
            //$arr = array($id,$html);
            $html .= '<table><tr><td>';
            $html .="<input type='hidden' name='worksheet_id' id='worksheet_id' value='".$id."'";
            $html .= '</td></tr></table>';
            //$_SESSION['record'] = $_SESSION['return_id'] = $id;
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
                        $(this).closest("tr").find(".service_name").val($(this).closest("tr").find(".servicename option:[value="+val+"]").text());
                        $(this).closest("tr").find(".center").val(0);                        
                        $(this).closest("tr").find(".check_tam_ung").attr("checked",false);                        
                }); ';
            
            $html .= '</script>';
            echo $html;
           /* echo '<script type="text/javascript">
            $("#btnAction").hide();
            </script>';  */
        }
        else if($i== 1 && $j ==1 && $k ==1 && $l == 1 && $l == 1){
            echo '0';
        }
    } 
?>
