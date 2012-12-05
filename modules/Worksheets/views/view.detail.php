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
            if($this->bean->type == 'Outbound' || $this->bean->type == 'Inbound'){
                unset($this->dv->defs['templateMeta']['form']['buttons'][3]);  
            }
            parent::display();
            echo '<script type="text/javascript">jQuery(document).ready(function(){
                jQuery("#overview").closest("td").prev("td").hide(); 
            }) </script>';
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
                $app_list_strings['list_vanchuyen_dom'][$arrtrans['id']] =$arrtrans['number_plates']; 
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
                $html .= '<script type="text/javascript">jQuery(document).ready(function(){
                    jQuery("#overview").closest("td").attr("colspan",4); 
                    jQuery("#report").closest("td").prev("td").remove();
                    jQuery("#report").closest("td").attr("colspan",4); 
                }) </script>';
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
                $html .= '<style>
                div#ib_content{
                    border-collapse: collapse;
                    margin: 10px auto;
                    border-radius: 5px;
                    border: 1px solid #ccc;
                    display: block;
                    padding:5px;
                    background:linear-gradient(center top , #FFFFFF 0px, #F2F2F2 100%) repeat scroll 0 0 transparent !important;
                }
                div#ib_content > fieldset{
                 border:none;
                } 
                table.table_content{
                    border:1px solid;
                    border-collapse:collapse;
                    margin: 10px auto;
                    display: block;
                    padding:5px;
                }
                table.table_content > tbody> tr >td{
                    border-bottom:1px solid #999 !important;
                    border-right:1px solid #999 !important;
                    border-collapse:collapse !important;
                    padding:2px;
                }

                </style>';
                
                $html .= '<script type="text/javascript">
                       jQuery(document).ready(function(){
                          jQuery(\'#content\').find(\'#ib_content\').css(\'width\',window.screen.availWidth-45);
                          jQuery(\'#content\').find(\'#ib_content\').css(\'height\',window.screen.height-350);
                          jQuery(\'#content\').find(\'#ib_content\').css(\'overflow\',\'scroll\');
                       });
                    </script>';
                if(!empty($this->bean->id)){
                    $html .= '<div id="ib_content">
                    <fieldset> <legend> <h2>DETAIL INFORMATION </h2></legend>
                    <table width="100%" border="1" style="border:1px; border-collapse:collapse" class="table_content" cellspacing="0">
                    <tbody>
                    <tr>
                    <td colspan="4" style="text-align:center; border-top:1px solid #999 ; border-left:1px solid #999">&nbsp;</td>
                    <td colspan="5" align="center" valign="middle" bgcolor="#FF33FF" class="dataLabel" style="text-align:center; border-top:1px solid #999 ; border-left:1px solid #999"><strong>1-2pax 4-seat</strong></td>
                    <td colspan="5" align="center" valign="middle" bgcolor="#FFFF99" class="dataLabel" style="text-align:center; border-top:1px solid #999 ; border-left:1px solid #999"><strong>3-4pax 7-seat</strong></td>
                    <td colspan="5" align="center" valign="middle" bgcolor="#99FFFF" class="dataLabel" style="text-align:center; border-top:1px solid #999 ; border-left:1px solid #999"><strong>5-7pax 16-seat</strong></td>
                    <td colspan="5" align="center" valign="middle" bgcolor="#9966FF" class="dataLabel" style="text-align:center; border-top:1px solid #999 ; border-left:1px solid #999"><strong>8-12pax 29seat</strong></td>
                    <td colspan="5" align="center" valign="middle" bgcolor="#999999" class="dataLabel" style="text-align:center; border-top:1px solid #999 ; border-left:1px solid #999"><strong>13-16pax 35seat</strong></td>
                    <td colspan="4" align="center" valign="middle" bgcolor="#999999" class="dataLabel" style="text-align:center; border-top:1px solid #999 ; border-left:1px solid #999"><strong>13-16pax 35seat (15+1FOC)</strong></td>
                    <td colspan="7" align="center" valign="middle" bgcolor="#33CCFF" class="dataLabel" style="text-align:center; border-top:1px solid #999 ; border-left:1px solid #999"><strong>17-30pax 45seat (30+2FOC)</strong></td>
                    <td rowspan="2" align="center" valign="middle" bgcolor="#FF0000" class="dataLabel" style="text-align:center; border-top:1px solid #999 ; border-left:1px solid #999"><strong>SGL Supp</strong></td>
                    <td rowspan="2" align="center" bgcolor="#FF0000" style="text-align:center; border-top:1px solid #999 ; border-left:1px solid #999"><strong>TAX Supp</strong></td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999"><b>SERVICE</b></td>
                    <td class="dataLabel"><b>Unite price</b></td>
                    <td class="dataLabel"><b>Quantity</b></td>
                    <td class="dataLabel"><b>Total Price</b></td>
                    <td bgcolor="#FF33FF"></td>
                    <td bgcolor="#FF33FF">'.$noidung->soluongkh1.'</td>
                    <td bgcolor="#FF33FF">'.$noidung->soluongkh2.'</td>
                    <td bgcolor="#FF33FF" class="dataLabel" style="text-align:center"><label id="tax1">Tax '.$noidung->soluongkh1.'</label></td>
                    <td bgcolor="#FF33FF" class="dataLabel" style="text-align:center"><label id="tax2">Tax '.$noidung->soluongkh2.'</label></td>
                    <td bgcolor="#FFFF99"></td>
                    <td bgcolor="#FFFF99">'.$noidung->soluongkh3.'</td>
                    <td bgcolor="#FFFF99">'.$noidung->soluongkh4.'</td>
                    <td bgcolor="#FFFF99" class="dataLabel" style="text-align:center"><label id="tax3">Tax '.$noidung->soluongkh3.'</label></td>
                    <td bgcolor="#FFFF99" class="dataLabel" style="text-align:center"><label id="tax4">Tax '.$noidung->soluongkh4.'</label></td>
                    <td bgcolor="#99FFFF"></td>
                    <td bgcolor="#99FFFF">'.$noidung->soluongkh5.'</td>
                    <td bgcolor="#99FFFF">'.$noidung->soluongkh6.'</td>
                    <td bgcolor="#99FFFF" class="dataLabel" style="text-align:center"><label id="tax5">Tax '.$noidung->soluongkh5.'</label></td>
                    <td bgcolor="#99FFFF" class="dataLabel" style="text-align:center"><label id="tax6">Tax '.$noidung->soluongkh6.'</label></td>
                    <td bgcolor="#9966FF"></td>
                    <td bgcolor="#9966FF">'.$noidung->soluongkh7.'</td>
                    <td bgcolor="#9966FF">'.$noidung->soluongkh8.'</td>
                    <td bgcolor="#9966FF" class="dataLabel" style="text-align:center"><label id="tax7">Tax '.$noidung->soluongkh7.'</label></td>
                    <td bgcolor="#9966FF" class="dataLabel" style="text-align:center"><label id="tax8">Tax '.$noidung->soluongkh8.'</label></td>
                    <td bgcolor="#999999"></td>
                    <td bgcolor="#999999">'.$noidung->soluongkh9.'</td>
                    <td bgcolor="#999999">'.$noidung->soluongkh10.'</td>
                    <td bgcolor="#999999" class="dataLabel" style="text-align:center"><label id="tax9">Tax '.$noidung->soluongkh9.'</label></td>
                    <td bgcolor="#999999" class="dataLabel" style="text-align:center"><label id="tax10">Tax '.$noidung->soluongkh10.'</label></td>
                    <td bgcolor="#999999">'.$noidung->soluongkh11.'</td>
                    <td bgcolor="#999999">'.$noidung->soluongkh12.'</td>
                    <td bgcolor="#999999" class="dataLabel" style="text-align:center"><label id="tax11">Tax '.$noidung->soluongkh11.'</label></td>
                    <td bgcolor="#999999" class="dataLabel" style="text-align:center"><label id="tax12">Tax '.$noidung->soluongkh12.'</label></td>
                    <td bgcolor="#33CCFF"></td>
                    <td bgcolor="#33CCFF">'.$noidung->soluongkh13.'</td>
                    <td bgcolor="#33CCFF">'.$noidung->soluongkh14.'</td>
                    <td bgcolor="#33CCFF">'.$noidung->soluongkh15.'</td>
                    <td bgcolor="#33CCFF" class="dataLabel" style="text-align:center"><label id="tax13">Tax '.$noidung->soluongkh13.'</label></td>
                    <td bgcolor="#33CCFF" class="dataLabel" style="text-align:center"><label id="tax14">Tax '.$noidung->soluongkh14.'</label></td>
                    <td bgcolor="#33CCFF" class="dataLabel" style="text-align:center"><label id="tax15">Tax '.$noidung->soluongkh15.'</label></td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999"><strong>TRANSFER</strong></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="center" valign="middle" class="dataLabel"><strong>VND/km</strong></td>
                    <td>'.$noidung->transfer1.'</td>
                    <td>'.$noidung->transfer2.'</td>
                    <td>'.$noidung->transfer3.'</td>
                    <td>'.$noidung->transfer4.'</td>
                    <td align="center" valign="middle" class="dataLabel"><strong>VND/km</strong></td>
                    <td>'.$noidung->transfer5.'</td>
                    <td>'.$noidung->transfer6.'</td>
                    <td>'.$noidung->transfer7.'</td>
                    <td>'.$noidung->transfer8.'</td>
                    <td class="dataLabel"><strong>VND/km</strong></td>
                    <td>'.$noidung->transfer9.'</td>
                    <td>'.$noidung->transfer10.'</td>
                    <td>'.$noidung->transfer11.'</td>
                    <td>'.$noidung->transfer12.'</td>
                    <td class="dataLabel"><strong>VND/km</strong></td>
                    <td>'.$noidung->transfer13.'</td>
                    <td>'.$noidung->transfer14.'</td>
                    <td>'.$noidung->transfer15.'</td>
                    <td>'.$noidung->transfer16.'</td>
                    <td align="center" class="dataLabel"><strong>VND/km</strong></td>
                    <td>'.$noidung->transfer17.'</td>
                    <td>'.$noidung->transfer18.'</td>
                    <td>'.$noidung->transfer19.'</td>
                    <td>'.$noidung->transfer20.'</td>
                    <td>'.$noidung->transfer21.'</td>
                    <td>'.$noidung->transfer22.'</td>
                    <td>'.$noidung->transfer23.'</td>
                    <td>'.$noidung->transfer24.'</td>
                    <td align="center" class="dataLabel"><strong>VND/km</strong></td>
                    <td>'.$noidung->transfer25.'</td>
                    <td>'.$noidung->transfer26.'</td>
                    <td>'.$noidung->transfer27.'</td>
                    <td>'.$noidung->transfer28.'</td>
                    <td>'.$noidung->transfer29.'</td>
                    <td>'.$noidung->transfer30.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>
                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">South (Km)</td>
                    <td>'.$noidung->transfer_south.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->transfer_south_km1.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->transfer_south_km2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->transfer_south_km3.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->transfer_south_km4.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->transfer_south_km5.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->transfer_south_km6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Middle (Km)</td>
                    <td>'.$noidung->transfer_middle.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->transfer_middle_km1.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->transfer_middle_km2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->transfer_middle_km3.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->transfer_middle_km4.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->transfer_middle_km5.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->transfer_middle_km6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">North (Km)</td>
                    <td>'.$noidung->transfer_north.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->transfer_north_km1.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->transfer_north_km2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->transfer_north_km3.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->transfer_north_km4.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->transfer_north_km5.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->transfer_north_km6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td colspan="4" style="border-left:1px solid #999">&nbsp;</td>
                    <td class="dataLabel"><strong>Package</strong></td>
                    <td colspan="4">&nbsp;</td>
                    <td><strong>Package</strong></td>
                    <td colspan="4">&nbsp;</td>
                    <td align="center" class="dataLabel"><strong>Package</strong></td>
                    <td colspan="4">&nbsp;</td>
                    <td align="center"><strong>Package</strong></td>
                    <td colspan="4">&nbsp;</td>
                    <td class="dataLabel"><strong>Package</strong></td>
                    <td colspan="4">&nbsp;</td>
                    <td colspan="4">&nbsp;</td>
                    <td align="center"><strong>Package</strong></td>
                    <td colspan="8">&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">South (Package)</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->south_package1.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->south_package2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->south_package3.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->south_package4.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->south_package5.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->south_package6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Middle (Package)</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->middle_package1.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->middle_package2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->middle_package3.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->middle_package4.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->middle_package5.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->middle_package6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">North (Package)</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->north_package1.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->north_package2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->north_package3.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->north_package4.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->north_package5.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->north_package6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td colspan="42" class="dataLabel" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>
                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999"><strong>BOAT</strong></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->boat_sum.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->boat1.'</td>
                    <td>'.$noidung->boat2.'</td>
                    <td>'.$noidung->boat3.'</td>
                    <td>'.$noidung->boat4.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->boat5.'</td>
                    <td>'.$noidung->boat6.'</td>
                    <td>'.$noidung->boat7.'</td>
                    <td>'.$noidung->boat8.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->boat9.'</td>
                    <td>'.$noidung->boat10.'</td>
                    <td>'.$noidung->boat11.'</td>
                    <td>'.$noidung->boat12.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->boat13.'</td>
                    <td>'.$noidung->boat14.'</td>
                    <td>'.$noidung->boat15.'</td>
                    <td>'.$noidung->boat16.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->boat17.'</td>
                    <td>'.$noidung->boat18.'</td>
                    <td>'.$noidung->boat19.'</td>
                    <td>'.$noidung->boat20.'</td>
                    <td>'.$noidung->boat21.'</td>
                    <td>'.$noidung->boat22.'</td>
                    <td>'.$noidung->boat23.'</td>
                    <td>'.$noidung->boat24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->boat25.'</td>
                    <td>'.$noidung->boat26.'</td>
                    <td>'.$noidung->boat27.'</td>
                    <td>'.$noidung->boat28.'</td>
                    <td>'.$noidung->boat29.'</td>
                    <td>'.$noidung->boat30.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>';
                    $boat = $noidung->boat;
                    if(count($boat) >0){
                        foreach($boat as $value){
                            $html .= '<tr>
                            <td class="dataLabel" style="border-left:1px solid #999">'.$value->boat_service.'</td>
                            <td>'.$value->boat_price.'</td>
                            <td>'.$value->boat_num.'</td>
                            <td>'.$value->boat_money.'</td>
                            <td>&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            </tr>';
                        }
                    }
                    
                    $html .= '<tr>
                    <td colspan="42" class="dataLabel" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999"><strong>GUIDE</strong></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->guide_sum.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->guide1.'</td>
                    <td>'.$noidung->guide2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->guide3.'</td>
                    <td>'.$noidung->guide4.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->guide5.'</td>
                    <td>'.$noidung->guide6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->guide7.'</td>
                    <td>'.$noidung->guide8.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->guide9.'</td>
                    <td>'.$noidung->guide10.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->guide11.'</td>
                    <td>'.$noidung->guide12.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->guide13.'</td>
                    <td>'.$noidung->guide14.'</td>
                    <td>'.$noidung->guide15.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">South</td>
                    <td>'.$noidung->guide_south_price.'</td>
                    <td>'.$noidung->guide_south_num.'</td>
                    <td>'.$noidung->guide_south_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Middle</td>
                    <td>'.$noidung->guide_middle_price.'</td>
                    <td>'.$noidung->guide_middle_num.'</td>
                    <td>'.$noidung->guide_middle_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">North</td>
                    <td>'.$noidung->guide_north_price.'</td>
                    <td>'.$noidung->guide_north_num.'</td>
                    <td>'.$noidung->guide_north_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td colspan="42" class="dataLabel" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>
                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999"><strong>GROUP MISCELLANEOUS (Include VAT)</strong></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->group_sum.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->group1.'</td>
                    <td>'.$noidung->group2.'</td>
                    <td>'.$noidung->group3.'</td>
                    <td>'.$noidung->group4.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->group5.'</td>
                    <td>'.$noidung->group6.'</td>
                    <td>'.$noidung->group7.'</td>
                    <td>'.$noidung->group8.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->group9.'</td>
                    <td>'.$noidung->group10.'</td>
                    <td>'.$noidung->group11.'</td>
                    <td>'.$noidung->group12.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->group13.'</td>
                    <td>'.$noidung->group14.'</td>
                    <td>'.$noidung->group15.'</td>
                    <td>'.$noidung->group16.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->group17.'</td>
                    <td>'.$noidung->group18.'</td>
                    <td>'.$noidung->group19.'</td>
                    <td>'.$noidung->group20.'</td>
                    <td>'.$noidung->group21.'</td>
                    <td>'.$noidung->group22.'</td>
                    <td>'.$noidung->group23.'</td>
                    <td>'.$noidung->group24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->group25.'</td>
                    <td>'.$noidung->group26.'</td>
                    <td>'.$noidung->group27.'</td>
                    <td>'.$noidung->group28.'</td>
                    <td>'.$noidung->group29.'</td>
                    <td>'.$noidung->group30.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>';
                    $group1_fit = $noidung->group1_fit;
                    if(count($group1_fit) >0){
                        foreach($group1_fit as $value){
                            $html .= '<tr>
                            <td style="border-left:1px solid #999">'.$value->group1_service.'</td>
                            <td>'.$value->group1_price.'</td>
                            <td>'.$value->group1_num.'</td>
                            <td>'.$value->group1_money.'</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            </tr>';
                        }
                    }
                    $html .= '<tr>
                    <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999"><strong>GROUP MISCELLANEOUS (Not VAT)</strong></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>';
                    $group2_fit = $noidung->group2_fit;
                    if(count($group2_fit) >0){
                        foreach($group2_fit as $value){
                            $html .= '<tr>
                            <td style="border-left:1px solid #999">'.$value->group2_service.'</td>
                            <td>'.$value->group2_price.'</td>
                            <td>'.$value->group2_num.'</td>
                            <td>'.$value->group2_money.'</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            </tr>';
                        }
                    }
                    $html .= '<tr>
                    <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999"><strong>ENTRANCE</strong></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->entrance_sum.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->entrance1.'</td>
                    <td>'.$noidung->entrance2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->entrance3.'</td>
                    <td>'.$noidung->entrance4.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->entrance5.'</td>
                    <td>'.$noidung->entrance6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->entrance7.'</td>
                    <td>'.$noidung->entrance8.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->entrance9.'</td>
                    <td>'.$noidung->entrance10.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->entrance11.'</td>
                    <td>'.$noidung->entrance12.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->entrance13.'</td>
                    <td>'.$noidung->entrance14.'</td>
                    <td>'.$noidung->entrance15.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>';
                    $entrance = $noidung->entrance;
                    if(count($entrance)>0){
                        foreach($entrance as $value){
                            $html .= ' <tr>
                            <td style="border-left:1px solid #999">'.$value->entrance_service.'</td>
                            <td>'.$value->entrance_price.'</td>
                            <td>'.$value->entrance_num.'</td>
                            <td>'.$value->entrance_money.'</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            </tr>';
                        }
                    }


                    $html .= '<tr>
                    <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999"><strong>TICKETS</strong></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->ticket_sum.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->ticket1.'</td>
                    <td>'.$noidung->ticket2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->ticket3.'</td>
                    <td>'.$noidung->ticket4.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->ticket5.'</td>
                    <td>'.$noidung->ticket6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->ticket7.'</td>
                    <td>'.$noidung->ticket8.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->ticket9.'</td>
                    <td>'.$noidung->ticket10.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->ticket11.'</td>
                    <td>'.$noidung->ticket12.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->ticket13.'</td>
                    <td>'.$noidung->ticket14.'</td>
                    <td>'.$noidung->ticket15.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>';

                    $ticket = $noidung->ticket;
                    if(count($ticket)>0){
                        foreach($ticket as $value){
                            $html_ticket .= '<tr>
                            <td style="border-left:1px solid #999">'.$value->tickets_service.'</td>
                            <td>'.$value->tickets_price.'</td>
                            <td>'.$value->tickets_num.'</td>
                            <td>'.$value->tickets_money.'</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            </tr>';
                        }
                    }

                    $html .= '<tr>
                    <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999"><strong>FIT MISCELLANEOUS (Include VAT)</strong></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->fit_sum.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->fit1.'</td>
                    <td>'.$noidung->fit2.'</td>
                    <td>'.$noidung->fit3.'</td>
                    <td>'.$noidung->fit4.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->fit5.'</td>
                    <td>'.$noidung->fit6.'</td>
                    <td>'.$noidung->fit7.'</td>
                    <td>'.$noidung->fit8.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->fit9.'</td>
                    <td>'.$noidung->fit10.'</td>
                    <td>'.$noidung->fit11.'</td>
                    <td>'.$noidung->fit12.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->fit13.'</td>
                    <td>'.$noidung->fit14.'</td>
                    <td>'.$noidung->fit15.'</td>
                    <td>'.$noidung->fit16.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->fit17.'</td>
                    <td>'.$noidung->fit18.'</td>
                    <td>'.$noidung->fit19.'</td>
                    <td>'.$noidung->fit20.'</td>
                    <td>'.$noidung->fit21.'</td>
                    <td>'.$noidung->fit22.'</td>
                    <td>'.$noidung->fit23.'</td>
                    <td>'.$noidung->fit24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->fit25.'</td>
                    <td>'.$noidung->fit26.'</td>
                    <td>'.$noidung->fit27.'</td>
                    <td>'.$noidung->fit28.'</td>
                    <td>'.$noidung->fit29.'</td>
                    <td>'.$noidung->fit30.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr> ';

                    $fit1_line = $noidung->fit1_line;

                    if(count($fit1_line)>0){
                        foreach($fit1_line as $value){
                            $html .= '<tr>
                            <td style="border-left:1px solid #999">'.$value->fit1_service.'</td>
                            <td>'.$value->fit1_price.'</td>
                            <td>'.$value->fit1_num.'</td>
                            <td>'.$value->fit1_money.'</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            </tr>';
                        }
                    }
                    $html .= '<tr>
                    <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999"><strong>FIT MISCELLANEOUS (Not VAT)</strong></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>';
                    $fit2_line = $noidung->fit2_line;
                    if(count($fit2_line) > 0){
                        foreach($fit2_line as $value){
                            $html .= '<tr>
                            <td style="border-left:1px solid #999">'.$value->fit2_service.'</td>
                            <td>'.$value->fit_price.'</td>
                            <td>'.$value->fit_num.'</td>
                            <td>'.$value->fit_money.'</td>
                            <td>&nbsp;</td>
                            <td align="center" valign="middle"><input type="button" class="btnAdd" value="Add"/></td>
                            <td align="center" valign="middle"><input type="button" class="btnDel" value="Delete"/></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            </tr>';
                        }
                    }
                    $html .= '<tr>
                    <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999"><strong>MEALS 1</strong></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_sum.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_1.'</td>
                    <td>'.$noidung->meal1_2.'</td>
                    <td>'.$noidung->meal1_3.'</td>
                    <td>'.$noidung->meal1_4.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_5.'</td>
                    <td>'.$noidung->meal1_6.'</td>
                    <td>'.$noidung->meal1_7.'</td>
                    <td>'.$noidung->meal1_8.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_9.'</td>
                    <td>'.$noidung->meal1_10.'</td>
                    <td>'.$noidung->meal1_11.'</td>
                    <td>'.$noidung->meal1_12.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_13.'</td>
                    <td>'.$noidung->meal1_14.'</td>
                    <td>'.$noidung->meal1_15.'</td>
                    <td>'.$noidung->meal1_16.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_17.'</td>
                    <td>'.$noidung->meal1_18.'</td>
                    <td>'.$noidung->meal1_19.'</td>
                    <td>'.$noidung->meal1_20.'</td>
                    <td>'.$noidung->meal1_21.'</td>
                    <td>'.$noidung->meal1_22.'</td>
                    <td>'.$noidung->meal1_23.'</td>
                    <td>'.$noidung->meal1_24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_25.'</td>
                    <td>'.$noidung->meal1_26.'</td>
                    <td>'.$noidung->meal1_27.'</td>
                    <td>'.$noidung->meal1_28.'</td>
                    <td>'.$noidung->meal1_28.'</td>
                    <td>'.$noidung->meal1_30.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>
                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999"><strong>South</strong></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_south_sum.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_south1.'</td>
                    <td>'.$noidung->meal1_south2.'</td>
                    <td>'.$noidung->meal1_south3.'</td>
                    <td>'.$noidung->meal1_south4.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_south5.'</td>
                    <td>'.$noidung->meal1_south6.'</td>
                    <td>'.$noidung->meal1_south7.'</td>
                    <td>'.$noidung->meal1_south8.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_south9.'</td>
                    <td>'.$noidung->meal1_south10.'</td>
                    <td>'.$noidung->meal1_south11.'</td>
                    <td>'.$noidung->meal1_south12.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_south13.'</td>
                    <td>'.$noidung->meal1_south14.'</td>
                    <td>'.$noidung->meal1_south15.'</td>
                    <td>'.$noidung->meal1_south16.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_south17.'</td>
                    <td>'.$noidung->meal1_south18.'</td>
                    <td>'.$noidung->meal1_south19.'</td>
                    <td>'.$noidung->meal1_south20.'</td>
                    <td>'.$noidung->meal1_south21.'</td>
                    <td>'.$noidung->meal1_south22.'</td>
                    <td>'.$noidung->meal1_south23.'</td>
                    <td>'.$noidung->meal1_south24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_south25.'</td>
                    <td>'.$noidung->meal1_south26.'</td>
                    <td>'.$noidung->meal1_south27.'</td>
                    <td>'.$noidung->meal1_south28.'</td>
                    <td>'.$noidung->meal1_south29.'</td>
                    <td>'.$noidung->meal1_south30.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Breakfirst</td>
                    <td>'.$noidung->meal1_south_breakfirst_price.'</td>
                    <td>'.$noidung->meal1_south_breakfirst_num.'</td>
                    <td>'.$noidung->meal1_south_breakfirst_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Lunch</td>
                    <td>'.$noidung->meal1_south_lunch_price.'</td>
                    <td>'.$noidung->meal1_south_lunch_num.'</td>
                    <td>'.$noidung->meal1_south_lunch_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Dinner</td>
                    <td>'.$noidung->meal1_south_dinner_price.'</td>
                    <td>'.$noidung->meal1_south_dinner_num.'</td>
                    <td>'.$noidung->meal1_south_dinner_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Other</td>
                    <td>'.$noidung->meal1_south_other_price.'</td>
                    <td>'.$noidung->meal1_south_other_num.'</td>
                    <td>'.$noidung->meal1_south_other_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td colspan="42" class="dataLabel" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>
                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999"><strong>Middle</strong></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_miidle_sum.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_middle1.'</td>
                    <td>'.$noidung->meal1_middle2.'</td>
                    <td>'.$noidung->meal1_middle3.'</td>
                    <td>'.$noidung->meal1_middle4.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_middle5.'</td>
                    <td>'.$noidung->meal1_middle6.'</td>
                    <td>'.$noidung->meal1_middle7.'</td>
                    <td>'.$noidung->meal1_middle8.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_middle9.'</td>
                    <td>'.$noidung->meal1_middle10.'</td>
                    <td>'.$noidung->meal1_middle11.'</td>
                    <td>'.$noidung->meal1_middle12.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_middle13.'</td>
                    <td>'.$noidung->meal1_middle14.'</td>
                    <td>'.$noidung->meal1_middle15.'</td>
                    <td>'.$noidung->meal1_middle16.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_middle17.'</td>
                    <td>'.$noidung->meal1_middle18.'</td>
                    <td>'.$noidung->meal1_middle19.'</td>
                    <td>'.$noidung->meal1_middle20.'</td>
                    <td>'.$noidung->meal1_middle21.'</td>
                    <td>'.$noidung->meal1_middle22.'</td>
                    <td>'.$noidung->meal1_middle23.'</td>
                    <td>'.$noidung->meal1_middle24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_middle25.'</td>
                    <td>'.$noidung->meal1_middle26.'</td>
                    <td>'.$noidung->meal1_middle27.'</td>
                    <td>'.$noidung->meal1_middle28.'</td>
                    <td>'.$noidung->meal1_middle29.'</td>
                    <td>'.$noidung->meal1_middle30.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Breakfirst</td>
                    <td>'.$noidung->meal1_middle_breakfirst_price.'</td>
                    <td>'.$noidung->meal1_middle_breakfirst_num.'</td>
                    <td>'.$noidung->meal1_middle_breakfirst_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Lunch</td>
                    <td>'.$noidung->meal1_middle_lunch_price.'</td>
                    <td>'.$noidung->meal1_middle_lunch_num.'</td>
                    <td>'.$noidung->meal1_middle_lunch_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Dinner</td>
                    <td>'.$noidung->meal1_middle_dinner_price.'</td>
                    <td>'.$noidung->meal1_middle_dinner_num.'</td>
                    <td>'.$noidung->meal1_middle_dinner_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Other</td>
                    <td>'.$noidung->meal1_middle_other_price.'</td>
                    <td>'.$noidung->meal1_middle_other_num.'</td>
                    <td>'.$noidung->meal1_middle_other_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td colspan="42" class="dataLabel" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>
                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999"><strong>North</strong></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_north_sum.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_north1.'</td>
                    <td>'.$noidung->meal1_north2.'</td>
                    <td>'.$noidung->meal1_north3.'</td>
                    <td>'.$noidung->meal1_north4.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_north5.'</td>
                    <td>'.$noidung->meal1_north6.'</td>
                    <td>'.$noidung->meal1_north7.'</td>
                    <td>'.$noidung->meal1_north8.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_north9.'</td>
                    <td>'.$noidung->meal1_north10.'</td>
                    <td>'.$noidung->meal1_north11.'</td>
                    <td>'.$noidung->meal1_north12.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_north13.'</td>
                    <td>'.$noidung->meal1_north14.'</td>
                    <td>'.$noidung->meal1_north15.'</td>
                    <td>'.$noidung->meal1_north16.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_north17.'</td>
                    <td>'.$noidung->meal1_north18.'</td>
                    <td>'.$noidung->meal1_north19.'</td>
                    <td>'.$noidung->meal1_north20.'</td>
                    <td>'.$noidung->meal1_north21.'</td>
                    <td>'.$noidung->meal1_north22.'</td>
                    <td>'.$noidung->meal1_north23.'</td>
                    <td>'.$noidung->meal1_north24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal1_north25.'</td>
                    <td>'.$noidung->meal1_north26.'</td>
                    <td>'.$noidung->meal1_north27.'</td>
                    <td>'.$noidung->meal1_north28.'</td>
                    <td>'.$noidung->meal1_north29.'</td>
                    <td>'.$noidung->meal1_north30.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Breakfirst</td>
                    <td>'.$noidung->meal1_north_breakfirst_price.'</td>
                    <td>'.$noidung->meal1_north_breakfirst_num.'</td>
                    <td>'.$noidung->meal1_north_breakfirst_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Lunch</td>
                    <td>'.$noidung->meal1_north_lunch_price.'</td>
                    <td>'.$noidung->meal1_north_lunch_num.'</td>
                    <td>'.$noidung->meal1_north_lunch_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Dinner</td>
                    <td>'.$noidung->meal1_north_dinner_price.'</td>
                    <td>'.$noidung->meal1_north_dinner_num.'</td>
                    <td>'.$noidung->meal1_north_dinner_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Other</td>
                    <td>'.$noidung->meal1_north_other_price.'</td>
                    <td>'.$noidung->meal1_north_other_num.'</td>
                    <td>'.$noidung->meal1_north_other_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999"><strong>HOTEL 1</strong></td>
                    <td class="dataLabel">Room</td>
                    <td class="dataLabel">Nite</td>
                    <td>'.$noidung->hotel1_sum.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->hotel1_1.'</td>
                    <td>'.$noidung->hotel1_2.'</td>
                    <td>'.$noidung->hotel1_3.'</td>
                    <td>'.$noidung->hotel1_4.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->hotel1_5.'</td>
                    <td>'.$noidung->hotel1_6.'</td>
                    <td>'.$noidung->hotel1_7.'</td>
                    <td>'.$noidung->hotel1_8.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->hotel1_9.'</td>
                    <td>'.$noidung->hotel1_10.'</td>
                    <td>'.$noidung->hotel1_11.'</td>
                    <td>'.$noidung->hotel1_12.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->hotel1_13.'</td>
                    <td>'.$noidung->hotel1_14.'</td>
                    <td>'.$noidung->hotel1_15.'</td>
                    <td>'.$noidung->hotel1_16.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->hotel1_17.'</td>
                    <td>'.$noidung->hotel1_18.'</td>
                    <td>'.$noidung->hotel1_19.'</td>
                    <td>'.$noidung->hotel1_20.'</td>
                    <td>'.$noidung->hotel1_21.'</td>
                    <td>'.$noidung->hotel1_22.'</td>
                    <td>'.$noidung->hotel1_23.'</td>
                    <td>'.$noidung->hotel1_24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->hotel1_25.'</td>
                    <td>'.$noidung->hotel1_26.'</td>
                    <td>'.$noidung->hotel1_27.'</td>
                    <td>'.$noidung->hotel1_28.'</td>
                    <td>'.$noidung->hotel1_29.'</td>
                    <td>'.$noidung->hotel1_30.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>';
                    $hotel1 = $noidung->hotel1;
                    if(count($hotel1)>0){
                        foreach($hotel1 as $value){
                            $html .= ' <tr>
                            <td style="border-left:1px solid #999">'.$value->hotel1_service.'</td>
                            <td>'.$value->hotel1_price.'</td>
                            <td>'.$value->hotel1_num.'</td>
                            <td>'.$value->hotel1_money.'</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            </tr>';
                        }
                    }
                    $html .= '<tr>
                    <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>
                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">FOC</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->foc1_21.'</td>
                    <td>'.$noidung->foc1_22.'</td>
                    <td>'.$noidung->foc1_23.'</td>
                    <td>'.$noidung->foc1_24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->foc1_25.'</td>
                    <td>'.$noidung->foc1_26.'</td>
                    <td>'.$noidung->foc1_27.'</td>
                    <td>'.$noidung->foc1_28.'</td>
                    <td>'.$noidung->foc1_29.'</td>
                    <td>'.$noidung->foc1_30.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">NETT</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->nett1_1.'</td>
                    <td>'.$noidung->nett1_2.'</td>
                    <td>'.$noidung->nett1_3.'</td>
                    <td>'.$noidung->nett1_4.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->nett1_5.'</td>
                    <td>'.$noidung->nett1_6.'</td>
                    <td>'.$noidung->nett1_7.'</td>
                    <td>'.$noidung->nett1_8.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->nett1_9.'</td>
                    <td>'.$noidung->nett1_10.'</td>
                    <td>'.$noidung->nett1_11.'</td>
                    <td>'.$noidung->nett1_12.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->nett1_13.'</td>
                    <td>'.$noidung->nett1_14.'</td>
                    <td>'.$noidung->nett1_15.'</td>
                    <td>'.$noidung->nett1_16.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->nett1_17.'</td>
                    <td>'.$noidung->nett1_18.'</td>
                    <td>'.$noidung->nett1_19.'</td>
                    <td>'.$noidung->nett1_20.'</td>
                    <td>'.$noidung->nett1_21.'</td>
                    <td>'.$noidung->nett1_22.'</td>
                    <td>'.$noidung->nett1_23.'</td>
                    <td>'.$noidung->nett1_24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->nett1_25.'</td>
                    <td>'.$noidung->nett1_26.'</td>
                    <td>'.$noidung->nett1_27.'</td>
                    <td>'.$noidung->nett1_28.'</td>
                    <td>'.$noidung->nett1_29.'</td>
                    <td>'.$noidung->nett1_30.'</td>
                    <td>'.$noidung->nett1_31.'</td>
                    <td>'.$noidung->nett1_32.'</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">SERVICE CHARGE</td>
                    <td>'.$noidung->service1_rate.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->service1_1.'</td>
                    <td>'.$noidung->service1_2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->service1_5.'</td>
                    <td>'.$noidung->service1_6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->service1_9.'</td>
                    <td>'.$noidung->service1_10.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->service1_13.'</td>
                    <td>'.$noidung->service1_14.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->service1_17.'</td>
                    <td>'.$noidung->service1_18.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->service1_21.'</td>
                    <td>'.$noidung->service1_22.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->service1_25.'</td>
                    <td>'.$noidung->service1_26.'</td>
                    <td>'.$noidung->service1_27.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->service1_31.'</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">SELL 1 - VND</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell1_vnd1.'</td>
                    <td>'.$noidung->sell1_vnd2.'</td>
                    <td>'.$noidung->sell1_vnd3.'</td>
                    <td>'.$noidung->sell1_vnd4.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell1_vnd5.'</td>
                    <td>'.$noidung->sell1_vnd6.'</td>
                    <td>'.$noidung->sell1_vnd7.'</td>
                    <td>'.$noidung->sell1_vnd8.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell1_vnd9.'</td>
                    <td>'.$noidung->sell1_vnd10.'</td>
                    <td>'.$noidung->sell1_vnd11.'</td>
                    <td>'.$noidung->sell1_vnd12.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell1_vnd13.'</td>
                    <td>'.$noidung->sell1_vnd14.'</td>
                    <td>'.$noidung->sell1_vnd15.'</td>
                    <td>'.$noidung->sell1_vnd16.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell1_vnd17.'</td>
                    <td>'.$noidung->sell1_vnd18.'</td>
                    <td>'.$noidung->sell1_vnd19.'</td>
                    <td>'.$noidung->sell1_vnd20.'</td>
                    <td>'.$noidung->sell1_vnd21.'</td>
                    <td>'.$noidung->sell1_vnd22.'</td>
                    <td>'.$noidung->sell1_vnd23.'</td>
                    <td>'.$noidung->sell1_vnd24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell1_vnd25.'</td>
                    <td>'.$noidung->sell1_vnd26.'</td>
                    <td>'.$noidung->sell1_vnd27.'</td>
                    <td>'.$noidung->sell1_vnd28.'</td>
                    <td>'.$noidung->sell1_vnd29.'</td>
                    <td>'.$noidung->sell1_vnd30.'</td>
                    <td>'.$noidung->sell1_vnd31.'</td>
                    <td>'.$noidung->sell1_vnd32.'</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">SELL 1 - USD</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell1_usd1.'</td>
                    <td>'.$noidung->sell1_usd2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell1_usd5.'</td>
                    <td>'.$noidung->sell1_usd6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell1_usd9.'</td>
                    <td>'.$noidung->sell1_usd10.'</td>
                    <td>'.$noidung->sell1_usd11.'</td>
                    <td>'.$noidung->sell1_usd12.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell1_usd13.'</td>
                    <td>'.$noidung->sell1_usd14.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell1_usd17.'</td>
                    <td>'.$noidung->sell1_usd18.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell1_usd21.'</td>
                    <td>'.$noidung->sell1_usd22.'</td>
                    <td>'.$noidung->sell1_usd23.'</td>
                    <td>'.$noidung->sell1_usd24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell1_usd25.'</td>
                    <td>'.$noidung->sell1_usd26.'</td>
                    <td>'.$noidung->sell1_usd27.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell1_usd31.'</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">TAX TO BE PAID</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->tax1_1.'</td>
                    <td>'.$noidung->tax1_2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->tax1_5.'</td>
                    <td>'.$noidung->tax1_6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->tax1_9.'</td>
                    <td>'.$noidung->tax1_10.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->tax1_13.'</td>
                    <td>'.$noidung->tax1_14.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->tax1_17.'</td>
                    <td>'.$noidung->tax1_18.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->tax1_21.'</td>
                    <td>'.$noidung->tax1_22.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->tax1_25.'</td>
                    <td>'.$noidung->tax1_26.'</td>
                    <td>'.$noidung->tax1_27.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->tax1_31.'</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">PROFIT/PAX</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->profit1_1.'</td>
                    <td>'.$noidung->profit1_2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->profit1_5.'</td>
                    <td>'.$noidung->profit1_6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->profit1_9.'</td>
                    <td>'.$noidung->profit1_10.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->profit1_13.'</td>
                    <td>'.$noidung->profit1_14.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->profit1_17.'</td>
                    <td>'.$noidung->profit1_18.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->profit1_21.'</td>
                    <td>'.$noidung->profit1_22.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->profit1_25.'</td>
                    <td>'.$noidung->profit1_26.'</td>
                    <td>'.$noidung->profit1_27.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->profit1_31.'</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">TOTAL PROFIT</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->total1_1.'</td>
                    <td>'.$noidung->total1_2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->total1_5.'</td>
                    <td>'.$noidung->total1_6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->total1_9.'</td>
                    <td>'.$noidung->total1_10.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->total1_13.'</td>
                    <td>'.$noidung->total1_14.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->total1_17.'</td>
                    <td>'.$noidung->total1_18.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->total1_21.'</td>
                    <td>'.$noidung->total1_22.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->total1_25.'</td>
                    <td>'.$noidung->total1_26.'</td>
                    <td>'.$noidung->total1_27.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->total1_31.'</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">% OF INTEREST</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->interest1_1.'</td>
                    <td>'.$noidung->interest1_2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->interest1_5.'</td>
                    <td>'.$noidung->interest1_6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->interest1_9.'</td>
                    <td>'.$noidung->interest1_10.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->interest1_13.'</td>
                    <td>'.$noidung->interest1_14.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->interest1_17.'</td>
                    <td>'.$noidung->interest1_18.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->interest1_21.'</td>
                    <td>'.$noidung->interest1_22.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->interest1_25.'</td>
                    <td>'.$noidung->interest1_26.'</td>
                    <td>'.$noidung->interest1_27.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->interest1_31.'</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999"><strong>MEALS 2</strong></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_sum.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_1.'</td>
                    <td>'.$noidung->meal2_2.'</td>
                    <td>'.$noidung->meal2_3.'</td>
                    <td>'.$noidung->meal2_4.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_5.'</td>
                    <td>'.$noidung->meal2_6.'</td>
                    <td>'.$noidung->meal2_7.'</td>
                    <td>'.$noidung->meal2_8.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_9.'</td>
                    <td>'.$noidung->meal2_10.'</td>
                    <td>'.$noidung->meal2_11.'</td>
                    <td>'.$noidung->meal2_12.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_13.'</td>
                    <td>'.$noidung->meal2_14.'</td>
                    <td>'.$noidung->meal2_15.'</td>
                    <td>'.$noidung->meal2_16.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_17.'</td>
                    <td>'.$noidung->meal2_18.'</td>
                    <td>'.$noidung->meal2_19.'</td>
                    <td>'.$noidung->meal2_20.'</td>
                    <td>'.$noidung->meal2_21.'</td>
                    <td>'.$noidung->meal2_22.'</td>
                    <td>'.$noidung->meal2_23.'</td>
                    <td>'.$noidung->meal2_24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_25.'</td>
                    <td>'.$noidung->meal2_26.'</td>
                    <td>'.$noidung->meal2_27.'</td>
                    <td>'.$noidung->meal2_28.'</td>
                    <td>'.$noidung->meal2_28.'</td>
                    <td>'.$noidung->meal2_30.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>
                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999"><strong>South</strong></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_south_sum.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_south1.'</td>
                    <td>'.$noidung->meal2_south2.'</td>
                    <td>'.$noidung->meal2_south3.'</td>
                    <td>'.$noidung->meal2_south4.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_south5.'</td>
                    <td>'.$noidung->meal2_south6.'</td>
                    <td>'.$noidung->meal2_south7.'</td>
                    <td>'.$noidung->meal2_south8.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_south9.'</td>
                    <td>'.$noidung->meal2_south10.'</td>
                    <td>'.$noidung->meal2_south11.'</td>
                    <td>'.$noidung->meal2_south12.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_south13.'</td>
                    <td>'.$noidung->meal2_south14.'</td>
                    <td>'.$noidung->meal2_south15.'</td>
                    <td>'.$noidung->meal2_south16.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_south17.'</td>
                    <td>'.$noidung->meal2_south18.'</td>
                    <td>'.$noidung->meal2_south19.'</td>
                    <td>'.$noidung->meal2_south20.'</td>
                    <td>'.$noidung->meal2_south21.'</td>
                    <td>'.$noidung->meal2_south22.'</td>
                    <td>'.$noidung->meal2_south23.'</td>
                    <td>'.$noidung->meal2_south24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_south25.'</td>
                    <td>'.$noidung->meal2_south26.'</td>
                    <td>'.$noidung->meal2_south27.'</td>
                    <td>'.$noidung->meal2_south28.'</td>
                    <td>'.$noidung->meal2_south29.'</td>
                    <td>'.$noidung->meal2_south30.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Breakfirst</td>
                    <td>'.$noidung->meal2_south_breakfirst_price.'</td>
                    <td>'.$noidung->meal2_south_breakfirst_num.'</td>
                    <td>'.$noidung->meal2_south_breakfirst_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Lunch</td>
                    <td>'.$noidung->meal2_south_lunch_price.'</td>
                    <td>'.$noidung->meal2_south_lunch_num.'</td>
                    <td>'.$noidung->meal2_south_lunch_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Dinner</td>
                    <td>'.$noidung->meal2_south_dinner_price.'</td>
                    <td>'.$noidung->meal2_south_dinner_num.'</td>
                    <td>'.$noidung->meal2_south_dinner_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Other</td>
                    <td>'.$noidung->meal2_south_other_price.'</td>
                    <td>'.$noidung->meal2_south_other_num.'</td>
                    <td>'.$noidung->meal2_south_other_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td colspan="42" class="dataLabel" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>
                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999"><strong>Middle</strong></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_miidle_sum.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_middle1.'</td>
                    <td>'.$noidung->meal2_middle2.'</td>
                    <td>'.$noidung->meal2_middle3.'</td>
                    <td>'.$noidung->meal2_middle4.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_middle5.'</td>
                    <td>'.$noidung->meal2_middle6.'</td>
                    <td>'.$noidung->meal2_middle7.'</td>
                    <td>'.$noidung->meal2_middle8.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_middle9.'</td>
                    <td>'.$noidung->meal2_middle10.'</td>
                    <td>'.$noidung->meal2_middle11.'</td>
                    <td>'.$noidung->meal2_middle12.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_middle13.'</td>
                    <td>'.$noidung->meal2_middle14.'</td>
                    <td>'.$noidung->meal2_middle15.'</td>
                    <td>'.$noidung->meal2_middle16.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_middle17.'</td>
                    <td>'.$noidung->meal2_middle18.'</td>
                    <td>'.$noidung->meal2_middle19.'</td>
                    <td>'.$noidung->meal2_middle20.'</td>
                    <td>'.$noidung->meal2_middle21.'</td>
                    <td>'.$noidung->meal2_middle22.'</td>
                    <td>'.$noidung->meal2_middle23.'</td>
                    <td>'.$noidung->meal2_middle24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_middle25.'</td>
                    <td>'.$noidung->meal2_middle26.'</td>
                    <td>'.$noidung->meal2_middle27.'</td>
                    <td>'.$noidung->meal2_middle28.'</td>
                    <td>'.$noidung->meal2_middle29.'</td>
                    <td>'.$noidung->meal2_middle30.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Breakfirst</td>
                    <td>'.$noidung->meal2_middle_breakfirst_price.'</td>
                    <td>'.$noidung->meal2_middle_breakfirst_num.'</td>
                    <td>'.$noidung->meal2_middle_breakfirst_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Lunch</td>
                    <td>'.$noidung->meal2_middle_lunch_price.'</td>
                    <td>'.$noidung->meal2_middle_lunch_num.'</td>
                    <td>'.$noidung->meal2_middle_lunch_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Dinner</td>
                    <td>'.$noidung->meal2_middle_dinner_price.'</td>
                    <td>'.$noidung->meal2_middle_dinner_num.'</td>
                    <td>'.$noidung->meal2_middle_dinner_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Other</td>
                    <td>'.$noidung->meal2_middle_other_price.'</td>
                    <td>'.$noidung->meal2_middle_other_num.'</td>
                    <td>'.$noidung->meal2_middle_other_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td colspan="42" class="dataLabel" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>
                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999"><strong>North</strong></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_north_sum.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_north1.'</td>
                    <td>'.$noidung->meal2_north2.'</td>
                    <td>'.$noidung->meal2_north3.'</td>
                    <td>'.$noidung->meal2_north4.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_north5.'</td>
                    <td>'.$noidung->meal2_north6.'</td>
                    <td>'.$noidung->meal2_north7.'</td>
                    <td>'.$noidung->meal2_north8.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_north9.'</td>
                    <td>'.$noidung->meal2_north10.'</td>
                    <td>'.$noidung->meal2_north11.'</td>
                    <td>'.$noidung->meal2_north12.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_north13.'</td>
                    <td>'.$noidung->meal2_north14.'</td>
                    <td>'.$noidung->meal2_north15.'</td>
                    <td>'.$noidung->meal2_north16.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_north17.'</td>
                    <td>'.$noidung->meal2_north18.'</td>
                    <td>'.$noidung->meal2_north19.'</td>
                    <td>'.$noidung->meal2_north20.'</td>
                    <td>'.$noidung->meal2_north21.'</td>
                    <td>'.$noidung->meal2_north22.'</td>
                    <td>'.$noidung->meal2_north23.'</td>
                    <td>'.$noidung->meal2_north24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal2_north25.'</td>
                    <td>'.$noidung->meal2_north26.'</td>
                    <td>'.$noidung->meal2_north27.'</td>
                    <td>'.$noidung->meal2_north28.'</td>
                    <td>'.$noidung->meal2_north29.'</td>
                    <td>'.$noidung->meal2_north30.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Breakfirst</td>
                    <td>'.$noidung->meal2_north_breakfirst_price.'</t/d>
                    <td>'.$noidung->meal2_north_breakfirst_num.'</td>
                    <td>'.$noidung->meal2_north_breakfirst_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Lunch</td>
                    <td>'.$noidung->meal2_north_lunch_price.'</td>
                    <td>'.$noidung->meal2_north_lunch_num.'</td>
                    <td>'.$noidung->meal2_north_lunch_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Dinner</td>
                    <td>'.$noidung->meal2_north_dinner_price.'</td>
                    <td>'.$noidung->meal2_north_dinner_num.'</td>
                    <td>'.$noidung->meal2_north_dinner_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Other</td>
                    <td>'.$noidung->meal2_north_other_price.'</td>
                    <td>'.$noidung->meal2_north_other_num.'</td>
                    <td>'.$noidung->meal2_north_other_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999"><strong>HOTEL 2</strong></td>
                    <td class="dataLabel">Room</td>
                    <td class="dataLabel">Nite</td>
                    <td>'.$noidung->hotel2_sum.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->hotel2_1.'</td>
                    <td>'.$noidung->hotel2_2.'</td>
                    <td>'.$noidung->hotel2_3.'</td>
                    <td>'.$noidung->hotel2_4.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->hotel2_5.'</td>
                    <td>'.$noidung->hotel2_6.'</td>
                    <td>'.$noidung->hotel2_7.'</td>
                    <td>'.$noidung->hotel2_8.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->hotel2_9.'</td>
                    <td>'.$noidung->hotel2_10.'</td>
                    <td>'.$noidung->hotel2_11.'</td>
                    <td>'.$noidung->hotel2_12.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->hotel2_13.'</td>
                    <td>'.$noidung->hotel2_14.'</td>
                    <td>'.$noidung->hotel2_15.'</td>
                    <td>'.$noidung->hotel2_16.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->hotel2_17.'</td>
                    <td>'.$noidung->hotel2_18.'</td>
                    <td>'.$noidung->hotel2_19.'</td>
                    <td>'.$noidung->hotel2_20.'</td>
                    <td>'.$noidung->hotel2_21.'</td>
                    <td>'.$noidung->hotel2_22.'</td>
                    <td>'.$noidung->hotel2_23.'</td>
                    <td>'.$noidung->hotel2_24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->hotel2_25.'</td>
                    <td>'.$noidung->hotel2_26.'</td>
                    <td>'.$noidung->hotel2_27.'</td>
                    <td>'.$noidung->hotel2_28.'</td>
                    <td>'.$noidung->hotel2_29.'</td>
                    <td>'.$noidung->hotel2_30.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>';
                    $hotel2 = $noidung->hotel2;
                    if(count($hotel2)>0){
                        foreach($hotel2 as $value){
                            $html .= '<tr>
                            <td style="border-left:1px solid #999">'.$value->hotel2_service.'</td>
                            <td>'.$value->hotel2_price.'</td>
                            <td>'.$value->hotel2_num.'</td>
                            <td>'.$value->hotel2_money.'</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            </tr>';
                        }
                    }

                    $html .= '<tr>
                    <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>
                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">FOC</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->foc2_21.'</td>
                    <td>'.$noidung->foc2_22.'</td>
                    <td>'.$noidung->foc2_23.'</td>
                    <td>'.$noidung->foc2_24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->foc2_25.'</td>
                    <td>'.$noidung->foc2_26.'</td>
                    <td>'.$noidung->foc2_27.'</td>
                    <td>'.$noidung->foc2_28.'</td>
                    <td>'.$noidung->foc2_29.'</td>
                    <td>'.$noidung->foc2_30.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">NETT</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->nett2_1.'</td>
                    <td>'.$noidung->nett2_2.'</td>
                    <td>'.$noidung->nett2_3.'</td>
                    <td>'.$noidung->nett2_4.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->nett2_5.'</td>
                    <td>'.$noidung->nett2_6.'</td>
                    <td>'.$noidung->nett2_7.'</td>
                    <td>'.$noidung->nett2_8.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->nett2_9.'</td>
                    <td>'.$noidung->nett2_10.'</td>
                    <td>'.$noidung->nett2_11.'</td>
                    <td>'.$noidung->nett2_12.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->nett2_13.'</td>
                    <td>'.$noidung->nett2_14.'</td>
                    <td>'.$noidung->nett2_15.'</td>
                    <td>'.$noidung->nett2_16.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->nett2_17.'</td>
                    <td>'.$noidung->nett2_18.'</td>
                    <td>'.$noidung->nett2_19.'</td>
                    <td>'.$noidung->nett2_20.'</td>
                    <td>'.$noidung->nett2_21.'</td>
                    <td>'.$noidung->nett2_22.'</td>
                    <td>'.$noidung->nett2_23.'</td>
                    <td>'.$noidung->nett2_24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->nett2_25.'</td>
                    <td>'.$noidung->nett2_26.'</td>
                    <td>'.$noidung->nett2_27.'</td>
                    <td>'.$noidung->nett2_28.'</td>
                    <td>'.$noidung->nett2_29.'</td>
                    <td>'.$noidung->nett2_30.'</td>
                    <td>'.$noidung->nett2_31.'</td>
                    <td>'.$noidung->nett2_32.'</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">SERVICE CHARGE</td>
                    <td>'.$noidung->service2_rate.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->service2_1.'</td>
                    <td>'.$noidung->service2_2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->service2_5.'</td>
                    <td>'.$noidung->service2_6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->service2_9.'</td>
                    <td>'.$noidung->service2_10.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->service2_13.'</td>
                    <td>'.$noidung->service2_14.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->service2_17.'</td>
                    <td>'.$noidung->service2_18.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>"'.$noidung->service2_21.'</td>
                    <td>'.$noidung->service2_22.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->service2_25.'</td>
                    <td>'.$noidung->service2_26.'</td>
                    <td>'.$noidung->service2_27.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->service2_31.'</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">SELL 2 - VND</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell2_vnd1.'</td>
                    <td>'.$noidung->sell2_vnd2.'</td>
                    <td>'.$noidung->sell2_vnd3.'</td>
                    <td>'.$noidung->sell2_vnd4.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell2_vnd5.'</td>
                    <td>'.$noidung->sell2_vnd6.'</td>
                    <td>'.$noidung->sell2_vnd7.'</td>
                    <td>'.$noidung->sell2_vnd8.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell2_vnd9.'</td>
                    <td>'.$noidung->sell2_vnd10.'</td>
                    <td>'.$noidung->sell2_vnd11.'</td>
                    <td>'.$noidung->sell2_vnd12.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell2_vnd13.'</td>
                    <td>'.$noidung->sell2_vnd14.'</td>
                    <td>'.$noidung->sell2_vnd15.'</td>
                    <td>'.$noidung->sell2_vnd16.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell2_vnd17.'</td>
                    <td>'.$noidung->sell2_vnd18.'</td>
                    <td>'.$noidung->sell2_vnd19.'</td>
                    <td>'.$noidung->sell2_vnd20.'</td>
                    <td>'.$noidung->sell2_vnd21.'</td>
                    <td>'.$noidung->sell2_vnd22.'</td>
                    <td>'.$noidung->sell2_vnd23.'</td>
                    <td>'.$noidung->sell2_vnd24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell2_vnd25.'</td>
                    <td>'.$noidung->sell2_vnd26.'</td>
                    <td>'.$noidung->sell2_vnd27.'</td>
                    <td>'.$noidung->sell2_vnd28.'</td>
                    <td>'.$noidung->sell2_vnd29.'</td>
                    <td>'.$noidung->sell2_vnd30.'</td>
                    <td>'.$noidung->sell2_vnd31.'</td>
                    <td>'.$noidung->sell2_vnd32.'</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">SELL 2 - USD</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell2_usd1.'</td>
                    <td>'.$noidung->sell2_usd2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell2_usd5.'</td>
                    <td>'.$noidung->sell2_usd6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell2_usd9.'</td>
                    <td>'.$noidung->sell2_usd10.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell2_usd13.'</td>
                    <td>'.$noidung->sell2_usd14.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell2_usd17.'</td>
                    <td>'.$noidung->sell2_usd18.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell2_usd21.'</td>
                    <td>'.$noidung->sell2_usd22.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell2_usd25.'</td>
                    <td>'.$noidung->sell2_usd26.'</td>
                    <td>'.$noidung->sell2_usd27.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell2_usd31.'</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">TAX TO BE PAID</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->tax2_1.'</td>
                    <td>'.$noidung->tax2_2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->tax2_5.'</td>
                    <td>'.$noidung->tax2_6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->tax2_9.'</td>
                    <td>'.$noidung->tax2_10.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->tax2_13.'</td>
                    <td>'.$noidung->tax2_14.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->tax2_17.'</td>
                    <td>'.$noidung->tax2_18.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->tax2_21.'</td>
                    <td>'.$noidung->tax2_22.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->tax2_25.'</td>
                    <td>'.$noidung->tax2_26.'</td>
                    <td>'.$noidung->tax2_27.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->tax2_31.'</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">PROFIT/PAX</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->profit2_1.'</td>
                    <td>'.$noidung->profit2_2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->profit2_5.'</td>
                    <td>'.$noidung->profit2_6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->profit2_9.'</td>
                    <td>'.$noidung->profit2_10.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->profit2_13.'</td>
                    <td>'.$noidung->profit2_14.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->profit2_17.'</td>
                    <td>'.$noidung->profit2_18.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->profit2_21.'</td>
                    <td>'.$noidung->profit2_22.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->profit2_25.'</td>
                    <td>'.$noidung->profit2_26.'</td>
                    <td>'.$noidung->profit2_27.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->profit2_31.'</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">TOTAL PROFIT</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->total2_1.'</td>
                    <td>'.$noidung->total2_2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->total2_5.'</td>
                    <td>'.$noidung->total2_6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->total2_9.'</td>
                    <td>'.$noidung->total2_10.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->total2_13.'</td>
                    <td>'.$noidung->total2_14.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->total2_17.'</td>
                    <td>'.$noidung->total2_18.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->total2_21.'</td>
                    <td>'.$noidung->total2_22.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->total2_25.'</td>
                    <td>'.$noidung->total2_26.'</td>
                    <td>'.$noidung->total2_27.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->total2_31.'</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">% OF INTEREST</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->interest2_1.'</td>
                    <td>'.$noidung->interest2_2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->interest2_5.'</td>
                    <td>'.$noidung->interest2_6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->interest2_9.'</td>
                    <td>'.$noidung->interest2_10.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->interest2_13.'</td>
                    <td>'.$noidung->interest2_14.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->interest2_17.'</td>
                    <td>'.$noidung->interest2_18.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->interest2_21.'</td>
                    <td>'.$noidung->interest2_22.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->interest2_25.'</td>
                    <td>'.$noidung->interest2_26.'</td>
                    <td>'.$noidung->interest2_27.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->interest2_31.'</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999"><strong>MEALS 3</strong></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_sum.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_1.'</td>
                    <td>'.$noidung->meal3_2.'</td>
                    <td>'.$noidung->meal3_3.'</td>
                    <td>'.$noidung->meal3_4.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_5.'</td>
                    <td>'.$noidung->meal3_6.'</td>
                    <td>'.$noidung->meal3_7.'</td>
                    <td>'.$noidung->meal3_8.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_9.'</td>
                    <td>'.$noidung->meal3_10.'</td>
                    <td>'.$noidung->meal3_11.'</td>
                    <td>'.$noidung->meal3_12.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_13.'</td>
                    <td>'.$noidung->meal3_14.'</td>
                    <td>'.$noidung->meal3_15.'</td>
                    <td>'.$noidung->meal3_16.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_17.'</td>
                    <td>'.$noidung->meal3_18.'</td>
                    <td>'.$noidung->meal3_19.'</td>
                    <td>'.$noidung->meal3_20.'</td>
                    <td>'.$noidung->meal3_21.'</td>
                    <td>'.$noidung->meal3_22.'</td>
                    <td>'.$noidung->meal3_23.'</td>
                    <td>'.$noidung->meal3_24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_25.'</td>
                    <td>'.$noidung->meal3_26.'</td>
                    <td>'.$noidung->meal3_27.'</td>
                    <td>'.$noidung->meal3_28.'</td>
                    <td>'.$noidung->meal3_28.'</td>
                    <td>'.$noidung->meal3_30.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>
                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999"><strong>South</strong></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_south_sum.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_south1.'</td>
                    <td>'.$noidung->meal3_south2.'</td>
                    <td>'.$noidung->meal3_south3.'</td>
                    <td>'.$noidung->meal3_south4.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_south5.'</td>
                    <td>'.$noidung->meal3_south6.'</td>
                    <td>'.$noidung->meal3_south7.'</td>
                    <td>'.$noidung->meal3_south8.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_south9.'</td>
                    <td>'.$noidung->meal3_south10.'</td>
                    <td>'.$noidung->meal3_south11.'</td>
                    <td>'.$noidung->meal3_south12.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_south13.'</td>
                    <td>'.$noidung->meal3_south14.'</td>
                    <td>'.$noidung->meal3_south15.'</td>
                    <td>'.$noidung->meal3_south16.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_south17.'</td>
                    <td>'.$noidung->meal3_south18.'</td>
                    <td>'.$noidung->meal3_south19.'</td>
                    <td>'.$noidung->meal3_south20.'</td>
                    <td>'.$noidung->meal3_south21.'</td>
                    <td>'.$noidung->meal3_south22.'</td>
                    <td>'.$noidung->meal3_south23.'</td>
                    <td>'.$noidung->meal3_south24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_south25.'</td>
                    <td>'.$noidung->meal3_south26.'</td>
                    <td>'.$noidung->meal3_south27.'</td>
                    <td>'.$noidung->meal3_south28.'</td>
                    <td>'.$noidung->meal3_south29.'</td>
                    <td>'.$noidung->meal3_south30.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Breakfirst</td>
                    <td>'.$noidung->meal3_south_breakfirst_price.'</td>
                    <td>'.$noidung->meal3_south_breakfirst_num.'</td>
                    <td>'.$noidung->meal3_south_breakfirst_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Lunch</td>
                    <td>'.$noidung->meal3_south_lunch_price.'</td>
                    <td>'.$noidung->meal3_south_lunch_num.'</td>
                    <td>'.$noidung->meal3_south_lunch_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Dinner</td>
                    <td>'.$noidung->meal3_south_dinner_price.'</td>
                    <td>'.$noidung->meal3_south_dinner_num.'</td>
                    <td>'.$noidung->meal3_south_dinner_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Other</td>
                    <td>'.$noidung->meal3_south_other_price.'</td>
                    <td>'.$noidung->meal3_south_other_num.'</td>
                    <td>'.$noidung->meal3_south_other_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td colspan="42" class="dataLabel" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>
                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999"><strong>Middle</strong></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_miidle_sum.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_middle1.'</td>
                    <td>'.$noidung->meal3_middle2.'</td>
                    <td>'.$noidung->meal3_middle3.'</td>
                    <td>'.$noidung->meal3_middle4.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_middle5.'</td>
                    <td>'.$noidung->meal3_middle6.'</td>
                    <td>'.$noidung->meal3_middle7.'</td>
                    <td>'.$noidung->meal3_middle8.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_middle9.'</td>
                    <td>'.$noidung->meal3_middle10.'</td>
                    <td>'.$noidung->meal3_middle11.'</td>
                    <td>'.$noidung->meal3_middle12.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_middle13.'</td>
                    <td>'.$noidung->meal3_middle14.'</td>
                    <td>'.$noidung->meal3_middle15.'</td>
                    <td>'.$noidung->meal3_middle16.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_middle17.'</td>
                    <td>'.$noidung->meal3_middle18.'</td>
                    <td>'.$noidung->meal3_middle19.'</td>
                    <td>'.$noidung->meal3_middle20.'</td>
                    <td>'.$noidung->meal3_middle21.'</td>
                    <td>'.$noidung->meal3_middle22.'</td>
                    <td>'.$noidung->meal3_middle23.'</td>
                    <td>'.$noidung->meal3_middle24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_middle25.'</td>
                    <td>'.$noidung->meal3_middle26.'</td>
                    <td>'.$noidung->meal3_middle27.'</td>
                    <td>'.$noidung->meal3_middle28.'</td>
                    <td>'.$noidung->meal3_middle29.'</td>
                    <td>'.$noidung->meal3_middle30.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Breakfirst</td>
                    <td>'.$noidung->meal3_middle_breakfirst_price.'</td>
                    <td>'.$noidung->meal3_middle_breakfirst_num.'</td>
                    <td>'.$noidung->meal3_middle_breakfirst_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Lunch</td>
                    <td>'.$noidung->meal3_middle_lunch_price.'</td>
                    <td>'.$noidung->meal3_middle_lunch_num.'</td>
                    <td>'.$noidung->meal3_middle_lunch_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Dinner</td>
                    <td>'.$noidung->meal3_middle_dinner_price.'</td>
                    <td>'.$noidung->meal3_middle_dinner_num.'</td>
                    <td>'.$noidung->meal3_middle_dinner_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Other</td>
                    <td>'.$noidung->meal3_middle_other_price.'</td>
                    <td>'.$noidung->meal3_middle_other_num.'</td>
                    <td>'.$noidung->meal3_middle_other_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td colspan="42" class="dataLabel" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>
                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999"><strong>North</strong></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_north_sum.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_north1.'</td>
                    <td>'.$noidung->meal3_north2.'</td>
                    <td>'.$noidung->meal3_north3.'</td>
                    <td>'.$noidung->meal3_north4.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_north5.'</td>
                    <td>'.$noidung->meal3_north6.'</td>
                    <td>'.$noidung->meal3_north7.'</td>
                    <td>'.$noidung->meal3_north8.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_north9.'</td>
                    <td>'.$noidung->meal3_north10.'</td>
                    <td>'.$noidung->meal3_north11.'</td>
                    <td>'.$noidung->meal3_north12.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_north13.'</td>
                    <td>'.$noidung->meal3_north14.'</td>
                    <td>'.$noidung->meal3_north15.'</td>
                    <td>'.$noidung->meal3_north16.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_north17.'</td>
                    <td>'.$noidung->meal3_north18.'</td>
                    <td>'.$noidung->meal3_north19.'</td>
                    <td>'.$noidung->meal3_north20.'</td>
                    <td>'.$noidung->meal3_north21.'</td>
                    <td>'.$noidung->meal3_north22.'</td>
                    <td>'.$noidung->meal3_north23.'</td>
                    <td>'.$noidung->meal3_north24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->meal3_north25.'</td>
                    <td>'.$noidung->meal3_north26.'</td>
                    <td>'.$noidung->meal3_north27.'</td>
                    <td>'.$noidung->meal3_north28.'</td>
                    <td>'.$noidung->meal3_north29.'</td>
                    <td>'.$noidung->meal3_north30.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Breakfirst</td>
                    <td>'.$noidung->meal3_north_breakfirst_price.'</td>
                    <td>'.$noidung->meal3_north_breakfirst_num.'</td>
                    <td>'.$noidung->meal3_north_breakfirst_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Lunch</td>
                    <td>'.$noidung->meal3_north_lunch_price.'</td>
                    <td>'.$noidung->meal3_north_lunch_num.'</td>
                    <td>'.$noidung->meal3_north_lunch_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Dinner</td>
                    <td>'.$noidung->meal3_north_dinner_price.'</td>
                    <td>'.$noidung->meal3_north_dinner_num.'</td>
                    <td>'.$noidung->meal3_north_dinner_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">Other</td>
                    <td>'.$noidung->meal3_north_other_price.'</td>
                    <td>'.$noidung->meal3_north_other_num.'</td>
                    <td>'.$noidung->meal3_north_other_money.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999"><strong>HOTEL 3</strong></td>
                    <td class="dataLabel">Room</td>
                    <td class="dataLabel">Nite</td>
                    <td>'.$noidung->hotel3_sum.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->hotel3_1.'</td>
                    <td>'.$noidung->hotel3_2.'</td>
                    <td>'.$noidung->hotel3_3.'</td>
                    <td>'.$noidung->hotel3_4.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->hotel3_5.'</td>
                    <td>'.$noidung->hotel3_6.'</td>
                    <td>'.$noidung->hotel3_7.'</td>
                    <td>'.$noidung->hotel3_8.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->hotel3_9.'</td>
                    <td>'.$noidung->hotel3_10.'</td>
                    <td>'.$noidung->hotel3_11.'</td>
                    <td>'.$noidung->hotel3_12.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->hotel3_13.'</td>
                    <td>'.$noidung->hotel3_14.'</td>
                    <td>'.$noidung->hotel3_15.'</td>
                    <td>'.$noidung->hotel3_16.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->hotel3_17.'</td>
                    <td>'.$noidung->hotel3_18.'</td>
                    <td>'.$noidung->hotel3_19.'</td>
                    <td>'.$noidung->hotel3_20.'</td>
                    <td>'.$noidung->hotel3_21.'</td>
                    <td>'.$noidung->hotel3_22.'</td>
                    <td>'.$noidung->hotel3_23.'</td>
                    <td>'.$noidung->hotel3_24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->hotel3_25.'</td>
                    <td>'.$noidung->hotel3_26.'</td>
                    <td>'.$noidung->hotel3_27.'</td>
                    <td>'.$noidung->hotel3_28.'</td>
                    <td>'.$noidung->hotel3_29.'</td>
                    <td>'.$noidung->hotel3_30.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>';

                    $hotel3 = $nodung->hotel3;
                    if(count($hotel3)>0){
                        foreach($hotel3 as $value){
                            $html_hotel3 .= ' <tr>
                            <td style="border-left:1px solid #999">'.$value->hotel3_service.'</td>
                            <td>'.$value->hotel3_price.'</td>
                            <td>'.$value->hotel3_num.'</td>
                            <td>'.$value->hotel3_money.'</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            </tr>';
                        }
                    }

                    $html .= '<tr>
                    <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                    </tr>
                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">FOC</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->foc3_21.'</td>
                    <td>'.$noidung->foc3_22.'</td>
                    <td>'.$noidung->foc3_23.'</td>
                    <td>'.$noidung->foc3_24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->foc3_25.'</td>
                    <td>'.$noidung->foc3_26.'</td>
                    <td>'.$noidung->foc3_27.'</td>
                    <td>'.$noidung->foc3_28.'</td>
                    <td>'.$noidung->foc3_29.'</td>
                    <td>'.$noidung->foc3_30.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">NETT</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->nett3_1.'</td>
                    <td>'.$noidung->nett3_2.'</td>
                    <td>'.$noidung->nett3_3.'</td>
                    <td>'.$noidung->nett3_4.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->nett3_5.'</td>
                    <td>'.$noidung->nett3_6.'</td>
                    <td>'.$noidung->nett3_7.'</td>
                    <td>'.$noidung->nett3_8.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->nett3_9.'</td>
                    <td>'.$noidung->nett3_10.'</td>
                    <td>'.$noidung->nett3_11.'</td>
                    <td>'.$noidung->nett3_12.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->nett3_13.'</td>
                    <td>'.$noidung->nett3_14.'</td>
                    <td>'.$noidung->nett3_15.'</td>
                    <td>'.$noidung->nett3_16.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->nett3_17.'</td>
                    <td>'.$noidung->nett3_18.'</td>
                    <td>'.$noidung->nett3_19.'</td>
                    <td>'.$noidung->nett3_20.'</td>
                    <td>'.$noidung->nett3_21.'</td>
                    <td>'.$noidung->nett3_22.'</td>
                    <td>'.$noidung->nett3_23.'</td>
                    <td>'.$noidung->nett3_24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->nett3_25.'</td>
                    <td>'.$noidung->nett3_26.'</td>
                    <td>'.$noidung->nett3_27.'</td>
                    <td>'.$noidung->nett3_28.'</td>
                    <td>'.$noidung->nett3_29.'</td>
                    <td>'.$noidung->nett3_30.'</td>
                    <td>'.$noidung->nett3_31.'</td>
                    <td>'.$noidung->nett3_32.'</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">SERVICE CHARGE</td>
                    <td>'.$noidung->service3_rate.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->service3_1.'</td>
                    <td>'.$noidung->service3_2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->service3_5.'</td>
                    <td>'.$noidung->service3_6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->service3_9.'</td>
                    <td>'.$noidung->service3_10.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->service3_13.'</td>
                    <td>'.$noidung->service3_14.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->service3_17.'</td>
                    <td>'.$noidung->service3_18.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->service3_21.'</td>
                    <td>'.$noidung->service3_22.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->service3_25.'</td>
                    <td>'.$noidung->service3_26.'</td>
                    <td>'.$noidung->service3_27.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->service3_31.'</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">SELL 3 - VND</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell3_vnd1.'</td>
                    <td>'.$noidung->sell3_vnd2.'</td>
                    <td>'.$noidung->sell3_vnd3.'</td>
                    <td>'.$noidung->sell3_vnd4.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell3_vnd5.'</td>
                    <td>'.$noidung->sell3_vnd6.'</td>
                    <td>'.$noidung->sell3_vnd7.'</td>
                    <td>'.$noidung->sell3_vnd8.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell3_vnd9.'</td>
                    <td>'.$noidung->sell3_vnd10.'</td>
                    <td>'.$noidung->sell3_vnd11.'</td>
                    <td>'.$noidung->sell3_vnd12.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell3_vnd13.'</td>
                    <td>'.$noidung->sell3_vnd14.'</td>
                    <td>'.$noidung->sell3_vnd15.'</td>
                    <td>'.$noidung->sell3_vnd16.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell3_vnd17.'</td>
                    <td>'.$noidung->sell3_vnd18.'</td>
                    <td>'.$noidung->sell3_vnd19.'</td>
                    <td>'.$noidung->sell3_vnd20.'</td>
                    <td>'.$noidung->sell3_vnd21.'</td>
                    <td>'.$noidung->sell3_vnd22.'</td>
                    <td>'.$noidung->sell3_vnd23.'</td>
                    <td>'.$noidung->sell3_vnd24.'</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell3_vnd25.'</td>
                    <td>'.$noidung->sell3_vnd26.'</td>
                    <td>'.$noidung->sell3_vnd27.'</td>
                    <td>'.$noidung->sell3_vnd28.'</td>
                    <td>'.$noidung->sell3_vnd29.'</td>
                    <td>'.$noidung->sell3_vnd30.'</td>
                    <td>'.$noidung->sell3_vnd31.'</td>
                    <td>'.$noidung->sell3_vnd32.'</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">SELL 3 - USD</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell3_usd1.'</td>
                    <td>'.$noidung->sell3_usd2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell3_usd5.'</td>
                    <td>'.$noidung->sell3_usd6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell3_usd9.'</td>
                    <td>'.$noidung->sell3_usd10.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell3_usd13.'</td>
                    <td>'.$noidung->sell3_usd14.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell3_usd17.'</td>
                    <td>'.$noidung->sell3_usd18.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell3_usd21.'</td>
                    <td>"'.$noidung->sell3_usd22.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell3_usd25.'</td>
                    <td>'.$noidung->sell3_usd26.'</td>
                    <td>'.$noidung->sell3_usd27.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->sell3_usd31.'</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">TAX TO BE PAID</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->tax3_1.'</td>
                    <td>'.$noidung->tax3_2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->tax3_5.'</td>
                    <td>'.$noidung->tax3_6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->tax3_9.'</td>
                    <td>'.$noidung->tax3_10.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->tax3_13.'</td>
                    <td>'.$noidung->tax3_14.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->tax3_17.'</td>
                    <td>'.$noidung->tax3_18.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->tax3_21.'</td>
                    <td>'.$noidung->tax3_22.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->tax3_25.'</td>
                    <td>'.$noidung->tax3_26.'</td>
                    <td>'.$noidung->tax3_27.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->tax3_31.'</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">PROFIT/PAX</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->profit3_1.'</td>
                    <td>'.$noidung->profit3_2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->profit3_5.'</td>
                    <td>'.$noidung->profit3_6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->profit3_9.'</td>
                    <td>'.$noidung->profit3_10.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->profit3_13.'</td>
                    <td>'.$noidung->profit3_14.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->profit3_17.'</td>
                    <td>'.$noidung->profit3_18.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->profit3_21.'</td>
                    <td>'.$noidung->profit3_22.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->profit3_25.'</td>
                    <td>'.$noidung->profit3_26.'</td>
                    <td>'.$noidung->profit3_27.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->profit3_31.'</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">TOTAL PROFIT</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->total3_1.'</td>
                    <td>'.$noidung->total3_2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->total3_5.'</td>
                    <td>'.$noidung->total3_6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->total3_9.'</td>
                    <td>'.$noidung->total3_10.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->total3_13.'</td>
                    <td>'.$noidung->total3_14.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->total3_17.'</td>
                    <td>'.$noidung->total3_18.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->total3_21.'</td>
                    <td>'.$noidung->total3_22.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->total3_25.'</td>
                    <td>'.$noidung->total3_26.'</td>
                    <td>'.$noidung->total3_27.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->total3_31.'</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td class="dataLabel" style="border-left:1px solid #999">% OF INTEREST</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->interest3_1.'</td>
                    <td>'.$noidung->interest3_2.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->interest3_5.'</td>
                    <td>'.$noidung->interest3_6.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->interest3_9.'</td>
                    <td>'.$noidung->interest3_10.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->interest3_13.'</td>
                    <td>'.$noidung->interest3_14.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->interest3_17.'</td>
                    <td>'.$noidung->interest3_18.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->interest3_21.'</td>
                    <td>'.$noidung->interest3_22.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->interest3_25.'</td>
                    <td>'.$noidung->interest3_26.'</td>
                    <td>'.$noidung->interest3_27.'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>'.$noidung->interest3_31.'</td>
                    <td>&nbsp;</td>
                    </tr>
                    </tbody>
                    </table>
                    </fieldset>
                    </div>';
                }   
                //<!-- KẾT THÚC BÁO CÁO CHI TIẾT-->
            }





            $this->ss->assign('HTML',$html);  
            $this->ss->assign('REPORT',$htmlReport);
        }
    }
?>
