<?php


     $ss = new Sugar_Smarty();
     echo "\n<p>\n";
     if(!empty($focus->type)){
        $worksheet_type = $focus->type;
     }
     else{$worksheet_type = $_REQUEST['type']; }
     echo get_module_title($mod_strings['LBL_MODULE_ID'], $mod_strings['LBL_MODULE_NAME'].": ".$focus->name." :".$worksheet_type, true);
     echo "\n</p>\n";
     $ss->assign("MOD", $mod_strings);
     $ss->assign("APP", $app_strings);
     $ss->assign("ASSIGNED_USER_NAME",       $focus->assigned_user_name);
    $ss->assign("ASSIGNED_USER_ID",         $focus->assigned_user_id );
    if (isset($_REQUEST['return_module'])) $ss->assign("RETURN_MODULE", $_REQUEST['return_module']);
    if (isset($_REQUEST['return_action'])) $ss->assign("RETURN_ACTION", $_REQUEST['return_action']);
    if (isset($_REQUEST['return_id'])) $ss->assign("RETURN_ID", $_REQUEST['return_id']);

    if (empty($_REQUEST['return_id'])) {
        $ss->assign("RETURN_ACTION", 'index');
    }
     $ss->assign("ID",  $focus->id); 
     if(!empty($focus->type)) {
        $ss->assign("TYPE", $focus->type);   
     }
     else{
         $type = $_REQUEST['type'];
         $ss->assign("TYPE", $type);
     }
     $ss->assign("name", $focus->name);
     $ss->assign("TOUR_NAME", $focus->worksheet_tour_name);
     $ss->assign("TOUR_ID", $focus->worksheet_tour_id);
     $ss->assign("TOURCODE", $focus->tourcode);
     $ss->assign("DURATION", $focus->duration);
     $ss->assign("MADETOUR_NAME", $focus->groupprograorksheets_name);
     $ss->assign("MADETOUR_ID", $focus->groupprogrd737rograms_ida);
     $ss->assign("THUESUATHOA", $focus->thuesuathoa);
     $ss->assign("THUESUATHOA", $focus->thuesuathoa);
     $ss->assign("SOKHACH", $focus->sokhach);
     $ss->assign("TYLE", $focus->tyle);
     $ss->assign("VERSION", $focus->version);
     $ss->assign("NOTE", $focus->note);
     $ss->assign("LOTRINH", $focus->lotrinh);
     $ss->assign('TRANSPORT', $focus->transport); 
      
     
     
     
        if(!empty($focus->id)){
            $ss->assign("TYPE",$focus->type); 
            $html = '';
            $temp = base64_decode($focus->content);
            $noidung = json_decode($temp);
            $ss->assign('TONGCHIPHI',$noidung->tongchiphi);
            $ss->assign('TONGTHUE',$noidung->tongthue);
            $ss->assign('TIENTHEOTYLE',$noidung->tientheotyle);
            $ss->assign('HOAHONG',$noidung->hoahong);
            $ss->assign('TONGLAI',$noidung->tonglai);
            $ss->assign('GIABAN',$noidung->giaban);
            $ss->assign('GIABANTRENMOTNGUOI',$noidung->giabantrenmotnguoi);
            $ss->assign('VATDAURA',$noidung->vatdaura);
            $ss->assign('VATDAUVAO',$noidung->vatdauvao);
            $ss->assign('VATPHAIDONG',$noidung->vatphaidong);
            $ss->assign('DOANHTHU',$noidung->doanhthu);
            $ss->assign('TONGCHIPHI1',$noidung->tongchiphi1);
            $ss->assign('GIAVONTRENKHACH',$noidung->giavontrenkhach);
            $ss->assign('GIABANTRENKHACH',$noidung->giabantrenkhach);
            $ss->assign('LAIKHACH',$noidung->laikhach);
            $ss->assign('TYLESAUTHUE',$noidung->tylesauthue);
            $ss->assign('chiphikhac_tongcong', $noidung->chiphikhac_tongcong);
            $ss->assign('chiphikhac_tongthue', $noidung->chiphikhac_tongthue);
            
                $airArrtk = $focus->getAirlineTicket($focus->worksheet_tour_id); 
                 foreach($airArrtk as $tk){
                      $app_list_strings['list_airlinetiket_dom'][$tk['id']]=$tk['name'];
                      $app_list_strings['list_airlinetiket_giathamkhao_dom'][$tk['id']]=$tk['giathamkhao'];
                 }
                 $vemaybay = $noidung->vemaybay;
                 if(count($vemaybay)==0){
                     if(count($airArrtk)>0){
                        $html .= '<fieldset class="tabFrom">';
                        $html .= '<legend><h3>VÉ MÁY BAY</h3></legend>';
                        $html .= '<table width="100%" class="table_clone" id="vemaybay" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
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
                        $html .= '</thead>';
                        $html .= '<tbody>';
                        $vmb_mb = 1;
                            foreach($airArrtk as $airtk){
                                $html .= '<tr>';
                                    $html .= '<td class="dataField"><select name="vemaybay[]" id="vemaybay'.$vmb_mb.'">'.get_select_options_with_id($app_list_strings['list_airlinetiket_dom'],$airtk['id']).'</select> </td>';
                                    $html .= '<td class="dataField center"><input type="text" size="10" class="giathamkhao center" name="vemaybay_giathamkhao[]" id="vemaybay_giathamkhao'.$vmb_mb.'" value="0" /> <select style="display:none;" class="giathamkhao_an" id="vemabay_giathamkhao_an" name="vemabay_giathamkhao_an[]">'.get_select_options_with_id($app_list_strings['list_airlinetiket_giathamkhao_dom'],$airtk['id']).'</select></td>';
                                    $html .= '<td class="dataField center"><input type="text" size="10" class="dongia center" name="vemaybay_dongia[]" id="vemaybay_dongia'.$vmb_mb.'" value="0" /></td>';
                                    $html .= '<td class="dataField center"><input type="text" size="10" class="soluong center" name="vemaybay_soluong[]" id="vemaybay_soluong'.$vmb_mb.'" value="0" /></td>';
                                    $html .= '<td class="dataField center"><input type="text" size="10" class="thanhtien center" name="vemaybay_thanhtien[]" id="vemaybay_thanhtien'.$vmb_mb.'" value="0" /></td>';
                                    $html .= '<td class="dataField center"><input type="text" size="10" class="thuesuat center" name="vemaybay_thuesuat[]" id="vemaybay_thuesuat'.$vmb_mb.'" value="10" /></td>';
                                    $html .= '<td class="dataField center"><input size="10" class="giachuathue center" name="vemaybay_giachuathue[]" type="text" id="vemaybay_giachuathue'.$vmb_mb.'" /></td>';
                                    $html .= '<td class="dataField center"><input size="10" type="text" class="vat center" name="vemaybay_vat[]" id="vemaybay_vat'.$vmb_mb.'" value="0" /></td>';
                                    $html .= '<td class="dataField center"><select name="vemaybay_hinhthucthanhtoan[]" id="vemaybay_hinhthucthanhtoan'.$vmb_mb.'">'.get_select_options_with_id($app_list_strings['hinh_thuc_thanh_toan_dom'],'').' </select> </td>';
                                    $html .= '<td class="center" width="10%"><input type = "checkbox" name="vemaybay_check_tam_ung[]" class ="check_tam_ung" id="vemaybay_check_tam_ung'.$vmb_mb.'" ><input class="vemaybay_tinhtoan center tamung" name="vemaybay_tamung[]" type="text" id="vemaybay_tamung'.$vmb_mb.'" size="10" /></td>';
                                    $html .= '<td class="dataField center"><input type="button" class="btnAddRow" value="Add row"/> <input type="button" class="btnDelRow" value="Delete row"/></td>';
                                  $html .= '</tr>';
                                  $vmb_mb ++;
                            }
                        $html .= '</tbody>';
                        $html .= '<tfoot>';
                            $html .= '<tr>';
                            $html .= '<th>TỔNG CỘNG</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th><input type="text" size="15" class="center" name="vemaybay_tongthanhtien" " id="vemaybay_tongthanhtien" value="'.$noidung->vemaybay_tongthanhtien.'"></th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th><input type="text" size="15" class="center" name="vemaybay_tongthue"  id="vemaybay_tongthue" value="'.$noidung->vemaybay_tongthue.'"/></th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '</tr>';
                        $html .= '</tfoot>';
                        $html .= '</table>';
                        $html .= '</fieldset>';
                    }
                 }
                 else{
                      if(count($vemaybay)>0){
                        $html .= '<fieldset class="tabForm">';
                        $html .= '<legend><h3>VÉ MÁY BAY</h3></legend>';
                        $html .= '<table width="100%" class="table_clone" id="vemaybay" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
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
                        $html .= '</thead>';
                        $html .= '<tbody>';
                        $vmb_mb = 1;
                            foreach($vemaybay as $airtk){
                                $html .= '<tr>';
                                    $html .= '<td class="dataField"><select name="vemaybay[]" id="vemaybay'.$vmb_mb.'">'.get_select_options_with_id($app_list_strings['list_airlinetiket_dom'],$airtk->vemaybay).'</select> </td>';
                                    $html .= '<td class="dataField center"><input size="10" type="text" class="giathamkhao center" name="vemaybay_giathamkhao[]" id="vemaybay_giathamkhao'.$vmb_mb.'" value="'.$airtk->vemaybay_giathamkhao.'" /> <select style="display:none;" class="giathamkhao_an" id="vemabay_giathamkhao_an" name="vemabay_giathamkhao_an[]">'.get_select_options_with_id($app_list_strings['list_airlinetiket_giathamkhao_dom'],$airtk->vemaybay).'</select></td>';
                                    $html .= '<td class="dataField center"><input size="10" type="text" class="dongia center" name="vemaybay_dongia[]" id="vemaybay_dongia'.$vmb_mb.'" value="'.$airtk->vemaybay_dongia.'"  /></td>';
                                    $html .= '<td class="dataField center"><input size="10" type="text" class="soluong center" name="vemaybay_soluong[]" id="vemaybay_soluong'.$vmb_mb.'" value="'.$airtk->vemaybay_soluong.'"  /></td>';
                                    $html .= '<td class="dataField center"><input size="10" type="text" class="thanhtien center" name="vemaybay_thanhtien[]" id="vemaybay_thanhtien'.$vmb_mb.'" value="'.$airtk->vemaybay_thanhtien.'"  /></td>';
                                    $html .= '<td class="dataField center"><input size="10" type="text" class="thuesuat center" name="vemaybay_thuesuat[]" id="vemaybay_thuesuat'.$vmb_mb.'" value="'.$airtk->vemaybay_thuesuat.'"  /></td>';
                                    $html .= '<td class="dataField center"><input size="10" class="giachuathue center" name="vemaybay_giachuathue[]" type="text" id="vemaybay_giachuathue'.$vmb_mb.'" value="'.$airtk->vemaybay_giachuathue.'"  /></td>';
                                    $html .= '<td class="dataField center"><input size="10" type="text" class="vat center" name="vemaybay_vat[]" id="vemaybay_vat'.$vmb_mb.'" value="'.$airtk->vemaybay_vat.'" /></td>';
                                    $html .= '<td class="dataField center"><select name="vemaybay_hinhthucthanhtoan[]" id="vemaybay_hinhthucthanhtoan'.$vmb_mb.'">'.get_select_options_with_id($app_list_strings['hinh_thuc_thanh_toan_dom'],$airtk->vemaybay_hinhthucthanhtoan).' </select> </td>';
                                    if($airtk->vemaybay_check_tam_ung =='on'){
                                        $checked = 'checked';
                                    }
                                    else{$checked = '';}
                                    $html .= '<td class="center center" width="10%"><input type = "checkbox" name="vemaybay_check_tam_ung[]" class ="check_tam_ung" id="vemaybay_check_tam_ung'.$vmb_mb.'" '.$checked.'><input class="vemaybay_tinhtoan center tamung" name="vemaybay_tamung[]" type="text" id="vemaybay_tamung'.$vmb_mb.'" size="10"  value="'.$airtk->vemaybay_tamung.'" /></td>';
                                    $html .= '<td class="dataField center"><input type="button" class="btnAddRow" value="Add row"/> <input type="button" class="btnDelRow" value="Delete row"/></td>';
                                  $html .= '</tr>';
                                  $vmb_mb ++;
                            }
                        $html .= '</tbody>';
                        $html .= '<tfoot>';
                            $html .= '<tr>';
                            $html .= '<th>TỔNG CỘNG</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th><input type="text" class="center" size="15" name="vemaybay_tongthanhtien" " id="vemaybay_tongthanhtien" value="'.$noidung->vemaybay_tongthanhtien.'"></th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th><input type="text" class="center" size="15" name="vemaybay_tongthue"  id="vemaybay_tongthue" value="'.$noidung->vemaybay_tongthue.'"/></th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '</tr>';
                        $html .= '<tfoot>';
                        
                        $html .= '</table>';
                        $html .= '</fieldset>'; 
                      }
                 }
     
     
           // Loadding nhà hàng
           $NHAHANG = $noidung->nhahang;
           $countNhaHang = count($NHAHANG);
           $nhArr = array(); 
            $nhArr = $focus->getRestaurantData($focus->worksheet_tour_id);
             foreach($nhArr as $arr){
                $app_list_strings['list_restaurant_dom'][$arr['id']] = $arr['name'];
                $app_list_strings['list_restaurant_giathamkhao_dom'][$arr['id']] = $arr['giathamkhao'];
             }
             // nêu chưa có nhà hàng
           if($countNhaHang==0){
               // thêm mới nhà hàng nếu có bên tour
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
                    $i = 1;
                foreach($nhArr as $val){
                        $html .= '<tr>';
                            $html .= '<td class="notcenter"><select  class="servicename" name="nh_id[]" id="nh_id'.$i.'">'.get_select_options_with_id($app_list_strings['list_restaurant_dom'],$val['id']).' </select> <input class="service_name" type="hidden" name="nh_name[]" id="nh_name'.$i.'" value="'.$val['name'].'"/></td>';
                            $html .= '<td class="center"><input type="text" size="10" class="giathamkhao" name="nh_giathamkhao[]" id="nh_giathamkhao'.$i.'" value="'.$val['giathamkhao'].'"/><select style="display:none;" class="giathamkhao_an" id="nh_giathamkhao_an" name="nh_giathamkhao_an[]">'.get_select_options_with_id($app_list_strings['list_restaurant_giathamkhao_dom'],$val['id']).'</select> </td>';
                            $html .= '<td class="center"><input size="10" class="dongia center" name="nh_dongia[]" type="text" id="nh_dongia'.$i.'" value="0" /></td>';
                            $html .= '<td class="center"><input class="soluong center" name="nh_soluong[]" type="text" id="nh_soluong'.$i.'" size="10" value="0" /></td>';
                            $html .= '<td class="center"><input class="songay center" name="nh_songay[]" type="text" id="nh_songay'.$i.'" size="10" value="0" /></td>';
                            $html .= '<td class="center"><input class="thanhtien center" name="nh_thanhtien[]" type="text" id="nh_thanhtien'.$i.'" size="10"value="0"/></td>';
                            $html .= '<td class="center"><input class="thuesuat center" name="nh_thuexuat[]" type="text" id="nh_thuexuat'.$i.'" size="10" value="10"/></td>';
                            $html .= '<td class="center"><input class="giachuathue center" name="nh_giachuathue[]" type="text" id="nh_giachuathue'.$i.'" size="10" value="0" /></td>';
                            $html .= '<td class="center" ><input class="vat center" name="nh_vat[]" type="text" id="nh_vat'.$i.'" size="10" value="0"/></td>';
                            $html .= '<td class="center"> <select class="nh_tinhtoan center" name="nh_hinhthucthanhtoan[]" id="nh_hinhthucthanhtoan'.$i.'">'.get_select_options_with_id($app_list_strings['hinh_thuc_thanh_toan_dom'],'').' </select> </td>';
                            $html .= '<td class="center" width="10%"> <input type = "checkbox" name="nh_check_tam_ung[]" class ="check_tam_ung" id="nh_check_tam_ung'.$i.'">  <input class="nh_tinhtoan center tamung" name="nh_tamung[]" type="text" id="nh_tamung'.$i.'" size="10" value="0"/></td>';
                            $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                        $html .= '</tr> ';
                        $i++;  
                    }  
                
                $html .= '</tbody>';
                $html .= '<tfoot>';
                    $html .= '<tr>';
                    $html .= '<th>TỔNG CỘNG</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" class="center" name="nhahang_tongthanhtien" size="15" value="0" id="nhahang_tongthanhtien"></th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" class="center" name="nhahang_tongthue" value="0" size="15" id="nhahang_tongthue"</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '</tr>';
                $html .= '</tfoot>';
                $html .= '</table> </fieldset>';
               }
            } 
            else if($countNhaHang>0){
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
                    $i = 1;
                foreach($NHAHANG as $val){
                        $html .= '<tr>';
                            $html .= '<td class="notcenter"><select  class="servicename" name="nh_id[]" id="nh_id'.$i.'">'.get_select_options_with_id($app_list_strings['list_restaurant_dom'],$val->nh_id).' </select> <input class="service_name" type="hidden" name="nh_name[]" id="nh_name'.$i.'" value="'.$val->nh_name.'"/> </td>';
                            $html .= '<td class="center"><input type="text" size="10" class="giathamkhao" name="nh_giathamkhao[]" id="nh_giathamkhao'.$i.'" value="'.$val->nh_giathamkhao.'"/><select style="display:none;" class="giathamkhao_an" id="nh_giathamkhao_an" name="nh_giathamkhao_an[]">'.get_select_options_with_id($app_list_strings['list_restaurant_giathamkhao_dom'],$val->nh_name).'</select> </td>';
                            $html .= '<td class="center"><input size="10" class="dongia center" name="nh_dongia[]" type="text" id="nh_dongia'.$i.'" value="'.$val->nh_dongia.'" /></td>';
                            $html .= '<td class="center"><input class="soluong center" name="nh_soluong[]" type="text" id="nh_soluong'.$i.'" size="10" value="'.$val->nh_soluong.'" /></td>';
                            $html .= '<td class="center"><input class="songay center" name="nh_songay[]" type="text" id="nh_songay'.$i.'" size="10" value="'.$val->nh_songay.'" /></td>';
                            $html .= '<td class="center"><input class="thanhtien center" name="nh_thanhtien[]" type="text" id="nh_thanhtien'.$i.'" size="10" value="'.$val->nh_thanhtien.'"/></td>';
                            $html .= '<td class="center"><input class="thuesuat center" name="nh_thuexuat[]" type="text" id="nh_thuexuat'.$i.'" size="10" value="'.$val->nh_thuexuat.'" /></td>';
                            $html .= '<td class="center"><input class="giachuathue center" name="nh_giachuathue[]" type="text" id="nh_giachuathue'.$i.'" size="10" value="'.$val->nh_giachuathue.'" /></td>';
                            $html .= '<td class="center" ><input class="vat center" name="nh_vat[]" type="text" id="nh_vat'.$i.'" size="10" value="'.$val->nh_vat.'" /></td>';
                            $html .= '<td class="center"> <select class="nh_tinhtoan center" name="nh_hinhthucthanhtoan[]" id="nh_hinhthucthanhtoan'.$i.'">'.get_select_options_with_id($app_list_strings['hinh_thuc_thanh_toan_dom'],$val->nh_hinhthucthanhtoan).' </select> </td>';
                            if($val->nh_check_tam_ung == "on"){
                              $html .= '<td class="center" width="10%"> <input type = "checkbox" name="nh_check_tam_ung[]" class ="check_tam_ung" id="nh_check_tam_ung'.$i.'" checked="checked">  <input class="nh_tinhtoan center tamung" name="nh_tamung[]" type="text" id="nh_tamung'.$i.'" size="10" value="'.$val->nh_tamung.'"/></td>';  
                            }
                            else{
                                $html .= '<td class="center" width="10%"> <input type = "checkbox" name="nh_check_tam_ung[]" class ="check_tam_ung" id="nh_check_tam_ung'.$i.'">  <input class="nh_tinhtoan center tamung" name="nh_tamung[]" type="text" id="nh_tamung'.$i.'" size="10" value="'.$val->nh_tamung.'"/></td>';
                            }
                            $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                        $html .= '</tr> ';
                        $i++;  
                    }  
                
                $html .= '</tbody>';
                    $html .= '<tfoot>';
                        $html .= '<tr>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th><input type="text" class="center" name="nhahang_tongthanhtien" size="15" value="'.$noidung->nhahang_tongthanhtien.'" id="nhahang_tongthanhtien"></th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th><input type="text" class="center" name="nhahang_tongthue" value="'.$noidung->nhahang_tongthue.'" size="15" id="nhahang_tongthue"</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '</tr>';
                    $html .= '</tfoot>';
                $html .= '</table> </fieldset>';
            }  
                // load data phần khách sạn

                $KHACHSAN = $noidung->khachsan;
                $countks = count($KHACHSAN);
                $ksArr = array();
                $ksArr = $focus->getHotelData($focus->worksheet_tour_id);
                foreach($ksArr as $arrks){
                   $app_list_strings['list_khach_san_dom'][$arrks['id']] = $arrks['name'];
                   $app_list_strings['list_khach_san_giathamkhao_dom'][$arrks['id']] = $arrks['giathamkhao'];
                }
                if($countks==0){
                    if(count($ksArr)>0){
                        $html .= '<fieldset class="tabForm">';
                        $html .= '<legend><h3>KHÁCH SẠN</h3></legend>';
                        $html .= '<table width="100%" class="table_clone" border="1" id="khachsan" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
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
                        $j = 1;
                        foreach ($ksArr as $ksval){
                                $html .= '<tr>';
                                    $html .= '<td class="notcenter"><select class="servicename" name="ks_id[]" id="ks_id'.$j.'">'.get_select_options_with_id($app_list_strings['list_khach_san_dom'], $ksval['id']).'</select> <input class="service_name" type="hidden" name="ks_name[]" id="ks_name'.$j.'" value="'.$ksval['name'].'"/> </td>';
                                    $html .= '<td class="center"><input name="ks_ghichu[]" type="text" id="ks_ghichu'.$j.'" /></td>'; 
                                    $html .= '<td><input type="text" size="10" class="giathamkhao" name="ks_giathamkhao[]" id="ks_giathamkhao'.$j.'" value="'.$ksval['ks_giathamkhao'].'"/><select style="display:none" class="giathamkhao_an" id="ks_giathamkhao_an" name="kh_giathamkhao_an[]">'.get_select_options_with_id($app_list_strings['list_khach_san_giathamkhao_dom'],$ksval['id']).'</select></td>';
                                    $html .= '<td class="center"><input size="10" class="dongia center" name="ks_dongia[]" type="text" id="ks_dongia'.$j.'" value="0" /></td>';
                                    $html .= '<td class="center"><input class="soluong center" name="ks_soluong[]" type="text" id="ks_soluong'.$j.'" size="10" value="0"/></td>';
                                    $html .= '<td class="center"><input class="songay center" name="ks_songay[]" type="text" id="ks_songay'.$j.'" size="10" value="0"/></td>';
                                    $html .= '<td class="center"><input class="thanhtien center" name="ks_thanhtien[]" type="text" id="ks_thanhtien'.$j.'" size="10" value="0"/></td>';
                                    $html .= '<td class="center"><input class="thuesuat center" name="ks_thuexuat[]" type="text" id="ks_thuexuat'.$j.'" size="10" value="10"/></td>';
                                    $html .= '<td class="center"><input class="giachuathue center" name="ks_giachuathue[]" type="text" id="ks_giachuathue'.$j.'" size="10" value="0" /></td>';
                                    $html .= '<td class="center"><input class="vat center" name="ks_vat[]" type="text" id="ks_vat'.$j.'" size="10" value="0" /></td>';
                                    $html .= '<td class="center"><select class="ks_tinhtoan center" name="ks_hinhthucthanhtoan[]" id="ks_hinhthucthanhtoan'.$j.'">'.get_select_options_with_id($app_list_strings['hinh_thuc_thanh_toan_dom'],'').' </select></td>';
                                    $html .= '<td class="center" width="10%"> <input type = "checkbox" name="ks_check_tam_ung[]" class ="check_tam_ung" id="ks_check_tam_ung'.$j.'">  <input class="ks_tinhtoan center tamung" name="ks_tamung[]" type="text" id="ks_tamung'.$j.'" size="10" value="0"/></td>';
                                    $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                                $html .= '</tr> ';
                                $j++; 
                                 
                        }
                        $html .= '</tbody>';
                        $html .= 'tfoot>';
                            $html .= '<tr>';
                            $html .= '<th>TỔNG CỘNG</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th><input type="text" size="15" class="center" value="0" name="khachsan_tongthanhtien" id="khachsan_tongthanhtien"/></th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th><input type="text" size="15" class="center" value="0" name="khachsan_tongthue" id="khachsan_tongthue"/></th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '</tr>';
                        $html .= '/tfoot>';
                        $html .= '</table> </fieldset>'; 
                    }
                }
                
                else if($countks>0){
                $html .= '<fieldset class="tabForm">';
                $html .= '<legend><h3>KHÁCH SẠN</h3></legend>';
                $html .= '<table width="100%" class="table_clone" border="1" id="khachsan" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
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
                $j = 1;
                foreach ($KHACHSAN as $ksval){
                        $html .= '<tr>';
                            $html .= '<td class="notcenter"><select class="servicename" name="ks_id[]" id="ks_id'.$j.'">'.get_select_options_with_id($app_list_strings['list_khach_san_dom'], $ksval->ks_id).'</select> <input class="service_name" type="hidden" name="ks_name[]" id="ks_name'.$i.'" value="'.$ksval->ks_name.'"/> </td>';
                            $html .= '<td><input name="ks_ghichu[]" type="text" id="ks_ghichu'.$j.'" value="'.$ksval->ks_ghichu.'" /></td>';
                            $html .= '<td><input type="text" size="10" class="giathamkhao" name="ks_giathamkhao[]" id="ks_giathamkhao'.$j.'" value="'.$ksval->ks_giathamkhao.'"/><select style="display:none" class="giathamkhao_an" id="ks_giathamkhao_an" name="kh_giathamkhao_an[]">'.get_select_options_with_id($app_list_strings['list_khach_san_giathamkhao_dom'],$ksval->ks_name).'</select></td>';
                            $html .= '<td class="center"><input size="10" class="dongia center" name="ks_dongia[]" type="text" id="ks_dongia'.$j.'" value="'.$ksval->ks_dongia.'" /></td>';
                            $html .= '<td class="center"><input class="soluong center" name="ks_soluong[]" type="text" id="ks_soluong'.$j.'" size="10" value="'.$ksval->ks_soluong.'" /></td>';
                            $html .= '<td class="center"><input class="songay center" name="ks_songay[]" type="text" id="ks_songay'.$j.'" size="10" value="'.$ksval->ks_songay.'"/></td>';
                            $html .= '<td class="center"><input class="thanhtien center" name="ks_thanhtien[]" type="text" id="ks_thanhtien'.$j.'" size="10" value="'.$ksval->ks_thanhtien.'" /></td>';
                            $html .= '<td class="center"><input class="thuesuat center" name="ks_thuexuat[]" type="text" id="ks_thuexuat'.$j.'" size="10" value="'.$ksval->ks_thuexuat.'" /></td>';
                            $html .= '<td class="center"><input class="giachuathue center" name="ks_giachuathue[]" type="text" id="ks_giachuathue'.$j.'" size="10" value="'.$ksval->ks_giachuathue.'" /></td>';
                            $html .= '<td class="center"><input class="vat center" name="ks_vat[]" type="text" id="ks_vat'.$j.'" size="10" value="'.$ksval->ks_vat.'" /></td>';
                            $html .= '<td class="center"><select class="ks_tinhtoan center" name="ks_hinhthucthanhtoan[]" id="ks_hinhthucthanhtoan'.$j.'">'.get_select_options_with_id($app_list_strings['hinh_thuc_thanh_toan_dom'],$ksval->ks_hinhthucthanhtoan).' </select></td>';
                            if($ksval->ks_check_tam_ung=="on"){
                              $html .= '<td class="center" width="10%"> <input type = "checkbox" name="ks_check_tam_ung[]" class ="check_tam_ung" id="ks_check_tam_ung'.$j.'" checked="checked">  <input class="ks_tinhtoan center tamung" name="ks_tamung[]" type="text" id="ks_tamung'.$j.'" size="10" value="'.$ksval->ks_tamung.'"/></td>';  
                            }
                            else{
                                $html .= '<td class="center" width="10%"> <input type = "checkbox" name="ks_check_tam_ung[]" class ="check_tam_ung" id="ks_check_tam_ung'.$j.'">  <input class="ks_tinhtoan center tamung" name="ks_tamung[]" type="text" id="ks_tamung'.$j.'" size="10" value="'.$ksval->ks_tamung.'"/></td>';
                            }
                            $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                        $html .= '</tr> ';
                        $j++; 
                         
                }
                $html .= '</tbody>';
                $html .= '<tfoot>';
                    $html .= '<tr>';
                    $html .= '<th>TỔNG CỘNG</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" size="15" class="center" value="'.$noidung-> khachsan_tongthanhtien.'" name="khachsan_tongthanhtien" id="khachsan_tongthanhtien"/></th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" size="15" class="center" value="'.$noidung-> khachsan_tongthue.'" name="khachsan_tongthue" id="khachsan_tongthue"/></th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '</tr>';
                $html .= '</tfoot>';
                $html .= '</table> </fieldset>'; 
                }
                
                
                // load phần vận chuyển
                
                $vcArr = array();
                $vcArr = $focus->getTransportData($focus->worksheet_tour_id);
                foreach($vcArr as $arrvc){
                    $app_list_strings['list_vanchuyen_dom'][$arrvc['id']] = 'Xe '.$arrvc['number_plates'].' chỗ';
                    $app_list_strings['list_vanchuyengiathamkhao_dom'][$arrvc['id']] = $arrvc['giathamkhao'];
                }
                $VANCHUYEN = $noidung->vanchuyen;
                $countvc = count($VANCHUYEN);
                if($countvc==0){
                    if(count($vcArr)>0){
                        $html .= '<fieldset class="tabForm">';
                        $html .= '<legend> <h3>VẬN CHUYỂN</h3></legend>';
                        $html .= '<table width="100%" class="table_clone" id="vanchuyen" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                        $html .= '<thead>';
                        $html .= '<tr>';
                        $html .= '<th>Loại xe</th>';
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
                        $k = 1;  
                        foreach ($vcArr as $vcval){
                                  $html .= '<tr>';
                                    $html .= '<td class="notcenter"><select class="servicename" name="vanchuyen_name[]" id="vanchuyen_name'.$k.'">'.get_select_options_with_id( $app_list_strings['list_vanchuyen_dom'],$vcval['id']).'</select></td>';
                                    $html .= '<td><input type="text" size="10" class="giathamkhao" name="vanchuyen_giathamkhao[]" id="vanchuyen_giathamkhao'.$k.'" value="'.$vcval['giathamkhao'].'"/><select class="giathamkhao_an" id="vanchuyen_giathamkhao_an" name="vanchuyen_giathamkhao_an" style="display:none">'.get_select_options_with_id($app_list_strings['list_vanchuyengiathamkhao_dom'],$vcval['id']).'</select></td>';
                                    $html .= '<td class="center"><input size="10" class="dongia center" name="vanchuyen_dongia[]" type="text" id="'.$k.'" value="0" /> <select name="dongia_option[]" class="dongia_option" id="dongia_option'.$k.'">'.get_select_options_with_id($app_list_strings['vanchuyen_dongia_option'],'').'</select> </td>';
                                    $html .= '<td class="center"><input class="soluong center" name="vanchuyen_soluong[]" type="text" id="vanchuyen_soluong'.$k.'" size="10" value="0" /></td>';
                                    $html .= '<td class="center"><input class="songay center" name="vanchuyen_songay[]" type="text" id="vanchuyen_songay'.$k.'" size="10" value="0"/></td>';
                                    $html .= '<td class="center"><input class="thanhtien center" name="vanchuyen_thanhtien[]" type="text" id="vanchuyen_thanhtien'.$k.'" size="10" value="0" /></td>';
                                    $html .= '<td class="center"><input class="thuesuat center" name="vanchuyen_thuexuat[]" type="text" id="vanchuyen_thuexuat'.$k.'" size="10" value="10" /></td>';
                                    $html .= '<td class="center"><input class="giachuathue center" name="vanchuyen_giachuathue[]" type="text" id="vanchuyen_giachuathue'.$k.'" size="10"value="0"  /></td>';
                                    $html .= '<td class="center"><input class="vat center" name="vanchuyen_vat[]" type="text" id="vanchuyen_vat'.$k.'" size="10" value="0"/></td>';
                                    $html .= '<td class="center"><select name="vanchuyen_hinhthucthanhtoan[]" id="vanchuyen_hinhthucthanhtoan'.$k.'">'.get_select_options_with_id($app_list_strings['hinh_thuc_thanh_toan_dom'],'').' </select></td>';
                                    $html .= '<td class="center"><input type = "checkbox" name="vc_check_tam_ung[]" class ="check_tam_ung" id="check_tam_ung'.$k.'" > <input class="vc_tinhtoan center tamung" name="vanchuyen_tamung[]" type="text" id="vanchuyen_tamung'.$k.'" size="10" value="0" /></td>';
                                   $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>'; 
                                $html .= '</tr> ';  
                                $k++; 
                        }
                        $html .= '</tbody>';
                        $html .= '<tfoot>';
                            $html .= '<tr>';
                            $html .= '<th>TỔNG CỘNG</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th><input type="text" size="15" class="center" value="0" name="vanchuyen_tongthanhtien" id="vanchuyen_tongthanhtien"/></th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th><input type="text" size="15" class="center" value="0" name="vanchuyen_tongthue" id="vanchuyen_tongthue" /></th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '</tr>';
                        $html .= '</tfoot>';
                        
                        $html .= '</table> </fieldset>';
                    }
                }
                
                else if($countvc>0){
                    $html .= '<fieldset class="tabForm">';
                    $html .= '<legend> <h3>VẬN CHUYỂN</h3></legend>';
                    $html .= '<table width="100%" class="table_clone" id="vanchuyen" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                    $html .= '<thead>';
                    $html .= '<tr>';
                    $html .= '<th>Loại xe</th>';
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
                    $k = 1;  
                    foreach ($VANCHUYEN as $vcval){
                              $html .= '<tr>';
                                $html .= '<td class="notcenter"><select class="servicename" name="vanchuyen_name[]" id="vanchuyen_name'.$k.'">'.get_select_options_with_id( $app_list_strings['list_vanchuyen_dom'],$vcval->vanchuyen_name).'</select></td>';
                                $html .= '<td><input type="text" size="10" class="giathamkhao" name="vanchuyen_giathamkhao[]" id="vanchuyen_giathamkhao'.$k.'" value="'.$vcval->vanchuyen_giathamkhao.'"/><select class="giathamkhao_an" id="vanchuyen_giathamkhao_an" name="vanchuyen_giathamkhao_an" style="display:none">'.get_select_options_with_id($app_list_strings['list_vanchuyengiathamkhao_dom'],$vcval->vanchuyen_name).'</select></td>';
                                $html .= '<td class="center"><input size="10" class="dongia center" name="vanchuyen_dongia[]" type="text" id="'.$k.'" value="'.$vcval->vanchuyen_dongia.'" /> <select name="dongia_option[]" class="dongia_option" id="dongia_option'.$k.'">'.get_select_options_with_id($app_list_strings['vanchuyen_dongia_option'],$vcval->dongia_option).'</select> </td>';
                                $html .= '<td class="center"><input class="soluong center" name="vanchuyen_soluong[]" type="text" id="vanchuyen_soluong'.$k.'" size="10" value="'.$vcval->vanchuyen_soluong.'" /></td>';
                                $html .= '<td class="center"><input class="songay center" name="vanchuyen_songay[]" type="text" id="vanchuyen_songay'.$k.'" size="10" value="'.$vcval->vanchuyen_songay.'" /></td>';
                                $html .= '<td class="center"><input class="thanhtien center" name="vanchuyen_thanhtien[]" type="text" id="vanchuyen_thanhtien'.$k.'" size="10" value="'.$vcval->vanchuyen_thanhtien.'" /></td>';
                                $html .= '<td class="center"><input class="thuesuat center" name="vanchuyen_thuexuat[]" type="text" id="vanchuyen_thuexuat'.$k.'" size="10" value="'.$vcval->vanchuyen_thuexuat.'" /></td>';
                                $html .= '<td class="center"><input class="giachuathue center" name="vanchuyen_giachuathue[]" type="text" id="vanchuyen_giachuathue'.$k.'" size="10" value="'.$vcval->vanchuyen_giachuathue.'"  /></td>';
                                $html .= '<td class="center"><input class="vat center" name="vanchuyen_vat[]" type="text" id="vanchuyen_vat'.$k.'" size="10" value="'.$vcval->vanchuyen_vat.'" /></td>';
                                $html .= '<td class="center"><select name="vanchuyen_hinhthucthanhtoan[]" id="vanchuyen_hinhthucthanhtoan'.$k.'">'.get_select_options_with_id($app_list_strings['hinh_thuc_thanh_toan_dom'],$vcval->vanchuyen_hinhthucthanhtoan).' </select></td>';
                                if($vcval->vc_check_tam_ung == 'on'){
                                   $html .= '<td class="center"><input type = "checkbox" name="vc_check_tam_ung[]" class ="check_tam_ung" id="check_tam_ung'.$k.'" checked="checked" > <input class="vc_tinhtoan center tamung" name="vanchuyen_tamung[]" type="text" id="vanchuyen_tamung'.$k.'" size="10" value="'.$vcval->vanchuyen_tamung.'" /></td>'; 
                                }
                                else{
                                    $html .= '<td class="center"><input type = "checkbox" name="vc_check_tam_ung[]" class ="check_tam_ung" id="check_tam_ung'.$k.'" > <input class="vc_tinhtoan center tamung" name="vanchuyen_tamung[]" type="text" id="vanchuyen_tamung'.$k.'" size="10" value="'.$vcval->vanchuyen_tamung.'" /></td>';
                                }
                               $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>'; 
                            $html .= '</tr> ';  
                            $k++; 
                                
                }
                    $html .= '</tbody>';
                    $html .= '<tfoot>';
                        $html .= '<tr>';
                        $html .= '<th>TỔNG CỘNG</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th><input type="text" size="15" class="center" value="'.$noidung-> vanchuyen_tongthanhtien.'" name="vanchuyen_tongthanhtien" id="vanchuyen_tongthanhtien"/></th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th><input type="text" size="15" class="center" value="'.$noidung-> vanchuyen_tongthue.'" name="vanchuyen_tongthue" id="vanchuyen_tongthue" /></th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '</tr>';
                    $html .= '</tfoot>';
                    $html .= '</table> </fieldset>';
                }
                
                // loadding data phần dịch vụ
                $svArr = array();
                $svArr = $focus->getServiceData($focus->worksheet_tour_id);
                 foreach($svArr as $arrsv){
                     $app_list_strings['list_dichvu_dom'][$arrsv['id']] = $arrsv['name'];
                     $app_list_strings['list_dichvu_giathamkhao_dom'][$arrsv['id']] = $arrsv['giathamkhao'];
                 }
                $DICHVU = $noidung->dichvu;
                $countdv = count($DICHVU);
                if($countdv==0){
                    if(count($svArr)>0){
                        $html .= '<fieldset class="tabForm">';
                        $html .= '<legend> <h3>DỊCH VỤ</h3></legend>';
                        $html .= '<table width="100%" class="table_clone" border="1" id="dichvu"  cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
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
                        $l = 1;
                        foreach ($svArr as $dvval){
                                $html .= '<tr>';
                                    $html .= '<td class="notcenter"><select class="servicename" name="services_name[]" id="services_name'.$l.'">'.get_select_options_with_id($app_list_strings['list_dichvu_dom'],$dvval['id']).'</select> </td>';
                                    $html .= '<td><input type="text" size="10" class="giathamkhao" name="services_giathamkhao[]" id="services_giathamkhao'.$l.'" value="'.$dvval['giathamkhao'].'"/><select class="giathamkhao_an" name="service_giathamkhao_an[]" id="service_giathamkhao_an" style="display:none">'.get_select_options_with_id($app_list_strings['list_dichvu_giathamkhao_dom'],$dvval['id']).'</select> </td>';
                                    $html .= '<td class="center"><input size="10" class="dongia center" name="services_dongia[]" type="text" id="services_dongia'.$l.'" value="0"/></td>';
                                    $html .= '<td class="center"><input class="soluong center" name="services_soluong[]" type="text" id="services_soluong'.$l.'" size="10" value="0" /></td>';
                                    $html .= '<td class="center"><input class="songay center" name="services_songay[]" type="text" id="services_songay'.$l.'" size="10" value="0" /></td>';
                                    $html .= '<td class="center"><input class="thanhtien center" name="services_thanhtien[]" type="text" id="services_thanhtien'.$l.'" size="10" value="0" /></td>';
                                    $html .= '<td class="center"><input class="thuesuat center" name="services_thuexuat[]" type="text" id="services_thuexuat'.$l.'" size="10" value="10" /></td>';
                                    $html .= '<td class="center"><input class="giachuathue center" name="services_giachuathue[]" type="text" id="services_giachuathue'.$l.'" size="10" value="0" /></td>';
                                    $html .= '<td class="center"><input class="vat center" name="services_vat[]" type="text" id="services_vat'.$l.'" size="10" value="'.$dvval->services_vat.'" /></td>';
                                    $html .= '<td class="center"><select  name="services_hinhthucthanhtoan[]" id="services_hinhthucthanhtoan'.$l.'">'.get_select_options_with_id($app_list_strings['hinh_thuc_thanh_toan_dom'],'').' </select> </td>';
                                    $html .= '<td class="center" width="10%"><input type = "checkbox" name="sv_check_tam_ung[]" class ="check_tam_ung" id="sv_check_tam_ung'.$l.'" > <input class="sv_tinhtoan center tamung" name="services_tamung[]" type="text" id="services_tamung'.$l.'" size="10" value="0" /></td>';
                                    $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                                $html .= '</tr> ';
                                $l++;
                            }
                
                        $html .= '</tbody>';
                        $html .= '<tfoot>';
                            $html .= '<tr>';
                            $html .= '<th>TỔNG CỘNG</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th><input type="text" size="15" class="center" value="'.$noidung->service_tongthanhtien.'" name="service_tongthanhtien" id="service_tongthanhtien"/></th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th><input type="text" size="15" class="center" value="'.$noidung->service_tongthue.'" name="service_tongthue" id="service_tongthue"/></th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '</tr>';
                        $html .= '</tfoot>';
                        $html .= '</table> </fieldset>';
                    }
                }
                
                else if($countdv>0){
                    $html .= '<fieldset class="tabForm">';
                    $html .= '<legend> <h3>DỊCH VỤ</h3></legend>';
                    $html .= '<table width="100%" class="table_clone" border="1" id="dichvu"  cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
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
                    $l = 1;
                    foreach ($DICHVU as $dvval){
                            $html .= '<tr>';
                                $html .= '<td class="notcenter"><select class="servicename" name="services_name[]" id="services_name'.$l.'">'.get_select_options_with_id($app_list_strings['list_dichvu_dom'],$dvval->services_name).'</select> </td>';
                                $html .= '<td><input type="text" size="10" class="giathamkhao" name="services_giathamkhao[]" id="services_giathamkhao'.$l.'" value="'.$dvval->services_giathamkhao.'"/><select class="giathamkhao_an" name="service_giathamkhao_an[]" id="service_giathamkhao_an" style="display:none">'.get_select_options_with_id($app_list_strings['list_dichvu_giathamkhao_dom'],$dvval->services_name).'</select> </td>';
                                $html .= '<td class="center"><input size="10" class="dongia center" name="services_dongia[]" type="text" id="services_dongia'.$l.'" value="'.$dvval->services_dongia.'"/></td>';
                                $html .= '<td class="center"><input class="soluong center" name="services_soluong[]" type="text" id="services_soluong'.$l.'" size="10" value="'.$dvval->services_soluong.'" /></td>';
                                $html .= '<td class="center"><input class="songay center" name="services_songay[]" type="text" id="services_songay'.$l.'" size="10" value="'.$dvval->services_songay.'" /></td>';
                                $html .= '<td class="center"><input class="thanhtien center" name="services_thanhtien[]" type="text" id="services_thanhtien'.$l.'" size="10" value="'.$dvval->services_thanhtien.'" /></td>';
                                $html .= '<td class="center"><input class="thuesuat center" name="services_thuexuat[]" type="text" id="services_thuexuat'.$l.'" size="10" value="'.$dvval->services_thuexuat.'" /></td>';
                                $html .= '<td class="center"><input class="giachuathue center" name="services_giachuathue[]" type="text" id="services_giachuathue'.$l.'" size="10" value="'.$dvval->services_giachuathue.'" /></td>';
                                $html .= '<td class="center"><input class="vat center" name="services_vat[]" type="text" id="services_vat'.$l.'" size="10" value="'.$dvval->services_vat.'" /></td>';
                                $html .= '<td class="center"><select  name="services_hinhthucthanhtoan[]" id="services_hinhthucthanhtoan'.$l.'">'.get_select_options_with_id($app_list_strings['hinh_thuc_thanh_toan_dom'],$dvval->services_hinhthucthanhtoan).' </select> </td>';
                                if($dvval->sv_check_tam_ung == "on"){
                                   $html .= '<td class="center" width="10%"><input type = "checkbox" name="sv_check_tam_ung[]" class ="check_tam_ung" id="sv_check_tam_ung'.$l.'" checked="checked" > <input class="sv_tinhtoan center tamung" name="services_tamung[]" type="text" id="services_tamung'.$l.'" size="10" value="'.$dvval->services_tamung.'" /></td>'; 
                                }
                                else{
                                    $html .= '<td class="center" width="10%"><input type = "checkbox" name="sv_check_tam_ung[]" class ="check_tam_ung" id="sv_check_tam_ung'.$l.'" > <input class="sv_tinhtoan center tamung" name="services_tamung[]" type="text" id="services_tamung'.$l.'" size="10" value="'.$dvval->services_tamung.'" /></td>';
                                }
                                $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                            $html .= '</tr> ';
                            $l++;
                        }
            
                    $html .= '</tbody>';
                    $html .= '<tfoot>';
                        $html .= '<tr>';
                        $html .= '<th>TỔNG CỘNG</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th><input type="text" size="15" class="center" value="'.$noidung->service_tongthanhtien.'" name="service_tongthanhtien" id="service_tongthanhtien"/></th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th><input type="text" size="15" class="center" value="'.$noidung->service_tongthue.'" name="service_tongthue" id="service_tongthue"/></th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '</tr>';
                    $html .= '</tfoot>';
                    
                    $html .= '</table> </fieldset>';
                }
                
                // loadding phần tham quan
                $tqArr = array();
                $tqArr = $focus->getSightseeingData($focus->worksheet_tour_id);
                foreach($tqArr as $arrtq){
                    $app_list_strings['list_thamquan_dom'][$arrtq['id']]= $arrtq['name'];
                    $app_list_strings['list_thamquan_giathamkhao_dom'][$arrtq['id']]= $arrtq['giathamkhao'];
                }
                $THAMQUAN = $noidung->thamquan;
                $counttq = count($THAMQUAN);
                if($counttq == 0){
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
                        $html .= '<th>Số lần/ngày</th>';
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
                        
                        $m = 1;  
                        foreach($tqArr as $tqval){
                               $html .= '<tr>';
                                    $html .= '<td class="notcenter"><select class="servicename" name="thamquan_name[]" id="thamquan_name'.$m.'">'.get_select_options_with_id($app_list_strings['list_thamquan_dom'],$tqval['id']).'</select></td>';
                                    $html .= '<td><input type="text" size="10" class="giathamkhao" name="thamquan_giathamkhao[]" id="thamquan_giathamkhao'.$m.'" value="'.$tqval['giathamkhao'].'"/> <select class="giathamkhao_an" id="thamquan_giathamkhao_an'.$m.'" name="thamquan_giathamkhao_an[]" style="display:none">'.get_select_options_with_id($app_list_strings['list_thamquan_giathamkhao_dom'],$tqval['id']).'</select> </td>';
                                    $html .= '<td class="center"><input size="10" class="dongia center" name="thamquan_dongia[]" type="text" id="thamquan_dongia'.$m.'" value="0" /></td>';
                                    $html .= '<td class="center"><input class="soluong center" name="thamquan_soluong[]" type="text" id="thamquan_soluong'.$m.'" size="10" value="0" /></td>';
                                    $html .= '<td class="center"><input class="songay center" name="thamquan_songay[]" type="text" id="thamquan_songay'.$m.'" size="10" value="0" /></td>';
                                    $html .= '<td class="center"><input class="thanhtien center"  name="thamquan_thanhtien[]" type="text" id="thamquan_thanhtien'.$m.'" size="10" value="0" /></td>';
                                    $html .= '<td class="center"><input class="thuesuat center" name="thamquan_thuexuat[]" type="text" id="thamquan_thuexuat'.$m.'" size="10" value="10" /></td>';
                                    $html .= '<td class="center"><input class="giachuathue center" name="thamquan_giachuathue[]" type="text" id="thamquan_giachuathue'.$m.'" size="10" value="0" /></td>';
                                    $html .= '<td class="center"><input class="vat center" name="thamquan_vat[]" type="text" id="thamquan_vat'.$m.'" size="10" value="0" /></td>';
                                    $html .= '<td class="center"><select name="thamquan_hinhthucthanhtoan[]" id="thamquan_hinhthucthanhtoan'.$m.'">'.get_select_options_with_id($app_list_strings['hinh_thuc_thanh_toan_dom'],'').' </select> </td>';
                                    $html .= '<td class="center" width="10%"><input type = "checkbox" name="tq_check_tam_ung[]" class ="check_tam_ung" id="tq_check_tam_ung'.$m.'" > <input class="tq_tinhtoan center tamung" name="thamquan_tamung[]" type="text" id="thamquan_tamung'.$m.'" value="0" size="10" /></td>';
                                    $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                                    
                                $html .= '</tr> '; 
                                $m++;   
                            }
                        $html .= '</body>';
                        $html .= '<tfoot>';
                            $html .= '<tr>';
                            $html .= '<th>TỔNG CỘNG</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th><input type="text" size="15" class="center" value="0" name="thamquan_tongthanhtien" id="thamquan_tongthanhtien" size="15"/></th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th><input type="text" size="15" class="center" value="0" name="thamquan_tongthue" id="thamquan_tongthue" size="15"/></th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '</tr>';
                        $html .= '</tfoot>';
                        $html .= '</table> </fieldset>';
                    }
                }
                
                else if($counttq>0){
                $html .= '<fieldset class="tabForm">';
                $html .= '<legend> <h3>THAM QUAN</h3></legend>';
                $html .= '<table width="100%" class="table_clone" border="1" id="thamquan" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                $html .= '<th>Địa điểm tham quan</th>';
                $html .= '<th>Giá tham khảo</th>';
                $html .= '<th>Đơn giá</th>';
                $html .= '<th>Số lượng</th>';
                $html .= '<th>Số lần/ngày</th>';
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
                
                $m = 1;  
                foreach($THAMQUAN as $tqval){
                       $html .= '<tr>';
                            $html .= '<td class="notcenter"><select class="servicename" name="thamquan_name[]" id="thamquan_name'.$m.'">'.get_select_options_with_id($app_list_strings['list_thamquan_dom'],$tqval->thamquan_name).'</select></td>';
                            $html .= '<td><input type="text" size="10" class="giathamkhao" name="thamquan_giathamkhao[]" id="thamquan_giathamkhao'.$m.'" value="'.$tqval->thamquan_giathamkhao.'"/> <select class="giathamkhao_an" id="thamquan_giathamkhao_an'.$m.'" name="thamquan_giathamkhao_an[]" style="display:none">'.get_select_options_with_id($app_list_strings['list_thamquan_giathamkhao_dom'],$tqval->thamquan_name).'</select> </td>';
                            $html .= '<td class="center"><input size="10" class="dongia center" name="thamquan_dongia[]" type="text" id="thamquan_dongia'.$m.'" value="'.$tqval->thamquan_dongia.'" /></td>';
                            $html .= '<td class="center"><input class="soluong center" name="thamquan_soluong[]" type="text" id="thamquan_soluong'.$m.'" size="10" value="'.$tqval->thamquan_soluong.'" /></td>';
                            $html .= '<td class="center"><input class="songay center" name="thamquan_songay[]" type="text" id="thamquan_songay'.$m.'" size="10" value="'.$tqval->thamquan_songay.'" /></td>';
                            $html .= '<td class="center"><input class="thanhtien center"  name="thamquan_thanhtien[]" type="text" id="thamquan_thanhtien'.$m.'" size="10" value="'.$tqval->thamquan_thanhtien.'" /></td>';
                            $html .= '<td class="center"><input class="thuesuat center" name="thamquan_thuexuat[]" type="text" id="thamquan_thuexuat'.$m.'" size="10" value="'.$tqval->thamquan_thuexuat.'" /></td>';
                            $html .= '<td class="center"><input class="giachuathue center" name="thamquan_giachuathue[]" type="text" id="thamquan_giachuathue'.$m.'" size="10" value="'.$tqval->thamquan_giachuathue.'" /></td>';
                            $html .= '<td class="center"><input class="vat center" name="thamquan_vat[]" type="text" id="thamquan_vat'.$m.'" size="10" value="'.$tqval->thamquan_vat.'" /></td>';
                            $html .= '<td class="center"><select name="thamquan_hinhthucthanhtoan[]" id="thamquan_hinhthucthanhtoan'.$m.'">'.get_select_options_with_id($app_list_strings['hinh_thuc_thanh_toan_dom'],$tqval->thamquan_hinhthucthanhtoan).' </select> </td>';
                            if($tqval->tq_check_tam_ung == "on"){
                               $html .= '<td class="center" width="10%"><input type = "checkbox" name="tq_check_tam_ung[]" class ="check_tam_ung" id="tq_check_tam_ung'.$m.'" checked="checked" > <input class="tq_tinhtoan center tamung" name="thamquan_tamung[]" type="text" id="thamquan_tamung'.$m.'" value="'.$tqval->thamquan_tamung.'" size="10" /></td>'; 
                            }
                            else{
                                $html .= '<td class="center" width="10%"><input type = "checkbox" name="tq_check_tam_ung[]" class ="check_tam_ung" id="tq_check_tam_ung'.$m.'" > <input class="tq_tinhtoan center tamung" name="thamquan_tamung[]" type="text" id="thamquan_tamung'.$m.'" value="'.$tqval->thamquan_tamung.'" size="10" /></td>';
                            }
                            $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                            
                        $html .= '</tr> '; 
                        $m++;   
                    }
                $html .= '</body>';
                $html .= '<tfoot>';
                    $html .= '<tr>';
                    $html .= '<th>TỔNG CỘNG</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" size="15" class="center" value="'.$noidung-> thamquan_tongthanhtien.'" name="thamquan_tongthanhtien" id="thamquan_tongthanhtien" size="15"/></th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th><input type="text" size="15" class="center" value="'.$noidung-> thamquan_tongthue.'" name="thamquan_tongthue" id="thamquan_tongthue" size="15"/></th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '</tr>';
                $html .= '</tfoot>';
                $html .= '</table> </fieldset>';
                }
                               
                $ss->assign(HTML,$html); 
                 // ket thuc phan tham quan
             // phan chi phí khác
             $htmlchiphikhac = '';
             $chiphikhac = $noidung->chiphikhac;
             $countchiphikhac = count($chiphikhac);
             $ss->assign("COUNTCPK",$countchiphikhac);
             $cpk = 1;
             if($countchiphikhac>0){
                 foreach($chiphikhac as $chiphikhacval){
                    $htmlchiphikhac .= '<tr>';
                        $htmlchiphikhac .= '<td class="dataField"><input type="text" class="loaidichvu" name="chiphikhac_loaidichvu[]" id="chiphikhac_loaidichvu'.$cpk.'" value="'.$chiphikhacval->chiphikhac_loaidichvu.'"></td>'; 
                        $htmlchiphikhac .= '<td class="dataField"><input size="10" type="text" class="giathamkhao center" name="chiphikhac_giathamkhao[]" id="chiphikhac_giathamkhao'.$cpk.'" value="'.$chiphikhacval->chiphikhac_giathamkhao.'"></td> ';
                        $htmlchiphikhac .= '<td class="dataField"><input size="10" type="text" class="soluong center" name="chiphikhac_soluong[]" id="chiphikhac_soluong'.$cpk.'" value="'.$chiphikhacval->chiphikhac_soluong.'"></td>'; 
                        $htmlchiphikhac .= '<td class="dataField"><input size="10" type="text" class="dongia center" name="chiphikhac_dongia[]" id="chiphikhac_dongia'.$cpk.'" value="'.$chiphikhacval->chiphikhac_dongia.'"></td>'; 
                        $htmlchiphikhac .= '<td class="dataField"><input size="10" type="text" class="foc center" name="chiphikhac_foc[]" id="chiphikhac_foc'.$cpk.'" value="'.$chiphikhacval->chiphikhac_foc.'" ></td>'; 
                        $htmlchiphikhac .= '<td class="dataField"><input size="10" type="text" class="thanhtien center" name="chiphikhac_thanhtien[]" id="chiphikhac_thanhtien'.$cpk.'" value="'.$chiphikhacval->chiphikhac_thanhtien.'" ></td>'; 
                        $htmlchiphikhac .= '<td class="dataField"><input size="10" type="text" class="thuesuat center" name="chiphikhac_thuesuat[]" id="chiphikhac_thuesuat'.$cpk.'" value="'.$chiphikhacval->chiphikhac_thuesuat.'" ></td>'; 
                        $htmlchiphikhac .= '<td class="dataField"><input size="10" type="text" class="giachuathue center" name="chiphikhac_giachuathue[]" id="chiphikhac_giachuathue" value="'.$chiphikhacval->chiphikhac_giachuathue.'"></td>';
                        $htmlchiphikhac .= '<td class="dataField"><input size="10" type="text" class="vat center" name="chiphikhac_vat[]" id="chiphikhac_vat'.$cpk.'" value="'.$chiphikhacval->chiphikhac_vat.'"></td>'; 
                        $htmlchiphikhac .= '<td class="center"><select name="chiphikhac_hinhthucthanhtoan[]" id="chiphikhac_hinhthucthanhtoan'.$cpk.'">'.get_select_options_with_id($app_list_strings['hinh_thuc_thanh_toan_dom'],$chiphikhacval->chiphikhac_hinhthucthanhtoan).'</select> </td>';
                         if($tqval->cpk_check_tam_ung == "on"){
                             $checked = 'checked';
                         }
                         else{ $checked = ''; }
                        $htmlchiphikhac .= '<td class="center"><input type = "checkbox" name="cpk_check_tam_ung[]" class ="check_tam_ung" id="cpk_check_tam_ung'.$cpk.'" '.$checked.' > <input class="center tamung" name="chiphikhac_tamung[]" type="text" id="chiphikhac_tamung'.$cpk.'" size="10" value="'.$chiphikhacval->chiphikhac_tamung.'"/></td>';
                        $htmlchiphikhac .= '<td class="dataField center"><input type="button" class="btnAddRow" value="Add Row"> <input type="button" class="btnDelRow" value="Delete Row"></td>'; 
                    $htmlchiphikhac .= '</tr>'; 
                    $cpk ++;
                 }
             }
             $ss->assign('CHIPHIKHACHTML',$htmlchiphikhac);
        }
     $ss->assign('CHIPHIKHACHHINHTHUCTHANHTOAN',get_select_options_with_id($app_list_strings['hinh_thuc_thanh_toan_dom'],$chiphikhacval->chiphikhac_hinhthucthanhtoan));

    $ss->display("modules/Worksheets/tpls/dos.tpl");  
    unset($_SESSION['record']) ;
    unset($_SESSION['return_id']) ; 
?>
