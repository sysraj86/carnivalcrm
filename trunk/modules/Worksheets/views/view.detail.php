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
                    $html .= '<td class="tabDetailViewDL border" width="25%">Người lớn </td>';
                    $html .= '<td class="tabDetailViewDF ct_sl1 border">'.$noidung->NguoiLon1.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF border" >'.$noidung->NguoiLon1.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDL border"><strong>Số lượng FOC cho khách hàng :</strong> '.$this->bean->foc_number.'</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                    $html .= '<td class="tabDetailViewDL border"  width="25%">Trẻ em dưới 2 tuổi</td>';
                    $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->TreEm2Tuoi1.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF border"> '.$noidung->TreEm2Tuoi2.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF border">&nbsp;</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                    $html .= '<td class="tabDetailViewDL border" width="25%"> Trẻ em từ 2- 12 tuổi</td>';
                    $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->TreEm12Tuoi1.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->TreEm12Tuoi2.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDL border">&nbsp;</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                    $html .= '<td class="tabDetailViewDL border" width="25%">Số bữa ăn</td>';
                    $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->txtSoBuaAn1.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->txtSoBuaAn2.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF border">&nbsp;</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                    $html .= '<td class="tabDetailViewDL border" width="25%">Tour Leader</td>';
                    $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->txtTourLeader1.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->txtTourLeader2.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF border">&nbsp;</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                    $html .= '<td class="tabDetailViewDL border" width="25%">FOC VMB</td>';
                    $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->txtFOCVMB1.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->txtFOCVMB2.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF border">&nbsp;</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                   $html .= '<td class="tabDetailViewDL border" width="25%">FOC Land</td>';
                    $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->txtFOCLand1.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->land_treem.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF border"><strong>Land 2 trẻ em:</strong> '.$this->bean->land_treem.'</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                    $html .= '<td class="tabDetailViewDL border" width="25%">FOC VMB nội địa</td>';
                    $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->txtFOCVMBNoiDia1.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->txtFOCVMBNoiDia2.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF border">CLTG: '.$noidung->txtCLTG.'</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                    $html .= '<td class="tabDetailViewDL border">Single</td>';
                    $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->single1.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->single2.'</td>';
                    $html .= '<td align="center" class="tabDetailViewDF ct_sl2 border">&nbsp;</td>';
                $html .= '</tr>';
                if(!empty($noidung->outbound_currency)){
                   $currency = translate('currency_dom','',$noidung->outbound_currency);
                }
                else{
                    $currency = '';
                }
                $html .= '<tr>';
                    $html .= '<td class="tabDetailViewDL border">Tiền tệ</td>';
                    $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$currency.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF border">&nbsp;</td>';
                    $html .= '<td align="center" class="tabDetailViewDF ct_sl2 border">&nbsp;</td>';
                $html .= '</tr>';
                
                $html .= '<tr>';
                    $html .= '<td class="tabDetailViewDL border">Tỷ giá</td>';
                    $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$this->bean->tygia.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF border">&nbsp;</td>';
                    $html .= '<td align="center" class="tabDetailViewDF ct_sl2 border">&nbsp;</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                    $html .= '<td class="tabDetailViewDL border">Ngày tỷ giá</td>';
                    $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$this->bean->ngaytygia.'</td>';
                    $html .= '<td class="ct_sl2 tabDetailViewDF border">&nbsp;</td>';
                    $html .= '<td align="center" class="tabDetailViewDF ct_sl2 border">&nbsp;</td>';
                $html .= '</tr>';
            $html .= '</table>';
            
            $html .= '<table cellpadding="0" cellspacing="0" border="1" width="100%" style="border-collapse: collapse;" class="tabDetailView">';
            $html .= '<tr class="tr_color border"><td colspan="11" class="tr_color"><b>THU</b></td></tr>';
            $html .= '<tr>';
                $html .= '<td class="border">&nbsp;</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">&nbsp;</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">Ks 3 Sao</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">&nbsp;</td>';
                $html .= '<td colspan="2" align="center " class="ct_sl1 tabDetailViewDF border" >KS 4 Sao</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">&nbsp;</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">Ks 3 Sao</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">&nbsp;</td>';
                $html .= '<td colspan="2" align="center" class="ct_sl2 tabDetailViewDF border" >Ks 4 Sao</td>';
            $html .= '</tr>';
            $html .= '<tr>';
                $html .= '<td class="tabDetailViewDL border" width="25%">Người lớn</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->ks3saonguoilon1.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->ks3saonguoilon2.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->ks3saonguoilon3.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->ks4saonguoilon1.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->ks4saonguoilon2.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->ks3saonguoilon4.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->ks3saonguoilon5.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->ks3saonguoilon6.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->ks4saonguoilon3.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->ks4saonguoilon4.' $</td>';
            $html .= '</tr>';
            $html .= '<tr>';
                $html .= '<td class="tabDetailViewDL border" width="25%">Phụ thu khác (+)</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->ks3saophuthukhac1.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->ks3saophuthukhac2.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->ks3saophuthukhac3.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->ks4saophuthukhac1.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->ks4saophuthukhac2.' $</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->ks3saophuthukhac4.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->ks3saophuthukhac5.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->ks3saophuthukhac6.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->ks4saophuthukhac3.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->ks4saophuthukhac4.' $</td>';
            $html .= '</tr>';
            $html .= '<tr>';
                $html .= '<td class="tabDetailViewDL border" width="25%">Phụ thu khác (-)</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->ks3saophuthukhac_1.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->ks3saophuthukhac_2.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->ks3saophuthukhac_3.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->ks4saophuthukhac_1.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->ks4saophuthukhac_2.' $</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->ks3saophuthukhac_4.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->ks3saophuthukhac_5.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->ks3saophuthukhac_6.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->ks4saophuthukhac_3.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->ks4saophuthukhac_4.' $</td>';

            $html .= '</tr>';
            $html .= '<tr>';
                $html .= '<td class="tabDetailViewDL border" width="25%">Single Supp</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->ks3saosinglesupp1.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->ks3saosinglesupp2.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->ks3saosinglesupp3.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->ks4saosinglesupp1.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->ks4saosinglesupp2.' $</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->ks3saosinglesupp4.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->ks3saosinglesupp5.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->ks3saosinglesupp6.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->ks4saosinglesupp3.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->ks4saosinglesupp4.' $</td>';
            $html .= '</tr>';
            $html .= '<tr>';
                $html .= '<td class="tabDetailViewDL border" width="25%"><b>Tổng thu NL</b></td>';
                $html .= '<td class="tabDetailViewDF ct_sl1 border">&nbsp;</td>';
                $html .= '<td class="tabDetailViewDF ct_sl1 border">&nbsp;</td>';
                $html .= '<td class="ct_sl1 tinhtoan tabDetailViewDF border">'.$this->bean->tongthunguoilon1.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">&nbsp;&nbsp;&nbsp;</td>';
                $html .= '<td class="ct_sl1 tinhtoan tabDetailViewDF border">'.$this->bean->tongthunguoilon2.'</td>';
                $html .= '<td class="tabDetailViewDF ct_sl2 border">&nbsp;</td>';
                $html .= '<td class="tabDetailViewDF ct_sl2 border">&nbsp;</td>';
                $html .= '<td class="ct_sl2 tinhtoan tabDetailViewDF border">'.$this->bean->tongthunguoilon3.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">&nbsp;</td>';
                $html .= '<td class="ct_sl2 tinhtoan tabDetailViewDF border">'.$this->bean->tongthunguoilon4.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
                $html .= '<td class="tabDetailViewDL border" width="25%">Trẻ em dưới 2 tuổi</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->treem2tuoi1.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->treem2tuoi2.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->treem2tuoi3.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->treem2tuoi4.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->treem2tuoi5.' $</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->treem2tuoi7.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->treem2tuoi8.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->treem2tuoi9.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->treem2tuoi10.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->treem2tuoi11.' $</td>';
            $html .= '</tr>';
            $html .= '<tr>';
                $html .= '<td class="tabDetailViewDL border" width="25%">Trẻ em từ 2- 12 tuổi</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->treem12tuoi1.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->treem12tuoi2.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->treem12tuoi3.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->treem12tuoi4.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">'.$noidung->treem12tuoi5.' $</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->treem12tuoi7.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->treem12tuoi8.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->treem12tuoi9.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->treem12tuoi10.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">'.$noidung->treem12tuoi11.'$</td>';
            $html .= '</tr>';
            $html .= '<tr>';
                $html .= '<td class="tabDetailViewDL border" width="25%"><b>Tổng thu TE</b></td>';
                $html .= '<td class="tabDetailViewDF ct_sl1 border">&nbsp;</td>';
                $html .= '<td class="tabDetailViewDF ct_sl1 border">&nbsp;</td>';
                $html .= '<td class="ct_sl1 tinhtoan tabDetailViewDF border">'.$this->bean->tongthute1.'</td>';
                $html .= '<td class="ct_sl1 tabDetailViewDF border">&nbsp;</td>';
                $html .= '<td class="ct_sl1 tinhtoan tabDetailViewDF border">'.$this->bean->tongthute1.'</td>';
                $html .= '<td class="tabDetailViewDF ct_sl2 border">&nbsp;</td>';
                $html .= '<td class="tabDetailViewDF ct_sl2 border">&nbsp;</td>';
                $html .= '<td class="ct_sl2 tinhtoan tabDetailViewDF border">'.$this->bean->tongthute1.'</td>';
                $html .= '<td class="ct_sl2 tabDetailViewDF border">&nbsp;</td>';
                $html .= '<td class="ct_sl2 tinhtoan tabDetailViewDF border">'.$this->bean->tongthute1.'</td>';
            $html .= '</tr>';
        $html .= '</table>';
        
        // thu option
        $THUOPTION = $noidung->thuoption;
        $countThuOption = count($THUOPTION); 
        if($countThuOption>0){
        $html .= '<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="0" cellspacing="0" class="tabDetailView">';
        $html .= '<tr>';
            $html .= '<td colspan="7" class="tr_color border"><h3>THU OPTION</h3> </td>';
        $html .= '</tr>';
        $html .= '<tr>';
            $html .= '<td class="tabDetailViewDL border"><strong>TỔNG THU OPTIONS</strong></td>';
            $html .= '<td class="tabDetailViewDF border">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF border">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF border">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tinhtoan border">'.$this->bean->tongtien_thu.'</td>';
            $html .= '<td class="tabDetailViewDF border">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tinhtoan border">'.$this->bean->tongtien_thu1.'</td>';
        $html .= '</tr>';
        
        
         $html .= '<tr>';
            $html .= '<td class="tabDetailViewDL border"><strong>&nbsp;</strong></td>';
            $html .= '<td class="tabDetailViewDF border">Số lượng </td>';
            $html .= '<td class="tabDetailViewDF border">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF border">Đơn giá một</td>';
            $html .= '<td class="tabDetailViewDF border">Thành tiền một</td>';
            $html .= '<td class="tabDetailViewDF border">Đơn giá hai</td>';
            $html .= '<td class="tabDetailViewDF border">Thành tiền hai</td>';
        $html .= '</tr>';       
            foreach($THUOPTION as $val){
                $html .= '<tr>';
                $html .= '<td class="tabDetailViewDL border">'.$val->thu_dichvu.'</td>';
                $html .= '<td class="tabDetailViewDF border">'.$val->thu_soluong.'</td>';
                $html .= '<td class="tabDetailViewDF border">X</td>';
                $html .= '<td class="tabDetailViewDF border">'.$val->thu_dongia.'</td>';
                $html .= '<td class="tabDetailViewDF border">'.$val->thu_thanhtien.'</td>';
                $html .= '<td class="tabDetailViewDF border">'.$val->thu_dongiamot.'</td>';
                $html .= '<td class="tabDetailViewDF border">'.$val->thu_thanhtienmot.'</td>';
                $html .= '</tr>';
            }
        
    $html .= '</table>';
    }
    // phần chi vận chuyển
    $html .= '<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="0" cellspacing="0" class="tabDetailView">';
    $html .= '<tr>';
        $html .= '<td colspan="13" class="tr_color"><b>CHI</b></td>';
    $html .= '</tr>';
    $html .= '<tr bgcolor="#6699FF">';
        $html .= '<td class="tabDetailViewDL border" width="25%" colspan="7"><b>VẬN CHUYỂN</b></td>';
        /*$html .= '<td class="tabDetailViewDL border" width="10%"><b>&nbsp;</b></td>';
        $html .= '<td class="tabDetailViewDF border" width="10%"><b>&nbsp;</b></td>';
        $html .= '<td class="tabDetailViewDF tr_color border">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color border">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color border">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color border">&nbsp;</td>';  */
        $html .= '<td class="tabDetailViewDF tr_color tinhtoan border">'.$this->bean->tongchivanchuyen1.'</td>';
        $html .= '<td class="tabDetailViewDF tr_color border" colspan="4">&nbsp;</td>';
        /*$html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';*/
        $html .= '<td class="tabDetailViewDF tr_color tinhtoan border">'.$this->bean->tongchivanchuyen1.'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border" width="25%">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDL border" width="10%"><b>Ghi chú</b></td>';
        $html .= '<td class="tabDetailViewDF border" width="10%"><b>FOC</b></td>';
        $html .= '<td class="tabDetailViewDF tr_color border">Số lượng một</td>';
        $html .= '<td class="tabDetailViewDF tr_color border">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color border">Đơn giá một</td>';
        $html .= '<td class="tabDetailViewDF tr_color border">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color border">Thành tiền một</td>';
        $html .= '<td class="tabDetailViewDF tr_color border">Số lượng hai</td>';
        $html .= '<td class="tabDetailViewDF tr_color border">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color border">Đơn giá hai</td>';
        $html .= '<td class="tabDetailViewDF tr_color border">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color border">Thành tiền hai</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border" width="25%">VMB người lớn</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichuvmbnl.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->focvmbnguoilon.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbnguoilon1.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbnguoilon3.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbnguoilon4.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbnguoilon5.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbnguoilon7.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbnguoilon8.'</td>';

    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border" width="25%">TAX (TẠM TÍNH)</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichutaxtamtinh.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->foctaxtamtinh.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->taxtamtinh1.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->taxtamtinh3.'$</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->taxtamtinh4.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->taxtamtinh5.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->taxtamtinh7.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->taxtamtinh8.'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border" width="25%">VMB Nội Địa người lớn</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichuvmbndnl.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->focvmbndnguoilon.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbnguoilonnd1.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbnguoilonnd3.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbnguoilonnd4.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbnguoilonnd5.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbnguoilonnd7.'$</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbnguoilonnd8.'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border" width="25%">XE ĐÓN TIỄN sân bay</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichuxedontien.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->focxedontien.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->xedontien1.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->xedontien3.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->xedontien4.' $</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->xedontien5.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->xedontien7.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->xedontien8.'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border" width="25%">VMB trẻ em dưới 2 tuổi (10%)</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->chichuvmbte2tuoi.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->focvmbteduoi2tuoi.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbtreem2tuoi1.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbtreem2tuoi3.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbtreem2tuoi4.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbtreem2tuoi5.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbtreem2tuoi7.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbtreem2tuoi8.' </td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border" width="25%">VMB Nội địa trẻ em dưới 2 tuổi</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichuvmbndte2tuoi.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->focvmbndteduoi2tuoi.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbtreem2tuoind1.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbtreem2tuoind3.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbtreem2tuoind4.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbtreem2tuoind5.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbtreem2tuoind7.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbtreem2tuoind8.' </td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border" width="25%">VMB trẻ em từ 2-12 tuổi</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichuvmbte12tuoi.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->focvmbte12tuoi.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbtreem12tuoi1.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbtreem12tuoi3.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbtreem12tuoi4.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbtreem12tuoi5.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbtreem12tuoi7.'$</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbtreem12tuoi8.'</td>';
    $html .= '</tr>';
    $html .= '<tr> ';
        $html .= '<td class="tabDetailViewDL border" width="25%">VMB Nội Địa trẻ em 2 - 12 tuổi</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichuvmbndte12tuoi.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->focvmbndte12tuoi.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbtreem12tuoind1.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbtreem12tuoind3.'$</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbtreem12tuoind4.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbtreem12tuoind5.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbtreem12tuoind7.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->vmbtreem12tuoind8.'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border" width="25%">Tax trẻ em</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichutaxte.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->foctaxte.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->taxtreem1.'</td>'; 
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->taxtreem3.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->taxtreem4.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->taxtreem5.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->taxtreem7.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->taxtreem8.'</td>';
    $html .= '</tr>';
$html .= '</table>';

// phần chi landfee 

$html .= '<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="0" cellspacing="0" class="tabDetailView">';
    $html .= '<tr class="tr_color">';
        $html .= '<td class="tabDetailViewDL border" width="25%"><b>LANDFEE PACKAGE</b></td>';
        $html .= '<td class="tabDetailViewDL border" width="10%"><b>&nbsp;</b></td>';
        $html .= '<td class="tabDetailViewDL border" width="10%"><b>&nbsp;</b></td>';
        $html .= '<td class="tabDetailViewDF tr_color border">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color border">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color border">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color border">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color tinhtoan border">'.$this->bean->sumlandfeepackage1.'</td> ';
        $html .= '<td class="tabDetailViewDF tr_color tinhtoan border">&nbsp;</td> ';
        $html .= '<td class="tabDetailViewDF tr_color border">&nbsp;</td> ';
        $html .= '<td class="tabDetailViewDF tr_color border">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color border">&nbsp;</td> ';
        $html .= '<td class="tabDetailViewDF tr_color tinhtoan border">'.$this->bean->sumlandfeepackage2.'</td>';
    $html .= '</tr>';
    
    $html .= '<tr class="tr_color">';
        $html .= '<td class="tabDetailViewDL border" width="25%"></td>';
        $html .= '<td class="tabDetailViewDL border" width="10%">Ghi chú</td>';
        $html .= '<td class="tabDetailViewDF border" width="10%">FOC</td>';
        $html .= '<td class="tabDetailViewDF tr_color border">Số lượng một</td>';
        $html .= '<td class="tabDetailViewDF tr_color border">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color border">Đơn giá một</td>';
        $html .= '<td class="tabDetailViewDF tr_color border">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color border">Thành tiền một</td> '; 
        $html .= '<td class="tabDetailViewDF tr_color border">Số lượng hai</td> ';
        $html .= '<td class="tabDetailViewDF tr_color border">&nbsp;</td> ';
        $html .= '<td class="tabDetailViewDF tr_color border">Đơn giá hai</td>';
        $html .= '<td class="tabDetailViewDF tr_color border">&nbsp;</td> ';
        $html .= '<td class="tabDetailViewDF tr_color border">Thành tiền hai</td>';
    $html .= '</tr>';
    

    
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border" width="25%">LANDFEE 1: 3 sao</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichulandfee1_3sao.'</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->foclandfee1_3sao.'</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee1_3_1.'</td> ';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee1_3_3.' $</td>  ';
        $html .= '<td class="tabDetailViewDF border">=</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee1_3_4.'</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee1_3_5.'</td> ';
        $html .= '<td class="tabDetailViewDF border">X</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee1_3_7.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee1_3_8.'</td>';
    $html .= '</tr> ';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border" width="25%">LANDFEE 2: 3 sao</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichulandfee2_3sao.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->foclandfee2_3sao.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee_2_3_1.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee_2_3_3.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee_2_3_4.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee_2_3_5.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee_2_3_7.' $</td> ';
        $html .= '<td class="tabDetailViewDF border">=</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee_2_3_8.'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border">LANDFEE 1: 4 sao</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichulandfee1_4sao.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->foclandfee1_4sao.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee_1_4_1.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee_1_4_1.' $</td> ';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee_1_4_1.'</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee_1_4_1.'</td> ';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee_1_4_1.' $</td> ';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee_1_4_1.'</td>';
    $html .= '</tr>';
    $html .= '<tr> ';
        $html .= '<td class="tabDetailViewDL border" width="25%">LANDFEE 2: 4 sao</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichulandfee2_4sao.'</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->foclandfee2_4sao.'</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee_2_4_1.'</td> ';
        $html .= '<td class="tabDetailViewDF border">X</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee_2_4_3.'$</td> ';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee_2_4_4.'</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee_2_4_5.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee_2_4_7.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee_2_4_8.'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border" width="25%">Upgrade meal</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichuupgrademeal.'</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->focupgrademeal.'</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->upgrade_meal1.'</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->upgrade_meal1.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->upgrade_meal1.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->upgrade_meal1.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->upgrade_meal1.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->upgrade_meal1.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->upgrade_meal1.'</td>';
        $html .= '<td class="tabDetailViewDF border">=</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->upgrade_meal1.'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border" width="25%">Optional tour</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichuoptionaltour.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->focoptionaltour.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->optional_tour1.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->optional_tour3.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->optional_tour4.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->optional_tour5.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->optional_tour7.'</td> ';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->optional_tour8.'</td>';
    $html .= '</tr> ';
    $html .= '<tr> ';
        $html .= '<td class="tabDetailViewDL border" width="25%">Single Supp</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichusinglesupp.'</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->focsinglesupp.'</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->single_supp_1.'</td> ';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->single_supp_3.'</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->single_supp_4.'</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->single_supp_5.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->single_supp_7.'</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>  ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->single_supp_8.'</td> ';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border" width="25%">Landfee trẻ em (3 sao) - trẻ em dưới 2 tuổi</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichulandfete3sao2tuoi.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->foclandfeete3saoteduoi2tuoi.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfeetreem_2_3sao1.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfeetreem_2_3sao3.'</td> ';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfeetreem_2_3sao4.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfeetreem_2_3sao5.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfeetreem_2_3sao7.'</td>  ';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfeetreem_2_3sao8.'</td>  ';
    $html .= '</tr> ';
    $html .= '<tr>  ';
        $html .= '<td class="tabDetailViewDL border" width="25%">Landfee trẻ em (3 sao) - trẻ em từ 2-12 tuổi </td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichulandfeete3sao12tuoi.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->foclandfeete3saote12tuoi.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfeetreem12_3sao1.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfeetreem12_3sao3.'</td>';
        $html .= '<td class="tabDetailViewDF border">=</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfeetreem12_3sao4.'</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfeetreem12_3sao5.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfeetreem12_3sao7.'</td> ';
        $html .= '<td class="tabDetailViewDF border">=</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfeetreem12_3sao8.'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border" width="25%"><p>Landfee trẻ em (4 sao) - trẻ em dưới 2 tuổi</p></td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichulandfee4saote2tuoi.'</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->foclandfee4saoteduoi2tuoi.'</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee4sao_treem2tuoi1.'</td> ';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee4sao_treem2tuoi3.'</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee4sao_treem2tuoi4.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee4sao_treem2tuoi5.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee4sao_treem2tuoi7.'</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee4sao_treem2tuoi8.'</td>';
    $html .= '</tr> ';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border" width="25%">Landfee trẻ em (4 sao) - trẻ em từ 2-12 tuổi</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichulandfee4saote12tuoi.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->foclandfee4saote12tuoi.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee4sao_treem12tuoi1.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee4sao_treem12tuoi3.'</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee4sao_treem12tuoi4.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee4sao_treem12tuoi5.'</td> ';
        $html .= '<td class="tabDetailViewDF border">X</td> ';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee4sao_treem12tuoi7.'</td> ';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->landfee4sao_treem12tuoi8.'</td>';
    $html .= '</tr> ';
$html .= '</table>';
            
// phần chi visa

    $html .= '<table cellpadding="0" cellspacing="0" width="100%" border="1" style="border-collapse: collapse;" class="tabDetailView">';
        $html .= '<tr class="tr_color">';
            $html .= '<td class="tabDetailViewDL border" colspan="7"><b>VISA</b></td>';
            /*$html .= '<td class="tabDetailViewDL" width="10%">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDL" width="10%">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>'; */
            $html .= '<td class="tabDetailViewDF tr_color tinhtoan border" colspan="5">'.$this->bean->sumvisa1.'</td>';
            /*$html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';  */
            $html .= '<td class="tabDetailViewDF tr_color tinhtoan border">'.$this->bean->sumvisa2.'</td>';
        $html .= '</tr>';
        
        $html .= '<tr class="tr_color">';
            $html .= '<td class="tabDetailViewDL border">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDL border" width="10%"><b>Ghi chú</b></td>';
            $html .= '<td class="tabDetailViewDF border" width="10%"><b>FOC</b></td>';
            $html .= '<td class="tabDetailViewDF tr_color border">Số lượng một</td>';
            $html .= '<td class="tabDetailViewDF tr_color border">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color border">Đơn giá một</td>';
            $html .= '<td class="tabDetailViewDF tr_color border">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color border">Thành tiền một</td>';
            $html .= '<td class="tabDetailViewDF tr_color border">Số lượng hai</td>';
            $html .= '<td class="tabDetailViewDF tr_color border">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color border">Đơn giá hai</td>';
            $html .= '<td class="tabDetailViewDF tr_color border">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color border">Thành tiền hai</td>';
        $html .= '</tr>';
        
        $html .= '<tr>';
            $html .= '<td class="tabDetailViewDL border" width="25%"><b>Visa (Thủ tục thông hành)</b></td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichuvisa.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->focvisa.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->visathonghanh1.'</td>';
            $html .= '<td class="tabDetailViewDF border">X</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->visathonghanh3.' $</td>';
            $html .= '<td class="tabDetailViewDF border">=</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->visathonghanh4.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->visathonghanh5.'</td>';
            $html .= '<td class="tabDetailViewDF border">X</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->visathonghanh7.' $</td>';
            $html .= '<td class="tabDetailViewDF border">=</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->visathonghanh8.'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
            $html .= '<td class="tabDetailViewDL border" width="25%">Dịch thuật, công chứng hồ sơ</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichudichthuatcongchung.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->focdichthuatcongchung.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->visadichthuat1.'</td>';
            $html .= '<td class="tabDetailViewDF border">X</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->visadichthuat3.' $</td>';
            $html .= '<td class="tabDetailViewDF border">=</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->visadichthuat4.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->visadichthuat5.'</td>';
            $html .= '<td class="tabDetailViewDF border">X</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->visadichthuat7.' $</td>';
            $html .= '<td class="tabDetailViewDF border">=</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->visadichthuat8.'</td>';
        $html .= '</tr>';
        $html .= '<tr>';             
            $html .= '<td class="tabDetailViewDL border" width="25%">Phí chuyển phát hồ sơ</td>' ;
            $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichuchuyenphathoso.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->focchuyenphat.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->phichuyenphathoso1.'</td>';
            $html .= '<td class="tabDetailViewDF border">X</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->phichuyenphathoso3.' $</td> ' ;
            $html .= '<td class="tabDetailViewDF border">=</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->phichuyenphathoso4.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->phichuyenphathoso5.'</td>' ;
            $html .= '<td class="tabDetailViewDF border">X</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->phichuyenphathoso7.' $</td>';
            $html .= '<td class="tabDetailViewDF border">=</td> ';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->phichuyenphathoso8.'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
            $html .= '<td class="tabDetailViewDL border" width="25%">Phí thu mới</td> ';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichuphithumoi.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->focchiphimoi.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->phithumoi1.'</td>';
            $html .= '<td class="tabDetailViewDF border">X</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->phithumoi3.' $</td>' ;
            $html .= '<td class="tabDetailViewDF border">=</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->phithumoi4.'</td>' ;
            $html .= '<td class="tabDetailViewDF border">'.$noidung->phithumoi5.'</td>' ;
            $html .= '<td class="tabDetailViewDF border">X</td> ' ;
            $html .= '<td class="tabDetailViewDF border">'.$noidung->phithumoi7.' $</td>';
            $html .= '<td class="tabDetailViewDF border">=</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->phithumoi8.'</td> ' ;
        $html .= '</tr>';
        $html .= '<tr> ';
            $html .= '<td class="tabDetailViewDL border" width="25%">Phí Visa trẻ em dưới 2 tuổi</td>' ;
            $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichuphivisate2tuoi.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->focphivisate2tuoi.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->visatreem2tuoi1.'</td>';
            $html .= '<td class="tabDetailViewDF border">X</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->visatreem2tuoi3.' $</td>';
            $html .= '<td class="tabDetailViewDF border">=</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->visatreem2tuoi4.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->visatreem2tuoi5.'</td> ';
            $html .= '<td class="tabDetailViewDF border">X</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->visatreem2tuoi7.' $</td> ' ;
            $html .= '<td class="tabDetailViewDF border">=</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->visatreem2tuoi8.'</td>';
        $html .= '</tr>' ;
        $html .= '<tr>';
            $html .= '<td class="tabDetailViewDL border" width="25%">Phí Visa trẻ em từ 2 - 12 tuổi</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichuphivisate12tuoi.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->focchiphivisate12tuoi.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->visatreem12tuoi1.'</td>';
            $html .= '<td class="tabDetailViewDF border">X</td> ';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->visatreem12tuoi3.' $</td>';
            $html .= '<td class="tabDetailViewDF border">=</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->visatreem12tuoi4.'</td> '  ;
            $html .= '<td class="tabDetailViewDF border">'.$noidung->visatreem12tuoi5.'</td>';
            $html .= '<td class="tabDetailViewDF border">X</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->visatreem12tuoi7.' $</td>';
            $html .= '<td class="tabDetailViewDF border">=</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->visatreem12tuoi8.'</td> ' ;
        $html .= '</tr>';
    $html .= '</table>';
    
    // phần chi hướng dẫn viên
    
    $html .= '<table class="tabDetailView" border="1" style="border-collapse: collapse;" width="100%" cellpadding="0" cellspacing="0">';
      $html .= '<tr class="tr_color">';
            $html .= '<td class="tabDetailViewDL border" colspan="7" width="10%"><b>HƯỚNG DẪN VIÊN</b></td>';
            /*$html .= '<td class="tabDetailViewDL" width="10%"><b>&nbsp;</b></td>';
            $html .= '<td class="tabDetailViewDL" width="10%"><b>&nbsp;</b></td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>'; */
            $html .= '<td class="tabDetailViewDF border tr_color tinhtoan" colspan="5">'.$this->bean->sumguide1.'</td>';
            /*$html .= '<td class="tabDetailViewDF  tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';*/
            $html .= '<td class="tabDetailViewDF border tr_color tinhtoan">'.$this->bean->sumguide1.'</td>';
        $html .= '</tr>';
        

       /*$html .= '<tr class="tr_color">';
            $html .= '<td class="tabDetailViewDL" width="10%"><b>&nbsp;</b></td>';
            $html .= '<td class="tabDetailViewDL" width="10%"><b>Ghi chú</b></td>';
            $html .= '<td class="tabDetailViewDL" width="10%"><b>FOC</b></td>';
            $html .= '<td class="tabDetailViewDF tr_color">Số lượng một</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">Đơn giá một</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">Thành tiền một</td>';
            $html .= '<td class="tabDetailViewDF tr_color">Số lượng hai</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">Đơn giá hai</td>';
            $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF tr_color">Thành tiền hai</td>';
        $html .= '</tr>'; */
       $html .= '<tr class="tr_color">';
            $html .= '<td class="tabDetailViewDL border" width="10%">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDL border" width="10%"><b>Ghi chú</b></td>';
            $html .= '<td class="tabDetailViewDF border" width="10%"><b>FOC</b></td>';
            $html .= '<td class="tabDetailViewDF border tr_color">Số lượng một</td>';
            $html .= '<td class="tabDetailViewDF border tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF border tr_color">Đơn giá một</td>';
            $html .= '<td class="tabDetailViewDF border tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF border tr_color">Thành tiền một</td>';
            $html .= '<td class="tabDetailViewDF border tr_color">Số lượng hai</td>';
            $html .= '<td class="tabDetailViewDF border tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF border tr_color">Đơn giá hai</td>';
            $html .= '<td class="tabDetailViewDF border tr_color">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF border tr_color">Thành tiền hai</td>';
        $html .= '</tr>'; 
        
        $html .= '<tr>';
            $html .= '<td class="tabDetailViewDL border" width="25%">Tour leader</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichutourleader.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->foctourleader.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->tour_leader1.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->tour_leader2.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->tour_leader3.'</td>';
            $html .= '<td class="tabDetailViewDF border">=</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->tour_leader4.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->tour_leader5.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->tour_leader6.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->tour_leader7.'</td>';
            $html .= '<td class="tabDetailViewDF border">=</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->tour_leader8.'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
            $html .= '<td class="tabDetailViewDL border" width="25%">Chi phí khác</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichuchiphikhac.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->focchiphikhac.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->chiphikhac1.'</td>';
            $html .= '<td class="tabDetailViewDF border">X</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->chiphikhac3.'</td>';
            $html .= '<td class="tabDetailViewDF border">=</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->chiphikhac4.'</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->chiphikhac5.'</td>';
            $html .= '<td class="tabDetailViewDF border">X</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->chiphikhac7.'</td>';
            $html .= '<td class="tabDetailViewDF border">=</td>';
            $html .= '<td class="tabDetailViewDF border">'.$noidung->chiphikhac8.'</td>';
        $html .= '</tr>';
    $html .= '</table>';
    
    // phần chi dịch vụ khác
    
    $html .= '<table width="100%" cellpadding="0" cellspacing="0" class="tabDetailView" border="1" style="border-collapse: collapse;">';
    $html .= '<tr class="tr_color">';
        $html .= '<td class="tabDetailViewDL border" colspan="7" width="25%"><b>DỊCH VỤ KHÁC</b></td>';
        /*$html .= '<td class="tabDetailViewDL border" width="10%"><b>&nbsp;</b></td>';
        $html .= '<td class="tabDetailViewDL border" width="10%"><b>&nbsp;</b></td>';
        $html .= '<td class="tabDetailViewDF  tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>'; */
        $html .= '<td class="tabDetailViewDF border tr_color tinhtoan" colspan="5">'.$this->bean->sumotherservice1.'</td>';
        /*$html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF tr_color">&nbsp;</td>';*/
        $html .= '<td class="tabDetailViewDF border tr_color tinhtoan">'.$this->bean->sumotherservice1.'</td>';
    $html .= '</tr>';
    
    $html .= '<tr class="tr_color">';
        $html .= '<td class="tabDetailViewDL border" width="25%"><b>&nbsp;</b></td>';
        $html .= '<td class="tabDetailViewDL border" width="10%"><b>Ghi chú</b></td>';
        $html .= '<td class="tabDetailViewDL border" width="10%"><b>FOC</b></td>';
        $html .= '<td class="tabDetailViewDF border tr_color">Số lượng một</td>';
        $html .= '<td class="tabDetailViewDF border tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF border tr_color">Đơn giá một</td>';
        $html .= '<td class="tabDetailViewDF border tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF border tr_color">Thành tiền một</td>';
        $html .= '<td class="tabDetailViewDF border tr_color">Số lượng hai</td>';
        $html .= '<td class="tabDetailViewDF border tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF border tr_color">Đơn giá hai</td>';
        $html .= '<td class="tabDetailViewDF border tr_color">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF border tr_color">Thành tiền hai</td>';
    $html .= '</tr>';
    
    
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border" width="25%">Bảo hiểm</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichubaohiem.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->focbaohiem.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->baohiem1.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->baohiem3.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->baohiem4.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->baohiem5.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->baohiem7.'</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->baohiem8.'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border" width="25%">Bảo hiểm trẻ em dưới 2 tuổi</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichubaohiemte2tuoi.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->focbaohiemteduoi2tuoi.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->baohiemtreem2tuoi1.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->baohiemtreem2tuoi3.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->baohiemtreem2tuoi4.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->baohiemtreem2tuoi5.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->baohiemtreem2tuoi7.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->baohiemtreem2tuoi8.'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border" width="25%">Bảo hiểm trẻ em từ 2 - 12 tuổi</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichubaohiemte12tuoi.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->focbaohiemte12tuoi.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->baohiemtreem12tuoi1.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->baohiemtreem12tuoi3.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->baohiemtreem12tuoi4.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->baohiemtreem12tuoi5.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->baohiemtreem12tuoi7.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->baohiemtreem12tuoi8.'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border" width="25%">Tip</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichutip.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->foctip.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->visatip1.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->visatip2.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->visatip3.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->visatip4.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->visatip5.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->visatip6.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->visatip7.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->visatip8.'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border" width="25%"><b> QUÀ TẶNG</b></td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichuquatang.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->focquatang.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->quatang1.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->quatang3.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->quatang4.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->quatang5.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->quatang7.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->quatang8.'</td>';
    $html .= '</tr> ';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border" width="25%">Land 2</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichuland2.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->focland2.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->land2_1.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->land2_3.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->land2_4.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->land2_5.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->land2_7.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->land2_8.'</td>';
    $html .= '</tr>';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border" width="25%">CPK</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichucpk.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->foccpk.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->cpk1.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->cpk3.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->cpk4.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->cpk5.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->cpk7.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->cpk8.'</td>';
    $html .= '</tr> ';
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border" width="25%">Chênh lệch tỷ giá</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->ghichuchenhlachtygia.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->focchenhlechtygia.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->chenhlechtygia1.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->chenhlechtygia3.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->chenhlechtygia4.'</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->chenhlechtygia5.'</td>';
        $html .= '<td class="tabDetailViewDF border">X</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->chenhlechtygia7.' $</td>';
        $html .= '<td class="tabDetailViewDF border">=</td>';
        $html .= '<td class="tabDetailViewDF border">'.$noidung->chenhlechtygia8.'</td>';
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
        $html .= '<td class="tabDetailViewDL border"><strong>TỔNG CHI OPTIONS</strong></td>';
        $html .= '<td class="tabDetailViewDF border">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF border">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF border">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF border tinhtoan">'.$this->bean->tongtien_chi.'</td>';
    $html .= '</tr>';
    
    $html .= '<tr>';
        $html .= '<td class="tabDetailViewDL border"><strong>&nbsp;</strong></td>';
        $html .= '<td class="tabDetailViewDF border">Số lượng</td>';
        $html .= '<td class="tabDetailViewDF border">&nbsp;</td>';
        $html .= '<td class="tabDetailViewDF border">Đơn giá</td>';
        $html .= '<td class="tabDetailViewDF border">Thành tiền</td>';
    $html .= '</tr>';
    
             foreach($CHIOPTION as $chioption){
                $html .= '<tr>';
                $html .= '<td class="tabDetailViewDL border" >'.$chioption->chi_dichvu.'</td>';
                $html .= '<td class="tabDetailViewDF border">'.$chioption->chi_soluong.'</td>';
                $html .= '<td class="tabDetailViewDF border">X</td>';
                $html .= '<td class="tabDetailViewDF border">'.$chioption->chi_dongia.'</td>';
                $html .= '<td class="tabDetailViewDF border">'.$chioption->chi_thanhtien.'</td>';
                $html .= '</tr>';
            }   
       
$html .= '</table>';
 }


// phần report

$htmlReport .= '<table cellpadding="0" cellspacing="0" border="1" style="border-collapse: collapse;" width="100%" class="tabDetailView">';
    $htmlReport .= '<tr>';
        $htmlReport .= '<td class="border">&nbsp;</td>';
        $htmlReport .= '<td colspan="2" align="tabDetailViewDF" class="ct_sl1 tabDetailViewDF border">DƯỚI 2 TUỔI</td>';
        $htmlReport .= '<td colspan="2" align="tabDetailViewDF" class="ct_sl1 tabDetailViewDF border">TỪ 2-12 TUỔI</td>';
        $htmlReport .= '<td colspan="2" align="tabDetailViewDF" class="ct_sl1 tabDetailViewDF border">NGƯỜI LỚN</td>';
        $htmlReport .= '<td colspan="2" align="tabDetailViewDF" class="ct_sl2 tabDetailViewDF border">DƯỚI 2 TUỔI</td>';
        $htmlReport .= '<td colspan="2" align="tabDetailViewDF" class="ct_sl2 tabDetailViewDF border">TỪ 2-12 TUỔI</td>';
        $htmlReport .= '<td colspan="2" align="tabDetailViewDF" class="ct_sl2 tabDetailViewDF border">NGƯỜI LỚN</td>';
    $htmlReport .= '</tr>';
    $htmlReport .= '<tr>';
        $htmlReport .= '<td>&nbsp;</td>';
        $htmlReport .= '<td align="tabDetailViewDF" class="ct_sl1 tabDetailViewDF border">Ks 3*</td>';
        $htmlReport .= '<td align="tabDetailViewDF" class="ct_sl1 tabDetailViewDF border">Ks 4*</td>';
        $htmlReport .= '<td align="tabDetailViewDF" class="ct_sl1 tabDetailViewDF border">Ks 3*</td>';
        $htmlReport .= '<td align="tabDetailViewDF" class="ct_sl1 tabDetailViewDF border">Ks 4*</td>';
        $htmlReport .= '<td align="tabDetailViewDF" class="ct_sl1 tabDetailViewDF border">Ks 3*</td>';
        $htmlReport .= '<td align="tabDetailViewDF" class="ct_sl1 tabDetailViewDF border">Ks 4*</td>';
        $htmlReport .= '<td align="tabDetailViewDF" class="ct_sl2 tabDetailViewDF border">Ks 3*</td>';
        $htmlReport .= '<td align="tabDetailViewDF" class="ct_sl2 tabDetailViewDF border">Ks 4*</td>';
        $htmlReport .= '<td align="tabDetailViewDF" class="ct_sl2 tabDetailViewDF border">Ks 3*</td>';
        $htmlReport .= '<td align="tabDetailViewDF" class="ct_sl2 tabDetailViewDF border">Ks 4*</td>';
        $htmlReport .= '<td align="tabDetailViewDF" class="ct_sl2 tabDetailViewDF border">Ks 3*</td>';
        $htmlReport .= '<td align="tabDetailViewDF" class="ct_sl2 tabDetailViewDF border">Ks 4*</td>';
    $htmlReport .= '</tr>';
    $htmlReport .= '<tr>';
        $htmlReport .= '<td width="25%" class="ct_sl3 tabDetailViewDL">TỔNG CHI</td>';
        $htmlReport .= '<td  class="ct_sl2 tabDetailViewDF border">'.$this->bean->tongchi1.'</td>';
        $htmlReport .= '<td  class="ct_sl2 tabDetailViewDF border">'.$this->bean->tongchi2.'</td>';
        $htmlReport .= '<td  class="ct_sl3 tabDetailViewDF border">'.$this->bean->tongchi3.'</td>';
        $htmlReport .= '<td  class="ct_sl3 tabDetailViewDF border">'.$this->bean->tongchi4.'</td>';
        $htmlReport .= '<td  class="ct_sl3 tabDetailViewDF border">'.$this->bean->tongchi5.'</td>';
        $htmlReport .= '<td  class="ct_sl3 tabDetailViewDF border">'.$this->bean->tongchi6.'</td>';
        $htmlReport .= '<td  class="ct_sl2 tabDetailViewDF border">'.$this->bean->tongchi7.'</td>';
        $htmlReport .= '<td  class="ct_sl2 tabDetailViewDF border">'.$this->bean->tongchi8.'</td>';
        $htmlReport .= '<td  class="ct_sl3 tabDetailViewDF border">'.$this->bean->tongchi9.'</td>';
        $htmlReport .= '<td  class="ct_sl3 tabDetailViewDF border">'.$this->bean->tongchi10.'</td>';
        $htmlReport .= '<td  class="ct_sl3 tabDetailViewDF border">'.$this->bean->tongchi11.'</td>';
        $htmlReport .= '<td  class="ct_sl3 tabDetailViewDF border">'.$this->bean->tongchi12.'</td>';
    $htmlReport .= '</tr>';
    $htmlReport .= '<tr>';
        $htmlReport .= '<td width="25%" class="ct_sl3 tabDetailViewDL border">GIÁ NET</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF border">'.$this->bean->gianet1.'</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF border">'.$this->bean->gianet2.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->gianet3.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->gianet4.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->gianet5.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->gianet6.'</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF border">'.$this->bean->gianet7.'</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF border">'.$this->bean->gianet8.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->gianet9.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->gianet10.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->gianet11.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->gianet12.'</td>';
    $htmlReport .= '</tr>';
    $htmlReport .= '<tr>';
        $htmlReport .= '<td width="25%" class="ct_sl3 tinhtoan tabDetailViewDL border">GIÁ BÁN</td>';
        $htmlReport .= '<td class="ct_sl2 tinhtoan tabDetailViewDF border">'.$this->bean->giaban1.'</td>';
        $htmlReport .= '<td class="ct_sl2 tinhtoan tabDetailViewDF border">'.$this->bean->giaban2.'</td>';
        $htmlReport .= '<td class="ct_sl3 tinhtoan tabDetailViewDF border">'.$this->bean->giaban3.'</td>';
        $htmlReport .= '<td class="ct_sl3 tinhtoan tabDetailViewDF border">'.$this->bean->giaban4.'</td>';
        $htmlReport .= '<td class="ct_sl3 tinhtoan tabDetailViewDF border">'.$this->bean->giaban5.'</td>';
        $htmlReport .= '<td class="ct_sl3 tinhtoan tabDetailViewDF border">'.$this->bean->giaban6.'</td>';
        $htmlReport .= '<td class="ct_sl2 tinhtoan tabDetailViewDF border">'.$this->bean->giaban7.'</td>';
        $htmlReport .= '<td class="ct_sl2 tinhtoan tabDetailViewDF border">'.$this->bean->giaban8.'</td>';
        $htmlReport .= '<td class="ct_sl3 tinhtoan tabDetailViewDF border">'.$this->bean->giaban9.'</td>';
        $htmlReport .= '<td class="ct_sl3 tinhtoan tabDetailViewDF border">'.$this->bean->giaban10.'</td>';
        $htmlReport .= '<td class="ct_sl3 tinhtoan tabDetailViewDF border">'.$this->bean->giaban11.'</td>';
        $htmlReport .= '<td class="ct_sl3 tinhtoan tabDetailViewDF border">'.$this->bean->giaban12.'</td>';
    $htmlReport .= '</tr>';
    $htmlReport .= '<tr>';
        $htmlReport .= '<td width="25%" class="ct_sl3 tabDetailViewDL border">LÃI/KHÁCH</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF border">'.$this->bean->laikhach1.'</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF border">'.$this->bean->laikhach2.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->laikhach3.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->laikhach4.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->laikhach5.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->laikhach6.'</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF border">'.$this->bean->laikhach7.'</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF border">'.$this->bean->laikhach8.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->laikhach9.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->laikhach10.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->laikhach11.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->laikhach12.'</td>';
    $htmlReport .= '</tr>';
    $htmlReport .= '<tr>';
        $htmlReport .= '<td width="25%" class="ct_sl3 tabDetailViewDL border">TỔNG LÃI</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF border">'.$this->bean->tonglai1.'</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF border">'.$this->bean->tonglai2.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->tonglai3.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->tonglai4.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->tonglai5.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->tonglai6.'</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF border">'.$this->bean->tonglai7.'</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF border">'.$this->bean->tonglai8.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->tonglai9.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->tonglai10.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->tonglai11.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->tonglai12.'</td>';
    $htmlReport .= '</tr>';
    $htmlReport .= '<tr>';
        $htmlReport .= '<td width="25%" class="ct_sl3 tabDetailViewDL border">TỶ LỆ</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF border">'.$this->bean->tyle1.'</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF border">'.$this->bean->tyle2.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->tyle3.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->tyle4.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->tyle5.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->tyle6.'</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF border">'.$this->bean->tyle7.'</td>';
        $htmlReport .= '<td class="ct_sl2 tabDetailViewDF border">'.$this->bean->tyle8.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->tyle9.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->tyle10.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->tyle11.'</td>';
        $htmlReport .= '<td class="ct_sl3 tabDetailViewDF border">'.$this->bean->tyle12.'</td>';
    $htmlReport .= '</tr>';
$htmlReport .= '</table>';
  }
            if($this->bean->type == 'DOS'){
            $html .= '<fieldset>';
                $html .= '<legend><h3>THÔNG TIN CHUNG</h3></legend>';
                $html .= '<table width="100%" class="tabDetailView" border="1" style="border-collapse:collapse;" cellspacing="0" cellpadding="0">';
                    $html .= '<tr>';
                        $html .= '<td class="tabDetailViewDL border">Tour name:</td>';
                        $html .= '<td class="tabDetailViewDF border">';
                                $html .= '<a href="index.php?module=Tours&action=DetailView&record='.$this->bean->worksheet_tour_id.'">'.$this->bean->worksheet_tour_name.' </a>';
                            $html .= '</td>';
                        $html .= '<td class="tabDetailViewDL border">Tour Code:</td>';
                        $html .= '<td class="tabDetailViewDF border">';
                                $html .= $this->bean->tourcode;
                            $html .='</td>';
                        $html .= '<td class="tabDetailViewDL border">Thời gian:</td>';
                        $html .= '<td class="tabDetailViewDF border">';
                                $html .= $this->bean->duration;
                            $html .= '</td>';
                        $html .= '<td class="tabDetailViewDL border">Phương tiện:</td>';

                        $html .= '<td class="tabDetailViewDF border">';
                            $html .= $this->bean->transport;
                        $html .= '</td>';
                    $html .= '</tr>';
                    $html .= '<tr>';
                        $html .= '<td class="tabDetailViewDL border">Lộ trình:</td>';
                        $html .= '<td class="tabDetailViewDF border">';
                                $html .= $this->bean->lotrinh;
                            $html .= '</td>';
                       $html .= '<td class="tabDetailViewDL border">Thuế Suất hóa:</td>';
                        $html .= '<td class="tabDetailViewDF border">';
                            $html .= $this->bean->thuesuathoa;
                        $html .= '</td>';
                        $html .= '<td class="tabDetailViewDL border">Số khách: </td>';
                        $html .= '<td class="tabDetailViewDF border">';
                                $html .= $this->bean->sokhach;
                            $html .= '</td>';
                        $html .= '<td class="tabDetailViewDL border">Tỷ lệ :</td>';
                        $html .= '<td class="tabDetailViewDF border">';
                                $html .= $this->bean->tyle;
                            $html .= '</td>';
                    $html .= '</tr>'; 
                $html .= '</table>';
                $html .= '</fieldset>';
                
                // THONG TIN CHI PHI VE MAY BAY
                $vemaybay = $noidung->vemaybay; 
                if(count($vemaybay)>0){
                    $html .= '<fieldset>';
                    $html .= '<legend><h3>VÉ MÁY BAY</h3></legend>';
                    $html .= '<table width="100%" class="tabDetailView" id="vemaybay" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                    $html .= '<thead>'; 
                    $html .= '<tr>';
                    $html .= '<td class="border"><b>Vé chuyến bay<b></td>';
                    $html .= '<th class="border">Giá tham khảo</th>';
                    $html .= '<th class="border">Đơn giá</th>';
                    $html .= '<th class="border">Số lượng</th>';
                    $html .= '<th class="border">Thành tiền</th>';
//                    $html .= '<th class="border">Thuế suất</th>';
//                    $html .= '<th class="border">Giá chưa thuế</th>';
                    $html .= '<th class="border">VAT</th>';
                    $html .= '<th class="border">Hình thức thanh toán</th>';
                    $html .= '</tr>';
                    $html .= '</thead>';
                    $html .= '<tbody>';
                    $vmb_mb = 1;
                        foreach($vemaybay as $airtk){
                            $html .= '<tr>';
                                $html .= '<td class="border"><a href="index.php?module=AirlinesTickets&action=DetailView&record='.$airtk->vemaybay.'">'.translate('list_airlinetiket_dom','',$airtk->vemaybay).'</a></td>';
                                $html .= '<td align="center" class="tabDetailViewDF border">'.$airtk->vemaybay_giathamkhao.'</td>';
                                $html .= '<td align="center" class="tabDetailViewDF border">'.$airtk->vemaybay_dongia.'</td>';
                                $html .= '<td align="center" class="tabDetailViewDF border">'.$airtk->vemaybay_soluong.'</td>';
                                $html .= '<td align="center" class="tabDetailViewDF border">'.$airtk->vemaybay_thanhtien.'</td>';
//                                $html .= '<td align="center" class="tabDetailViewDF border">'.$airtk->vemaybay_thuesuat.'</td>';
//                                $html .= '<td align="center" class="tabDetailViewDF border">'.$airtk->vemaybay_giachuathue.'</td>';
                                $html .= '<td align="center" class="tabDetailViewDF border">'.$airtk->vemaybay_vat.'</td>';
                                $html .= '<td align="center" class="tabDetailViewDF border">'.translate('hinh_thuc_thanh_toan_dom','',$airtk->vemaybay_hinhthucthanhtoan).'</td>';
                              $html .= '</tr>';
                              $vmb_mb ++;
                        }
                    $html .= '</tbody>';
                    $html .= '<tfoot>';
                        $html .= '<tr>';
                        $html .= '<th class="border" colspan="4">TỔNG CỘNG</th>';
//                        $html .= '<th class="border">&nbsp;</th>';
//                        $html .= '<th class="border">&nbsp;</th>';
//                        $html .= '<th class="border">&nbsp;</th>';
                        $html .= '<th class="border">'.$noidung->vemaybay_tongthanhtien.'</th>';
//                        $html .= '<th class="border">&nbsp;</th>';
//                        $html .= '<th class="border">&nbsp;</th>';
                        $html .= '<th class="border">'.$noidung->vemaybay_tongthue.'</th>';
                        $html .= '<th class="border">&nbsp;</th>';
                        $html .= '</tr>';
                        $html .= '</tfoot>';
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
                        $html .= '<td class="border"><b>Tên nhà hàng</b></td>';
                        $html .= '<th class="border">Giá tham khảo</th>';
                        $html .= '<th class="border">Đơn giá</th>';
                        $html .= '<th class="border">Số lượng</th>';
                        $html .= '<th class="border">Số bữa ăn</th>';
                        $html .= '<th class="border">Thành tiền</th>';
                       // $html .= '<th>Thuế suất</th>';
                        //$html .= '<th>giá chưa thuế</th>';
                        $html .= '<th class="border">VAT</th>';
                        $html .= '<th class="border">Hình thức thanh toán</th>';
                        //$html .= '<th>tạm ứng</th>';
                        $html .= '</tr>';
                        $html .= '</thead>';
                        $html .= '<tbody>';
                        $i = 1;
                    foreach($NHAHANG as $val){
                            $html .= '<tr>';
                                $html .= '<td class="border"><a href="index.php?module=Restaurants&action=DetailView&record='.$val->nh_id.'">'.translate('list_restaurant_dom','',$val->nh_id).'</a></td>';
                                $html .= '<td align="center" class="tabDetailViewDF border">'.$val->nh_giathamkhao.'</td>';
                                $html .= '<td align="center" class="tabDetailViewDF border">'.$val->nh_dongia.'</td>';
                                $html .= '<td align="center" class="tabDetailViewDF border">'.$val->nh_soluong.'</td>';
                                $html .= '<td align="center" class="tabDetailViewDF border">'.$val->nh_songay.'</td>';
                                $html .= '<td align="center" class="tabDetailViewDF border">'.$val->nh_thanhtien.'</td>';
                                $html .= '<td align="center" class="tabDetailViewDF border">'.$val->nh_vat.'</td>';
                                $html .= '<td align="center" class="center border"> '.translate('hinh_thuc_thanh_toan_dom','',$val->nh_hinhthucthanhtoan).'</td>';
                            $html .= '</tr> ';
                    }
                    $html .= '</tbody>';
                    $html .= '</tfoot>';
                        $html .= '<tr>';
                        $html .= '<th class="border" colspan="5">TỔNG CỘNG</th>';
//                        $html .= '<th>&nbsp;</th>';
//                        $html .= '<th>&nbsp;</th>';
//                        $html .= '<th>&nbsp;</th>';
//                        $html .= '<th>&nbsp;</th>';
                        $html .= '<th class="border">'.$noidung->nhahang_tongthanhtien.'</th>';
                        //$html .= '<th>&nbsp;</th>';
                        $html .= '<th class="border">'.$noidung->nhahang_tongthue.'</th>';
                        $html .= '<th class="border">&nbsp;</th>';
                        //$html .= '<th>&nbsp;</th>';
                        $html .= '</tr>';
                    $html .= '<tfoot>';
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
                $html .= '<td class="border"><b>Tên khách sạn</b></td>';
                $html .= '<th class="border">Ghi chú</th>';
                $html .= '<th class="border">Giá tham khảo</th>';
                $html .= '<th class="border">Đơn giá</th>';
                $html .= '<th class="border">Số lượng</th>';
                $html .= '<th class="border">Số đêm</th>';
                $html .= '<th class="border">Thành tiền</th>';
                $html .= '<th class="border">VAT</th>';
                $html .= '<th class="border">Hình thức thanh toán</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                $j = 1;
                foreach ($KHACHSAN as $ksval){
                    if($ksval->ks_deleted == 0){
                        $html .= '<tr>';
                            $html .= '<td  class="nottabDetailViewDF border"><a href="index.php?module=Restaurants&action=DetailView&record='.$ksval->ks_id.'">'.translate('list_khach_san_dom','', $ksval->ks_id).'</a></td>';
                            $html .= '<td align="center" class="tabDetailViewDF border">'.$ksval->ks_ghichu.'</td>';
                            $html .= '<td align="center" class="tabDetailViewDF border">'.$ksval->ks_giathamkhao.'</td>';
                            $html .= '<td align="center" class="tabDetailViewDF border">'.$ksval->ks_dongia.'</td>';
                            $html .= '<td align="center" class="tabDetailViewDF border">'.$ksval->ks_soluong.'</td>';
                            $html .= '<td align="center" class="tabDetailViewDF border">'.$ksval->ks_songay.'</td>';
                            $html .= '<td align="center" class="tabDetailViewDF border">'.$ksval->ks_thanhtien.'</td>';
                           // $html .= '<td align="center" class="center">'.$ksval->ks_thuexuat.'</td>';
                           // $html .= '<td align="center" class="center">'.$ksval->ks_giachuathue.'</td>';
                            $html .= '<td align="center" class="tabDetailViewDF border">'.$ksval->ks_vat.'</td>';
                            $html .= '<td align="center" class="center border">'.translate('hinh_thuc_thanh_toan_dom','',$ksval->ks_hinhthucthanhtoan).'</td>';
                            //$html .= '<td align="center" class="center">'.$ksval->ks_tamung.'</td>';
                        $html .= '</tr> ';
                        $j++; 
                    }
                         
                }
                $html .= '</tbody>';
                $html .= '<tfoot>';
                    $html .= '<tr>';
                    $html .= '<th class="border" colspan="6">TỔNG CỘNG</th>';
    //                $html .= '<th>&nbsp;</th>';
    //                $html .= '<th>&nbsp;</th>';
    //                $html .= '<th>&nbsp;</th>';
    //                $html .= '<th>&nbsp;</th>';
    //                $html .= '<th>&nbsp;</th>';
                    $html .= '<th class="border">'.$noidung-> khachsan_tongthanhtien.'</th>';
                    $html .= '<th class="border">'.$noidung-> khachsan_tongthue.'</th>';
                    $html .= '<th class="border">&nbsp;</th>';
                 $html .= '</tr>';
                $html .= '</tfoot>';
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
                    $html .= '<td class="border"><b>Loại xe</b></td>';
                    $html .= '<th class="border">Giá tham khảo</th>';
                    $html .= '<th class="border">Đơn giá</th>';
                    $html .= '<th class="border">Số lượng</th>';
                    $html .= '<th class="border">Ngày/Km/Giờ</th>';
                    $html .= '<th class="border">Thành tiền</th>';
                   // $html .= '<th>Thuế suất</th>';
                    //$html .= '<th>giá chưa thuế</th>';
                    $html .= '<th class="border">VAT</th>';
                    $html .= '<th class="border">Hình thức thanh toán</th>';
                   // $html .= '<th>tạm ứng</th>';
                    $html .= '</tr>';
                    $html .= '</thead>';
                    $html .= '<tbody>';
                    $k = 1;  
                    foreach ($VANCHUYEN as $vcval){
                              $html .= '<tr>';
                                $html .= '<td class="nottabDetailViewDF border"><a href="index.php?module=Cars&action=DetailView&record='.$vcval->vanchuyen_name.'">'.translate('list_vanchuyen_dom','',$vcval->vanchuyen_name).'</a> </td>';
                                $html .= '<td class="tabDetailViewDF border">'.$vcval->vanchuyen_giathamkhao.'</td>';
                                $html .= '<td class="tabDetailViewDF border">'.$vcval->vanchuyen_dongia.' '.translate('vanchuyen_dongia_option','',$vcval->dongia_option) .' </td>';
                                $html .= '<td class="tabDetailViewDF border">'.$vcval->vanchuyen_soluong.'</td>';
                                $html .= '<td class="tabDetailViewDF border">'.$vcval->vanchuyen_songay.'</td>';
                                $html .= '<td class="tabDetailViewDF border">'.$vcval->vanchuyen_thanhtien.'</td>';
                                //$html .= '<td align="tabDetailViewDF" align="tabDetailViewDF" class="tabDetailViewDF">'.$vcval->vanchuyen_thuexuat.'</td>';
                               // $html .= '<td align="tabDetailViewDF" class="tabDetailViewDF">'.$vcval->vanchuyen_giachuathue.'</td>';
                                $html .= '<td class="tabDetailViewDF border">'.$vcval->vanchuyen_vat.'</td>';
                                $html .= '<td class="tabDetailViewDF border">'.translate('hinh_thuc_thanh_toan_dom','',$vcval->vanchuyen_hinhthucthanhtoan).'</td>';
                                //$html .= '<td align="tabDetailViewDF" class="tabDetailViewDF">'.$vcval->vanchuyen_tamung.'</td>';
                            $html .= '</tr> ';  
                            $k++;      
                }
                    $html .= '</tbody>';
                    $html .='<tfoot>';
                        $html .= '<tr>';
                        $html .= '<th class="border" colspan="5">TỔNG CỘNG</th>';
    //                    $html .= '<th class="border">&nbsp;</th>';
    //                    $html .= '<th class="border">&nbsp;</th>';
    //                    $html .= '<th class="border">&nbsp;</th>';
    //                    $html .= '<th class="border">&nbsp;</th>';
                        $html .= '<th class="border">'.$noidung-> vanchuyen_tongthanhtien.'</th>';
                        //$html .= '<th>&nbsp;</th>';
                        $html .= '<th class="border">'.$noidung-> vanchuyen_tongthue.'</th>';
                        $html .= '<th class="border">&nbsp;</th>';
                        //$html .= '<th>&nbsp;</th>';
                        $html .= '</tr>';
                    $html .='</tfoot>';
                    
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
                    $html .= '<td class="border"><b>Loại dịch vụ</b></td>';
                    $html .= '<th class="border">Giá tham khảo</th>';
                    $html .= '<th class="border">Đơn giá</th>';
                    $html .= '<th class="border">Số lượng</th>';
                    $html .= '<th class="border">Số đêm</th>';
                    $html .= '<th class="border">Thành tiền</th>';
                   // $html .= '<th>Thuế suất</th>';
                    //$html .= '<th>giá chưa thuế</th>';
                    $html .= '<th class="border">VAT</th>';
                    $html .= '<th class="border">Hình thức thanh toán</th>';
                    //$html .= '<th>tạm ứng</th>';
                    $html .= '</tr>';
                    $html .= '</thead>';
                    $html .= '<tbody>'; 
                    $l = 1;
                    foreach ($DICHVU as $dvval){
                        if($dvval->services_deleted == 0){
                            $html .= '<tr>';
                                $html .= '<td class="nottabDetailViewDF border">  <a href="index.php?module=Services&action=DetailView&record='.$dvval->services_name.'">'.translate('list_dichvu_dom','',$dvval->services_name).'</a> </td>';
                                $html .= '<td class="tabDetailViewDF border">'.$dvval->services_giathamkhao.'</td>';
                                $html .= '<td class="tabDetailViewDF border">'.$dvval->services_dongia.'</td>';
                                $html .= '<td class="tabDetailViewDF border">'.$dvval->services_soluong.'</td>';
                                $html .= '<td class="tabDetailViewDF border">'.$dvval->services_songay.'</td>';
                                $html .= '<td class="tabDetailViewDF border">'.$dvval->services_thanhtien.'</td>';
                                //$html .= '<td align="tabDetailViewDF" class="tabDetailViewDF">'.$dvval->services_thuexuat.'</td>';
                                //$html .= '<td align="tabDetailViewDF" class="tabDetailViewDF">'.$dvval->services_giachuathue.'</td>';
                                $html .= '<td class="tabDetailViewDF border">'.$dvval->services_vat.'</td>';
                                $html .= '<td class="tabDetailViewDF border">'.translate('hinh_thuc_thanh_toan_dom','',$dvval->services_hinhthucthanhtoan).'</td>';
                                //$html .= '<td align="tabDetailViewDF" class="tabDetailViewDF">'.$dvval->services_tamung.'</td>';
                            $html .= '</tr> ';
                            $l++;
                        }
                                       
                    }
                    $html .= '</tbody>';
                    $html .= '<tfoot>';
                    $html .= '<tr>';
                        $html .= '<th class="border" colspan="5">TỔNG CỘNG</th>';
    //                    $html .= '<th>&nbsp;</th>';
    //                    $html .= '<th>&nbsp;</th>';
    //                    $html .= '<th>&nbsp;</th>';
    //                    $html .= '<th>&nbsp;</th>';
                        $html .= '<th class="border">'.$noidung-> service_tongthanhtien.'</th>';
                        //$html .= '<th>&nbsp;</th>';
                        $html .= '<th class="border">'.$noidung-> service_tongthue.'</th>';
                        $html .= '<th class="border">&nbsp;</th>';
                       // $html .= '<th>&nbsp;</th>';
                    $html .= '</tr>';
                    $html .= '</tfoot>';
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
                $html .= '<td class="border"><b>Địa điểm tham quan</b></td>';
                $html .= '<th class="border">Giá tham khảo</th>';
                $html .= '<th class="border">Đơn giá</th>';
                $html .= '<th class="border">Số lượng</th>';
                $html .= '<th class="border">Số lần/ngày</th>';
                $html .= '<th class="border">Thành tiền</th>';
                $html .= '<th class="border">VAT</th>';
                $html .= '<th class="border">Hình thức thanh toán</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                
                $m = 1;  
                foreach($THAMQUAN as $tqval){
                       $html .= '<tr>';
                            $html .= '<td class="nottabDetailViewDF border"> <a href="index.php?module=Services&action=DetailView&record='.$tqval->thamquan_name.'">'.translate('list_thamquan_dom','',$tqval->thamquan_name).'</a></td>';
                            $html .= '<td align="center" class="center border">'.$tqval->thamquan_giathamkhao.'</td>';
                            $html .= '<td align="center" class="center border">'.$tqval->thamquan_dongia.'</td>';
                            $html .= '<td align="center" class="center border">'.$tqval->thamquan_soluong.'</td>';
                            $html .= '<td align="center" class="center border">'.$tqval->thamquan_songay.'</td>';
                            $html .= '<td align="center" class="center border">'.$tqval->thamquan_thanhtien.'</td>';
                            //$html .= '<td align="center" class="center">'.$tqval->thamquan_thuexuat.'</td>';
                            //$html .= '<td align="center" class="center">'.$tqval->thamquan_giachuathue.'</td>';
                            $html .= '<td align="center" class="center border">'.$tqval->thamquan_vat.'</td>';
                            $html .= '<td align="center" class="center border">'.translate('hinh_thuc_thanh_toan_dom','',$tqval->thamquan_hinhthucthanhtoan).'</td>';
                            //$html .= '<td align="center" class="center">'.$tqval->thamquan_tamung.'</td>';
                        $html .= '</tr> '; 
                        $m++;   
                                
                }
                 $html .= '</body>';
                 $html .= '<tfoot>';
                    $html .= '<tr>';
                    $html .= '<th class="border" colspan="5">TỔNG CỘNG</th>';
                    //                $html .= '<th>&nbsp;</th>';
                    //                $html .= '<th>&nbsp;</th>';
                    //                $html .= '<th>&nbsp;</th>';
                    //                $html .= '<th>&nbsp;</th>';
                    $html .= '<th class="border">'.$noidung->thamquan_tongthanhtien.'</th>';
                    //$html .= '<th>&nbsp;</th>';
                    $html .= '<th class="border">'.$noidung->thamquan_tongthue.'</th>';
                    $html .= '<th class="border">&nbsp;</th>';
                    //$html .= '<th>&nbsp;</th>';
                    $html .= '</tr>';
                    $html .= '</tfoot>';
                 
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
                                    $html .= '<td class="border"><b>Loại dịch vụ</b></td>  ';
                                    $html .= '<th class="border">Số lượng</th> ';
                                    $html .= '<th class="border">Đơn giá</th> ';
                                    $html .= '<th class="border">FOC</th> ';
                                    $html .= '<th class="border">Thành tiền</th>';
                                    $html .= '<th class="border">Thuế suất</th>';
                                    $html .= '<th class="border">VAT</th>';
                                $html .= '</tr>';
                            $html .= '</thead>';
                            
                            $html .= '<tbody> ';
                                 foreach($chiphikhac as $chiphikhacval){
                                    $html .= '<tr>';
                                        $html .= '<td class="border">'.$chiphikhacval->chiphikhac_loaidichvu.'</td>'; 
                                        $html .= '<td class="tabDetailViewDF border">'.$chiphikhacval->chiphikhac_soluong.'</td>'; 
                                        $html .= '<td class="tabDetailViewDF border">'.$chiphikhacval->chiphikhac_dongia.'</td>'; 
                                        $html .= '<td class="tabDetailViewDF border">'.$chiphikhacval->chiphikhac_foc.'</td>'; 
                                        $html .= '<td class="tabDetailViewDF border">'.$chiphikhacval->chiphikhac_thanhtien.'</td>'; 
                                        $html .= '<td class="tabDetailViewDF border">'.$chiphikhacval->chiphikhac_thuesuat.'</td>'; 
                                        $html .= '<td class="tabDetailViewDF border">'.$chiphikhacval->chiphikhac_vat.'</td>'; 
                                    $html .= '</tr>'; 
                                 }
                                 $html .= '<tr> ';
                                    $html .= '<th>TỔNG CỘNG</th>';
                                    $html .= '<th class="tabDetailViewDF border">&nbsp;</th>';
                                    $html .= '<th class="tabDetailViewDF border">&nbsp;</th>';
                                    $html .= '<th class="tabDetailViewDF border">&nbsp;</th> ';
                                    $html .= '<td class="tabDetailViewDF border">'.$noidung->chiphikhac_tongcong.'</td>';
                                    $html .= '<th class="tabDetailViewDF border">&nbsp;</th>';
                                    $html .= '<td class="tabDetailViewDF border">'.$noidung->chiphikhac_tongthue.'</td>';
                                    $html .= '</tr>';
                                    $html .= '</tbody>';
                                    $html .= '</table>';
                                    $html .= '</fieldset>';
                             }
                             
                $html .= '<fieldset>';
                $html .= '<legend><h3>TỔNG CHI PHÍ</h3></legend>';
                $html .= '<table cellpadding="0" class="tabDetailView" cellspacing="0" border="1" style="border-collapse: collapse;" width="100%">';
                    $html .= '<tr>';
                        $html .= '<td class="border"><b>TỔNG CHI PHÍ</b></td>';
                        $html .= '<td align="tabDetailViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetailViewDF" class="tabDetailViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetailViewDF" class="tabDetailViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetailViewDF" class="tabDetailViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetailViewDF" class="tabDetailViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetailViewDF" class="tabDetailViewDF border">'.$noidung->tongchiphi.'</td>';
                        $html .= '<td align="tabDetailViewDF" class="tabDetailViewDF border">Tổng Thuế: '.$noidung->tongthue.'</td>';
                        $html .= '<td align="tabDetailViewDF" class="tabDetailViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetailViewDF" class="tabDetailViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetailViewDF" class="tabDetailViewDF">&nbsp;</td>';
                    $html .= '</tr>'; 
                    $html .= '<tr>';
                        $html .= '<td class="border"><b>Tỷ lệ</b></td>';
                        $html .= '<td align="tabDetailViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetailViewDF" class="tabDetailViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetailViewDF" class="tabDetailViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetailViewDF" class="tabDetailViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetailViewDF" class="tabDetailViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetailViewDF" class="tabDetailViewDF border">'.$noidung->tientheotyle.'</td>';
                        $html .= '<td align="tabDetailViewDF" class="tabDetailViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetailViewDF" class="tabDetailViewDF">&nbsp;</td>';
                        $html .= '<td align="tabDetailViewDF" class="tabDetailViewDF">&nbsp;</td> ';
                        $html .= '<td align="tabDetailViewDF" class="tabDetailViewDF">&nbsp;</td>';
                    $html .= '</tr>';
                    $html .= '<tr>';
                        $html .= '<td class="border"><b>HOA HỒNG</b></td>';
                        $html .= '<td>&nbsp;</td>';
                        $html .= '<td class="tabDetailViewDF">&nbsp;</td>';
                        $html .= '<td class="tabDetailViewDF">&nbsp;</td>';
                        $html .= '<td class="tabDetailViewDF">&nbsp;</td>';
                        $html .= '<td class="tabDetailViewDF">&nbsp;</td>';
                        $html .= '<td class="tabDetailViewDF border">'.$noidung->hoahong.'</td> ';
                        $html .= '<td class="tabDetailViewDF">&nbsp;</td>';
                        $html .= '<td class="tabDetailViewDF">&nbsp;</td>';
                        $html .= '<td class="tabDetailViewDF">&nbsp;</td>';
                        $html .= '<td class="tabDetailViewDF">&nbsp;</td>';
                    $html .= '</tr>';
                    $html .= '<tr>';
                        $html .= '<td class="border"><b>GIÁ BÁN</b></td>';
                        $html .= '<td>&nbsp;</td>';
                        $html .= '<td class="tabDetailViewDF">&nbsp;</td>'; 
                        $html .= '<td class="tabDetailViewDF">Giá bán trên một khách: <b>'.$noidung->giabantrenmotnguoi.'</b></td> ';
                        $html .= '<td class="tabDetailViewDF">&nbsp;</td>';
                        $html .= '<td class="tabDetailViewDF">&nbsp;</td>  ';
                        $html .= '<td class="tabDetailViewDF border">Giá bán trên đoàn: <b>'.$noidung->giaban.'</b></td> ';
                        $html .= '<td class="tabDetailViewDF">&nbsp;</td> ';
                        $html .= '<td class="tabDetailViewDF">&nbsp;</td>';
                        $html .= '<td class="tabDetailViewDF">&nbsp;</td> ';
                        $html .= '<td class="tabDetailViewDF">&nbsp;</td> ';
                    $html .= '</tr> ';
                $html .= '</table>';
                $html .= '</fieldset>';
            $htmlReport .= '<fieldset>';
              $htmlReport .= '<legend><h3>CHI TIẾT</h3></legend>';
                  $htmlReport .= '<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tabDetailView" style="border-collapse:collapse">';
              $htmlReport .= '<tr> ';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<th>DUYỆT</th>';
                $htmlReport .= '<td>&nbsp;</td> ';
                $htmlReport .= '<td>&nbsp;</td>';
                $htmlReport .= '<td width="15%" class="border">VAT ĐẦU RA</td>';
                $htmlReport .= '<td width="25%" class="border">'.$noidung->vatdaura.'</td>';
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
                $htmlReport .= '<td width="15%" class="border">VAT ĐẦU VÀO</td> ';
                $htmlReport .= '<td class="border">'.$noidung->vatdauvao.'</td> ';
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
                $htmlReport .= '<td width="15%" class="border">VAT PHẢI ĐÓNG</td>';
                $htmlReport .= '<td width="25%" class="border">'.$noidung->vatphaidong.'</td>';
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
                $htmlReport .= '<td width="15%" class="border">DOANH THU</td>';
                $htmlReport .= '<td width="25%" class="border">'.$noidung->doanhthu.'</td> ';
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
                $htmlReport .= '<td width="15%" class="border">TỔNG CHI PHÍ</td> ';
                $htmlReport .= '<td width="25%" class="border">'.$noidung->tongchiphi1.'</td>';
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
                $htmlReport .= '<td width="15%" class="border">GIÁ VỐN/ 1 KHÁCH</td>';
                $htmlReport .= '<td width="25%" class="border">'.$noidung->giavontrenkhach.'</td>';
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
                $htmlReport .= '<td width="15%" class="border">GIÁ BÁN/ 1 KHÁCH</td>';
                $htmlReport .= '<td width="25%" class="border">'.$noidung->giabantrenkhach.'</td>';
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
                $htmlReport .= '<td width="15%" class="border">LÃI KHÁCH</td>';
                $htmlReport .= '<td width="25%" class="border">'.$noidung->laikhach.'</td>';
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
                $htmlReport .= '<td width="15%" class="border">TỔNG LÃI</td>';
                $htmlReport .= '<td width="25%" class="border">'.$noidung->tonglai.'</td>';
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
                $htmlReport .= '<td width="15%" class="border">TỶ LỆ SAU THUẾ</td> ';
                $htmlReport .= '<td width="25%" class="border">'.$noidung->tylesauthue.' %</td>';
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
                $html .= '<table width="100%" class="tabDetailView" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                    $html .= '<tr>';
                        $html .= '<td class="tabDetailViewDL border"><b>Tour name:</b></td>';
                        $html .= '<td class="tabDetailViewDF border">';
                                $html .= '<a href="index.php?module=Tours&action=DetailView&record='.$this->bean->worksheet_tour_id.'">'.$this->bean->worksheet_tour_name.' </a>';
                            $html .= '</td>';
                        $html .= '<td class="tabDetailViewDL border"><b>Tour Code:</b></td>';
                        $html .= '<td class="tabDetailViewDF border">';
                            $html .= $this->bean->tourcode;
                        $html .='</td>';
                        $html .= '<td class="tabDetailViewDL border"><b>Ngày bắt đầu</b></td>';

                        $html .= '<td class="tabDetailViewDF border">';
                            $html .= $noidung->ngaybatdau;
                        $html .= '</td>';
                        $html .= '<td class="tabDetailViewDL border"><b>Ngày kết thúc</b></td>';
                        $html .= '<td class="tabDetailViewDF border">'.$noidung->ngayketthuc.'</td>';
                    $html .= '</tr>';
                    $html .= '<tr>';
                        $html .= '<td class="tabDetailViewDL border"><b>Hướng dẫn viên</b></td>';
                        $html .= '<td class="tabDetailViewDF border">';
                                $html .= $noidung->huongdanvien;
                            $html .= '</td>';
                        $html .= '<td class="tabDetailViewDL border"><b>Duration:</b></td>';
                        $html .= '<td class="tabDetailViewDF border">';
                                $html .= $this->bean->duration;
                            $html .= '</td>';
                        $html .= '<td class="tabDetailViewDL border"><b>Phương tiện:</b></td>';

                        $html .= '<td class="tabDetailViewDF border">';
                            $html .= $this->bean->transport;
                        $html .= '</td>';
                        $html .= '<td class="tabDetailViewDL border">&nbsp;</td>';
                        $html .= '<td class="tabDetailViewDF border">&nbsp;</td>';
                    $html .= '</tr>';
                    $html .= '<tr>';
                        $html .= '<td class="tabDetailViewDL border"><b>Lộ trình:</b></td>';
                        $html .= '<td class="tabDetailViewDF border">';
                                $html .= $this->bean->lotrinh;
                            $html .= '</td>';
                       $html .= '<td class="tabDetailViewDL border"><b>Thuế Suất hóa:</b></td>';
                        $html .= '<td class="tabDetailViewDF border">';
                            $html .= $this->bean->thuesuathoa;
                        $html .= '</td>';
                        $html .= '<td class="tabDetailViewDL border"><b>Số khách: </b></td>';
                        $html .= '<td class="tabDetailViewDF border">';
                                $html .= $this->bean->sokhach;
                            $html .= '</td>';                
                        $html .= '<td class="tabDetailViewDL border"><b>Tỷ lệ :</b></td>';
                        $html .= '<td class="tabDetailViewDF border">';
                                $html .= $this->bean->tyle;
                            $html .= '</td>';
                    $html .= '</tr>'; 
                $html .= '</table>';
                $html .= '</fieldset>';                
                // loading vé máy bay
                $html .= '<fieldset>';
                $html .= '<legend><h3>VÉ MÁY BAY</h3></legend>';
                $html .= '<table width="100%" class="tabDetailView" id="vemaybay" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<tbody>';  
                // chuyến bay tại miền bắc
                $html .= '<tr>';
                    $html .= '<td colspan="7">';
                    $vmb_mienbac = $noidung->vmb_mienbac;
                    if(count($vmb_mienbac)>0){
                        
                       $html .= '<fieldset><legend><h3>MIỀN BẮC</h3></legend>';
                        $html .= '<table width="100%" class="tabDetailView" id="vemaybay_mb" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                            $html .= '<thead>' ;
                                $html .= '<tr>';
                                    $html .= '<td width="22%" class="border"><b>Tên chuyến bay</b></td>';
                                    $html .= '<th width="13%" class="border">Đơn giá</th>';
                                    $html .= '<th width="13%" class="border">Số lượng</th>';
                                    $html .= '<th width="13%" class="border">FOC</th>';
                                    $html .= '<th width="13%" class="border">Thành tiền</th>';
                                    $html .= '<th width="13%" class="border">Thuế suất</th>';
                                    $html .= '<th width="13%" class="border">Thuế</th>';
                                $html .= '</tr>';
                            $html .= '</thead>' ;
                            $html .= '<tbody>';
                            $vmb_mb = 1;
                                foreach($vmb_mienbac as $airtkmb){
                                      $html .= '<tr>';
                                        $html .= '<td width="22%" class="border"> <a target="blank" href="index.php?module=AirlinesTickets&action=DetailView&record='.$airtkmb->vemaybay_mb.'">'.translate('list_airlinetiket_dom_north','',$airtkmb->vemaybay_mb).'</a></td>';
                                        $html .= '<td width="13%" class="tabDetailViewDF border">'.$airtkmb->vemaybay_mb_dongia.'</td>';
                                        $html .= '<td width="13%" class="tabDetaiViewDL border">'.$airtkmb->vemaybay_mb_soluong.'</td>';
                                        $html .= '<td width="13%" class="tabDetailViewDF border">'.$airtkmb->vemaybay_mb_foc.'</td>';
                                        $html .= '<td width="13%" class="tabDetaiViewDL border">'.$airtkmb->vemaybay_mb_thanhtien.'</td>';
                                        $html .= '<td width="13%" class="tabDetailViewDF border">'.$airtkmb->vemaybay_mb_thuesuat.'</td>';
                                        $html .= '<td width="13%" class="tabDetaiViewDL border">'.$airtkmb->vemaybay_mb_vat.'</td>';
                                      $html .= '</tr>';
                                      $vmb_mb ++;
                                }
                            $html .= '<tr>';  
                                $html .= '<td width="61%" class="border" colspan="4"><b>Tổng cộng</b></td>';
//                                $html .= '<th width="13%" class="border">&nbsp;</th>';
//                                $html .= '<th width="13%" class="border">&nbsp;</th>';
//                                $html .= '<th width="13%" class="border">&nbsp;</th>';
                                $html .= '<th width="13%" class="border">'.$noidung->vemaybay_mb_tongthanhtien.'</th>';  
                                $html .= '<th width="13%" class="border">&nbsp;</th>';
                                $html .= '<th width="13%" class="border">'.$noidung->vemaybay_mb_tongthue.'</th>';
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
                        $html .= '<table width="100%" class="tabDetailView" id="vemaybay_mt" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                            $html .= '<thead>' ;
                                $html .= '<tr>';
                                    $html .= '<td width="22%" class="border"><b>Tên chuyến bay</b></td>';
                                    $html .= '<th width="13%" class="border">Đơn giá</th>';
                                    $html .= '<th width="13%" class="border">Số lượng</th>';
                                    $html .= '<th width="13%" class="border">FOC</th>';
                                    $html .= '<th width="13%" class="border">Thành tiền</th>';
                                    $html .= '<th width="13%" class="border">Thuế suất</th>';
                                    $html .= '<th width="13%" class="border">Thuế</th>';
                                $html .= '</tr>';
                            $html .= '</thead>' ;
                            
                            $html .= '<tbody>';
                                foreach($vmb_mientrung as $airtkmt){
                                      $html .= '<tr>';
                                        $html .= '<td width="22%" class="border"> <a target="blank" href="index.php?module=AirlinesTickets&action=DetailView&record='.$airtkmt->vemaybay_mt.'">'.translate('list_airlinetiket_dom_middle','',$airtkmt->vemaybay_mt).'</td>';
                                        $html .= '<td width="13%" class="tabDetailViewDF border">'.$airtkmt->vemaybay_mt_dongia.'</td>';
                                        $html .= '<td width="13%" class="tabDetaiViewDL border">'.$airtkmt->vemaybay_mt_soluong.'</td>';
                                        $html .= '<td width="13%" class="tabDetailViewDF border">'.$airtkmt->vemaybay_mt_foc.'</td>';
                                        $html .= '<td width="13%" class="tabDetaiViewDL border">'.$airtkmt->vemaybay_mt_thanhtien.'</td>';
                                        $html .= '<td width="13%" class="tabDetailViewDF border">'.$airtkmt->vemaybay_mt_thuesuat.'</td>';
                                        $html .= '<td width="13%" class="tabDetaiViewDL border">'.$airtkmt->vemaybay_mt_vat.'</td>';
                                      $html .= '</tr>';
                                  }
                                  $html .= '<tr>'; 
                                        $html .= '<td width="61%" class="border" colspan="4"><b>Tổng cộng</b></td>';
//                                        $html .= '<th width="13%">&nbsp;</th>';
//                                        $html .= '<th width="13%">&nbsp;</th>';
//                                        $html .= '<th width="13%">&nbsp;</th>';
                                        $html .= '<th width="13%" class="border">'.$noidung->vemaybay_mt_tongthanhtien.'</th>';
                                        $html .= '<th width="13%" class="border">&nbsp;</th>';  
                                        $html .= '<th width="13%" class="border">'.$noidung->vemaybay_mt_tongthue.'</th>';
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
                        $html .= '<table width="100%" class="tabDetailView" id="vemaybay_mn" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                            $html .= '<thead>' ;
                                $html .= '<tr>';
                                    $html .= '<td width="22%" class="border"><b>Tên chuyến bay</b></td>';
                                    $html .= '<th width="13%" class="border">Đơn giá</th>';
                                    $html .= '<th width="13%" class="border">Số lượng</th>';
                                    $html .= '<th width="13%" class="border">FOC</th>';
                                    $html .= '<th width="13%" class="border">Thành tiền</th>';
                                    $html .= '<th width="13%" class="border">Thuế suất</th>';
                                    $html .= '<th width="13%" class="border">Thuế</th>';
                                $html .= '</tr>';
                            $html .= '</thead>' ;
                            
                            $html .= '<tbody>';
                            $vmb_mn = 1;
                                foreach($vmb_miennam as $airtkmn){
                                      $html .= '<tr>';
                                        $html .= '<td width="22%" class="border"><a target="blank" href="index.php?module=AirlinesTickets&action=DetailView&record='.$airtkmn->vemaybay_mn.'">'.translate('list_airlinetiket_dom_south','',$airtkmn->vemaybay_mn).'</td>';
                                        $html .= '<td width="13%" class="tabDetailViewDF border">'.$airtkmn->vemaybay_mn_dongia.'</td>';
                                        $html .= '<td width="13%" class="tabDetaiViewDL border">'.$airtkmn->vemaybay_mn_soluong.'</td>';
                                        $html .= '<td width="13%" class="tabDetailViewDF border">'.$airtkmn->vemaybay_mn_foc.'</td>';
                                        $html .= '<td width="13%" class="tabDetaiViewDL border">'.$airtkmn->vemaybay_mn_thanhtien.'</td>';
                                        $html .= '<td width="13%" class="tabDetailViewDF border">'.$airtkmn->vemaybay_mn_thuesuat.'</td>';
                                        $html .= '<td width="13%" class="tabDetaiViewDL border">'.$airtkmn->vemaybay_mn_vat.'</td>';
                                      $html .= '</tr>';
                                      $vmb_mn ++;
                                  }
                                  $html .= '<tr>';
                                        $html .= '<td width="61%" class="border" colspan="4"><b>Tổng cộng</b></td>';
//                                        $html .= '<th width="13%">&nbsp;</th>';
//                                        $html .= '<th width="13%">&nbsp;</th>';
//                                        $html .= '<th width="13%">&nbsp;</th>';
                                        $html .= '<th width="13%" class="border">'.$noidung->vemaybay_mn_tongthanhtien.'</th>';
                                        $html .= '<th width="13%" class="border">&nbsp;</th>';
                                        $html .= '<th width="13%" class="border">'.$noidung->vemaybay_mn_tongthue.'</th>';
                                $html .= '</tr>';
                            $html .= '</tbody>';   
                        $html .= '</table>';
                        $html .= '</fieldset>';
                    }
                    $html .= '</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                $html .= '<th width="61%" clospan="4" class="tabDetailViewDF border">TỔNG CỘNG</th>';
//                $html .= '<th width="13%" class="tabDetailViewDF">&nbsp;</th>';
//                $html .= '<th width="13%" class="tabDetailViewDF">&nbsp;</th>';
//                $html .= '<th width="13%" class="tabDetailViewDF">&nbsp;</th>';
                $html .= '<th width="13%" class="tabDetailViewDF border"><b>'.$noidung->vemaybay_tongthanhtien.'</b></th>';
                $html .= '<th width="13%" class="tabDetailViewDF border">&nbsp;</th>';
                $html .= '<th width="13%" class="tabDetailViewDF border"><b>'.$noidung->vemaybay_tongthue.'</b></th>';
                $html .= '</tr>';
                $html .='</tbody></table> </fieldset>';
                
                // kết thúc phần vé máy bay
                
                // loading phần nhà hàng            
                $html .= '<fieldset >';
                $html .= '<legend><h3>NHÀ HÀNG</h3></legend>';
                $html .= '<table width="100%" id="nhahang" class="tabDetailView" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<tbody>';
                
                // lấy danh sách nhà hàng ở miền bắc
                $html .= '<tr> <td colspan="9">';
                $html .= '<fieldset >';
                $nhahang_mienbac = $noidung->nhahang_mienbac;
                if(count($nhahang_mienbac)>0){
                $html .= '<legend><h3>MIỀN BẮC</h3></legend>';
                $html .= '<table width="100%" id="nhahang_mienbac" class="tabDetailView" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th width="20%" class="border">Tên nhà hàng</th>';
                    $html .= '<td width="10%" class="border"><b>Ghi chú</b></td>';
                    $html .= '<th width="10%" class="border">Đơn giá</th>';
                    $html .= '<th width="10%" class="border">Số lượng</th>';
                    $html .= '<th width="10%" class="border">Số bữa ăn</th>';
                    $html .= '<th width="10%" class="border">FOC</th>';
                    $html .= '<th width="10%" class="border">Thành tiền</th>';
                    $html .= '<th width="10%" class="border">Thuế suất</th>';
                    $html .= '<th width="10%" class="border">Thuế</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                $nh_mb = 0;
                foreach($nhahang_mienbac as $valmb){
                        $html .= '<tr>';
                            $html .= '<td width="20%" class="center border"> <a target="blank" href="index.php?module=Restaurants&action=DetailView&record='.$valmb->nh_id.'">'.translate('list_restaurant_dom_north','',$valmb->nh_id).'</td>';
                            $html .= '<td width="10%" class="border">'.translate('workshet_notes_type_dom','',$valmb->nh_ghichu_mb).'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDL border">'.$valmb->nh_dongia_mb.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$valmb->nh_soluong_mb.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDL border">'.$valmb->nh_songay_mb.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$valmb->nh_foc_mb.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDL border">'.$valmb->nh_thanhtien_mb.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$valmb->nh_thuexuat_mb.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDL border">'.$valmb->nh_thue_mb.'</td>';
                        $html .= '</tr> ';
                    $nh_mb ++;
                }
                $html .= '<tr>';
                    $html .= '<th width="70%" class="border" colspan="6"><b>Tổng cộng</b></th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%" class="border tabDetailViewDF">'.$noidung->nhahang_tongthanhtien_mienbac.'</th>';
                    $html .= '<th width="10%" class="border tabDetailViewDF">&nbsp;</th>';
                    $html .= '<th width="10%" class="border tabDetailViewDF">'.$noidung->nhahang_tongthue_mienbac.'</th>';
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
                $html .= '<table width="100%" class="tabDetailView" id="nhahang_mientrung" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th width="20%" class="border">Tên nhà hàng</th>';
                    $html .= '<td width="10%" class="border"><b>Ghi chú</b></td>';
                    $html .= '<th width="10%" class="border">Đơn giá</th>';
                    $html .= '<th width="10%" class="border">Số lượng</th>';
                    $html .= '<th width="10%" class="border">Số bữa ăn</th>';
                    $html .= '<th width="10%" class="border">FOC</th>';
                    $html .= '<th width="10%" class="border">Thành tiền</th>';
                    $html .= '<th width="10%" class="border">Thuế suất</th>';
                    $html .= '<th width="10%" class="border">Thuế</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '</tbody>';
                foreach($nhahang_mientrung as $valmt){
                        $html .= '<tr>';
                            $html .= '<tr>';
                            $html .= '<td width="20%" class="border"><a target="blank" href="index.php?module=Restaurants&action=DetailView&record='.$valmt->nh_id.'">'.translate('list_restaurant_dom_middle','',$valmt->nh_id).'</td>';
                            $html .= '<td width="10%" class="border">'.translate('workshet_notes_type_dom','',$valmt->nh_ghichu_mt).'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDL border">'.$valmt->nh_dongia_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$valmt->nh_soluong_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDL border">'.$valmt->nh_songay_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$valmt->nh_foc_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDL border">'.$valmt->nh_thanhtien_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$valmt->nh_thuexuat_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetaiViewDL border">'.$valmt->nh_thue_mt.'</td>';
                        $html .= '</tr> ';
                    }
                $html .= '<tr>';
                    $html .= '<th width="70%" class="border" colspan="6"> <b>Tổng cộng</b> </th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%" class="border">'.$noidung->nhahang_tongthanhtien_mientrung.'</th>';
                    $html .= '<th width="10%" class="border">&nbsp;</th>';
                    $html .= '<th width="10%" class="border">'.$noidung->nhahang_tongthue_mientrung.'</th>';
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
                $html .= '<table width="100%" class="tabDetailView" id="nhahang_miennam" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th width="20%" class="border">Tên nhà hàng</th>';
                    $html .= '<td width="10%" class="border"><b>Ghi chú</b></td>';
                    $html .= '<th width="10%" class="border">Đơn giá</th>';
                    $html .= '<th width="10%" class="border">Số lượng</th>';
                    $html .= '<th width="10%" class="border">Số bữa ăn</th>';
                    $html .= '<th width="10%" class="border">FOC</th>';
                    $html .= '<th width="10%" class="border">Thành tiền</th>';
                    $html .= '<th width="10%" class="border">Thuế suất</th>';
                    $html .= '<th width="10%" class="border">Thuế</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '</tbody>';
                foreach($nhahang_miennam as $valmn){
                        $html .= '<tr>';
                            $html .= '<tr>';
                            $html .= '<td width="10%" class="border" ><a target="blank" href="index.php?module=Restaurants&action=DetailView&record='.$valmn->nh_id.'">'.translate('list_restaurant_dom_south','',$valmn->nh_id).'</td>';
                            $html .= '<td width="10%" class="border">'.translate('workshet_notes_type_dom','',$valmn->nh_ghichu_mn).'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$valmn->nh_dongia_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$valmn->nh_soluong_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$valmn->nh_songay_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$valmn->nh_foc_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$valmn->nh_thanhtien_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$valmn->nh_thuexuat_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$valmn->nh_thue_mn.'</td>';
                        $html .= '</tr> ';
                    }
                        $html .= '<tr>';
                            $html .= '<th width="70%" class="border" colspan="6"><b>Tổng cộng</b></th>';
//                            $html .= '<th width="10%">&nbsp;</th>';
//                            $html .= '<th width="10%">&nbsp;</th>';
//                            $html .= '<th width="10%">&nbsp;</th>';
//                            $html .= '<th width="10%">&nbsp;</th>';
//                            $html .= '<th width="10%">&nbsp;</th>';
                            $html .= '<th width="10%" class="border">'.$noidung->nhahang_tongthanhtien_miennam.'</th>';
                            $html .= '<th width="10%" class="border">&nbsp;</th>';
                            $html .= '<th width="10%" class="border">'.$noidung->nhahang_tongthue_miennam.'</th>';
                        $html .= '</tr>';
                $html .= '</tbody>';
                $html .= '</table> ';
                $html .= '</fieldset>';
                }
                $html .= '</td></tr>';
                $html .= '<tr>';
                    $html .= '<th width="70%" colspan="6" class="border">TỔNG CỘNG</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%" class="border">'.$noidung->nhahang_tongthanhtien.'</th>';
                    $html .= '<th width="10%" class="border">&nbsp;</th>';
                    $html .= '<th width="10%" class="border">'.$noidung->nhahang_tongthue.'</th>';
                $html .= '</tr>';
                $html .= '</tbody>';
                $html .= '</table> </fieldset>';
            } 
            // ket thuc phan load nha hang
            
            // loading hotel data 
            // lấy danh sách khách sạn
                
                $html .= '<fieldset>';
                $html .= '<legend><h3>KHÁCH SẠN</h3></legend>';
                $html .= '<table width="100%" class="tabDetailView" border="0" class="tabForm" id="khachsan" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '</thead>';
                $html .= '<tbody>';
                

                 // lấy danh sách khách sạn ở miền bắc
                $khachsan_mienbac = $noidung->khachsan_mienbac;
                $html .= '<tr><td colspan="12">';
                if(count($khachsan_mienbac)>0){
                    $html .= '<fieldset >';
                    $html .= '<legend><h3>MIỀN BẮC</h3></legend>';
                    $html .= '<table width="100%" border="0" class="tabDetailView" id="ks_mb" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                    $html .= '<thead>';                                       
                    $html .= '<tr>';
                    $html .= '<th width="12%" class="border">Tên khách sạn</th>';
                    $html .= '<th width="8%" class="border">Single</th>';
                    $html .= '<th width="8%" class="border">SL Single</th>';
                    $html .= '<th width="8%" class="border">Double</th>';
                    $html .= '<th width="8%" class="border">SL Double</th>';
                    $html .= '<th width="8%" class="border">Triple</th>';
                    $html .= '<th width="8%" class="border">SL Triple</th>';
                    $html .= '<th width="8%" class="border">Foc</th>';
                    $html .= '<th width="8%" class="border">Hạng phòng</th>';
                    $html .= '<th width="8%" class="border">Số đêm</th>';
                    $html .= '<th width="8%" class="border">Thành tiền</th>';
                    $html .= '<th width="8%" class="border">Thuế suất</th>';
                    $html .= '<th width="8%" class="border">Thuế</th>';
                    $html .= '</tr>';
                    
                    $html .= '</thead>';
                    $html .= '<tbody>';
                    foreach($khachsan_mienbac as $val_ksmb){
                        $html .= '<tr>';
                            $html .= '<td width="12%" class="border"><a target="blank" href="index.php?module=Hotels&action=DetailView&record='.$val_ksmb->ks_id.'">'.$val_ksmb->ks_name.'</a></td>';
                            $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmb->SGL_ks_mb.'</td>';
                            $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmb->SGL_SL_ks_mb.'</td>';
                            $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmb->DBL_ks_mb.'</td>';
                            $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmb->DBL_SL_ks_mb.'</td>';
                            $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmb->TPL_ks_mb.'</td>';
                            $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmb->TPL_SL_ks_mb.'</td>';
                            $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmb->foc.'</td>';
                            $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmb->hangphong_ks_mb.'</td>';
                            $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmb->songaydem_ks_mb.'</td>';
                            $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmb->thanhtien_ks_mb.'</td>';
                            $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmb->thuesuat_ks_mb.'</td>';
                            $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmb->vat_ks_mb.'</td>';
                        $html .= '</tr>';
                    }
                    $html .= '<tr>';
                        $html .= '<th width="76%" colspan="10" class="border">Tổng cộng</th>';
//                        $html .= '<th width="8%">&nbsp;</th>';
//                        $html .= '<th width="8%">&nbsp;</th>';
//                        $html .= '<th width="8%">&nbsp;</th>';
//                        $html .= '<th width="8%">&nbsp;</th>';
//                        $html .= '<th width="8%">&nbsp;</th>';
//                        $html .= '<th width="8%">&nbsp;</th>';
//                        $html .= '<th width="8%">&nbsp;</th>';
//                        $html .= '<th width="8%">&nbsp;</th>';
                        $html .= '<th width="8%" class="border">'.$noidung->khachsan_tongthanhtien_mienbac .'</th>';
                        $html .= '<th width="8%" class="border">&nbsp;</th>';
                        $html .= '<th width="8%" class="border">'.$noidung->khachsan_tongthue_mienbac.'</th>';
                    $html .= '</tr>';
                    $html .= '</tbody>';
                    $html .= '</table>';
                    $html .= '</fieldset>';
                }
                $html .= '</td></tr>';
                
                // khách sạn tại miền trung
                $html .= '<tr><td colspan="12">';
                $khachsan_mientrung = $noidung->khachsan_mientrung;
                if(count($khachsan_mientrung)>0){
                    $html .= '<fieldset >';
                    $html .= '<legend><h3>MIỀN TRUNG</h3></legend>';
                    $html .= '<table width="100%" border="0" class="tabDetailView" id="ks_mt" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                    $html .= '<thead>';
                    $html .= '<tr>';
                    $html .= '<th width="12%" class="border">Tên khách sạn</th>';
                    $html .= '<th width="8%"  class="border">Single</th>';
                    $html .= '<th width="8%" class="border">SL Single</th>';
                    $html .= '<th width="8%" class="border">Double</th>';
                    $html .= '<th width="8%" class="border">SL Double</th>';
                    $html .= '<th width="8%" class="border">Triple</th>';
                    $html .= '<th width="8%" class="border">SL Triple</th>';
                    $html .= '<th width="8%" class="border">Foc</th>';
                    $html .= '<th width="8%" class="border">Hạng phòng</th>';
                    $html .= '<th width="8%" class="border">Số đêm</th>';
                    $html .= '<th width="8%" class="border">thành tiền</th>';
                    $html .= '<th width="8%" class="border">Thuế suất</th>';
                    $html .= '<th width="8%" class="border">Thuế</th>';
                    $html .= '</tr>';
                    $html .= '</thead>';
                    $html .= '<tbody>';
                        foreach ($khachsan_mientrung as $val_ksmt){
                            $html .= '<tr>';
                                $html .= '<td width="12%" class="border"><a target="blank" href="index.php?module=Hotels&action=DetailView&record='.$val_ksmt->ks_id.'">'.$val_ksmt->ks_name.'</a> </td>';
                                $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmt->SGL_ks_mt.'</td>';
                                $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmt->SGL_SL_ks_mt.'</td>';
                                $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmt->DBL_ks_mt.'</td>';
                                $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmt->DBL_SL_ks_mt.'</td>';
                                $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmt->TPL_ks_mt.'</td>';
                                $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmt->TPL_SL_ks_mt.'</td>';
                                $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmt->foc.'</td>';
                                $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmt->hangphong_ks_mt.'</td>';
                                $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmt->songaydem_ks_mt.'</td>';
                                $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmt->thanhtien_ks_mt.'</td>';
                                $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmt->thuesuat_ks_mt.'</td>';
                                $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmt->vat_ks_mt.'</td>';
                            $html .= '</tr>';
                        }
                        $html .= '<tr>';
                            $html .= '<th width="76%" colspan="10" class="border">Tổng cộng</th>';
//                            $html .= '<th width="8%" class="border">&nbsp;</th>';
//                            $html .= '<th width="8%">&nbsp;</th>';
//                            $html .= '<th width="8%">&nbsp;</th>';
//                            $html .= '<th width="8%">&nbsp;</th>';
//                            $html .= '<th width="8%">&nbsp;</th>';
//                            $html .= '<th width="8%">&nbsp;</th>';
//                            $html .= '<th width="8%">&nbsp;</th>';
//                            $html .= '<th width="8%">&nbsp;</th>';
                            $html .= '<th width="8%" class="border">'.$noidung->khachsan_tongthanhtien_mientrung.'</th>';
                            $html .= '<th width="8%" class="border">&nbsp;</th>';
                            $html .= '<th width="8%" class="border">'.$noidung->khachsan_tongthue_mientrung.'</th>';
                      $html .= '</tr>';
                    $html .= '</tbody>';
                    $html .= '</table>';
                    $html .= '</fieldset>';
                }
                $html .= '</td></tr>';
                
                // khách sạn tại miền nam
                $html .= '<tr><td colspan="12">';
                $khachsan_miennam = $noidung->khachsan_miennam;
                if(count($khachsan_miennam)>0){
                    $html .= '<fieldset >';
                    $html .= '<legend><h3>MIỀN NAM</h3></legend>';
                    $html .= '<table width="100%" border="0" class="tabDetailView" id="ks_mn" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                    $html .= '<thead>';
                    $html .= '<th width="12%" class="border">Tên khách sạn</th>';
                    $html .= '<th width="8%" class="border">Single</th>';
                    $html .= '<th width="8%" class="border">SL Single</th>';
                    $html .= '<th width="8%" class="border">Double</th>';
                    $html .= '<th width="8%" class="border">SL Double</th>';
                    $html .= '<th width="8%" class="border">Triple</th>';
                    $html .= '<th width="8%" class="border">SL Triple</th>';
                    $html .= '<th width="8%" class="border">Foc</th>';
                    $html .= '<th width="8%" class="border">Hạng phòng</th>';
                    $html .= '<th width="8%" class="border">Số đêm</th>';
                    $html .= '<th width="8%" class="border">thành tiền</th>';
                    $html .= '<th width="8%" class="border">Thuế suất</th>';
                    $html .= '<th width="8%" class="border">Thuế</th>';
                    
                    $html .= '</thead>';
                    $html .= '<tbody>';
                    $ks_mn = 1;
                    foreach($khachsan_miennam as $val_ksmn) {
                         $html .= '<tr>';
                                $html .= '<td width="12%" class="border"><a target="blank" href="index.php?module=Hotels&action=DetailView&record='.$val_ksmn->ks_id.'">'.$val_ksmn->ks_name.'</a> </td>';
                                $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmn->SGL_ks_mn.'</td>';
                                $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmn->SGL_SL_ks_mn.'</td>';
                                $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmn->DBL_ks_mn.'</td>';
                                $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmn->DBL_SL_ks_mn.'</td>';
                                $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmn->TPL_ks_mn.'</td>';
                                $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmn->TPL_SL_ks_mn.'</td>';
                                $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmn->foc.'</td>';
                                $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmn->hangphong_ks_mn.'</td>';
                                $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmn->songaydem_ks_mn.'</td>';
                                $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmn->thanhtien_ks_mn.'</td>';
                                $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmn->thuesuat_ks_mn.'</td>';
                                $html .= '<td width="8%" class="tabDetailViewDF border">'.$val_ksmn->vat_ks_mn.'</td>';
                            $html .= '</tr>';
                        $ks_mn++;
                    }
                    $html .= '<tr>';
                        $html .= '<th width="76%" colspan="10" class="border">Tổng cộng</th>';
//                        $html .= '<th width="8%">&nbsp;</th>';
//                        $html .= '<th width="8%">&nbsp;</th>';
//                        $html .= '<th width="8%">&nbsp;</th>';
//                        $html .= '<th width="8%">&nbsp;</th>';
//                        $html .= '<th width="8%">&nbsp;</th>';
//                        $html .= '<th width="8%">&nbsp;</th>';
//                        $html .= '<th width="8%">&nbsp;</th>';
//                        $html .= '<th width="8%">&nbsp;</th>';
                        $html .= '<th width="8%" class="border">'.$noidung->khachsan_tongthanhtien_miennam.'</th>';
                        $html .= '<th width="8%" class="border">&nbsp;</th>'; 
                        $html .= '<th width="8%" class="border">'.$noidung->khachsan_tongthue_miennam.'</th>';
                    $html .= '</tr>';
                    $html .= '</tbody>';
                    $html .= '</table>';
                    $html .= '</fieldset>';
                }
                
                $html .= '</td></tr>'; 
                    $html .= '<tr>';                    
                    $html .= '<th width="76%" colspan="9" class="border">TỔNG CỘNG</th>';
//                    $html .= '<th width="8%">&nbsp;</th>';
//                    $html .= '<th width="8%">&nbsp;</th>';
//                    $html .= '<th width="8%">&nbsp;</th>';
//                    $html .= '<th width="8%">&nbsp;</th>';
//                    $html .= '<th width="8%">&nbsp;</th>';
//                    $html .= '<th width="8%">&nbsp;</th>';
//                    $html .= '<th width="8%">&nbsp;</th>';
//                    $html .= '<th width="8%">&nbsp;</th>';
                    $html .= '<th width="8%" class="border">'.$noidung->khachsan_tongthanhtien.'</th>';
                    $html .= '<th width="8%" class="border">&nbsp;</th>'; 
                    $html .= '<th width="8%" class="border">'.$noidung->khachsan_tongthue.'</th>';
                    $html .= '</tr>';
                $html .= '</tbody>';
                $html .= '</table> </fieldset>';
                // ket thuc phan khach san
                
                // loading van chuyen 
                $html .= '<fieldset>';
                $html .= '<legend> <h3>VẬN CHUYỂN</h3></legend>';
                $html .= '<table width="100%" class="tabDetailView" id="vanchuyen" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '</thead>';
                $html .= '<tbody>';
                // lấy danh sách vận chuyển ở miền bắc
                $html .= '<tr><td colspan="7">';
                $vanchuyen_mienbac = $noidung->vanchuyen_mienbac;
                if(count($vanchuyen_mienbac)>0){
                    $html .= '<fieldset >';
                    $html .= '<legend><h3>MIỀN BẮC</h3></legend>';
                    $html .= '<table width="100%" class="tabDetailView" id="vanchuyen_mienbac" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                    $html .= '<thead>';
                    $html .= '<tr>';
                        $html .= '<td width="20%" class="border"><b>Lọai xe</b></td>';
                        $html .= '<th width="20%" class="border">Đơn giá</th>';
                        $html .= '<th width="10%" class="border">Số lượng</th>';
                        $html .= '<th width="10%" class="border">Ngày/Giờ/Km</th>';
//                        $html .= '<th width="10%">FOC</th>';
                        $html .= '<th width="10%" class="border">Thành tiền</th>';
                        $html .= '<th width="10%" class="border">Thuế suất</th>';
                        $html .= '<th width="20%" class="border">Thuế</th>';
                    $html .= '</tr>';
                    $html .= '</thead>';
                    $html .= '<tbody>';
                    foreach($vanchuyen_mienbac as $vcValMB){
                            $html .= '<tr>';
                                $html .= '<td width="20%" class="border"><a target="blank" href="index.php?module=Cars&action=DetailView&record='.$vcValMB->vanchuyen_name_mb.'"><b>'.translate( 'list_vanchuyen_dom_north','',$vcValMB->vanchuyen_name_mb).'</b></a></td>';
                                if(!empty($vcValMB->dongia_option_mb)){
                                    $html .= '<td width="20%" class="tabDetailViewDF border">'.$vcValMB->vanchuyen_dongia_mb.' '.translate('vanchuyen_dongia_option','',$vcValMB->dongia_option_mb) .'</td>';
                                }
                                else{
                                    $html .= '<td width="20%" class="tabDetailViewDF border">'.$vcValMB->vanchuyen_dongia_mb.' '.translate('vanchuyen_dongia_option','','') .'</td>';                                    
                                }
                                $html .= '<td width="10%" class="tabDetailViewDF border">'.$vcValMB->vanchuyen_soluong_mb.'</td>';
                                $html .= '<td width="10%" class="tabDetailViewDF border">'.$vcValMB->vanchuyen_songay_mb.'</td>';
//                                $html .= '<td width="10%" class="tabDetailViewDF">'.$vcValMB->vanchuyen_foc_mb.'</td>';
                                $html .= '<td width="10%" class="tabDetailViewDF border">'.$vcValMB->vanchuyen_thanhtien_mb.'</td>';
                                $html .= '<td width="10%" class="tabDetailViewDF border">'.$vcValMB->vanchuyen_thuesuat_mb.'</td>';
                                $html .= '<td width="20%" class="tabDetailViewDF border">'.$vcValMB->vanchuyen_vat_mb.'</td>';
                            $html .= '</tr> ';
                            $vc_mb++;             
                    }
                    $html .= '<tr>';
                        $html .= '<th width="60%" colspan="4" class="border"><b>Tổng cộng</b></th>';
//                        $html .= '<th width="20%">&nbsp;</th>';
//                        $html .= '<th width="10%">&nbsp;</th>';
//                        $html .= '<th width="10%">&nbsp;</th>';
//                        $html .= '<th width="10%">&nbsp;</th>';
                        $html .= '<th width="10%" class="border">'.$noidung->vanchuyen_tongthanhtien_mienbac.'</th>';
                        $html .= '<th width="10%" class="border">&nbsp;</th>';
                        $html .= '<th width="20%" class="border">'.$noidung->vanchuyen_tongthue_mienbac.'</th>';
                    $html .= '</tr>';
                    $html .='</tbody></table></fieldset>';
                }
                    $html .= '</td></tr>';
                // lấy danh sách vận chuyển ở miền trung
                $html .= '<tr><td colspan="7">';
                $vanchuyen_mientrung = $noidung->vanchuyen_mientrung;
                if(count($vanchuyen_mientrung)>0){
                $html .= '<fieldset >';
                $html .= '<legend><h3>MIỀN TRUNG</h3></legend>';
                $html .= '<table width="100%" class="tabDetailView" id="vanchuyen_mientrung" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<td width="20%" class="border"><b>Lọai xe</b></td>';
                    $html .= '<th width="20%" class="border">Đơn giá</th>';
                    $html .= '<th width="10%" class="border">Số lượng</th>';
                    $html .= '<th width="10%" class="border">Ngày/Giờ/Km</th>';
//                    $html .= '<th width="10%">FOC</th>';
                    $html .= '<th width="10%" class="border">Thành tiền</th>';
                    $html .= '<th width="10%" class="border">Thuế suất</th>';
                    $html .= '<th width="20%" class="border">Thuế</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                $vc_mt = 0;
                foreach($vanchuyen_mientrung as $vcValMT){
                        $html .= '<tr>';
                            $html .= '<td width="20%" class="border"><a target="blank" href="index.php?module=Cars&action=DetailView&record='.$vcValMT->vanchuyen_name_mt.'"><b>'.translate( 'list_vanchuyen_dom_middle','',$vcValMT->vanchuyen_name_mt).'</b></a></td>';
                            if(!empty($vcValMT->dongia_option_mt)){
                                $html .= '<td width="20%" class="tabDetailViewDF border">'.$vcValMT->vanchuyen_dongia_mt.' '.translate('vanchuyen_dongia_option','',$vcValMT->dongia_option_mt) .'</td>';
                            }
                            else{
                                $html .= '<td width="20%" class="tabDetailViewDF border">'.$vcValMT->vanchuyen_dongia_mt.' '.translate('vanchuyen_dongia_option','','') .'</td>';
                            }
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$vcValMT->vanchuyen_soluong_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$vcValMT->vanchuyen_songay_mt.'</td>';
//                            $html .= '<td width="10%" class="tabDetailViewDF">'.$vcValMT->vanchuyen_foc_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$vcValMT->vanchuyen_thanhtien_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$vcValMT->vanchuyen_thuexuat_mt.'</td>';
                            $html .= '<td width="20%" class="tabDetailViewDF border">'.$vcValMT->vanchuyen_vat_mt.'</td>';
                        $html .= '</tr> ';
                        $vc_mt++;             
                }
                $html .= '<tr>';
                    $html .= '<th width="60%" colspan="4" class="border"><b>Tổng cộng</b></th>';
//                    $html .= '<th width="20%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%" class="border">'.$noidung->vanchuyen_tongthanhtien_mientrung.'</th>';
                    $html .= '<th width="10%" class="border">&nbsp;</th>';
                    $html .= '<th width="20%" class="border">'.$noidung->vanchuyen_tongthue_mientrung.'</th>';
                $html .= '</tr>';
                $html .= '</tbody></table></fieldset>';
                }
                $htnl .= '</td></tr>';
                // lấy danh sách vận chuyển ở miền nam
                $vanchuyen_miennam = $noidung->vanchuyen_miennam;
                if(count($vanchuyen_miennam)>0){
                $html .= '<tr><td colspan="7">';
                $html .= '<fieldset >';
                $html .= '<legend><h3>MIỀN NAM</h3></legend>';
                $html .= '<table width="100%" class="tabDetailView" id="vanchuyen_miennam" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<td width="20%" class="border"><b>Lọai xe</b></td>';
                    $html .= '<th width="20%" class="border">Đơn giá</th>';
                    $html .= '<th width="10%" class="border">Số lượng</th>';
                    $html .= '<th width="10%" class="border">Ngày/Giờ/Km</th>';
//                    $html .= '<th width="10%">FOC</th>';
                    $html .= '<th width="10%" class="border">Thành tiền</th>';
                    $html .= '<th width="10%" class="border">Thuế suất</th>';
                    $html .= '<th width="20%" class="border">Thuế</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                foreach($vanchuyen_miennam as $vcValMN){
                        $html .= '<tr>';
                            $html .= '<td width="20%" class="border"><a target="blank" href="index.php?module=Cars&action=DetailView&record='.$vcValMN->vanchuyen_name_mn.'"><b>'.translate( 'list_vanchuyen_dom_south','',$vcValMN->vanchuyen_name_mn).'</b></a></td>';
                            if(!empty($vcValMN->dongia_option_mn)){
                                $html .= '<td width="20%" class="tabDetailViewDF border">'.$vcValMN->vanchuyen_dongia_mn.' '.translate('vanchuyen_dongia_option','',$vcValMN->dongia_option_mn) .'</td>';
                            }
                            else{
                               $html .= '<td width="20%" class="tabDetailViewDF border">'.$vcValMN->vanchuyen_dongia_mn.' '.translate('vanchuyen_dongia_option','','') .'</td>'; 
                            }
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$vcValMN->vanchuyen_soluong_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$vcValMN->vanchuyen_songay_mn.'</td>';
//                            $html .= '<td width="10%" class="tabDetailViewDF">'.$vcValMN->vanchuyen_foc_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$vcValMN->vanchuyen_thanhtien_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$vcValMN->vanchuyen_thuexuat_mn.'</td>';
                            $html .= '<td width="20%" class="tabDetailViewDF border">'.$vcValMN->vanchuyen_vat_mn.'</td>';
                        $html .= '</tr> ';
                    }
                $html .= '<tr>';
                    $html .= '<th width="60%" colspan="4" class="border"><b>Tổng cộng</b></th>';
//                    $html .= '<th width="20%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%" class="border">'.$noidung->vanchuyen_tongthanhtien_miennam .'</th>';
                    $html .= '<th width="10%" class="border">&nbsp;</th>';
                    $html .= '<th width="20%" class="border">'.$noidung->vanchuyen_tongthue_miennam.'</th>';
                $html .= '</tr>';
                $html .= '</tbody></table></fieldset>';
                }
                $html .='</td></tr>';
                $html .= '<tr>';
                    $html .= '<th width="60%" class="border" colspan="4">TỔNG CỘNG</th>';
//                    $html .= '<th width="20%">&nbsp;</th>';
//                    $html .= '<th width="10%" >&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%" class="border">'.$noidung->vanchuyen_tongthanhtien.'</th>';
                    $html .= '<th width="10%" class="border">&nbsp;</th>';
                    $html .= '<th width="20%" class="border">'.$noidung->vanchuyen_tongthue.'</th>';
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
                $html .= '<table width="100%" class="tabDetailView" border="0" id="dichvu" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
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
                    $html .= '<td width="23%" class="border"><b>Loại dịch vụ</b></td>';
                    $html .= '<th width="11%" class="border">Đơn giá</th>';
                    $html .= '<th width="11%" class="border">Số lượng</th>';
                    $html .= '<th width="11%" class="border">Số ngày</th>';
                    $html .= '<th width="11%" class="border">FOC</th>';
                    $html .= '<th width="11%" class="border">Thành tiền</th>';
                    $html .= '<th width="11%" class="border">Thuế suất</th>';
                    $html .= '<th width="11%" class="border">Thuế</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                foreach($dichvu_mienbac as $svValMB){
                    $html .= '<tr>';
                        $html .= '<td width="23%" class="border"><a target="blank" href="index.php?module=Services&action=DetailView&record='.$svValMB->services_name_mb.'">'.translate('list_dichvu_dom_north','',$svValMB->services_name_mb).'</a> </td>';
                        $html .= '<td width="11%" class="tabDetailViewDF border">'.$svValMB->services_dongia_mb.'</td>';
                        $html .= '<td width="11%" class="tabDetailViewDF border">'.$svValMB->services_soluong_mb.'</td>';
                        $html .= '<td width="11%" class="tabDetailViewDF border">'.$svValMB->services_songay_mb.'</td>';
                        $html .= '<td width="11%" class="tabDetailViewDF border">'.$svValMB->services_foc_mb.'</td>';
                        $html .= '<td width="11%" class="tabDetailViewDF border">'.$svValMB->services_thanhtien_mb.'</td>';
                        $html .= '<td width="11%" class="tabDetailViewDF border">'.$svValMB->services_thuexuat_mb.'</td>';
                        $html .= '<td width="11%" class="tabDetailViewDF border">'.$svValMB->services_vat_mb.'</td>';
                    $html .= '</tr> ';
                }
                $html .= '<tr>';
                    $html .= '<th width="67%" class="border" colspan="5">Tổng cộng</th>';
//                    $html .= '<th width="11%">&nbsp;</th>';
//                    $html .= '<th width="11%">&nbsp;</th>';
//                    $html .= '<th width="11%">&nbsp;</th>';
//                    $html .= '<th width="11%">&nbsp;</th>';
                    $html .= '<th width="11%" class="border">'.$noidung->service_tongthanhtien_mienbac.'</th>';
                    $html .= '<th width="11%" class="border">&nbsp;</th>';
                    $html .= '<th width="11%" class="border">'.$noidung->service_tongthue_mienbac.'</th>';
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
                    $html .= '<td width="23%" class="border"><b>Loại dịch vụ</b></td>';
                    $html .= '<th width="11%" class="border">Đơn giá</th>';
                    $html .= '<th width="11%" class="border">Số lượng</th>';
                    $html .= '<th width="11%" class="border">Số ngày</th>';
                    $html .= '<th width="11%" class="border">FOC</th>';
                    $html .= '<th width="11%" class="border">Thành tiền</th>';
                    $html .= '<th width="11%" class="border">Thuế suất</th>';
                    $html .= '<th width="11%" class="border">Thuế</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $dv_mt = 0;
                foreach($dichvu_mientrung as $svValMT){
                    $html .= '<tr>';
                        $html .= '<td width="23%" class="border"><a target="blank" href="index.php?module=Services&action=DetailView&record='.$svValMT->services_name_mt.'">'.translate('list_dichvu_dom_middle','',$svValMT->services_name_mt).' </a></td>';
                        $html .= '<td width="11%" class="tabDetailViewDF border">'.$svValMT->services_dongia_mt.'</td>';
                        $html .= '<td width="11%" class="tabDetailViewDF border">'.$svValMT->services_soluong_mt.'</td>';
                        $html .= '<td width="11%" class="tabDetailViewDF border">'.$svValMT->services_songay_mt.'</td>';
                        $html .= '<td width="11%" class="tabDetailViewDF border">'.$svValMT->services_foc_mt.'</td>';
                        $html .= '<td width="11%" class="tabDetailViewDF border">'.$svValMT->services_thanhtien_mt.'</td>';
                        $html .= '<td width="11%" class="tabDetailViewDF border">'.$svValMT->services_thuexuat_mt.'</td>';
                        $html .= '<td width="11%" class="tabDetailViewDF border">'.$svValMT->services_vat_mt.'</td>';
                    $html .= '</tr> ';
                    $dv_mt ++;               
                }
                $html .= '<tr>';
                    $html .= '<th width="67%" class="border" colspan="5"><b>Tổng cộng</b></th>';
//                    $html .= '<th width="11%">&nbsp;</th>';
//                    $html .= '<th width="11%">&nbsp;</th>';
//                    $html .= '<th width="11%">&nbsp;</th>';
//                    $html .= '<th width="11%">&nbsp;</th>';
                    $html .= '<th width="11%" class="border">'.$noidung->service_tongthanhtien_mientrung.'</th>';
                    $html .= '<th width="11%" class="border">&nbsp;</th>';
                    $html .= '<th width="11%" class="border">'.$noidung->service_tongthue_mientrung.'</th>';
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
                    $html .= '<td width="23%" class="border"><b>Loại dịch vụ</b></td>';
                    $html .= '<th width="11%" class="border">Đơn giá</th>';
                    $html .= '<th width="11%" class="border">Số lượng</th>';
                    $html .= '<th width="11%" class="border">Số ngày</th>';
                    $html .= '<th width="11%" class="border">FOC</th>';
                    $html .= '<th width="11%" class="border">Thành tiền</th>';
                    $html .= '<th width="11%" class="border">Thuế suất</th>';
                    $html .= '<th width="11%">Thuế</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                foreach($dichvu_miennam as $svValMN){
                        $html .= '<tr>';
                            $html .= '<td width="23%" class="border"><a target="blank" href="index.php?module=Services&action=DetailView&record='.$svValMN->services_name_mn.'">'.translate('list_dichvu_dom_south','',$svValMN->services_name_mn).'</a></td>';
                            $html .= '<td width="11%" class="tabDetailViewDF border">'.$svValMN->services_dongia_mn.'</td>';
                            $html .= '<td width="11%" class="tabDetailViewDF border">'.$svValMN->services_soluong_mn.'</td>';
                            $html .= '<td width="11%" class="tabDetailViewDF border">'.$svValMN->services_songay_mn.'</td>';
                            $html .= '<td width="11%" class="tabDetailViewDF border">'.$svValMN->services_foc_mn.'</td>';
                            $html .= '<td width="11%" class="tabDetailViewDF border">'.$svValMN->services_thanhtien_mn.'</td>';
                            $html .= '<td width="11%" class="tabDetailViewDF border">'.$svValMN->services_thuexuat_mn.'</td>';
                            $html .= '<td width="11%" class="tabDetailViewDF border">'.$svValMN->services_vat_mn.'</td>';
                        $html .= '</tr> ';
                    }
                    $html .= '<tr>';
                        $html .= '<th width="67%" class="border" colspan="5"><b>Tổng cộng</b></th>';
//                        $html .= '<th width="11%">&nbsp;</th>';
//                        $html .= '<th width="11%">&nbsp;</th>';
//                        $html .= '<th width="11%">&nbsp;</th>';
//                        $html .= '<th width="11%">&nbsp;</th>';
                        $html .= '<th width="11%" class="border">'.$noidung->service_tongthanhtien_miennam.'</th>';
                        $html .= '<th width="11%" class="border">&nbsp;</th>';
                        $html .= '<th width="11%" class="border">'.$noidung->service_tongthue_miennam.'</th>';
                    $html .= '</tr>';
                $html .= '</tbody></table></fieldset>';
                }
                $html .= '</td></tr>';
                $html .= '<tr>';
                    $html .= '<td width="67%" class="border" colspan="5"><b>TỔNG CỘNG<b></td>';
//                    $html .= '<th width="11%">&nbsp;</th>';
//                    $html .= '<th width="11%">&nbsp;</th>';
//                    $html .= '<th width="11%">&nbsp;</th>';
//                    $html .= '<th width="11%">&nbsp;</th>';
                    $html .= '<th width="11%" class="border">'.$noidung->service_tongthanhtien.'</th>';
                    $html .= '<th width="11%" class="border">&nbsp;</th>';
                    $html .= '<th width="11%" class="border">'.$noidung->service_tongthue.'</th>';
                $html .= '</tr>';
                $html .= '</tbody>';
                $html .= '</table> </fieldset>';
            }
            
            // ket thuc phan dich vu
            
            // phan du lieu tham quan
                $html .= '<fieldset>';
                $html .= '<legend> <h3>THAM QUAN</h3></legend>';
                $html .= '<table width="100%" border="1" class="tabDetailView" id="thamquan" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<tbody>';
                // lấy danh sách tham quan tại miền bắc
                $html .= '<tr><td colspan="9">';
                $thamquan_mienbac = $noidung->thamquan_mienbac;
                if(count($thamquan_mienbac)>0){
                $html .= '<fieldset >';
                $html .= '<legend><h3>MIỀN BẮC</h3></legend>';
                $html .= '<table width="100%" class="tabDetailView" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<td width="20%" class="border"><b>Địa điểm tham quan</b></td>';
                    $html .= '<th width="10%" class="border">Đơn giá NL</th>';
                    $html .= '<th width="10%" class="border">Số lượng NL</th>';
                    $html .= '<th width="10%" class="border">Đơn giá TE</th>';
                    $html .= '<th width="10%" class="border">Số lượng TE</th>';
                    $html .= '<th width="10%" class="border">Số Lần/Lượt</th>';
//                    $html .= '<th>FOC</th>';
                    $html .= '<th width="10%" class="border">Thành tiền</th>';
                    $html .= '<th width="10%" class="border">Thuế suất</th>';
                    $html .= '<th width="10%" class="border">Thuế</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                       foreach($thamquan_mienbac as $tqValMB){
                        $html .= '<tr>';
                            $html .= '<td width="20%" class="border"><a target="blank" href="index.php?module=Locations&action=DetailView&record='.$tqValMB->thamquan_name_mb.'">'.translate('list_thamquan_dom_north','',$tqValMB->thamquan_name_mb).'</a> </td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$tqValMB->thamquan_gianguoilon_mb.' </td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$tqValMB->thamquan_soluongnguoilon_mb.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$tqValMB->thamquan_dongiatreem_mb.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$tqValMB->thamquan_soluongtreem_mb.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$tqValMB->thamquan_songay_mb.'</td>';
//                            $html .= '<td width="10%" class="tabDetailViewDF">'.$tqValMB->thamquan_foc_mb.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$tqValMB->thamquan_thanhtien_mb.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$tqValMB->thamquan_thuesuat_mb.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$tqValMB->thamquan_vat_mb.'</td>';
                        $html .= '</tr> '; 
                    }
                $html .= '<tr>';
                    $html .= '<th width="70%" colspan="6" class="border"><b>Tổng cộng</b></th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%" class="border">'.$noidung->thamquan_tongthanhtien_mienbac.'</th>';
                    $html .= '<th width="10%" class="border">&nbsp;</th>';
                    $html .= '<th width="10%" class="border">'.$noidung->thamquan_tongthue_mienbac.'</th>';
                $html .= '</tr>';
                $html .= '</tbody></table></fieldset>';
                }
                $html .= '</td></tr>';
                //  lấy danh sách tham quan tại miền trung
            
                $html .= '<tr><td colspan="9">';
                $thamquan_mientrung = $noidung->thamquan_mientrung;
                if(count($thamquan_mientrung)>0){
                $html .= '<fieldset >';
                $html .= '<legend><h3>MIỀN TRUNG</h3></legend>';
                $html .= '<table width="100%" id="thamquan_mientrung" border="1" class="tabDetailView" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<td width="20%" class="border"><b>Địa điểm tham quan</b></td>';
                    $html .= '<th width="10%" class="border">Đơn giá NL</th>';
                    $html .= '<th width="10%" class="border">Số lượng NL</th>';
                    $html .= '<th width="10%" class="border">Đơn giá TE</th>';
                    $html .= '<th width="10%" class="border">Số lượng TE</th>';
                    $html .= '<th width="10%" class="border">Số Lần/Lượt</th>';
//                    $html .= '<th>FOC</th>';
                    $html .= '<th width="10%" class="border">Thành tiền</th>';
                    $html .= '<th width="10%" class="border">Thuế suất</th>';
                    $html .= '<th width="10%" class="border">Thuế</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                $tq_mt = 0;
                foreach($thamquan_mientrung as $tqValMT){
                        $html .= '<tr>';
                            $html .= '<td width="20%" class="border"><a target="blank" href="index.php?module=Locations&action=DetailView&record='.$tqValMT->thamquan_name_mt.'">'.translate('list_thamquan_dom_middle','',$tqValMT->thamquan_name_mt).'</a></td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$tqValMT->thamquan_gianguoilon_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$tqValMT->thamquan_soluongnguoilon_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$tqValMT->thamquan_dongiatreem_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$tqValMT->thamquan_soluongtreem_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$tqValMT->thamquan_songay_mt.'</td>';
//                            $html .= '<td width="10%" class="tabDetailViewDF">'.$tqValMT->thamquan_foc_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$tqValMT->thamquan_thanhtien_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$tqValMT->thamquan_thuesuat_mt.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$tqValMT->thamquan_vat_mt.'</td>';
                        $html .= '</tr> ';  
                        $tq_mt++;              
                    }
                $html .= '<tr>';
                    $html .= '<th width="70%" class="border" colspan="6"><b>Tổng cộng</b></th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%" class="border">'.$noidung->thamquan_tongthanhtien_mientrung.'</th>';
                    $html .= '<th width="10%" class="border">&nbsp;</th>';
                    $html .= '<th width="10%" class="border">'.$noidung->thamquan_tongthue_mientrung.'</th>';
                $html .= '</tr>';
                $html .= '</tbody></table></fieldset>';
                }
                $html .= '</td></tr>';
                /// lấy danh sách tham quan tại miền nam
                
                $html .= '<tr><td colspan="9">';
                $thamquan_miennam = $noidung->thamquan_miennam;
                if(count($thamquan_miennam)>0){
                $html .= '<fieldset >';
                $html .= '<legend><h3>MIỀN NAM</h3></legend>';
                $html .= '<table width="100%" class="tabDetailView" id="thamquan_miennam" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<td width="20%" class="border"><b>Địa điểm tham quan</b></td>';
                    $html .= '<th width="10%" class="border">Đơn giá NL</th>';
                    $html .= '<th width="10%" class="border">Số lượng NL</th>';
                    $html .= '<th width="10%" class="border">Đơn giá TE</th>';
                    $html .= '<th width="10%" class="border">Số lượng TE</th>';
                    $html .= '<th width="10%" class="border">Số Lần/Lượt</th>';
//                    $html .= '<th>FOC</th>';
                    $html .= '<th width="10%" class="border">Thành tiền</th>';
                    $html .= '<th width="10%" class="border">Thuế suất</th>';
                    $html .= '<th width="10%" class="border">Thuế</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                foreach($thamquan_miennam as $tqValMN){
                        $html .= '<tr class="border">';
                            $html .= '<td width="20%" class="border"><a target="blank" href="index.php?module=Locations&action=DetailView&record='.$tqValMN->thamquan_name_mn.'">'.translate('list_thamquan_dom_south','',$tqValMN->thamquan_name_mn).'</a></td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$tqValMN->thamquan_gianguoilon_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$tqValMN->thamquan_soluongnguoilon_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$tqValMN->thamquan_dongiatreem_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$tqValMN->thamquan_soluongtreem_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$tqValMN->thamquan_songay_mn.'</td>';
//                            $html .= '<td width="10%" class="tabDetailViewDF">'.$tqValMN->thamquan_foc_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$tqValMN->thamquan_thanhtien_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$tqValMN->thamquan_thuesuat_mn.'</td>';
                            $html .= '<td width="10%" class="tabDetailViewDF border">'.$tqValMN->thamquan_vat_mn.'</td>';
                        $html .= '</tr> ';  
                    }
                $html .= '<tr>';
                    $html .= '<th width="70%" colspan="6" class="border"><b>Tổng cộng</b></th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%" class="border">'.$noidung->thamquan_tongthanhtien_miennam.'</th>';
                    $html .= '<th width="10%" class="border">&nbsp;</th>';
                    $html .= '<th width="10%" class="border">'.$noidung->thamquan_tongthue_mienam.'</th>';
                $html .= '</tr>';
                $html .= '</tbody></table></fieldset>';
                }
                $html .= '</td></tr>';
                $html .= '<tr>';
                    $html .= '<th width="70%" class="border" colspan="6"><b>TỔNG CỘNG</b></th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
//                    $html .= '<th width="10%">&nbsp;</th>';
                    $html .= '<th width="10%" class="border">'.$noidung->thamquan_tongthanhtien.'</th>';
                    $html .= '<th width="10%" class="border">&nbsp;</th>';
                    $html .= '<th width="10%" class="border">'.$noidung->thamquan_tongthue.'</th>';
                $html .= '</tr>';
                $html .= '</body>';
                $html .= '</table> </fieldset>';
                // CHI PHI HUONG DAN VIEN
                
                
                $html .= '<fieldset>';
                $html .= '<legend><h3>CHI PHÍ HDV + LÁI XE</h3></legend> ';
                $html .= '<table class="tabDetailView" width="100%" cellpadding="0" cellspacing="0" border="1" style="border-collapse:collapse">';
                    $html .= '<tr>';
                        $html .= '<td colspan="6"> ';
                        $huongdanvienmb = $noidung->huongdanvienmb;  
                        if(count($huongdanvienmb)>0){
                        $html .= '<fieldset>';
                        $html .= '<legend><h4>Miền bắc</h4></legend>';
                            $html .= '<table class="tabDetaiView" id="cphdv_mb" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">';
                                $html .= '<thead>';
                                    $html .= '<tr>  ';
                                        $html .= '<td width="22%" class="border"><b>Loại chí phí</b></td>';
                                        $html .= '<td width="13%" class="tabDetailViewDF border"><b>Số lượng</b></td> ';
                                        $html .= '<td width="13%" class="tabDetailViewDF border"><b>Đơn giá</b></td> ';
                                        $html .= '<td width="13%" class="tabDetailViewDF border"><b>Số đêm/lần</b></td> ';
                                        $html .= '<td width="13%" class="tabDetailViewDF border"><b>Thành tiền</b></td> ';
                                        $html .= '<td width="13%" class="tabDetailViewDF border"><b>Thuế suất</b></td> ';
                                        $html .= '<td width="13%" class="tabDetailViewDF border"><b>Thuế</b></td>';
                                    $html .= '</tr> ';
                                    
                                $html .= '</thead> ';
                                $html .= '<tbody> ';
                                            foreach ($huongdanvienmb as $val){
                                                $html .= '<tr>';
                                                    $html .= '<td width="22%" class="border">'.$val->loaichiphi.'</td>';
                                                    $html .= '<td width="13%" class="tabDetailViewDF border">'.$val->soluong.'</td>';
                                                    $html .= '<td width="13%" class="tabDetailViewDF border">'.$val->dongia.'</td>';
                                                    $html .= '<td width="13%" class="tabDetailViewDF border">'.$val->solan.'</td>';
                                                    $html .= '<td width="13%" class="tabDetailViewDF border">'.$val->thanhtien.'</td>';
                                                    $html .= '<td width="13%" class="tabDetailViewDF border">'.$val->thuesuat.'</td>';
                                                    $html .= '<td width="13%" class="tabDetailViewDF border">'.$val->vat.'</td>';
                                                $html .= '</tr>';
                                            }
                                            
                                  $html .= '<tr> ';
                                        $html .= '<td width="64%" colspan="4" class="border"><b>Tổng cộng</b></td>';
//                                        $html .= '<td width="16%">&nbsp;</td>';
//                                        $html .= '<td width="16%">&nbsp;</td> ';
                                        $html .= '<td width="13%" class="tabDetailViewDF border"><b>'.$noidung->tongchi_hvd_mb.'</b></td> ';
                                        $html .= '<td width="13%" class="border">&nbsp;</td> ';
                                        $html .= '<td width="13%" class="tabDetailViewDF border"><b>'.$noidung->tongthue_hvd_mb.'</b></td>';
                                    $html .= '</tr>  ';
                                    
                                $html .= '</tbody> ';
                            $html .= '</table>';
                            $html .= '</fieldset>';
                        }
                        $html .= '</td> ';
                    $html .= '</tr> ';
                    $html .= '<tr> ';
                        $html .= '<td colspan="6"> ';
                        $huongdanvienmt = $noidung->huongdanvienmt;
                        if(count($huongdanvienmt)>0){
                        $html .= '<fieldset> ';
                        $html .= '<legend><h4>Miền trung</h4></legend> ';
                            $html .= '<table class="tabDetaiView" id="cphdv_mb" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">';
                               $html .= '<thead> ';
                                    $html .= '<tr>';
                                        $html .= '<td width="22%" class="border"><b>Loại chí phí</b></td> ';
                                        $html .= '<th width="13%" class="tabDetailViewDF border">Số lượng</th> ';
                                        $html .= '<th width="13%" class="tabDetailViewDF border">Đơn giá</th> ';
                                        $html .= '<th width="13%" class="tabDetailViewDF border">Số đêm/lần</th> ';
                                        $html .= '<th width="13%" class="tabDetailViewDF border">Thành tiền</th> ';
                                        $html .= '<th width="13%" class="tabDetailViewDF border">Thuế suất</th>';
                                        $html .= '<th width="13%" class="tabDetailViewDF border">Thuế</th>';
                                    $html .= '</tr> ';
                                $html .= '</thead>'; 
                                $html .= '<tbody>';
                                        foreach ($huongdanvienmt as $val){
                                                $html .= '<tr>';
                                                    $html .= '<td width="22%" class="border">'.$val->loaichiphi.'</td>';
                                                    $html .= '<td width="13%" class="tabDetailViewDF border">'.$val->soluong.'</td>';
                                                    $html .= '<td width="13%" class="tabDetailViewDF border">'.$val->dongia.'</td>';
                                                    $html .= '<td width="13%" class="tabDetailViewDF border">'.$val->solan.'</td>';
                                                    $html .= '<td width="13%" class="tabDetailViewDF border">'.$val->thanhtien.'</td>';
                                                    $html .= '<td width="13%" class="tabDetailViewDF border">'.$val->thuesuat.'</td>';
                                                    $html .= '<td width="13%" class="tabDetailViewDF border">'.$val->vat.'</td>';
                                                $html .= '</tr>';
                                            }
                                        $html .= '<tr>';
                                            $html .= '<td width="64%" colspan="4" class="border"><b>Tổng cộng</b></td>';
//                                            $html .= '<td width="16%" >&nbsp;</td>';
//                                            $html .= '<td width="16%">&nbsp;</td>';
                                            $html .= '<td width="13%" class="tabDetailViewDF border"><b>'.$noidung->tongchi_hvd_mt.'</b></td>';
                                            $html .= '<td width="13%" class="border">&nbsp;</td> ';
                                            $html .= '<td width="13%" class="tabDetailViewDF border"><b>'.$noidung->tongthue_hvd_mt.'</b></td>';
                                        $html .= '</tr>';
                                $html .= '</tbody>';
                            $html .= '</table>';
                            $html .= '</fieldset>';
                        }
                        $html .= '</td>';
                    $html .= '</tr>';
                    $html .= '<tr>';
                        $html .= '<td colspan="6"> ';
                        $huongdanvienmn = $noidung->huongdanvienmn;
                        if(count($huongdanvienmn)>0){
                        $html .= '<fieldset>';
                        $html .= '<legend><h4>Miền nam</h4></legend> ';
                            $html .= '<table class="tabDetailView" id="cphdv_mn" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">';
                                $html .= '<thead>';
                                    $html .= '<tr> ';
                                        $html .= '<td width="22%" class="border"><b>Loại chí phí</b></td>';
                                        $html .= '<th width="13%" class="tabDetailViewDF border">Số lượng</th> ';
                                        $html .= '<th width="13%" class="tabDetailViewDF border">Đơn giá</th>';
                                        $html .= '<th width="13%" class="tabDetailViewDF border">Số đêm/lần</th>';
                                        $html .= '<th width="13%" class="tabDetailViewDF border">Thành tiền</th>';
                                        $html .= '<th width="13%" class="tabDetailViewDF border">Thuế suất</th>';
                                        $html .= '<th width="13%" class="tabDetailViewDF border">Thuế</th> ';
                                    $html .= '</tr>';
                                $html .= '</thead>';  
                                $html .= '<tbody>';
                                        foreach ($huongdanvienmn as $val){
                                                $html .= '<tr>';
                                                    $html .= '<td width="22%" class="border">'.$val->loaichiphi.'</td>';
                                                    $html .= '<td width="13%" class="tabDetailViewDF border">'.$val->soluong.'</td>';
                                                    $html .= '<td width="13%" class="tabDetailViewDF border">'.$val->dongia.'</td>';
                                                    $html .= '<td width="13%" class="tabDetailViewDF border">'.$val->solan.'</td>';
                                                    $html .= '<td width="13%" class="tabDetailViewDF border">'.$val->thanhtien.'</td>';
                                                    $html .= '<td width="13%" class="tabDetailViewDF border">'.$val->thuesuat.'</td>';
                                                    $html .= '<td width="13%" class="tabDetailViewDF border">'.$val->vat.'</td>';
                                                $html .= '</tr>';
                                            }
                                        $html .= '<tr> ';
                                        $html .= '<td width="64%" colspan="4" class="border"><b>Tổng cộng</b></td>';
//                                        $html .= '<td width="16%">&nbsp;</td>';
//                                        $html .= '<td width="16%">&nbsp;</td> ';
                                        $html .= '<td width="13%" class="tabDetailViewDF border"><b>'.$noidung->tongchi_hvd_mn.'</b></td> ';
                                        $html .= '<td width="13%" class="border">&nbsp;</td>';
                                        $html .= '<td width="13%" class="tabDetailViewDF border"><b>'.$noidung->tongthue_hvd_mn.'</b></td>';
                                    $html .= '</tr>';
                                $html .= '</tbody>';
                            $html .= '</table>';
                            $html .= '</fieldset>';
                            }               
                        $html .= '</td>';
                    $html .= '</tr>';
                    $html .= '<tr> ';
                        $html .= '<td width="70%" class="border" colspan="3"><b>TỔNG CỘNG</b></td> ';  
//                        $html .= '<th width="16%">&nbsp;</th> ';  
//                        $html .= '<th width="16%">&nbsp;</th> ';  
                        $html .= '<th width="16%" class="border"><b>'.$noidung->tongchi_hvd.'</b></th> ';
                        $html .= '<th width="16%" class="border">&nbsp;</th> ';
                        $html .= '<th width="16%" class="border"><b>'.$noidung->tongthue_hvd.'</b></th>';
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
                                    $html .= '<td class="border"><b>Loại dịch vụ</b></td>  ';
                                    $html .= '<th class="border">Số lượng</th> ';
                                    $html .= '<th class="border">Đơn giá</th> ';
//                                    $html .= '<th>FOC</th> ';
                                    $html .= '<th class="border">Thành tiền</th>';
                                    $html .= '<th class="border">Thuế suất</th>';
                                    $html .= '<th class="border">Thuế</th>';
                                $html .= '</tr>';
                            $html .= '</thead>';
                            
                            $html .= '<tbody> ';
                                 foreach($chiphikhac as $chiphikhacval){
                                    $html .= '<tr>';
                                        $html .= '<td class="border">'.$chiphikhacval->chiphikhac_loaidichvu.'</td>'; 
                                        $html .= '<td class="tabDetailViewDF border">'.$chiphikhacval->chiphikhac_soluong.'</td>'; 
                                        $html .= '<td class="tabDetailViewDF border">'.$chiphikhacval->chiphikhac_dongia.'</td>'; 
//                                        $html .= '<td class="tabDetailViewDF">'.$chiphikhacval->chiphikhac_foc.'</td>'; 
                                        $html .= '<td class="tabDetailViewDF border">'.$chiphikhacval->chiphikhac_thanhtien.'</td>'; 
                                        $html .= '<td class="tabDetailViewDF border">'.$chiphikhacval->chiphikhac_thuesuat.'</td>'; 
                                        $html .= '<td class="tabDetailViewDF border">'.$chiphikhacval->chiphikhac_vat.'</td>'; 
                                    $html .= '</tr>'; 
                                 }
                             }
                             $html .= '<tr> ';
                                $html .= '<th colspan="3" class="border">Tổng cộng</th>';
//                                $html .= '<th class="tabDetailViewDF">&nbsp;</th>';
//                                $html .= '<th class="tabDetailViewDF border">&nbsp;</th>';
//                                $html .= '<th class="tabDetailViewDF">&nbsp;</th> ';
                                $html .= '<td class="tabDetailViewDF border"><b>'.$noidung->chiphikhac_tongcong.'</b></td>';
                                $html .= '<th class="tabDetailViewDF">&nbsp;</th>';
                                $html .= '<td class="tabDetailViewDF border"><b>'.$noidung->chiphikhac_tongthue.'</b></td>';
                             $html .= '</tr>';
                            $html .= '</tbody>';
                        $html .= '</table>';
                    $html .= '</fieldset>';
                    
                    $html .= '<fieldset>';
                    $html .= '<legend><h3>TỔNG CHI PHÍ</h3></legend>';
                    $html .= '<table cellpadding="0" cellspacing="0" border="1" class="tabDetailView" style="border-collapse: collapse;" width="100%">';
                    $html .= '<tr>';
                        $html .= '<td class="notcenter border"><b>TỔNG CỘNG</b></td> ';
                        $html .= '<td class="center border">'.$noidung->tongchiphi.'</td>';
                        $html .= '<td class="center border">'.$noidung->tongthue.'</td>';
                    $html .= '</tr>';
                 $html .= '</table>';
                 $html .= '</fieldset>';
                
                // PHẦN CÁC KHOẢN GIÁ BÁN CỦA CHIẾT TÍNH
                $html .= '<fieldset> ';
                    $html .= '<legend><h3>GIÁ BÁN</h3></legend>';
                    $html .= '<table cellpadding="0" class="tabDetailView" cellspacing="0" border="0" width="100%" style="border-collapse: collapse;">';
                        $html .= '<tr>';
                            $html .= '<th class="tabDetailViewDF border"><h4>GIÁ BÁN</h4></th>';
                            $html .= '<th class="tabDetailViewDF border"><h4>SỐ LƯỢNG</h4></th> ';
                            $html .= '<th class="tabDetailViewDF border"><h4>ĐƠN GIÁ</h4></th>';
                            $html .= '<th class="tabDetailViewDF border"><h4>FOC</h4></th>';
                            $html .= '<th class="tabDetailViewDF border"><h4>THÀNH TIỀN</h4></th>';
                            $html .= '<th class="tabDetailViewDF border"><h4>THUẾ SUẤT</h4></th> ';
                            $html .= '<th class="tabDetailViewDF border"><h4>THUẾ </h4></th>';
                        $html .= '</tr> ';
                        
                        $html .= '<tr> ';
                            $html .= '<td colspan="7" class="border"><h3>1) GIÁ CÓ VMB/TÀU HỎA</h3></td>';
                        $html .= '</tr> ';
                        
                        $html .= '<tr>';
                            $html .= '<td class="border">Khách người lớn</td>  ';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->sl_khach_nl_1.'</td> ';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->dg_khach_nl_1.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->foc_khach_nl_1.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->tt_khach_nl_1.'</td> ';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->ts_khach_nl_1.'</td> ';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->thue_khach_nl_1.'</td> ';
                        $html .= '</tr> ';
                        
                        $html .= '<tr>';
                            $html .= '<td class="border">Trẻ em từ 5-11 tuổi</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->sl_treem_1.'</td> ';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->dg_treem_1.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->foc_treem_1.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->tt_treem_1.'</td> ';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->ts_treem_1.'</td> ';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->thue_treem_1.'</td> ';
                        $html .= '</tr> ';
                        
                        $html .= '<tr> ';
                            $html .= '<td class="border">Phụ thu phòng đơn</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->sl_phuthuphongdon_1.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->dg_phuthuphongdon_1.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->foc_phuthuphongdon_1.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->tt_phuthuphongdon_1.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->ts_phuthuphongdon_1.'</td> ';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->thue_phuthuphongdon_1.'</td>';
                        $html .= '</tr>  ';
                        
                        $html .= '<tr>';
                            $html .= '<td class="border">Phụ thu khác</td> ';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->sl_phuthukhac_1.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->dg_phuthukhac_1.'</td> ';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->foc_phuthukhac_1.'</td> ';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->tt_phuthukhac_1.'</td> ';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->ts_phuthukhac_1.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->thue_phuthukhac_1.'<td> ';
                        $html .= '</tr>';
                        
                        $html .= '<tr>';
                            $html .= '<td colspan="7" class="border"><h3> 2) GIÁ KHÔNG CÓ VMB/TÀU HỎA</h3></td> ';
                        $html .= '</tr>';
                        
                        $html .= '<tr> ';
                            $html .= '<td class="border">Khách người lớn</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->sl_khach_nl_2.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->dg_khach_nl_2.'</td> ';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->foc_khach_nl_2.'</td> ';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->tt_khach_nl_2.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->ts_khach_nl_2.'</td> ';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->thue_khach_nl_2.'</td>';
                        $html .= '</tr>';
                        
                        $html .= '<tr>';
                            $html .= '<td class="border">Trẻ em từ 5-11 tuổi</td> ';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->sl_treem_2.'</td> ';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->dg_treem_2.'</td> ';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->foc_treem_2.'</td> ';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->tt_treem_2.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->ts_treem_2.'</td> ';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->thue_treem_2.'</td> ';
                        $html .= '</tr> ';
                        
                        $html .= '<tr> ';
                            $html .= '<td class="border">Phụ thu phòng đơn</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->sl_phuthuphongdon_2.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->dg_phuthuphongdon_2.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->foc_phuthuphongdon_2.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->tt_phuthuphongdon_2.'</td> ';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->ts_phuthuphongdon_2.'</td> ';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->thue_phuthuphongdon_2.'</td>';
                        $html .= '</tr>';
                        
                        $html .= '<tr> ';
                            $html .= '<td class="border">Phụ thu khác</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->sl_phuthukhac_2.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->dg_phuthukhac_2.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->foc_phuthukhac_2.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->tt_phuthukhac_2.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->ts_phuthukhac_2.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->thue_phuthukhac_2.'<td>';
                        $html .= '</tr>';
                        
                        $html .= '<tr>';
                            $html .= '<td colspan="7" class="border"><h3> 3) CHẾ ĐỘ MIỄN PHÍ F.O.C</h3></td>';
                        $html .= '</tr> ';
                        
                        $html .= '<tr>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->foc_option.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->sl_foc_16.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->dg_foc_16.'</td> ';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->foc_foc_16.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->tt_foc_16.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->ts_foc_16.'</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->thue_foc_16.'</td>';
                        $html .= '</tr> ';
                        
                        /*$html .= '<tr>';
                            $html .= '<td class="tabDetaiViewDL">FOC (với đoàn 10-15 người)</td> ';
                            $html .= '<td class="tabDetailViewDF"><input type="text" id="sl_treem_2" name="sl_foc_1015" value="{$sl_foc_1015}"></td>';
                            $html .= '<td class="tabDetailViewDF"><input class="center" type="text" id="dg_foc_1015" name="dg_foc_1015" value="{$dg_foc_1015}"></td> ';
                            $html .= '<td class="tabDetailViewDF"><input class="center" type="text" id="foc_foc_1015" name="foc_foc_1015" value="{$foc_foc_1015}"></td> ';
                            $html .= '<td class="tabDetailViewDF"><input class="center" type="text" id="tt_foc_1015" name="tt_foc_1015" value="{$tt_foc_1015}"></td>';
                            $html .= '<td class="tabDetailViewDF"><input class="center" type="text" id="ts_foc_1015" name="ts_foc_1015" value="{$ts_foc_1015}"></td> ';
                            $html .= '<td class="tabDetailViewDF"><input class="center" type="text" id="thue_foc_1015" name="thue_foc_1015" value="{$thue_foc_1015}"></td> ';
                        $html .= '</tr> ';
                        
                        $html .= '<tr>';
                            $html .= '<td class="tabDetaiViewDL">FOC (với đoàn dưới 10 người)</td>';
                            $html .= '<td class="tabDetailViewDF"><input type="text" id="sl_foc_10" name="sl_foc_10" value="{$sl_foc_10}"></td>';
                            $html .= '<td class="tabDetailViewDF"><input class="center" type="text" id="dg_foc_10" name="dg_foc_10" value="{$dg_foc_10}"></td>';
                            $html .= '<td class="tabDetailViewDF"><input class="center" type="text" id="foc_foc_10" name="foc_foc_10" value="{$foc_foc_10}"></td> ';
                            $html .= '<td class="tabDetailViewDF"><input class="center" type="text" id="tt_foc_10" name="tt_foc_10" value="{$tt_foc_10}"></td>';
                            $html .= '<td class="tabDetailViewDF"><input class="center" type="text" id="ts_foc_10" name="ts_foc_10" value="{$ts_foc_10}"></td>';
                            $html .= '<td class="tabDetailViewDF"><input class="center" type="text" id="thue_foc_10" name="thue_foc_10" value="{$thue_foc_10}"></td>';
                        $html .= '</tr>'; */
                        
                        $html .= '<tr>';
                            $html .= '<td class="border"><h3>TỔNG CỘNG</h3></td> ';
                            $html .= '<td class="tabDetailViewDF border">&nbsp;</td>';
                            $html .= '<td class="tabDetailViewDF border">&nbsp;</td>';
                            $html .= '<td class="tabDetailViewDF border">&nbsp;</td>';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->tongcong_giaban.'</td>';
                            $html .= '<td class="tabDetailViewDF border">&nbsp;</td> ';
                            $html .= '<td class="tabDetailViewDF border">'.$noidung->tongthue_giaban.'</td>';
                        $html .= '</tr>';
                        
                    $html .= '</table>';
                $html .= '</fieldset>';
                
                // KẾT THÚC PHẦN CÁC KHOẢN GIÁ BÁN -->  
                
                
               // <!-- BÁO CÁO CHI TIẾT-->
            $htmlReport .= '<fieldset> ';
                $htmlReport .= '<legend><h3>CHI TIẾT</h3></legend>  '; 
                $htmlReport .= '<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tabDetailView" style="border-collapse:collapse"> '; 
                    $htmlReport .= '<tr>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<th>DUYỆT</th>  '; 
                        $htmlReport .= '<td>&nbsp;</td>  '; 
                        $htmlReport .= '<td>&nbsp;</td> '; 
                        $htmlReport .= '<td width="15%" class="dataLabel border">VAT ĐẦU RA</td> '; 
                        $htmlReport .= '<td width="25%" class="right border"><b>'.$noidung->vatdaura.'</b></td> '; 
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
                        $htmlReport .= '<td width="15%" class="dataLabel border">VAT ĐẦU VÀO</td> '; 
                        $htmlReport .= '<td class="right border"><b>'.$noidung->vatdauvao.'</b></td> '; 
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
                        $htmlReport .= '<td width="15%" class="dataLabel border">VAT PHẢI ĐÓNG</td>  '; 
                        $htmlReport .= '<td width="25%" class="right border"><b>'.$noidung->vatphaidong.'</b></td> '; 
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
                        $htmlReport .= '<td width="15%" class="dataLabel border">DOANH THU</td>  '; 
                        $htmlReport .= '<td width="25%" class="right border"><b>'.$noidung->doanhthu.'</b></td> '; 
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
                        $htmlReport .= '<td width="15%" class="dataLabel border">TỔNG CHI PHÍ</td>  '; 
                        $htmlReport .= '<td width="25%" class="right border"><b>'.$noidung->tongchiphi1.'</b></td> '; 
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
                        $htmlReport .= '<td width="15%" class="dataLabel border">GIÁ VỐN/ 1 KHÁCH</td> '; 
                        $htmlReport .= '<td width="25%" class="right border"><b>'.$noidung->giavontrenkhach.'</b></td> '; 
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
                        $htmlReport .= '<td width="15%" class="notcenter dataLabel border">GIÁ BÁN/ 1 KHÁCH</td>  '; 
                        $htmlReport .= '<td width="25%" class="right border"><b>'.$noidung->giabantrenkhach.'</b></td>  '; 
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
                        $htmlReport .= '<td width="15%" class="dataLabel border">LÃI KHÁCH</td>  '; 
                        $htmlReport .= '<td width="25%" class="right border"><b>'.$noidung->laikhach.'</></td>   '; 
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
                        $htmlReport .= '<td width="15%" class="dataLabel border">TỔNG LÃI</td>  '; 
                        $htmlReport .= '<td width="25%" class="right border"><b>'.$noidung->tonglai.'</b></td>   '; 
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
                        $htmlReport .= '<td width="15%" class="dataLabel border">TỶ LỆ SAU THUẾ VAT</td>  '; 
                        $htmlReport .= '<td width="25%" class="right border"><b>'.$noidung->tylesauthuevat.'%</b></td>  '; 
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
                        $htmlReport .= '<td width="15%" class="notcenter dataLabel border">THUẾ TNDN</td>  '; 
                        $htmlReport .= '<td width="25%" class="right border"><b>'.$noidung->thuethunhapdn.'</b></td>'; 
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
                        $htmlReport .= '<td width="15%" class="notcenter dataLabel border">LÃI RÒNG (NETT PROFIT)</td>  '; 
                        $htmlReport .= '<td width="25%" class="right border"><b>'.$noidung->lairongnettprofit.'</b></td> '; 
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
                        $htmlReport .= '<td width="15%" class="border">TỶ LỆ SAU THUẾ TNDN</td>  '; 
                        $htmlReport .= '<td width="25%" class="right border"><b>'.$noidung->tylesauthuetndn.'%</b></td>   '; 
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
