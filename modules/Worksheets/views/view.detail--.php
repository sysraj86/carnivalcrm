<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    require_once('include/MVC/View/views/view.detail.php');
    require_once('include/DetailView/DetailView.php');
    require_once("include/utils/layout_utils.php");
    class WorksheetsViewDetail extends ViewDetail{
        
        // contructor
        function WorksheetsViewDetail(){
            parent::ViewDetail(); 
        }
        function display(){
            
            $this->getAirlineTicket();
            $this->getListRestaurant();
            $this->getListHotelData();
            $this->getListTransportData();
            $this->getListServiceData();
            $this->getListSightseeingData();
            $this->assignValueToTemplte();
            unset($this->dv->defs['templateMeta']['form']['buttons'][1]);
            parent::display();
        }
        
        function getAirlineTicket(){
            $airArrtk = array();
            global  $app_list_strings;
            $airArrtk = $this->bean->getAirlineTicket($this->bean->worksheet_tour_id);
                foreach($airArrtk as $tk){
                    $app_list_strings['list_airlinetiket_dom'][$tk['id']]= $tk['name'];
                    if($tk['area']=="mienbac"){
                        $app_list_strings['list_airlinetiket_dom_north'][$tk['id']]= $tk['name'];
                    }
                    if($tk['area']=="mientrung"){
                        $app_list_strings['list_airlinetiket_dom_middle'][$tk['id']]= $tk['name'];
                    }
                    if($tk['area']=="miennam"){
                        $app_list_strings['list_airlinetiket_dom_south'][$tk['id']]=$tk['name'];
                    }
                }
        }
        function getListRestaurant(){
            global $app_list_strings;
            $nhArr = array(); 
            $nhArr = $this->bean->getRestaurantData($this->bean->worksheet_tour_id);
            foreach($nhArr as $arr){
                $app_list_strings['list_restaurant_dom'][$arr['id']] = $arr['name'];
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
        }
        
        function getListHotelData(){
            global $app_list_strings;
            $ksArr = array(); 
            $ksArr = $this->bean->getHotelData($this->bean->worksheet_tour_id);
            foreach($ksArr as $arrks){
                $app_list_strings['list_khach_san_dom'][$arrks['id']] = $arrks['name'];
            }
        }
        
        function getListTransportData(){
            global $app_list_strings;
            $vcArr = array(); 
            $vcArr = $this->bean->getTransportData($this->bean->worksheet_tour_id);
            foreach($vcArr as $arrtrans){
                $app_list_strings['list_vanchuyen_dom'][$arrtrans['id']] ='Xe '.$arrtrans['name'].' chỗ'; 
                 if($arrtrans['area'] == 'mienbac'){
                   $app_list_strings['list_vanchuyen_dom_north'][$arrtrans['id']] ='Xe '.$arrtrans['name'].' chỗ'; 
                }
                if($arrtrans['area'] == 'mientrung'){
                   $app_list_strings['list_vanchuyen_dom_middle'][$arrtrans['id']] ='Xe '.$arrtrans['name'].' chỗ'; 
                }
                if($arrtrans['area'] == 'miennam'){
                   $app_list_strings['list_vanchuyen_dom_south'][$arrtrans['id']] ='Xe '.$arrtrans['name'].' chỗ'; 
                }
            }
        }
        
        function getListServiceData(){
            global $app_list_strings;
            $dvArr = array(); 
            $dvArr = $this->bean->getServiceData($this->bean->worksheet_tour_id);
            foreach($dvArr as $arrsv){
                $app_list_strings['list_dichvu_dom'][$arrsv['id']] = $arrsv['name'];
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
        }
        
        function getListSightseeingData(){
            global $app_list_strings;
            $tqArr = array(); 
            $tqArr = $this->bean->getSightseeingData($this->bean->worksheet_tour_id);
            foreach($tqArr as $arrtq){
                $app_list_strings['list_thamquan_dom'][$arrtq['id']]= $arrtq['name']; 
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
        }
        
        
        function assignValueToTemplte(){
            $temp = base64_decode($this->bean->content);
            $noidung = json_decode($temp);
            $html = '';
            $htmlReport = '';
            if($this->bean->type == 'Outbound'){
            // overview 
            $html .= '<table width="100%" border="0" cellspacing="0" class="tabDetailView" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<tr>' ;
                    $html .= '<td class="tabDetailViewDL" width="25%">Người lớn </td>';
                    $html .= '<td class="tabDetailViewDF ct_sl1">'.$noidung->NguoiLon1.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF" >'.$noidung->NguoiLon1.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDL"><strong>Số lượng FOC cho khách hàng :</strong> '.$this->bean->foc_number.'</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                    $html .= '<td class="tabDetailViewDL"  width="25%">Trẻ em dưới 2 tuổi</td>';
                    $html .= '<td class="ct_sl1 tabDetailViewDF">'.$noidung->TreEm2Tuoi1.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF"> '.$noidung->TreEm2Tuoi2.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF">&nbsp;</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                    $html .= '<td class="tabDetailViewDL" width="25%"> Trẻ em từ 2- 12 tuổi</td>';
                    $html .= '<td class="ct_sl1 tabDetailViewDF">'.$noidung->TreEm12Tuoi1.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF">'.$noidung->TreEm12Tuoi2.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDL">&nbsp;</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                    $html .= '<td class="tabDetailViewDL" width="25%">Số bữa ăn</td>';
                    $html .= '<td class="ct_sl1 tabDetailViewDF">'.$noidung->txtSoBuaAn1.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF">'.$noidung->txtSoBuaAn2.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF">&nbsp;</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                    $html .= '<td class="tabDetailViewDL" width="25%">Tour Leader</td>';
                    $html .= '<td class="ct_sl1 tabDetailViewDF">'.$noidung->txtTourLeader1.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF">'.$noidung->txtTourLeader2.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF">&nbsp;</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                    $html .= '<td class="tabDetailViewDL" width="25%">FOC VMB</td>';
                    $html .= '<td class="ct_sl1 tabDetailViewDF">'.$noidung->txtFOCVMB1.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF">'.$noidung->txtFOCVMB2.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF">&nbsp;</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                   $html .= '<td class="tabDetailViewDL" width="25%">FOC Land</td>';
                    $html .= '<td class="ct_sl1 tabDetailViewDF">'.$noidung->txtFOCLand1.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF">'.$noidung->land_treem.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF"><strong>Land 2 trẻ em:</strong> '.$this->bean->land_treem.'</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                    $html .= '<td class="tabDetailViewDL" width="25%">FOC VMB nội địa</td>';
                    $html .= '<td class="ct_sl1 tabDetailViewDF">'.$noidung->txtFOCVMBNoiDia1.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF">'.$noidung->txtFOCVMBNoiDia2.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF">CLTG: '.$noidung->txtCLTG.'</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                    $html .= '<td class="tabDetailViewDL">Single</td>';
                    $html .= '<td class="ct_sl1 tabDetailViewDF">'.$noidung->single1.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF">'.$noidung->single2.'</td>';
                    $html .= '<td align="tabDetaiViewDF" class="ct_sl2">&nbsp;</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                    $html .= '<td class="tabDetailViewDL">Tỷ giá</td>';
                    $html .= '<td class="ct_sl1 tabDetailViewDF">'.$this->bean->tygia.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF">&nbsp;</td>';
                    $html .= '<td align="tabDetaiViewDF" class="ct_sl2">&nbsp;</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                    $html .= '<td class="tabDetailViewDL">Ngày tỷ giá</td>';
                    $html .= '<td class="ct_sl1 tabDetailViewDF">'.$this->bean->ngaytygia.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF">&nbsp;</td>';
                    $html .= '<td align="tabDetaiViewDF" class="ct_sl2">&nbsp;</td>';
                $html .= '</tr>';
            $html .= '</table>';
            
            $html .= '<table cellpadding="0" cellspacing="0" border="1" width="100%" style="border-collapse: collapse;" class="tabDetailView">';
            $html .= '<tr class="tr_color"><td colspan="11" class="tabDetailViewDF tr_color"><b>THU</b></td></tr>';
            $html .= '<tr>';
                $html .= '<td>&nbsp;</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">&nbsp;</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">Ks 3 Sao</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">&nbsp;</td>';
                $html .= '<td colspan="2" align="tabDetaiViewDF" class="ct_sl1 tabDetailViewDF" >KS 4 Sao</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">&nbsp;</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">Ks 3 Sao</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">&nbsp;</td>';
                $html .= '<td colspan="2" align="tabDetaiViewDF" class="ct_sl2 tabDetailViewDF" >Ks 4 Sao</td>';
            $html .= '</tr>';
            $html .= '<tr>';
                $html .= '<td class="tabDetailViewDL" width="25%">Người lớn</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->ks3saonguoilon1,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->ks3saonguoilon2,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->ks3saonguoilon3,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->ks4saonguoilon1,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->ks4saonguoilon2,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->ks3saonguoilon4,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->ks3saonguoilon5,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->ks3saonguoilon6,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->ks4saonguoilon3,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->ks4saonguoilon4,2,'.',',').' $</td>';
            $html .= '</tr>';
            $html .= '<tr>';
                $html .= '<td class="tabDetailViewDL" width="25%">Phụ thu khác (+)</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->ks3saophuthukhac1,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->ks3saophuthukhac2,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->ks3saophuthukhac3,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->ks4saophuthukhac1,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->ks4saophuthukhac2,2,'.',',').' $</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->ks3saophuthukhac4,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->ks3saophuthukhac5,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->ks3saophuthukhac6,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->ks4saophuthukhac3,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->ks4saophuthukhac4,2,'.',',').' $</td>';
            $html .= '</tr>';
            $html .= '<tr>';
                $html .= '<td class="tabDetailViewDL" width="25%">Phụ thu khác (-)</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->ks3saophuthukhac_1,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->ks3saophuthukhac_2,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->ks3saophuthukhac_3,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->ks4saophuthukhac_1,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->ks4saophuthukhac_2,2,'.',',').' $</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->ks3saophuthukhac_4,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->ks3saophuthukhac_5,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->ks3saophuthukhac_6,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->ks4saophuthukhac_3,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->ks4saophuthukhac_4,2,'.',',').' $</td>';

            $html .= '</tr>';
            $html .= '<tr>';
                $html .= '<td class="tabDetailViewDL" width="25%">Single Supp</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->ks3saosinglesupp1,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->ks3saosinglesupp2,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->ks3saosinglesupp3,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->ks4saosinglesupp1,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->ks4saosinglesupp2,2,'.',',').' $</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->ks3saosinglesupp4,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->ks3saosinglesupp5,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->ks3saosinglesupp6,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->ks4saosinglesupp3,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->ks4saosinglesupp4,2,'.',',').' $</td>';
            $html .= '</tr>';
            $html .= '<tr>';
                $html .= '<td class="tabDetailViewDL" width="25%"><b>Tổng thu NL</b></td>';
                $html .= '<td class="tabDetailViewDF ct_sl1">&nbsp;</td>';
                $html .= '<td class="tabDetailViewDF ct_sl1">&nbsp;</td>';
                $html .= '<td class="ct_sl1 tinhtoan tabDetailViewDF">'.number_format($this->bean->tongthunguoilon1,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">&nbsp;&nbsp;&nbsp;</td>';
                $html .= '<td class="ct_sl1 tinhtoan tabDetailViewDF">'.number_format($this->bean->tongthunguoilon2,2,'.',',').'</td>';
                $html .= '<td class="tabDetailViewDF ct_sl2">&nbsp;</td>';
                $html .= '<td class="tabDetailViewDF ct_sl2">&nbsp;</td>';
                $html .= '<td class="ct_sl2 tinhtoan tabDetailViewDF">'.number_format($this->bean->tongthunguoilon3,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">&nbsp;</td>';
                $html .= '<td class="ct_sl2 tinhtoan tabDetailViewDF">'.number_format($this->bean->tongthunguoilon4,2,'.',',').'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
                $html .= '<td class="tabDetailViewDL" width="25%">Trẻ em dưới 2 tuổi</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->treem2tuoi1,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->treem2tuoi2,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->treem2tuoi3,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->treem2tuoi4,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->treem2tuoi5,2,'.',',').' $</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->treem2tuoi7,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->treem2tuoi8,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->treem2tuoi9,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->treem2tuoi10,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->treem2tuoi11,2,'.',',').' $</td>';
            $html .= '</tr>';
            $html .= '<tr>';
                $html .= '<td class="tabDetailViewDL" width="25%">Trẻ em từ 2- 12 tuổi</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->treem12tuoi1,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->treem12tuoi2,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->treem12tuoi3,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->treem12tuoi4,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">'.number_format($noidung->treem12tuoi5,2,'.',',').' $</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->treem12tuoi7,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->treem12tuoi8,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->treem12tuoi9,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->treem12tuoi10,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($noidung->treem12tuoi11,2,'.',',').'$</td>';
            $html .= '</tr>';
            $html .= '<tr>';
                $html .= '<td class="tabDetailViewDL" width="25%"><b>Tổng thu TE</b></td>';
                $html .= '<td class="tabDetailViewDF ct_sl1">&nbsp;</td>';
                $html .= '<td class="tabDetailViewDF ct_sl1">&nbsp;</td>';
                $html .= '<td class="ct_sl1 tinhtoan tabDetailViewDF">'.number_format($this->bean->tongthute1,2,'.',',').'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF">&nbsp;</td>';
                $html .= '<td class="ct_sl1 tinhtoan tabDetailViewDF">'.number_format($this->bean->tongthute1,2,'.',',').'</td>';
                $html .= '<td class="tabDetailViewDF ct_sl2">&nbsp;</td>';
                $html .= '<td class="tabDetailViewDF ct_sl2">&nbsp;</td>';
                $html .= '<td class="ct_sl2 tinhtoan tabDetailViewDF">'.number_format($this->bean->tongthute1,2,'.',',').'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF">&nbsp;</td>';
                $html .= '<td class="ct_sl2 tinhtoan tabDetailViewDF">'.number_format($this->bean->tongthute1,2,'.',',').'</td>';
            $html .= '</tr>';
        $html .= '</table>';
        
        // thu option
        $THUOPTION = $noidung->thuoption;
        $countThuOption = count($THUOPTION); 
        if($countThuOption>0){
        $html .= '<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="0" cellspacing="0" class="tabDetailView">';
        $html .= '<tr>';
            $html .= '<td colspan="7" class="tr_color"><h3>THU OPTION</h3> </td>';
        $html .= '</tr>';
        $html .= '<tr>';
            $html .= '<td class="tabDetailViewDL"><strong>TỔNG THU OPTIONS</strong></td>';
            $html .= '<td class="tabDetailViewDF">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tinhtoan">'.number_format($this->bean->tongtien_thu,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tinhtoan">'.number_format($this->bean->tongtien_thu1,2,'.',',').'</td>';
        $html .= '</tr>';
                
            foreach($THUOPTION as $val){
                $html .= '<tr>';
                $html .= '<td class="tabDetailViewDL">'.number_format($val->thu_dichvu,2,'.',',').'</td>';
                $html .= '<td class="tabDetailViewDF">'.number_format($val->thu_soluong,2,'.',',').'</td>';
                $html .= '<td class="tabDetailViewDF">X</td>';
                $html .= '<td class="tabDetailViewDF">'.number_format($val->thu_dongia,2,'.',',').'</td>';
                $html .= '<td class="tabDetailViewDF">'.number_format($val->thu_thanhtien,2,'.',',').'</td>';
                $html .= '<td class="tabDetailViewDF">'.number_format($val->thu_dongiamot,2,'.',',').'</td>';
                $html .= '<td class="tabDetailViewDF">'.number_format($val->thu_thanhtienmot,2,'.',',').'</td>';
                $html .= '</tr>';
            }
        
    $html .= '</table>';
    }
    // phần chi vận chuyển
    $html .= '<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="0" cellspacing="0" class="tabDetailView">';
    $html .= '<tr>';
        $html .= '<td colspan="11" class="tabDetailViewDF tr_color"><b>CHI</b></td>';
    $html .= '</tr>';
    $html .= '<tr bgcolor="#6699FF">';
        $html .= '<td class="tabDetailViewDL" width="25%"><b>VẬN CHUYỂN</b></td>';
        $html .= '<td class="tabDetailViewDL" width="10%"><b>GHI CHÚ</b></td>';
        $html .= '<td class="tabDetailViewDL" width="10%"><b>FOC</b></td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color tinhtoan">'.number_format($this->bean->tongchivanchuyen1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color tinhtoan">'.number_format($this->bean->tongchivanchuyen1,2,'.',',').'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL" width="25%">VMB người lớn</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichuvmbnl,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->focvmbnguoilon,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbnguoilon1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbnguoilon3,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbnguoilon4,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbnguoilon5,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbnguoilon7,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbnguoilon8,2,'.',',').'</td>';

    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL" width="25%">TAX (TẠM TÍNH)</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichutaxtamtinh,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->foctaxtamtinh,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->taxtamtinh1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->taxtamtinh3,2,'.',',').'$</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->taxtamtinh4,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->taxtamtinh5,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->taxtamtinh7,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->taxtamtinh8,2,'.',',').'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL" width="25%">VMB Nội Địa người lớn</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichuvmbndnl,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->focvmbndnguoilon,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbnguoilonnd1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbnguoilonnd3,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbnguoilonnd4,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbnguoilonnd5,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbnguoilonnd7,2,'.',',').'$</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbnguoilonnd8,2,'.',',').'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL" width="25%">XE ĐÓN TIỄN sân bay</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichuxedontien,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->focxedontien,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->xedontien1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->xedontien3,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->xedontien4,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->xedontien5,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->xedontien7,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->xedontien8,2,'.',',').'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL" width="25%">VMB trẻ em dưới 2 tuổi (10%)</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->chichuvmbte2tuoi,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->focvmbteduoi2tuoi,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbtreem2tuoi1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbtreem2tuoi3,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbtreem2tuoi4,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbtreem2tuoi5,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbtreem2tuoi7,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbtreem2tuoi8,2,'.',',').' </td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL" width="25%">VMB Nội địa trẻ em dưới 2 tuổi</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichuvmbndte2tuoi,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->focvmbndteduoi2tuoi,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbtreem2tuoind1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbtreem2tuoind3,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbtreem2tuoind4,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbtreem2tuoind5,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbtreem2tuoind7,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbtreem2tuoind8,2,'.',',').' </td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL" width="25%">VMB trẻ em từ 2-12 tuổi</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichuvmbte12tuoi,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->focvmbte12tuoi,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbtreem12tuoi1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbtreem12tuoi3,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbtreem12tuoi4,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbtreem12tuoi5,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbtreem12tuoi7,2,'.',',').'$</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbtreem12tuoi8,2,'.',',').'</td>';
    $html .= '</tr>';
    $html .= '<tr> ';
        $html .= '<td class="tabDetailViewDL" width="25%">VMB Nội Địa trẻ em 2 - 12 tuổi</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichuvmbndte12tuoi,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->focvmbndte12tuoi,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbtreem12tuoind1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbtreem12tuoind3,2,'.',',').'$</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbtreem12tuoind4,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbtreem12tuoind5,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbtreem12tuoind7,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->vmbtreem12tuoind8,2,'.',',').'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL" width="25%">Tax trẻ em</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichutaxte,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->foctaxte,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->taxtreem1,2,'.',',').'</td>'; 
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->taxtreem3,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->taxtreem4,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->taxtreem5,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->taxtreem7,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->taxtreem8,2,'.',',').'</td>';
    $html .= '</tr>';
$html .= '</table>';

// phần chi landfee 

$html .= '<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="0" cellspacing="0" class="tabDetailView">';
    $html .= '<tr class="tr_color">';
        $html .= '<td class="tabDetailViewDL" width="25%"><b>LANDFEE PACKAGE</b></td>';
        $html .= '<td class="tabDetailViewDL" width="10%"><b>GHI CHÚ</b></td>';
        $html .= '<td class="tabDetailViewDL" width="10%"><b>FOC</b></td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color tinhtoan">'.number_format($this->bean->sumlandfeepackage1,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF tr_color tinhtoan">&nbsp;</td> ';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td> ';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td> ';
        $html .= '<td class="tabDetailViewDF tr_color tinhtoan">'.number_format($this->bean->sumlandfeepackage2,2,'.',',').'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL" width="25%">LANDFEE 1: 3 sao</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichulandfee1_3sao,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->foclandfee1_3sao,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee1_3_1,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee1_3_3,2,'.',',').' $</td>  ';
        $html .= '<td class="tabDetailViewDF">=</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee1_3_4,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee1_3_5,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">X</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee1_3_7,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee1_3_8,2,'.',',').'</td>';
    $html .= '</tr> ';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL" width="25%">LANDFEE 2: 3 sao</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichulandfee2_3sao,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->foclandfee2_3sao,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee_2_3_1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee_2_3_3,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee_2_3_4,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee_2_3_5,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee_2_3_7,2,'.',',').' $</td> ';
        $html .= '<td class="tabDetailViewDF">=</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee_2_3_8,2,'.',',').'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL">LANDFEE 1: 4 sao</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichulandfee1_4sao,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->foclandfee1_4sao,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee_1_4_1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee_1_4_1,2,'.',',').' $</td> ';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee_1_4_1,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee_1_4_1,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee_1_4_1,2,'.',',').' $</td> ';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee_1_4_1,2,'.',',').'</td>';
    $html .= '</tr>';
    $html .= '<tr> ';
        $html .= '<td class="tabDetailViewDL" width="25%">LANDFEE 2: 4 sao</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichulandfee2_4sao,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->foclandfee2_4sao,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee_2_4_1,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">X</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee_2_4_3,2,'.',',').'$</td> ';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee_2_4_4,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee_2_4_5,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee_2_4_7,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee_2_4_8,2,'.',',').'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL" width="25%">Upgrade meal</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichuupgrademeal,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->focupgrademeal,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->upgrade_meal1,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->upgrade_meal1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->upgrade_meal1,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->upgrade_meal1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->upgrade_meal1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->upgrade_meal1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->upgrade_meal1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">=</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->upgrade_meal1,2,'.',',').'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL" width="25%">Optional tour</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichuoptionaltour,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->focoptionaltour,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->optional_tour1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->optional_tour3,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->optional_tour4,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->optional_tour5,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->optional_tour7,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->optional_tour8,2,'.',',').'</td>';
    $html .= '</tr> ';
    $html .= '<tr> ';
        $html .= '<td class="tabDetailViewDL" width="25%">Single Supp</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichusinglesupp,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->focsinglesupp,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->single_supp_1,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->single_supp_3,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->single_supp_4,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->single_supp_5,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->single_supp_7,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">=</td>  ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->single_supp_8,2,'.',',').'</td> ';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL" width="25%">Landfee trẻ em (3 sao) - trẻ em dưới 2 tuổi</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichulandfete3sao2tuoi,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->foclandfeete3saoteduoi2tuoi,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfeetreem_2_3sao1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfeetreem_2_3sao3,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfeetreem_2_3sao4,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfeetreem_2_3sao5,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfeetreem_2_3sao7,2,'.',',').'</td>  ';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfeetreem_2_3sao8,2,'.',',').'</td>  ';
    $html .= '</tr> ';
    $html .= '<tr>  ';
        $html .= '<td class="tabDetailViewDL" width="25%">Landfee trẻ em (3 sao) - trẻ em từ 2-12 tuổi </td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichulandfeete3sao12tuoi,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->foclandfeete3saote12tuoi,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfeetreem12_3sao1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfeetreem12_3sao3,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">=</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfeetreem12_3sao4,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfeetreem12_3sao5,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfeetreem12_3sao7,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">=</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfeetreem12_3sao8,2,'.',',').'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL" width="25%"><p>Landfee trẻ em (4 sao) - trẻ em dưới 2 tuổi</p></td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichulandfee4saote2tuoi,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->foclandfee4saoteduoi2tuoi,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee4sao_treem2tuoi1,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee4sao_treem2tuoi3,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee4sao_treem2tuoi4,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee4sao_treem2tuoi5,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee4sao_treem2tuoi7,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee4sao_treem2tuoi8,2,'.',',').'</td>';
    $html .= '</tr> ';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL" width="25%">Landfee trẻ em (4 sao) - trẻ em từ 2-12 tuổi</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichulandfee4saote12tuoi,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->foclandfee4saote12tuoi,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee4sao_treem12tuoi1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee4sao_treem12tuoi3,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee4sao_treem12tuoi4,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee4sao_treem12tuoi5,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">X</td> ';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee4sao_treem12tuoi7,2,'.',',').'</td> ';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->landfee4sao_treem12tuoi8,2,'.',',').'</td>';
    $html .= '</tr> ';
$html .= '</table>';
            
// phần chi visa

    $html .= '<table cellpadding="0" cellspacing="0" width="100%" border="1" style="border-collapse: collapse;" class="tabDetailView">';
        $html .= '<tr class="tr_color">';
            $html .= '<td class="tabDetailViewDL"><b>VISA</b></td>';
            $html .= '<td class="tabDetailViewDL" width="10%"><b>GHI CHÚ</b></td>';
            $html .= '<td class="tabDetailViewDL" width="10%"><b>FOC</b></td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color tinhtoan">'.number_format($this->bean->sumvisa1,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color tinhtoan">'.number_format($this->bean->sumvisa2,2,'.',',').'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
            $html .= '<td class="tabDetailViewDL" width="25%"><b>Visa (Thủ tục thông hành)</b></td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichuvisa,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->focvisa,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visathonghanh1,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">X</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visathonghanh3,2,'.',',').' $</td>';
            $html .= '<td class="tabDetailViewDF">=</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visathonghanh4,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visathonghanh5,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">X</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visathonghanh7,2,'.',',').' $</td>';
            $html .= '<td class="tabDetailViewDF">=</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visathonghanh8,2,'.',',').'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
            $html .= '<td class="tabDetailViewDL" width="25%">Dịch thuật, công chứng hồ sơ</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichudichthuatcongchung,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->focdichthuatcongchung,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visadichthuat1,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">X</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visadichthuat3,2,'.',',').' $</td>';
            $html .= '<td class="tabDetailViewDF">=</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visadichthuat4,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visadichthuat5,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">X</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visadichthuat7,2,'.',',').' $</td>';
            $html .= '<td class="tabDetailViewDF">=</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visadichthuat8,2,'.',',').'</td>';
        $html .= '</tr>';
        $html .= '<tr>';             
            $html .= '<td class="tabDetailViewDL" width="25%">Phí chuyển phát hồ sơ</td>' ;
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichuchuyenphathoso,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->focchuyenphat,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->phichuyenphathoso1,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">X</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->phichuyenphathoso3,2,'.',',').' $</td> ' ;
            $html .= '<td class="tabDetailViewDF">=</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->phichuyenphathoso4,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->phichuyenphathoso5,2,'.',',').'</td>' ;
            $html .= '<td class="tabDetailViewDF">X</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->phichuyenphathoso7,2,'.',',').' $</td>';
            $html .= '<td class="tabDetailViewDF">=</td> ';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->phichuyenphathoso8,2,'.',',').'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
            $html .= '<td class="tabDetailViewDL" width="25%">Phí thu mới</td> ';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichuphithumoi,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->focchiphimoi,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->phithumoi1,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">X</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->phithumoi3,2,'.',',').' $</td>' ;
            $html .= '<td class="tabDetailViewDF">=</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->phithumoi4,2,'.',',').'</td>' ;
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->phithumoi5,2,'.',',').'</td>' ;
            $html .= '<td class="tabDetailViewDF">X</td> ' ;
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->phithumoi7,2,'.',',').' $</td>';
            $html .= '<td class="tabDetailViewDF">=</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->phithumoi8,2,'.',',').'</td> ' ;
        $html .= '</tr>';
        $html .= '<tr> ';
            $html .= '<td class="tabDetailViewDL" width="25%">Phí Visa trẻ em dưới 2 tuổi</td>' ;
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichuphivisate2tuoi,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->focphivisate2tuoi,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visatreem2tuoi1,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">X</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visatreem2tuoi3,2,'.',',').' $</td>';
            $html .= '<td class="tabDetailViewDF">=</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visatreem2tuoi4,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visatreem2tuoi5,2,'.',',').'</td> ';
            $html .= '<td class="tabDetailViewDF">X</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visatreem2tuoi7,2,'.',',').' $</td> ' ;
            $html .= '<td class="tabDetailViewDF">=</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visatreem2tuoi8,2,'.',',').'</td>';
        $html .= '</tr>' ;
        $html .= '<tr>';
            $html .= '<td class="tabDetailViewDL" width="25%">Phí Visa trẻ em từ 2 - 12 tuổi</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichuphivisate12tuoi,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->focchiphivisate12tuoi,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visatreem12tuoi1,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">X</td> ';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visatreem12tuoi3,2,'.',',').' $</td>';
            $html .= '<td class="tabDetailViewDF">=</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visatreem12tuoi4,2,'.',',').'</td> '  ;
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visatreem12tuoi5,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">X</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visatreem12tuoi7,2,'.',',').' $</td>';
            $html .= '<td class="tabDetailViewDF">=</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visatreem12tuoi8,2,'.',',').'</td> ' ;
        $html .= '</tr>';
    $html .= '</table>';
    
    // phần chi hướng dẫn viên
    
    $html .= '<table class="tabDetailView" border="1" style="border-collapse: collapse;" width="100%" cellpadding="0" cellspacing="0">';
      $html .= '<tr class="tr_color">';
            $html .= '<td class="tabDetailViewDL" width="10%"><b>HƯỚNG DẪN VIÊN</b></td>';
            $html .= '<td class="tabDetailViewDL" width="10%"><b>GHI CHÚ</b></td>';
            $html .= '<td class="tabDetailViewDL" width="10%"><b>FOC</b></td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color tinhtoan">'.number_format($this->bean->sumguide1,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color tinhtoan">'.number_format($this->bean->sumguide1,2,'.',',').'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
            $html .= '<td class="tabDetailViewDL" width="25%">Tour leader</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichutourleader,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->foctourleader,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->tour_leader1,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->tour_leader2,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->tour_leader3,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">=</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->tour_leader4,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->tour_leader5,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->tour_leader6,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->tour_leader7,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">=</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->tour_leader8,2,'.',',').'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
            $html .= '<td class="tabDetailViewDL" width="25%">Chi phí khác</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichuchiphikhac,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->focchiphikhac,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->chiphikhac1,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">X</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->chiphikhac3,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">=</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->chiphikhac4,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->chiphikhac5,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">X</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->chiphikhac7,2,'.',',').'</td>';
            $html .= '<td class="tabDetailViewDF">=</td>';
            $html .= '<td class="tabDetailViewDF">'.number_format($noidung->chiphikhac8,2,'.',',').'</td>';
        $html .= '</tr>';
    $html .= '</table>';
    
    // phần chi dịch vụ khác
    
    $html .= '<table width="100%" cellpadding="0" cellspacing="0" class="tabDetailView" border="1" style="border-collapse: collapse;">';
    $html .= '<tr class="tr_color">';
        $html .= '<td class="tabDetailViewDL" width="25%"><b>DỊCH VỤ KHÁC</b></td>';
        $html .= '<td class="tabDetailViewDL" width="10%"><b>GHI CHÚ</b></td>';
        $html .= '<td class="tabDetailViewDL" width="10%"><b>FOC</b></td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color tinhtoan">'.number_format($this->bean->sumotherservice1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color tinhtoan">'.number_format($this->bean->sumotherservice1,2,'.',',').'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL" width="25%">Bảo hiểm</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichubaohiem,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->focbaohiem,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->baohiem1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->baohiem3,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->baohiem4,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->baohiem5,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->baohiem7,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->baohiem8,2,'.',',').'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL" width="25%">Bảo hiểm trẻ em dưới 2 tuổi</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichubaohiemte2tuoi,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->focbaohiemteduoi2tuoi,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->baohiemtreem2tuoi1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->baohiemtreem2tuoi3,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->baohiemtreem2tuoi4,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->baohiemtreem2tuoi5,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->baohiemtreem2tuoi7,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->baohiemtreem2tuoi8,2,'.',',').'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL" width="25%">Bảo hiểm trẻ em từ 2 - 12 tuổi</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichubaohiemte12tuoi,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->focbaohiemte12tuoi,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->baohiemtreem12tuoi1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->baohiemtreem12tuoi3,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->baohiemtreem12tuoi4,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->baohiemtreem12tuoi5,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->baohiemtreem12tuoi7,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->baohiemtreem12tuoi8,2,'.',',').'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL" width="25%">Tip</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichutip,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->foctip,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visatip1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visatip2,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visatip3,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visatip4,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visatip5,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visatip6,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visatip7,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->visatip8,2,'.',',').'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL" width="25%"><b> QUÀ TẶNG</b></td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichuquatang,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->focquatang,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->quatang1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->quatang3,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->quatang4,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->quatang5,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->quatang7,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->quatang8,2,'.',',').'</td>';
    $html .= '</tr> ';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL" width="25%">Land 2</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichuland2,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->focland2,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->land2_1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->land2_3,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->land2_4,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->land2_5,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->land2_7,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->land2_8,2,'.',',').'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL" width="25%">CPK</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichucpk,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->foccpk,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->cpk1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->cpk3,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->cpk4,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->cpk5,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->cpk7,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->cpk8,2,'.',',').'</td>';
    $html .= '</tr> ';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL" width="25%">Chênh lệch tỷ giá</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->ghichuchenhlachtygia,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->focchenhlechtygia,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->chenhlechtygia1,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->chenhlechtygia3,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->chenhlechtygia4,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->chenhlechtygia5,2,'.',',').'</td>';
        $html .= '<td class="tabDetailViewDF">X</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->chenhlechtygia7,2,'.',',').' $</td>';
        $html .= '<td class="tabDetailViewDF">=</td>';
        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->chenhlechtygia8,2,'.',',').'</td>';
    $html .= '</tr>';
 $html .= '</table>';
 $CHIOPTION = $noidung->chioption;
    $countChiOption = count($CHIOPTION);
    if($countChiOption > 0){
 $html .= '<table cellpadding="0" cellspacing="0" border="1" style="border-collapse: collapse; padding:2" width="100%" class="tabDetailView">';
    $html .= '<tr>';
        $html .= '<td class="tr_color" colspan="5"><h3>CHI OPTION</h3></td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL"><strong>TỔNG CHI OPTIONS</strong></td>';
        $html .= '<td class="tabDetailViewDF">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tinhtoan">'.number_format($this->bean->tongtien_chi,2,'.',',').'</td>';
    $html .= '</tr>';
             foreach($CHIOPTION as $chioption){
                $html .= '<tr>';
                $html .= '<td class="tabDetailViewDL">'.number_format($chioption->chi_dichvu,2,'.',',').'</td>';
                $html .= '<td class="tabDetailViewDF">'.number_format($chioption->chi_soluong,2,'.',',').'</td>';
                $html .= '<td class="tabDetailViewDF">X</td>';
                $html .= '<td class="tabDetailViewDF">'.number_format($chioption->chi_dongia,2,'.',',').'</td>';
                $html .= '<td class="tabDetailViewDF">'.number_format($chioption->chi_thanhtien,2,'.',',').'</td>';
                $html .= '</tr>';
            }   
       
$html .= '</table>';
 }


// phần report

$htmlReport .= '<table cellpadding="0" cellspacing="0" border="1" style="border-collapse: collapse;" width="100%" class="tabDetailView">';
    $htmlReport .= '<tr>';
        $htmlReport .= '<td>&nbsp;</td>';
        $htmlReport .= '<td colspan="2" align="tabDetaiViewDF" class="ct_sl1 tabDetailViewDF">DƯỚI 2 TUỔI</td>';
        $htmlReport .= '<td colspan="2" align="tabDetaiViewDF" class="ct_sl1 tabDetailViewDF">TỪ 2-12 TUỔI</td>';
        $htmlReport .= '<td colspan="2" align="tabDetaiViewDF" class="ct_sl1 tabDetailViewDF">NGƯỜI LỚN</td>';
        $htmlReport .= '<td colspan="2" align="tabDetaiViewDF" class="ct_sl2 tabDetailViewDF">DƯỚI 2 TUỔI</td>';
        $htmlReport .= '<td colspan="2" align="tabDetaiViewDF" class="ct_sl2 tabDetailViewDF">TỪ 2-12 TUỔI</td>';
        $htmlReport .= '<td colspan="2" align="tabDetaiViewDF" class="ct_sl2 tabDetailViewDF">NGƯỜI LỚN</td>';
    $htmlReport .= '</tr>';
    $htmlReport .= '<tr>';
        $htmlReport .= '<td>&nbsp;</td>';
        $htmlReport .= '<td align="tabDetaiViewDF" class="ct_sl1 tabDetailViewDF">Ks 3*</td>';
        $htmlReport .= '<td align="tabDetaiViewDF" class="ct_sl1 tabDetailViewDF">Ks 4*</td>';
        $htmlReport .= '<td align="tabDetaiViewDF" class="ct_sl1 tabDetailViewDF">Ks 3*</td>';
        $htmlReport .= '<td align="tabDetaiViewDF" class="ct_sl1 tabDetailViewDF">Ks 4*</td>';
        $htmlReport .= '<td align="tabDetaiViewDF" class="ct_sl1 tabDetailViewDF">Ks 3*</td>';
        $htmlReport .= '<td align="tabDetaiViewDF" class="ct_sl1 tabDetailViewDF">Ks 4*</td>';
        $htmlReport .= '<td align="tabDetaiViewDF" class="ct_sl2 tabDetailViewDF">Ks 3*</td>';
        $htmlReport .= '<td align="tabDetaiViewDF" class="ct_sl2 tabDetailViewDF">Ks 4*</td>';
        $htmlReport .= '<td align="tabDetaiViewDF" class="ct_sl2 tabDetailViewDF">Ks 3*</td>';
        $htmlReport .= '<td align="tabDetaiViewDF" class="ct_sl2 tabDetailViewDF">Ks 4*</td>';
        $htmlReport .= '<td align="tabDetaiViewDF" class="ct_sl2 tabDetailViewDF">Ks 3*</td>';
        $htmlReport .= '<td align="tabDetaiViewDF" class="ct_sl2 tabDetailViewDF">Ks 4*</td>';
    $htmlReport .= '</tr>';
    $htmlReport .= '<tr>';
        $htmlReport .= '<td width="25%" class="ct_sl3 tabDetailViewDL">TỔNG CHI</td>';
        $htmlReport .= '<td  class="ct_sl2 tabDetailViewDF">'.number_format($this->bean->tongchi1,2,'.',',').'</td>';
        $htmlReport .= '<td  class="ct_sl2 tabDetailViewDF">'.number_format($this->bean->tongchi2,2,'.',',').'</td>';
        $htmlReport .= '<td  class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->tongchi3,2,'.',',').'</td>';
        $htmlReport .= '<td  class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->tongchi4,2,'.',',').'</td>';
        $htmlReport .= '<td  class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->tongchi5,2,'.',',').'</td>';
        $htmlReport .= '<td  class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->tongchi6,2,'.',',').'</td>';
        $htmlReport .= '<td  class="ct_sl2 tabDetailViewDF">'.number_format($this->bean->tongchi7,2,'.',',').'</td>';
        $htmlReport .= '<td  class="ct_sl2 tabDetailViewDF">'.number_format($this->bean->tongchi8,2,'.',',').'</td>';
        $htmlReport .= '<td  class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->tongchi9,2,'.',',').'</td>';
        $htmlReport .= '<td  class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->tongchi10,2,'.',',').'</td>';
        $htmlReport .= '<td  class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->tongchi11,2,'.',',').'</td>';
        $htmlReport .= '<td  class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->tongchi12,2,'.',',').'</td>';
    $htmlReport .= '</tr>';
    $htmlReport .= '<tr>';
        $htmlReport .= '<td width="25%" class="ct_sl3 tabDetailViewDL">GIÁ NET</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($this->bean->gianet1,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($this->bean->gianet2,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->gianet3,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->gianet4,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->gianet5,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->gianet6,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($this->bean->gianet7,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($this->bean->gianet8,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->gianet9,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->gianet10,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->gianet11,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->gianet12,2,'.',',').'</td>';
    $htmlReport .= '</tr>';
    $htmlReport .= '<tr>';
        $htmlReport .= '<td width="25%" class="ct_sl3 tinhtoan tabDetailViewDL">GIÁ BÁN</td>';
        $htmlReport .= '<td class="ct_sl2 tinhtoan tabDetailViewDF">'.number_format($this->bean->giaban1,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl2 tinhtoan tabDetailViewDF">'.number_format($this->bean->giaban2,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tinhtoan tabDetailViewDF">'.number_format($this->bean->giaban3,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tinhtoan tabDetailViewDF">'.number_format($this->bean->giaban4,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tinhtoan tabDetailViewDF">'.number_format($this->bean->giaban5,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tinhtoan tabDetailViewDF">'.number_format($this->bean->giaban6,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl2 tinhtoan tabDetailViewDF">'.number_format($this->bean->giaban7,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl2 tinhtoan tabDetailViewDF">'.number_format($this->bean->giaban8,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tinhtoan tabDetailViewDF">'.number_format($this->bean->giaban9,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tinhtoan tabDetailViewDF">'.number_format($this->bean->giaban10,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tinhtoan tabDetailViewDF">'.number_format($this->bean->giaban11,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tinhtoan tabDetailViewDF">'.number_format($this->bean->giaban12,2,'.',',').'</td>';
    $htmlReport .= '</tr>';
    $htmlReport .= '<tr>';
        $htmlReport .= '<td width="25%" class="ct_sl3 tabDetailViewDL">LÃI/KHÁCH</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($this->bean->laikhach1,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($this->bean->laikhach2,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->laikhach3,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->laikhach4,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->laikhach5,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->laikhach6,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($this->bean->laikhach7,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($this->bean->laikhach8,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->laikhach9,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->laikhach10,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->laikhach11,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->laikhach12,2,'.',',').'</td>';
    $htmlReport .= '</tr>';
    $htmlReport .= '<tr>';
        $htmlReport .= '<td width="25%" class="ct_sl3 tabDetailViewDL">TỔNG LÃI</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($this->bean->tonglai1,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($this->bean->tonglai2,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->tonglai3,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->tonglai4,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->tonglai5,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->tonglai6,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($this->bean->tonglai7,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($this->bean->tonglai8,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->tonglai9,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->tonglai10,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->tonglai11,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->tonglai12,2,'.',',').'</td>';
    $htmlReport .= '</tr>';
    $htmlReport .= '<tr>';
        $htmlReport .= '<td width="25%" class="ct_sl3 tabDetailViewDL">TỶ LỆ</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($this->bean->tyle1,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($this->bean->tyle2,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->tyle3,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->tyle4,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->tyle5,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->tyle6,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($this->bean->tyle7,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF">'.number_format($this->bean->tyle8,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->tyle9,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->tyle10,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->tyle11,2,'.',',').'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF">'.number_format($this->bean->tyle12,2,'.',',').'</td>';
    $htmlReport .= '</tr>';
$htmlReport .= '</table>';
  }
            if($this->bean->type == 'DOS'){
            $html .= '<fieldset>';
                $html .= '<legend><h3>THÔNG TIN CHUNG</h3></legend>';
                $html .= '<table width="100%" class="tabDetailView" border="1" style="border-collapse:collapse;" cellspacing="0" cellpadding="0">';
                    $html .= '<tr>';
                        $html .= '<td class="tabDetailViewDL">Tour name:</td>';
                        $html .= '<td class="tabDetailViewDF">';
                                $html .= '<a href="index.php?module=Tours&action=DetailView&record='.$this->bean->worksheet_tour_id.'">'.$this->bean->worksheet_tour_name.' </a>';
                            $html .= '</td>';
                        $html .= '<td class="tabDetailViewDL">Tour Code:</td>';
                        $html .= '<td class="tabDetailViewDF">';
                                $html .= $this->bean->tourcode;
                            $html .='</td>';
                        $html .= '<td class="tabDetailViewDL">Thời gian:</td>';
                        $html .= '<td class="tabDetailViewDF">';
                                $html .= $this->bean->duration;
                            $html .= '</td>';
                        $html .= '<td class="tabDetailViewDL">Phương tiện:</td>';

                        $html .= '<td class="tabDetailViewDF">';
                            $html .= $this->bean->transport;
                        $html .= '</td>';
                        $html .= '<td class="tabDetailViewDL">&nbsp;</td>';
                        $html .= '<td class="tabDetailViewDF">&nbsp;</td>';
                    $html .= '</tr>';
                    $html .= '<tr>';
                        $html .= '<td class="tabDetailViewDL">Lộ trình:</td>';
                        $html .= '<td class="tabDetailViewDF">';
                                $html .= $this->bean->lotrinh;
                            $html .= '</td>';
                       $html .= '<td class="tabDetailViewDL">Thuế Suất hóa:</td>';
                        $html .= '<td class="tabDetailViewDF">';
                            $html .= $this->bean->thuesuathoa;
                        $html .= '</td>';
                        $html .= '<td class="tabDetailViewDL">Số khách: </td>';
                        $html .= '<td class="tabDetailViewDF">';
                                $html .= $this->bean->sokhach;
                            $html .= '</td>';
                        $html .= '<td class="tabDetailViewDL">Tỷ lệ :</td>';
                        $html .= '<td class="tabDetailViewDF">';
                                $html .= $this->bean->tyle;
                            $html .= '</td>';
                        $html .= '<td class="tabDetailViewDL">&nbsp;</td>';
                        $html .= '<td class="tabDetailViewDL">&nbsp;</td>';
                    $html .= '</tr>'; 
                $html .= '</table>';
                $html .= '</fieldset>';
                
                // THONG TIN CHI PHI VE MAY BAY
                $vemaybay = $noidung->vemaybay; 
                if(count($vemaybay)>0){
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
                    $html .= '<th>Thuế suất</th>';
                    $html .= '<th>Giá chưa thuế</th>';
                    $html .= '<th>VAT</th>';
                    $html .= '<th>Hình thức thanh toán</th>';
                    $html .= '</tr>';
                    $html .= '<tr>';
                    $html .= '<th>Tổng cộng</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>'.$noidung->vemaybay_tongthanhtien.'</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>'.$noidung->vemaybay_tongthue.'</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '</tr>';
                    $html .= '</thead>';
                    $html .= '<tbody>';
                    $vmb_mb = 1;
                        foreach($vemaybay as $airtk){
                            $html .= '<tr>';
                                $html .= '<td class="tabDetailViewDF"><a href="index.php?module=AirlinesTickets&action=DetailView&record='.$airtk->vemaybay.'">'.translate('list_airlinetiket_dom','',$airtk->vemaybay).'</a></td>';
                                $html .= '<td align="center" class="tabDetaiViewDF">'.number_format($airtk->vemaybay_giathamkhao,2,'.',',').'</td>';
                                $html .= '<td align="center" class="tabDetaiViewDF">'.number_format($airtk->vemaybay_dongia,2,'.',',').'</td>';
                                $html .= '<td align="center" class="tabDetaiViewDF">'.$airtk->vemaybay_soluong.'</td>';
                                $html .= '<td align="center" class="tabDetaiViewDF">'.number_format($airtk->vemaybay_thanhtien,2,'.',',').'</td>';
                                $html .= '<td align="center" class="tabDetaiViewDF">'.$airtk->vemaybay_thuesuat.'</td>';
                                $html .= '<td align="center" class="tabDetaiViewDF">'.number_format($airtk->vemaybay_giachuathue,2,'.',',').'</td>';
                                $html .= '<td align="center" class="tabDetaiViewDF">'.$airtk->vemaybay_vat.'</td>';
                                $html .= '<td align="center" class="tabDetaiViewDF">'.translate('hinh_thuc_thanh_toan_dom','',$airtk->vemaybay_hinhthucthanhtoan).'</td>';
                              $html .= '</tr>';
                              $vmb_mb ++;
                        }
                    $html .= '</tbody>';
                    $html .= '</table>';
                    $html .= '</fieldset>'; 
                }
                
                //THONG TIN NHA HANG
                $NHAHANG = $noidung->nhahang;
                
                if(count($NHAHANG)>0){
                    $html .= '<fieldset>';
                        $html .= '<legend><h3>NHÀ HÀNG</h3></legend>';
                        $html .= '<table width="100%" id="nhahang" border="1" cellspacing="0" class="tabDetailView" cellpadding="0" style="border-collapse:collapse">';
                        $html .= '<thead>'; 
                        $html .= '<tr>';
                        $html .= '<th>Tên nhà hàng</th>';
                        $html .= '<th>Giá tham khảo</th>';
                        $html .= '<th>Đơn giá</th>';
                        $html .= '<th>Số lượng</th>';
                        $html .= '<th>Số bữa ăn</th>';
                        $html .= '<th>Thành tiền</th>';
                       // $html .= '<th>Thuế suất</th>';
                        //$html .= '<th>giá chưa thuế</th>';
                        $html .= '<th>VAT</th>';
                        $html .= '<th>Hình thức thanh toán</th>';
                        //$html .= '<th>tạm ứng</th>';
                        $html .= '</tr>';
                        
                        $html .= '<tr>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>'.$noidung->nhahang_tongthanhtien.'</th>';
                        //$html .= '<th>&nbsp;</th>';
                        $html .= '<th>'.$noidung->nhahang_tongthue.'</th>';
                        $html .= '<th>&nbsp;</th>';
                        //$html .= '<th>&nbsp;</th>';
                        $html .= '</tr>';
                        $html .= '</thead>';
                        $html .= '<tbody>';
                        $i = 1;
                    foreach($NHAHANG as $val){
                            $html .= '<tr>';
                                $html .= '<td><a href="index.php?module=Restaurants&action=DetailView&record='.$val->nh_id.'">'.translate('list_restaurant_dom','',$val->nh_id).'</a></td>';
                                $html .= '<td align="center" class="tabDetaiViewDF">'.number_format($val->nh_giathamkhao,2,'.',',').'</td>';
                                $html .= '<td align="center" class="tabDetaiViewDF">'.number_format($val->nh_dongia,2,'.',',').'</td>';
                                $html .= '<td align="center" class="tabDetaiViewDF">'.$val->nh_soluong.'</td>';
                                $html .= '<td align="center" class="tabDetaiViewDF">'.$val->nh_songay.'</td>';
                                $html .= '<td align="center" class="tabDetaiViewDF">'.number_format($val->nh_thanhtien,2,'.',',').'</td>';
                                $html .= '<td align="center" class="tabDetaiViewDF">'.number_format($val->nh_vat,2,'.',',').'</td>';
                                $html .= '<td align="center" class="center"> '.translate('hinh_thuc_thanh_toan_dom','',$val->nh_hinhthucthanhtoan).'</td>';
                            $html .= '</tr> ';
                    }
                    $html .= '</tbody>';
                    $html .= '</table> </fieldset>';
                }
                
                // load data phần khách sạn

                $KHACHSAN = $noidung->khachsan;
                $countks = count($KHACHSAN);
                if($countks>0){
                $html .= '<fieldset>';
                $html .= '<legend><h3>KHÁCH SẠN</h3></legend>';
                $html .= '<table width="100%" border="1" id="khachsan" class="tabDetailView" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                $html .= '<th>Tên khách sạn</th>';
                $html .= '<th>Ghi chú</th>';
                $html .= '<th>Giá tham khảo</th>';
                $html .= '<th>Đơn giá</th>';
                $html .= '<th>Số lượng</th>';
                $html .= '<th>Số đêm</th>';
                $html .= '<th>Thành tiền</th>';
                $html .= '<th>VAT</th>';
                $html .= '<th>Hình thức thanh toán</th>';
                $html .= '</tr>';
                
                $html .= '<tr>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>'.$noidung-> khachsan_tongthanhtien.'</th>';
                $html .= '<th>'.$noidung-> khachsan_tongthue.'</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                $j = 1;
                foreach ($KHACHSAN as $ksval){
                    if($ksval->ks_deleted == 0){
                        $html .= '<tr>';
                            $html .= '<td  class="nottabDetaiViewDF"><a href="index.php?module=Restaurants&action=DetailView&record='.$ksval->ks_id.'">'.translate('list_khach_san_dom','', $ksval->ks_id).'</a></td>';
                            $html .= '<td align="center" class="tabDetaiViewDF">'.$ksval->ks_ghichu.'</td>';
                            $html .= '<td align="center" class="tabDetaiViewDF">'.number_format($ksval->ks_giathamkhao,2,'.',',').'</td>';
                            $html .= '<td align="center" class="tabDetaiViewDF">'.number_format($ksval->ks_dongia,2,'.',',').'</td>';
                            $html .= '<td align="center" class="tabDetaiViewDF">'.$ksval->ks_soluong.'</td>';
                            $html .= '<td align="center" class="tabDetaiViewDF">'.$ksval->ks_songay.'</td>';
                            $html .= '<td align="center" class="tabDetaiViewDF">'.number_format($ksval->ks_thanhtien,2,'.',',').'</td>';
                           // $html .= '<td align="center" class="center">'.$ksval->ks_thuexuat.'</td>';
                           // $html .= '<td align="center" class="center">'.$ksval->ks_giachuathue.'</td>';
                            $html .= '<td align="center" class="tabDetaiViewDF">'.number_format($ksval->ks_vat,2,'.',',').'</td>';
                            $html .= '<td align="center" class="center">'.translate('hinh_thuc_thanh_toan_dom','',$ksval->ks_hinhthucthanhtoan).'</td>';
                            //$html .= '<td align="center" class="center">'.$ksval->ks_tamung.'</td>';
                        $html .= '</tr> ';
                        $j++; 
                    }
                         
                }
                $html .= '</tbody>';
                $html .= '</table> </fieldset>'; 
                }
                
                
                // load phần vận chuyển
                 
                $VANCHUYEN = $noidung->vanchuyen;
                $countvc = count($VANCHUYEN);
                if($countvc>0){
                    $html .= '<fieldset>';
                    $html .= '<legend> <h3>VẬN CHUYỂN</h3></legend>';
                    $html .= '<table width="100%" id="vanchuyen" border="1" class="tabDetailView" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                    $html .= '<thead>';
                    $html .= '<tr>';
                    $html .= '<th>Loại xe</th>';
                    $html .= '<th>Giá tham khảo</th>';
                    $html .= '<th>Đơn giá</th>';
                    $html .= '<th>Số lượng</th>';
                    $html .= '<th>Ngày/Km/Giờ</th>';
                    $html .= '<th>Thành tiền</th>';
                   // $html .= '<th>Thuế suất</th>';
                    //$html .= '<th>giá chưa thuế</th>';
                    $html .= '<th>VAT</th>';
                    $html .= '<th>Hình thức thanh toán</th>';
                   // $html .= '<th>tạm ứng</th>';
                    $html .= '</tr>';
                    
                    $html .= '<tr>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>'.$noidung-> vanchuyen_tongthanhtien.'</th>';
                    //$html .= '<th>&nbsp;</th>';
                    $html .= '<th>'.$noidung-> vanchuyen_tongthue.'</th>';
                    $html .= '<th>&nbsp;</th>';
                    //$html .= '<th>&nbsp;</th>';
                    $html .= '</tr>';
                    $html .= '</thead>';
                    $html .= '<tbody>';
                    $k = 1;  
                    foreach ($VANCHUYEN as $vcval){
                              $html .= '<tr>';
                                $html .= '<td class="nottabDetaiViewDF"><a href="index.php?module=Cars&action=DetailView&record='.$vcval->vanchuyen_name.'">'.translate('list_vanchuyen_dom','',$vcval->vanchuyen_name).'</a> </td>';
                                $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">'.number_format($vcval->vanchuyen_giathamkhao,2,'.',',').'</td>';
                                $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">'.$vcval->vanchuyen_dongia.' '.translate('vanchuyen_dongia_option','',$vcval->dongia_option) .' </td>';
                                $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">'.$vcval->vanchuyen_soluong.'</td>';
                                $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">'.$vcval->vanchuyen_songay.'</td>';
                                $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">'.number_format($vcval->vanchuyen_thanhtien,2,'.',',').'</td>';
                                //$html .= '<td align="tabDetaiViewDF" align="tabDetaiViewDF" class="tabDetaiViewDF">'.$vcval->vanchuyen_thuexuat.'</td>';
                               // $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">'.$vcval->vanchuyen_giachuathue.'</td>';
                                $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">'.number_format($vcval->vanchuyen_vat,2,'.',',').'</td>';
                                $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">'.translate('hinh_thuc_thanh_toan_dom','',$vcval->vanchuyen_hinhthucthanhtoan).'</td>';
                                //$html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">'.$vcval->vanchuyen_tamung.'</td>';
                            $html .= '</tr> ';  
                            $k++;      
                }
                    $html .= '</tbody>';
                    $html .= '</table> </fieldset>';
                }
                
                // loadding data phần dịch vụ
                
                $DICHVU = $noidung->dichvu;
                $countdv = count($DICHVU);
                if($countdv>0){
                    $html .= '<fieldset>';
                    $html .= '<legend> <h3>DỊCH VỤ</h3></legend>';
                    $html .= '<table width="100%" border="1" id="dichvu" class="tabDetailView" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                    $html .= '<thead>';
                    $html .= '<tr>';
                    $html .= '<th>Loại dịch vụ</th>';
                    $html .= '<th>Giá tham khảo</th>';
                    $html .= '<th>Đơn giá</th>';
                    $html .= '<th>Số lượng</th>';
                    $html .= '<th>Số đêm</th>';
                    $html .= '<th>Thành tiền</th>';
                   // $html .= '<th>Thuế suất</th>';
                    //$html .= '<th>giá chưa thuế</th>';
                    $html .= '<th>VAT</th>';
                    $html .= '<th>Hình thức thanh toán</th>';
                    //$html .= '<th>tạm ứng</th>';
                    $html .= '</tr>';
                    
                    $html .= '<tr>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>'.$noidung-> service_tongthanhtien.'</th>';
                    //$html .= '<th>&nbsp;</th>';
                    $html .= '<th>'.$noidung-> service_tongthue.'</th>';
                    $html .= '<th>&nbsp;</th>';
                   // $html .= '<th>&nbsp;</th>';
                    $html .= '</tr>';
                    $html .= '</thead>';
                    $html .= '<tbody>'; 
                    $l = 1;
                    foreach ($DICHVU as $dvval){
                        if($dvval->services_deleted == 0){
                            $html .= '<tr>';
                                $html .= '<td class="nottabDetaiViewDF">  <a href="index.php?module=Services&action=DetailView&record='.$dvval->services_name.'">'.translate('list_dichvu_dom','',$dvval->services_name).'</a> </td>';
                                $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">'.number_format($dvval->services_giathamkhao,2,'.',',').'</td>';
                                $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">'.number_format($dvval->services_dongia,2,'.',',').'</td>';
                                $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">'.$dvval->services_soluong.'</td>';
                                $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">'.$dvval->services_songay.'</td>';
                                $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">'.number_format($dvval->services_thanhtien,2,'.',',').'</td>';
                                //$html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">'.$dvval->services_thuexuat.'</td>';
                                //$html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">'.$dvval->services_giachuathue.'</td>';
                                $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">'.number_format($dvval->services_vat,2,'.',',').'</td>';
                                $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">'.translate('hinh_thuc_thanh_toan_dom','',$dvval->services_hinhthucthanhtoan).'</td>';
                                //$html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">'.$dvval->services_tamung.'</td>';
                            $html .= '</tr> ';
                            $l++;
                        }
                                       
                    }
                    $html .= '</tbody>';
                    $html .= '</table> </fieldset>';
                }
                
                // loadding phần tham quan
              
                $THAMQUAN = $noidung->thamquan;
                $counttq = count($THAMQUAN);
                if($counttq>0){
                    $html .= '<fieldset>';
                $html .= '<legend> <h3>THAM QUAN</h3></legend>';
                $html .= '<table width="100%" border="1" id="thamquan" class="tabDetailView" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                $html .= '<th>Địa điểm tham quan</th>';
                $html .= '<th>Giá tham khảo</th>';
                $html .= '<th>Đơn giá</th>';
                $html .= '<th>Số lượng</th>';
                $html .= '<th>Số lần/ngày</th>';
                $html .= '<th>Thành tiền</th>';
                $html .= '<th>VAT</th>';
                $html .= '<th>Hình thức thanh toán</th>';
                $html .= '</tr>';
                $html .= '<tr>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>'.$noidung->thamquan_tongthanhtien.'</th>';
                //$html .= '<th>&nbsp;</th>';
                $html .= '<th>'.$noidung->thamquan_tongthue.'</th>';
                $html .= '<th>&nbsp;</th>';
                //$html .= '<th>&nbsp;</th>';
                $html .= '</tr>';
                $html .= '<thead>';
                $html .= '<tbody>';
                
                $m = 1;  
                foreach($THAMQUAN as $tqval){
                       $html .= '<tr>';
                            $html .= '<td class="nottabDetaiViewDF"> <a href="index.php?module=Services&action=DetailView&record='.$tqval->thamquan_name.'">'.translate('list_thamquan_dom','',$tqval->thamquan_name).'</a></td>';
                            $html .= '<td align="center" class="center">'.number_format($tqval->thamquan_giathamkhao,2,'.',',').'</td>';
                            $html .= '<td align="center" class="center">'.number_format($tqval->thamquan_dongia,2,'.',',').'</td>';
                            $html .= '<td align="center" class="center">'.$tqval->thamquan_soluong.'</td>';
                            $html .= '<td align="center" class="center">'.$tqval->thamquan_songay.'</td>';
                            $html .= '<td align="center" class="center">'.number_format($tqval->thamquan_thanhtien,2,'.',',').'</td>';
                            //$html .= '<td align="center" class="center">'.$tqval->thamquan_thuexuat.'</td>';
                            //$html .= '<td align="center" class="center">'.$tqval->thamquan_giachuathue.'</td>';
                            $html .= '<td align="center" class="center">'.$tqval->thamquan_vat.'</td>';
                            $html .= '<td align="center" class="center">'.translate('hinh_thuc_thanh_toan_dom','',$tqval->thamquan_hinhthucthanhtoan).'</td>';
                            //$html .= '<td align="center" class="center">'.$tqval->thamquan_tamung.'</td>';
                        $html .= '</tr> '; 
                        $m++;   
                                
                }
                 $html .= '</body>';
                 $html .= '</table> </fieldset>';
                }
                 // CHI PHI KHAC
                 $chiphikhac = $noidung->chiphikhac;
                 $countchiphikhac = count($chiphikhac);
                 if($countchiphikhac>0){ 
                 $html .= '<fieldset>';
                        $html .= '<legend><h3>CHI PHÍ KHÁC</h3></legend> ';
                        $html .= '<table class="tabDetailView" cellpadding="0" id="chiphikhac" cellspacing="0" width="100%" style="border-collapse: collapse;">';
                            $html .= '<thead> ';
                                $html .= '<tr>';
                                    $html .= '<th>Loại dịch vụ</th>  ';
                                    $html .= '<th>Số lượng</th> ';
                                    $html .= '<th>Đơn giá</th> ';
                                    $html .= '<th>FOC</th> ';
                                    $html .= '<th>Thành tiền</th>';
                                    $html .= '<th>Thuế suất</th>';
                                    $html .= '<th>VAT</th>';
                                $html .= '</tr>';
                            $html .= '</thead>';
                            
                            $html .= '<tbody> ';
                                 foreach($chiphikhac as $chiphikhacval){
                                    $html .= '<tr>';
                                        $html .= '<td>'.$chiphikhacval->chiphikhac_loaidichvu.'</td>'; 
                                        $html .= '<td class="tabDetaiViewDF">'.number_format($chiphikhacval->chiphikhac_soluong,2,'.',',').'</td>'; 
                                        $html .= '<td class="tabDetaiViewDF">'.number_format($chiphikhacval->chiphikhac_dongia,2,'.',',').'</td>'; 
                                        $html .= '<td class="tabDetaiViewDF">'.$chiphikhacval->chiphikhac_foc.'</td>'; 
                                        $html .= '<td class="tabDetaiViewDF">'.number_format($chiphikhacval->chiphikhac_thanhtien,2,'.',',').'</td>'; 
                                        $html .= '<td class="tabDetaiViewDF">'.$chiphikhacval->chiphikhac_thuesuat.'</td>'; 
                                        $html .= '<td class="tabDetaiViewDF">'.number_format($chiphikhacval->chiphikhac_vat,2,'.',',').'</td>'; 
                                    $html .= '</tr>'; 
                                 }
                                 $html .= '<tr> ';
                                    $html .= '<th>Tổng cộng</th>';
                                    $html .= '<th class="tabDetaiViewDF">&nbsp;</th>';
                                    $html .= '<th class="tabDetaiViewDF">&nbsp;</th>';
                                    $html .= '<th class="tabDetaiViewDF">&nbsp;</th> ';
                                    $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->chiphikhac_tongcong,2,'.',',').'</td>';
                                    $html .= '<th class="tabDetaiViewDF">&nbsp;</th>';
                                    $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->chiphikhac_tongthue,2,'.',',').'</td>';
                                    $html .= '<th class="tabDetaiViewDF">&nbsp;</th> '; 
                                    $html .= '</tr>';
                                    $html .= '</tbody>';
                                    $html .= '</table>';
                                    $html .= '</fieldset>';
                             }
                             
                $html .= '<fieldset>';
                $html .= '<legend><h3>TỔNG CHI PHÍ</h3></legend>';
                $html .= '<table cellpadding="0" cellspacing="0" border="1" style="border-collapse: collapse;" width="100%">';
                    $html .= '<tr>';
                        $html .= '<td class="nottabDetaiViewDF"><b>TỔNG CHI PHÍ</b></td>';
                        $html .= '<td align="tabDetaiViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">'.number_format($noidung->tongchiphi,2,'.',',').'</td>';
                        $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">Tổng Thuế: '.number_format($noidung->tongthue,2,'.',',').'</td>';
                        $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">&nbsp;</td>';
                    $html .= '</tr>'; 
                    $html .= '<tr>';
                        $html .= '<td class="nottabDetaiViewDF"><b>Tỷ lệ</b></td>';
                        $html .= '<td align="tabDetaiViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">'.number_format($noidung->tientheotyle,2,'.',',').'</td>';
                        $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">&nbsp;</td> ';
                        $html .= '<td align="tabDetaiViewDF" class="tabDetaiViewDF">&nbsp;</td>';
                    $html .= '</tr>';
                    $html .= '<tr>';
                        $html .= '<td class="nottabDetaiViewDF"><b>HOA HỒNG</b></td>';
                        $html .= '<td>&nbsp;</td>';
                        $html .= '<td class="tabDetaiViewDF">&nbsp;</td>';
                        $html .= '<td class="tabDetaiViewDF">&nbsp;</td>';
                        $html .= '<td class="tabDetaiViewDF">&nbsp;</td>';
                        $html .= '<td class="tabDetaiViewDF">&nbsp;</td>';
                        $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->hoahong,2,'.',',').'</td> ';
                        $html .= '<td class="tabDetaiViewDF">&nbsp;</td>';
                        $html .= '<td class="tabDetaiViewDF">&nbsp;</td>';
                        $html .= '<td class="tabDetaiViewDF">&nbsp;</td>';
                        $html .= '<td class="tabDetaiViewDF">&nbsp;</td>';
                    $html .= '</tr>';
                    $html .= '<tr>';
                        $html .= '<td class="nottabDetaiViewDF"><b>GIÁ BÁN</b></td>';
                        $html .= '<td>&nbsp;</td>';
                        $html .= '<td class="tabDetaiViewDF">&nbsp;</td>'; 
                        $html .= '<td class="tabDetaiViewDF">Giá bán trên một khách: <b>'.number_format($noidung->giabantrenmotnguoi,2,'.',',').'</b></td> ';
                        $html .= '<td class="tabDetaiViewDF">&nbsp;</td>';
                        $html .= '<td class="tabDetaiViewDF">&nbsp;</td>  ';
                        $html .= '<td class="tabDetaiViewDF">Giá bán trên đoàn: <b> '.number_format($noidung->giaban,2,'.',',').' </b></td> ';
                        $html .= '<td class="tabDetaiViewDF">&nbsp;</td> ';
                        $html .= '<td class="tabDetaiViewDF">&nbsp;</td>';
                        $html .= '<td class="tabDetaiViewDF">&nbsp;</td> ';
                        $html .= '<td class="tabDetaiViewDF">&nbsp;</td> ';
                    $html .= '</tr> ';
                $html .= '</table>';
                $html .= '</fieldset>';
            $htmlReport .= '<fieldset>';
              $htmlReport .= '<legend><h3>CHI TIẾT</h3></legend>';
                  $htmlReport .= '<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tabForm" style="border-collapse:collapse">';
              $htmlReport .= '<tr> ';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<th>DUYỆT</th>';
                $htmlReport .= '<td>&nbsp;</td> ';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td width="15%" class="nottabDetaiViewDF tabDetaiViewDL">VAT ĐẦU RA</td>';
                $htmlReport .= '<td width="25%" class="tabDetaiViewDF tabDetaiViewDF">'.number_format($noidung->vatdaura,2,'.',',').'</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
              $htmlReport .= '</tr>';
              $htmlReport .= '<tr>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td width="15%" class="nottabDetaiViewDF tabDetaiViewDL">VAT ĐẦU VÀO</td> ';
                $htmlReport .= '<td class="tabDetaiViewDF tabDetaiViewDF">'.number_format($noidung->vatdauvao,2,'.',',').'</td> ';
                $htmlReport .= '<td>&nbsp;</td> ';
                $htmlReport .= '<td>&nbsp;</td> ';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td> ';
              $htmlReport .= '</tr> ';
              $htmlReport .= '<tr> ';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td> ';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td width="15%" class="nottabDetaiViewDF tabDetaiViewDL">VAT PHẢI ĐÓNG</td>';
                $htmlReport .= '<td width="25%" class="tabDetaiViewDF tabDetaiViewDF">'.number_format($noidung->vatphaidong,2,'.',',').'</td>';
                $htmlReport .= '<td>&nbsp;</td> ';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td> ';
                $htmlReport .= '<td>&nbsp;</td> ';
              $htmlReport .= '</tr> ';
              $htmlReport .= '<tr> ';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td width="15%" class="nottabDetaiViewDF tabDetaiViewDL">DOANH THU</td>';
                $htmlReport .= '<td width="25%" class="tabDetaiViewDF tabDetaiViewDF">'.number_format($noidung->doanhthu,2,'.',',').'</td> ';
                $htmlReport .= '<td>&nbsp;</td> ';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td> ';
                $htmlReport .= '<td>&nbsp;</td>';
              $htmlReport .= '</tr> ';
              $htmlReport .= '<tr> ';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td width="15%" class="nottabDetaiViewDF tabDetaiViewDL">TỔNG CHI PHÍ</td> ';
                $htmlReport .= '<td width="25%" class="tabDetaiViewDF tabDetaiViewDF">'.number_format($noidung->tongchiphi1,2,'.',',').'</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
              $htmlReport .= '</tr>';
              $htmlReport .= '<tr>';
                $htmlReport .= '<td>&nbsp;</td> ';
                $htmlReport .= '<td>&nbsp;</td> ';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td width="15%" class="nottabDetaiViewDF tabDetaiViewDL">GIÁ VỐN/ 1 KHÁCH</td>';
                $htmlReport .= '<td width="25%" class="tabDetaiViewDF tabDetaiViewDF">'.number_format($noidung->giavontrenkhach,2,'.',',').'</td>';
                $htmlReport .= '<td>&nbsp;</td> ';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
              $htmlReport .= '</tr>';
              $htmlReport .= '<tr>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td width="15%" class="nottabDetaiViewDF tabDetaiViewDL">GIÁ BÁN/ 1 KHÁCH</td>';
                $htmlReport .= '<td width="25%" class="tabDetaiViewDF tabDetaiViewDF">'.number_format($noidung->giabantrenkhach,2,'.',',').'</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
              $htmlReport .= '</tr>';
              $htmlReport .= '<tr>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td width="15%" class="nottabDetaiViewDF tabDetaiViewDL">LÃI KHÁCH</td>';
                $htmlReport .= '<td width="25%" class="tabDetaiViewDF tabDetaiViewDF">'.number_format($noidung->laikhach,2,'.',',').'</td>';
                $htmlReport .= '<td>&nbsp;</td> ';
                $htmlReport .= '<td>&nbsp;</td> ';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td> ';
              $htmlReport .= '</tr>';
              $htmlReport .= '<tr> ';
                $htmlReport .= '<td>&nbsp;</td> ';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td width="15%" class="nottabDetaiViewDF tabDetaiViewDL">TỔNG LÃI</td>';
                $htmlReport .= '<td width="25%" class="tabDetaiViewDF tabDetaiViewDF">'.number_format($noidung->tonglai,2,'.',',').'</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
             $htmlReport .= ' </tr>';
              $htmlReport .= '<tr>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td width="15%" class="nottabDetaiViewDF tabDetaiViewDF">TỶ LỆ SAU THUẾ</td> ';
                $htmlReport .= '<td width="25%" class="tabDetaiViewDF tabDetaiViewDF">'.number_format($noidung->tylesauthue,2,'.',',').' %</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td>&nbsp;</td>';
             $htmlReport .= '</tr>';
           $htmlReport .= '</table>';
         $htmlReport .= '</fieldset>';  
                
  }  
            if($this->bean->type == 'Inbound') {
                $html = '';
            if(!empty($this->bean->id)){
                
                $html .= '<fieldset>';
                $html .= '<legend><h3>THÔNG TIN CHUNG</h3></legend>';
                $html .= '<table width="100%" class="tabDetailView" border="1" style="border-collapse:collapse;" cellspacing="0" cellpadding="0">';
                    $html .= '<tr>';
                        $html .= '<td class="tabDetailViewDL"><b>Tour name:</b></td>';
                        $html .= '<td class="tabDetailViewDF">';
                                $html .= '<a href="index.php?module=Tours&action=DetailView&record='.$this->bean->worksheet_tour_id.'">'.$this->bean->worksheet_tour_name.' </a>';
                            $html .= '</td>';
                        $html .= '<td class="tabDetailViewDL"><b>Tour Code:</b></td>';
                        $html .= '<td class="tabDetailViewDF">';
                            $html .= $this->bean->tourcode;
                        $html .='</td>';
                        $html .= '<td class="tabDetailViewDL"><b>Ngày bắt đầu</b></td>';

                        $html .= '<td class="tabDetailViewDF">';
                            $html .= $noidung->ngaybatdau;
                        $html .= '</td>';
                        $html .= '<td class="tabDetailViewDL"><b>Ngày kết thúc</b></td>';
                        $html .= '<td class="tabDetailViewDF">'.$noidung->ngayketthuc.'</td>';
                        $html .= '<td class="tabDetailViewDL">&nbsp;</td>';
                        $html .= '<td class="tabDetailViewDF">&nbsp;</td>';
                    $html .= '</tr>';
                    $html .= '<tr>';
                        $html .= '<td class="tabDetailViewDL"><b>Hướng dẫn viên</b></td>';
                        $html .= '<td class="tabDetailViewDF">';
                                $html .= $noidung->huongdanvien;
                            $html .= '</td>';
                        $html .= '<td class="tabDetailViewDL"><b>Duration:</b></td>';
                        $html .= '<td class="tabDetailViewDF">';
                                $html .= $this->bean->duration;
                            $html .= '</td>';
                        $html .= '<td class="tabDetailViewDL"><b>Phương tiện:</b></td>';

                        $html .= '<td class="tabDetailViewDF">';
                            $html .= $this->bean->transport;
                        $html .= '</td>';
                        $html .= '<td class="tabDetailViewDL">&nbsp;</td>';
                        $html .= '<td class="tabDetailViewDF">&nbsp;</td>';
                        $html .= '<td class="tabDetailViewDL">&nbsp;</td>';
                        $html .= '<td class="tabDetailViewDF">&nbsp;</td>';
                    $html .= '</tr>';
                    $html .= '<tr>';
                        $html .= '<td class="tabDetailViewDL"><b>Lộ trình:</b></td>';
                        $html .= '<td class="tabDetailViewDF">';
                                $html .= $this->bean->lotrinh;
                            $html .= '</td>';
                       $html .= '<td class="tabDetailViewDL"><b>Thuế Suất hóa:</b></td>';
                        $html .= '<td class="tabDetailViewDF">';
                            $html .= $this->bean->thuesuathoa;
                        $html .= '</td>';
                        $html .= '<td class="tabDetailViewDL"><b>Số khách: </b></td>';
                        $html .= '<td class="tabDetailViewDF">';
                                $html .= $this->bean->sokhach;
                            $html .= '</td>';
                        $html .= '<td class="tabDetailViewDL"><b>Tỷ lệ :</b></td>';
                        $html .= '<td class="tabDetailViewDF">';
                                $html .= $this->bean->tyle;
                            $html .= '</td>';
                        $html .= '<td class="tabDetailViewDL">&nbsp;</td>';
                        $html .= '<td class="tabDetailViewDL">&nbsp;</td>';
                    $html .= '</tr>'; 
                $html .= '</table>';
                $html .= '</fieldset>';                
                // loading vé máy bay
                $html .= '<fieldset>';
                $html .= '<legend><h3>VÉ MÁY BAY</h3></legend>';
                $html .= '<table width="100%" class="tabForm" id="vemaybay" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>'; 
                $html .= '</thead>';
                                
                $html .= '<tbody>';  
                // chuyến bay tại miền bắc
                $html .= '<tr>';
                    $html .= '<td colspan="7">';
                    
                    $vmb_mienbac = $noidung->vmb_mienbac;
                    if(count($vmb_mienbac)>0){
                        
                       $html .= '<fieldset><legend><h3>MIỀN BẮC</h3></legend>';
                        $html .= '<table width="100%" class="tabForm" id="vemaybay_mb" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                            $html .= '<thead>' ;
                                $html .= '<tr>';
                                    $html .= '<td><b>Tên chuyến bay</b></td>';
                                    $html .= '<th>Đơn giá</th>';
                                    $html .= '<th>Số lượng</th>';
                                    $html .= '<th>FOC</th>';
                                    $html .= '<th>Thành tiền</th>';
                                    $html .= '<th>Thuế suất</th>';
                                    $html .= '<th>Thuế</th>';
                                $html .= '</tr>';
                            $html .= '</thead>' ;
                            $html .= '<tbody>';
                            $vmb_mb = 1;
                                foreach($vmb_mienbac as $airtkmb){
                                      $html .= '<tr>';
                                        $html .= '<td><a target="blank" href="index.php?module=AirlinesTickets&action=DetailView&record='.$airtkmb->vemaybay_mb.'">'.translate('list_airlinetiket_dom_north','',$airtkmb->vemaybay_mb).'</a></td>';
                                        $html .= '<td class="tabDetaiViewDF">'.number_format($airtkmb->vemaybay_mb_dongia,2,'.',',').'</td>';
                                        $html .= '<td class="tabDetaiViewDF">'.$airtkmb->vemaybay_mb_soluong.'</td>';
                                        $html .= '<td class="tabDetaiViewDF">'.$airtkmb->vemaybay_mb_foc.'</td>';
                                        $html .= '<td class="tabDetaiViewDF">'.number_format($airtkmb->vemaybay_mb_thanhtien,2,'.',',').'</td>';
                                        $html .= '<td class="tabDetaiViewDF">'.$airtkmb->vemaybay_mb_thuesuat.'</td>';
                                        $html .= '<td class="tabDetaiViewDF">'.number_format($airtkmb->vemaybay_mb_vat,2,'.',',').'</td>';
                                      $html .= '</tr>';
                                      $vmb_mb ++;
                                }
                            $html .= '<tr>';  
                                $html .= '<td><b>Tổng cộng</b></td>';
                                $html .= '<th>&nbsp;</th>';
                                $html .= '<th>&nbsp;</th>';
                                $html .= '<th>&nbsp;</th>';
                                $html .= '<th>'.number_format($noidung->vemaybay_mb_tongthanhtien,2,'.',',').'</th>';  
                                $html .= '<th>&nbsp;</th>';
                                $html .= '<th>'.number_format($noidung->vemaybay_mb_tongthue,2,'.',',').'</th>';
                            $html .= '</tr>';
                            $html .= '</tbody>';
                        $html .= '</table>';
                        $html .= '</fieldset>';
                    }
                    $html .= '</td>';
                $html .= '</tr>';
                
                // chuyến bay tại miền trung
                $vmb_mientrung = $noidung->vmb_mientrung;
                $html .= '<tr>';
                    $html .= '<td colspan="7">';
                    if(count($vmb_mientrung)>0){
                       $html .= '<fieldset><legend><h3>MIỀN TRUNG</h3></legend>';
                        $html .= '<table width="100%" class="tabForm" id="vemaybay_mt" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                            $html .= '<thead>' ;
                                $html .= '<tr>';
                                    $html .= '<td><b>Tên chuyến bay</b></td>';
                                    $html .= '<th>Đơn giá</th>';
                                    $html .= '<th>Số lượng</th>';
                                    $html .= '<th>FOC</th>';
                                    $html .= '<th>Thành tiền</th>';
                                    $html .= '<th>Thuế suất</th>';
                                    $html .= '<th>Thuế</th>';
                                $html .= '</tr>';
                            $html .= '</thead>' ;
                            
                            $html .= '<tbody>';
                                foreach($vmb_mientrung as $airtkmt){
                                      $html .= '<tr>';
                                        $html .= '<td> <a target="blank" href="index.php?module=AirlinesTickets&action=DetailView&record='.$airtkmt->vemaybay_mt.'">'.translate('list_airlinetiket_dom_middle','',$airtkmt->vemaybay_mt).'</td>';
                                        $html .= '<td class="tabDetaiViewDF">'.number_format($airtkmt->vemaybay_mt_dongia,2,'.',',').'</td>';
                                        $html .= '<td class="tabDetaiViewDF">'.$airtkmt->vemaybay_mt_soluong.'</td>';
                                        $html .= '<td class="tabDetaiViewDF">'.$airtkmt->vemaybay_mt_foc.'</td>';
                                        $html .= '<td class="tabDetaiViewDF">'.number_format($airtkmt->vemaybay_mt_thanhtien,2,'.',',').'</td>';
                                        $html .= '<td class="tabDetaiViewDF">'.$airtkmt->vemaybay_mt_thuesuat.'</td>';
                                        $html .= '<td class="tabDetaiViewDF">'.number_format($airtkmt->vemaybay_mt_vat,2,'.',',').'</td>';
                                      $html .= '</tr>';
                                  }
                                  $html .= '<tr>'; 
                                        $html .= '<td><b>Tổng cộng</b></td>';
                                        $html .= '<th>&nbsp;</th>';
                                        $html .= '<th>&nbsp;</th>';
                                        $html .= '<th>&nbsp;</th>';
                                        $html .= '<th>'.number_format($noidung->vemaybay_mt_tongthanhtien,2,'.',',').'</th>';
                                        $html .= '<th>&nbsp;</th>';  
                                        $html .= '<th>'.number_format($noidung->vemaybay_mt_tongthue,2,'.',',').'</th>';
                                $html .= '</tr>';
                            $html .= '</tbody>';   
                        $html .= '</table>';
                        $html .= '</fieldset>';
                    }
                    $html .= '</td>';
                $html .= '</tr>';
                
                // chuyến bay tại miền nam
                $html .= '<tr>';
                    $html .= '<td colspan="7">';
                    $vmb_miennam = $noidung->vmb_miennam;
                    if(count($vmb_miennam)>0){
                       $html .= '<fieldset><legend><h3>MIỀN NAM</h3></legend>';
                        $html .= '<table width="100%" class="tabForm" id="vemaybay_mn" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                            $html .= '<thead>' ;
                                $html .= '<tr>';
                                    $html .= '<td><b>Tên chuyến bay</b></td>';
                                    $html .= '<th>Đơn giá</th>';
                                    $html .= '<th>Số lượng</th>';
                                    $html .= '<th>FOC</th>';
                                    $html .= '<th>Thành tiền</th>';
                                    $html .= '<th>Thuế suất</th>';
                                    $html .= '<th>Thuế</th>';
                                $html .= '</tr>';
                            $html .= '</thead>' ;
                            
                            $html .= '<tbody>';
                            $vmb_mn = 1;
                                foreach($vmb_miennam as $airtkmn){
                                      $html .= '<tr>';
                                        $html .= '<td><a target="blank" href="index.php?module=AirlinesTickets&action=DetailView&record='.$airtkmn->vemaybay_mn.'">'.translate('list_airlinetiket_dom_south','',$airtkmn->vemaybay_mn).'</td>';
                                        $html .= '<td class="tabDetaiViewDF">'.number_format($airtkmn->vemaybay_mn_dongia,2,'.',',').'</td>';
                                        $html .= '<td class="tabDetaiViewDF">'.$airtkmn->vemaybay_mn_soluong.'</td>';
                                        $html .= '<td class="tabDetaiViewDF">'.$airtkmn->vemaybay_mn_foc.'</td>';
                                        $html .= '<td class="tabDetaiViewDF">'.number_format($airtkmn->vemaybay_mn_thanhtien,2,'.',',').'</td>';
                                        $html .= '<td class="tabDetaiViewDF">'.$airtkmn->vemaybay_mn_thuesuat.'</td>';
                                        $html .= '<td class="tabDetaiViewDF">'.number_format($airtkmn->vemaybay_mn_vat,2,'.',',').'</td>';
                                      $html .= '</tr>';
                                      $vmb_mn ++;
                                  }
                                  $html .= '<tr>';
                                        $html .= '<td><b>Tổng cộng</b></td>';
                                        $html .= '<th>&nbsp;</th>';
                                        $html .= '<th>&nbsp;</th>';
                                        $html .= '<th>&nbsp;</th>';
                                        $html .= '<th>'.number_format($noidung->vemaybay_mn_tongthanhtien,2,'.',',').'</th>';
                                        $html .= '<th>&nbsp;</th>';
                                        $html .= '<th>'.number_format($noidung->vemaybay_mn_tongthue,2,'.',',').'</th>';
                                $html .= '</tr>';
                            $html .= '</tbody>';   
                        $html .= '</table>';
                        $html .= '</fieldset>';
                    }
                    $html .= '</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                $html .= '<th>Tổng cộng</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>'.number_format($noidung->vemaybay_tongthanhtien,2,'.',',').'</th>';
                $html .= '<th>&nbsp;</th>';
                $html .= '<th>'.number_format($noidung->vemaybay_tongthue,2,'.',',').'</th>';
                $html .= '</tr>';
                $html .='</tbody></table> </fieldset>';
                
                // kết thúc phần vé máy bay
                
                // loading phần nhà hàng            
                $html .= '<fieldset >';
                $html .= '<legend><h3>NHÀ HÀNG</h3></legend>';
                $html .= '<table width="100%" class="tabForm"  id="nhahang" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>'; 
                
                $html .= '</thead>';
                $html .= '<tbody>';
                
                
                // lấy danh sách nhà hàng ở miền bắc
                $html .= '<tr> <td colspan="9">';
                $html .= '<fieldset >';
                $nhahang_mienbac = $noidung->nhahang_mienbac;
                if(count($nhahang_mienbac)>0){
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
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                $nh_mb = 0;
                foreach($nhahang_mienbac as $valmb){
                        $html .= '<tr>';
                            $html .= '<td width="20%" class="center"> <a target="blank" href="index.php?module=Restaurants&action=DetailView&record='.$valmb->nh_id.'">'.translate('list_restaurant_dom_north','',$valmb->nh_id).'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$valmb->nh_ghichu_mb.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($valmb->nh_dongia,2,'.',',').'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$valmb->nh_soluong_mb.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$valmb->nh_songay_mb.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$valmb->nh_foc_mb.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($valmb->nh_thanhtien_mb,2,'.',',').'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$valmb->nh_thuexuat_mb.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($valmb->nh_thue_mb,2,'.',',').'</td>';
                        $html .= '</tr> ';
                    $nh_mb ++;
                }
                $html .= '<tr>';
                    $html .= '<th width="20%"><b>Tổng cộng</b></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">'.number_format($noidung->nhahang_tongthanhtien_mienbac,2,'.',',').'</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">'.number_format($noidung->nhahang_tongthue_mienbac,2,'.',',').'</th>';
                $html .= '</tr>';
                
                $html .= '</tbody>'; 
                $html .= '</table>';
                $html .= '</fieldset>';
                }
                $html .= '</td></tr>';
                // lấy danh sách nhà hàng ở miền trung
                $nhahang_mientrung = $noidung->nhahang_mientrung;
                $html .= '<tr> <td colspan="9">';
                if(count($nhahang_mientrung)>0){
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
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '</tbody>';
                foreach($nhahang_mientrung as $valmt){
                        $html .= '<tr>';
                            $html .= '<tr>';
                            $html .= '<td width="20%"><a target="blank" href="index.php?module=Restaurants&action=DetailView&record='.$valmt->nh_id.'">'.translate('list_restaurant_dom_middle','',$valmt->nh_id).'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$valmt->nh_ghichu_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($valmt->nh_dongia_mt,2,'.',',').'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$valmt->nh_soluong_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$valmt->nh_songay_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$valmt->nh_foc_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($valmt->nh_thanhtien_mt,2,'.',',').'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$valmt->nh_thuexuat_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($valmt->nh_thue_mt,2,'.',',').'</td>';
                        $html .= '</tr> ';
                    }
                $html .= '<tr>';
                    $html .= '<th width="20%"> <b>Tổng cộng</b> </th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">'.number_format($noidung->nhahang_tongthanhtien_mientrung,2,'.',',').'</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">'.number_format($noidung->nhahang_tongthue_mientrung,2,'.',',').'</th>';
                $html .= '</tr>';
                $html .= '</tbody>';
                $html .= '</table> ';
                $html .= '</fieldset>';
                }
                $html .= '</td></tr>';
                
                // lấy danh sách nhà hàng ở miền nam
                
                $html .= '<tr> <td colspan="9">';
                $nhahang_miennam = $noidung->nhahang_miennam;
                if(count($nhahang_miennam)>0){
                $html .= '<fieldset >';
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
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '</tbody>';
                foreach($nhahang_miennam as $valmn){
                        $html .= '<tr>';
                            $html .= '<tr>';
                            $html .= '<td width="10%"><a target="blank" href="index.php?module=Restaurants&action=DetailView&record='.$valmn->nh_id.'">'.translate('list_restaurant_dom_south','',$valmn->nh_id).'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$valmn->nh_ghichu_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($valmn->nh_dongia_mn,2,'.',',').'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$valmn->nh_soluong_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$valmn->nh_songay_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$valmn->nh_foc_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($valmn->nh_thanhtien_mn,2,'.',',').'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$valmn->nh_thuexuat_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($valmn->nh_thue_mn,2,'.',',').'</td>';
                        $html .= '</tr> ';
                    }
                        $html .= '<tr>';
                            $html .= '<th width="20%"><b>Tổng cộng</b></th>';
                            $html .= '<th width="10%">&nbsp;</th>';
                            $html .= '<th width="10%">&nbsp;</th>';
                            $html .= '<th width="10%">&nbsp;</th>';
                            $html .= '<th width="10%">&nbsp;</th>';
                            $html .= '<th width="10%">&nbsp;</th>';
                            $html .= '<th width="10%">'.number_format($noidung->nhahang_tongthanhtien_miennam,2,'.',',').'</th>';
                            $html .= '<th width="10%">&nbsp;</th>';
                            $html .= '<th width="10%">'.number_format($noidung->nhahang_tongthue_miennam,2,'.',',').'</th>';
                        $html .= '</tr>';
                $html .= '</tbody>';
                $html .= '</table> ';
                $html .= '</fieldset>';
                }
                $html .= '</td></tr>';
                $html .= '<tr>';
                    $html .= '<th width="20%">TỔNG CỘNG</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">'.number_format($noidung->nhahang_tongthanhtien,2,'.',',').'</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">'.number_format($noidung->nhahang_tongthue,2,'.',',').'</th>';
                $html .= '</tr>';
                $html .= '</tbody>';
                $html .= '</table> </fieldset>';
            } 
            // ket thuc phan load nha hang
            
            // loading hotel data 
            // lấy danh sách khách sạn
                
                $html .= '<fieldset>';
                $html .= '<legend><h3>KHÁCH SẠN</h3></legend>';
                $html .= '<table width="100%" class="tabForm" border="0" class="tabForm" id="khachsan" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '</thead>';
                $html .= '<tbody>';
                

                 // lấy danh sách khách sạn ở miền bắc
                $khachsan_mienbac = $noidung->khachsan_mienbac;
                $html .= '<tr><td colspan="13">';
                if(count($khachsan_mienbac)>0){
                    $html .= '<fieldset >';
                    $html .= '<legend><h3>MIỀN BẮC</h3></legend>';
                    $html .= '<table width="100%" border="0" class="table_clone" id="ks_mb" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                    $html .= '<thead>';
                    $html .= '<tr>';
                    $html .= '<th>Tổng cộng</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>'.number_format($noidung->khachsan_tongthanhtien_mienbac,2,'.',',') .'</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>'.number_format($noidung->khachsan_tongthue_mienbac,2,'.',',').'</th>';
                    $html .= '<th>&nbsp;</th>';
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
                    $html .= '<th>VAT</th>';
                    $html .= '</tr>';
                    
                    $html .= '</thead>';
                    $html .= '<tbody>';
                    foreach($khachsan_mienbac as $val_ksmb){
                        $html .= '<tr>';
                            $html .= '<td><a target="blank" href="index.php?module=Hotels&action=DetailView&record='.$val_ksmb->ks_id.'">'.$val_ksmb->ks_name.'</a></td>';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($val_ksmb->SGL_ks_mb,2,'.',',').'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.$val_ksmb->SGL_SL_ks_mb.'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($val_ksmb->DBL_ks_mb,2,'.',',').'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.$val_ksmb->DBL_SL_ks_mb.'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($val_ksmb->TPL_ks_mb,2,'.',',').'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.$val_ksmb->TPL_SL_ks_mb.'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.$val_ksmb->hangphong_ks_mb.'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.$val_ksmb->songaydem_ks_mb.'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($val_ksmb->thanhtien_ks_mb,2,'.',',').'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.$val_ksmb->thuesuat_ks_mb.'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($val_ksmb->vat_ks_mb,2,'.',',').'</td>';
                        $html .= '</tr>';
                    }
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
                        $html .= '<th>'.number_format($noidung->khachsan_tongthanhtien_mienbac,2,'.',',') .'</th>';
                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th>'.number_format($noidung->khachsan_tongthue_mienbac,2,'.',',').'</th>';
                    $html .= '</tr>';
                    $html .= '</tbody>';
                    $html .= '</table>';
                    $html .= '</fieldset>';
                }
                $html .= '</td></tr>';
                
                // khách sạn tại miền trung
                $html .= '<tr><td colspan="13">';
                $khachsan_mientrung = $noidung->khachsan_mientrung;
                if(count($khachsan_mientrung)>0){
                    $html .= '<fieldset >';
                    $html .= '<legend><h3>MIỀN TRUNG</h3></legend>';
                    $html .= '<table width="100%" border="0" class="table_clone" id="ks_mt" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                    $html .= '<thead>';
                    
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
                    $html .= '<th>thành tiền</th>';
                    $html .= '<th>Thuế suất</th>';
                    $html .= '<th>VAT</th>';
                    $html .= '</tr>';
                        
                    $html .= '</thead>';
                    $html .= '<tbody>';
                        foreach ($khachsan_mientrung as $val_ksmt){
                            $html .= '<tr>';
                                $html .= '<td><a target="blank" href="index.php?module=Hotels&action=DetailView&record='.$val_ksmt->ks_id.'">'.$val_ksmt->ks_name.'</a> </td>';
                                $html .= '<td class="tabDetaiViewDF">'.number_format($val_ksmt->SGL_ks_mt,2,'.',',').'</td>';
                                $html .= '<td class="tabDetaiViewDF">'.$val_ksmt->SGL_SL_ks_mt.'</td>';
                                $html .= '<td class="tabDetaiViewDF">'.number_format($val_ksmt->DBL_ks_mt,2,'.',',').'</td>';
                                $html .= '<td class="tabDetaiViewDF">'.$val_ksmt->DBL_SL_ks_mt.'</td>';
                                $html .= '<td class="tabDetaiViewDF">'.number_format($val_ksmt->TPL_ks_mt,2,'.',',').'</td>';
                                $html .= '<td class="tabDetaiViewDF">'.$val_ksmt->TPL_SL_ks_mt.'</td>';
                                $html .= '<td class="tabDetaiViewDF">'.$val_ksmt->hangphong_ks_mt.'</td>';
                                $html .= '<td class="tabDetaiViewDF">'.$val_ksmt->songaydem_ks_mt.'</td>';
                                $html .= '<td class="tabDetaiViewDF">'.number_format($val_ksmt->thanhtien_ks_mt,2,'.',',').'</td>';
                                $html .= '<td class="tabDetaiViewDF">'.$val_ksmt->thuesuat_ks_mt.'</td>';
                                $html .= '<td class="tabDetaiViewDF">'.number_format($val_ksmt->vat_ks_mt,2,'.',',').'</td>';
                            $html .= '</tr>';
                        }
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
                            $html .= '<th>'.number_format($noidung->khachsan_tongthanhtien_mientrung,2,'.',',').'</th>';
                            $html .= '<th>&nbsp;</th>';
                            $html .= '<th>'.number_format($noidung->khachsan_tongthue_mientrung,2,'.',',').'</th>';
                      $html .= '</tr>';
                    $html .= '</tbody>';
                    $html .= '</table>';
                    $html .= '</fieldset>';
                }
                $html .= '</td></tr>';
                
                // khách sạn tại miền nam
                $html .= '<tr><td colspan="13">';
                $khachsan_miennam = $noidung->khachsan_miennam;
                if(count($khachsan_miennam)>0){
                    $html .= '<fieldset >';
                    $html .= '<legend><h3>MIỀN NAM</h3></legend>';
                    $html .= '<table width="100%" border="0" class="table_clone" id="ks_mn" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                    $html .= '<thead>';
                    
                    $html .= '<th>Tên khách sạn</th>';
                    $html .= '<th>Single</th>';
                    $html .= '<th>SL Single</th>';
                    $html .= '<th>Double</th>';
                    $html .= '<th>SL Double</th>';
                    $html .= '<th>Triple</th>';
                    $html .= '<th>SL Triple</th>';
                    $html .= '<th>Hạng phòng</th>';
                    $html .= '<th>Số đêm</th>';
                    $html .= '<th>thành tiền</th>';
                    $html .= '<th>Thuế suất</th>';
                    $html .= '<th>VAT</th>';
                    
                    $html .= '</thead>';
                    $html .= '<tbody>';
                    $ks_mn = 1;
                    foreach($khachsan_miennam as $val_ksmn) {
                         $html .= '<tr>';
                                $html .= '<td><a target="blank" href="index.php?module=Hotels&action=DetailView&record='.$val_ksmn->ks_id.'">'.$val_ksmn->ks_name.'</a> </td>';
                                $html .= '<td class="tabDetaiViewDF">'.number_format($val_ksmn->SGL_ks_mn,2,'.',',').'</td>';
                                $html .= '<td class="tabDetaiViewDF">'.$val_ksmn->SGL_SL_ks_mn.'</td>';
                                $html .= '<td class="tabDetaiViewDF">'.number_format($val_ksmn->DBL_ks_mn,2,'.',',').'</td>';
                                $html .= '<td class="tabDetaiViewDF">'.$val_ksmn->DBL_SL_ks_mn.'</td>';
                                $html .= '<td class="tabDetaiViewDF">'.number_format($val_ksmn->TPL_ks_mn,2,'.',',').'</td>';
                                $html .= '<td class="tabDetaiViewDF">'.$val_ksmn->TPL_SL_ks_mn.'</td>';
                                $html .= '<td class="tabDetaiViewDF">'.$val_ksmn->hangphong_ks_mn.'</td>';
                                $html .= '<td class="tabDetaiViewDF">'.$val_ksmn->songaydem_ks_mn.'</td>';
                                $html .= '<td class="tabDetaiViewDF">'.number_format($val_ksmn->thanhtien_ks_mn,2,'.',',').'</td>';
                                $html .= '<td class="tabDetaiViewDF">'.$val_ksmn->thuesuat_ks_mn.'</td>';
                                $html .= '<td class="tabDetaiViewDF">'.number_format($val_ksmn->vat_ks_mn,2,'.',',').'</td>';
                            $html .= '</tr>';
                        $ks_mn++;
                    }
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
                        $html .= '<th>'.number_format($noidung->khachsan_tongthanhtien_miennam,2,'.',',').'</th>';
                        $html .= '<th>&nbsp;</th>'; 
                        $html .= '<th>'.number_format($noidung->khachsan_tongthue_miennam,2,'.',',').'</th>';
                    $html .= '</tr>';
                    $html .= '</tbody>';
                    $html .= '</table>';
                    $html .= '</fieldset>';
                }
                
                $html .= '</td></tr>';
                $html .= '<tr>';
                    $html .= '<th>TỔNG CỘNG</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>'.number_format($noidung->khachsan_tongthanhtien,2,'.',',').'</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>'.number_format($noidung->khachsan_tongthue,2,'.',',').'</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '</tr>';
                $html .= '</tbody>';
                $html .= '</table> </fieldset>';
                // ket thuc phan khach san
                
                // loading van chuyen 
                
                $html .= '<fieldset>';
                $html .= '<legend> <h3>VẬN CHUYỂN</h3></legend>';
                $html .= '<table width="100%" class="tabForm" id="vanchuyen" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '</thead>';
                $html .= '<tbody>';
                // lấy danh sách vận chuyển ở miền bắc
                $html .= '<tr><td colspan="9">';
                $vanchuyen_mienbac = $noidung->vanchuyen_mienbac;
                if(count($vanchuyen_mienbac)>0){
                    $html .= '<fieldset >';
                    $html .= '<legend><h3>MIỀN BẮC</h3></legend>';
                    $html .= '<table width="100%" class="table_clone" id="vanchuyen_mienbac" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                    $html .= '<thead>';
                    $html .= '<tr>';
                        $html .= '<th width="10%">Loại xe</th>';
                        $html .= '<th width="20%">Đơn giá</th>';
                        $html .= '<th width="10%">Số lượng</th>';
                        $html .= '<th width="10%">Ngày/Giờ/Km</th>';
                        $html .= '<th width="10%">FOC</th>';
                        $html .= '<th width="10%">Thành tiền</th>';
                        $html .= '<th width="10%">Thuế suất</th>';
                        $html .= '<th width="20%">Thuế</th>';
                    $html .= '</tr>';
                    $html .= '</thead>';
                    $html .= '<tbody>';
                    foreach($vanchuyen_mienbac as $vcValMB){
                            $html .= '<tr>';
                                $html .= '<td width="10%"><a target="blank" href="index.php?module=Cars&action=DetailView&record='.$vcValMB->vanchuyen_name_mb.'"><b>'.translate( 'list_vanchuyen_dom_north','',$vcValMB->vanchuyen_name_mb).'</b></a></td>';
                                if(!empty($vcValMB->dongia_option_mb)){
                                    $html .= '<td width="20%" class="tabDetaiViewDF">'.$vcValMB->vanchuyen_dongia_mb.' '.translate('vanchuyen_dongia_option','',$vcValMB->dongia_option_mb) .'</td>';
                                }
                                else{
                                    $html .= '<td width="20%" class="tabDetaiViewDF">'.$vcValMB->vanchuyen_dongia_mb.' '.translate('vanchuyen_dongia_option','',$vcValMB->dongia_option_mb) .'</td>';                                    
                                }
                                $html .= '<td width="10%" class="tabDetaiViewDF">'.$vcValMB->vanchuyen_soluong_mb.'</td>';
                                $html .= '<td width="10%" class="tabDetaiViewDF">'.$vcValMB->vanchuyen_songay_mb.'</td>';
                                $html .= '<td width="10%" class="tabDetaiViewDF">'.$vcValMB->vanchuyen_foc_mb.'</td>';
                                $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($vcValMB->vanchuyen_thanhtien_mb,2,'.',',').'</td>';
                                $html .= '<td width="10%" class="tabDetaiViewDF">'.$vcValMB->vanchuyen_thuesuat_mb.'</td>';
                                $html .= '<td width="20%" class="tabDetaiViewDF">'.number_format($vcValMB->vanchuyen_vat_mb,2,'.',',').'</td>';
                            $html .= '</tr> ';
                            $vc_mb++;             
                    }
                    $html .= '<tr>';
                        $html .= '<th width="10%"><b>Tổng cộng</b></th>';
                        $html .= '<th width="20%">&nbsp;</th>';
                        $html .= '<th width="10%">&nbsp;</th>';
                        $html .= '<th width="10%">&nbsp;</th>';
                        $html .= '<th width="10%">&nbsp;</th>';
                        $html .= '<th width="10%">'.number_format($noidung->vanchuyen_tongthanhtien_mienbac,2,'.',',').'</th>';
                        $html .= '<th width="10%">&nbsp;</th>';
                        $html .= '<th width="10%">'.number_format($noidung->vanchuyen_tongthue_mienbac,2,'.',',').'</th>';
                    $html .= '</tr>';
                    $html .='</tbody></table></fieldset>';
                }
                    $html .= '</td></tr>';
                // lấy danh sách vận chuyển ở miền trung
                $html .= '<tr><td colspan="9">';
                $vanchuyen_mientrung = $noidung->vanchuyen_mientrung;
                if(count($vanchuyen_mientrung)>0){
                $html .= '<fieldset >';
                $html .= '<legend><h3>MIỀN TRUNG</h3></legend>';
                $html .= '<table width="100%" class="table_clone" id="vanchuyen_mientrung" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th width="10%">Loại xe</th>';
                    $html .= '<th width="20%">Đơn giá</th>';
                    $html .= '<th width="10%">Số lượng</th>';
                    $html .= '<th width="10%">Ngày/Giờ/Km</th>';
                    $html .= '<th width="10%">FOC</th>';
                    $html .= '<th width="10%">Thành tiền</th>';
                    $html .= '<th width="10%">Thuế suất</th>';
                    $html .= '<th width="20%">Thuế</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                $vc_mt = 0;
                foreach($vanchuyen_mientrung as $vcValMT){
                        $html .= '<tr>';
                            $html .= '<td width="10%"><a target="blank" href="index.php?module=Cars&action=DetailView&record='.$vcValMT->vanchuyen_name_mt.'"><b>'.translate( 'list_vanchuyen_dom_middle','',$vcValMT->vanchuyen_name_mt).'</b></a></td>';
                            if(!empty($vcValMT->dongia_option_mt)){
                                $html .= '<td width="20%" class="tabDetaiViewDF">'.$vcValMT->vanchuyen_dongia_mt.' '.translate('vanchuyen_dongia_option','',$vcValMT->dongia_option_mt) .'</td>';
                            }
                            else{
                                $html .= '<td width="20%" class="tabDetaiViewDF">'.$vcValMT->vanchuyen_dongia_mt.' '.translate('vanchuyen_dongia_option','','') .'</td>';
                            }
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$vcValMT->vanchuyen_soluong_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$vcValMT->vanchuyen_songay_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$vcValMT->vanchuyen_foc_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($vcValMT->vanchuyen_thanhtien_mt,2,'.',',').'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$vcValMT->vanchuyen_thuexuat_mt.'</td>';
                            $html .= '<td width="20%" class="tabDetaiViewDF">'.number_format($vcValMT->vanchuyen_vat_mt,2,'.',',').'</td>';
                        $html .= '</tr> ';
                        $vc_mt++;             
                }
                $html .= '<tr>';
                    $html .= '<th width="10%"><b>Tổng cộng</b></th>';
                    $html .= '<th width="20%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">'.number_format($noidung->vanchuyen_tongthanhtien_mientrung,2,'.',',').'</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">'.number_format($noidung->vanchuyen_tongthue_mientrung,2,'.',',').'</th>';
                $html .= '</tr>';
                $html .= '</tbody></table></fieldset>';
                }
                $htnl .= '</td></tr>';
                // lấy danh sách vận chuyển ở miền nam
                $vanchuyen_miennam = $noidung->vanchuyen_miennam;
                if(count($vanchuyen_miennam)>0){
                $html .= '<tr><td colspan="9">';
                $html .= '<fieldset >';
                $html .= '<legend><h3>MIỀN NAM</h3></legend>';
                $html .= '<table width="100%" class="table_clone" id="vanchuyen_miennam" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th width="10%">Lọai xe</th>';
                    $html .= '<th width="20%">Đơn giá</th>';
                    $html .= '<th width="10%">Số lượng</th>';
                    $html .= '<th width="10%">Ngày/Giờ/Km</th>';
                    $html .= '<th width="10%">FOC</th>';
                    $html .= '<th width="10%">Thành tiền</th>';
                    $html .= '<th width="10%">Thuế suất</th>';
                    $html .= '<th width="20%">Thuế</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                foreach($vanchuyen_miennam as $vcValMN){
                        $html .= '<tr>';
                            $html .= '<td width="10%"><a target="blank" href="index.php?module=Cars&action=DetailView&record='.$vcValMN->vanchuyen_name_mn.'"><b>'.translate( 'list_vanchuyen_dom_south','',$vcValMN->vanchuyen_name_mn).'</b></a></td>';
                            if(!empty($vcValMN->dongia_option_mn)){
                                $html .= '<td width="20%" class="tabDetaiViewDF">'.$vcValMN->vanchuyen_dongia_mn.' '.translate('vanchuyen_dongia_option','',$vcValMN->dongia_option_mn) .'</td>';
                            }
                            else{
                               $html .= '<td width="20%" class="tabDetaiViewDF">'.$vcValMN->vanchuyen_dongia_mn.' '.translate('vanchuyen_dongia_option','','') .'</td>'; 
                            }
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$vcValMN->vanchuyen_soluong_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$vcValMN->vanchuyen_songay_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$vcValMN->vanchuyen_foc_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($vcValMN->vanchuyen_thanhtien_mn,2,'.',',').'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$vcValMN->vanchuyen_thuexuat_mn.'</td>';
                            $html .= '<td width="20%" class="tabDetaiViewDF">'.number_format($vcValMN->vanchuyen_vat_mn,2,'.',',').'</td>';
                        $html .= '</tr> ';
                    }
                $html .= '<tr>';
                    $html .= '<th width="10%"><b>Tổng cộng</b></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">'.number_format($noidung->vanchuyen_tongthanhtien_miennam,2,'.',',') .'</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">'.number_format($noidung->vanchuyen_tongthue_miennam,2,'.',',').'</th>';
                $html .= '</tr>';
                $html .= '</tbody></table></fieldset>';
                }
                $html .='</td></tr>';
                $html .= '<tr>';
                    $html .= '<th width="10%">TỔNG CỘNG</th>';
                    $html .= '<th width="20%">&nbsp;</th>';
                    $html .= '<th width="10%" >&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">'.number_format($noidung->vanchuyen_tongthanhtien,2,'.',',').'</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">'.number_format($noidung->vanchuyen_tongthue,2,'.',',').'</th>';
                    $html .= '<th width="20%">&nbsp;</th>';
                $html .= '</tr>';
                $html .= '</tbody>';
                $html .= '</table> </fieldset>';
                
                // ket thuc load du lieu van chuyen
                
                // load data dich vu
                $svArr = array();
            $svArr = $this->bean->getServiceData($this->bean->worksheet_tour_id);
             foreach($svArr as $arrsv){
                 $app_list_strings['list_dichvu_dom'][$arrsv['id']] = $arrsv['name'];
                 $app_list_strings['list_dichvu_giathamkhao_dom'][$arrsv['id']] = $arrsv['giathamkhao'];
             }
            
            if(count($svArr)>0){
                $html .= '<fieldset >';
                $html .= '<legend> <h3>DỊCH VỤ</h3></legend>';
                $html .= '<table width="100%" class="tabForm" border="0" id="dichvu" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<tbody>';
                // lấy danh sách dịch vụ miền bắc
                $html .= '<tr><td colspan="8">';
                $dichvu_mienbac = $noidung->dichvu_mienbac;
                if(count($dichvu_mienbac)>0){
                $html .= '<fieldset >';
                $html .= '<legend><h3>MIỀN BẮC</h3></legend>';
                $html .= '<table width="100%" class="tabDetailView" id="dichvu_mienbac" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th>Loại dịch vụ</th>';
                    $html .= '<th>Đơn giá</th>';
                    $html .= '<th>Số lượng</th>';
                    $html .= '<th>Số ngày</th>';
                    $html .= '<th>FOC</th>';
                    $html .= '<th>Thành tiền</th>';
                    $html .= '<th>Thuế suất</th>';
                    $html .= '<th>VAT</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                foreach($dichvu_mienbac as $svValMB){
                    $html .= '<tr>';
                        $html .= '<td width="20%"><a target="blank" href="index.php?module=Services&action=DetailView&record='.$svValMB->services_name_mb.'">'.translate('list_dichvu_dom_north','',$svValMB->services_name_mb).'</a> </td>';
                        $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($svValMB->services_dongia_mb,2,'.',',').'</td>';
                        $html .= '<td width="10%" class="tabDetaiViewDF">'.$svValMB->services_soluong_mb.'</td>';
                        $html .= '<td width="10%" class="tabDetaiViewDF">'.$svValMB->services_songay_mb.'</td>';
                        $html .= '<td width="10%" class="tabDetaiViewDF">'.$svValMB->services_foc_mb.'</td>';
                        $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($svValMB->services_thanhtien_mb,2,'.',',').'</td>';
                        $html .= '<td width="10%" class="tabDetaiViewDF">'.$svValMB->services_thuexuat_mb.'</td>';
                        $html .= '<td width="20%" class="tabDetaiViewDF">'.number_format($svValMB->services_vat_mb,2,'.',',').'</td>';
                    $html .= '</tr> ';
                }
                $html .= '<tr>';
                    $html .= '<th width="10%">Tổng cộng</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">'.number_format($noidung->service_tongthanhtien_mienbac,2,'.',',').'</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">'.number_format($noidung->service_tongthue_mienbac,2,'.',',').'</th>';
                $html .= '</tr>';
                $html .= '</tbody></table></fieldset>';
            }
                $html .= '</td></tr>';  
                // lấy danh sách dịch vụ miền trung
                $html .= '<tr><td colspan="8">';
                $dichvu_mientrung = $noidung->dichvu_mientrung;
                if(count($dichvu_mientrung)>0){
                $html .= '<fieldset >';
                $html .= '<legend><h3>MIỀN TRUNG</h3></legend>';
                $html .= '<table width="100%" class="tabDetailView" id="dichvu_mientrung" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th>Loại dịch vụ</th>';
                    $html .= '<th>Đơn giá</th>';
                    $html .= '<th>Số lượng</th>';
                    $html .= '<th>Số ngày</th>';
                    $html .= '<th>FOC</th>';
                    $html .= '<th>Thành tiền</th>';
                    $html .= '<th>Thuế suất</th>';
                    $html .= '<th>VAT</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $dv_mt = 0;
                foreach($dichvu_mientrung as $svValMT){
                    $html .= '<tr>';
                        $html .= '<td width="20%"><a target="blank" href="index.php?module=Services&action=DetailView&record='.$svValMT->services_name_mt.'">'.translate('list_dichvu_dom_middle','',$svValMT->services_name_mt).' </a></td>';
                        $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($svValMT->services_dongia_mt,2,'.',',').'</td>';
                        $html .= '<td width="10%" class="tabDetaiViewDF">'.$svValMT->services_soluong_mt.'</td>';
                        $html .= '<td width="10%" class="tabDetaiViewDF">'.$svValMT->services_songay_mt.'</td>';
                        $html .= '<td width="10%" class="tabDetaiViewDF">'.$svValMT->services_foc_mt.'</td>';
                        $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($svValMT->services_thanhtien_mt,2,'.',',').'</td>';
                        $html .= '<td width="10%" class="tabDetaiViewDF">'.$svValMT->services_thuexuat_mt.'</td>';
                        $html .= '<td width="20%" class="tabDetaiViewDF">'.number_format($svValMT->services_vat_mt,2,'.',',').'</td>';
                    $html .= '</tr> ';
                    $dv_mt ++;               
                }
                $html .= '<tr>';
                    $html .= '<th width="10%"><b>Tổng cộng</b></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">'.number_format($noidung->service_tongthanhtien_mientrung,2,'.',',').'</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">'.number_format($noidung->service_tongthue_mientrung,2,'.',',').'</th>';
                $html .= '</tr>';
                $html .= '</tbody></table></fieldset>';
                }
                $html .= '</td></tr>';
                  // lay danh sách dịch vụ ở miền nam
            
                $html .= '<tr><td colspan="8">';
                
                $dichvu_miennam = $noidung->dichvu_miennam;
                if(count($dichvu_miennam)>0){
                $html .= '<fieldset >';
                $html .= '<legend><h3>MIỀN NAM</h3></legend>';
                $html .= '<table width="100%" class="tabDetailView" id="dichvu_mienbac" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th>Loại dịch vụ</th>';
                    $html .= '<th>Đơn giá</th>';
                    $html .= '<th>Số lượng</th>';
                    $html .= '<th>Số ngày</th>';
                    $html .= '<th>FOC</th>';
                    $html .= '<th>Thành tiền</th>';
                    $html .= '<th>Thuế suất</th>';
                    $html .= '<th>VAT</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                foreach($dichvu_miennam as $svValMN){
                        $html .= '<tr>';
                            $html .= '<td width="20%"><a target="blank" href="index.php?module=Services&action=DetailView&record='.$svValMN->services_name_mn.'">'.translate('list_dichvu_dom_south','',$svValMN->services_name_mn).'</a></td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($svValMN->services_dongia_mn,2,'.',',').'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$svValMN->services_soluong_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$svValMN->services_songay_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$svValMN->services_foc_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($svValMN->services_thanhtien_mn,2,'.',',').'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$svValMN->services_thuexuat_mn.'</td>';
                            $html .= '<td width="20%" class="tabDetaiViewDF">'.number_format($svValMN->services_vat_mn,2,'.',',').'</td>';
                        $html .= '</tr> ';
                    }
                    $html .= '<tr>';
                        $html .= '<th width="10%"><b>Tổng cộng</b></th>';
                        $html .= '<th width="10%">&nbsp;</th>';
                        $html .= '<th width="10%">&nbsp;</th>';
                        $html .= '<th width="10%">&nbsp;</th>';
                        $html .= '<th width="10%">&nbsp;</th>';
                        $html .= '<th width="10%">'.number_format($noidung->service_tongthanhtien_miennam,2,'.',',').'</th>';
                        $html .= '<th width="10%">&nbsp;</th>';
                        $html .= '<th width="10%">'.number_format($noidung->service_tongthue_miennam,2,'.',',').'</th>';
                    $html .= '</tr>';
                $html .= '</tbody></table></fieldset>';
                }
                $html .= '</td></tr>';
                $html .= '<tr>';
                    $html .= '<th>TỔNG CỘNG</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>'.number_format($noidung->service_tongthanhtien,2,'.',',').'</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>'.number_format($noidung->service_tongthue,2,'.',',').'</th>';
                $html .= '</tr>';
                $html .= '</tbody>';
                $html .= '</table> </fieldset>';
            }
            
            // ket thuc phan dich vu
            
            // phan du lieu tham quan
                $html .= '<fieldset>';
                $html .= '<legend> <h3>THAM QUAN</h3></legend>';
                $html .= '<table width="100%" class="tabForm" border="0" id="thamquan" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<tbody>';
                // lấy danh sách tham quan tại miền bắc
                $html .= '<tr><td colspan="10">';
                $thamquan_mienbac = $noidung->thamquan_mienbac;
                if(count($thamquan_mienbac)>0){
                $html .= '<fieldset >';
                $html .= '<legend><h3>MIỀN BẮC</h3></legend>';
                $html .= '<table width="100%" class="tabDetailView" id="thamquan_mienbac" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th>Địa điểm tham quan</th>';
                    $html .= '<th>Đơn giá NL</th>';
                    $html .= '<th>Số lượng NL</th>';
                    $html .= '<th>Đơn giá TE</th>';
                    $html .= '<th>Số lượng TE</th>';
                    $html .= '<th>Số ngày</th>';
                    $html .= '<th>FOC</th>';
                    $html .= '<th>Thành tiền</th>';
                    $html .= '<th>Thuế suất</th>';
                    $html .= '<th>VAT</th>';
                $html .= '</tr>';
                $html .= '<thead>';
                $html .= '<tbody>';
                foreach($thamquan_mienbac as $tqValMB){
                        $html .= '<tr>';
                            $html .= '<td width="10%" class="tabDetaiViewDF"><a target="blank" href="index.php?module=Locations&action=DetailView&record='.$tqValMB->thamquan_name_mb.'">'.translate('list_thamquan_dom_north','',$tqValMB->thamquan_name_mb).'</a> </td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($tqValMB->thamquan_gianguoilon_mb,2,'.',',').' </td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$tqValMB->thamquan_soluongnguoilon_mb.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($tqValMB->thamquan_dongiatreem_mb,2,'.',',').'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$tqValMB->thamquan_soluongtreem_mb.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$tqValMB->thamquan_songay_mb.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$tqValMB->thamquan_foc_mb.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($tqValMB->thamquan_thanhtien_mb,2,'.',',').'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$tqValMB->thamquan_thuesuat_mb.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($tqValMB->thamquan_vat_mb,2,'.',',').'</td>';
                        $html .= '</tr> '; 
                    }
                $html .= '<tr>';
                    $html .= '<th width="10%"><b>Tổng cộng</b></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">'.number_format($noidung->thamquan_tongthanhtien_mienbac,2,'.',',').'</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">'.number_format($noidung->thamquan_tongthue_mienbac,2,'.',',').'</th>';
                $html .= '</tr>';
                $html .= '</tbody></table></fieldset>';
                }
                $html .= '</td></tr>';
                //  lấy danh sách tham quan tại miền trung
            
                $html .= '<tr><td colspan="10">';
                $thamquan_mientrung = $noidung->thamquan_mientrung;
                if(count($thamquan_mientrung)>0){
                $html .= '<fieldset >';
                $html .= '<legend><h3>MIỀN TRUNG</h3></legend>';
                $html .= '<table width="100%" class="tabDetailView" id="thamquan_mientrung" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th>Địa điểm tham quan</th>';
                    $html .= '<th>Đơn giá NL</th>';
                    $html .= '<th>Số lượng NL</th>';
                    $html .= '<th>Đơn giá TE</th>';
                    $html .= '<th>Số lượng TE</th>';
                    $html .= '<th>Số ngày</th>';
                    $html .= '<th>FOC</th>';
                    $html .= '<th>Thành tiền</th>';
                    $html .= '<th>Thuế suất</th>';
                    $html .= '<th>VAT</th>';
                $html .= '</tr>';
                $html .= '<thead>';
                $html .= '<tbody>';
                $tq_mt = 0;
                foreach($thamquan_mientrung as $tqValMT){
                        $html .= '<tr>';
                            $html .= '<td width="10%"><a target="blank" href="index.php?module=Locations&action=DetailView&record='.$tqValMT->thamquan_name_mt.'">'.translate('list_thamquan_dom_middle','',$tqValMT->thamquan_name_mt).'</a></td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($tqValMT->thamquan_gianguoilon_mt,2,'.',',').'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$tqValMT->thamquan_soluongnguoilon_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($tqValMT->thamquan_dongiatreem_mt,2,'.',',').'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$tqValMT->thamquan_soluongtreem_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$tqValMT->thamquan_songay_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$tqValMT->thamquan_foc_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($tqValMT->thamquan_thanhtien_mt,2,'.',',').'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$tqValMT->thamquan_thuesuat_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($tqValMT->thamquan_vat_mt,2,'.',',').'</td>';
                        $html .= '</tr> ';  
                        $tq_mt++;              
                    }
                $html .= '<tr>';
                    $html .= '<th width="10%"><b>Tổng cộng</b></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">'.number_format($noidung->thamquan_tongthanhtien_mientrung,2,'.',',').'</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">'.number_format($noidung->thamquan_tongthue_mientrung,2,'.',',').'</th>';
                $html .= '</tr>';
                $html .= '</tbody></table></fieldset>';
                }
                $html .= '</td></tr>';
                /// lấy danh sách tham quan tại miền nam
                
                $html .= '<tr><td colspan="10">';
                $thamquan_miennam = $noidung->thamquan_miennam;
                if(count($thamquan_miennam)>0){
                $html .= '<fieldset >';
                $html .= '<legend><h3>MIỀN NAM</h3></legend>';
                $html .= '<table width="100%" class="tabDetailView" id="thamquan_miennam" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th>Địa điểm tham quan</th>';
                    $html .= '<th>Đơn giá NL</th>';
                    $html .= '<th>Số lượng NL</th>';
                    $html .= '<th>Đơn giá TE</th>';
                    $html .= '<th>Số lượng TE</th>';
                    $html .= '<th>Số ngày</th>';
                    $html .= '<th>FOC</th>';
                    $html .= '<th>Thành tiền</th>';
                    $html .= '<th>Thuế suất</th>';
                    $html .= '<th>VAT</th>';
                $html .= '</tr>';
                $html .= '<thead>';
                $html .= '<tbody>';
                foreach($thamquan_miennam as $tqValMN){
                        $html .= '<tr>';
                            $html .= '<td width="10%"><a target="blank" href="index.php?module=Locations&action=DetailView&record='.$tqValMN->thamquan_name_mn.'">'.translate('list_thamquan_dom_south','',$tqValMN->thamquan_name_mn).'</a></td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($tqValMN->thamquan_gianguoilon_mn,2,'.',',').'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$tqValMN->thamquan_soluongnguoilon_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($tqValMN->thamquan_dongiatreem_mn,2,'.',',').'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$tqValMN->thamquan_soluongtreem_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$tqValMN->thamquan_songay_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$tqValMN->thamquan_foc_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($tqValMN->thamquan_thanhtien_mn,2,'.',',').'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.$tqValMN->thamquan_thuesuat_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDF">'.number_format($tqValMN->thamquan_vat_mn,2,'.',',').'</td>';
                        $html .= '</tr> ';  
                    }
                $html .= '<tr>';
                    $html .= '<th width="10%"><b>Tổng cộng</b></th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">'.number_format($noidung->thamquan_tongthanhtien_miennam,2,'.',',').'</th>';
                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%">'.number_format($noidung->thamquan_tongthue_mienam,2,'.',',').'</th>';
                $html .= '</tr>';
                $html .= '</tbody></table></fieldset>';
                }
                $html .= '</td></tr>';
                $html .= '<tr>';
                    $html .= '<th>TỔNG CỘNG</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>'.number_format($noidung->thamquan_tongthanhtien,2,'.',',').'</th>';
                    $html .= '<th>&nbsp;</th>';
                    $html .= '<th>'.number_format($noidung->thamquan_tongthue,2,'.',',').'</th>';
                $html .= '</tr>';
                $html .= '</body>';
                $html .= '</table> </fieldset>';
                // CHI PHI HUONG DAN VIEN
                
                
                $html .= '<fieldset>';
                $html .= '<legend><h3>CHI PHÍ HDV + LÁI XE</h3></legend> ';
                $html .= '<table class="tabForm" width="100%" cellpadding="0" cellspacing="0" border="0">';
                    $html .= '<tr> ';
                        $html .= '<td width="14%"><input type="text" style="display: none;" value=""/></td>  ';
                        $html .= '<td width="14%"><input type="text" style="display: none;"/></td>';
                        $html .= '<td width="14%"><input type="text" style="display: none;" value=""/></td>  ';
                        $html .= '<td width="14%">'.number_format($noidung->tongchi_hvd,2,'.',',').'</td> ';
                        $html .= '<td width="14%"><input type="text" style="display: none;" value=""/></td> ';
                        $html .= '<td width="14%">'.number_format($noidung->tongthue_hvd,2,'.',',').'</td>';
                        $html .= '<td width="14%">&nbsp;</td>';
                    $html .= '</tr>';
                    $html .= '<tr>';
                        $html .= '<td colspan="7"> ';
                        $huongdanvienmb = $noidung->huongdanvienmb;  
                        if(count($huongdanvienmb)>0){
                        $html .= '<fieldset>';
                        $html .= '<legend><h4>Miền bắc</h4></legend>';
                            $html .= '<table class="tabDetaiView" id="cphdv_mb" cellpadding="0" cellspacing="0" width="100%" border="0">';
                                $html .= '<thead>';
                                    $html .= '<tr>  ';
                                        $html .= '<td class="dataLabel">Loại chí phí</td>';
                                        $html .= '<td class="dataLabel">Số lượng</td> ';
                                        $html .= '<td class="dataLabel">Đơn giá</td> ';
                                        $html .= '<td class="dataLabel">Thành tiền</td> ';
                                        $html .= '<td class="dataLabel">Thuế suất</td> ';
                                        $html .= '<td class="dataLabel">VAT</td>';
                                    $html .= '</tr> ';
                                    $html .= '<tr> ';
                                        $html .= '<td>&nbsp;</td>';
                                        $html .= '<td>&nbsp;</td>';
                                        $html .= '<td>&nbsp;</td> ';
                                        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->tongchi_hvd_mb,2,'.',',').'</td> ';
                                        $html .= '<td>&nbsp;</td> ';
                                        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->tongthue_hvd_mb,2,'.',',').'</td>';
                                    $html .= '</tr>  ';
                                $html .= '</thead> ';
                                $html .= '<tbody> ';
                                            foreach ($huongdanvienmb as $val){
                                                $html .= '<tr>';
                                                    $html .= '<td>'.$val->loaichiphi.'</td>';
                                                    $html .= '<td class="tabDetailViewDF">'.$val->soduong.'</td>';
                                                    $html .= '<td class="tabDetailViewDF">'.number_format($val->dongia,2,'.',',').'</td>';
                                                    $html .= '<td class="tabDetailViewDF">'.number_format($val->thanhtien,2,'.',',').'</td>';
                                                    $html .= '<td class="tabDetailViewDF">'.$val->thuesuat.'</td>';
                                                    $html .= '<td class="tabDetailViewDF">'.number_format($val->vat,2,'.',',').'</td>';
                                                $html .= '</tr>';
                                            }
                                $html .= '</tbody> ';
                            $html .= '</table>';
                            $html .= '</fieldset>';
                        }
                        $html .= '</td> ';
                    $html .= '</tr> ';
                    $html .= '<tr> ';
                        $html .= '<td colspan="7"> ';
                        $huongdanvienmt = $noidung->huongdanvienmt;
                        if(count($huongdanvienmt)>0){
                        $html .= '<fieldset> ';
                        $html .= '<legend><h4>Miền trung</h4></legend> ';
                            $html .= '<table class="table_clone" id="cphdv_mt" cellpadding="0" cellspacing="0" width="100%" border="0">';
                               $html .= '<thead> ';
                                    $html .= '<tr>';
                                        $html .= '<td class="dataLabel">Loại chí phí</td> ';
                                        $html .= '<td class="dataLabel">Số lượng</td> ';
                                        $html .= '<td class="dataLabel">Đơn giá</td> ';
                                        $html .= '<td class="dataLabel">Thành tiền</td> ';
                                        $html .= '<td class="dataLabel">Thuế suất</td>';
                                        $html .= '<td class="dataLabel">VAT</td>';
                                    $html .= '</tr> ';
                                    $html .= '<tr>';
                                        $html .= '<td>&nbsp;</td>';
                                        $html .= '<td>&nbsp;</td>';
                                        $html .= '<td>&nbsp;</td>';
                                        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->tongchi_hvd_mt,2,'.',',').'</td>';
                                        $html .= '<td>&nbsp;</td> ';
                                        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->tongthue_hvd_mt,2,'.',',').'</td>';
                                    $html .= '</tr>';
                                $html .= '</thead>'; 
                                $html .= '<tbody>';
                                        foreach ($huongdanvienmt as $val){
                                                $html .= '<tr>';
                                                    $html .= '<td>'.$val->loaichiphi.'</td>';
                                                    $html .= '<td class="tabDetailViewDF">'.$val->soduong.'</td>';
                                                    $html .= '<td class="tabDetailViewDF">'.number_format($val->dongia,2,'.',',').'</td>';
                                                    $html .= '<td class="tabDetailViewDF">'.number_format($val->thanhtien,2,'.',',').'</td>';
                                                    $html .= '<td class="tabDetailViewDF">'.$val->thuesuat.'</td>';
                                                    $html .= '<td class="tabDetailViewDF">'.number_format($val->vat,2,'.',',').'</td>';
                                                $html .= '</tr>';
                                            }
                                $html .= '</tbody>';
                            $html .= '</table>';
                            $html .= '</fieldset>';
                        }
                        $html .= '</td>';
                    $html .= '</tr>';
                    $html .= '<tr>';
                        $html .= '<td colspan="7"> ';
                        $huongdanvienmn = $noidung->huongdanvienmn;
                        if(count($huongdanvienmn)>0){
                        $html .= '<fieldset>';
                        $html .= '<legend><h4>Miền nam</h4></legend> ';
                            $html .= '<table class="table_clone" id="cphdv_mn" cellpadding="0" cellspacing="0" width="100%" border="0">';
                                $html .= '<thead>';
                                    $html .= '<tr> ';
                                        $html .= '<td class="dataLabel">Loại chí phí</td>';
                                        $html .= '<td class="dataLabel">Số lượng</td> ';
                                        $html .= '<td class="dataLabel">Đơn giá</td>';
                                        $html .= '<td class="dataLabel">Thành tiền</td>';
                                        $html .= '<td class="dataLabel">Thuế suất</td>';
                                        $html .= '<td class="dataLabel">VAT</th> ';
                                    $html .= '</tr>';
                                    $html .= '<tr> ';
                                        $html .= '<td>&nbsp;</td>';
                                        $html .= '<td>&nbsp;</td>';
                                        $html .= '<td>&nbsp;</td> ';
                                        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->tongchi_hvd_mn,2,'.',',').'</td> ';
                                        $html .= '<td>&nbsp;</td>';
                                        $html .= '<td class="tabDetailViewDF">'.number_format($noidung->tongthue_hvd_mn,2,'.',',').'</td>';
                                    $html .= '</tr>';
                                $html .= '</thead>';  
                                $html .= '<tbody>';
                                        foreach ($huongdanvienmn as $val){
                                                $html .= '<tr>';
                                                    $html .= '<td>'.$val->loaichiphi.'</td>';
                                                    $html .= '<td class="tabDetailViewDF">'.$val->soduong.'</td>';
                                                    $html .= '<td class="tabDetailViewDF">'.number_format($val->dongia,2,'.',',').'</td>';
                                                    $html .= '<td class="tabDetailViewDF">'.number_format($val->thanhtien,2,'.',',').'</td>';
                                                    $html .= '<td class="tabDetailViewDF">'.$val->thuesuat.'</td>';
                                                    $html .= '<td class="tabDetailViewDF">'.number_format($val->vat,2,'.',',').'</td>';
                                                $html .= '</tr>';
                                            }
                                $html .= '</tbody>';
                            $html .= '</table>';
                            $html .= '</fieldset>';
                            }               
                        $html .= '</td>';
                    $html .= '</tr>'; 
                $html .= '</table>';
            $html .= '</fieldset>';
                
                
                // CHI PHI KHAC
                 $chiphikhac = $noidung->chiphikhac;
                 $countchiphikhac = count($chiphikhac);
                 if($countchiphikhac>0){ 
                 $html .= '<fieldset>';
                        $html .= '<legend><h3>CHI PHÍ KHÁC</h3></legend> ';
                        $html .= '<table class="tabDetailView" cellpadding="0" id="chiphikhac" cellspacing="0" width="100%" style="border-collapse: collapse;">';
                            $html .= '<thead> ';
                                $html .= '<tr>';
                                    $html .= '<th>Loại dịch vụ</th>  ';
                                    $html .= '<th>Số lượng</th> ';
                                    $html .= '<th>Đơn giá</th> ';
                                    $html .= '<th>FOC</th> ';
                                    $html .= '<th>Thành tiền</th>';
                                    $html .= '<th>Thuế suất</th>';
                                    $html .= '<th>VAT</th>';
                                $html .= '</tr>';
                            $html .= '</thead>';
                            
                            $html .= '<tbody> ';
                                 foreach($chiphikhac as $chiphikhacval){
                                    $html .= '<tr>';
                                        $html .= '<td>'.$chiphikhacval->chiphikhac_loaidichvu.'</td>'; 
                                        $html .= '<td class="tabDetaiViewDF">'.$chiphikhacval->chiphikhac_soluong.'</td>'; 
                                        $html .= '<td class="tabDetaiViewDF">'.number_format($chiphikhacval->chiphikhac_dongia,2,'.',',').'</td>'; 
                                        $html .= '<td class="tabDetaiViewDF">'.$chiphikhacval->chiphikhac_foc.'</td>'; 
                                        $html .= '<td class="tabDetaiViewDF">'.number_format($chiphikhacval->chiphikhac_thanhtien,2,'.',',').'</td>'; 
                                        $html .= '<td class="tabDetaiViewDF">'.$chiphikhacval->chiphikhac_thuesuat.'</td>'; 
                                        $html .= '<td class="tabDetaiViewDF">'.number_format($chiphikhacval->chiphikhac_vat,2,'.',',').'</td>'; 
                                    $html .= '</tr>'; 
                                 }
                             }
                             $html .= '<tr> ';
                                $html .= '<th>Tổng cộng</th>';
                                $html .= '<th class="tabDetaiViewDF">&nbsp;</th>';
                                $html .= '<th class="tabDetaiViewDF">&nbsp;</th>';
                                $html .= '<th class="tabDetaiViewDF">&nbsp;</th> ';
                                $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->chiphikhac_tongcong,2,'.',',').'</td>';
                                $html .= '<th class="tabDetaiViewDF">&nbsp;</th>';
                                $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->chiphikhac_tongthue,2,'.',',').'</td>';
                                $html .= '<th class="tabDetaiViewDF">&nbsp;</th> '; 
                             $html .= '</tr>';
                            $html .= '</tbody>';
                            
                        $html .= '</table>';
                        
                    $html .= '</fieldset>';
                    
                    $html .= '<fieldset>';
                    $html .= '<legend><h3>TỔNG CHI PHÍ</h3></legend>';
                    $html .= '<table cellpadding="0" cellspacing="0" border="1" class="tabForm" style="border-collapse: collapse;" width="100%">';
                    $html .= '<tr>';
                        $html .= '<td class="notcenter"><b>TỔNG CHI PHÍ</b></td> ';
                        $html .= '<td>&nbsp;</td> ';
                        $html .= '<td class="center">&nbsp;</td>';
                        $html .= '<td class="center">&nbsp;</td> ';
                        $html .= '<td class="center">&nbsp;</td> ';
                        $html .= '<td class="center">&nbsp;</td> ';
                        $html .= '<td class="center">'.number_format($noidung->tongchiphi,2,'.',',').'</td>';
                        $html .= '<td class="center">'.number_format($noidung->tongthue,2,'.',',').'</td>';
                        $html .= '<td class="center">&nbsp;</td>';
                        $html .= '<td class="center">&nbsp;</td> ';
                        $html .= '<td class="center">&nbsp;</td>';
                    $html .= '</tr>';
                 $html .= '</table>';
                 $html .= '</fieldset>';
                
                // PHẦN CÁC KHOẢN GIÁ BÁN CỦA CHIẾT TÍNH
                $html .= '<fieldset> ';
                    $html .= '<legend><h3>GIÁ BÁN</h3></legend>';
                    $html .= '<table cellpadding="0" class="tabDetailView" cellspacing="0" border="0" width="100%" class="tabForm">';
                        $html .= '<tr>';
                            $html .= '<td  class="tabDetaiViewDF"><h4>GIÁ BÁN</h4></td>';
                            $html .= '<td  class="tabDetaiViewDF"><h4>SỐ LƯỢNG</h4></td> ';
                            $html .= '<td  class="tabDetaiViewDF"><h4>ĐƠN GIÁ</h4></td>';
                            $html .= '<td  class="tabDetaiViewDF"><h4>FOC</h4></td>';
                            $html .= '<td  class="tabDetaiViewDF"><h4>THÀNH TIỀN</h4></td>';
                            $html .= '<td  class="tabDetaiViewDF"><h4>THUẾ SUẤT</h4></td> ';
                            $html .= '<td  class="tabDetaiViewDF"><h4>THUẾ </h4></td>';
                        $html .= '</tr> ';
                        
                        $html .= '<tr> ';
                            $html .= '<td class="tabDetaiViewDL" colspan="7"><h3>1) GIÁ CÓ VMB/TÀU HỎA</h3></td>';
                        $html .= '</tr> ';
                        
                        $html .= '<tr>';
                            $html .= '<td class="tabDetaiViewDL">Khách người lớn</td>  ';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->sl_khach_nl_1.'</td> ';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->dg_khach_nl_1,2,'.',',').'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->foc_khach_nl_1.'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->tt_khach_nl_1,2,'.',',').'</td> ';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->ts_khach_nl_1.'</td> ';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->thue_khach_nl_1,2,'.',',').'</td> ';
                        $html .= '</tr> ';
                        
                        $html .= '<tr>';
                            $html .= '<td class="tabDetaiViewDL">Trẻ em từ 5-11 tuổi</td>';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->sl_treem_1.'</td> ';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->dg_treem_1,2,'.',',').'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->foc_treem_1.'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->tt_treem_1,2,'.',',').'</td> ';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->ts_treem_1.'</td> ';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->thue_treem_1,2,'.',',').'</td> ';
                        $html .= '</tr> ';
                        
                        $html .= '<tr> ';
                            $html .= '<td class="tabDetaiViewDL">Phụ thu phòng đơn</td>';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->sl_phuthuphongdon_1.'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->dg_phuthuphongdon_1,2,'.',',').'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->foc_phuthuphongdon_1.'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->tt_phuthuphongdon_1,2,'.',',').'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->ts_phuthuphongdon_1.'</td> ';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->thue_phuthuphongdon_1,2,'.',',').'</td>';
                        $html .= '</tr>  ';
                        
                        $html .= '<tr>';
                            $html .= '<td class="tabDetaiViewDL">Phụ thu khác</td> ';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->sl_phuthukhac_1.'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->dg_phuthukhac_1,2,'.',',').'</td> ';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->foc_phuthukhac_1.'</td> ';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->tt_phuthukhac_1,2,'.',',').'</td> ';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->ts_phuthukhac_1.'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->thue_phuthukhac_1,2,'.',',').'<td> ';
                        $html .= '</tr>';
                        
                        $html .= '<tr>';
                            $html .= '<td class="tabDetaiViewDL" colspan="7"><h3> 2) GIÁ KHÔNG CÓ VMB/TÀU HỎA</h3></td> ';
                        $html .= '</tr>';
                        
                        $html .= '<tr> ';
                            $html .= '<td class="tabDetaiViewDL">Khách người lớn</td>';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->sl_khach_nl_2.'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->dg_khach_nl_2,2,'.',',').'</td> ';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->foc_khach_nl_2.'</td> ';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->tt_khach_nl_2,2,'.',',').'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->ts_khach_nl_2.'</td> ';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->thue_khach_nl_2,2,'.',',').'</td>';
                        $html .= '</tr>';
                        
                        $html .= '<tr>';
                            $html .= '<td class="tabDetaiViewDL">Trẻ em từ 5-11 tuổi</td> ';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->sl_treem_2.'</td> ';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->dg_treem_2,2,'.',',').'</td> ';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->foc_treem_2.'</td> ';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->tt_treem_2,2,'.',',').'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->ts_treem_2.'</td> ';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->thue_treem_2,2,'.',',').'</td> ';
                        $html .= '</tr> ';
                        
                        $html .= '<tr> ';
                            $html .= '<td class="tabDetaiViewDL">Phụ thu phòng đơn</td>';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->sl_phuthuphongdon_2.'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->dg_phuthuphongdon_2,2,'.',',').'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->foc_phuthuphongdon_2.'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->tt_phuthuphongdon_2,2,'.',',').'</td> ';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->ts_phuthuphongdon_2.'</td> ';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->thue_phuthuphongdon_2,2,'.',',').'</td>';
                        $html .= '</tr>';
                        
                        $html .= '<tr> ';
                            $html .= '<td class="tabDetaiViewDL">Phụ thu khác</td>';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->sl_phuthukhac_2.'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->dg_phuthukhac_2,2,'.',',').'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->foc_phuthukhac_2.'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->tt_phuthukhac_2,2,'.',',').'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->ts_phuthukhac_2.'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->thue_phuthukhac_2,2,'.',',').'<td>';
                        $html .= '</tr>';
                        
                        $html .= '<tr>';
                            $html .= '<td class="tabDetaiViewDL" colspan="7"><h3> 3) CHẾ ĐỘ MIỄN PHÍ F.O.C</h3></td>';
                        $html .= '</tr> ';
                        
                        $html .= '<tr>';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->foc_option.'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->sl_foc_16.'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->dg_foc_16,2,'.',',').'</td> ';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->foc_foc_16.'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->tt_foc_16,2,'.',',').'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.$noidung->ts_foc_16.'</td>';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->thue_foc_16,2,'.',',').'</td>';
                        $html .= '</tr> ';
                        
                        /*$html .= '<tr>';
                            $html .= '<td class="tabDetaiViewDL">FOC (với đoàn 10-15 người)</td> ';
                            $html .= '<td class="tabDetaiViewDF"><input type="text" id="sl_treem_2" name="sl_foc_1015" value="{$sl_foc_1015}"></td>';
                            $html .= '<td class="tabDetaiViewDF"><input class="center" type="text" id="dg_foc_1015" name="dg_foc_1015" value="{$dg_foc_1015}"></td> ';
                            $html .= '<td class="tabDetaiViewDF"><input class="center" type="text" id="foc_foc_1015" name="foc_foc_1015" value="{$foc_foc_1015}"></td> ';
                            $html .= '<td class="tabDetaiViewDF"><input class="center" type="text" id="tt_foc_1015" name="tt_foc_1015" value="{$tt_foc_1015}"></td>';
                            $html .= '<td class="tabDetaiViewDF"><input class="center" type="text" id="ts_foc_1015" name="ts_foc_1015" value="{$ts_foc_1015}"></td> ';
                            $html .= '<td class="tabDetaiViewDF"><input class="center" type="text" id="thue_foc_1015" name="thue_foc_1015" value="{$thue_foc_1015}"></td> ';
                        $html .= '</tr> ';
                        
                        $html .= '<tr>';
                            $html .= '<td class="tabDetaiViewDL">FOC (với đoàn dưới 10 người)</td>';
                            $html .= '<td class="tabDetaiViewDF"><input type="text" id="sl_foc_10" name="sl_foc_10" value="{$sl_foc_10}"></td>';
                            $html .= '<td class="tabDetaiViewDF"><input class="center" type="text" id="dg_foc_10" name="dg_foc_10" value="{$dg_foc_10}"></td>';
                            $html .= '<td class="tabDetaiViewDF"><input class="center" type="text" id="foc_foc_10" name="foc_foc_10" value="{$foc_foc_10}"></td> ';
                            $html .= '<td class="tabDetaiViewDF"><input class="center" type="text" id="tt_foc_10" name="tt_foc_10" value="{$tt_foc_10}"></td>';
                            $html .= '<td class="tabDetaiViewDF"><input class="center" type="text" id="ts_foc_10" name="ts_foc_10" value="{$ts_foc_10}"></td>';
                            $html .= '<td class="tabDetaiViewDF"><input class="center" type="text" id="thue_foc_10" name="thue_foc_10" value="{$thue_foc_10}"></td>';
                        $html .= '</tr>'; */
                        
                        $html .= '<tr>';
                            $html .= '<td class="tabDetaiViewDL"><h3>TỔNG CỘNG</h3></td> ';
                            $html .= '<td class="tabDetaiViewDF">&nbsp;</td>';
                            $html .= '<td class="tabDetaiViewDF">&nbsp;</td>';
                            $html .= '<td class="tabDetaiViewDF">&nbsp;</td>';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->tongcong_giaban,2,'.',',').'</td>';
                            $html .= '<td class="tabDetaiViewDF">&nbsp;</td> ';
                            $html .= '<td class="tabDetaiViewDF">'.number_format($noidung->tongthue_giaban,2,'.',',').'</td>';
                        $html .= '</tr>';
                        
                    $html .= '</table>';
                $html .= '</fieldset>';
                
                // KẾT THÚC PHẦN CÁC KHOẢN GIÁ BÁN -->  
                
                
               // <!-- BÁO CÁO CHI TIẾT-->
            $htmlReport .= '<fieldset> ';
                $htmlReport .= '<legend><h3>CHI TIẾT</h3></legend>  '; 
                $htmlReport .= '<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tabForm" style="border-collapse:collapse"> '; 
                    $htmlReport .= '<tr>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<th>DUYỆT</th>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                        $htmlReport .= '<td width="15%" class="dataLabel">VAT ĐẦU RA</td> '; 
                        $htmlReport .= '<td width="25%" class="right"><b>'.number_format($noidung->vatdaura,2,'.',',').'</b></td> '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                    $htmlReport .= '</tr> '; 
                    $htmlReport .= '<tr> '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td width="15%" class="dataLabel">VAT ĐẦU VÀO</td> '; 
                        $htmlReport .= '<td class="right"><b>'.number_format($noidung->vatdauvao,2,'.',',').'</b></td> '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>   '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                    $htmlReport .= '</tr> '; 
                    $htmlReport .= '<tr> '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td width="15%" class="dataLabel">VAT PHẢI ĐÓNG</td>  '; 
                        $htmlReport .= '<td width="25%" class="right"><b>'.number_format($noidung->vatphaidong,2,'.',',').'</b></td> '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                    $htmlReport .= '</tr> '; 
                    $htmlReport .= '<tr>   '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td width="15%" class="dataLabel">DOANH THU</td>  '; 
                        $htmlReport .= '<td width="25%" class="right"><b>'.number_format($noidung->doanhthu,2,'.',',').'</b></td> '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                    $htmlReport .= '</tr>  '; 
                    $htmlReport .= '<tr>   '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td width="15%" class="dataLabel">TỔNG CHI PHÍ</td>  '; 
                        $htmlReport .= '<td width="25%" class="right"><b>'.number_format($noidung->tongchiphi1,2,'.',',').'</b></td> '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                    $htmlReport .= '</tr>  '; 
                    $htmlReport .= '<tr>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td width="15%" class="dataLabel">GIÁ VỐN/ 1 KHÁCH</td> '; 
                        $htmlReport .= '<td width="25%" class="right"><b>'.number_format($noidung->giavontrenkhach,2,'.',',').'</b></td> '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                    $htmlReport .= '</tr> '; 
                    $htmlReport .= '<tr>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                        $htmlReport .= '<td width="15%" class="notcenter dataLabel">GIÁ BÁN/ 1 KHÁCH</td>  '; 
                        $htmlReport .= '<td width="25%" class="right"><b>'.number_format($noidung->giabantrenkhach,2,'.',',').'</b></td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>   '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                    $htmlReport .= '</tr> '; 
                    $htmlReport .= '<tr>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>   '; 
                        $htmlReport .= '<td width="15%" class="dataLabel">LÃI KHÁCH</td>  '; 
                        $htmlReport .= '<td width="25%" class="right"><b>'.number_format($noidung->laikhach,2,'.',',').'</></td>   '; 
                        $htmlReport .= '<td>&nbsp;</td>    '; 
                        $htmlReport .= '<td>&nbsp;</td>   '; 
                        $htmlReport .= '<td>&nbsp;</td>   '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>   '; 
                    $htmlReport .= '</tr>  '; 
                    $htmlReport .= '<tr>  '; 
                        $htmlReport .= '<td>&nbsp;</td>   '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td width="15%" class="dataLabel">TỔNG LÃI</td>  '; 
                        $htmlReport .= '<td width="25%" class="right"><b>'.number_format($noidung->tonglai,2,'.',',').'</b></td>   '; 
                        $htmlReport .= '<td>&nbsp;</td>   '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>   '; 
                        $htmlReport .= '<td>&nbsp;</td>   '; 
                        $htmlReport .= '<td>&nbsp;</td>    '; 
                    $htmlReport .= '</tr>  '; 
                    $htmlReport .= '<tr>   '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td width="15%" class="dataLabel">TỶ LỆ SAU THUẾ VAT</td>  '; 
                        $htmlReport .= '<td width="25%" class="right"><b>'.number_format($noidung->tylesauthuevat,2,'.',',').'%</b></td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>   '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>   '; 
                        $htmlReport .= '<td>&nbsp;</td>    '; 
                    $htmlReport .= '</tr>     '; 

                    $htmlReport .= '<tr>   '; 
                        $htmlReport .= '<td>&nbsp;</td>   '; 
                        $htmlReport .= '<td>&nbsp;</td>    '; 
                        $htmlReport .= '<td>&nbsp;</td>   '; 
                        $htmlReport .= '<td>&nbsp;</td>   '; 
                        $htmlReport .= '<td width="15%" class="notcenter dataLabel">THUẾ TNDN</td>  '; 
                        $htmlReport .= '<td width="25%" class="right"><b>'.number_format($noidung->thuethunhapdn,2,'.',',').'</b></td>'; 
                        $htmlReport .= '<td>&nbsp;</td>   '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                        $htmlReport .= '<td>&nbsp;</td>   '; 
                        $htmlReport .= '<td>&nbsp;</td>   '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                    $htmlReport .= '</tr>  '; 
                    $htmlReport .= '<tr> '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td width="15%" class="notcenter dataLabel">LÃI RÒNG (NETT PROFIT)</td>  '; 
                        $htmlReport .= '<td width="25%" class="right"><b>'.number_format($noidung->lairongnettprofit,2,'.',',').'</b></td> '; 
                        $htmlReport .= '<td>&nbsp;</td>   '; 
                        $htmlReport .= '<td>&nbsp;</td>     '; 
                        $htmlReport .= '<td>&nbsp;</td>   '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                    $htmlReport .= '</tr>  '; 
                    $htmlReport .= '<tr>   '; 
                        $htmlReport .= '<td>&nbsp;</td>   '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>    '; 
                        $htmlReport .= '<td width="15%">TỶ LỆ SAU THUẾ TNDN</td>  '; 
                        $htmlReport .= '<td width="25%" class="right"><b>'.number_format($noidung->tylesauthuetndn,2,'.',',').'%</b></td>   '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                    $htmlReport .= '</tr>    '; 
                $htmlReport .= '</table>  '; 

            $htmlReport .= '</fieldset>';
            //<!-- KẾT THÚC BÁO CÁO CHI TIẾT-->
            }
                     
           
                      
                

  $this->ss->assign('HTML',$html);  
  $this->ss->assign('REPORT',$htmlReport);
}
}
?>
