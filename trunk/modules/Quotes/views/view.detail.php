<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    require_once('include/MVC/View/views/view.detail.php');
    require_once('include/DetailView/DetailView.php');
    require_once("include/utils/layout_utils.php");
    class QuotesViewDetail extends ViewDetail{
        
        function QuotesViewDetail(){
            parent::ViewDetail();
        }
        
        function display(){
            $this->assign(); 
            parent::display();
        }
        
        function assign(){
            global $mod_strings;
            $content = $this->bean->cost_detail;
            $content = base64_decode($content);
            $content = json_decode($content);
            $cost_detail =  $content->dos_cost_detail;  
            $html = '';
            if($this->bean->department == 'dos'){
                $html .= '<div id="dos"><table width="100%" class="table_clone" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse">';
                $html .= '<thead>';
                  $html .= '<tr height="15">';
                    $html .= '<td class="tdborder" rowspan="2" style="text-align:center">'.$mod_strings['LBL_DOS_TICKET'].'</td>';
                    $html .= '<td class="tdborder" colspan="2" style="text-align:center">'.$mod_strings['LBL_DOS_TOUR_COST'].'</td>';
                    $html .= '<td class="tdborder" colspan="2" style="text-align:center">'.$mod_strings['LBL_DOS_SURCHANGE'].'</td>';
                  $html .= '</tr>';
                  $html .= '<tr height="15">';
                    $html .= '<td class="tdborder">'.$mod_strings['LBL_DOS_FARE'].'</td>';
                    $html .= '<td class="tdborder">'.$mod_strings['LBL_DOS_FACILITY_COST'].'</td>';
                    $html .= '<td class="tdborder">'.$mod_strings['LBL_DOS_SINGLE_ROM'].'</td>';
                    $html .= '<td class="tdborder">'.$mod_strings['LBL_DOS_FOREIGN'].'</td>';
                  $html .= '</tr>';
                  $html .= '</thead>';
                  $html .= '<tbody>';
                if(count($cost_detail)>0){
                    foreach($cost_detail as $val){
                        $html .= '<tr height="15">';
                            $html .= '<td class="tdborder">'.translate('quotes_dos_hotel_standard','',$val->dos_hotel_standard).'</td>';
                            $html .= '<td class="tdborder">'.$val->ticket_cost.'</td>';
                            $html .= '<td class="tdborder">'.$val->facility_cost.'</td>';
                            $html .= '<td class="tdborder">'.$val->single_room.'</td>';
                            $html .= '<td class="tdborder">'.$val->foreign.'</td>';
                      $html .= '</tr>';
                    }
                }
                $html .= '</tbody>';
                $html .= '</table> </div> ';
                $this->dv->ss->assign('doshtml',$html); 
            }
            
            if($this->bean->department =='ib'){
                $cost_detail_head = $content->cost_detail_head;
                $ib_cose_detai = $content->ib_cose_detai;
                
                $html .= '<div id="inbound">';
                    $html .= '<table width="100%" border="1" class="table_clone" cellspacing="0" cellpadding="2" style="border-collapse:collapse">';
                    $html .= '<thead>';
                      $html .= '<tr height="15">';
                        $html .= '<td colspan="7" style="text-align:center" class="tdborder"><strong>'.$mod_strings['LBL_IB_TABLE_TITLE'].'</strong></td>';
                      $html .= '</tr>';
                      $html .= '<tr height="15">';
                        $html .= '<td class="tdborder"><strong>'.$mod_strings['LBL_IB_GROUP_SIZE'].'</strong></td>';
                        $html .= '<td class="tdborder">'.$cost_detail_head->group_site1.'</td>';
                        $html .= '<td class="tdborder">'.$cost_detail_head->group_site2.'</td>';
                        $html .= '<td class="tdborder">'.$cost_detail_head->group_site3.'</td>';
                        $html .= '<td class="tdborder">'.$cost_detail_head->group_site4.'</td>';
                        $html .= '<td class="tdborder">'.$cost_detail_head->group_site5.'</td>';
                        $html .= '<td class="tdborder">'.$cost_detail_head->group_site6.'</td>';
                      $html .= '</tr>';
                      $html .= '</thead>';
                      $html .= '<tbody>';
                if(count($ib_cose_detai)>0){
                    foreach($ib_cose_detai as $val){
                        $html .= '<tr height="15">';
                            $html .= '<td class="tdborder">'.translate('quotes_ib_hotel_standard','',$val->ib_hotel_standard).'</td>';
                            $html .= '<td class="tdborder">'.$val->group_site1_cost.'</td>';
                            $html .= '<td class="tdborder">'.$val->group_site2_cost.'</td>';
                            $html .= '<td class="tdborder">'.$val->group_site3_cost.'</td>';
                            $html .= '<td class="tdborder">'.$val->group_site4_cost.'</td>';
                            $html .= '<td class="tdborder">'.$val->group_site5_cost.'</td>';
                            $html .= '<td class="tdborder">'.$val->group_site6_cost.'</td>';
                        $html .= '</tr>';
                    }
                }
                $html .= '</tbody>';
                $html .= '</table>';
                $html .= '</div>';
                $this->dv->ss->assign('ibhtml',$html);
            }
            
            if($this->bean->department =='ob'){
                $ob_cost_detail = $content->ob_cost_detail;
                $this->dv->ss->assign('ob_price',$ob_cost_detail->price);
                $this->dv->ss->assign('ob_tax',$ob_cost_detail->tax);
                $this->dv->ss->assign('lbl_currency',translate('currency_dom','',$ob_cost_detail->currency));
                $this->dv->ss->assign('ob_total_price',$ob_cost_detail->total_price);
                $this->dv->ss->assign('price_note',$ob_cost_detail->price_note);
            }
        }
    }
?>
