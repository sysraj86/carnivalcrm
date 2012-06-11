<?php
require_once("include/Sugar_Smarty.php");
$ss = new Sugar_Smarty();
echo "\n<p>\n";
if (!empty($focus->type)) {
    $worksheet_type = $focus->type;
}
else {
    $worksheet_type = $_REQUEST['type'];
}
echo get_module_title($mod_strings['LBL_MODULE_ID'], $mod_strings['LBL_MODULE_NAME'] . ": " . $focus->name . " :" . $worksheet_type, true);
echo "\n</p>\n";
$ss->assign("MOD", $mod_strings);
$ss->assign("APP", $app_strings);
$ss->assign("ASSIGNED_USER_NAME", $focus->assigned_user_name);
$ss->assign("ASSIGNED_USER_ID", $focus->assigned_user_id);

if (isset($_REQUEST['return_module'])) $ss->assign("RETURN_MODULE", $_REQUEST['return_module']);
    if (isset($_REQUEST['return_action'])) $ss->assign("RETURN_ACTION", $_REQUEST['return_action']);
    if (isset($_REQUEST['return_id'])) $ss->assign("RETURN_ID", $_REQUEST['return_id']);

    if (empty($_REQUEST['return_id'])) {
        $ss->assign("RETURN_ACTION", 'index');
    }

$ss->assign("ID", $focus->id);
if (!empty($focus->type)) {
    $ss->assign("TYPE", $focus->type);
}
else {
    $type = $_REQUEST['type'];
    $ss->assign("TYPE", $type);
}
$temp = base64_decode($focus->content);
$noidung = json_decode($temp);
$ss->assign("TOUR_NAME", $focus->worksheet_tour_name);
$ss->assign("TOUR_ID", $focus->worksheet_tour_id);
$ss->assign("TOURCODE", $focus->tourcode);
$ss->assign("DURATION", $focus->duration);
$ss->assign("MADETOUR_NAME", $focus->groupprograorksheets_name);
$ss->assign("MADETOUR_ID", $focus->groupprogrd737rograms_ida);
$ss->assign("THUESUATHOA", $focus->thuesuathoa);
$ss->assign("SOKHACH", $focus->sokhach);
$ss->assign("TYLE", $focus->tyle);
$ss->assign("VERSION", $focus->version);
$ss->assign("NOTE", $focus->note);
$ss->assign("LOTRINH", $focus->lotrinh);
$ss->assign('TRANSPORT', $focus->transport);
$ss->assign('huongdanvien', $noidung->huongdanvien);
$ss->assign('ngaybatdau', $noidung->ngaybatdau);
$ss->assign('ngayketthuc', $noidung->ngayketthuc);
$ss->assign('chiphikhac_tongcong', $noidung->chiphikhac_tongcong);
$ss->assign('chiphikhac_tongthue', $noidung->chiphikhac_tongthue);


$ss->assign('sl_khach_nl_1', $noidung->sl_khach_nl_1);
$ss->assign('dg_khach_nl_1', $noidung->dg_khach_nl_1);
$ss->assign('foc_khach_nl_1', $noidung->foc_khach_nl_1);
$ss->assign('tt_khach_nl_1', $noidung->tt_khach_nl_1);
$ss->assign('ts_khach_nl_1', $noidung->ts_khach_nl_1);
$ss->assign('thue_khach_nl_1', $noidung->thue_khach_nl_1);

// giá trẻ em
$ss->assign('thue_khach_nl_1', $noidung->thue_khach_nl_1);
$ss->assign('sl_treem_1', $noidung->sl_treem_1);
$ss->assign('dg_treem_1', $noidung->dg_treem_1);
$ss->assign('foc_treem_1', $noidung->foc_treem_1);
$ss->assign('tt_treem_1', $noidung->tt_treem_1);
$ss->assign('ts_treem_1', $noidung->ts_treem_1);
$ss->assign('thue_treem_1', $noidung->thue_treem_1);

// phụ phòng đơn

$ss->assign('sl_phuthuphongdon_1', $noidung->sl_phuthuphongdon_1);
$ss->assign('dg_phuthuphongdon_1', $noidung->dg_phuthuphongdon_1);
$ss->assign('foc_phuthuphongdon_1', $noidung->foc_phuthuphongdon_1);
$ss->assign('tt_phuthuphongdon_1', $noidung->tt_phuthuphongdon_1);
$ss->assign('ts_phuthuphongdon_1', $noidung->ts_phuthuphongdon_1);
$ss->assign('thue_phuthuphongdon_1', $noidung->thue_phuthuphongdon_1);

// phụ thu khác
$ss->assign('sl_phuthukhac_1', $noidung->sl_phuthukhac_1);
$ss->assign('dg_phuthukhac_1', $noidung->dg_phuthukhac_1);
$ss->assign('foc_phuthukhac_1', $noidung->foc_phuthukhac_1);
$ss->assign('tt_phuthukhac_1', $noidung->tt_phuthukhac_1);
$ss->assign('ts_phuthukhac_1', $noidung->ts_phuthukhac_1);
$ss->assign('thue_phuthukhac_1', $noidung->thue_phuthukhac_1);

// Giá bán không có VMB/Tàu hỏa
// giá bán người lớn
$ss->assign('sl_khach_nl_2', $noidung->sl_khach_nl_2);
$ss->assign('dg_khach_nl_2', $noidung->dg_khach_nl_2);
$ss->assign('foc_khach_nl_2', $noidung->foc_khach_nl_2);
$ss->assign('tt_khach_nl_2', $noidung->tt_khach_nl_2);
$ss->assign('ts_khach_nl_2', $noidung->ts_khach_nl_2);
$ss->assign('thue_khach_nl_2', $noidung->thue_khach_nl_2);

// giá bán trẻ em
$ss->assign('sl_treem_2', $noidung->sl_treem_2);
$ss->assign('dg_treem_2', $noidung->dg_treem_2);
$ss->assign('foc_treem_2', $noidung->foc_treem_2);
$ss->assign('tt_treem_2', $noidung->tt_treem_2);
$ss->assign('ts_treem_2', $noidung->ts_treem_2);
$ss->assign('thue_treem_2', $noidung->thue_treem_2);

// phụ thu phòng đơn
$ss->assign('sl_phuthuphongdon_2', $noidung->sl_phuthuphongdon_2);
$ss->assign('dg_phuthuphongdon_2', $noidung->dg_phuthuphongdon_2);
$ss->assign('foc_phuthuphongdon_2', $noidung->foc_phuthuphongdon_2);
$ss->assign('tt_phuthuphongdon_2', $noidung->tt_phuthuphongdon_2);
$ss->assign('ts_phuthuphongdon_2', $noidung->ts_phuthuphongdon_2);
$ss->assign('thue_phuthuphongdon_2', $noidung->thue_phuthuphongdon_2);

// phụ thu khác
$ss->assign('sl_phuthukhac_2', $noidung->sl_phuthukhac_2);
$ss->assign('dg_phuthukhac_2', $noidung->dg_phuthukhac_2);
$ss->assign('foc_phuthukhac_2', $noidung->foc_phuthukhac_2);
$ss->assign('tt_phuthukhac_2', $noidung->tt_phuthukhac_2);
$ss->assign('ts_phuthukhac_2', $noidung->ts_phuthukhac_2);
$ss->assign('thue_phuthukhac_2', $noidung->thue_phuthukhac_2);

// chế độ miễn phí FOC
$ss->assign('foc_option', $noidung->foc_option);
$ss->assign('sl_foc_16', $noidung->sl_foc_16);
$ss->assign('dg_foc_16', $noidung->dg_foc_16);
$ss->assign('foc_foc_16', $noidung->foc_foc_16);
$ss->assign('tt_foc_16', $noidung->tt_foc_16);
$ss->assign('ts_foc_16', $noidung->ts_foc_16);
$ss->assign('thue_foc_16', $noidung->thue_foc_16);


$ss->assign('VATDAURA', $noidung->vatdaura);
$ss->assign('VATDAUVAO', $noidung->vatdauvao);
$ss->assign('VATPHAIDONG', $noidung->vatphaidong);
$ss->assign('DOANHTHU', $noidung->doanhthu);
$ss->assign('TONGCHIPHI', $noidung->tongchiphi);
$ss->assign('tongthue', $noidung->tongthue);
$ss->assign('TONGCHIPHI1', $noidung->tongchiphi1);
$ss->assign('GIAVONTRENKHACH', $noidung->giavontrenkhach);
$ss->assign('GIABANTRENKHACH', $noidung->giabantrenkhach);
$ss->assign('LAIKHACH', $noidung->laikhach);
$ss->assign('tylesauthuevat', $noidung->tylesauthuevat);
$ss->assign('TONGLAI', $noidung->tonglai);
$ss->assign('TONGLAI', $noidung->tonglai);
$ss->assign('thuethunhapdn', $noidung->thuethunhapdn);
$ss->assign('lairongnettprofit', $noidung->lairongnettprofit);
$ss->assign('tylesauthuetndn', $noidung->tylesauthuetndn);


$html = '';
if (!empty($focus->id)) {
    // loading vé máy bay
    $airArrtk = array();
    $airArrtk = $focus->getAirlineTicket($focus->worksheet_tour_id);
    $airArrMB = array();
    $airArrMT = array();
    $airArrMN = array();
    foreach ($airArrtk as $tk) {
        if ($tk['area'] == "mienbac") {
            $app_list_strings['list_airlinetiket_dom_north'][$tk['id']] = $tk['name'];
            $airArrMB[] = array('id' => $tk['id'], 'name' => $tk['name'], 'area' => $tk['area']);
        }
        if ($tk['area'] == "mientrung") {
            $app_list_strings['list_airlinetiket_dom_middle'][$tk['id']] = $tk['name'];
            $airArrMT[] = array('id' => $tk['id'], 'name' => $tk['name'], 'area' => $tk['area']);
        }
        if ($tk['area'] == "miennam") {
            $app_list_strings['list_airlinetiket_dom_south'][$tk['id']] = $tk['name'];
            $airArrMN[] = array('id' => $tk['id'], 'name' => $tk['name'], 'area' => $tk['area']);
        }
    }
    
    $html .= '<fieldset>';
    $html .= '<legend><h3>VÉ MÁY BAY</h3></legend>';
    $html .= '<div>';
    $html .= '<p>&nbsp; </p>';
    $html .= '<a class="showdiv"><img src="custom/themes/default/images/btndown.png" width="30" height="30" title="phóng to"/></a> &nbsp; <a class="hidediv"><img src="custom/themes/default/images/btnup.png" width="30" height="30" title="thu nhỏ"/></a>' ;
    $html .= '<div class="displayandshow">';
    $html .= '<table width="100%" class="tabForm" id="vemaybay" border="0" cellspacing="0" cellpadding="0">';
    $html .= '<tfoot>';
    $html .= '<tr>';
    $html .= '<th>Tổng cộng</th>';
    $html .= '<th>&nbsp;</th>';
    $html .= '<th>&nbsp;</th>';
    $html .= '<th>&nbsp;</th>';
    $html .= '<th><input type="text" class="center" name="vemaybay_tongthanhtien" " id="vemaybay_tongthanhtien" value="' . $noidung->vemaybay_tongthanhtien . '"></th>';
    $html .= '<th>&nbsp;</th>';
    $html .= '<th><input type="text" class="center" name="vemaybay_tongthue"  id="vemaybay_tongthue" value="' . $noidung->vemaybay_tongthue . '"/></th>';
    $html .= '<th>&nbsp;</th>';
    $html .= '</tr>';
    $html .= '</tfoot>';
    $html .= '<tbody>';
    // chuyến bay tại miền bắc
    $vmb_mienbac = $noidung->vmb_mienbac;
    if (count($vmb_mienbac) == 0) {
        if (count($airArrMB) > 0) {
            $html .= '<tr>';
            $html .= '<td colspan="7">';
            $html .= '<fieldset><legend><h3>MIỀN BẮC</h3></legend>';
            $html .= '<table width="100%" class="table_clone" id="vemaybay_mb" border="0" cellspacing="0" cellpadding="0">';
            $html .= '<thead>';
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
            $html .= '</thead>'; 
            $html .= '<tfoot>'; 
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
            $html .= '</tfoot>';
            $focus->noidung->vemaybay_mb_tongthanhtien = 0;
            $focus->noidung->vemaybay_mb_tongthue = 0;
            
            $html .= '<tbody>';
            $vmb_mb = 1;
            foreach ($airArrMB as $airtk) {
                $html .= '<tr>';
                $html .= '<td class="dataField"><select name="vemaybay_mb[]" id="vemaybay_mb' . $vmb_mb . '">' . get_select_options_with_id($app_list_strings['list_airlinetiket_dom_north'], $airtk['id']) . '</select> </td>';
                $html .= '<td class="dataField"><input type="text" class="dongia center" name="vemaybay_mb_dongia[]" id="vemaybay_mb_dongia' . $vmb_mb . '" value="0" /></td>';
                $html .= '<td class="dataField"><input type="text" class="soluong vemaybay_soluong center highlight" name="vemaybay_mb_soluong[]" id="vemaybay_mb_soluong' . $vmb_mb . '" value="'.$focus->sokhach+$focus->thuesuathoa.'" /></td>';
                $html .= '<td class="dataField"><input type="text" class="foc center" name="vemaybay_mb_foc[]" id="vemaybay_mb_foc' . $vmb_mb . '" value="0" /></td>';
                $html .= '<td class="dataField"><input type="text" class="thanhtien center" name="vemaybay_mb_thanhtien[]" id="vemaybay_mb_thanhtien' . $vmb_mb . '" value="0" /></td>';
                $html .= '<td class="dataField"><input type="text" class="thuesuat center" name="vemaybay_mb_thuesuat[]" id="vemaybay_mb_thuesuat' . $vmb_mb . '" value="10" /></td>';
                $html .= '<td class="dataField"><input type="text" class="vat center" name="vemaybay_mb_vat[]" id="vemaybay_mb_vat' . $vmb_mb . '" value="0" /></td>';
                $html .= '<td class="dataField"><input type="button" class="btnAddRow" value="Add row"/> <input type="button" class="btnDelRow" value="Delete row"/></td>';
                $html .= '</tr>';
                $vmb_mb++;
            }
            $html .= '</tbody>';
            $html .= '</table>';
            $html .= '</fieldset>';
            $html .= '</td>';
            $html .= '</tr>';
        }
    }
    if (count($vmb_mienbac) > 0) {
        $html .= '<tr>';
        $html .= '<td colspan="7">';
        $html .= '<fieldset><legend><h3>MIỀN BẮC</h3></legend>';
        $html .= '<table width="100%" class="table_clone" id="vemaybay_mb" border="0" cellspacing="0" cellpadding="0">';
        $html .= '<thead>';
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
        $html .= '</thead>';
        $html .= '<tfoot>';
        $html .= '<tr>';
        $html .= '<th>&nbsp;</th>';
        $html .= '<th>&nbsp;</th>';
        $html .= '<th>&nbsp;</th>';
        $html .= '<th>&nbsp;</th>';
        $html .= '<th><input type="text" class="center" name="vemaybay_mb_tongthanhtien" id="vemaybay_mb_tongthanhtien" value="' . $noidung->vemaybay_mb_tongthanhtien . '"/></th>';
        $html .= '<th>&nbsp;</th>';
        $html .= '<th><input type="text" class="center" name="vemaybay_mb_tongthue"  id="vemaybay_mb_tongthue" value="' . $noidung->vemaybay_mb_tongthue . '"/></th>';
        $html .= '<th>&nbsp;</th>';
        $html .= '</tr>';
        $html .= '</tfoot>';
        
        
        $html .= '<tbody>';
        $vmb_mb = 1;
        foreach ($vmb_mienbac as $airtkmb) {
            $html .= '<tr>';
            $html .= '<td class="dataField"><select name="vemaybay_mb[]" id="vemaybay_mb' . $vmb_mb . '">' . get_select_options_with_id($app_list_strings['list_airlinetiket_dom_north'], $airtkmb->vemaybay_mb) . '</select> </td>';
            $html .= '<td class="dataField"><input type="text" class="center dongia" name="vemaybay_mb_dongia[]" id="vemaybay_mb_dongia' . $vmb_mb . '" value="' . $airtkmb->vemaybay_mb_dongia . '" /></td>';
            $html .= '<td class="dataField"><input type="text" class="center vemaybay_soluong soluong highlight" name="vemaybay_mb_soluong[]" id="vemaybay_mb_soluong' . $vmb_mb . '" value="' . $airtkmb->vemaybay_mb_soluong . '" /></td>';
            $html .= '<td class="dataField"><input type="text" class="center foc" name="vemaybay_mb_foc[]" id="vemaybay_mb_foc' . $vmb_mb . '" value="' . $airtkmb->vemaybay_mb_foc . '" /></td>';
            $html .= '<td class="dataField"><input type="text" class="center thanhtien" name="vemaybay_mb_thanhtien[]" id="vemaybay_mb_thanhtien' . $vmb_mb . '" value="' . $airtkmb->vemaybay_mb_thanhtien . '" /></td>';
            $html .= '<td class="dataField"><input type="text" class="center thuesuat" name="vemaybay_mb_thuesuat[]" id="vemaybay_mb_thuesuat' . $vmb_mb . '" value="' . $airtkmb->vemaybay_mb_thuesuat . '" /></td>';
            $html .= '<td class="dataField"><input type="text" class="center vat" name="vemaybay_mb_vat[]" id="vemaybay_mb_vat' . $vmb_mb . '" value="' . $airtkmb->vemaybay_mb_vat . '" /></td>';
            $html .= '<td class="dataField"><input type="button" class="btnAddRow" value="Add row"/> <input type="button" class="btnDelRow" value="Delete row"/></td>';
            $html .= '</tr>';
            $vmb_mb++;
        }
        $html .= '</tbody>';
        $html .= '</table>';
        $html .= '</fieldset>';
        $html .= '</td>';
        $html .= '</tr>';
    }


    // chuyến bay tại miền trung
    $vmb_mientrung = $noidung->vmb_mientrung;
    if (count($vmb_mientrung) == 0) {
        if (count($airArrMT) > 0) {
            $html .= '<tr>';
            $html .= '<td colspan="7">';
            $html .= '<fieldset><legend><h3>MIỀN TRUNG</h3></legend>';
            $html .= '<table width="100%" class="table_clone" id="vemaybay_mt" border="0" cellspacing="0" cellpadding="0">';
            $html .= '<thead>';
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
            $html .= '</thead>'; 
            $html .= '<tfoot>'; 
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
            $html .= '</tfoot>';
            $html .= '<tbody>';
            $vmb_mt = 1;
            foreach ($airArrtk as $airtk) {
                $html .= '<tr>';
                $html .= '<td class="dataField"><select name="vemaybay_mt[]" id="vemaybay_mt' . $vmb_mt . '">' . get_select_options_with_id($app_list_strings['list_airlinetiket_dom_middle'], $airtk['id']) . '</select> </td>';
                $html .= '<td class="dataField"><input type="text" class="dongia center" name="vemaybay_mt_dongia[]" id="vemaybay_mt_dongia'.$vmb_mt.'" value="0" /></td>';
                $html .= '<td class="dataField"><input type="text" class="soluong vemaybay_soluong center highlight" name="vemaybay_mt_soluong[]" id="vemaybay_mt_soluong'.$vmb_mt .'" value="'.$focus->sokhach+$focus->thuesuathoa.'" /></td>';
                $html .= '<td class="dataField"><input type="text" class="foc center" name="vemaybay_mt_foc[]" id="vemaybay_mt_foc' . $vmb_mt . '" value="0" /></td>';
                $html .= '<td class="dataField"><input type="text" class="thanhtien center" name="vemaybay_mt_thanhtien[]" id="vemaybay_mt_thanhtien' . $vmb_mt . '" value="0" /></td>';
                $html .= '<td class="dataField"><input type="text" class="thuesuat center" name="vemaybay_mt_thuesuat[]" id="vemaybay_mt_thuesuat' . $vmb_mt . '" value="10" /></td>';
                $html .= '<td class="dataField"><input type="text" class="vat center" name="vemaybay_mt_vat[]" id="vemaybay_mt_vat' . $vmb_mt . '" value="0" /></td>';
                $html .= '<td class="dataField"><input type="button" class="btnAddRow" value="Add row"/> <input type="button" class="btnDelRow" value="Delete row"/></td>';
                $html .= '</tr>';
                $vmb_mt++;
            }
            $html .= '</tbody>';
            $html .= '</table>';
            $html .= '</fieldset>';
            $html .= '</td>';
            $html .= '</tr>';
        }
    }
    if (count($vmb_mientrung) > 0) {
        $html .= '<tr>';
        $html .= '<td colspan="7">';
        $html .= '<fieldset><legend><h3>MIỀN TRUNG</h3></legend>';
        $html .= '<table width="100%" class="table_clone" id="vemaybay_mt" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
        $html .= '<thead>';
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
        $html .= '</thead>'; 
        $html .= '<tfoot>'; 
        $html .= '<tr>';
        $html .= '<th>&nbsp;</th>';
        $html .= '<th>&nbsp;</th>';
        $html .= '<th>&nbsp;</th>';
        $html .= '<th>&nbsp;</th>';
        $html .= '<th><input type="text" class="center" name="vemaybay_mt_tongthanhtien" id="vemaybay_mt_tongthanhtien" value="' . $noidung->vemaybay_mt_tongthanhtien . '"/></th>';
        $html .= '<th>&nbsp;</th>';
        $html .= '<th><input type="text" class="center" name="vemaybay_mt_tongthue"  id="vemaybay_mt_tongthue" value="' . $noidung->vemaybay_mt_tongthue . '"/></th>';
        $html .= '<th>&nbsp;</th>';
        $html .= '</tr>';
        $html .= '</tfoot>';
        $html .= '<tbody>';
        $vmb_mt = 1;
        foreach ($vmb_mientrung as $airtkmt) {
            $html .= '<tr>';
            $html .= '<td class="dataField"><select name="vemaybay_mt[]" id="vemaybay_mt' . $vmb_mt . '">' . get_select_options_with_id($app_list_strings['list_airlinetiket_dom_middle'], $airtkmt->vemaybay_mt) . '</select> </td>';
            $html .= '<td class="dataField"><input type="text" class="center dongia" name="vemaybay_mt_dongia[]" id="vemaybay_mt_dongia'.$vmb_mt .'" value="'.$airtkmt->vemaybay_mt_dongia.'" /></td>';
            $html .= '<td class="dataField"><input type="text" class="center vemaybay_soluong soluong highlight" name="vemaybay_mt_soluong[]" id="vemaybay_mt_soluong' . $vmb_mt . '" value="' . $airtkmt->vemaybay_mt_soluong . '" /></td>';
            $html .= '<td class="dataField"><input type="text" class="center foc" name="vemaybay_mt_foc[]" id="vemaybay_mt_foc' . $vmb_mt . '" value="' . $airtkmt->vemaybay_mt_foc . '" /></td>';
            $html .= '<td class="dataField"><input type="text" class="center thanhtien" name="vemaybay_mt_thanhtien[]" id="vemaybay_mt_thanhtien' . $vmb_mt . '" value="' . $airtkmt->vemaybay_mt_thanhtien . '" /></td>';
            $html .= '<td class="dataField"><input type="text" class="center thuesuat" name="vemaybay_mt_thuesuat[]" id="vemaybay_mt_thuesuat' . $vmb_mt . '" value="' . $airtkmt->vemaybay_mt_thuesuat . '" /></td>';
            $html .= '<td class="dataField"><input type="text" class="center vat" name="vemaybay_mt_vat[]" id="vemaybay_mt_vat' . $vmb_mt . '" value="' . $airtkmt->vemaybay_mt_vat . '" /></td>';
            $html .= '<td class="dataField"><input type="button" class="btnAddRow" value="Add row"/> <input type="button" class="btnDelRow" value="Delete row"/></td>';
            $html .= '</tr>';
            $vmb_mt++;
        }
        $html .= '</tbody>';
        $html .= '</table>';
        $html .= '</fieldset>';
        $html .= '</td>';
        $html .= '</tr>';
    }
    // chuyến bay tại miền nam

    $vmb_miennam = $noidung->vmb_miennam;
    if (count($vmb_miennam) == 0) {
        if (count($airArrMN) > 0) {
            $html .= '<tr>';
            $html .= '<td colspan="7">';
            $html .= '<fieldset><legend><h3>MIỀN NAM</h3></legend>';
            $html .= '<table width="100%" class="table_clone" id="vemaybay_mn" border="0" cellspacing="0" cellpadding="0">';
            $html .= '<thead>';
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
            $html .= '</thead>';
            $html .= '<tfoot>';
            $html .= '<tr>';
            $html .= '<th>&nbsp;</th>';
            $html .= '<th>&nbsp;</th>';
            $html .= '<th>&nbsp;</th>';
            $html .= '<th>&nbsp;</th>';
            $html .= '<th><input type="text" class="center" name="vemaybay_mn_tongthanhtien" id="vemaybay_mn_tongthanhtien"></th>';
            $html .= '<th>&nbsp;</th>';
            $html .= '<th><input type="text" class="center" name="vemaybay_mn_tongthue"  id="vemaybay_mn_tongthue"</th>';
            $html .= '<th>&nbsp;</th>';
            $html .= '</tr>';
            $html .= '</tfoot>';
            $html .= '<tbody>';
            $vmb_mn = 1;
            foreach ($airArrMN as $airtk) {
                $html .= '<tr>';
                $html .= '<td class="dataField"><select name="vemaybay_mn[]" id="vemaybay_mn' . $vmb_mn . '">' . get_select_options_with_id($app_list_strings['list_airlinetiket_dom_south'], $airtk['id']) . '</select> </td>';
                $html .= '<td class="dataField"><input type="text" class="dongia center" name="vemaybay_mn_dongia[]" id="vemaybay_mn_dongia' . $vmb_mn . '" value="0" /></td>';
                $html .= '<td class="dataField"><input type="text" class="soluong vemaybay_soluong center highlight" name="vemaybay_mn_soluong[]" id="vemaybay_mn_soluong'.$vmb_mn .'" value="'.$focus->sokhach+$focus->thuesuathoa.'" /></td>';
                $html .= '<td class="dataField"><input type="text" class="foc center" name="vemaybay_mn_foc[]" id="vemaybay_mn_foc' . $vmb_mn . '" value="0" /></td>';
                $html .= '<td class="dataField"><input type="text" class="thanhtien center" name="vemaybay_mn_thanhtien[]" id="vemaybay_mn_thanhtien' . $vmb_mn . '" value="0" /></td>';
                $html .= '<td class="dataField"><input type="text" class="thuesuat center" name="vemaybay_mn_thuesuat[]" id="vemaybay_mn_thuesuat' . $vmb_mn . '" value="10" /></td>';
                $html .= '<td class="dataField"><input type="text" class="vat center" name="vemaybay_mn_vat[]" id="vemaybay_mn_vat' . $vmb_mn . '" value="0" /></td>';
                $html .= '<td class="dataField"><input type="button" class="btnAddRow" value="Add row"/> <input type="button" class="btnDelRow" value="Delete row"/></td>';
                $html .= '</tr>';
                $vmb_mn++;
            }
            $focus->noidung->vmb_miennam = $VMB_MN;
            $html .= '</tbody>';
            $html .= '</table>';
            $html .= '</fieldset>';
            $html .= '</td>';
            $html .= '</tr>';
        }
    }
    if (count($vmb_miennam) > 0) {
        $html .= '<tr>';
        $html .= '<td colspan="7">';
        $html .= '<fieldset><legend><h3>MIỀN NAM</h3></legend>';
        $html .= '<table width="100%" class="table_clone" id="vemaybay_mn" border="0" cellspacing="0" cellpadding="0">';
        $html .= '<thead>';
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
        $html .= '</thead>';
        $html .= '<tfoot>';
        $html .= '<tr>';
        $html .= '<th>&nbsp;</th>';
        $html .= '<th>&nbsp;</th>';
        $html .= '<th>&nbsp;</th>';
        $html .= '<th>&nbsp;</th>';
        $html .= '<th><input type="text" class="center" name="vemaybay_mn_tongthanhtien" id="vemaybay_mn_tongthanhtien" value="' . $noidung->vemaybay_mn_tongthanhtien . '"></th>';
        $html .= '<th>&nbsp;</th>';
        $html .= '<th><input type="text" class="center" name="vemaybay_mn_tongthue"  id="vemaybay_mn_tongthue" value="' . $noidung->vemaybay_mn_tongthue . '"/></th>';
        $html .= '<th>&nbsp;</th>';
        $html .= '</tr>';
        $html .= '</tfoot>';
        $html .= '<tbody>';
        $vmb_mn = 1;
        foreach ($vmb_miennam as $airtkmn) {
            $html .= '<tr>';
            $html .= '<td class="dataField"><select name="vemaybay_mn[]" id="vemaybay_mn' . $vmb_mn . '">' . get_select_options_with_id($app_list_strings['list_airlinetiket_dom_south'], $airtkmn->vemaybay_mn) . '</select> </td>';
            $html .= '<td class="dataField"><input type="text" class="center dongia" name="vemaybay_mn_dongia[]" id="vemaybay_mn_dongia' . $vmb_mn . '" value="' . $airtkmn->vemaybay_mn_dongia . '" /></td>';
            $html .= '<td class="dataField"><input type="text" class="center vemaybay_soluong soluong highlight" name="vemaybay_mn_soluong[]" id="vemaybay_mn_soluong' . $vmb_mn . '" value="' . $airtkmn->vemaybay_mn_soluong . '" /></td>';
            $html .= '<td class="dataField"><input type="text" class="center foc" name="vemaybay_mn_foc[]" id="vemaybay_mn_foc' . $vmb_mn . '" value="' . $airtkmn->vemaybay_mn_foc . '" /></td>';
            $html .= '<td class="dataField"><input type="text" class="center thanhtien" name="vemaybay_mn_thanhtien[]" id="vemaybay_mn_thanhtien' . $vmb_mn . '" value="' . $airtkmn->vemaybay_mn_thanhtien . '" /></td>';
            $html .= '<td class="dataField"><input type="text" class="center thuesuat" name="vemaybay_mn_thuesuat[]" id="vemaybay_mn_thuesuat' . $vmb_mn . '" value="' . $airtkmn->vemaybay_mn_thuesuat . '" /></td>';
            $html .= '<td class="dataField"><input type="text" class="center vat" name="vemaybay_mn_vat[]" id="vemaybay_mn_vat' . $vmb_mn . '" value="' . $airtkmn->vemaybay_mn_vat . '" /></td>';
            $html .= '<td class="dataField"><input type="button" class="btnAddRow" value="Add row"/> <input type="button" class="btnDelRow" value="Delete row"/></td>';
            $html .= '</tr>';
            $vmb_mn++;
        }
        $html .= '</tbody>';
        $html .= '</table>';
        $html .= '</fieldset>';
        $html .= '</td>';
        $html .= '</tr>';
    } 
    
    $html .= '</tbody></table>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</fieldset>';
    
    // kết thúc phần vé máy bay

    // loading phần nhà hàng

    $nhArr = array();
    $nhArrMB = array();
    $nhArrMT = array();
    $nhArrMN = array();

    $nhArr = $focus->getRestaurantData($focus->worksheet_tour_id);
    foreach ($nhArr as $arr) {
        if ($arr['area'] == 'mienbac') {
            $app_list_strings['list_restaurant_dom_north'][$arr['id']] = $arr['name'];
            $nhArrMB[] = array('id' => $arr['id'], 'name' => $arr['name'], 'area' => $arr['area']);
        }
        if ($arr['area'] == 'mientrung') {
            $app_list_strings['list_restaurant_dom_middle'][$arr['id']] = $arr['name'];
            $nhArrMT[] = array('id' => $arr['id'], 'name' => $arr['name'], 'area' => $arr['area']);
        }
        if ($arr['area'] == 'miennam') {
            $app_list_strings['list_restaurant_dom_south'][$arr['id']] = $arr['name'];
            $nhArrMN[] = array('id' => $arr['id'], 'name' => $arr['name'], 'area' => $arr['area']);
        }
    }
    
    $html .= '<fieldset>';
    $html .= '<legend><h3>NHÀ HÀNG</h3></legend>';
    $html .= '<div>';
    $html .= '<p>&nbsp;</p>'; 
    $html .= '<a class="showdiv"><img src="custom/themes/default/images/btndown.png" width="30" height="30" title="phóng to"/></a> &nbsp; <a class="hidediv"><img src="custom/themes/default/images/btnup.png" width="30" height="30" title="thu nhỏ"/></a>' ; 
    $html .= '<div class="displayandshow">';
    $html .= '<table width="100%" class="tabForm" id="nhahang" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
    $html .= '<tfoot>';
    $html .= '<tr>';
    $html .= '<th width="20%">TỔNG CỘNG</th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%" align="center"><input type="text" class="center" name="nhahang_tongthanhtien" size="20"  id="nhahang_tongthanhtien" value="' . $noidung->nhahang_tongthanhtien . '"></th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%" align="center"><input type="text" class="center" name="nhahang_tongthue" size="20"  id="nhahang_tongthue" value="' . $noidung->nhahang_tongthue . '"/></th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '</tr>';
    $html .= '</tfoot>';
    $html .= '<tbody>';
    // lấy danh sách nhà hàng ở miền bắc

    $nhahang_mienbac = $noidung->nhahang_mienbac;
    $html .= '<tr> <td colspan="9">';
    if (count($nhahang_mienbac) == 0) {
        if (count($nhArrMB) > 0) {
//            $html .= '<tr> <td colspan="9">';
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

            $html .= '</thead>';
            $html .= '<tbody>';
            $nh_mb = 1;
            foreach ($nhArrMB as $val) {
                $html .= '<tr>';
                $html .= '<td width="20%"><select class="servicename" name="nh_id_mb[]" id="nh_id_mb'.$nh_mb.'">' . get_select_options_with_id($app_list_strings['list_restaurant_dom_north'], $val['id']) . ' </select> <input class="service_name" type="hidden" name="nh_name_mb[]" id="nh_name_mb' . $nh_mb . '" value="' . $val['name'] . '"/> </td>';
                $html .= '<td width="10%" class="dataField"><select class="ghichu" name="nh_ghichu_mb[]" id="nh_ghichu_mb' . $nh_mb . '">'.get_select_options($app_list_strings['workshet_notes_type_dom'],"").'</td>';
                $html .= '<td width="10%" class="dataField"><input size="10" class="dongia center" name="nh_dongia_mb[]" type="text" id="nh_dongia_mb' . $nh_mb . '" value="0" /></td>';
                $html .= '<td width="10%" class="dataField"><input class="soluong nhahang_soluong center highlight" name="nh_soluong_mb[]" type="text" id="nh_soluong_mb' . $nh_mb . '" size="10" value="'.$focus->sokhach+$focus->thuesuathoa.'"/></td>';
                $html .= '<td width="10%" class="dataField"><input class="songay center" name="nh_songay_mb[]" type="text" id="nh_songay_mb' . $nh_mb . '" size="10" value="0"/></td>';
                $html .= '<td width="10%" class="dataField"><input class="foc center" name="nh_foc_mb[]" type="text" id="nh_foc_mb' . $nh_mb . '" size="10" value="0" /></td>';
                $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="nh_thanhtien_mb[]" type="text" id="nh_thanhtien_mb' . $nh_mb . '" size="10" value="0" /></td>';
                $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="nh_thuexuat_mb[]" type="text" id="nh_thuexuat_mb' . $nh_mb . '" size="10" value="10" /></td>';
                $html .= '<td width="10%" class="dataField"><input class="vat center" name="nh_thue_mb[]" type="text" id="nh_thue_mb' . $nh_mb . '" size="10" value="0" /></td>';
                $html .= '<td width="10%"><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                $html .= '</tr> ';
                $nh_mb++;
            }
            $html .= '</tbody>';
            $html .= '<tfoot>';
            $html .= '<tr>';
            $html .= '<th width="20%">&nbsp;</th>';
            $html .= '<th width="10%">&nbsp;</th>';
            $html .= '<th width="10%">&nbsp;</th>';
            $html .= '<th width="10%">&nbsp;</th>';
            $html .= '<th width="10%">&nbsp;</th>';
            $html .= '<th width="10%">&nbsp;</th>';
            $html .= '<th width="10%" align="center"><input type="text" class="center" name="nhahang_tongthanhtien_mienbac" size="10" id="nhahang_tongthanhtien_mienbac"></th>';
            $html .= '<th width="10%">&nbsp;</th>';
            $html .= '<th width="10%" align="center"><input type="text" class="center"  name="nhahang_tongthue_mienbac" size="10" id="nhahang_tongthue_mienbac"/></th>';
            $html .= '<th width="10%">&nbsp;</th>';
            $html .= '</tr>';
            $html .= '</tfoot>';
            $html .= '</table>';
            $html .= '</fieldset>';
            $html .= '</td></tr>';
        }

    }
    if (count($nhahang_mienbac) > 0) {
        $html .= '<fieldset>';
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
        $html .= '</thead>';
        $html .= '<tfoot>';
        $html .= '<tr>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td width="10%" align="center"><input type="text" class="center" name="nhahang_tongthanhtien_mienbac" size="15" id="nhahang_tongthanhtien_mienbac" value="' . $noidung->nhahang_tongthanhtien_mienbac . '"/></td>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td width="10%" align="center"><input type="text" class="center" name="nhahang_tongthue_mienbac" size="15" id="nhahang_tongthue_mienbac" value="' . $noidung->nhahang_tongthue_mienbac . '"/></td>';
        $html .= '<td>&nbsp;</td>';
        $html .= '</tr>';
        $html .= '</tfoot>';
        $html .= '<tbody>';
        $nh_mb = 1;
        foreach ($nhahang_mienbac as $valmb) {
            $html .= '<tr>';
            $html .= '<td width="20%"><select class="servicename" name="nh_id_mb[]" id="nh_id_mb' . $nh_mb . '">' . get_select_options_with_id($app_list_strings['list_restaurant_dom_north'], $valmb->nh_id) . ' </select> <input class="service_name" type="hidden" name="nh_name_mb[]" id="nh_name_mb' . $nh_mb . '" value="' . $valmb->nh_name . '"/>  </td>';
            $html .= '<td width="10%" class="dataField"><select class="ghichu" name="nh_ghichu_mb[]" id="nh_ghichu_mb' . $nh_mb . '">' .get_select_options($app_list_strings['workshet_notes_type_dom'], $valmb->nh_ghichu_mb).'</select></td>';
            $html .= '<td width="10%" class="dataField"><input size="10" class="dongia center" name="nh_dongia_mb[]" type="text" id="nh_dongia_mb' . $nh_mb . '" value="' . $valmb->nh_dongia_mb . '" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="soluong nhahang_soluong center highlight" name="nh_soluong_mb[]" type="text" id="nh_soluong_mb' . $nh_mb . '" size="10" value="' . $valmb->nh_soluong_mb . '" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="songay center" name="nh_songay_mb[]" type="text" id="nh_songay_mb' . $nh_mb . '" size="10" value="' . $valmb->nh_songay_mb . '" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="foc center" name="nh_foc_mb[]" type="text" id="nh_foc_mb' . $nh_mb . '" size="10" value="' . $valmb->nh_foc_mb . '" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="nh_thanhtien_mb[]" type="text" id="nh_thanhtien_mb' . $nh_mb . '" size="10" value="' . $valmb->nh_thanhtien_mb . '" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="nh_thuexuat_mb[]" type="text" id="nh_thuexuat_mb' . $nh_mb . '" size="10" value="' . $valmb->nh_thuexuat_mb . '" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="vat center" name="nh_thue_mb[]" type="text" id="nh_thue_mb' . $nh_mb . '" size="10" value="' . $valmb->nh_thue_mb . '" /></td>';
            $html .= '<td width="10%" class="dataField"><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
            $html .= '</tr> ';
            $nh_mb++;
        }
        $html .= '</tbody>';
        $html .= '</table>';
        $html .= '</fieldset>';
        $html .= '</td></tr>';
    }
    
    // lấy danh sách nhà hàng ở miền trung
    $nhahang_mientrung = $noidung->nhahang_mientrung;

    if (count($nhahang_mientrung) == 0) {
        if (count($nhArrMT) > 0) {
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

            $html .= '</thead>';
            $html .= '<tbody>';
            $nh_mt = 1;
            foreach ($nhArrMT as $val) {
                $html .= '<tr>';
                $html .= '<td width="20%"><select class="servicename" name="nh_id_mt[]" id="nh_id_mt' . $nh_mt . '">' . get_select_options_with_id($app_list_strings['list_restaurant_dom_middle'], $val['id']) . ' </select> <input class="service_name" type="hidden" name="nh_name_mt[]" id="nh_name_mt'.$nh_mt .'" value="' . $val['name'] . '"/>  </td>';
                $html .= '<td width="10%" class="dataField" ><select class="ghichu" name="nh_ghichu_mt[]" id="nh_ghichu_mt' . $nh_mt . '">'.get_select_options($app_list_strings['workshet_notes_type_dom'], '').'</select></td>';
                $html .= '<td width="10%" class="dataField"><input size="10" class="dongia center" name="nh_dongia_mt[]" type="text" id="nh_dongia_mt' . $nh_mt . '" value="0"/></td>';
                $html .= '<td width="10%" class="dataField"><input class="soluong nhahang_soluong center highlight" name="nh_soluong_mt[]" type="text" id="nh_soluong_mt' . $nh_mt . '" size="10" value="'.$focus->sokhach+$focus->thuesuathoa.'"/></td>';
                $html .= '<td width="10%" class="dataField"><input class="songay center" name="nh_songay_mt[]" type="text" id="nh_songay_mt' . $nh_mt . '" size="10" value="0"/></td>';
                $html .= '<td width="10%" class="dataField"><input class="foc center" name="nh_foc_mt[]" type="text" id="nh_foc_mt' . $nh_mt . '" size="10" value="0"/></td>';
                $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="nh_thanhtien_mt[]" type="text" id="nh_thanhtien_mt' . $nh_mt . '" size="10" value="0" /></td>';
                $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="nh_thuexuat_mt[]" type="text" id="nh_thuexuat_mt' . $nh_mt . '" size="10" value="10" /></td>';
                $html .= '<td width="10%" class="dataField"><input class="vat center" name="nh_thue_mt[]" type="text" id="nh_thue_mt' . $nh_mt . '" size="10"  value="0"/></td>';
                $html .= '<td width="10%"><input type="button" class="btnAddRow" value="Add Row"/> <input type="button" class="btnDelRow" value="Delete Row"/></td>';
                $html .= '</tr> ';
                $nh_mt++;
            }
            $html .= '</tbody>';
            $html .= '<tfoot>';
            $html .= '<tr>';
            $html .= '<th width="20%">&nbsp;</th>';
            $html .= '<th width="10%">&nbsp;</th>';
            $html .= '<th width="10%">&nbsp;</th>';
            $html .= '<th width="10%">&nbsp;</th>';
            $html .= '<th width="10%">&nbsp;</th>';
            $html .= '<th width="10%">&nbsp;</th>';
            $html .= '<th width="10%" align="center"><input type="text" class="center" name="nhahang_tongthanhtien_mientrung" size="10" id="nhahang_tongthanhtien_mientrung"></th>';
            $html .= '<th width="10%">&nbsp;</th>';
            $html .= '<th width="10%" align="center"><input type="text" class="center" name="nhahang_tongthue_mientrung" size="10" id="nhahang_tongthue_mientrung"/></th>';
            $html .= '<th width="10%">&nbsp;</th>';
            $html .= '</tr>';
            $html .= '</tfoot>';
            $html .= '</table> ';
            $html .= '</fieldset>';
            $html .= '</td></tr>';
        }
    }
    
    if (count($nhahang_mientrung) > 0) {
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

        $html .= '</thead>';
        $html .= '<tbody>';
             $nh_mt = 1;
            foreach ($nhahang_mientrung as $valmt) {
                $html .= '<tr>';
                $html .= '<td width="20%"><select class="servicename" name="nh_id_mt[]" id="nh_id_mt'.$nh_mt.'">' . get_select_options_with_id($app_list_strings['list_restaurant_dom_middle'], $valmt->nh_id) . ' </select> <input class="service_name" type="hidden" name="nh_name_mt[]" id="nh_name_mt'.$nh_mt .'" value="'.$valmt->nh_name.'"/>  </td>';
                $html .= '<td width="10%" class="dataField"><select class="ghichu" name="nh_ghichu_mt[]" id="nh_ghichu_mt' . $nh_mt . '"/>'.get_select_options($app_list_strings['workshet_notes_type_dom'],$valmt->nh_ghichu_mt).'</select></td>';
                $html .= '<td width="10%" class="dataField"><input size="10" class="dongia center" name="nh_dongia_mt[]" type="text" id="nh_dongia_mt'.$nh_mt.'" value="'.$valmt->nh_dongia_mt .'"/></td>';
                $html .= '<td width="10%" class="dataField"><input class="soluong nhahang_soluong center highlight" name="nh_soluong_mt[]" type="text" id="nh_soluong_mt'.$nh_mt .'" size="10" value="'.$valmt->nh_soluong_mt.'"/></td>';
                $html .= '<td width="10%" class="dataField"><input class="songay center" name="nh_songay_mt[]" type="text" id="nh_songay_mt' . $nh_mt . '" size="10" value="'.$valmt->nh_songay_mt.'"/></td>';
                $html .= '<td width="10%" class="dataField"><input class="foc center" name="nh_foc_mt[]" type="text" id="nh_foc_mt' . $nh_mt . '" size="10" value="' . $valmt->nh_foc_mt . '"/></td>';
                $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="nh_thanhtien_mt[]" type="text" id="nh_thanhtien_mt'.$nh_mt.'" size="10" value="'.$valmt->nh_thanhtien_mt.'"/></td>';
                $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="nh_thuexuat_mt[]" type="text" id="nh_thuexuat_mt'.$nh_mt.'" size="10" value="'.$valmt->nh_thuexuat_mt.'"/></td>';
                $html .= '<td width="10%" class="dataField"><input class="vat center" name="nh_thue_mt[]" type="text" id="nh_thue_mt'.$nh_mt .'" size="10" value="'.$valmt->nh_thue_mt.'"/></td>';
                $html .= '<td width="10%" class="dataField"><input type="button" class="btnAddRow" value="Add Row"/> <input type="button" class="btnDelRow" value="Delete Row"/></td>';
                $html .= '</tr> ';
            }
        $nh_mt++;
        $html .= '</tbody>';
        $html .= '<tfoot>';
        $html .= '<tr>';
        $html .= '<th width="20%">&nbsp;</th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%" align="center" ><input type="text" class="center" name="nhahang_tongthanhtien_mientrung" size="15" id="nhahang_tongthanhtien_mientrung" value="'.$noidung->nhahang_tongthanhtien_mientrung.'"></th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%" align="center" ><input type="text" class="center" name="nhahang_tongthue_mientrung" size="15" id="nhahang_tongthue_mientrung" value="'.$noidung->nhahang_tongthue_mientrung.'"/></th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '</tr>';
        $hml .= '</tfoot>';
        
        $html .= '</table> ';
        $html .= '</fieldset>';
        $html .= '</td></tr>';
    }

    // lấy danh sách nhà hàng ở miền nam
    $nhahang_miennam = $noidung->nhahang_miennam;
    if (count($nhahang_miennam) == 0) {
        if (count($nhArrMN) > 0) {
            $html .= '<tr> <td colspan="9">';
            $html .= '<fieldset class="tabForm">';
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

            $html .= '</thead>';
            $html .= '<tbody>';
            $nh_mn = 1;
            foreach ($nhArrMN as $val) {
                $html .= '<tr>';
                $html .= '<td width="10%"><select class="servicename" name="nh_id_mn[]" id="nh_id_mn' . $nh_mn . '">' . get_select_options_with_id($app_list_strings['list_restaurant_dom_south'], $val['id']) . ' </select> <input class="service_name" type="hidden" name="nh_name_mn[]" id="nh_name_mn' . $nh_mn . '" value="' . $val['name'] . '"/> </td>';
                $html .= '<td width="10%" class="dataField"><select class="ghichu" name="nh_ghichu_mn[]" id="nh_ghichu_mn' . $nh_mn . '"/>'.get_select_options($app_list_strings['workshet_notes_type_dom'],"").'</select></td>';
                $html .= '<td width="10%" class="dataField"><input size="10" class="dongia center" name="nh_dongia_mn[]" type="text" id="nh_dongia_mn' . $nh_mn . '" value="0" /></td>';
                $html .= '<td width="10%" class="dataField"><input class="soluong nhahang_soluong center highlight" name="nh_soluong_mn[]" type="text" id="nh_soluong_mn' . $nh_mn . '" size="10" value="'.$focus->sokhach+$focus->thuesuathoa.'"/></td>';
                $html .= '<td width="10%" class="dataField"><input class="songay center" name="nh_songay_mn[]" type="text" id="nh_songay_mn' . $nh_mn . '" size="10" value="0"/></td>';
                $html .= '<td width="10%" class="dataField"><input class="foc center" name="nh_foc_mn[]" type="text" id="nh_foc_mt' . $nh_mn . '" size="10" value="0" /></td>';
                $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="nh_thanhtien_mn[]" type="text" id="nh_thanhtien_mn' . $nh_mn . '" size="10" value="0" /></td>';
                $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="nh_thuexuat_mn[]" type="text" id="nh_thuexuat_mn' . $nh_mn . '" size="10" value="10" /></td>';
                $html .= '<td width="10%" class="dataField"><input class="vat center" name="nh_thue_mn[]" type="text" id="nh_thue_mn' . $nh_mn . '" size="10" value="0" /></td>';
                $html .= '<td width="10%"><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
                $html .= '</tr> ';
                $nh_mn++;
            }
            $html .= '</tbody>';
            $html .= "<tfoot>";
            $html .= '<tr>';
            $html .= '<th width="20%">&nbsp;</th>';
            $html .= '<th width="10%">&nbsp;</th>';
            $html .= '<th width="10%">&nbsp;</th>';
            $html .= '<th width="10%">&nbsp;</th>';
            $html .= '<th width="10%">&nbsp;</th>';
            $html .= '<th width="10%">&nbsp;</th>';
            $html .= '<th width="10%" align="center"><input type="text" class="center" name="nhahang_tongthanhtien_miennam" size="15" id="nhahang_tongthanhtien_miennam"></th>';
            $html .= '<th width="10%">&nbsp;</th>';
            $html .= '<th width="10%" align="center"><input type="text" class="center" name="nhahang_tongthue_miennam" size="15" id="nhahang_tongthue_miennam"/></th>';
            $html .= '<th width="10%">&nbsp;</th>';
            $html .= '</tr>';
            $html .= "</tfoot>";
            $html .= '</table> ';
            $html .= '</fieldset>';
            $html .= '</td></tr>';
        }
    }
    if (count($nhahang_miennam) > 0) {
        $html .= '<tr> <td colspan="9">';
        $html .= '<fieldset class="tabForm">';
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

        $html .= '</thead>';
        $html .= '</tbody>';
        $nh_mn = 1;
        foreach ($nhahang_miennam as $valmn) {
            $html .= '<tr>';
            $html .= '<td width="10%"><select class="servicename" name="nh_id_mn[]" id="nh_id_mn' . $nh_mn . '">' . get_select_options_with_id($app_list_strings['list_restaurant_dom_south'], $valmn->nh_id) . ' </select> <input class="service_name" type="hidden" name="nh_name_mn[]" id="nh_name_mn' . $nh_mn . '" value="' . $valmn->nh_name . '"/></td>';
            $html .= '<td width="10%" class="dataField"><select class="ghichu" name="nh_ghichu_mn[]" id="nh_ghichu_mn' . $nh_mn . '"/>'.get_select_options($app_list_strings['workshet_notes_type_dom'],$valmn->nh_ghichu_mn ).'</select></td>';
            $html .= '<td width="10%" class="dataField"><input size="10" class="dongia center" name="nh_dongia_mn[]" type="text" id="nh_dongia_mn' . $nh_mn . '" value="' . $valmn->nh_dongia_mn . '" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="soluong nhahang_soluong center highlight" name="nh_soluong_mn[]" type="text" id="nh_soluong_mn' . $nh_mn . '" size="10" value="' . $valmn->nh_soluong_mn . '" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="songay center" name="nh_songay_mn[]" type="text" id="nh_songay_mn' . $nh_mn . '" size="10" value="' . $valmn->nh_songay_mn . '" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="foc center" name="nh_foc_mn[]" type="text" id="nh_foc_mn' . $nh_mn . '" size="10" value="' . $valmn->nh_foc_mn . '" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="nh_thanhtien_mn[]" type="text" id="nh_thanhtien_mn' . $nh_mn . '" size="10" value="' . $valmn->nh_thanhtien_mn . '" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="nh_thuexuat_mn[]" type="text" id="nh_thuexuat_mn' . $nh_mn . '" size="10" value="' . $valmn->nh_thuexuat_mn . '" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="vat center" name="nh_thue_mn[]" type="text" id="nh_thue_mn' . $nh_mn . '" size="10" value="' . $valmn->nh_thue_mn . '" /></td>';
            $html .= '<td width="10%" class="dataField"><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
            $html .= '</tr> ';
        }
        $nh_mn++;
        $html .= '</tbody>';
        $html .= "<tfoot>";
        $html .= '<tr>';
        $html .= '<th width="20%">&nbsp;</th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%" align="center"><input type="text" class="center" name="nhahang_tongthanhtien_miennam" size="15" id="nhahang_tongthanhtien_miennam" value="' . $noidung->nhahang_tongthanhtien_miennam . '"/></th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%" align="center"><input type="text" class="center" name="nhahang_tongthue_miennam" size="15" id="nhahang_tongthue_miennam" value="' . $noidung->nhahang_tongthue_miennam . '"/></th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '</tr>';
        $html .= "</tfoot>";
        $html .= '</table> ';
        $html .= '</fieldset>';
    }
    $html .= '</td></tr>';
    $html .= '</tbody>';
    $html .= '</table>'; 
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</fieldset>';
    
}
// ket thuc phan load nha hang
// loading hotel data 
// lấy danh sách khách sạn

$listDestination = $focus->getListDestination($focus->worksheet_tour_id);
foreach ($listDestination as $list) {
    if ($list['area'] == 'mienbac') {
        $app_list_strings['list_destination_north_dom'][$list['id']] = $list['name'];
    }
    else if ($list['area'] == 'mientrung') {
        $app_list_strings['list_destination_middle_dom'][$list['id']] = $list['name'];
    }
    else if ($list['area'] == 'miennam') {
        $app_list_strings['list_destination_south_dom'][$list['id']] = $list['name'];
    }
}


$html .= '<fieldset>';
$html .= '<legend><h3>KHÁCH SẠN</h3></legend>';
$html .= '<div>';
$html .= '<p>&nbsp;</p>';
$html .= '<a class="showdiv"><img src="custom/themes/default/images/btndown.png" width="30" height="30" title="phóng to"/></a> &nbsp; <a class="hidediv"><img src="custom/themes/default/images/btnup.png" width="30" height="30" title="thu nhỏ"/></a>' ; 
$html .= '<div class="displayandshow">';
$html .= '<table width="100%" class="tabForm" border="0" class="tabForm" id="khachsan" cellspacing="0" cellpadding="5" style="border-collapse:collapse">';
$html .= '<tfoot>';
$html .= '<tr>';
$html .= '<th>TỔNG CỘNG</th>';
$html .= '<th>&nbsp;</th>';
$html .= '<th>&nbsp;</th>';
$html .= '<th>&nbsp;</th>';
$html .= '<th>&nbsp;</th>';
$html .= '<th>&nbsp;</th>';
$html .= '<th>&nbsp;</th>';
$html .= '<th>&nbsp;</th>';
$html .= '<th>&nbsp;</th>';
$html .= '<th><input type="text" size="20" class="center" name="khachsan_tongthanhtien" id="khachsan_tongthanhtien" value="'.$noidung->khachsan_tongthanhtien.'"/></th>';
$html .= '<th>&nbsp;</th>';
$html .= '<th><input type="text" size="20" class="center" name="khachsan_tongthue" id="khachsan_tongthue" value="'.$noidung->khachsan_tongthue.'"/></th>';
$html .= '<th>&nbsp;</th>';
$html .= '</tr>';
$html .= '</tfoot>';
$html .= '<tbody>';


// lấy danh sách khách sạn ở miền bắc
$khachsan_mienbac = $noidung->khachsan_mienbac;
$html .= '<tr><td colspan="13">';
$html .= '<fieldset >';
$html .= '<legend><h3>MIỀN BẮC</h3></legend>';
$html .= '<table width="100%" border="0" class="table_clone" id="ks_mb" cellspacing="5" cellpadding="5" style="border-collapse:collapse">';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<th>Nơi đến</th>';
$html .= '<th><select name ="destination_north" id="destination_north" class="destination" size="4">'.get_select_options_with_id($app_list_strings['list_destination_north_dom'], '') . ' </select></th>';
$html .= '<th>Tiêu chuẩn</th>';
$html .= '<th> <select name="standard_north" id="standard_north" class="standard" size="4">'.get_select_options_with_id($app_list_strings['hotel_standard_dom'], '') . ' </select> <div id="waitting"></div> </th>';
$html .= '<th><input type="button" class="loadingdatahotel" value="Lấy dữ liệu"/></th>';
$html .= '<th>Khách sạn</th>';
$html .= '<th><select name="ks_mienbac" id="ks_mienbac" class="tenkhachsan" size="4"></select></th>';
$html .= '<th>Hạng Phòng</th>';
$html .= '<th><select name="hangphong_north" id="hangphong_north" class="hangphong" size="4">'.get_select_options_with_id($app_list_strings['roombooking_type_dom'], '') . '</select></th>';
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
$html .= '<th>Foc</th>';
$html .= '<th>Hạng phòng</th>';
$html .= '<th>Số đêm</th>';
$html .= '<th>thành tiền</th>';
$html .= '<th>Thuế suất</th>';
$html .= '<th>Thuế</th>';
$html .= '<th>&nbsp;</th>';
$html .= '</tr>';

$html .= '</thead>';
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
$html .= '<th>&nbsp;</th>';
$html .= '<th><input type="text" size="15" class="center" name="khachsan_tongthanhtien_mienbac" id="khachsan_tongthanhtien_mienbac" value="' . $noidung->khachsan_tongthanhtien_mienbac . '"/></th>';
$html .= '<th>&nbsp;</th>';
$html .= '<th><input type="text" size="15" class="center" name="khachsan_tongthue_mienbac" id="khachsan_tongthue_mienbac" value="' . $noidung->khachsan_tongthue_mienbac . '"/></th>';
$html .= '<th>&nbsp;</th>';
$html .= '</tr>';
$html .= '</tfoot>';


$html .= '<tbody>';
if (count($khachsan_mienbac) > 0) {
    $ks_mb = 1;
    foreach ($khachsan_mienbac as $val_ksmb) {
        $html .= '<tr>';
        $html .= '<td><input type="text" class="tenkhachsan" name="tenkhachsan_ks_mb[]" id="tenkhachsan_ks_mb' . $ks_mb . '" size="35" value="' . $val_ksmb->ks_name . '" /><input type="hidden" name="ks_id_ks_mb[]" id="ks_id_ks_mb" value="' . $val_ksmb->ks_id . '" </td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="phongdon center" name="SGL_ks_mb[]" id="SGL_ks_mb' . $ks_mb . '" value="' . $val_ksmb->SGL_ks_mb . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="soluongphongdon center" name="SGL_SL_ks_mb[]" id="SGL_SL_ks_mb' . $ks_mb . '" value="' . $val_ksmb->SGL_SL_ks_mb . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="phongdoi center" name="DBL_ks_mb[]" id="DBL_ks_mb' . $ks_mb . '" value="' . $val_ksmb->DBL_ks_mb . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="soluongphongdoi center" name="DBL_SL_ks_mb[]" id="DBL_SL_ks_mb' . $ks_mb . '" value="' . $val_ksmb->DBL_SL_ks_mb . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="phongba center" name="TPL_ks_mb[]" id="TPL_ks_mb' . $ks_mb . '" value="' . $val_ksmb->TPL_ks_mb . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="soluongphongba center" name="TPL_SL_ks_mb[]" id="TPL_SL_ks_mb' . $ks_mb . '" value="' . $val_ksmb->TPL_SL_ks_mb . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="foc center" name="foc_ks_mb[]" id="foc_ks_mb' . $ks_mb . '" value="' .$val_ksmb->foc . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="hangphong center" name="hangphong_ks_mb[]" id="hangphong_ks_mb' . $ks_mb . '" value="' . $val_ksmb->hangphong_ks_mb . '"  size="15" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="songaydem center" name="songaydem_ks_mb[]" id="songaydem_ks_mb' . $ks_mb . '" value="' . $val_ksmb->songaydem_ks_mb . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="thanhtien center" name="thanhtien_ks_mb[]" id="thanhtien_ks_mb' . $ks_mb . '" value="' . $val_ksmb->thanhtien_ks_mb . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="thuesuat center" name="thuesuat_ks_mb[]" id="thuesuat_ks_mb' . $ks_mb . '" value="' . $val_ksmb->thuesuat_ks_mb . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="vat center" name="vat_ks_mb[]" id="vat_ks_mb' . $ks_mb . '" value="' . $val_ksmb->vat_ks_mb . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="button" class="btnDelRow" value="Delete Row" /></td>';
        $html .= '</tr>';
        $ks_mb++;
    }
}
$html .= '</tbody>';
$html .= '</table>';
$html .= '</fieldset>';
$html .= '</td></tr>';

// khách sạn tại miền trung
$html .= '<tr><td colspan="13">';
$khachsan_mientrung = $noidung->khachsan_mientrung;
$html .= '<fieldset>';
$html .= '<legend><h3>MIỀN TRUNG</h3></legend>';
$html .= '<table width="100%" border="0" class="table_clone" id="ks_mt" cellspacing="5" cellpadding="5" style="border-collapse:collapse">';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<th>Nơi đến</th>';
$html .= '<th><select name ="destination_middle" id="destination_middle" class="destination" size="4">' . get_select_options_with_id($app_list_strings['list_destination_middle_dom'], '') . ' </select></th>';
$html .= '<th><select name="standard_middle" id="standard_middle" class="standard" size="4" >' . get_select_options_with_id($app_list_strings['hotel_standard_dom'], '') . ' </select> <div id="waitting"></div> </th>';
$html .= '<th><input type="button" class="loadingdatahotel" value="Lấy dữ liệu"/></th>';
$html .= '<th>Khách sạn</th>';
$html .= '<th><select name="ks_mienbac" id="ks_mienbac" class="tenkhachsan" size="4"></select></th>';
$html .= '<th>Hạng phòng</th>';
$html .= '<th><select name="hangphong_middle" id="hangphong_middle" class="hangphong" size="4">' . get_select_options_with_id($app_list_strings['roombooking_type_dom'], '') . '</select></th>';
$html .= '<th>&nbsp;</th>';
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
$html .= '<th>Foc</th>';
$html .= '<th>Hạng phòng</th>';
$html .= '<th>Số đêm</th>';
$html .= '<th>thành tiền</th>';
$html .= '<th>Thuế suất</th>';
$html .= '<th>Thuế</th>';
$html .= '<th>&nbsp;</th>';
$html .= '</tr>';
$html .= '</thead>'; 
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
$html .= '<th>&nbsp;</th>';
$html .= '<th><input type="text" size="15" class="center" name="khachsan_tongthanhtien_mientrung" id="khachsan_tongthanhtien_mientrung" value="' . $noidung->khachsan_tongthanhtien_mientrung . '"/></th>';
$html .= '<th>&nbsp;</th>';
$html .= '<th><input type="text" size="15" class="center" name="khachsan_tongthue_mientrung" id="khachsan_tongthue_mientrung" value="' . $noidung->khachsan_tongthue_mientrung . '"/></th>';
$html .= '<th>&nbsp;</th>';
$html .= '</tr>';
$html .= '</tfoot>';
$html .= '<tbody>';
if (count($khachsan_mientrung) > 0) {
    $ks_mt = 1;
    foreach ($khachsan_mientrung as $val_ksmt) {
        $html .= '<tr>';
        $html .= '<td><input type="text" class="tenkhachsan" name="tenkhachsan_ks_mt[]" id="tenkhachsan_ks_mt' . $ks_mt . '" size="35" value="' . $val_ksmt->ks_name . '" /><input type="hidden" name="ks_id_ks_mt[]" id="ks_id_ks_mt" value="' . $val_ksmt->ks_id . '" </td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="phongdon center" name="SGL_ks_mt[]" id="SGL_ks_mt' . $ks_mt . '" value="' . $val_ksmt->SGL_ks_mt . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="soluongphongdon center" name="SGL_SL_ks_mt[]" id="SGL_SL_ks_mt' . $ks_mt . '" value="' . $val_ksmt->SGL_SL_ks_mt . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="phongdoi center" name="DBL_ks_mt[]" id="DBL_ks_mt' . $ks_mt . '" value="' . $val_ksmt->DBL_ks_mt . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="soluongphongdoi center" name="DBL_SL_ks_mt[]" id="DBL_SL_ks_mt' . $ks_mt . '" value="' . $val_ksmt->DBL_SL_ks_mt . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="phongba center" name="TPL_ks_mt[]" id="TPL_ks_mt' . $ks_mt . '" value="' . $val_ksmt->TPL_ks_mt . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="soluongphongba center" name="TPL_SL_ks_mt[]" id="TPL_SL_ks_mt' . $ks_mt . '" value="' . $val_ksmt->TPL_SL_ks_mt . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="foc center" name="foc_ks_mt[]" id="foc_ks_mt' . $ks_mt . '" value="'.$val_ksmt->foc.'" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="hangphong" name="hangphong_ks_mt[]" id="hangphong_ks_mt' . $ks_mt . '" value="' . $val_ksmt->hangphong_ks_mt . '"  size="15" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="songaydem center" name="songaydem_ks_mt[]" id="songaydem_ks_mt' . $ks_mt . '" value="' . $val_ksmt->songaydem_ks_mt . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="thanhtien center" name="thanhtien_ks_mt[]" id="thanhtien_ks_mt' . $ks_mt . '" value="' . $val_ksmt->thanhtien_ks_mt . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="thuesuat center" name="thuesuat_ks_mt[]" id="thuesuat_ks_mt' . $ks_mt . '" value="' . $val_ksmt->thuesuat_ks_mt . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="vat center" name="vat_ks_mt[]" id="vat_ks_mt' . $ks_mt . '" value="' . $val_ksmt->vat_ks_mt . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="button" class="btnDelRow" value="Delete Row" /></td>';
        $html .= '</tr>';
        $ks_mt++;
    }
}
$html .= '</tbody>';
$html .= '</table>';
$html .= '</fieldset>';
$html .= '</td></tr>';

// khách sạn tại miền nam
$html .= '<tr><td colspan="13">';
$khachsan_miennam = $noidung->khachsan_miennam;
$html .= '<fieldset>';
$html .= '<legend><h3>MIỀN NAM</h3></legend>';
$html .= '<table width="100%" border="0" class="table_clone" id="ks_mn" cellspacing="5" cellpadding="5" style="border-collapse:collapse">';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<th>Nơi đến</th>';
$html .= '<th><select name ="destination_south" id="destination_south" class="destination" size="4">' . get_select_options_with_id($app_list_strings['list_destination_south_dom'], '') . ' </select></th>';
$html .= '<th><select name="standard_south" id="standard_south" class="standard" size="4" >' . get_select_options_with_id($app_list_strings['hotel_standard_dom'], '') . ' </select> <div id="waitting"></div> </th>';
$html .= '<th><input type="button" class="loadingdatahotel" value="Lấy dữ liệu"/></th>';
$html .= '<th>Khách sạn</th>';
$html .= '<th><select name="ks_mienbac" id="ks_mienbac" class="tenkhachsan" size="4"></select></th>';
$html .= '<th>Hạng phòng</th>';
$html .= '<th><select name="hangphong_south" id="hangphong_south" class="hangphong" size="4">' . get_select_options_with_id($app_list_strings['roombooking_type_dom'], '') . '</select></th>';
$html .= '<th>&nbsp;</th>';
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
$html .= '<th>Foc</th>';
$html .= '<th>Hạng phòng</th>';
$html .= '<th>Số đêm</th>';
$html .= '<th>thành tiền</th>';
$html .= '<th>Thuế suất</th>';
$html .= '<th>Thuế</th>';
$html .= '<th>&nbsp;</th>';
$html .= '<tr>';
$html .= '</thead>';
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
$html .= '<th>&nbsp;</th>';
$html .= '<th><input type="text" size="15" class="center" name="khachsan_tongthanhtien_miennam" id="khachsan_tongthanhtien_miennam" value="' . $noidung->khachsan_tongthanhtien_miennam . '"/></th>';
$html .= '<th>&nbsp;</th>';
$html .= '<th><input type="text" size="15" class="center" name="khachsan_tongthue_miennam" id="khachsan_tongthue_miennam" value="' . $noidung->khachsan_tongthue_miennam . '"/></th>';
$html .= '<th>&nbsp;</th>';
$html .= '</tr>';
$html .= '</tfoot>';
$html .= '<tbody>';
if (count($khachsan_miennam) > 0) {
    $ks_mn = 1;
    foreach ($khachsan_miennam as $val_ksmn) {
        $html .= '<tr>';
        $html .= '<td><input type="text" class="tenkhachsan" name="tenkhachsan_ks_mn[]" id="tenkhachsan_ks_mn' . $ks_mn . '" size="35" value="' . $val_ksmn->ks_name . '" /><input type="hidden" name="ks_id_ks_mn[]" id="ks_id_ks_mn" value="' . $val_ksmn->ks_id . '" </td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="phongdon center" name="SGL_ks_mn[]" id="SGL_ks_mn' . $ks_mn . '" value="' . $val_ksmn->SGL_ks_mn . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="soluongphongdon center" name="SGL_SL_ks_mn[]" id="SGL_SL_ks_mn' . $ks_mn . '" value="' . $val_ksmn->SGL_SL_ks_mn . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="phongdoi center" name="DBL_ks_mn[]" id="DBL_ks_mn' . $ks_mn . '" value="' . $val_ksmn->DBL_ks_mn . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="soluongphongdoi center" name="DBL_SL_ks_mn[]" id="DBL_SL_ks_mn' . $ks_mn . '" value="' . $val_ksmn->DBL_SL_ks_mn . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="phongba center" name="TPL_ks_mn[]" id="TPL_ks_mn' . $ks_mn . '" value="' . $val_ksmn->TPL_ks_mn . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="soluongphongba center" name="TPL_SL_ks_mn[]" id="TPL_SL_ks_mn' . $ks_mn . '" value="' . $val_ksmn->TPL_SL_ks_mn . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="foc center" name="foc_ks_mn[]" id="foc_ks_mn' . $ks_mn . '" value="' . $val_ksmn->foc . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="hangphong center" name="hangphong_ks_mn[]" id="hangphong_ks_mn' . $ks_mn . '" value="' . $val_ksmn->hangphong_ks_mn . '"  size="15" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="songaydem center" name="songaydem_ks_mn[]" id="songaydem_ks_mn' . $ks_mn . '" value="' . $val_ksmn->songaydem_ks_mn . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="thanhtien center" name="thanhtien_ks_mn[]" id="thanhtien_ks_mn' . $ks_mn . '" value="' . $val_ksmn->thanhtien_ks_mn . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="thuesuat center" name="thuesuat_ks_mn[]" id="thuesuat_ks_mn' . $ks_mn . '" value="' . $val_ksmn->thuesuat_ks_mn . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="text" style="text-align: center;" class="vat center" name="vat_ks_mn[]" id="vat_ks_mn' . $ks_mn . '" value="' . $val_ksmn->vat_ks_mn . '" size="10" /></td>';
        $html .= '<td class="dataField"><input type="button" class="btnDelRow" value="Delete Row" /></td>';
        $html .= '</tr>';
        $ks_mn++;
    }
}
$html .= '</tbody>';
$html .= '</table>';
$html .= '</fieldset>';
$html .= '</td></tr>';
$html .= '</table></fieldset>';
$html .= '</div>';
$html .= '</div>';
// ket thuc phan khach san

// loading van chuyen 

$vcArr = array();
$vcArrMB = array();
$vcArrMT = array();
$vcArrMN = array();
$vcArr = $focus->getTransportData($focus->worksheet_tour_id);
foreach ($vcArr as $arrvc) {
    if ($arrvc['area'] == 'mienbac') {
        $app_list_strings['list_vanchuyen_dom_north'][$arrvc['id']] = 'Xe ' . $arrvc['name'] . ' chỗ';
        $vcArrMB[] = array('id' => $arrvc['id'], 'name' => $arrvc['name'], 'area' => $arrvc['area']);
    }
    if ($arrvc['area'] == 'mientrung') {
        $app_list_strings['list_vanchuyen_dom_middle'][$arrvc['id']] = 'Xe ' . $arrvc['name'] . ' chỗ';
        $vcArrMT[] = array('id' => $arrvc['id'], 'name' => $arrvc['name'], 'area' => $arrvc['area']);
    }
    if ($arrvc['area'] == 'miennam') {
        $app_list_strings['list_vanchuyen_dom_south'][$arrvc['id']] = 'Xe ' . $arrvc['name'] . ' chỗ';
        $vcArrMN[] = array('id' => $arrvc['id'], 'name' => $arrvc['name'], 'area' => $arrvc['area']);
    }
}
$html .= '<fieldset>';
$html .= '<legend> <h3>VẬN CHUYỂN</h3></legend>';
$html .= '<div>';
$html .= '<p>&nbsp;</p>';
$html .= '<a class="showdiv"><img src="custom/themes/default/images/btndown.png" width="30" height="30" title="phóng to"/></a> &nbsp; <a class="hidediv"><img src="custom/themes/default/images/btnup.png" width="30" height="30" title="thu nhỏ"/></a>' ; 
$html .= '<div class="displayandshow">';
$html .= '<table width="100%" class="tabForm" id="vanchuyen" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
$html .= '<tfoot>';
$html .= '<tr>';
$html .= '<th width="10%">TỔNG CỘNG</th>';
$html .= '<th width="20%">&nbsp;</th>';
$html .= '<th width="10%">&nbsp;</th>';
$html .= '<th width="10%">&nbsp;</th>';
$html .= '<th width="10%">&nbsp;</th>';
$html .= '<th width="10%" class="dataField"><input type="text" size="20" class="center" name="vanchuyen_tongthanhtien" id="vanchuyen_tongthanhtien" value="' . $noidung->vanchuyen_tongthanhtien . '"/></th>';
$html .= '<th width="10%">&nbsp;</th>';
$html .= '<th width="10%" class="dataField"><input type="text" size="20" class="center" name="vanchuyen_tongthue" id="vanchuyen_tongthue" value="' . $noidung->vanchuyen_tongthue . '" /></th>';
$html .= '<th width="20%">&nbsp;</th>';
$html .= '</tr>';
$html .= '</tfoot>';
$html .= '<tbody>';
// lấy danh sách vận chuyển ở miền bắc

$vanchuyen_mienbac = $noidung->vanchuyen_mienbac;
if (count($vanchuyen_mienbac) == 0) {
    if (count($vcArrMB) > 0) {
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
//        $html .= '<th width="10%">FOC</th>';
        $html .= '<th width="10%">Thành tiền</th>';
        $html .= '<th width="10%">Thuế suất</th>';
        $html .= '<th width="20%">Thuế</th>';
        $html .= '<th width="20%">&nbsp;</th>';
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tfoot>';
        $html .= '<tr>';
        $html .= '<th width="10%">&nbsp;</th>';
//        $html .= '<th width="20%">&nbsp;</th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%"><input type="text" size="15" class="center" name="vanchuyen_tongthanhtien_mienbac" id="vanchuyen_tongthanhtien_mienbac"/></th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%"><input type="text" size="15" class="center" name="vanchuyen_tongthue_mienbac" id="vanchuyen_tongthue_mienbac" /></th>';
        $html .= '<th width="20%">&nbsp;</th>';
        $html .= '</tr>';
        $html .= '</tfoot>';
        $html .= '<tbody>';
        $vc_mb = 1;
        foreach ($vcArrMB as $vcVal) {
            $html .= '<tr>';
            $html .= '<td width="10%" class="dataField"><select class="servicename" name="vanchuyen_name_mb[]" id="vanchuyen_name_mb' . $vc_mb . '">' . get_select_options_with_id($app_list_strings['list_vanchuyen_dom_north'], $vcVal['id']) . '</select></td>';
            $html .= '<td width="20%" class="dataField"><input size="10" class="dongia center" name="vanchuyen_dongia_mb[]" type="text" id="vanchuyen_dongia_mb' . $vc_mb . '" /> <select name="dongia_option_mb[]" class="dongia_option" id="dongia_option_mb' . $vc_mb . '">' . get_select_options_with_id($app_list_strings['vanchuyen_dongia_option'], '') . '</select></td>';
            $html .= '<td width="10%" class="dataField"><input class="soluong center" name="vanchuyen_soluong_mb[]" type="text" id="vanchuyen_soluong_mb' . $vc_mb . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="songay center" name="vanchuyen_songay_mb[]" type="text" id="vanchuyen_songay_mb' . $vc_mb . '" size="10" /></td>';
//            $html .= '<td width="10%" class="dataField"><input class="foc center" name="vanchuyen_foc_mb[]" type="text" id="vanchuyen_foc_mb' . $vc_mb . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="vanchuyen_thanhtien_mb[]" type="text" id="vanchuyen_thanhtien_mb' . $vc_mb . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="vanchuyen_thuesuat_mb[]" type="text" id="vanchuyen_thuesuat_mb' . $vc_mb . '" value="10"  size="10" /></td>';
            $html .= '<td width="20%" class="dataField"><input class="vat center" name="vanchuyen_vat_mb[]" type="text" id="vanchuyen_vat_mb' . $vc_mb . '" size="10" /></td>';
            $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
            $html .= '</tr> ';
            $vc_mb++;
        }
        $html .= '</tbody></table></fieldset></td></tr>';
    }
}
if (count($vanchuyen_mienbac) > 0) {
    $html .= '<tr><td colspan="9">';
    $html .= '<fieldset >';
    $html .= '<legend><h3>MIỀN BẮC</h3></legend>';
    $html .= '<table width="100%" class="table_clone" id="vanchuyen_mienbac" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<th width="10%">Lọai xe</th>';
    $html .= '<th width="20%">Đơn giá</th>';
    $html .= '<th width="10%">Số lượng</th>';
    $html .= '<th width="10%">Ngày/Giờ/Km</th>';
//    $html .= '<th width="10%">FOC</th>';
    $html .= '<th width="10%">Thành tiền</th>';
    $html .= '<th width="10%">Thuế suất</th>';
    $html .= '<th width="20%">Thuế</th>';
    $html .= '<th width="20%">&nbsp;</th>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="20%">&nbsp;</th>';
//    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%" align="center"><input type="text" size="15" class="center" name="vanchuyen_tongthanhtien_mienbac" id="vanchuyen_tongthanhtien_mienbac" value="'.$noidung->vanchuyen_tongthanhtien_mienbac.'"/></th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%" align="center"><input type="text" size="15" class="center" name="vanchuyen_tongthue_mienbac" id="vanchuyen_tongthue_mienbac" value="'.$noidung->vanchuyen_tongthue_mienbac.'" /></th>';
    $html .= '<th width="20%">&nbsp;</th>';


    $html .= '</tr>';
    $html .= '</thead>';
    $html .= '<tbody>';
    $vc_mb = 1;
    foreach ($vanchuyen_mienbac as $vcValMB) {
        $html .= '<tr>';
        $html .= '<td width="10%" class="dataField"><select class="servicename" name="vanchuyen_name_mb[]" id="vanchuyen_name_mb' . $vc_mb . '">' . get_select_options_with_id($app_list_strings['list_vanchuyen_dom_north'], $vcValMB->vanchuyen_name_mb) . '</select></td>';
        $html .= '<td width="20%" class="dataField"><input size="10" class="dongia center" name="vanchuyen_dongia_mb[]" type="text" id="vanchuyen_dongia_mb' . $vc_mb . '" value="' . $vcValMB->vanchuyen_dongia_mb . '" /> <select name="dongia_option_mb[]" class="dongia_option" id="dongia_option_mb' . $vc_mt . '">' . get_select_options_with_id($app_list_strings['vanchuyen_dongia_option'], $vcValMB->dongia_option_mb) . '</select></td>';
        $html .= '<td width="10%" class="dataField"><input class="soluong center" name="vanchuyen_soluong_mb[]" type="text" id="vanchuyen_soluong_mb' . $vc_mb . '" size="10" value="' . $vcValMB->vanchuyen_soluong_mb . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="songay center" name="vanchuyen_songay_mb[]" type="text" id="vanchuyen_songay_mb' . $vc_mb . '" size="10" value="' . $vcValMB->vanchuyen_songay_mb . '" /></td>';
//        $html .= '<td width="10%" class="dataField"><input class="foc center" name="vanchuyen_foc_mb[]" type="text" id="vanchuyen_foc_mb' . $vc_mb . '" size="10" value="' . $vcValMB->vanchuyen_foc_mb . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="vanchuyen_thanhtien_mb[]" type="text" id="vanchuyen_thanhtien_mb' . $vc_mb . '" size="10" value="' . $vcValMB->vanchuyen_thanhtien_mb . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="vanchuyen_thuesuat_mb[]" type="text" id="vanchuyen_thuesuat_mb' . $vc_mb . '" size="10" value="' . $vcValMB->vanchuyen_thanhtien_mb . '"/></td>';
        $html .= '<td width="20%" class="dataField"><input class="vat center" name="vanchuyen_vat_mb[]" type="text" id="vanchuyen_vat_mb' . $vc_mb . '" size="10" value="' . $vcValMB->vanchuyen_vat_mb . '"/></td>';
        $html .= '<td class="dataField"><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
        $html .= '</tr> ';
        $vc_mb++;
    }
    $html .= '</tbody></table></fieldset>';
    $html .= '</td></tr>';
}

// lấy danh sách vận chuyển ở miền trung

$vanchuyen_mientrung = $noidung->vanchuyen_mientrung;
if (count($vanchuyen_mientrung) == 0) {
    if (count($vcArrMT) > 0) {
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
//        $html .= '<th width="10%">FOC</th>';
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
//        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%" align="center"><input type="text" size="15" class="center" name="vanchuyen_tongthanhtien_mientrung" id="vanchuyen_tongthanhtien_mientrung"/></th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%" align="center"><input type="text" size="15" class="center" name="vanchuyen_tongthue_mientrung" id="vanchuyen_tongthue_mientrung" /></th>';
        $html .= '<th width="20%">&nbsp;</th>';
        $html .= '</tr>';
        $html .= '</tfoot>';
        $html .= '<tbody>';
        $vc_mt = 1;
        foreach ($vcArrMT as $vcVal) {
            $html .= '<tr>';
            $html .= '<td width="10%" class="dataField"><select class="servicename" name="vanchuyen_name_mt[]" id="vanchuyen_name_mt' . $vc_mt . '">' . get_select_options_with_id($app_list_strings['list_vanchuyen_dom_middle'], $vcVal['id']) . '</select> </td>';
            $html .= '<td width="20%" class="dataField"><input size="10" class="dongia center" name="vanchuyen_dongia_mt[]" type="text" id="vanchuyen_dongia_mt' . $vc_mt . '" /> <select name="dongia_option_mt[]" class="dongia_option" id="dongia_option_mt' . $vc_mt . '">' . get_select_options_with_id($app_list_strings['vanchuyen_dongia_option'], '') . '</select></td>';
            $html .= '<td width="10%" class="dataField"><input class="soluong center" name="vanchuyen_soluong_mt[]" type="text" id="vanchuyen_soluong_mt' . $vc_mt . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="songay center" name="vanchuyen_songay_mt[]" type="text" id="vanchuyen_songay_mt' . $vc_mt . '" size="10" /></td>';
//            $html .= '<td width="10%" class="dataField"><input class="foc center" name="vanchuyen_foc_mt[]" type="text" id="vanchuyen_foc_mt' . $vc_mt . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="vanchuyen_thanhtien_mt[]" type="text" id="vanchuyen_thanhtien_mt' . $vc_mt . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="vanchuyen_thuexuat_mt[]" type="text" id="vanchuyen_thuexuat_mt' . $vc_mt . '" value="10"  size="10" /></td>';
            $html .= '<td width="20%" class="dataField"><input class="vat center" name="vanchuyen_vat_mt[]" type="text" id="vanchuyen_vat_mt' . $vc_mt . '" size="10" /></td>';
            $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
            $html .= '</tr> ';
            $vc_mt++;
        }
        $html .= '</tbody></table></fieldset></td></tr>';
    }
}
if (count($vanchuyen_mientrung) > 0) {
    $html .= '<tr><td colspan="9">';
    $html .= '<fieldset >';
    $html .= '<legend><h3>MIỀN TRUNG</h3></legend>';
    $html .= '<table width="100%" class="table_clone" id="vanchuyen_mientrung" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<th width="10%">Lọai xe</th>';
    $html .= '<th width="20%">Đơn giá</th>';
    $html .= '<th width="10%">Số lượng</th>';
    $html .= '<th width="10%">Ngày/Giờ/Km</th>';
//    $html .= '<th width="10%">FOC</th>';
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
//    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%"><input type="text" size="15" class="center" name="vanchuyen_tongthanhtien_mientrung" id="vanchuyen_tongthanhtien_mientrung" value="'.$noidung->vanchuyen_tongthanhtien_mientrung.'"/></th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%"><input type="text" size="15" class="center" name="vanchuyen_tongthue_mientrung" id="vanchuyen_tongthue_mientrung" value="'.$noidung->vanchuyen_tongthue_mientrung.'" /></th>';
    $html .= '<th width="20%">&nbsp;</th>';
    $html .= '</tr>';
    $html .= '</tfoot>';
    $html .= '<tbody>';
    $vc_mt = 1;
    foreach ($vanchuyen_mientrung as $vcValMT) {
        $html .= '<tr>';
        $html .= '<td width="10%" class="dataField"><select class="servicename" name="vanchuyen_name_mt[]" id="vanchuyen_name_mt' . $vc_mt . '">' . get_select_options_with_id($app_list_strings['list_vanchuyen_dom_middle'], $vcValMT->vanchuyen_name_mt) . '</select> </td>';
        $html .= '<td width="20%" class="dataField"><input size="10" class="dongia center" name="vanchuyen_dongia_mt[]" type="text" id="vanchuyen_dongia_mt' . $vc_mt . '" value="' . $vcValMT->vanchuyen_dongia_mt . '" /> <select name="dongia_option_mt[]" class="dongia_option" id="dongia_option_mt' . $vc_mt . '">' . get_select_options_with_id($app_list_strings['vanchuyen_dongia_option'], $vcValMT->dongia_option_mt) . '</select> </td>';
        $html .= '<td width="10%" class="dataField"><input class="soluong center" name="vanchuyen_soluong_mt[]" type="text" id="vanchuyen_soluong_mt' . $vc_mt . '" size="10" value="' . $vcValMT->vanchuyen_soluong_mt . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="songay center" name="vanchuyen_songay_mt[]" type="text" id="vanchuyen_songay_mt' . $vc_mt . '" size="10" value="' . $vcValMT->vanchuyen_songay_mt . '" /></td>';
//        $html .= '<td width="10%" class="dataField"><input class="foc center" name="vanchuyen_foc_mt[]" type="text" id="vanchuyen_foc_mt' . $vc_mt . '" size="10" value="' . $vcValMT->vanchuyen_foc_mt . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="vanchuyen_thanhtien_mt[]" type="text" id="vanchuyen_thanhtien_mt' . $vc_mt . '" size="10" value="' . $vcValMT->vanchuyen_thanhtien_mt . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="vanchuyen_thuexuat_mt[]" type="text" id="vanchuyen_thuexuat_mt' . $vc_mt . '" size="10" value="' . $vcValMT->vanchuyen_thuexuat_mt . '" /></td>';
        $html .= '<td width="20%" class="dataField"><input class="vat center" name="vanchuyen_vat_mt[]" type="text" id="vanchuyen_vat_mt' . $vc_mt . '" size="10" value="' . $vcValMT->vanchuyen_vat_mt . '" /></td>';
        $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
        $html .= '</tr> ';
        $vc_mt++;
    }
    $html .= '</tbody></table></fieldset>';
    $htnl .= '</td></tr>';
}

// lấy danh sách vận chuyển ở miền nam
$vanchuyen_miennam = $noidung->vanchuyen_miennam;
if (count($vanchuyen_miennam) == 0) {
    if (count($vcArrMN) > 0) {
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
//        $html .= '<th width="10%">FOC</th>';
        $html .= '<th width="10%">Thành tiền</th>';
        $html .= '<th width="10%">Thuế suất</th>';
        $html .= '<th width="20%">Thuế</th>';
        $html .= '<th width="20%">&nbsp;</th>';
        $html .= '</tr>';
        $html .= '</thead>'; 
        $html .= '<tfoot>';
        $html .= '<tr>';
        $html .= '<th width="10%">&nbsp;</th>';
//        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%" align="center"><input type="text" size="15" class="center" name="vanchuyen_tongthanhtien_miennam" id="vanchuyen_tongthanhtien_miennam" value="' . $noidung->vanchuyen_tongthanhtien_miennam . '"/></th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%" align="center"><input type="text" size="15" class="center" name="vanchuyen_tongthue_miennam" id="vanchuyen_tongthue_miennam" value="' . $noidung->vanchuyen_tongthue_miennam . '" /></th>';
        $html .= '<th width="20%">&nbsp;</th>';
        $html .= '</tr>';
        $html .= '</tfoot>';
        $html .= '<tbody>';
        $vc_mn = 1;
        foreach ($vcArrMN as $vcVal) {
            $html .= '<tr>';
            $html .= '<td width="10%" class="dataField"><select class="servicename" name="vanchuyen_name_mn[]" id="vanchuyen_name_mn' . $vc_mn . '">' . get_select_options_with_id($app_list_strings['list_vanchuyen_dom_south'], $vcVal['id']) . '</select></td>';
            $html .= '<td width="20%" class="dataField"><input size="10" class="dongia center" name="vanchuyen_dongia_mn[]" type="text" id="vanchuyen_dongia_mn' . $vc_mn . '" /> <select name="dongia_option_mn[]" class="dongia_option" id="dongia_option_mn' . $vc_mn . '">' . get_select_options_with_id($app_list_strings['vanchuyen_dongia_option'], '') . '</select> </td>';
            $html .= '<td width="10%" class="dataField"><input class="soluong center" name="vanchuyen_soluong_mn[]" type="text" id="vanchuyen_soluong_mn' . $vc_mn . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="songay center" name="vanchuyen_songay_mn[]" type="text" id="vanchuyen_songay_mn' . $vc_mn . '" size="10" /></td>';
//            $html .= '<td width="10%" class="dataField"><input class="foc center" name="vanchuyen_foc_mn[]" type="text" id="vanchuyen_foc_mn' . $vc_mn . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="vanchuyen_thanhtien_mn[]" type="text" id="vanchuyen_thanhtien_mn' . $vc_mn . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="vanchuyen_thuexuat_mn[]" type="text" id="vanchuyen_thuexuat_mn' . $vc_mn . '" value="10" size="10" /></td>';
            $html .= '<td width="20%" class="dataField"><input class="vat center" name="vanchuyen_vat_mn[]" type="text" id="vanchuyen_vat_mn' . $vc_mn . '" size="10" /></td>';
            $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
            $html .= '</tr> ';
            $vc_mn++;
        }
        $html .= '</tbody></table></fieldset></td></tr>';
    }
}
if (count($vanchuyen_miennam) > 0) {
    $html .= '<tr><td colspan="9">';
    $html .= '<fieldset>';
    $html .= '<legend><h3>MIỀN NAM</h3></legend>';
    $html .= '<table width="100%" class="table_clone" id="vanchuyen_miennam" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<th width="10%">Lọai xe</th>';
    $html .= '<th width="20%">Đơn giá</th>';
    $html .= '<th width="10%">Số lượng</th>';
    $html .= '<th width="10%">Ngày/Giờ/Km</th>';
//    $html .= '<th width="10%">FOC</th>';
    $html .= '<th width="10%">Thành tiền</th>';
    $html .= '<th width="10%">Thuế suất</th>';
    $html .= '<th width="20%">Thuế</th>';
    $html .= '<th width="20%">&nbsp;</th>';
    $html .= '</tr>';
    $html .= '</thead>';
    $html .= '<tfoot>';
    $html .= '<tr>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%">&nbsp;</th>';
//    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%" align="center"><input type="text" size="15" class="center" name="vanchuyen_tongthanhtien_miennam" id="vanchuyen_tongthanhtien_miennam" value="' . $noidung->vanchuyen_tongthanhtien_miennam . '"/></th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%" align="center"><input type="text" size="15" class="center" name="vanchuyen_tongthue_miennam" id="vanchuyen_tongthue_miennam" value="' . $noidung->vanchuyen_tongthue_miennam . '" /></th>';
    $html .= '<th width="20%">&nbsp;</th>';
    $html .= '</tr>';
    $html .= '</tfoot>';
    $html .= '<tbody>';
    $vc_mn = 1;
    foreach ($vanchuyen_miennam as $vcValMN) {
        $html .= '<tr>';
        $html .= '<td width="10%" class="dataField"><select class="servicename" name="vanchuyen_name_mn[]" id="vanchuyen_name_mn' . $vc_mn . '">' . get_select_options_with_id($app_list_strings['list_vanchuyen_dom_south'], $vcValMN->vanchuyen_name_mn) . '</select></td>';
        $html .= '<td width="20%" class="dataField"><input size="10" class="dongia center" name="vanchuyen_dongia_mn[]" type="text" id="vanchuyen_dongia_mn' . $vc_mn . '" value="' . $vcValMN->vanchuyen_dongia_mn . '" /> <select name="dongia_option_mn[]" class="dongia_option" id="dongia_option_mn' . $vc_mt . '">' . get_select_options_with_id($app_list_strings['vanchuyen_dongia_option'], $vcValMN->dongia_option_mn) . '</select> </td>';
        $html .= '<td width="10%" class="dataField"><input class="soluong center" name="vanchuyen_soluong_mn[]" type="text" id="vanchuyen_soluong_mn' . $vc_mn . '" size="10"  value="' . $vcValMN->vanchuyen_soluong_mn . '"  /></td>';
        $html .= '<td width="10%" class="dataField"><input class="songay center" name="vanchuyen_songay_mn[]" type="text" id="vanchuyen_songay_mn' . $vc_mn . '" size="10"  value="' . $vcValMN->vanchuyen_songay_mn . '"  /></td>';
//        $html .= '<td width="10%" class="dataField"><input class="foc center" name="vanchuyen_foc_mn[]" type="text" id="vanchuyen_foc_mn' . $vc_mn . '" size="10"  value="' . $vcValMN->vanchuyen_foc_mn . '"  /></td>';
        $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="vanchuyen_thanhtien_mn[]" type="text" id="vanchuyen_thanhtien_mn' . $vc_mn . '" size="10"  value="' . $vcValMN->vanchuyen_thanhtien_mn . '"  /></td>';
        $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="vanchuyen_thuexuat_mn[]" type="text" id="vanchuyen_thuexuat_mn' . $vc_mn . '" size="10"  value="' . $vcValMN->vanchuyen_thuexuat_mn . '"  /></td>';
        $html .= '<td width="20%" class="dataField"><input class="vat center" name="vanchuyen_vat_mn[]" type="text" id="vanchuyen_vat_mn' . $vc_mn . '" size="10"  value="' . $vcValMN->vanchuyen_vat_mn . '"  /></td>';
        $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
        $html .= '</tr> ';
        $vc_mn++;
    }
    $html .= '</tbody></table></fieldset>';
    $html .= '</td></tr>';
}
$html .= '</tbody>';
$html .= '</table>';
$html .= '</div>';
$html .= '</div>';
$html .= '</fieldset>';

// ket thuc load du lieu van chuyen

// load data dich vu
$svArr = array();
$svArrMB = array();
$svArrMT = array();
$svArrMN = array();
$svArr = $focus->getServiceData($focus->worksheet_tour_id);
foreach ($svArr as $arrsv) {
    if ($arrsv['area'] == "mienbac") {
        $app_list_strings['list_dichvu_dom_north'][$arrsv['id']] = $arrsv['name'];
        $svArrMB[] = array('id' => $arrsv['id'], 'name' => $arrsv['name'], 'area' => $arrsv['$arrsv']);
    }
    if ($arrsv['area'] == "mientrung") {
        $app_list_strings['list_dichvu_dom_middle'][$arrsv['id']] = $arrsv['name'];
        $svArrMT[] = array('id' => $arrsv['id'], 'name' => $arrsv['name'], 'area' => $arrsv['$arrsv']);
    }
    if ($arrsv['area'] == "miennam") {
        $app_list_strings['list_dichvu_dom_south'][$arrsv['id']] = $arrsv['name'];
        $svArrMN[] = array('id' => $arrsv['id'], 'name' => $arrsv['name'], 'area' => $arrsv['$arrsv']);
    }
}

$html .= '<fieldset >';
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
$html .= '<th><input type="text" size="15" class="center" name="service_tongthanhtien" id="service_tongthanhtien" value="' . $noidung->service_tongthanhtien . '"/></th>';
$html .= '<th>&nbsp;</th>';
$html .= '<th><input type="text" size="15" class="center" name="service_tongthue" id="service_tongthue" value="' . $noidung->service_tongthue . '"/></th>';
$html .= '<th>&nbsp;</th>';
$html .= '</tr>';
$html .= '</tfoot>';
$html .= '<tbody>';
// lấy danh sách dịch vụ miền bắc
$html .= '<tr><td colspan="8">';
$dichvu_mienbac = $noidung->dichvu_mienbac;
if (count($dichvu_mienbac) == 0) {
    if (count($svArrMB) > 0) {
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
        $sv_mb = 1;
        foreach ($svArrMB as $svVal) {
            $html .= '<tr>';
            $html .= '<td width="20%" class="dataField"><select class="servicename" name="services_name_mb[]" id="services_name_mb' . $sv_mb . '">' . get_select_options_with_id($app_list_strings['list_dichvu_dom_north'], $svVal['id']) . '</select> </td>';
            $html .= '<td width="10%" class="dataField"><input size="10" class="dongia center" name="services_dongia_mb[]" type="text" id="services_dongia_mb' . $sv_mb . '" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="soluong center" name="services_soluong_mb[]" type="text" id="services_soluong_mb' . $sv_mb . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="songay center" name="services_songay_mb[]" type="text" id="services_songay_mb' . $sv_mb . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="foc center" name="services_foc_mb[]" type="text" id="services_foc_mb' . $sv_mb . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="services_thanhtien_mb[]" type="text" id="services_thanhtien_mb' . $sv_mb . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="services_thuexuat_mb[]" type="text" id="services_thuexuat_mb' . $sv_mb . '" value="10"  size="10" /></td>';
            $html .= '<td width="20%" class="dataField"><input class="vat center" name="services_vat_mb[]" type="text" id="services_vat_mb' . $sv_mb . '" size="10" /></td>';
            $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
            $html .= '</tr> ';
            $sv_mb++;
        }
        $html .= '</tbody></table></fieldset></td></tr>';
    }
}
if (count($dichvu_mienbac) > 0) {
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
    $html .= '<th width="10%"><input type="text" size="15" class="center" name="service_tongthanhtien_mienbac" id="service_tongthanhtien_mienbac" value="' . $noidung->service_tongthanhtien_mienbac . '"/></th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%"><input type="text" size="15" class="center" name="service_tongthue_mienbac" id="service_tongthue_mienbac" value="' . $noidung->service_tongthue_mienbac . '"/></th>';
    $html .= '<th width="20%">&nbsp;</th>';
    $html .= '</tr>';
    $html .= '</tfoot>';
    $html .= '<tbody>';
    $sv_mb = 1;
    foreach ($dichvu_mienbac as $svValMB) {
        $html .= '<tr>';
        $html .= '<td width="20%" class="dataField"><select class="servicename" name="services_name_mb[]" id="services_name_mb' . $sv_mb . '">' . get_select_options_with_id($app_list_strings['list_dichvu_dom_north'], $svValMB->services_name_mb) . '</select> </td>';
        $html .= '<td width="10%" class="dataField"><input size="10" class="dongia center" name="services_dongia_mb[]" type="text" id="services_dongia_mb' . $sv_mb . '" value="' . $svValMB->services_dongia_mb . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="soluong center" name="services_soluong_mb[]" type="text" id="services_soluong_mb' . $sv_mb . '" size="10" value="' . $svValMB->services_soluong_mb . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="songay center" name="services_songay_mb[]" type="text" id="services_songay_mb' . $sv_mb . '" size="10" value="' . $svValMB->services_songay_mb . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="foc center" name="services_foc_mb[]" type="text" id="services_foc_mb' . $sv_mb . '" size="10" value="' . $svValMB->services_foc_mb . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="services_thanhtien_mb[]" type="text" id="services_thanhtien_mb' . $sv_mb . '" size="10" value="' . $svValMB->services_thanhtien_mb . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="services_thuexuat_mb[]" type="text" id="services_thuexuat_mb' . $sv_mb . '" size="10" value="' . $svValMB->services_thuexuat_mb . '" /></td>';
        $html .= '<td width="20%" class="dataField"><input class="vat center" name="services_vat_mb[]" type="text" id="services_vat_mb' . $sv_mb . '" size="10" value="' . $svValMB->services_vat_mb . '" /></td>';
        $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
        $html .= '</tr> ';
        $sv_mb++;
    }
    $html .= '</tbody></table></fieldset>';
    $html .= '</td></tr>';
}

// lấy danh sách dịch vụ miền trung
$dichvu_mientrung = $noidung->dichvu_mientrung;
if (count($dichvu_mientrung) == 0) {
    if (count($svArrMT) > 0) {
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
        $dv_mt = 1;
        foreach ($svArrMT as $svVal) {
            $html .= '<tr>';
            $html .= '<td width="20%" class="dataField"><select class="servicename" name="services_name_mt[]" id="services_name_mt' . $dv_mt . '">' . get_select_options_with_id($app_list_strings['list_dichvu_dom_middle'], $svVal['id']) . '</select> </td>';
            $html .= '<td width="10%" class="dataField"><input size="10" class="dongia center" name="services_dongia_mt[]" type="text" id="services_dongia_mt' . $dv_mt . '" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="soluong center" name="services_soluong_mt[]" type="text" id="services_soluong_mt' . $dv_mt . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="songay center" name="services_songay_mt[]" type="text" id="services_songay_mt' . $dv_mt . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="foc center" name="services_foc_mt[]" type="text" id="services_foc_mt' . $dv_mt . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="services_thanhtien_mt[]" type="text" id="services_thanhtien_mt' . $dv_mt . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="services_thuexuat_mt[]" type="text" id="services_thuexuat_mt' . $dv_mt . '" value="10"  size="10" /></td>';
            $html .= '<td width="20%" class="dataField"><input class="vat center" name="services_vat_mt[]" type="text" id="services_vat_mt' . $dv_mt . '" size="10" /></td>';
            $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
            $html .= '</tr> ';
            $dv_mt++;
        }
        $html .= '</tbody></table></fieldset></td></tr>';
    }
}
if (count($dichvu_mientrung) > 0) {
    $html .= '<tr><td colspan="8">';
    $html .= '<fieldset>';
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
    $html .= '<th width="10%"><input type="text" size="15" class="center" name="service_tongthanhtien_mientrung" id="service_tongthanhtien_mientrung" value="' . $noidung->service_tongthanhtien_mientrung . '"/></th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%"><input type="text" size="15" class="center" name="service_tongthue_mientrung" id="service_tongthue_mientrung" value="' . $noidung->service_tongthue_mientrung . '"/></th>';
    $html .= '<th width="20%">&nbsp;</th>';
    $html .= '</tr>';
    $html .= '</tfoot>';
    $html .= '<tbody>';
    $dv_mt = 1;
    foreach ($dichvu_mientrung as $svValMT) {
        $html .= '<tr>';
        $html .= '<td width="20%" class="dataField"><select class="servicename" name="services_name_mt[]" id="services_name_mt' . $dv_mt . '">' . get_select_options_with_id($app_list_strings['list_dichvu_dom_middle'], $svValMT->services_name_mt) . '</select> </td>';
        $html .= '<td width="10%" class="dataField"><input size="10" class="dongia center" name="services_dongia_mt[]" type="text" id="services_dongia_mt' . $dv_mt . '" value="' . $svValMT->services_dongia_mt . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="soluong center" name="services_soluong_mt[]" type="text" id="services_soluong_mt' . $dv_mt . '" size="10" value="' . $svValMT->services_soluong_mt . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="songay center" name="services_songay_mt[]" type="text" id="services_songay_mt' . $dv_mt . '" size="10" value="' . $svValMT->services_songay_mt . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="foc center" name="services_foc_mt[]" type="text" id="services_foc_mt' . $dv_mt . '" size="10" value="' . $svValMT->services_foc_mt . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="services_thanhtien_mt[]" type="text" id="services_thanhtien_mt' . $dv_mt . '" size="10" value="' . $svValMT->services_thanhtien_mt . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="services_thuexuat_mt[]" type="text" id="services_thuexuat_mt' . $dv_mt . '" size="10" value="' . $svValMT->services_thuexuat_mt . '" /></td>';
        $html .= '<td width="20%" class="dataField"><input class="vat center" name="services_vat_mt[]" type="text" id="services_vat_mt' . $dv_mt . '" size="10" value="' . $svValMT->services_vat_mt . '" /></td>';
        $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
        $html .= '</tr> ';
        $dv_mt++;
    }
    $html .= '</tbody></table></fieldset>';
    $html .= '</td></tr>';
}
// lay danh sách dịch vụ ở miền nam
$dichvu_miennam = $noidung->dichvu_miennam;
if (count($dichvu_miennam) == 0) {
    if (count($svArrMN) > 0) {
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
        $html .= '</head>';
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
        $dv_mv = 1;
        foreach ($svArrMN as $svVal) {
            $html .= '<tr>';
            $html .= '<td width="20%" class="dataField"><select class="servicename" name="services_name_mn[]" id="services_name_mn' . $dv_mv . '">' . get_select_options_with_id($app_list_strings['list_dichvu_dom_south'], $svVal['id']) . '</select></td>';
            $html .= '<td width="10%" class="dataField"><input size="10" class="dongia center" name="services_dongia_mn[]" type="text" id="services_dongia_mn' . $dv_mv . '" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="soluong center" name="services_soluong_mn[]" type="text" id="services_soluong_mn' . $dv_mv . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="songay center" name="services_songay_mn[]" type="text" id="services_songay_mn' . $dv_mv . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="foc center" name="services_foc_mn[]" type="text" id="services_foc_mn' . $dv_mv . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="services_thanhtien_mn[]" type="text" id="services_thanhtien_mn' . $dv_mv . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="services_thuexuat_mn[]" type="text" id="services_thuexuat_mn' . $dv_mv . '" value="10"  size="10" /></td>';
            $html .= '<td width="20%" class="dataField"><input class="vat center" name="services_vat_mn[]" type="text" id="services_vat_mn' . $dv_mv . '" size="10" /></td>';
            $html .= '<td><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
            $html .= '</tr> ';
            $dv_mv++;
        }
        $html .= '</tbody></table></fieldset></td></tr>';
    }
}
if (count($dichvu_miennam) > 0) {
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
    $html .= '<th width="10%"><input type="text" size="15" class="center" name="service_tongthanhtien_miennam" id="service_tongthanhtien_miennam" value="' . $noidung->service_tongthanhtien_miennam . '"/></th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%"><input type="text" size="15" class="center" name="service_tongthue_miennam" id="service_tongthue_miennam" value="' . $noidung->service_tongthue_miennam . '"/></th>';
    $html .= '<th width="20%">&nbsp;</th>';
    $html .= '</tr>';
    $html .= '</tfoot>';
    $html .= '<tbody>';
    $dv_mv = 1;
    foreach ($dichvu_miennam as $svValMN) {
        $html .= '<tr>';
        $html .= '<td width="20%" class="dataField"><select class="servicename" name="services_name_mn[]" id="services_name_mn' . $dv_mv . '">' . get_select_options_with_id($app_list_strings['list_dichvu_dom_south'], $svValMN->services_name_mn) . '</select></td>';
        $html .= '<td width="10%" class="dataField"><input size="10" class="dongia center" name="services_dongia_mn[]" type="text" id="services_dongia_mn' . $dv_mv . '" value="' . $svValMN->services_dongia_mn . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="soluong center" name="services_soluong_mn[]" type="text" id="services_soluong_mn' . $dv_mv . '" size="10" value="' . $svValMN->services_soluong_mn . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="songay center" name="services_songay_mn[]" type="text" id="services_songay_mn' . $dv_mv . '" size="10" value="' . $svValMN->services_songay_mn . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="foc center" name="services_foc_mn[]" type="text" id="services_foc_mn' . $dv_mv . '" size="10" value="' . $svValMN->services_foc_mn . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="services_thanhtien_mn[]" type="text" id="services_thanhtien_mn' . $dv_mv . '" size="10" value="' . $svValMN->services_thanhtien_mn . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="services_thuexuat_mn[]" type="text" id="services_thuexuat_mn' . $dv_mv . '" size="10" value="' . $svValMN->services_thuexuat_mn . '" /></td>';
        $html .= '<td width="20%" class="dataField"><input class="vat center" name="services_vat_mn[]" type="text" id="services_vat_mn' . $dv_mv . '" size="10" value="' . $svValMN->services_vat_mn . '" /></td>';
        $html .= '<td class="dataField"><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
        $html .= '</tr> ';
        $dv_mv++;
    }
    $html .= '</tbody></table></fieldset>';
    $html .= '</td></tr>';
}
$html .= '</tbody>';
$html .= '</table>';
$html .= '</div>';
$html .= '</div>';
$html .= '</fieldset>';

// ket thuc phan dich vu

// phan du lieu tham quan

$tqArr = array();
$tqArrMB = array();
$tqArrMT = array();
$tqArrMN = array();
$tqArr = $focus->getSightseeingData($focus->worksheet_tour_id);
foreach ($tqArr as $arrtq) {
    if ($arrtq['area'] == "mienbac") {
        $app_list_strings['list_thamquan_dom_north'][$arrtq['id']] = $arrtq['name'];
        $tqArrMB[] = array('id' => $arrtq['id'], 'name' => $arrtq['name'], 'area' => $arrtq['area']);
    }
    if ($arrtq['area'] == "mientrung") {
        $app_list_strings['list_thamquan_dom_middle'][$arrtq['id']] = $arrtq['name'];
        $tqArrMT[] = array('id' => $arrtq['id'], 'name' => $arrtq['name'], 'area' => $arrtq['area']);
    }
    if ($arrtq['area'] == "miennam") {
        $app_list_strings['list_thamquan_dom_south'][$arrtq['id']] = $arrtq['name'];
        $tqArrMN[] = array('id' => $arrtq['id'], 'name' => $arrtq['name'], 'area' => $arrtq['area']);
    }
}

$html .= '<fieldset>';
$html .= '<legend> <h3>THAM QUAN</h3></legend>';
$html .= '<div>';
$html .= '<p>&nbsp;</p>'; 
$html .= '<a class="showdiv"><img src="custom/themes/default/images/btndown.png" width="30" height="30" title="phóng to"/></a> &nbsp; <a class="hidediv"><img src="custom/themes/default/images/btnup.png" width="30" height="30" title="thu nhỏ"/></a>' ; 
$html .= '<div class="displayandshow">';
$html .= '<table width="100%" class="tabForm" border="0" id="thamquan" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
$html .= '<tfoot>';
$html .= '<tr>';
$html .= '<th>TỔNG CỘNG</th>';
$html .= '<th>&nbsp;</th>';
$html .= '<th>&nbsp;</th>';
//$html .= '<th>&nbsp;</th>';
$html .= '<th>&nbsp;</th>';
$html .= '<th>&nbsp;</th>';
$html .= '<th>&nbsp;</th>';
$html .= '<th><input type="text" size="15" class="center" name="thamquan_tongthanhtien" id="thamquan_tongthanhtien" size="15" value="' . $noidung->thamquan_tongthanhtien . '"/></th>';
$html .= '<th>&nbsp;</th>';
$html .= '<th><input type="text" size="15" class="center" name="thamquan_tongthue" id="thamquan_tongthue" size="15" value="' . $noidung->thamquan_tongthue . '"/></th>';
$html .= '<th>&nbsp;</th>';
$html .= '</tr>';
$html .= '</tfoot>';
$html .= '<tbody>';

// lấy danh sách tham quan tại miền bắc

$thamquan_mienbac = $noidung->thamquan_mienbac;
if (count($thamquan_mienbac) == 0) {
    if (count($tqArrMB) > 0) {
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
//        $html .= '<th>FOC</th>';
        $html .= '<th>Thành tiền</th>';
        $html .= '<th>Thuế suất</th>';
        $html .= '<th>Thuế</th>';
        $html .= '<th>&nbsp;</th>';
        $html .= '</tr>';

        $html .= '<thead>';
        $html .='<tfoot>';
        $html .= '<tr>';
                $html .= '<th width="10%">&nbsp;</th>';
                $html .= '<th width="10%">&nbsp;</th>';
                $html .= '<th width="10%">&nbsp;</th>';
                $html .= '<th width="10%">&nbsp;</th>';
                $html .= '<th width="10%">&nbsp;</th>';
                $html .= '<th width="10%">&nbsp;</th>';
                $html .= '<th width="10%">&nbsp;</th>';
                $html .= '<th width="10%"><input type="text" size="15" class="center" name="thamquan_tongthanhtien_mienbac" id="thamquan_tongthanhtien_mienbac" size="15"/></th>';
                $html .= '<th width="10%">&nbsp;</th>';
                $html .= '<th width="10%"><input type="text" size="15" class="center" name="thamquan_tongthue_mienbac" id="thamquan_tongthue_mienbac" size="15"/></th>';
                $html .= '<th width="10%">&nbsp;</th>';
                $html .= '</tr>';
        $html.='</tfoot>';
        $html .= '<tbody>';
        $tq_mb = 1;
        foreach ($tqArrMB as $tqVal) {
            $html .= '<tr>';
            $html .= '<td width="10%" class="dataField"><select class="servicename" name="thamquan_name_mb[]" id="thamquan_name_mb' . $tq_mb . '">' . get_select_options_with_id($app_list_strings['list_thamquan_dom_north'], $tqVal['id']) . '</select> </td>';
            $html .= '<td width="10%" class="dataField"><input type="text" size="10" class="thamquan_dongianl dongia center" name="thamquan_gianguoilon_mb[]" id="thamquan_gianguoilon_mb' . $tq_mb . '"/> </td>';
            $html .= '<td width="10%" class="dataField"><input size="10" class="thamquan_soluongnl center" name="thamquan_soluongnguoilon_mb[]" type="text" id="thamquan_soluongnguoilon_mb' . $tq_mb . '" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thamquan_dongiate dongia center" name="thamquan_dongiatreem_mb[]" type="text" id="thamquan_dongiatreem_mb' . $tq_mb . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thamquan_soluongte center" name="thamquan_soluongtreem_mb[]" type="text" id="thamquan_soluongtreem_mb' . $tq_mb . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="songay center" name="thamquan_songay_mb[]" type="text" id="thamquan_songay_mb' . $tq_mb . '" size="10" /></td>';
//            $html .= '<td width="10%" class="dataField"><input class="foc center" name="thamquan_foc_mb[]" type="text" id="thamquan_foc_mb' . $tq_mb . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="thamquan_thanhtien_mb[]" type="text" id="thamquan_thanhtien_mb' . $tq_mb . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="thamquan_thuesuat_mb[]" type="text" id="thamquan_thuesuat_mb' . $tq_mb . '" value="10" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="vat center" name="thamquan_vat_mb[]" type="text" id="thamquan_vat_mb' . $tq_mb . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
            $html .= '</tr> ';
            $tq_mb++;
        }
        $html .= '</tbody></table></fieldset></td></tr>';
    }
}
if (count($thamquan_mienbac) > 0) {
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
    $html .= '<th>Số Lần/Lượt</th>';
//    $html .= '<th>FOC</th>';
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
//    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%"><input type="text" size="15" class="center" name="thamquan_tongthanhtien_mienbac" id="thamquan_tongthanhtien_mienbac" size="15" value="' . $noidung->thamquan_tongthanhtien_mienbac . '"/></th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%"><input type="text" size="15" class="center" name="thamquan_tongthue_mienbac" id="thamquan_tongthue_mienbac" size="15" value="' . $noidung->thamquan_tongthue_mienbac . '"/></th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '</tr>';
    $html .= '</tfoot>';
    $html .= '<tbody>';
    $tq_mb = 1;
    foreach ($thamquan_mienbac as $tqValMB) {
        $html .= '<tr>';
        $html .= '<td width="10%" class="dataField"><select class="servicename" name="thamquan_name_mb[]" id="thamquan_name_mb' . $tq_mb . '">' . get_select_options_with_id($app_list_strings['list_thamquan_dom_north'], $tqValMB->thamquan_name_mb) . '</select> </td>';
        $html .= '<td width="10%" class="dataField"><input type="text" size="10" class="thamquan_dongianl dongia center" name="thamquan_gianguoilon_mb[]" id="thamquan_gianguoilon_mb' . $tq_mb . '" value="' . $tqValMB->thamquan_gianguoilon_mb . '"/> </td>';
        $html .= '<td width="10%" class="dataField"><input size="10" class="thamquan_soluongnl center" name="thamquan_soluongnguoilon_mb[]" type="text" id="thamquan_soluongnguoilon_mb' . $tq_mb . '" value="' . $tqValMB->thamquan_soluongnguoilon_mb . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="thamquan_dongiate dongia center" name="thamquan_dongiatreem_mb[]" type="text" id="thamquan_dongiatreem_mb' . $tq_mb . '" size="10" value="' . $tqValMB->thamquan_dongiatreem_mb . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="thamquan_soluongte center" name="thamquan_soluongtreem_mb[]" type="text" id="thamquan_soluongtreem_mb' . $tq_mb . '" size="10" value="' . $tqValMB->thamquan_soluongtreem_mb . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="songay center" name="thamquan_songay_mb[]" type="text" id="thamquan_songay_mb' . $tq_mb . '" size="10" value="' . $tqValMB->thamquan_songay_mb . '" /></td>';
//        $html .= '<td width="10%" class="dataField"><input class="foc center" name="thamquan_foc_mb[]" type="text" id="thamquan_foc_mb' . $tq_mb . '" size="10" value="' . $tqValMB->thamquan_foc_mb . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="thamquan_thanhtien_mb[]" type="text" id="thamquan_thanhtien_mb' . $tq_mb . '" size="10" value="' . $tqValMB->thamquan_thanhtien_mb . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="thamquan_thuesuat_mb[]" type="text" id="thamquan_thuesuat_mb' . $tq_mb . '" size="10"  value="' . $tqValMB->thamquan_thuesuat_mb . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="vat center" name="thamquan_vat_mb[]" type="text" id="thamquan_vat_mb' . $tq_mb . '" size="10" value="' . $tqValMB->thamquan_vat_mb . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
        $html .= '</tr> ';
        $tq_mb++;
    }
    $html .= '</tbody></table></fieldset>';
    $html .= '</td></tr>';
}

//  lấy danh sách tham quan tại miền trung

$thamquan_mientrung = $noidung->thamquan_mientrung;

if (count($thamquan_mientrung) == 0) {
    if (count($tqArrMT) > 0) {
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
        $html .= '<th>Số Lần/Lượt</th>';
//        $html .= '<th>FOC</th>';
        $html .= '<th>Thành tiền</th>';
        $html .= '<th>Thuế suất</th>';
        $html .= '<th>Thuế</th>';
        $html .= '<th>&nbsp;</th>';
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tfoot>';
        $html .= '<tr>';
        $html .= '<th width="10%">&nbsp;</th>';
//        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%"><input type="text" size="15" class="center" name="thamquan_tongthanhtien_mientrung" id="thamquan_tongthanhtien_mientrung" size="15"/></th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%"><input type="text" size="15" class="center" name="thamquan_tongthue_mientrung" id="thamquan_tongthue_mientrung" size="15"/></th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '</tr>';
        $html .= '</tfoot>';
        $html .= '<tbody>';
        $tq_mt = 1;
        foreach ($tqArrMT as $tqVal) {
            $html .= '<tr>';
            $html .= '<td width="10%" class="dataField"><select class="servicename" name="thamquan_name_mt[]" id="thamquan_name_mt' . $tq_mt . '">' . get_select_options_with_id($app_list_strings['list_thamquan_dom_middle'], $tqVal['id']) . '</select> </td>';
            $html .= '<td width="10%" class="dataField"><input type="text" size="10" class="thamquan_dongianl dongia center" name="thamquan_gianguoilon_mt[]" id="thamquan_gianguoilon_mt' . $tq_mt . '"/> </td>';
            $html .= '<td width="10%" class="dataField"><input size="10" class="thamquan_soluongte center" name="thamquan_soluongnguoilon_mt[]" type="text" id="thamquan_soluongnguoilon_mt' . $tq_mt . '" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thamquan_dongiate dongia center" name="thamquan_dongiatreem_mt[]" type="text" id="thamquan_dongiatreem_mt' . $tq_mt . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thamquan_soluongte center" name="thamquan_soluongtreem_mt[]" type="text" id="thamquan_soluongtreem_mt' . $tq_mt . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="songay center" name="thamquan_songay_mt[]" type="text" id="thamquan_songay_mt' . $tq_mt . '" size="10" /></td>';
//            $html .= '<td width="10%" class="dataField"><input class="foc center" name="thamquan_foc_mt[]" type="text" id="thamquan_foc_mt' . $tq_mt . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="thamquan_thanhtien_mt[]" type="text" id="thamquan_thanhtien_mt' . $tq_mt . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="thamquan_thuesuat_mt[]" type="text" id="thamquan_thuesuat_mt' . $tq_mt . '" value="10"  size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="vat center" name="thamquan_vat_mt[]" type="text" id="thamquan_vat_mt' . $tq_mt . ' size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
            $html .= '</tr> ';
            $tq_mt++;
        }
        $html .= '</tbody></table></fieldset></td></tr>';
    }
}
if (count($thamquan_mientrung) > 0) {
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
    $html .= '<th>Số Lần/Lượt</th>';
//    $html .= '<th>FOC</th>';
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
//    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%"><input type="text" size="15" class="center" name="thamquan_tongthanhtien_mientrung" id="thamquan_tongthanhtien_mientrung" size="15" value="' . $noidung->thamquan_tongthanhtien_mientrung . '"/></th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%"><input type="text" size="15" class="center" name="thamquan_tongthue_mientrung" id="thamquan_tongthue_mientrung" size="15" value="' . $noidung->thamquan_tongthue_mientrung . '"/></th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '</tr>';
    $html .= '</tfoot>';
    $html .= '<tbody>';
    $tq_mt = 1;
    foreach ($thamquan_mientrung as $tqValMT) {
        $html .= '<tr>';
        $html .= '<td width="10%" class="dataField"><select class="servicename" name="thamquan_name_mt[]" id="thamquan_name_mt' . $tq_mt . '">' . get_select_options_with_id($app_list_strings['list_thamquan_dom_middle'], $tqValMT->thamquan_name_mt) . '</select> </td>';
        $html .= '<td width="10%" class="dataField"><input type="text" size="10" class="thamquan_dongianl dongia center" name="thamquan_gianguoilon_mt[]" id="thamquan_gianguoilon_mt' . $tq_mt . '" value="' . $tqValMT->thamquan_gianguoilon_mt . '"/> </td>';
        $html .= '<td width="10%" class="dataField"><input size="10" class="thamquan_soluongnl center" name="thamquan_soluongnguoilon_mt[]" type="text" id="thamquan_soluongnguoilon_mt' . $tq_mt . '" value="' . $tqValMT->thamquan_soluongnguoilon_mt . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="thamquan_dongiate dongia center" name="thamquan_dongiatreem_mt[]" type="text" id="thamquan_dongiatreem_mt' . $tq_mt . '" size="10" value="' . $tqValMT->thamquan_dongiatreem_mt . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="thamquan_soluongte center" name="thamquan_soluongtreem_mt[]" type="text" id="thamquan_soluongtreem_mt' . $tq_mt . '" size="10" value="' . $tqValMT->thamquan_soluongtreem_mt . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="songay center" name="thamquan_songay_mt[]" type="text" id="thamquan_songay_mt' . $tq_mt . '" size="10" value="' . $tqValMT->thamquan_songay_mt . '" /></td>';
//        $html .= '<td width="10%" class="dataField"><input class="foc center" name="thamquan_foc_mt[]" type="text" id="thamquan_foc_mt' . $tq_mt . '" size="10" value="' . $tqValMT->thamquan_foc_mt . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="thamquan_thanhtien_mt[]" type="text" id="thamquan_thanhtien_mt' . $tq_mt . '" size="10" value="' . $tqValMT->thamquan_thanhtien_mt . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="thamquan_thuesuat_mt[]" type="text" id="thamquan_thuesuat_mt' . $tq_mt . '" size="10" value="' . $tqValMT->thamquan_thuesuat_mt . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="vat center" name="thamquan_vat_mt[]" type="text" id="thamquan_vat_mt' . $tq_mt . '" size="10" value="' . $tqValMT->thamquan_vat_mt . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
        $html .= '</tr> ';
        $tq_mt++;
    }
    $html .= '</tbody></table></fieldset>';
    $html .= '</td></tr>';
}
/// lấy danh sách tham quan tại miền nam
$thamquan_miennam = $noidung->thamquan_miennam;
if (count($thamquan_miennam) == 0) {
    if (count($tqArrMN) > 0) {
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
        $html .= '<th>Số Lần/Lượt</th>';
//        $html .= '<th>FOC</th>';
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
//        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%"><input type="text" size="15" class="center" name="thamquan_tongthanhtien_miennam" id="thamquan_tongthanhtien_miennam" size="15"/></th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '<th width="10%"><input type="text" size="15" class="center" name="thamquan_tongthue_mienam" id="thamquan_tongthue_mienam" size="15"/></th>';
        $html .= '<th width="10%">&nbsp;</th>';
        $html .= '</tr>';
        $html .= '</tfoot>';
        $html .= '<tbody>';
        $tq_mn = 1;
        foreach ($tqArrMN as $tqVal) {
            $html .= '<tr>';
            $html .= '<td width="10%" class="dataField"><select class="servicename" name="thamquan_name_mn[]" id="thamquan_name_mn' . $tq_mn . '">' . get_select_options_with_id($app_list_strings['list_thamquan_dom_south'], $tqVal['id']) . '</select> </td>';
            $html .= '<td width="10%" class="dataField"><input type="text" size="10" class="thamquan_dongianl dongia center" name="thamquan_gianguoilon_mn[]" id="thamquan_gianguoilon_mn' . $tq_mn . '"/> </td>';
            $html .= '<td width="10%" class="dataField"><input size="10" class="thamquan_soluongte center" name="thamquan_soluongnguoilon_mn[]" type="text" id="thamquan_soluongnguoilon_mn' . $tq_mn . '" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thamquan_dongiate dongia center" name="thamquan_dongiatreem_mn[]" type="text" id="thamquan_dongiatreem_mn' . $tq_mn . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thamquan_soluongte center" name="thamquan_soluongtreem_mn[]" type="text" id="thamquan_soluongtreem_mn' . $tq_mn . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="songay center" name="thamquan_songay_mn[]" type="text" id="thamquan_songay_mn' . $tq_mn . '" size="10" /></td>';
//            $html .= '<td width="10%" class="dataField"><input class="foc center" name="thamquan_foc_mn[]" type="text" id="thamquan_foc_mn' . $tq_mn . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="thamquan_thanhtien_mn[]" type="text" id="thamquan_thanhtien_mn' . $tq_mn . '" size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="thamquan_thuesuat_mn[]" type="text" id="thamquan_thuesuat_mn' . $tq_mn . '" value="10"  size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input class="vat center" name="thamquan_vat_mn[]" type="text" id="thamquan_vat_mn' . $tq_mn . ' size="10" /></td>';
            $html .= '<td width="10%" class="dataField"><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
            $html .= '</tr> ';
            $tq_mn++;
        }
        $html .= '</tbody></table></fieldset></td></tr>';
    }
}
if (count($thamquan_miennam) > 0) {
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
    $html .= '<th>Số Lần/Lượt</th>';
//    $html .= '<th>FOC</th>';
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
//    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%"><input type="text" size="15" class="center" name="thamquan_tongthanhtien_miennam" id="thamquan_tongthanhtien_miennam" size="15" value="' . $noidung->thamquan_tongthanhtien_miennam . '"/></th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '<th width="10%"><input type="text" size="15" class="center" name="thamquan_tongthue_mienam" id="thamquan_tongthue_mienam" size="15" value="' . $noidung->thamquan_tongthue_mienam . '"/></th>';
    $html .= '<th width="10%">&nbsp;</th>';
    $html .= '</tr>';
    $html .= '</tfoot>';
    $html .= '<tbody>';
    $tq_mn = 1;
    foreach ($thamquan_miennam as $tqValMN) {
        $html .= '<tr>';
        $html .= '<td width="10%" class="dataField"><select class="servicename" name="thamquan_name_mn[]" id="thamquan_name_mn' . $tq_mn . '">' . get_select_options_with_id($app_list_strings['list_thamquan_dom_south'], $tqValMN->thamquan_name_mn) . '</select> </td>';
        $html .= '<td width="10%" class="dataField"><input type="text" size="10" class="thamquan_dongianl dongia center" name="thamquan_gianguoilon_mn[]" id="thamquan_gianguoilon_mn' . $tq_mn . '" value="' . $tqValMN->thamquan_gianguoilon_mn . '"/> </td>';
        $html .= '<td width="10%" class="dataField"><input size="10" class="thamquan_soluongnl center" name="thamquan_soluongnguoilon_mn[]" type="text" id="thamquan_soluongnguoilon_mn' . $tq_mn . '" value="' . $tqValMN->thamquan_soluongnguoilon_mn . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="thamquan_dongiate dongia center" name="thamquan_dongiatreem_mn[]" type="text" id="thamquan_dongiatreem_mn' . $tq_mn . '" size="10" value="' . $tqValMN->thamquan_dongiatreem_mn . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="thamquan_soluongte center" name="thamquan_soluongtreem_mn[]" type="text" id="thamquan_soluongtreem_mn' . $tq_mn . '" size="10" value="' . $tqValMN->thamquan_soluongtreem_mn . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="songay center" name="thamquan_songay_mn[]" type="text" id="thamquan_songay_mn' . $tq_mn . '" size="10" value="' . $tqValMN->thamquan_songay_mn . '" /></td>';
//        $html .= '<td width="10%" class="dataField"><input class="foc center" name="thamquan_foc_mn[]" type="text" id="thamquan_foc_mn' . $tq_mn . '" size="10" value="' . $tqValMN->thamquan_foc_mn . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="thanhtien center" name="thamquan_thanhtien_mn[]" type="text" id="thamquan_thanhtien_mn' . $tq_mn . '" size="10" value="' . $tqValMN->thamquan_thanhtien_mn . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="thuesuat center" name="thamquan_thuesuat_mn[]" type="text" id="thamquan_thuesuat_mn' . $tq_mn . '" size="10" value="10"  value="' . $tqValMN->thamquan_thuesuat_mn . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input class="vat center" name="thamquan_vat_mn[]" type="text" id="thamquan_vat_mn' . $tq_mn . '" size="10" value="' . $tqValMN->thamquan_vat_mn . '" /></td>';
        $html .= '<td width="10%" class="dataField"><input type="button" class="btnAddRow" value="Add Row"/><input type="button" class="btnDelRow" value="Delete Row"/></td>';
        $html .= '</tr> ';
        $tq_mn++;
    }
    $html .= '</tbody></table></fieldset>';
    $html .= '</td></tr>';
}
$html .= '</body>';
$html .= '</table>';
$html .= '</div>';
$html .= '</div>';
$html .= '</fieldset>';


// chi phi huong dan vien

$htmlhdvmb = '';
$huongdanvienmb = $noidung->huongdanvienmb;
if (count($huongdanvienmb) > 0) {
    foreach ($huongdanvienmb as $val) {
        $htmlhdvmb .= '<tr>';
        $htmlhdvmb .= '<td><input type="text" name="loaichiphi_cphdv_mb[]" id="loaichiphi_cphdv_mb" value="' . $val->loaichiphi . '"/></td>';
        $htmlhdvmb .= '<td><input type="text" class="center soluong" name="soduong_cphdv_mb[]" id="soduong_cphdv_mb" value="' . $val->soluong . '"/></td>';
        $htmlhdvmb .= '<td><input type="text" class="center dongia" name="dongia_cphdv_mb[]" id="dongia_cphdv_mb" value="' . $val->dongia . '"/></td>';
        $htmlhdvmb .= '<td><input type="text" class="center songay" name="solan_cphdv_mb[]" id="solan_cphdv_mb" value="'.$val->solan.'"/></td>';
        $htmlhdvmb .= '<td><input type="text" class="center thanhtien" name="thanhtien_cphdv_mb[]" id="thanhtien_cphdv_mb" value="' . $val->thanhtien . '"/></td>';
        $htmlhdvmb .= '<td><input type="text" class="center thuesuat" name="thuesuat_cphdv_mb[]" id="thuesuat_cphdv_mb" value="' . $val->thuesuat . '"/></td>';
        $htmlhdvmb .= '<td><input type="text" class="center vat" name="vat_cphdv_mb[]" id="vat_cphdv_mb" value="'.$val->vat.'"/></td>';
        $htmlhdvmb .= '<td align="center"><input type="button" class="btnDelRow" value="Delete Row" /></td>';
        $htmlhdvmb .= '</tr>';
    }
    $ss->assign('htmlhdvmb', $htmlhdvmb);
}

$htmlhdvmt = '';
$huongdanvienmt = $noidung->huongdanvienmt;
if (count($huongdanvienmt) > 0) {
    foreach ($huongdanvienmt as $val) {
        $htmlhdvmt .= '<tr>';
        $htmlhdvmt .= '<td><input type="text" name="loaichiphi_cphdv_mt[]" id="loaichiphi_cphdv_mt" value="'.$val->loaichiphi.'"/></td>';
        $htmlhdvmt .= '<td><input type="text" class="center soluong" name="soduong_cphdv_mt[]" id="soduong_cphdv_mt" value="'.$val->soluong .'"/></td>';
        $htmlhdvmt .= '<td><input type="text" class="center dongia" name="dongia_cphdv_mt[]" id="dongia_cphdv_mt" value="'.$val->dongia.'"/></td>';
        $htmlhdvmt .= '<td><input type="text" class="center songay" name="solan_cphdv_mt[]" id="solan_cphdv_mt" value="'.$val->solan.'"/></td>';
        $htmlhdvmt .= '<td><input type="text" class="center thanhtien" name="thanhtien_cphdv_mt[]" id="thanhtien_cphdv_mt" value="' . $val->thanhtien . '"/></td>';
        $htmlhdvmt .= '<td><input type="text" class="center thuesuat" name="thuesuat_cphdv_mt[]" id="thuesuat_cphdv_mt" value="' . $val->thuesuat . '"/></td>';
        $htmlhdvmt .= '<td><input type="text" class="center vat" name="vat_cphdv_mt[]" id="vat_cphdv_mt" value="' . $val->vat . '"/></td>';
        $htmlhdvmt .= '<td align="center"><input type="button" class="btnDelRow" value="Delete Row" /></td>';
        $htmlhdvmt .= '</tr>';
    }
    $ss->assign('htmlhdvmt', $htmlhdvmt);
}

$htmlhdvmn = '';
$huongdanvienmn = $noidung->huongdanvienmn;
if (count($huongdanvienmn) > 0) {
    foreach ($huongdanvienmn as $val) {
        $htmlhdvmn .= '<tr>';
        $htmlhdvmn .= '<td><input type="text" name="loaichiphi_cphdv_mn[]" id="loaichiphi_cphdv_mn" value="' . $val->loaichiphi . '"/></td>';
        $htmlhdvmn .= '<td><input type="text" class="center soluong" name="soluong_cphdv_mn[]" id="soluong_cphdv_mn" value="' . $val->soluong . '"/></td>';
        $htmlhdvmn .= '<td><input type="text" class="center dongia" name="dongia_cphdv_mn[]" id="dongia_cphdv_mn" value="' . $val->dongia . '"/></td>';
        $htmlhdvmn .= '<td><input type="text" class="center songay" name="solan_cphdv_mn[]" id="solan_cphdv_mn" value="'.$val->solan.'"/></td>';
        $htmlhdvmn .= '<td><input type="text" class="center thanhtien" name="thanhtien_cphdv_mn[]" id="thanhtien_cphdv_mn" value="' . $val->thanhtien . '"/></td>';
        $htmlhdvmn .= '<td><input type="text" class="center thuesuat" name="thuesuat_cphdv_mn[]" id="thuesuat_cphdv_mn" value="' . $val->thuesuat . '"/></td>';
        $htmlhdvmn .= '<td><input type="text" class="center vat" name="vat_cphdv_mn[]" id="vat_cphdv_mn" value="' . $val->vat . '"/></td>';
        $htmlhdvmn .= '<td align="center"><input type="button" class="btnDelRow" value="Delete Row" /></td>';
        $htmlhdvmn .= '</tr>';
    }
    $ss->assign('htmlhdvmn', $htmlhdvmn);
}
$ss->assign('tongchi_hvd', $noidung->tongchi_hvd);
$ss->assign('tongthue_hvd', $noidung->tongthue_hvd);
$ss->assign('tongchi_hvd_mb', $noidung->tongchi_hvd_mb);
$ss->assign('tongthue_hvd_mb', $noidung->tongthue_hvd_mb);
$ss->assign('tongchi_hvd_mt', $noidung->tongchi_hvd_mt);
$ss->assign('tongthue_hvd_mt', $noidung->tongthue_hvd_mt);
$ss->assign('tongchi_hvd_mn', $noidung->tongchi_hvd_mn);
$ss->assign('tongthue_hvd_mn', $noidung->tongthue_hvd_mn);

// ket thuc phan tham quan
// phan chi phí khác
$htmlchiphikhac = '';
$chiphikhac = $noidung->chiphikhac;
$countchiphikhac = count($chiphikhac);
$ss->assign("COUNTCPK", $countchiphikhac);
$cpk = 1;
if ($countchiphikhac > 0) {
    foreach ($chiphikhac as $chiphikhacval) {
        $htmlchiphikhac .= '<tr>';
        $htmlchiphikhac .= '<td class="dataField"><input type="text" class="loaidichvu" name="chiphikhac_loaidichvu[]" id="chiphikhac_loaidichvu' . $cpk . '" value="' . $chiphikhacval->chiphikhac_loaidichvu . '"></td>';
        $htmlchiphikhac .= '<td class="dataField"><input type="text" class="soluong cpk_soluong highlight center" name="chiphikhac_soluong[]" id="chiphikhac_soluong' . $cpk . '" value="' . $chiphikhacval->chiphikhac_soluong . '"></td>';
        $htmlchiphikhac .= '<td class="dataField"><input type="text" class="dongia center" name="chiphikhac_dongia[]" id="chiphikhac_dongia' . $cpk . '" value="' . $chiphikhacval->chiphikhac_dongia . '"></td>';
//        $htmlchiphikhac .= '<td class="dataField"><input type="text" class="foc center" name="chiphikhac_foc[]" id="chiphikhac_foc' . $cpk . '" value="' . $chiphikhacval->chiphikhac_foc . '" ></td>';
        $htmlchiphikhac .= '<td class="dataField"><input type="text" class="thanhtien center" name="chiphikhac_thanhtien[]" id="chiphikhac_thanhtien' . $cpk . '" value="' . $chiphikhacval->chiphikhac_thanhtien . '" ></td>';
        $htmlchiphikhac .= '<td class="dataField"><input type="text" class="thuesuat center" name="chiphikhac_thuesuat[]" id="chiphikhac_thuesuat' . $cpk . '" value="' . $chiphikhacval->chiphikhac_thuesuat . '" ></td>';
        $htmlchiphikhac .= '<td class="dataField"><input type="text" class="vat center" name="chiphikhac_vat[]" id="chiphikhac_vat' . $cpk . '" value="' . $chiphikhacval->chiphikhac_vat . '"></td>';
        $htmlchiphikhac .= '<td class="dataField"><input type="button" class="btnAddRow" value="Add Row"> <input type="button" class="btnDelRow" value="Delete Row"></td>';
        $htmlchiphikhac .= '</tr>';
        $cpk++;
    }
}
$ss->assign('CHIPHIKHACHTML', $htmlchiphikhac);


$ss->assign('HTML', $html);
$ss->display("modules/Worksheets/tpls/Inbound.tpl");
unset($_SESSION['record']);
unset($_SESSION['return_id']);
?>
